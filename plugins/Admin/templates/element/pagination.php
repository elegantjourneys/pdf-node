<div class="row" style='border:0px solid red;'>
     <?php 
	 /*
	 $this->Paginator->options([
    'url' => [
        'sort' => null,
        'direction' => null
        
    ]
]);*/
/*
$this->Paginator->options([
    'url' => [
        //'sort' => null,
        //'direction' => null,
        @$this->passedArgs[0],
        @$this->passedArgs[1],
        @$this->passedArgs[2],
        @$this->passedArgs[3],
        //'?'=>$_GET
        
    ]
]);
*/
$this->Paginator->generateUrl([
    
        //'sort' => null,
        //'direction' => null,
       /*  @$this->passedArgs[0],
        @$this->passedArgs[1],
        @$this->passedArgs[2],
        @$this->passedArgs[3], */
        //'?'=>$_GET
        

]);

?>
   <div class="col-md-12 text-center">
        <ul class="pagination pagination-mg">
        	<li><?php
				echo $this->Paginator->prev(
				   __('<i class="fa fa-arrow-left"></i>'),
				  array("escape"=>false),
				  null,
				  array('class' => 'prev disabled',"escape"=>false)
				);
		
			?></li>
           <?php 
           		echo $this->Paginator->numbers(array("tag"=>"li","currentClass"=>"active","currentTag"=>"a class='active'","separator"=>"<li />"));
           	?>
           	<li>
           	<?php
				echo $this->Paginator->next(__('<i class="fa fa-arrow-right"></i>'), 
				array("class"=>"prev disabled","escape"=>false), 
				__('<i class="fa fa-arrow-right"></i>')
				,array("class"=>"prev disabled","escape"=>false));
		
			?></li>
		
        </ul>
        <p>
        	<?php echo $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}'); ?>
        </p>
       
    </div>
</div>