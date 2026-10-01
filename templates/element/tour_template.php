<div id="page-container"> 
<!-- Header -->
  <table style="width:100%; border-bottom:3px solid #003366; margin-bottom:40px;">
    <tr>
      <td><img src="https://www.elegantjourneys.com/version2/assets/images/new-logo.png" alt="Logo" style="width:180px;height:40px;" /></td>
      <td style="text-align:right; font-size:12px; color:#333; line-height:1.5;">
        D-8/8048 Vasant Kunj, New Delhi 110070, India<br/>
        www.elegantjourneys.com | Sales@ElegantJourneys.com
      </td>
    </tr>
  </table>

  <!-- Title -->
  
      <h1 style="text-align:center; color: #b8860b; text-transform:uppercase; letter-spacing:2px; font-size:28px;">
        <?php echo h(ucwords($tourData['name'])); ?>
      </h1>
      <p style="margin:5px 0 0;text-align:center; font-size:16px; color:#b8860b; text-shadow:1px 1px 5px #fff; font-weight:bold;">
        Pre-Conference Tour
      </p>
    

  <!-- Programme Sketch -->
  <h2 class="section-head">Programme Sketch</h2>
  <table style="width: 100%; border-collapse: collapse; font-size: 13px; margin-top: 12px;" id="programme-table">
    <thead><tr><th style="border: 1px solid #ccc; padding: 10px; background: #003366; color: #fff;">Day</th><th style="border: 1px solid #ccc; padding: 10px; background: #003366; color: #fff;">City</th></tr></thead>
    <tbody>
      <?php foreach ($tourData['city_day_list'] as $row): ?>
      <tr>
        <td style="border: 1px solid #ccc; padding: 8px; background: #fafafa; ">Day <?php echo h($row['start_day']); ?>–<?php echo h($row['end_day']); ?></td>
        <td style="border: 1px solid #ccc; padding: 8px; background: #fafafa; "><?php echo h($row['city_name']); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Detailed Itinerary -->
  <!-- ── Detailed Itinerary ────────────────────────────────────────────── -->
   <?php 					
		if($tourData['view_type']=='city_view')
		{ 
      //echo $this->element('tours/city-view-itineraray');
    ?>

    <h2 style="font-size:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; margin-top:40px;">
      Detailed Programme
    </h2>
	<?php
		foreach($tourData['cities'] as $cities)
		{
			
	?>
			<h3 style="font-size:18px; margin-top:20px; color:#ffffff; background:#003366; padding:4px;"><?=$cities['city_name']?></h3>
			<h5 style="font-size:15px; margin-top:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; ">Day <?=$cities['start_day']?>-<?=$cities['end_day']?></h5>
	<?php
			foreach($cities['events'] as $events)
			{
	?>
				
				
				<p style="font-size:13px; line-height:1.6; color:#333;">
				  <?php echo $events['description'] ?>
				</p>
			
	<?php
			
			}
	?>
			<h3 style="font-size:15px; margin-top:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; ">Hotels </h3>
			<?php
				foreach($cities['hotels'] as $hotelGroup)
				{
					
			?>
					<table style="width:100%; border-collapse:collapse; font-size:13px; margin-top:12px;">
				  <thead>
					<tr>
					  <th style="border:1px solid #ccc; padding:10px; color:#003366; " colspan="2">
						<?=$hotelGroup['hotel_type_name']?>
					  </th>
					</tr>
					<tr>
					  <th style="border:1px solid #ccc; padding:10px; color:#003366; width:50%">
						Hotel
					  </th>
					  <th style="border:1px solid #ccc; padding:10px; color:#003366;">
						Room
					  </th>
					</tr>
				  </thead>

					  <tbody>
						<?php
							foreach($hotelGroup['hotels'] as $hotel)
							{
						?>
						<tr style="background:#fafafa;">
						  <td style="border:1px solid #ccc; padding:8px;"><?=$hotel['hotel_name']?></td>
						  <td style="border:1px solid #ccc; padding:8px;"><?=$hotel['room_name']?></td>
						  
						</tr>
					    <?php
							}
						?>
						
					  </tbody>
					</table>
			<?php
				
				}
			?>
	<?php
		}
	?>
			
	<?php	}
		else
		{ 
      //echo $this->element('tours/day-view-itineraray');
      ?>
     <h2 style="font-size:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; margin-top:40px;">
      Detailed Programme
    </h2>
	<?php
		foreach($tourData['cities'] as $cities)
		{
	?>
			<h3 style="font-size:18px; margin-top:20px; color:#ffffff; background:#003366; padding:4px;">Day <?=$cities[0]['day_count']?></h3>
	<?php
			$i=0;
			while(@$cities[$i]['id'])
			{
				$cityInfo = $cities[$i];
	?>
				<h5 style="font-size:15px; margin-top:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; "><?=$cityInfo['city_name']?></h5>
				<?php
					foreach($cityInfo['events'] as $events)
					{
						
				?>
						<p style="font-size:13px; line-height:1.6; color:#333;">
						  <?php echo $events['description'] ?>
						</p>
				
				<?php
					}
				?>
			
			
			
	<?php
				$i++;
			}
	?>
			<h3 style="font-size:15px; margin-top:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; ">Hotels </h3>
			<?php
				foreach($cities['hotels'] as $hotelGroup)
				{
					
			?>
					<table style="width:100%; border-collapse:collapse; font-size:13px; margin-top:12px;">
				  <thead>
					<tr>
					  <th style="border:1px solid #ccc; padding:10px; color:#003366; " colspan="2">
						<?=$hotelGroup['hotel_type_name']?>
					  </th>
					</tr>
					<tr>
					  <th style="border:1px solid #ccc; padding:10px; color:#003366; width:50%">
						Hotel
					  </th>
					  <th style="border:1px solid #ccc; padding:10px; color:#003366;">
						Room
					  </th>
					</tr>
				  </thead>

					  <tbody>
						<?php
							foreach($hotelGroup['hotels'] as $hotel)
							{
						?>
						<tr style="background:#fafafa;">
						  <td style="border:1px solid #ccc; padding:8px;"><?=$hotel['hotel_name']?></td>
						  <td style="border:1px solid #ccc; padding:8px;"><?=$hotel['room_name']?></td>
						  
						</tr>
					    <?php
							}
						?>
						
					  </tbody>
					</table>
			<?php
				
				}
			?>
	<?php
		}
	?> 
			
	<?php	}
		
	?>


  <!-- Inclusions & Exclusions -->
  <h2 class="section-head">Inclusions &amp; Exclusions</h2>
  <div class="inc-exc">
    <div class="inc-col">
      <h3 style="font-size:15px; color:#003366; margin-bottom:10px;">Inclusions</h3>
      <ul>
        <?php foreach ($tourData['inclusion'] as $inc): ?>
        <li><?php echo h($inc['description']); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="inc-col">
      <h3 style="font-size:15px; color:#003366; margin-bottom:10px;">Exclusions</h3>
      <ul>
        <?php foreach ($tourData['exclusion'] as $exc): ?>
        <li><?php echo h($exc['description']); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <!-- Terms -->
  <h2 class="section-head">Terms &amp; Conditions</h2>
  <p style="font-size:13px; line-height:1.6; color:#333;">
    All bookings subject to availability. Prices may change due to hotel / airline / tax revisions. Cancellation charges apply as per policy.
  </p>

  <!-- Contact -->
  <div class="contact-box">
    <strong>Prepared by:</strong> Elegant Journeys<br/>
    D-8/8048 Vasant Kunj, New Delhi 110070, India<br/>
    <strong>Website:</strong> www.elegantjourneys.com &nbsp;|&nbsp;
    <strong>Email:</strong> Sales@ElegantJourneys.com
  </div>

  <div class="page-footer">© 2026 Elegant Journeys</div>
</div>