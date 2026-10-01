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