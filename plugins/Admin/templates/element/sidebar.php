<nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li>
                      <?php echo $this->Html->link('<i class="fa fa-dashboard icon"><b class="bg-danger"></b></i><span>Home</span>',array("controller"=>"dashboard","action"=>"index"),array("escape"=>false));?>
                    </li>
                    
                    <li >
                          <?php echo $this->Html->link('<i class="fa fa-user icon"><b class="bg-warning"></b></i><span>Blogs</span>',array("controller"=>"Blogs","action"=>"listing"),array("escape"=>false));?>
                    </li>
                   
                   </ul>
                </nav>