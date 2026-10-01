 <table class="table w-100">
  <thead>
	<tr>
	  <th class="fw-semibold">Day</th>
	  <th class="fw-semibold">Place</th>
	</tr>
  </thead>
  <tbody>
  <?php
	foreach($data['tour_summary']['summary'] as $summary)
	{
		$daySummaryTitle = $summary['start_day'].'-'.$summary['end_day'];
		
		if($summary['start_day']==$summary['end_day'])
		{
			$daySummaryTitle = $summary['start_day'];
		}
		
  ?>
	<tr>
	  <td><?=$daySummaryTitle?></td>
	  <td>
		<div><p class="m-0"><?=$summary['city_name']?></p></div>
		<div class="text-secondary lh-lg">
		  <p class="m-0">
		   <?=$summary['city_description']?>
		  </p>
		</div>
	  </td>
	</tr>
	<?php
	}
	?>
	
  </tbody>
</table>