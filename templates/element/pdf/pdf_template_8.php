<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo !empty($tourData['name']) ? h(ucwords($tourData['name'])) : ''; ?></title>
<style>
/*
  Elegant Journeys - itinerary PDF (soft luxury design)
  Fonts: Cormorant Garamond / Lato are used when installed on the render server;
  otherwise the stack falls back to Georgia / Arial. To load them for the render, add
  (only if the server has outbound internet):
  @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Lato:wght@300;400;700&display=swap');
*/
@page { size: A4; margin: 0; }

:root{
  /* --ivory:#fbf8f2; */
  --ivory:#ffffff;
  --navy:#22304f;
  --gold:#b8955a;
  --ink:#3a3f4b;
  --muted:#8a8578;
  --line:#e6ddcb;
  --serif:"Cormorant Garamond","Cormorant",Georgia,"Times New Roman",serif;
  --sans:"Lato","Helvetica Neue",Arial,Helvetica,sans-serif;
}

*{box-sizing:border-box}
html,body{margin:0;padding:0;background:var(--ivory);color:var(--ink);
  font-family:var(--sans);-webkit-print-color-adjust:exact;print-color-adjust:exact}
body{font-size:9.6pt;line-height:1.7}

h1,h2,h3{font-family:var(--serif);color:var(--navy);margin:0;font-weight:400}
h1{font-size:32pt;line-height:1.1}
h2{font-size:21pt;line-height:1.2}
h3{font-size:13.5pt}
p{margin:0 0 3mm}
a{color:var(--navy)}

.sheet{width:210mm;margin:0 auto;position:relative;padding:28mm 16mm 22mm;background:var(--ivory)}
.sheet.cover{break-after:page;page-break-after:always}
.sheet.multipage{padding:0 16mm !important}

/* ---------- Fixed header / footer (repeat on every page) ---------- */
.topbar{position:fixed;top:0;left:0;right:0;padding:5mm 16mm 3mm;display:flex;justify-content:space-between;
  align-items:flex-start;border-bottom:.3mm solid var(--line);background:var(--ivory);z-index:1000}
.logo{width:46mm;height:auto;display:block}
.contacts{text-align:right;color:var(--navy);font-size:7.2pt;line-height:1.7;letter-spacing:.2px}
.contacts .row{display:block;margin-bottom:2px}
.flag{width:12px;height:auto;vertical-align:middle;margin-right:3px}
.email{margin-top:1px;font-style:italic}

.footer{position:fixed;bottom:0;left:0;right:0;padding:0 16mm 5mm;background:var(--ivory);z-index:1000;text-align:center}
.footer span{display:inline-block;width:70mm;padding-top:2.5mm;border-top:.3mm solid var(--line);
  font-size:6.8pt;letter-spacing:2.4px;color:var(--muted);text-transform:uppercase}

.eyebrow{font-size:8pt;letter-spacing:3px;text-transform:uppercase;color:var(--gold);font-weight:400}

/* ---------- Cover ---------- */
.hero{height:104mm;background:linear-gradient(160deg,#e9dfcb 0%,#d9c9a8 55%,#c7b38c 100%);overflow:hidden}
.hero img{width:100%;height:100%;object-fit:cover;display:block}
.cover-title{margin-top:10mm}
.cover-title h1{margin:3mm 0 2mm}
.route{font-family:var(--serif);font-style:italic;font-size:14pt;color:var(--gold)}
.route b{font-weight:400}
.route span{padding:0 .55em;font-style:normal}
.prepared{margin-top:3mm;font-size:9pt;color:var(--muted);letter-spacing:.4px}
.prepared strong{font-family:var(--serif);font-weight:400;font-size:12pt;color:var(--navy);letter-spacing:0}
.meta-grid{display:flex;gap:6mm;border-top:.3mm solid var(--line);margin-top:10mm;padding-top:6mm}
.meta{flex:1}
.meta label{display:block;color:var(--muted);font-size:6.8pt;text-transform:uppercase;letter-spacing:2.2px;margin-bottom:1.5mm}
.meta strong{display:block;font-family:var(--serif);font-weight:400;font-size:13.5pt;color:var(--navy)}

/* ---------- Itinerary ---------- */
.section-intro{margin:1mm 0 7mm}
.route-map{display:block;width:150mm;max-width:100%;height:auto;margin:2mm auto 9mm}

.day{border-top:.4mm solid var(--gold);margin-bottom:9mm;background:transparent;break-inside:avoid}
.day-head{display:flex;align-items:baseline;justify-content:space-between;padding-top:3mm}
.day-number{font-size:7.6pt;letter-spacing:2.6px;text-transform:uppercase;color:var(--gold)}
.day-date{font-size:8.2pt;color:var(--muted)}
.day-body{padding:0}
.destination{font-family:var(--serif);font-size:15pt;color:var(--navy);margin:1mm 0 4mm;line-height:1.25}
.destination b{font-weight:400}
.experience{padding:0;margin-top:3mm}
.experience + .experience{padding-top:3mm;border-top:.25mm solid var(--line)}
.experience p{font-size:9.4pt;margin-bottom:3mm}
.experience h4{font-family:var(--serif);color:var(--navy);font-size:11.5pt;font-weight:400;margin:0 0 1.5mm}
.experience ul{margin:2mm 0 3mm 5mm;padding:0}
.experience li{font-size:9.4pt;margin-bottom:1.5mm}
.service{border-left:.5mm solid var(--gold);padding:1mm 0 1mm 4mm;margin:3mm 0;break-inside:avoid}
.service strong{color:var(--navy)}
.service ul{margin:1.5mm 0 0 4mm;padding-left:3mm}

/* ---------- Hotels ---------- */
.hotel-section{width:100%;margin:10mm 0 0;break-inside:avoid;page-break-inside:avoid}
.hotel-table{width:100%;border-collapse:collapse;table-layout:fixed}
.hotel-table thead th{padding:0 4mm 3mm 0;text-align:left;font-weight:400;font-size:7pt;letter-spacing:2.2px;
  text-transform:uppercase;color:var(--gold);border-bottom:.4mm solid var(--gold)}
.hotel-table thead th:first-child{width:22%}
.hotel-table tbody tr{break-inside:avoid;page-break-inside:avoid}
.hotel-table tbody td{padding:5mm 4mm 5mm 0;vertical-align:top;border-bottom:.25mm solid var(--line)}
.hotel-city{font-family:var(--serif);font-size:13.5pt;line-height:1.3;color:var(--navy);white-space:nowrap}
.hotel-night{display:block;margin-top:1mm;font-size:6.8pt;letter-spacing:1.6px;text-transform:uppercase;color:var(--muted)}
.hotel-item + .hotel-item{margin-top:2.5mm}
.hotel-name{display:block;font-family:var(--serif);font-size:12pt;line-height:1.3;color:var(--navy)}
.room-name{display:block;margin-top:.8mm;font-size:8pt;font-style:italic;color:var(--muted)}
.hotel-or{margin:2.4mm 0 0;font-size:6.8pt;letter-spacing:1.6px;text-transform:uppercase;color:var(--gold)}
.hotel-note{margin-top:4mm;font-size:8.2pt;font-style:italic;color:var(--muted)}

/* ---------- Inclusions / exclusions ---------- */
.columns{display:flex;gap:7mm;margin-top:9mm;break-inside:avoid}
.info-card{flex:1;min-width:0}
.info-card h3{padding-bottom:2mm;border-bottom:.25mm solid var(--line);margin-bottom:3mm}
.check,.cross{display:block;margin:0 0 2.2mm;font-size:8.8pt;line-height:1.6;padding-left:6mm;position:relative}
.check:before,.cross:before{content:"\2014";position:absolute;left:0;top:0}
.check:before{color:var(--gold)}
.cross{color:#6e6a60}
.cross:before{color:#b9b2a3}

/* ---------- Investment ---------- */
.invest{margin-top:12mm;break-inside:avoid;page-break-inside:avoid}
.invest-list{margin-top:5mm}
.invest-row{display:flex;justify-content:space-between;align-items:flex-start;border-top:.4mm solid var(--gold);padding:5mm 0}
.invest-name{font-family:var(--serif);font-size:16pt;color:var(--navy);line-height:1.2}
.invest-sub{margin-top:1.5mm;font-size:8.6pt;color:var(--gold)}
.invest-price{text-align:right}
.invest-price b{display:block;font-family:var(--serif);font-weight:400;font-size:21pt;line-height:1.1;color:var(--navy)}
.invest-price small{display:block;margin-top:1mm;font-size:7.4pt;color:var(--muted)}
.invest-note{border-top:.25mm solid var(--line);padding-top:3.5mm;font-size:8.2pt;font-style:italic;color:var(--muted)}

/* ---------- Terms / sign-off / partners ---------- */
.terms{margin-top:9mm;break-inside:avoid}
.terms h3{font-size:12.5pt;margin-bottom:2mm}
.terms p{font-size:8.8pt}
.terms a{text-decoration:none;border-bottom:.2mm solid var(--gold);word-break:break-all}
.signoff{margin-top:10mm;text-align:center;break-inside:avoid}
.signoff strong{display:block;font-family:var(--serif);font-weight:400;font-size:16pt;color:var(--navy)}
.signoff .tag{margin-top:1.5mm;font-size:7.4pt;letter-spacing:2.6px;text-transform:uppercase;color:var(--gold)}
.signoff .mail{margin-top:1.5mm;font-size:8.4pt;color:var(--muted)}
.partners{margin-top:12mm;text-align:center;break-inside:avoid}
.partners-title{font-size:7pt;letter-spacing:3px;text-transform:uppercase;color:var(--muted);margin-bottom:5mm}
.partner-logos img{height:14mm;max-width:28mm;object-fit:contain;margin:0 4mm;vertical-align:middle;
  filter:grayscale(1);opacity:.65}

@media print{
  body{background:var(--ivory)}
  .hotel-table thead{display:table-header-group}
  .hotel-table tr{page-break-inside:avoid}
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
  </header>
<footer class="footer"><span>ElegantJourneys.com</span></footer>

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
$coverRouteString = !empty($coverCities) ? implode('<span>&middot;</span>', array_map('h', $coverCities)) : '';

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

/* ---- Cover / layout values ---- */
$guestLabel = $noOfPerson === 1 ? '1 Guest' : $noOfPerson . ' Guests';
// Assumption: double/twin sharing, so one room per two guests. Replace with real room data if available.
$roomCount = max(1, (int)ceil($noOfPerson / 2));
$roomLabel = $roomCount . ' Double / Twin Room' . ($roomCount > 1 ? 's' : '');
$preparedFor = $customerName !== '' ? $customerName : 'Our valued guests';

// Optional images. Leave empty to show the soft placeholder / hide the map.
$heroImageUrl = !empty($tourData['hero_image_url']) ? $tourData['hero_image_url'] : '';
$routeMapUrl  = !empty($tourData['route_map_url'])  ? $tourData['route_map_url']  : '';

// TODO: wire these to the real quote data. They were hard-coded in the original template.
$priceRows = [
    ['label' => '4-Star', 'per_person' => 2095],
    ['label' => '5-Star', 'per_person' => 2585],
];

// Show the "Special Darshan" explanation only when the itinerary actually mentions it.
$hasDarshan = !empty($tourData['cities']) && stripos((string)json_encode($tourData['cities']), 'darshan') !== false;
?>

<!-- Cover Page -->
<section class="sheet cover">
  <div class="hero">
    <?php if ($heroImageUrl !== ''): ?><img src="<?php echo h($heroImageUrl); ?>" alt=""><?php endif; ?>
  </div>

  <div class="cover-title">
    <div class="eyebrow">A Private India Journey</div>
    <h1><?php echo !empty($tourData['name']) ? h(ucwords($tourData['name'])) : ''; ?></h1>
    <div class="route"><b><?php echo $coverRouteString; ?></b></div>
    <div class="prepared">Prepared for <strong><?php echo h($preparedFor); ?></strong></div>
  </div>

  <div class="meta-grid">
    <?php if (!empty($durationDays)): ?>
    <div class="meta"><label>Journey</label><strong><?php echo $durationDays; ?> Days &middot; <?php echo $durationNights; ?> Nights</strong></div>
    <?php endif; ?>
    <div class="meta"><label>Travelling</label><strong><?php echo h($guestLabel); ?></strong></div>
    <div class="meta"><label>Accommodation</label><strong><?php echo h($roomLabel); ?></strong></div>
  </div>
</section>

<!-- Itinerary, hotels, inclusions, investment -->
<section class="sheet multipage">
  <table style="width:100%; border-collapse: collapse;">
    <thead><tr><td style="height:25mm; padding:0; border:none;"></td></tr></thead>
    <tbody><tr><td style="padding:0; border:none;">

<?php if (!empty($tourData['cities'])): ?>

  <?php if ($routeMapUrl !== ''): ?>
  <div class="section-intro" style="margin-bottom:0">
    <div class="eyebrow">Your route</div>
  </div>
  <img class="route-map" src="<?php echo h($routeMapUrl); ?>" alt="Route map">
  <?php endif; ?>

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
      <div class="day-number">Day <?php echo $dayCount; ?></div>
      <div class="day-date"><?php echo $tourDateStr; ?></div>
    </div>
    <div class="day-body">
      <div class="destination"><b><?php echo h(implode(" to ", array_unique($dayCityList))); ?></b></div>
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
                $dayCountString = 'Day ' . $city['start_day'];
            } else {
                if ($city['start_date'] != "") {
                    $tourDateStr = date('d M', strtotime($city['start_date'])) . ' - ' . date('d M Y', strtotime($city['end_date']));
                }
                $dayCountString = 'Day ' . $city['start_day'] . '-' . $city['end_day'];
            }
  ?>
  <article class="day">
    <div class="day-head">
      <div class="day-number"><?php echo $dayCountString; ?></div>
      <div class="day-date"><?php echo $tourDateStr; ?></div>
    </div>
    <div class="day-body">
      <div class="destination"><b><?php echo h($city['city_name']); ?></b></div>
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

<?php endif; ?>

  <?php if (!empty($tourData['hotel_group_list'])): ?>
  <div class="hotel-section">
    <div class="section-intro" style="margin-top:0">
      <div class="eyebrow">Stay in style</div>
      <h2>Where You Will Stay</h2>
    </div>

    <table class="hotel-table">
      <thead>
        <tr>
          <th style="width:22%;">City</th>
          <?php foreach ($tourData['hotel_group_list'] as $hotelGroupList): ?>
            <th><?= h($hotelGroupList['hotel_type_name']) ?> Collection</th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $firstGroup = $tourData['hotel_group_list'][0]['hotel_city_list'] ?? [];
        foreach ($firstGroup as $index => $cityData):
            $startDay = (int)($cityData['start_day'] ?? 0);
            // A stay that starts on the last day of the tour is the departure day: no night is spent there.
            if ($durationDays > 0 && $startDay >= $durationDays) { continue; }
            $endNight = (int)($cityData['end_day'] ?? $startDay);
            if ($durationDays > 0) { $endNight = min($endNight, $durationDays - 1); }
            $nights = max(1, ($endNight - $startDay) + 1);
        ?>
        <tr>
          <td>
            <div class="hotel-city"><?= h($cityData['city_name']) ?></div>
            <span class="hotel-night"><?= h($nights) ?> night<?= $nights > 1 ? 's' : '' ?></span>
          </td>

          <?php foreach ($tourData['hotel_group_list'] as $hotelGroupList):
              $currentCityList = $hotelGroupList['hotel_city_list'][$index] ?? [];
              $hotelList = $currentCityList['hotel_list'] ?? [];
          ?>
          <td>
            <?php if (empty($hotelList)): ?>
              <span class="hotel-name">&mdash;</span>
            <?php endif; ?>
            <?php foreach ($hotelList as $hIndex => $hotelData): ?>
              <?php if ($hIndex > 0 && $nights === 1): ?><div class="hotel-or">or</div><?php endif; ?>
              <div class="hotel-item">
                <span class="hotel-name"><?= h($hotelData['hotel_name']) ?></span>
                <span class="room-name"><?= h($hotelData['room_name']) ?></span>
              </div>
            <?php endforeach; ?>
          </td>
          <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php if (count($tourData['hotel_group_list']) > 1): ?>
    <div class="hotel-note">Both collections are available for this itinerary. We will confirm your preference with you.</div>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <?php
    $eventInclusions = $tourData['event_inclusion'] ?? [];
    $inclusions = $tourData['inclusion'] ?? [];
    $exclusions = $tourData['exclusion'] ?? [];
  ?>
  <?php if (!empty($inclusions) || !empty($eventInclusions) || !empty($exclusions)): ?>
  <div class="columns">
    <?php if (!empty($inclusions) || !empty($eventInclusions)): ?>
    <div class="info-card">
      <h3>Inclusions</h3>
      <?php foreach ($eventInclusions as $eventInclusion): ?>
        <div class="check"><?= $eventInclusion['description'] ?></div>
      <?php endforeach; ?>
      <?php foreach ($inclusions as $inclusion): ?>
        <div class="check"><?= $inclusion['description'] ?></div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($exclusions)): ?>
    <div class="info-card">
      <h3>Exclusions</h3>
      <?php foreach ($exclusions as $exclusion): ?>
        <div class="cross"><?= $exclusion['description'] ?></div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <?php if (!empty($priceRows)): ?>
  <div class="invest">
    <div class="eyebrow">Your investment</div>
    <h2>The Journey, Priced</h2>
    <div class="invest-list">
      <?php foreach ($priceRows as $priceRow):
          $perPerson = (float)$priceRow['per_person'];
          $totalPrice = $perPerson * $noOfPerson;
      ?>
      <div class="invest-row">
        <div>
          <div class="invest-name"><?= h($priceRow['label']) ?></div>
          <div class="invest-sub">$<?= number_format($perPerson) ?> &times; <?= h(strtolower($guestLabel)) ?> = $<?= number_format($totalPrice) ?></div>
        </div>
        <div class="invest-price"><b>$<?= number_format($perPerson) ?></b><small>per person</small></div>
      </div>
      <?php endforeach; ?>
      <div class="invest-note">Prices above are exclusive of GST. GST @ 5% is charged additionally on top, as per Indian Government rules.</div>
    </div>
  </div>
  <?php endif; ?>

  <?php if ($hasDarshan): ?>
  <div class="terms">
    <h3>Special Darshan</h3>
    <p><i>&ldquo;Special Darshan&rdquo; is a permit/arrangement for priority temple entry, bypassing the general outside queue. A shorter queue inside the temple complex may still apply.</i></p>
  </div>
  <?php endif; ?>

  <div class="terms">
    <h3>Booking Terms</h3>
    <p>Full booking terms, cancellation policy and privacy information are available at <a href="https://www.elegantjourneys.com/terms-privacy">elegantjourneys.com/terms-privacy</a></p>
  </div>

  <div class="signoff">
    <strong>Elegant Journeys</strong>
    <div class="tag">Your expertise. Your experience.</div>
    <div class="mail">Sales@ElegantJourneys.com</div>
  </div>

  <div class="partners">
    <div class="partners-title">Our Affiliations &amp; Partners</div>
    <div class="partner-logos">
      <img src="https://www.elegantjourneys.com/version2/assets/images/experienced-tour-operator.avif" alt="">
      <img src="https://www.elegantjourneys.com/version2/assets/images/faith-indian-tourism-hospitality-affiliation.avif" alt="">
      <img src="https://www.elegantjourneys.com/version2/assets/images/ministry-of-tourism-india-approval-logo.avif" alt="">
      <img src="https://www.elegantjourneys.com/version2/assets/images/elegant-journeys-toft-sustainable-tourism-logo.avif" alt="">
      <img src="https://www.elegantjourneys.com/version2/assets/images/elegant-journeys-iato-active-member-logo.avif" alt="">
    </div>
  </div>

    </td></tr></tbody>
    <tfoot><tr><td style="height:18mm; padding:0; border:none;"></td></tr></tfoot>
  </table>
</section>

</body>
</html>