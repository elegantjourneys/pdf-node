<?php
declare(strict_types=1);

namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Core\Configure;

/**
 * Blogs Controller
 *
 * @method \Admin\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogsController extends AppController
{
public $modelClass = "Blogs";

 public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('Admin.Upload', array(
            'files_dir'   => 'files',
            'rm_tmp_file' => false,
            'allow_non_image_files' => true,
            'images_size' => array(
                'big'   => array(1500, 1500, 'resize'),
                'med'   => array(600, 600, 'resize'),
                'small' => array(100,  100, 'resize')
            )
        ));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    //Configure::write('debug',true);


}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    function listing($s=""){

        $blogs = $this->fetchTable('Blogs');

			$this->set("page_title","Blogs");

			$options['limit']=100;
			$options['contain'] =array("BlogDescriptions");

            //print_r($options);exit;

			$this->paginate =$options;

			$data = $this->paginate($blogs)->toArray();

			//print_r($data);exit;

			$this->set("data",$data);
	    	$this->render('listing');

	}


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        ini_set('memory_limit', '256M');

        $this->set("page_title","Add Blogs");
        //$blogs = $this->fetchTable('Admin.Blogs');
        $blogDetails  = $this->getTableLocator()->get('BlogDescriptions');
        $blogSeoTags = $this->fetchTable('BlogSeoTags');
        //print_r($blogDetails);exit;
        if ($this->request->is('post')) {

                //pr($this->request->getData());exit;
				$data = $this->Blogs->newEmptyEntity();
				$data->title = $this->request->getData("title");
				$data->page_url= $this->request->getData("page_url");
				

				
				
				$imgFile =  $this->request->getUploadedFile('image');
                //$imgFile = $this->request->getData("image");
                $hasFileError = $imgFile->getError();
                //print_r($hasFileError);exit;
                if ($hasFileError > 0) {
                    // no file uploaded
                    $data->image = "";
                } else {
                    // file uploaded
                    $uploadFileDetails = $this->Upload->upload_FS($imgFile);
                    //exit;
                    if ($uploadFileDetails) {
                        $data->image = $uploadFileDetails["_file_path"];
                    } else {
                        $data->image = "";
                    }
                }	
				
                $data->modified = date("Y-m-d H:s:i");
				//$data = $this->Blogs->patchEntity($data, $this->request->getData());
				//pr($data);exit;
				if($this->Blogs->save($data)){
					$cddata = $blogDetails->newEntity($this->request->getData());
					$cddata->blog_id= $data->id;

					$cddata->description= $this->request->getData("description");
					$cddata->modified = date("Y-m-d H:s:i");
                    $cddata = $blogDetails->patchEntity($cddata, $this->request->getData());
					if($blogDetails->save($cddata)){

						$cstdata = $blogSeoTags->newEmptyEntity();
						$cstdata->blog_id= $data->id;
						$cstdata->meta_title= $this->request->getData("meta_title");
						$cstdata->meta_description= $this->request->getData("meta_description");
						$cstdata->meta_keyword= $this->request->getData("meta_keyword");
						$cstdata->modified = date("Y-m-d H:s:i");
						//echo "<pre>";print_r($cstdata);exit;
                        $cddata = $blogSeoTags->patchEntity($cstdata, $this->request->getData());
						$blogSeoTags->save($cstdata);
					}

					$this->redirect(array("controller"=>"blogs","action"=>"listing?msg=add"));
				}

            }

    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogDetails  = $this->getTableLocator()->get('BlogDescriptions');
        $blogSeoTags = $this->fetchTable('BlogSeoTags');
        
        $this->set("page_title","Edit Blogs");
        $data = $this->Blogs->get($id, [
            'contain' => ['BlogDescriptions','BlogSeoTags'],
        ]);
    
       // print_r($data);exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$data = $this->Blogs->patchEntity($data, $this->request->getData());
            
            $data = $this->Blogs->get($id);
            $data->title = $this->request->getData("title");
			$data->page_url= $this->request->getData("page_url");
				
			$imgFile =  $this->request->getUploadedFile('image');
            $hasFileError = $imgFile->getError();
            //pr($hasFileError);exit;
            if ($hasFileError > 0) {
                // no file uploaded
                $data->image = $data["image"];
            } else {
                // file uploaded
                $uploadFileDetails = $this->Upload->upload_FS($imgFile);
                //exit;
                if ($uploadFileDetails) {
                    $data->image = $uploadFileDetails["_file_path"];
                } else {
                    $data->image = "";
                }
            }	
            
            //pr($data);exit;
			
            $data->modified = date("Y-m-d H:s:i");
            if ($this->Blogs->save($data)) {
                

                $cddata = $blogDetails->find("all",array("conditions"=>array("BlogDescriptions.blog_id"=>$id)))->toArray();

				if(!empty($cddata)){
					$cddata = $blogDetails->get($cddata["0"]["id"]);
				}else{
					$cddata = $blogDetails->newEmptyEntity();
				}
				$cddata->blog_id= $data->id;

				$cddata->page_url= $this->request->getData("page_url");
				$cddata->description= $this->request->getData("description");
				$cddata->modified = date("Y-m-d H:s:i");
				//pr($cddata);exit;
				if($blogDetails->save($cddata)){

					$cst_data = $blogSeoTags->find("all",array("conditions"=>array("BlogSeoTags.blog_id"=>$id)))->toArray();
					if(!empty($cst_data)){
						$cstdata = $blogSeoTags->get($cst_data[0]["id"]);
					}else{
						$cstdata = $blogSeoTags->newEmptyEntity();
					}


					$cstdata->blog_id= $data->id;
					$cstdata->meta_title= $this->request->getData("meta_title");
					$cstdata->meta_description= $this->request->getData("meta_description");
					$cstdata->meta_keyword= $this->request->getData("meta_keyword");
					$cstdata->modified = date("Y-m-d H:s:i");
					$blogSeoTags->save($cstdata);

				}

                return $this->redirect(['action' => 'listing']);
            }
            $this->Flash->error(__('The blog could not be saved. Please, try again.'));
        }
		
        $this->set(compact('data'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $blogDetails  = $this->getTableLocator()->get('BlogDescriptions');
        $blogSeoTags = $this->fetchTable('BlogSeoTags');

        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $cddata = $blogDetails->find("all",array("conditions"=>array("BlogDescriptions.blog_id"=>$id)))->toArray();
		if(!empty($cddata)){
			$cdresult = $blogDetails->delete($cddata[0]);
		}

		$cst_data = $blogSeoTags->find("all",array("conditions"=>array("BlogSeoTags.blog_id"=>$id)))->toArray();
		if(!empty($cst_data)){
			$csresult = $blogSeoTags->delete($cst_data[0]);
		}

		$this->redirect(array("controller"=>"blogs","action"=>"listing?msg=delete"));
        } else {
            $this->Flash->error(__('The blog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
