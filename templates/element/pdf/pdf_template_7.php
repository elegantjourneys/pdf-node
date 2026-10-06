<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo !empty($tourData['name']) ? h(ucwords($tourData['name'])) : ''; ?></title>
<style>
@page { size: A4; margin: 0; }

:root{
  --navy:#17345f;
  --navy2:#0d2548;
  --gold:#c99a32;
  --gold-soft:#f5ecd8;
  --ink:#243142;
  --muted:#687386;
  --line:#e5e8ed;
  --paper:#ffffff;
  --soft:#f7f8fa;
  --green:#39824a;
  --red:#bd3b3b;
}

*{box-sizing:border-box}
html,body{margin:0;padding:0;background:#eef1f5;color:var(--ink);
  font-family:Arial,Helvetica,sans-serif;-webkit-print-color-adjust:exact;print-color-adjust:exact}
  body{font-size:10.4pt;line-height:1.55}

.sheet{width:210mm; margin:0 auto; background:var(--paper); position:relative; overflow:hidden; padding:28mm 15mm 45mm; box-sizing: border-box;}
.sheet.multipage{padding:0 10mm !important;}

.topbar{position:fixed; top:0; left:0; right:0; padding:2mm 10mm 2mm; display:flex; justify-content:space-between; align-items:flex-start; border-bottom:1px solid var(--gold); background:var(--paper); z-index:1000;}
.logo{width:48mm;height:auto;display:block}
.contacts{text-align:right;color:var(--navy);font-size:7.6pt;line-height:1.8}
.contacts .row{display:block;margin-bottom:4px;}
.flag{width:13px;height:auto;vertical-align:middle;margin-right:3px}
.email{margin-top:2px;font-weight:700;font-style:italic}

.footer{position:fixed; bottom:0; left:0; right:0; padding:5mm 10mm 7mm; border-top:1px solid var(--gold); display:flex; align-items:center; justify-content:space-between; background:var(--paper); z-index:1000;}
.partners-title{
  position:absolute;left:50%;transform:translateX(-50%);top:-5mm;background:white;
  padding:0 5mm;color:var(--navy);font-family:Georgia,serif;font-size:9pt;
  font-weight:700;letter-spacing:2.2px;white-space:nowrap
}
.partner-logos{width:100%;text-align:center;height:17mm}
.partner-logos img{max-height:16mm;max-width:29mm;object-fit:contain}
.page-no{font-size:7pt;color:var(--navy);position:absolute;right:0;bottom:-4mm}

.eyebrow{font-size:11pt;letter-spacing:2.5px;text-transform:uppercase;color:var(--gold);font-weight:700}
h1,h2,h3{font-family:Georgia,"Times New Roman",serif;color:var(--navy);margin:0}
h1{font-size:27pt;line-height:1.12}
h2{font-size:18pt}
h3{font-size:12pt}
p{margin:0 0 10px}

.cover-hero{
  border:1px solid #eadfca;
  background:linear-gradient(135deg,#fffdf8 0%,#f7f0e1 55%,#eef3f7 100%);
  padding:6mm 7mm 7mm 6mm;border-radius:4px;position:relative;overflow:hidden
}
/* .cover-hero:after{
  content:"";position:absolute;width:70mm;height:50mm;border-radius:50%;
  right:-24mm;top:-27mm;border:1px solid rgba(201,154,50,.35)
} */
.cover-hero .title{max-width:140mm}
.route{
  display:flex;gap:7px;align-items:center;margin-top:3mm;color:var(--navy);
  font-weight:700
}
.route span{font-weight:400;color:var(--muted)}
.dot{width:6px;height:6px;background:var(--gold);border-radius:50%;display:inline-block}

.meta-grid{display:table;width:100%;table-layout:fixed;border-collapse:separate;border-spacing:4mm 0;margin:6mm -4mm}
.meta{
  display:table-cell; border:1px solid var(--line);border-radius:3px;padding:4mm;background:white
}
.meta label{display:block;color:var(--muted);font-size:7.5pt;text-transform:uppercase;letter-spacing:1px}
.meta strong{display:block;color:var(--navy);font-size:10.5pt;margin-top:2px}

.price-wrap{margin-top:5mm;border-radius:4px;overflow:hidden;border:1px solid #e5d5ae}
.price-title{background:var(--gold-soft);text-align:center;color:var(--navy);
  font-family:Georgia,serif;font-weight:700;letter-spacing:1.8px;padding:3mm}
table{width:100%;border-collapse:collapse}
.price-table th,.hotel-table th{background:var(--navy);color:#fff;text-align:left;padding:3mm 4mm;
  font-size:8.5pt;letter-spacing:.3px}
.price-table td{padding:3.2mm 4mm;border-bottom:1px solid #e3e3e3}
.price-table tr:nth-child(even) td{background:#fbf8f0}
.price-table .total{font-weight:800;color:#a87809}
.note{font-size:7.8pt;color:#5f6470;font-style:italic;margin-top:3mm;text-align:center}

.section-intro{margin:1mm 0 6mm}
.section-intro p{color:var(--muted);font-size:9pt}

.day{
  border:1px solid var(--line);border-radius:5px;overflow:hidden;margin-bottom:6mm;
  background:#fff;break-inside:avoid
}
.day-head{
  background:linear-gradient(100deg,var(--navy),#234b80);color:white;
  display:flex;align-items:center;justify-content:space-between;padding:4mm 5mm
}
.day-number{font-family:Georgia,serif;font-size:10pt;font-weight:700}
.day-date{font-size:10pt;opacity:.92}
.day-body{padding:5mm}
.destination{font-size:10pt;color:var(--gold);font-weight:800;text-transform:uppercase;letter-spacing:.7px;margin-bottom:4mm}
.destination b{color:var(--navy)}
.service{
  background:#f7f9fc;border-left:3px solid var(--gold);padding:3mm 4mm;margin:4mm 0;
  break-inside:avoid
}
.service strong{font-size:10pt;color:var(--navy)}
.service ul{margin:2mm 0 0 4mm;padding-left:4mm}
.experience{
  padding:3mm 0;border-top:1px solid var(--line);margin-top:3mm
}
.experience h4{font-family:Georgia,serif;color:var(--navy);font-size:11pt;margin:0 0 2mm}
.experience h4:before{content:"✦";color:var(--gold);margin-right:6px;font-size:11pt}
.experience p{font-size:10pt; margin-bottom:4px}
.experience ul{margin:4px 0 10px 20px; padding:0}
.experience li{font-size:10pt; margin-bottom:4px}

.hotel-table{margin-top:4mm;border:1px solid var(--line);border-radius:4px;overflow:hidden}
.hotel-table td{padding:3.3mm 4mm;border-bottom:1px solid #e1e3e7;vertical-align:top}
.hotel-table tr:nth-child(even) td{background:#f7f8fa}
.hotel-table .city{font-weight:700;color:var(--navy)}
.hotel-table small{color:var(--muted);font-style:italic}
.hotel-note{font-size:7.8pt;color:#626b78;font-style:italic;margin-top:3mm}

.columns{display:table;width:100%;table-layout:fixed;border-collapse:separate;border-spacing:5mm 0;margin-top:5mm; margin-left:-5mm}
.info-card{display:table-cell;vertical-align:top;border:1px solid var(--line);border-radius:4px;padding:5mm;break-inside:avoid}
.info-card h3{padding-bottom:3mm;border-bottom:1px solid var(--line);margin-bottom:3mm}
.check,.cross{display:block;margin:2.5mm 0;font-size:9pt}
.check:before{content:"✓ ";color:var(--green);font-weight:900}
.cross:before{content:"× ";color:var(--red);font-weight:900}

.terms{
  margin-top:6mm;border-radius:4px;background:#f7f3ea;border:1px solid #eadfca;padding:5mm
}
.terms h3{font-size:12pt;margin-bottom:3mm}
.terms a{color:var(--navy);word-break:break-all}

.callout{
  display:flex;justify-content:space-between;align-items:center;gap:6mm;
  margin-top:6mm;background:var(--navy);color:white;padding:5mm;border-radius:4px
}
.callout strong{font-family:Georgia,serif;font-size:12pt}
.callout span{font-size:8pt;opacity:.9;text-align:right}

@media print{
  body{background:#fff}
  .sheet{width:210mm; margin:0 auto; background:var(--paper); position:relative; overflow:hidden; padding:28mm 15mm 45mm; box-sizing: border-box;}
}
@media screen and (max-width:900px){
  .sheet{width:210mm; margin:0 auto; background:var(--paper); position:relative; overflow:hidden; padding:28mm 15mm 45mm; box-sizing: border-box;}
  .footer{position:fixed; bottom:0; left:0; right:0; padding:5mm 15mm 7mm; border-top:1px solid var(--gold); display:flex; align-items:center; justify-content:space-between; background:var(--paper); z-index:1000;}
  .partners-title{display:none}
  .meta-grid,.columns{grid-template-columns:1fr}
}

 /* =========================================
       PREMIUM HOTEL TABLE - PDF SAFE
       Works with Chromium / Browsershot
       ========================================= */

    .hotel-section {
        width: 100%;
        margin: 18px 0 0;
        font-family: Arial, Helvetica, sans-serif;
        color: #24344d;
        page-break-inside: avoid;
    }

    .hotel-section-title {
        margin: 0 0 14px;
        font-size: 20px;
        line-height: 1.3;
        font-weight: 700;
        color: #17365d;
        letter-spacing: 0.2px;
    }

    .hotel-section-title .accent {
        display: inline-block;
        width: 4px;
        height: 10px;
        margin-right: 9px;
        vertical-align: -3px;
        background: #c9a45c;
    }

    .hotel-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #d9dee6;
        border-radius: 8px;
        overflow: hidden;
        background: #ffffff;
        table-layout: fixed;
    }

    .hotel-table thead th {
        padding: 14px 16px;
        background: #17365d;
        color: #ffffff;
        text-align: left;
        font-size: 11px;
        line-height: 1.3;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        border-right: 1px solid rgba(255,255,255,0.15);
    }

    .hotel-table thead th:first-child {
        width: 22%;
    }

    .hotel-table thead th:last-child {
        border-right: 0;
    }

    /* Gold line below header */
    .hotel-table thead tr {
        border-bottom: 3px solid #c9a45c;
    }

    .hotel-table tbody tr {
        page-break-inside: avoid;
    }

    .hotel-table tbody tr:nth-child(even) {
        background: #f8f9fb;
    }

    .hotel-table tbody tr:nth-child(odd) {
        background: #ffffff;
    }

    .hotel-table tbody td {
        padding: 17px 16px;
        vertical-align: top;
        border-bottom: 1px solid #e5e8ed;
        border-right: 1px solid #edf0f3;
        font-size: 13px;
        line-height: 1.45;
    }

    .hotel-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .hotel-table tbody td:last-child {
        border-right: 0;
    }

    /* City */
    .hotel-city {
        color: #17365d;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.4;
        white-space: nowrap;
    }

    .hotel-night {
        display: inline-block;
        margin-top: 5px;
        padding: 3px 8px;
        border: 1px solid #d8c18d;
        border-radius: 12px;
        background: #fbf7ed;
        color: #856b32;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 0.3px;
    }

    /* Hotel name */
    .hotel-name {
        display: block;
        color: #263b57;
        font-size: 13px;
        line-height: 1.4;
        font-weight: 600;
        margin-bottom: 3px;
    }

    /* Room name */
    .room-name {
        display: block;
        color: #6c7787;
        font-size: 10px;
        line-height: 1.35;
        font-style: italic;
        margin-bottom: 9px;
    }

    .room-name:last-child {
        margin-bottom: 0;
    }

    .room-name:before {
        content: "•";
        color: #c9a45c;
        margin-right: 5px;
        font-style: normal;
    }

    /* Hotel blocks when multiple hotels exist */
    .hotel-item {
        margin-bottom: 9px;
        padding-bottom: 8px;
        border-bottom: 1px solid #eceff3;
    }

    .hotel-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: 0;
    }

    /* Category badge */
    .hotel-category {
        display: inline-block;
        margin-bottom: 8px;
        color: #9a7937;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Note */
    .hotel-note {
        margin-top: 10px;
        padding: 9px 12px;
        border-left: 3px solid #c9a45c;
        background: #faf8f3;
        color: #687386;
        font-size: 9.5px;
        line-height: 1.5;
        font-style: italic;
    }

    .hotel-note strong {
        color: #4e5c70;
        font-style: normal;
    }

    /* PDF print settings */
    @media print {
        .hotel-section {
            page-break-inside: avoid;
        }

        .hotel-table {
            page-break-inside: auto;
        }

        .hotel-table tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .hotel-table thead {
            display: table-header-group;
        }

        .hotel-table tfoot {
            display: table-footer-group;
        }
    }
</style>
</head>
<body>
<header class="topbar">
    <img class="logo" src="https://www.elegantjourneys.com/version2/assets/images/logo-ej.webp" />
    <div class="contacts">
      <div class="row">
        <span><img class="flag" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAANBAMAAABbflNtAAAAMFBMVEUEajj/aCD/////zbWrzbx7esOtrNmszr2iw7rt7fdqarqqjKx6jLGMi8vzw7O7u989J5ASAAAANElEQVQI12MQhAMGgkxjIHi9D0QyKAFB2FcQCWJqZi2bBGUqxV4Fi5a4uLj0nAAS7gwkAAAq3xDF9V307AAAAABJRU5ErkJggg==" style="width: 14px; vertical-align: -2px; margin-right: 5px; border: 1px solid #eee;">+91-99100-78975</span>
        <span><img class="flag" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAALBAMAAACNJ7BwAAAAJ1BMVEXCQ2XQcIrousbVfpXkrbslRnDjqrk1VXzFTm3VgJccPGk+XYMrTXYrbivqAAAAQ0lEQVQI12OIWhq1lAECordXl6aBAYi5dSYITGaIOXrmqCAYMJSXby9XAgMGkLYOMGBQggMGQThgMIYDBhcYcGNAAACqDx4LPVyVXwAAAABJRU5ErkJggg==" style="width: 14px; vertical-align: -2px; margin-right: 5px; border: 1px solid #eee;">+1-332-213-8200</span>
      </div>
      <div class="row">
        <span><img class="flag" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAKCAMAAACDi47UAAAATlBMVEUBIWn88/XQd4z0ztRbbZyrtc2qtc3IEC7AyNrYVWrZ3ehcZpbyxs321drGboVJVInFzN3U2eb8/P3y3OLy9PjT1+REXJFAWI7WTmTzytGKk7Q7AAAAaUlEQVQI123OSQ6AIAwF0ALVikyK8/0valviwoS/IX3kpwXvZgTOQDTKi/Z+oOTGDYP1cbn4T3hFQaWTaeIcWzKVyCSzHzIDddJHre/cJKomba0OcC7O2yCLcI0+F6ZL6TsJZ2Wm//HML3AEBd1F6JYKAAAAAElFTkSuQmCC" style="width: 14px; vertical-align: -2px; margin-right: 5px; border: 1px solid #eee;">+44-203-769-7001</span>
        <span><img class="flag" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAKCAMAAACDi47UAAAAQlBMVEUBIWnndY1UapoaN3jEscXOfJfdbYlBWY/kACsIKG7f4+wUMnSFd5/ZnbHTw9NbSn5wgqvanbHSxNNsf6gkQH6os8zjmGKXAAAAVUlEQVQIHXXBWRJAMBRFwROSXA8x2/9WRQk+lG6CFzEyBs9L/bw4l4ZJZBKn5kFmxknTMjs3pF5gwLYCPozEiHyAncz4qGsKiY+ubTsuZtwkiqrizwFLpAJdjEggFQAAAABJRU5ErkJggg==" style="width: 14px; vertical-align: -2px; margin-right: 5px; border: 1px solid #eee;">+61-28-488-0900</span>
      </div>
      <div class="email">Sales@ElegantJourneys.com</div></div>
    </div>
  </header>
<footer class="footer">
    <div class="partners-title" style="margin-bottom: 5px;">OUR AFFILIATIONS &amp; PARTNERS</div>
    <div class="partner-logos" style="text-align:center;">
  <img src="https://www.elegantjourneys.com/version2/assets/images/experienced-tour-operator.avif" style="display:inline-block; margin:0 4px;" alt="">
  <img src="https://www.elegantjourneys.com/version2/assets/images/faith-indian-tourism-hospitality-affiliation.avif" style="display:inline-block; margin:0 4px;" alt="">
  <img src="https://www.elegantjourneys.com/version2/assets/images/ministry-of-tourism-india-approval-logo.avif" style="display:inline-block; margin:0 4px;" alt="">
  <img src="https://www.elegantjourneys.com/version2/assets/images/elegant-journeys-toft-sustainable-tourism-logo.avif" style="display:inline-block; margin:0 4px;" alt="">
  <img src="https://www.elegantjourneys.com/version2/assets/images/elegant-journeys-iato-active-member-logo.avif" style="display:inline-block; margin:0 4px;" alt="">
</div>

  </footer>

<?php
$coverCities = [];
if (!empty($tourData['city_day_list'])) {
    foreach ($tourData['city_day_list'] as $cObj) {
        if (!empty($cObj['city_name'])) {
            $coverCities[] = $cObj['city_name'];
        }
    }
}
$coverCities = array_unique($coverCities);
$coverRouteString = !empty($coverCities) ? implode('<span>•</span>', $coverCities) : '';

$durationDays = !empty($tourData['duration']) ? (int)$tourData['duration'] : 0;
$durationNights = max(0, $durationDays - 1);

$startDateStr = !empty($tourData['start_date']) ? date('d F', strtotime($tourData['start_date'])) : '';
$endDateStr = !empty($tourData['end_date']) ? date('d F Y', strtotime($tourData['end_date'])) : '';
$dateParts = array_filter([$startDateStr, $endDateStr]);
$dateString = implode(' &ndash; ', $dateParts);

$customerName = '';
if (!empty($tourData['customer'])) {
    $c = $tourData['customer'];
    $customerName = trim(($c['first_name'] ?? '') . ' ' . ($c['last_name'] ?? ''));
}
$noOfPerson = !empty($tourData['no_of_person']) ? (int)$tourData['no_of_person'] : 2;
?>

<!-- Cover Page -->
<section class="sheet">
  <div class="cover-hero">
    <div class="eyebrow">Private India Journey</div>
    <div class="title">
      <h2><?php echo !empty($tourData['name']) ? strtoupper(h($tourData['name'])) : ''; ?></h2>
      <div class="route">
        <b><?php echo $coverRouteString; ?></b>
      </div>
    </div>
  </div>

  <div class="meta-grid">
    <?php if (!empty($durationDays)): ?>
    <div class="meta"><label>Journey</label><strong><?php echo $durationDays; ?>-Day / <?php echo $durationNights; ?>-Night</strong></div>
    <?php endif; ?>
    <div class="meta"><label>Prepared for</label><strong><?php echo h($customerName); ?> x <?php echo $noOfPerson; ?> Pax</strong></div>
    <div class="meta"><label>Room configuration</label><strong><?php echo $noOfPerson; ?> Guests</strong></div>
  </div>

  <div class="price-wrap">
    <div class="price-title">TOUR PRICE</div>
    <table class="price-table">
      <thead><tr><th>Package</th><th>Price Per Person</th><th>Total Package Price</th></tr></thead>
      <tbody>
        <tr><td><b>4-Star</b></td><td>$ 2,095</td><td>$ 2,095 &times; 2 Guests = <span class="total">$ 4,190</span></td></tr>
        <tr><td><b>5-Star</b></td><td>$ 2,585</td><td>$ 2,585 &times; 2 Guests = <span class="total">$ 5,170</span></td></tr>
      </tbody>
    </table>
  </div>
  <div class="note">Prices above are exclusive of GST. GST @ 5% is charged additionally on top, as per Indian Government rules.</div>

  
</section>

<!-- Days / Itinerary -->
<?php if (!empty($tourData['cities'])): ?>
<section class="sheet multipage">
  <table style="width:100%; border-collapse: collapse;">
    <thead><tr><td style="height:25mm; padding:0; border:none;"></td></tr></thead>
    <tbody><tr><td style="padding:0; border:none;">
      <div class="section-intro">
    <div class="eyebrow">Your itinerary</div>
    <h2>Journey at a Glance</h2>
  </div>

  <?php
    if ($tourData['view_type'] == 'day_view') {
        foreach ($tourData['cities'] as $cities) {
            $dayCityList = array();
            foreach ($cities as $key => $city) {
                if ($key === 'hotels') continue;
                if ($key === 0) {
                    $dayCount = $city['day_count'];
                }
                $dayCityList[] = $city['city_name'];
            }
            
            $tourDateStr = '';
            if ($cities[0]['tour_date'] != "") {
                $ts = strtotime($cities[0]['tour_date']);
                $tourDateStr = date('l, d F Y', $ts);
            }
  ?>
  <article class="day">
    <div class="day-head">
      <div class="day-number">DAY <?php echo $dayCount; ?></div>
      <div class="day-date"><?php echo $tourDateStr; ?></div>
    </div>
    <div class="day-body">
      <div class="destination">Destination: <b><?php echo h(implode(", ", array_unique($dayCityList))); ?></b></div>
      <?php foreach ($cities as $key => $city): 
              if ($key === 'hotels') continue;
              foreach ($city['events'] as $event):
                  if ($event['description'] == "") continue;
      ?>
      <div class="experience">
        <p><?php echo $event['description']; ?></p>
      </div>
      <?php   endforeach; 
            endforeach; ?>
    </div>
  </article>
  <?php
        }
    } else {
        foreach ($tourData['cities'] as $city) {
            $dayCountString = '';
            $tourDateStr = '';
            if ($city['start_day'] == $city['end_day']) {
                if ($city['start_date'] != "") {
                    $tourDateStr = date('l, d F Y', strtotime($city['start_date']));
                }
                $dayCountString = 'DAY ' . $city['start_day'];
            } else {
                if ($city['start_date'] != "") {
                    $tourDateStr = date('d M', strtotime($city['start_date'])) . ' - ' . date('d M Y', strtotime($city['end_date']));
                }
                $dayCountString = 'DAY ' . $city['start_day'] . '-' . $city['end_day'];
            }
  ?>
  <article class="day">
    <div class="day-head">
      <div class="day-number"><?php echo $dayCountString; ?></div>
      <div class="day-date"><?php echo $tourDateStr; ?></div>
    </div>
    <div class="day-body">
      <div class="destination">Destination: <b><?php echo h($city['city_name']); ?></b></div>
      <?php foreach ($city['events'] as $event):
              if ($event['description'] == "") continue;
      ?>
      <div class="experience">
        <p><?php echo $event['description']; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </article>
  <?php
        }
    }
  ?>

    </td></tr></tbody>
    <tfoot><tr><td style="height:45mm; padding:0; border:none;"></td></tr></tfoot>
  </table>
</section>
<?php endif; ?>

<!-- Hotels & Inclusions -->
<section class="sheet multipage">
  <table style="width:100%; border-collapse: collapse;">
    <thead><tr><td style="height:25mm; padding:0; border:none;"></td></tr></thead>
    <tbody><tr><td style="padding:0; border:none;">

  <?php if (!empty($tourData['hotel_group_list'])): ?>
  <div class="section-intro" style="margin-top:2mm">
    <div class="eyebrow">Stay in style</div>
    <h2>Hotels</h2>
  </div>

  <!-- <div class="hotel-table">
    <table>
      <thead>
        <tr>
          <th style="width:22%">City</th>
          <?php foreach ($tourData['hotel_group_list'] as $hotelGroupList): ?>
            <th><?= h($hotelGroupList['hotel_type_name']) ?> Category</th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php 
        $firstGroup = $tourData['hotel_group_list'][0]['hotel_city_list'];
        foreach ($firstGroup as $index => $cityData):
            $nights = ($cityData['end_day'] - $cityData['start_day']) + 1;
        ?>
        <tr>
            <td class="city"><?= h($cityData['city_name']) ?> (<?= h($nights) ?>N)</td>
            <?php foreach ($tourData['hotel_group_list'] as $hotelGroupList): 
                $currentCityList = $hotelGroupList['hotel_city_list'][$index];
            ?>
            <td>
                <?php 
                $hotelCount = count($currentCityList['hotel_list']);
                foreach ($currentCityList['hotel_list'] as $i => $hotelList): 				  
                    echo h($hotelList['hotel_name']) . "<br><small>( ".h($hotelList['room_name'])." )</small>";
                    if ($i < $hotelCount - 1) {
                        echo "<br>";
                    }
                endforeach; 
                ?>
            </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="hotel-note">Note: Hotel category to be confirmed by the traveller; both categories are available for this itinerary.</div>
   -->
  
<div class="hotel-section">

   <!--  <div class="hotel-section-title">
        <span class="accent"></span>
        Accommodation Options
    </div> -->

    <div class="hotel-table">

        <table>
            <thead>
                <tr>
                    <th style="width:22%;">City</th>

                    <?php foreach ($tourData['hotel_group_list'] as $hotelGroupList): ?>
                        <th>
                            <?= h($hotelGroupList['hotel_type_name']) ?> Category
                        </th>
                    <?php endforeach; ?>

                </tr>
            </thead>

            <tbody>

                <?php
                $firstGroup = $tourData['hotel_group_list'][0]['hotel_city_list'];

                foreach ($firstGroup as $index => $cityData):

                    $nights = ($cityData['end_day'] - $cityData['start_day']) + 1;
                ?>

                    <tr>

                        <!-- CITY -->
                        <td>

                            <div class="hotel-city">
                                <?= h($cityData['city_name']) ?>
                            </div>

                            <span class="hotel-night">
                                <?= h($nights) ?> NIGHT<?= $nights > 1 ? 'S' : '' ?>
                            </span>

                        </td>


                        <!-- HOTEL CATEGORIES -->
                        <?php foreach ($tourData['hotel_group_list'] as $hotelGroupList): ?>

                            <?php
                            $currentCityList =
                                $hotelGroupList['hotel_city_list'][$index];

                            $hotelList =
                                $currentCityList['hotel_list'];
                            ?>

                            <td>

                                <?php foreach ($hotelList as $hotelData): ?>

                                    <div class="hotel-item">

                                        <span class="hotel-name">
                                            <?= h($hotelData['hotel_name']) ?>
                                        </span>

                                        <span class="room-name">
                                            <?= h($hotelData['room_name']) ?>
                                        </span>

                                    </div>

                                <?php endforeach; ?>

                            </td>

                        <?php endforeach; ?>

                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

    </div>


    <div class="hotel-note">
        <strong>Note:</strong>
        Hotel category is to be confirmed by the traveller.
        Both categories are available for this itinerary.
    </div>

</div>
  
   <?php endif; ?>

  <div class="columns">
    <?php if (!empty($tourData['inclusion'])): ?>
    <div class="info-card">
      <h3>Inclusions</h3>
      <?php foreach ($tourData['event_inclusion'] as $eventInclusion): ?>
        <div class="check"><?= $eventInclusion['description'] ?></div>
      <?php endforeach; ?>
      <?php foreach ($tourData['inclusion'] as $inclusion): ?>
        <div class="check"><?= $inclusion['description'] ?></div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($tourData['exclusion'])): ?>
    <div class="info-card">
      <h3>Exclusions</h3>
      <?php foreach ($tourData['exclusion'] as $exclusion): ?>
        <div class="cross"><?= $exclusion['description'] ?></div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>

  <div class="terms">
    <h3>Special Darshan</h3>
    <p><i>&ldquo;Special Darshan&rdquo; is a permit/arrangement for priority temple entry, bypassing the general outside queue. A shorter queue inside the temple complex may still apply.</i></p>
  </div>

  <div class="terms">
    <h3>Booking Terms</h3>
    <p>Full booking terms, cancellation policy, and privacy information are available at:</p>
    <a href="https://www.elegantjourneys.com/terms-privacy">https://www.elegantjourneys.com/terms-privacy</a>
  </div>

  <div class="callout">
    <strong>Elegant Journeys</strong>
    <span>YOUR EXPERTISE. YOUR EXPERIENCE.<br>Sales@ElegantJourneys.com</span>
  </div>

    </td></tr></tbody>
    <tfoot><tr><td style="height:45mm; padding:0; border:none;"></td></tr></tfoot>
  </table>
</section>

</body>
</html>
