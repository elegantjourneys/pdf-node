<?php
declare(strict_types=1);
namespace Admin\Controller\Component;
use Cake\Controller\Component;
use Cake\Utility\Inflector;
use Cake\Utility\Text;

class UploadComponent extends Component {

	/**
	 * Configuration options
	 * @var $config array
	 */
	var $controller = null;
	var $config = array(
			'files_dir'   => 'data',
			'rm_tmp_file' => false,
			'allow_non_image_files' => true,
			'images_size' => array(
					'big'   => array(2500, 2500, 'resize'),
					'med'   => array(1500, 1500, 'resize'),
					'small' => array(400,  400, 'resize')
			)
	);

	/**
	 * Initialization method. You may override configuration options from a controller
	 *
	 * @param $controller object
	 * @param $config array
	 */

	public function initialize(array $config): void {
		$this->controller = $this->_registry->getController();
		$prefix = "";
		$this->config = array_merge(
				array('default_col' => $prefix), /* default column prefix is lowercase, singular model name */
				$this->config, /* default general configuration */
				$config        /* overriden configurations */
				);
	}

	/**
	 * Uploads file to file system, according to $config.
	 * Example usage:
	 *	 $this->Attachment->upload($this->data['Model']['Attachment']);
	 *
	 * @return mixed boolean true on success, or error string
	 * @param $data array the file input array
	 * @param $column_prefix string The prefix of the fields used to store the uploaded file data
	 *
	 */
	function upload(&$data, $column_prefix = null) {
		if ($column_prefix == null) {
			$column_prefix = $this->config['default_col'];
		} else {
			$this->config['default_col'] = $column_prefix;
		}

		$file = $data[$this->config['default_col']];
		if ($file['error'] === UPLOAD_ERR_OK) {
			return $this->upload_FS($data);
		} else {
			return $this->log_proper_error($file['error']);
		}
	}

	/**
	 * Creates the relevant dir's and processes the file
	 *
	 * @return mixed boolean true on success, or error string
	 * @param $data array The array of data from the controlle
	 */
	function upload_FS(&$data,$config="") {
		$column_prefix = $this->config['default_col'];
		if($config!=""){
			$model_prefix = Inflector::tableize($this->controller->modelClass);
			$prefix = Inflector::singularize($model_prefix); // make singular. 'GalleryImage' becomes 'gallery_image'
			$this->config = array_merge(
					array('default_col' => $prefix), /* default column prefix is lowercase, singular model name */
					$this->config, /* default general configuration */
					$config        /* overriden configurations */
					);

		}

		$error = 0;

		$tmpuploaddir  = WWW_ROOT.'tmp'; // /tmp/ folder (should delete image after upload)
		$fileuploaddir = WWW_ROOT.'files'.DS.'logs';

		// Make sure the required directories exist, and create them if necessary
		if (!is_dir($tmpuploaddir)) mkdir($tmpuploaddir, 0777, true);
		if (!is_dir($fileuploaddir)) mkdir($fileuploaddir, 0777, true);

		/* Generate a unique name for the file */
		$fltype=explode('.',$data->getClientFilename());
		$filetype = end($fltype);//$data->getClientMediaType();
		$filename = Text::uuid();
		settype($filename, 'string');
		$filename .= '.' . $filetype;

		/* Security check */
		if (!is_uploaded_file($data->getStream()->getMetadata('uri'))) {
			return $this->log_cakephp_error_and_return('Error uploading file (sure it was a POST request?).');
		}

		/* If it's image get image size and make thumbnail copies. */
		if ($this->is_image($filetype)) {

			$this->copy_or_log_error($data->getStream()->getMetadata('uri'), $tmpuploaddir, $filename);
			/* Create each thumbnail_size */
			foreach ($this->config['images_size'] as $dir => $opts) {
				$this->thumbnail($tmpuploaddir.DS.$filename, $dir, $opts[0], $opts[1], $opts[2]);
			}
			if ($this->config['rm_tmp_file'])
				unlink($tmpuploaddir.DS.$filename);
		} else {
			if (!$this->config['allow_non_image_files']) {
				return $this->log_cakephp_error_and_return('File type not allowed (only images files).');
			} else {
				//added by me
				$fileuploaddir = WWW_ROOT.'files'.DS.$this->config["files_dir"];
				@mkdir($fileuploaddir,0777, true);
				$this->copy_or_log_error($data->getStream()->getMetadata('uri'), $fileuploaddir, $filename);

			}
		}

		/* File uploaded, return modified data array */

		$res[$column_prefix.'_file_path'] = $filename;
		$res[$column_prefix.'_file_name'] = $data->getClientFilename();
		$res[$column_prefix.'_file_size'] = $data->getSize();
		$res[$column_prefix.'_content_type'] = $data->getClientMediaType();;
		$data = array_merge((array)$data, $res); /* add default fields */
		return $data;
	}

	/**
	 * Creates resized copies of input image
	 * E.g;
	 *	 $this->Attachment->thumbnail($this->data['Model']['Attachment'], $upload_dir, 640, 480, false);
	 *
	 * @param $tmpfile array The image data array from the form
	 * @param upload_dir string The name of the parent folder of the images
	 * @param $maxw int Maximum width for resizing thumbnails
	 * @param $maxh int Maximum height for resizing thumbnails
	 * @param $crop string either 'resize', 'resizeCrop' or 'crop'
	 */
	function thumbnail($tmpfile, $upload_dir, $maxw, $maxh, $crop = 'resize') {
		// Make sure the required directory exist; create it if necessary
		$upload_dir = WWW_ROOT.'files'.DS.$this->config['files_dir'].DS.$upload_dir;
		if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

		/* Directory Separator for windows users */
		$ds = (strcmp('\\', DS) == 0) ? '\\\\' : DS;

		$fltype=explode('.',$tmpfile);
		//print_r($fltype);exit;
		$filetype = end($fltype);	
		
		//$fl=explode("\\",$fltype["0"]);//for windows	
		$fl=explode("/",$fltype["2"]);//for linux
		
		$file_name = end($fl);
		settype($file_name, 'string');
		$file_name .= '.' . $filetype;
		$this->resize_image($crop, $tmpfile, $upload_dir, $file_name, $maxw, $maxh, 85);
	}

	/**
	 * Deletes file, or image and associated thumbnail
	 * e.g;
	 *	$this->Attachment->delete_files('file_name.jpg');
	 *
	 * @param $filename string The file to delete
	 */
	function delete_files($filename) {
		/* Thumbnail copies */
		foreach ($this->config['images_size'] as $size => $opts) {
			$photo = WWW_ROOT.'files'.DS.$this->config['files_dir'].DS.$size.DS.$filename;
			if (is_file($photo)){
				if(basename($photo)!="no-image.jpg")unlink($photo);
			}
		}
	}

	/*
	 * Creates resized image copy
	 *
	 * Parameters:
	 * cType: Conversion type {resize (default) | resizeCrop (square) | crop (from center)}
	 * tmpfile: original (tmp) file name
	 * newName: include extension (if desired)
	 * newWidth: the max width or crop width
	 * newHeight: the max height or crop height
	 * quality: the quality of the image
	 */
	function resize_image($cType, $tmpfile, $dst_folder, $dstname = false, $newWidth=false, $newHeight=false, $quality = 75) {
		$cType = 'resize';
		$srcimg = $tmpfile;
		list($oldWidth, $oldHeight, $type) = getimagesize($srcimg);
		$ext = $this->image_type_to_extension($type);

		// If file is writeable, create destination (tmp) image
		if (is_writeable($dst_folder)) {
			$dstimg = $dst_folder.DS.$dstname;
		} else {
			// if dst_folder not writeable, let developer know
			debug('You must allow proper permissions for image processing. And the folder has to be writable.');
			debug("Run 'chmod 755 $dst_folder', and make sure the web server is it's owner.");
			return $this->log_cakephp_error_and_return('No write permissions on attachments folder.');
		}

		/* Check if something is requested, otherwise do not resize */
		if ($newWidth or $newHeight) {
			/* Delete tmp file if it exists */
			if (file_exists($dstimg)) {
				unlink($dstimg);
			} else {
				switch ($cType) {
					default:
					case 'resize':
						// Maintains the aspect ratio of the image and makes sure
						// that it fits within the maxW and maxH
						$widthScale  = 2;
						$heightScale = 2;

						/* Check if we're overresizing (or set new scale) */
						if ($newWidth) {
							if ($newWidth > $oldWidth) $newWidth = $oldWidth;
							$widthScale = $newWidth / $oldWidth;
						}
						if ($newHeight) {
							if ($newHeight > $oldHeight) $newHeight = $oldHeight;
							$heightScale = $newHeight / $oldHeight;
						}
						if ($widthScale < $heightScale) {
							$maxWidth  = $newWidth;
							$maxHeight = false;
						} elseif ($widthScale > $heightScale ) {
							$maxHeight = $newHeight;
							$maxWidth  = false;
						} else {
							$maxHeight = $newHeight;
							$maxWidth  = $newWidth;
						}

						if ($maxWidth > $maxHeight){
							$applyWidth  = $maxWidth;
							$applyHeight = ($oldHeight*$applyWidth)/$oldWidth;
						} elseif ($maxHeight > $maxWidth) {
							$applyHeight = $maxHeight;
							$applyWidth  = ($applyHeight*$oldWidth)/$oldHeight;
						} else {
							$applyWidth  = $maxWidth;
							$applyHeight = $maxHeight;
						}
						$startX = 0;
						$startY = 0;
						break;

					case 'resizeCrop':
						/* Check if we're overresizing (or set new scale) */
						/* resize to max, then crop to center */
						if ($newWidth > $oldWidth) $newWidth = $oldWidth;
						$ratioX = $newWidth / $oldWidth;

						if ($newHeight > $oldHeight) $newHeight = $oldHeight;
						$ratioY = $newHeight / $oldHeight;

						if ($ratioX < $ratioY) {
							$startX = round(($oldWidth - ($newWidth / $ratioY))/2);
							$startY = 0;
							$oldWidth  = round($newWidth / $ratioY);
							$oldHeight = $oldHeight;
						} else {
							$startX = 0;
							$startY = round(($oldHeight - ($newHeight / $ratioX))/2);
							$oldWidth  = $oldWidth;
							$oldHeight = round($newHeight / $ratioX);
						}
						$applyWidth  = $newWidth;
						$applyHeight = $newHeight;
						break;

					case 'crop':
						// straight centered crop
						$startY = ($oldHeight - $newHeight)/2;
						$startX = ($oldWidth - $newWidth)/2;
						$oldHeight   = $newHeight;
						$applyHeight = $newHeight;
						$oldWidth    = $newWidth;
						$applyWidth  = $newWidth;
						break;
				}

				switch($ext) {
					case 'gif' :
						$oldImage = imagecreatefromgif($srcimg);
						break;
					case 'png' :
						$oldImage = imagecreatefrompng($srcimg);
						break;
					case 'jpg' :
					case 'jpeg' :
						$oldImage = imagecreatefromjpeg($srcimg);
						break;
					default :
						// image type is not a possible option
						return false;
						break;
				}

				// Create new image
				$newImage = imagecreatetruecolor((int)$applyWidth, (int)$applyHeight);
				// Put old image on top of new image
				imagealphablending($newImage, false);
				imagesavealpha($newImage, true);
				imagecopyresampled($newImage, $oldImage, 0, 0, $startX, $startY, (int)$applyWidth, (int)$applyHeight, (int)$oldWidth, (int)$oldHeight);

				$qual = (int)round($quality/10);

				switch($ext) {
					case 'gif' :
						imagegif($newImage, $dstimg, $quality);
						break;
					case 'png' :
						imagepng($newImage, $dstimg, $qual);
						break;
					case 'jpg' :
					case 'jpeg' :
						imagejpeg($newImage, $dstimg, $quality);
						break;
					default :
						return false;
						break;
				}

				imagedestroy($newImage);
				imagedestroy($oldImage);
				return true;
			}
		} else { /* Nothing requested */
			return false;
		}
	}


	/* Many helper functions */

	function copy_or_log_error($tmp_name, $dst_folder, $dst_filename) {


		if (is_writeable($dst_folder)) {
			if (!copy($tmp_name, $dst_folder.DS.$dst_filename)) {
				unset($dst_filename);
				return $this->log_cakephp_error_and_return('Error uploading file.', 'publicaciones');
			}
		} else {
			// if dst_folder not writeable, let developer know
			debug('You must allow proper permissions for image processing. And the folder has to be writable.');
			debug("Run 'chmod 755 $dst_folder', and make sure the web server is it's owner.");
			return $this->log_cakephp_error_and_return('No write permissions on attachments folder.');
		}
	}

	function is_image($file_type) {
		$image_types = array('jpeg', 'jpg', 'gif', 'png');
		return in_array(strtolower($file_type), $image_types);
	}

	function log_proper_error($err_code) {
		switch ($err_code) {
			case UPLOAD_ERR_NO_FILE:
				return 0;
			case UPLOAD_ERR_INI_SIZE:
				$e = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
				break;
			case UPLOAD_ERR_FORM_SIZE:
				$e = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
				break;
			case UPLOAD_ERR_PARTIAL:
				$e = 'The uploaded file was only partially uploaded.';
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				$e = 'Missing a temporary folder.';
				break;
			case UPLOAD_ERR_CANT_WRITE:
				$e = 'Failed to write file to disk.';
				break;
			case UPLOAD_ERR_EXTENSION:
				$e = 'File upload stopped by extension.';
				break;
			default:
				$e = 'Unknown upload error. Did you add array(\'type\' => \'file\') to your form?';
		}
		return $this->log_cakephp_error_and_return($e);
	}

	function log_cakephp_error_and_return($msg) {
		pr($msg);exit;
		$_error["{$this->config['default_col']}_file_name"] = $msg;
		$this->controller->{$this->controller->modelClass}->validationErrors = array_merge($_error, $this->controller->{$this->controller->modelClass}->validationErrors);
		$this->log($msg, 'upload-component');
		return false;
	}

	function image_type_to_extension($imagetype) {
		if (empty($imagetype)) return false;
		switch($imagetype) {
			case IMAGETYPE_TIFF_II : return 'tiff';
			case IMAGETYPE_TIFF_MM : return 'tiff';
			case IMAGETYPE_GIF  : return 'gif';
			case IMAGETYPE_JPEG : return 'jpg';
			case IMAGETYPE_PNG  : return 'png';
			case IMAGETYPE_SWF  : return 'swf';
			case IMAGETYPE_PSD  : return 'psd';
			case IMAGETYPE_BMP  : return 'bmp';
			case IMAGETYPE_JPC  : return 'jpc';
			case IMAGETYPE_JP2  : return 'jp2';
			case IMAGETYPE_JPX  : return 'jpf';
			case IMAGETYPE_JB2  : return 'jb2';
			case IMAGETYPE_SWC  : return 'swc';
			case IMAGETYPE_IFF  : return 'aiff';
			case IMAGETYPE_WBMP : return 'wbmp';
			case IMAGETYPE_XBM  : return 'xbm';
			default             : return false;
		}
	}
}
