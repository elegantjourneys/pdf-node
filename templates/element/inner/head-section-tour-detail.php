<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo @$metaTags['meta_title']?></title>
	<meta name="description" content="<?php echo @$metaTags['meta_description']?>" />
	<meta name="keywords" content="<?php echo @$metaTags['meta_keyword']?>" />
	<meta name="language" content="en-us" />
	<meta name="DC.Title" content="Elegant Journeys"/>
	
	
	<meta http-equiv="Pragma" content="Public">
	<meta http-equiv="Cache-Control" content="Public">
	<meta http-equiv="Cache-Control" content="max-age=86400">
	<meta http-equiv="Cache-Control" content="Public">
	<meta http-equiv="Cache-Control" content="must-revalidate">
	<meta http-equiv="Vary" content="User-Agent">


	<meta name="distribution" content="Global" />
	<meta name="Robots" content="INDEX,FOLLOW" />
	<meta name='googlebot' content='noodp,noydir,index,follow' />
	<meta name='robots' content='noodp,noydir,index,follow' />
	<meta name="rights" content="https://plus.google.com/u/0/+ElegantjourneysCo/posts" />
	<meta property="og:title" content="<?php echo @$metaTags['og_title']?>">
	<meta property="og:site_name" content="Elegant Journeys">
	<meta property="og:keywords" content=""/>
    <meta property="og:image" content="https://wwww.elegantjourneys.com/img/banner/img-01.jpg"/>
	<meta property="og:url" content="<?php echo @$metaTags['page_url']?>">
	<meta property="og:description" content="<?php echo @$metaTags['og_description']?>">
	<meta property="fb:app_id" content="2347471856">
	<meta property="og:type" content="website">
	<!-- WORK SANS = Helvetica Neue -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700" rel="stylesheet">
	
	<!-- favion -->
	<link rel="icon" type="image/png" sizes="16x16" href="https://www.elegantjourneys.com/img/favicon-16x16.png">
	<!-- link to font awesome -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/font-awesome/css/font-awesome.css">
	<!-- link to material icon font -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/material-design-icons/material-icons.css">
	<!-- link to custom icomoon fonts -->
	<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>inner/cssorig/fonts/icomoon/icomoon.css">
	<!-- link to wow js animation -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/animate/animate.css">
	<!-- include bootstrap css -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/cssorig/bootstrap.css">
	<!-- include owl css -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/owl-carousel/owl.carousel.css">
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/owl-carousel/owl.theme.css">
	<!-- include main css -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/cssorig/main.css">
	<!-- link to revolution css  -->
	<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>inner/vendorsorig/revolution/css/settings.css">
	
	<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>inner/css/custom-sgr.css">
	
	<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>inner/js/fancybox/jquery.fancybox.min.css">

<link rel="stylesheet" type="text/css" href="<?=WEBROOT?>inner/css/tour-detail.css">
	<style>

	.mr-checkIn-checkOut-Date-hover {
    position: absolute;
    top: initial !important;
    bottom: -40px;
    left: 23%;
    height: auto !important;
    width: 36%;
    background: #fff;
    border-radius: 2px;
    padding: 0.25rem 0.8125rem;
    display: none;
}
.box-with-bottom-arrow {
    z-index: 1;
    border-radius: 0.25rem;
    position: relative;
    background-color: #ffffff;
    padding: 1.25rem 1.5625rem;
    box-shadow: 0px 2px 25px 0px rgba(0, 0, 0, 0.3);
}
.mr-checkIn-checkOut-Date-hover .mr-checkIn-checkOut-Date-hover-text {
    display: inline-block;
    vertical-align: middle;
    width: 81% !important;
	color: #cf3720;
}
.box-with-bottom-arrow::after {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    margin-left: -10px;
    bottom: -21px;
    left: 50%;
    box-sizing: border-box;
    border: 10px solid black;
    border-color: #ffffff transparent transparent transparent;
}
	.processingButton{
			background: #d60505;
			font-weight: 700;
			padding: 10px 50px;
			letter-spacing: 1px;
			min-width: 150px;
			font-size: 16px;
			line-height: 20px;
			background: #bb0000;
			border-radius: 0;
			border-color: #bb0000;
			color:#ffffff;
		}
		.fancybox-slide>*{
			padding: 0;

		}

		.pop_form_custm {
			width: 550px;
		}
		h2#tourItinerary {
		margin: 95px 0 10px;
		}
	@media (max-width:768px){
		#feedback_btn + label {
			left: -75px;
			right: unset!important;
		}
		.user-review-img {
    width:30% !important;
}
	}
	@media (max-width:480px){
			.pop_form_custm {
			width: auto;
		}
	}
	.custominclusion{
		margin: 91px 0 0 0!important;
	}

		#fieldFeedbackType{ display:none; }
		#fieldAttachment{ display:none; }

		#feedback_btn + label {
							position: absolute;
							right: -77px;
					}

	   .booking-form h2{

				padding-bottom: 2px;
				margin-bottom: 15px;
				font-weight: normal;
				padding-top: 20px;

			}
		.borderAlertRed{
			   border:1px solid #E94051 !important;

		   }
		   .sidebar-holder-logo {
    box-shadow: 0 2px 2px rgba(1, 2, 2, .1);
}
.sidebar-holder-logo img {
    text-align: center;
    margin-left: 50px;
}

.holderBackground
{
	background-color:#FAFAFA;
}

.strip.strip-top .btn.btnBlueBG {
    margin-bottom: 0 !important;
    background-color:#07c !important;
	border: 2px solid #fff !important;
	letter-spacing: 1px;
	color:#ffffff !important;
}

.strip.strip-top .btn.btnBlueBG:hover {
    margin-bottom: 0 !important;
    background-color:#003580 !important;
	border: 2px solid #fff !important;
	letter-spacing: 1px;
	color:#ffffff !important;
}

.btn.btn-blue {
	font-weight: 700;
	padding: 5px 20px;
	letter-spacing: 1px;
	min-width: 150px;
	font-size: 16px;
	line-height: 20px;
	background: #07c;
	border-radius: 0;
	border-color: #07c;

}

.btn.btn-blue:hover {

	background: #07c !important;

	border-color: #ffffff !important;

}

.d-md-block {
    display: block !important;
    max-width: 100%;
    left: 0% !important;
    position: absolute !important;
    background:  #00000080;
    right: 0;
    padding-left: 10%;bottom: 0;

}
.carousel .carousel-control.right span {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);font-size: 45px;
}
.carousel-inner img {
    width: 100%;
    max-height: 460px
}
.carousel .carousel-control.left span {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);font-size: 45px;
}
.carousel-caption h3 {

    font-size: 30px;
	letter-spacing: .025em;
    font-weight: 600;text-align:left;
    font-family: soin_sans_pro,Arial,Helvetica,sans-serif;color:#fff;

}
.carousel-caption p {
text-align:left;
    font-size: 17px;
    font-weight: 500;font-family: soin_sans_pro,Arial,Helvetica,sans-serif;
  color:#fff;

}
.carousel-caption p span {
text-align:left;
    font-size: 24px;
    font-weight: 500;
  color:#fff;

}
.carousel-caption-box {top: 50px;
margin-left: 100px;position: absolute!important; display: flex !important; max-width: 100%;}
.carousel-caption-box span {
    display: block;
    float: left;
    margin-left: 15px;
    height: 43px;
    overflow: hidden;
    background-size: 100% auto;
}
.carousel-caption-box img {width:97px;height: 40px;}

@media only screen and (max-width: 600px) {
.carousel-caption-box  {display:none!important}}
@media only screen and (max-width: 414px) {
.carousel-caption-box  {display:none!important}}
@media only screen and (max-width: 411px) {
.carousel-caption-box  {display:none!important}}
@media only screen and (max-width: 320px) {
.carousel-caption-box  {display:none!important}}
.slider-size-h {padding:0px; margin-top:100px;}
.carousel-caption-box img {width:97px;height: 40px;}
@media only screen and (max-width:900px) {
.slider-size-h  {margin-top:0px;}}
@media only screen and (max-width:600px) {
.slider-size-h  {margin-top:0px;}}
@media only screen and (max-width: 414px) {
.slider-size-h  {margin-top:0px;}}
@media only screen and (max-width: 411px) {
.slider-size-h  {margin-top:0px;}}
@media only screen and (max-width: 320px) {
.slider-size-h  {margin-top:10px;}}


@media only screen and (max-width: 600px) {.carousel-caption h3 {
    font-size: 24px;
	letter-spacing: .025em;
    font-weight: 600;text-align:left;
    font-family: soin_sans_pro,Arial,Helvetica,sans-serif;color:#fff;

}}
@media only screen and (max-width: 414px) {.carousel-caption h3 {
    font-size: 20px;
	letter-spacing: .025em;
    font-weight: 600;text-align:left;
    font-family: soin_sans_pro,Arial,Helvetica,sans-serif;color:#fff;

}}
@media only screen and (max-width: 360px) {.carousel-caption h3 {
    font-size: 16px;
	letter-spacing: .025em;
    font-weight: 600;text-align:left;
    font-family: soin_sans_pro,Arial,Helvetica,sans-serif;color:#fff;

}}
@media only screen and (max-width: 600px) {.carousel-caption p {
text-align:left;
    font-size: 13px;
    font-weight: 500;font-family: soin_sans_pro,Arial,Helvetica,sans-serif;
  color:#fff;

}}
@media only screen and (max-width: 600px) {.carousel-caption p span {
text-align:left;
    font-size: 18px;
    font-weight: 500;
  color:#fff;

}}
@media only screen and (max-width: 360px) {.carousel-caption p {
text-align:left;
    font-size: 10px;
    font-weight: 500;font-family: soin_sans_pro,Arial,Helvetica,sans-serif;
  color:#fff;

}}
@media only screen and (max-width: 360px) {.carousel-caption p span {
text-align:left;
    font-size: 16px;
    font-weight: 500;
  color:#fff;

}}
@media only screen and (max-width: 414px) {.d-md-block {
height:100%;

}}


.carousel-caption p {

    text-align: left;
    font-size: 13px;
    font-weight: 500;
    font-family: soin_sans_pro,Arial,Helvetica,sans-serif;
    color: #fff;
	font-style:italic;
}

</style>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("item");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<script async="" src="https://script.hotjar.com/modules.5b778dfa5bf83cc4cad1.js" charset="utf-8"></script><meta http-equiv="origin-trial" content="AymqwRC7u88Y4JPvfIF2F37QKylC04248hLCdJAsh8xgOfe/dVJPV3XS3wLFca1ZMVOtnBfVjaCMTVudWM//5g4AAAB7eyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiUHJpdmFjeVNhbmRib3hBZHNBUElzIiwiZXhwaXJ5IjoxNjk1MTY3OTk5LCJpc1RoaXJkUGFydHkiOnRydWV9"><meta http-equiv="origin-trial" content="A+xK4jmZTgh1KBVry/UZKUE3h6Dr9HPPioFS4KNCzify+KEoOii7z/goKS2zgbAOwhpZ1GZllpdz7XviivJM9gcAAACFeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiQXR0cmlidXRpb25SZXBvcnRpbmdDcm9zc0FwcFdlYiIsImV4cGlyeSI6MTcwNzI2Mzk5OSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ=="><script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/984632813/?random=1691909575441&amp;cv=11&amp;fst=1691909575441&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be3890&amp;u_w=1536&amp;u_h=864&amp;url=https%3A%2F%2Fwww.elegantjourneys.com%2Fholidays-india-oberoi-vilas-holidays%2F3-day-golden-triangle-tour-322&amp;hn=www.googleadservices.com&amp;frm=0&amp;auid=814891156.1691314803&amp;fledge=1&amp;uaa=x86&amp;uab=64&amp;uafvl=Not%252FA)Brand%3B99.0.0.0%7CGoogle%2520Chrome%3B115.0.5790.171%7CChromium%3B115.0.5790.171&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4"></script><style type="text/css">.js-slide-hidden{position:absolute !important;left:-9999px !important;top:-9999px !important;display:block !important}</style>
</head>