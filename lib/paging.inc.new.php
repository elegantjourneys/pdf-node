<?php
if($reccnt > $pagesize)
{
 
	$num_pages=ceil($reccnt/$pagesize);
	$PHP_SELF=$_SERVER['PHP_SELF'];


$m=$_REQUEST;
unset($m['start']);

$qry_str=str_replace("?","",qry_str($m));

$j=$start/$pagesize-5;

//echo("<br>$j");
if($j<0) {
	$j=0;
}
$j=0;
$k=$j+10;
if($k>$num_pages)	{
	$k=$num_pages;
}
$k=$num_pages;
$j=intval($j);
?>
<link rel="stylesheet" href="css/algarve.css" type="text/css">
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<table border="0" cellspacing="0" cellpadding="0"  class="txt"> 
  <tr> 
    
    <td align="left" > &nbsp;&nbsp;&nbsp; 
      <?php
			
			for($i=$j;$i<$k;$i++)
			{
				if($i==$j)echo "Page No.: ";
			   if(($pagesize*($i))!=$start)
				  {
	  ?> 
     
      <a href="<?php echo $PHP_SELF;?>?start=<?php echo $pagesize*($i);?>" style="color:#990000; font-size:12px;" class="tooltip"><?php echo $i+1;?>
	  <?php
			$strsqlTour = "select id from tbl_managetour limit ".$pagesize*($i).", 5";
			$resultTour = mysql_query($strsqlTour);
			$tourIds=array();
			while($infoTour=mysql_fetch_array($resultTour,MYSQL_ASSOC))
			{
				$tourIds[]=$infoTour['id'];
			
			}

	  ?>
	   <span style="font-size:10px;"> 
		<strong>Page <?=$i+1?> contains following IDs</strong><br />
		<?=implode(",",$tourIds)?></span>
	  
	  </a> &nbsp;
      <?php
		}
	  else{
	  ?> 
       <span  style="font-size:12px;">
      <?php echo $i+1;?> 
       </span>
      <?php
	  }
 }?> </td> 
  </tr> 
</table> 
<?php }
?> 
