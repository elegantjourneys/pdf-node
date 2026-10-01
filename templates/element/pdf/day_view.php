  <h2>Your Tour Itinerary</h2>
<?php 
	foreach ($tourData['cities'] as $cities)
	{
		$dayCityList = array();
		foreach($cities as $key=>$city)
		{
			if($key=='hotels')
			{
				continue;
			}
			
			if($key=='0')
			{
				$dayCount = $city['day_count'];
			}
			
			$dayCityList[] = $city['city_name'];
			
		}
		
	
?>
  <!-- DAY 1 -->
  <div class="day-header">
    <span class="day-badge">Day <?php echo $dayCount; ?></span>
    <!--<span class="day-date">07 Jul 2026, Tuesday</span>-->
    <span class="day-destination"><?php echo h(implode(", ",$dayCityList)); ?></span>
  </div>
<?php
	foreach($cities as $key=>$city)
	{
		if($key=='hotels')
		{
			continue;
		}
?>
  <p><strong>Destination: <?php echo h($city['city_name']); ?></strong></p>
		<?php
			foreach($city['events'] as $event)
			{
				if($event['description']=="")
				{
					continue;
				}
		?>
			  <b><?php echo $event['name']; ?></b>
			  <p><?php echo $event['description']; ?></p>
		<?php
			}
	}
	?>

  <!--<div class="inclusions-box">
    <div class="inc-title">Experiences / Services Included</div>
    <ul><li>Private chauffeur-driven vehicle for seamless travel</li></ul>
  </div>-->
 <?php 
	}
 ?> 


  <p><em>End of tour services.</em></p>
  <p><strong>Note:</strong> We can customise this tour to extend to other destinations as per your preference.</p>