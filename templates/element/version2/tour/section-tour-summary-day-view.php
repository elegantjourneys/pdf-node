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
		$summaryCityList = array();
		foreach($summary['cities'] as $city)
		{
			$summaryCityList[] = $city['name'];
		}
		
  ?>
	<tr>
	  <td><?=$summary['day']?></td>
	  <td>
		<div><p class="m-0"><?=implode(" - ",$summaryCityList)?></p></div>
		<div class="text-secondary lh-lg">
		  <p class="m-0">
		   <?php
				$countDaySummaryEvent=1;
				foreach($summary['events'] as $event)
				{
					if($event['short_description']=="")
					{
						continue;
					}
					if($countDaySummaryEvent==1)
					{
						echo $event['short_description'];
					}
					else
					{
						echo "<br><br>";
						echo $event['short_description'];
					}
					$countDaySummaryEvent++;
				}
			?>
		   
		  </p>
		</div>
	  </td>
	</tr>
	<?php
	}
	?>
	
  </tbody>
</table>