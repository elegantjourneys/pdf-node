<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo ucwords($tourData['name']); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    #copy-toolbar {
      position: sticky;
      top: 0;
      z-index: 999;
      background: #003366;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: end;
      padding: 10px 24px;
      box-shadow: 0 2px 8px rgba(0,0,0,.35);
    }
  </style>
</head>
<body style="font-family:'Segoe UI', Arial, sans-serif; margin:0; padding:0; background:#f4f6f9;">

 <div id="copy-toolbar">
  <a href="<?= WEBROOT ?>/tours/copy-page/<?php echo h($tourData['token']); ?>"
     style="display:inline-block; padding:9px 20px; background: #ed2121;color:#fff; text-decoration:none; font-size:13px;font-weight:600; border-radius:4px;">
    📋 Copy &amp; Edit Page
  </a>
</div>

  <!-- Page Container -->
  <div style="max-width:850px; margin:30px auto; background:#fff; padding:40px; border-top:6px solid #b8860b;">
   

    <!-- Header -->
    <table style="width:100%; border-bottom:3px solid #003366; margin-bottom:40px;">
      <tr>
        <td style="text-align:left;">
          <img src="https://www.elegantjourneys.com/version2/assets/images/new-logo.png" alt="Logo" style="width: 180px;height:40px;">
        </td>
        <td style="text-align:right; font-size:12px; color:#333; line-height:1.5;">
        
          D-8/8048 Vasant Kunj, New Delhi 110070, India <br/>
          www.elegantjourneys.com | Sales@ElegantJourneys.com
        </td>
      </tr>
    </table>
	
	<?php
		echo "<pre>";
		//print_r($tourData['cities']);
		echo "</pre>";
	?>

    <!-- Banner with overlay -->
    <div style="position:relative; margin-bottom:40px;">
      <img src="https://www.elegantjourneys.com/version2/assets/images/popular-tours-banner.png" 
           alt="Golden Triangle Banner"
           style="width:100%; max-height:280px; object-fit:cover; border:4px solid #003366;" />
      <div style="position:absolute; top:60px; left:0; right:0; text-align:center;">
        <h1 style="margin:0; font-size:34px; color:#fff; text-shadow:2px 2px 8px rgba(0,0,0,0.7); text-transform:uppercase; letter-spacing:2px;">
          <?php echo ucwords($tourData['name']); ?>
        </h1>
        <p style="margin:5px 0 0; font-size:16px; color:#f4f4f4; text-shadow:1px 1px 5px rgba(0,0,0,0.6); font-weight:bold;">
          Pre-Conference Tour
        </p>
      </div>
    </div>

    <!-- Programme Sketch -->
    <h2 style="font-size:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; margin-top:30px;">
      Programme Sketch
    </h2>
    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-top:12px;">
      <thead>
        <tr>
          <th style="border:1px solid #ccc; padding:10px; background:#003366; color:#fff;">Day</th>
          <th style="border:1px solid #ccc; padding:10px; background:#003366; color:#fff;">City</th>
         
        </tr>
      </thead>
      <tbody>
        <?php 
			foreach ($tourData['city_day_list'] as $cityDayList)
			{
		?>
        <tr style="background:#fafafa;">
          <td style="border:1px solid #ccc; padding:8px;">Day <?=$cityDayList['start_day']?>-<?=$cityDayList['end_day']?></td>
          <td style="border:1px solid #ccc; padding:8px;"><?=$cityDayList['city_name']?></td>
          
        </tr>
        <?php
			}
		?>
        
      </tbody>
    </table>

    <!-- Detailed Programme -->
    
    <?php 
							
		if($tourData['view_type']=='city_view')
		{
			echo $this->element('tours/city-view-itineraray');
		}
		else
		{
			echo $this->element('tours/day-view-itineraray');
		}
		
	?>
	

    <!-- Cost Proposal -->
    <!-- <h2 style="font-size:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; margin-top:40px;">
      Cost Proposal
    </h2>
    <table style="width:100%; border-collapse:collapse; font-size:13px; margin-top:12px;">
      <thead>
        <tr>
          <th style="border:1px solid #ccc; padding:10px; background:#003366; color:#fff;">No. of Pax</th>
          <th style="border:1px solid #ccc; padding:10px; background:#003366; color:#fff;">Cost per person (US$)</th>
        </tr>
      </thead>
      <tbody>
        <tr style="background:#fafafa;">
          <td style="border:1px solid #ccc; padding:8px;">2 persons</td>
          <td style="border:1px solid #ccc; padding:8px;">US$ 950</td>
        </tr>
        <tr>
          <td style="border:1px solid #ccc; padding:8px;">4 persons</td>
          <td style="border:1px solid #ccc; padding:8px;">US$ 720</td>
        </tr>
      </tbody>
    </table> -->

   

    <!-- Inclusions & Exclusions -->
    <h2 style="font-size:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; margin-top:40px;">
      Inclusions & Exclusions
    </h2>
    <div style="display:flex; gap:40px; margin-top:15px;">
      <div style="flex:1;">
        <h3 style="font-size:15px; color:#003366; margin-bottom:10px;">Inclusions</h3>
        <ul style="padding-left:18px; font-size:13px; line-height:1.6; color:#333; margin:0;">
		<?php
			foreach($tourData['inclusion'] as $inclusion)
			{
		?>
				<li><?=$inclusion['description']?></li>
		<?php
			}
		?>
        </ul>
      </div>
      <div style="flex:1;">
        <h3 style="font-size:15px; color:#003366; margin-bottom:10px;">Exclusions</h3>
			<ul style="padding-left:18px; font-size:13px; line-height:1.6; color:#333; margin:0;">
			<?php
				foreach($tourData['exclusion'] as $exclusion)
				{
			?>
					<li><?=$exclusion['description']?></li>
			<?php
				}
			?>
			</ul>
      </div>
    </div>

    <!-- Terms & Contact -->
    <h2 style="font-size:20px; color:#003366; border-bottom:2px solid #b8860b; padding-bottom:6px; margin-top:40px;">
      Terms & Conditions
    </h2>
    <p style="font-size:13px; line-height:1.6; color:#333;">
      All bookings subject to availability. Prices may change due to hotel / airline / tax revisions.
      Cancellation charges apply as per policy.
    </p>

    <!-- Contact -->
    <div style="background:#fdf6e3; padding:18px; margin-top:25px; font-size:13px; line-height:1.6; border-left:5px solid #b8860b;">
      <strong>Prepared by:</strong> Elegant Journeys<br/>
      D-8/8048 Vasant Kunj, New Delhi 110070, India<br/>
      <strong>Website:</strong> www.elegantjourneys.com &nbsp; | &nbsp; <strong>Email:</strong> Sales@ElegantJourneys.com
    </div>

    <!-- Footer -->
    <div style="text-align:center; margin-top:40px; font-size:12px; color:#fff; background:#003366; padding:14px;">
       2025 Elegant Journeys
    </div>
  </div>

</body>
</html>
