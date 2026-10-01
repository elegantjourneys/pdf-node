<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo h(ucwords($tourData['name'])); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            background: #fff;
        }

        @page {
            margin-top: 70px;
            margin-bottom: 60px;

            @top-center {
                content: element(pageHeader);
            }

            @bottom-center {
                content: element(pageFooter);
            }

        }

        .page {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px 40px;
        }

        .pdf-page-header {
            position: running(pageHeader);
            background: #f8f1e7;
            padding: 9px 20px;
            border-bottom: 2px solid #c9974a;
        }

        .pdf-page-header .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 17px;
            font-weight: 700;
            color: #0e0754;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .pdf-page-header .contact-info {
            font-size: 8px;
            color: #0e0754;
            text-align: right;
            margin-left: 6px;
            letter-spacing: 0.5px;
        }

        .header-email {
            display: inline-block;
            white-space: nowrap;
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
        }

        .header-email .email-icon {
            display: inline-block;
            vertical-align: middle;
            margin-right: 4px;
            position: relative;
            top: 0px;
        }

        .header-email a {
            display: inline-block;
            vertical-align: middle;
            color: #000;
            text-decoration: none;
        }

        .contact-info img {
            vertical-align: middle;
            margin-right: 3px;
        }

        .phone-item {
            display: inline-block;
            vertical-align: middle;
        }

        .phone-item img {
            width: 10px;
            height: 10px;
            vertical-align: middle;
            margin-right: 3px;
            position: relative;
            top: 1px;
        }

        .cover-block {
            position: relative;
            padding: 16px 48px 16px;
            text-align: center;
            overflow: hidden;
            border-radius: 2px;
            page-break-after: avoid;
            border: 1px solid rgba(201, 151, 74, 0.30);
            background: #f8f1e7;
        }

        .cover-logo-text {
            text-align: center;
        }

        .cover-label {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #a31022;
            margin: 10px 0 8px;
            position: relative;
            z-index: 2;
        }

        .cover-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 600;
            color: #fff;
            line-height: 1.15;
            letter-spacing: 1px;
            position: relative;
            z-index: 2;
            margin-bottom: 6px;
        }

        .cover-title em {
            color: #0e0754;
            font-style: italic;
        }
        h1 {
            font-size: 20px;
            color: #222;
            margin-bottom: 6px;
        }

        h2 {
            font-size: 15px;
            color: #222;
            margin: 28px 0 10px;
            border-bottom: 2px solid #a31022;
            padding-bottom: 4px;
        }

        h3 {
            font-size: 13px;
            color: #333;
            margin: 14px 0 6px;
        }

        p {
            margin-bottom: 8px;
            line-height: 1.65;
        }

        ul {
            margin: 6px 0 10px 22px;
        }

        li {
            margin-bottom: 4px;
        }

        strong {
            color: #222;
        }

        a {
            color: #a31022;
        }
        .tour-title {
            background: #f7f7f7;
            border-left: 4px solid #a31022;
            padding: 12px 16px;
            margin-bottom: 24px;
        }

        .tour-title .label {
            font-size: 11px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .tour-title .name {
            font-size: 17px;
            font-weight: bold;
            color: #a31022;
            margin-top: 2px;
        }
        .day-header {
            display: flex;
            align-items: center;
            background: #f0f0f0;
            border-bottom: 2px solid #ccc;
            padding: 6px 10px;
            margin: 22px 0 10px;
            page-break-inside: avoid;
        }

        .day-badge {
            background: #a31022;
            color: #fff;
            font-size: 11px;
            font-weight: bold;
            padding: 3px 9px;
            border-radius: 3px;
            margin-right: 10px;
            white-space: nowrap;
        }

        .day-date {
            font-size: 13px;
            font-weight: bold;
            color: #333;
        }

        .day-destination {
            font-size: 12px;
            color: #666;
            font-style: italic;
            font-weight: bold;
        }
        .inclusions-box {
            background: #fafafa;
            border: 1px solid #ddd;
            border-left: 3px solid #a31022;
            padding: 10px 14px;
            margin: 10px 0 12px;
        }

        .inclusions-box .inc-title {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            color: #a31022;
            margin-bottom: 6px;
        }

        .inclusions-box ul {
            margin-left: 16px;
        }

        .inclusions-box li {
            font-size: 11px;
            margin-bottom: 3px;
        }
        .price-table {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0 18px;
            font-size: 12px;
        }

        .price-table th {
            background: #a31022;
            color: #fff;
            padding: 7px 12px;
            text-align: left;
        }

        .price-table td {
            padding: 7px 12px;
            border: 1px solid #ddd;
        }

        .price-table tr:nth-child(even) td {
            background: #f9f9f9;
        }

        .price-table .level {
            font-weight: bold;
        }

        .price-table .per-person {
            color: #888;
            font-style: italic;
        }
        .hotel-table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0 20px;
            font-size: 11px;
        }

        .hotel-table th {
            background: #444;
            color: #fff;
            padding: 6px 10px;
            text-align: left;
        }

        .hotel-table td {
            padding: 7px 10px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .hotel-table tr:nth-child(even) td {
            background: #f9f9f9;
        }

        .hotel-table .city {
            font-weight: bold;
            white-space: nowrap;
        }

        .hotel-table .nights {
            color: #888;
            font-size: 10px;
        }

        .hotel-chip {
            display: inline-block;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 3px 8px;
            margin: 2px 3px 2px 0;
            font-size: 10px;
            white-space: nowrap;
        }

        .hotel-chip em {
            color: #888;
        }
        .price-note {
            background: #fff8f8;
            border: 1px solid #f5c6cb;
            padding: 10px 14px;
            margin: 10px 0 16px;
            font-size: 11px;
            line-height: 1.7;
        }

        .price-note .note-title {
            font-weight: bold;
            color: #a31022;
            margin-bottom: 4px;
        }
        .section-list {
            margin: 8px 0 18px 22px;
        }

        .section-list li {
            margin-bottom: 6px;
            font-size: 12px;
        }
        .footer-note {
            margin-top: 24px;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        @media print {
            body {
                font-size: 11px;
            }

            .page {
                padding: 15px 20px;
                max-width: 100%;
            }

            h2 {
                page-break-before: auto;
            }

            .day-header {
                page-break-after: avoid;
            }

            .hotel-table,
            .price-table {
                page-break-inside: avoid;
            }

            a {
                color: #333;
                text-decoration: none;
            }
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="pdf-page-header">
            <span class="header-email">
                <span class="email-icon">&#9993;</span>
                <a href="mailto:sales@elegantjourneys.com">
                    sales@elegantjourneys.com
                </a>
            </span>
            <span class="contact-info">
                <span class="phone-item">
                    <img src="https://pdf.elegantjourneys.com/img/flags/inr.png" style="width: 10px; height: 8px;">
                    +91-99100-78975

                    &nbsp; | &nbsp;
                </span>
                <span class="phone-item">
                    <img src="https://pdf.elegantjourneys.com/img/flags/usa.png">
                    +1-332-213-8200
                    &nbsp; | &nbsp;
                </span>
                <span class="phone-item">
                    <img src="https://pdf.elegantjourneys.com/img/flags/uk.png">
                    +44-203-769-7001
                    &nbsp; | &nbsp;
                </span>
                <span class="phone-item">
                    <img src="https://pdf.elegantjourneys.com/img/flags/australia.png">
                    +61-28-488-0900
                </span>
            </span>
        </div>
        <div class="cover-block">
            <div class="cover-logo-text"><img alt="Elegant Journeys Logo" style="width: 160px; height: auto;" src="https://pdf.elegantjourneys.com/img/new-logo.png" /></div>
            <div class="cover-label">Exclusive Tour Proposal</div>
            <div class="cover-title"><em><?php echo h(ucwords($tourData['name'])); ?></em></div>
        </div>
        <h2>Your Tour Itinerary</h2>
        <?php
			if($tourData['view_type'] == 'day_view') 
			{
				foreach ($tourData['cities'] as $cities) 
				{
					
					$dayCityList = array();
					foreach ($cities as $key => $city) 
					{
						if($key == 'hotels') 
						{
							continue;
						}

						if($key == '0') 
						{
							$dayCount = $city['day_count'];
						}

						$dayCityList[] = $city['city_name'];
					}


        ?>
                <!-- DAY 1 -->
                <div class="day-header">
                    <span class="day-badge">
						Day <?php echo $dayCount; ?>
						<?php
							if($cities[0]['tour_date']!="")
							{
						?>
								&nbsp;[ <?=$cities[0]['tour_date']?> ]
						<?php
							}
						?>
					</span>
                    <span class="day-destination"><?php echo h(implode(", ", $dayCityList)); ?></span>
                </div>
                <?php
                foreach ($cities as $key => $city) {
                    if ($key == 'hotels') {
                        continue;
                    }
                ?>
                    <p><strong>Destination: <?php echo h($city['city_name']); ?></strong></p>
                    <?php
                    foreach ($city['events'] as $event) {
                        if ($event['description'] == "") {
                            continue;
                        }
                    ?>
                        <b><?php echo $event['name']; ?></b>
                        <p><?php echo $event['description']; ?></p>
                <?php
                    }
                }
                ?>
            <?php
            }
        } 
		else
		{

            foreach ($tourData['cities'] as $city) 
			{
				$dayCountString = '';
				$dayDateString = '';
				
                if ($city['start_day'] == $city['end_day']) 
				{
					if($city['start_date']!="")
					{
						$dayDateString = '[ '.$city['start_date'].' ]';
					}
					$dayCountString = 'Day ' . $city['start_day'];
                } 
				else 
				{
					if($city['start_date']!="")
					{
						$dayDateString = '[ '.$city['start_date'].' - '.$city['end_date'].' ]';
					}
                    $dayCountString = 'Day ' . $city['start_day'] . '-' . $city['end_day'];
                }

            ?>
                <div class="day-header">
                    <span class="day-badge"><?php echo $city['city_name']; ?> <?=$dayDateString?> </span>
                    <span class="day-destination"><?php echo h($dayCountString); ?></span>
                </div>

                <?php
                foreach ($city['events'] as $event) {
                    if ($event['description'] == "") {
                        continue;
                    }
                ?>
                    <b><?php echo $event['name']; ?></b>
                    <p><?php echo $event['description']; ?></p>
        <?php
                }
            }
        }
        ?>
        <p><em>End of tour services.</em></p>
        <p><strong>Note:</strong> We can customise this tour to extend to other destinations as per your preference.</p>
        <h2>Tour Offer Price – Double Occupancy</h2>

        <table class="price-table">
            <thead>
                <tr>
                    <th>Accommodation Level</th>
                    <th>Rate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $shownHotelTypes = [];

                foreach ($tourData["hotel_group_list"] as $hotelGroupList) {


                ?>
                    <tr>
                        <td class="level"><?php echo h($hotelGroupList['hotel_type_name']); ?></td>
                        <td class="per-person">USD per person</td>
                    </tr>
                <?php

                }
                ?>

            </tbody>
        </table>

        <div class="price-note">
            <div class="note-title">Notes on Prices</div>
            <p>We believe value for money is important. Our tours are <strong>ALL INCLUSIVE WITH ABSOLUTELY NO HIDDEN CHARGES</strong>. When comparing prices, ensure you compare like for like — cheaper options may not offer the same exhaustive list of inclusions, personalised services, or quality.</p>
            <p><strong>Domestic Flights:</strong> If you would like us to arrange internal domestic flights, our service charge is 5% of the actual ticket cost. Free baggage allowance on domestic flights (Economy class) is 15 kg check-in and 7 kg cabin. Excess baggage can be pre-purchased at time of booking.</p>
            <p><strong>GST:</strong> A GST of 5% (or as applicable) payable to the Government of India is charged on the total billing for the India tour package.</p>
        </div>
        <?php
        foreach ($tourData["hotel_group_list"] as $hotelGroupList) {

        ?>
            <h2><?= $hotelGroupList['hotel_type_name'] ?> – Hotel Options</h2>
            <table class="hotel-table">
                <thead>
                    <tr>
                        <th>City</th>
                        <th>Hotel Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dayCountString = '';
                    foreach ($hotelGroupList['hotel_city_list'] as $hotelCityList) {
                        if ($hotelCityList['start_day'] == $hotelCityList['end_day']) {
                            $dayCountString = 'Day ' . $hotelCityList['start_day'];
                        } else {
                            $dayCountString = 'Day ' . $hotelCityList['start_day'] . '-' . $hotelCityList['end_day'];
                        }
                    ?>
                        <tr>
                            <td><span class="city"><?= $hotelCityList['city_name'] ?></span><br><span class="nights"><?= $dayCountString ?></span></td>
                            <td>
                                <?php
                                foreach ($hotelCityList['hotel_list'] as $hotelList) {
                                ?>
                                    <span class="hotel-chip"><?= $hotelList['hotel_name'] ?><br><em><?= $hotelList['room_name'] ?></em></span>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        <?php
        }
        ?>
        <h2>Tour Inclusions</h2>
        <ul class="section-list">
            <?php
            foreach ($tourData["inclusion"] as $inclusion) {
            ?>
                <li><?= $inclusion['description'] ?></li>
            <?php
            }
            ?>

        </ul>

        <h2>Tour Exclusions</h2>
        <ul class="section-list">
            <?php
            foreach ($tourData["exclusion"] as $exclusion) {
            ?>
                <li><?= $exclusion['description'] ?></li>
            <?php
            }
            ?>
        </ul>

    </div>
</body>

</html>