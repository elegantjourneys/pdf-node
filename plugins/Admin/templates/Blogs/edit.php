<section id="content">
 <section class="vbox">
  <section class="scrollable padder">
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
       <li>
       	<?php echo $this->Html->link('<i class="fa fa-home"></i><span>Home</span>',array("controller"=>"home","action"=>"index"),array("escape"=>false));?>
       </li>
       <li><a href="#">Blogs</a></li>
    </ul> 
<div class="row"> 
                <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold"><?php echo $page_title;?></header>
                    <div class="panel-body">
                      <?php echo $this->Form->create(null,array("controller"=>"blogs","id"=>"form-validation", "type" => "file"));?>
    					<?php echo $this->Form->input('id',array('type'=>"hidden"));?>
	
                        <div class="form-group">
                          	<label>Title<span style="color:red;">*</span></label>
                         	<?php echo $this->Form->input("title",array("div"=>false,"label"=>false,"class"=>"form-control","required"=>"required","value"=>@$data["title"]));?>
                        </div>                        
						<div class="form-group">
                          	<label>Page Url<span style="color:red;">*</span></label>
                         	<?php echo $this->Form->input("page_url",array("div"=>false,"label"=>false,"class"=>"form-control","required"=>"required","value"=>@$data["page_url"]));?>
                        </div>
                        <div class="form-group">

                            <label>Image (Upload)</label>
                            <?php echo $this->Form->input("image", array("type"=>"file","div" => false, "label" => false, "class" => "form-control", "id" => "img")); ?>
                            <?php
                                if(!empty(@$data["image"])){
                            ?>
                                <span><br />
                                  <img src="<?php echo WEBROOT.'files/files/small/'.@$data['image'] ?>" class="img" height="60">
                                </span>
                            <?php
                                }

                            ?>
                        </div>
						<div class="form-group">
                          <label>Description</label>
                          
                          <?php echo $this->Form->textarea("description",array("div"=>false,"label"=>false,"class"=>"form-control","id"=>"description","value"=>@$data["blog_description"]["description"]));?>
                        </div>
                        <div class="form-group">
                          <label>Meta Title</label>
                          
                          <?php echo $this->Form->input("meta_title",array("div"=>false,"label"=>false,"class"=>"form-control","value"=>@$data["blog_seo_tag"]["meta_title"]));?>
                        </div>
						<div class="form-group">
                          <label>Meta Keyword</label>
                          
                          <?php echo $this->Form->input("meta_keyword",array("div"=>false,"label"=>false,"class"=>"form-control","value"=>@$data["blog_seo_tag"]["meta_keyword"]));?>
                        </div>

						<div class="form-group">
                          <label>Meta Description</label>
                          
                          <?php echo $this->Form->textarea("meta_description",array("div"=>false,"label"=>false,"class"=>"form-control","id"=>"meta_description","value"=>@$data["blog_seo_tag"]["meta_description"]));?>
                        </div>
                        
                      <?php echo $this->Form->submit("Save",array("class"=>"btn btn-sm btn-success","id"=>"submitBtn"))?>
                      <?php echo $this->Form->end();?>
                    </div>
                  </section>
                </div>
                </div>
                </section>
                </section>
                </section>
                <script type="text/javascript">
	//<![CDATA[
		// This call can be placed at any point after the
		// <textarea>, or inside a <head><script> in a
		// window.onload event handler.
		// Replace the <textarea id="editor"> with an CKEditor
		// instance, using default configurations.
		//var editor = CKEDITOR.replace( 'description' );
		
		//CKFinder.setupCKEditor( editor, '<?php echo $this->Url->build(array("controller" => "", "action" => "../js/ckfinder/"));?>' ) ;
		
		var editor = CKEDITOR.replace( 'description' );
        CKFinder.setupCKEditor( editor, null, { type: 'Files', currentFolder: '/js/' } );
	//]]>
</script>
