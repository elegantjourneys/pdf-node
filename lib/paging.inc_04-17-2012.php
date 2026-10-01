<?php
if($reccnt > $pagesize)
{
	
 $num_pages=$reccnt/$pagesize;

$PHP_SELF=$_SERVER['PHP_SELF'];
$qry_str=$_SERVER['argv'][0];

$m=$_REQUEST;
unset($m['start']);

$qry_str=str_replace("?","",qry_str($m));

//echo "$qry_str : $p<br>";

//$j=abs($num_pages/10)-1;
$j=$start/$pagesize-5;
//echo("<br>$j");
if($j<0) {
	$j=0;
}
$k=$j+10;
if($k>$num_pages)	{
	$k=$num_pages;
}
$j=intval($j);
?>
<link rel="stylesheet" href="css/algarve.css" type="text/css">
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<table border="0" cellspacing="0" cellpadding="0" align="center" class="txt"> 
  <tr> 
    <!--td  align="left"><a href="<?php echo $PHP_SELF;?><?php echo $qry_str?>&start=0" class="txt"> First</a>&nbsp; </td> 
    <td  align="center" height="20"> <a href="<?php echo $PHP_SELF;?><?php echo $qry_str;?>&start=<?php echo $start-$pagesize;?>"  class="txt"> 
      <?php
		if($start!=0)
		{

?> 
&laquo; Previous
      <?php echo $pagesize;?> 
      </a>&nbsp; 
      <?php
		}
?> </td> 
    <td align="center" height="20"> <span > 
      <?php
	if($start+$pagesize < $reccnt){
		?> 
&nbsp;&nbsp; <a href="<?php echo $PHP_SELF;?><?php echo $qry_str;?>&start=<?php echo $start+$pagesize;?>" class="txt">Next
      <?php echo $pagesize?> 
&raquo;</a>&nbsp; 
      <?php
		}
  ?> 
      </span>&nbsp;</td> 
    <td  align="center" height="20"><?php $mod=$reccnt%$pagesize; if($mod==0){$mod=$pagesize;}?> 
      <a href="<?php echo $PHP_SELF;?><?php echo $qry_str;?>&start=<?php echo $reccnt-$mod;?>" class="txt">Last</a> </td--> 
    <td align="right" > &nbsp;&nbsp;&nbsp; 
      <?php
			
			for($i=$j;$i<$k;$i++)
			{
				if($i==$j)echo "Page No.: ";
			   if(($pagesize*($i))!=$start)
				  {
	  ?> 
     
      <a href="<?php echo $PHP_SELF;?>?start=<?php echo $pagesize*($i);?>&<?php echo $qry_str;?>" style="color:#990000; font-size:18px;"><?php echo $i+1;?></a> 
      <?php
		}
	  else{
	  ?> 
       <span  style="font-size:18px;">
      <?php echo $i+1;?> 
       </span>
      <?php
	  }
 }?> </td> 
  </tr> 
</table> 
<?php }
?> 
