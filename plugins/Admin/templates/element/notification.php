<?php 
if(@$_GET["msg"]!=""){
	$msg = "";
	switch($_GET["msg"])
	{
		case 'edit':
				$msg="Edited Successfully.";
			break;
		case 'add':
				$msg="Added Successfully.";
			break;
		case 'delete':
			$msg="Deleted Successfully.";
			break;
		default:
				$msg = $_GET["msg"];
			break;
	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		    <h4><i class="fa fa-check-circle"></i><?php echo "  ".$msg;?></h4>
		</div>
	</div>
</div>
<?php } ?>