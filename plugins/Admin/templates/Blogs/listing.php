<section id="content">

 <section class="vbox">

  <section class="scrollable padder">

	<ul class="breadcrumb no-border no-radius b-b b-light pull-in">

       <li><?php echo $this->Html->link('<i class="fa fa-home"></i><span>Home</span>',array("controller"=>"home","action"=>"index"),array("escape"=>false));?></li>

       <li><a href="#">Blogs</a></li>

    </ul>            

      <?php echo $this->element("Admin.notification");?>      

		<section class="panel panel-default">

                <header class="panel-heading">

                <b><?php echo $page_title; ?></b>

                

                </header>

                <div class="row text-sm wrapper">

                   

                  <div class="col-sm-12">

                    <div class="input-group pull-right">

                       <?php echo $this->Html->link('<b>+ ADD</b>',array("controller"=>"blogs","action"=>"add"),array("escape"=>false,"class"=>"btn btn-xs btn-info"));?>

                    </div>

                  </div>

                  

                </div>

                <div class="table-responsive">

                  <table class="table table-striped b-t b-light text-sm">

                    <thead>

                      <tr>

                        <th width="400">Title</th>

                        <!--th>Description</th-->

                        <th width="200">Action</th>

                      </tr>

                    </thead>

                    <tbody>

                    <?php foreach($data as $dt){ ?>

                      <tr>

                        <td><?php echo $dt->title; ?></td>

                        <!--td><?php //echo @$dt["blog_details"][0]->description; ?></td-->

                        <td>

	              

						  <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',array("controller"=>"blogs","action"=>"edit/".$dt["id"]),array("escape"=>false,"class"=>"btn btn-xs btn-warning"));?>

			              <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',array("controller"=>"blogs","action"=>"delete/".$dt["id"]),array("escape"=>false,"class"=>"btn btn-xs btn-danger",'confirm'=>'Are you sure you want to delete?'));?>

			                    

                        </td>

                      </tr>

                     <?php } ?> 

                    </tbody>

                  </table>

                </div>

                <footer class="panel-footer">

                  <div class="row">

                    <?php echo $this->element("Admin.pagination");?>

                  </div>

                </footer>

          </section>

              

              

</section>

</section>

</section>