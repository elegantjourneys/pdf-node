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

	<link rel="icon" type="image/png" sizes="16x16" href="<?=WEBROOT?>img/favicon-16x16.png">

	
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/font-awesome/css/font-awesome-compressed.css">
	
	<!-- include bootstrap css -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/cssorig/bootstrap.css">
	<!-- include owl css -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/owl-carousel/owl.carousel-compressed.css">
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/vendorsorig/owl-carousel/owl.theme-compressed.css">
	<!-- include main css -->
	<link media="all" rel="stylesheet" href="<?=WEBROOT?>inner/cssorig/main-compressed.css">
		
	<link rel="stylesheet" type="text/css"  href="<?=WEBROOT?>inner/css/custom-sgr-compressed.css" />
	
	<style>
	body{
	font-family: 'Work Sans', sans-serif;
	} 
		main#main {
    padding: 84px 0;
}
	#footer > .container 
	{
		padding-top: 20px !important;
		padding-bottom:5px;
	}
		#list-view-normal {
		background-image: url("https://www.elegantjourneys.com/repositery/category/1498486121_india-tour.jpg");
	}
		.tour-offer-label::after {
		content: "";
		width: 14px;
		height: 13px;
		left: -6px;
		border-bottom: 8px solid #f98764;
		border-left: 8px solid #f98764;
		position: absolute;
		transform: rotate(45deg);
		top: 4px;
	}
	.tour-offer-label {
			font-weight: 400;
			font-size: 12px;
			position: relative;
			top: -4px;
			margin-left: 22px;
			background: #f98764;
		}

		.article h3 a {
			color: #5c5e62 !important;
			font-weight: 600;
			font-size: 17px !important;
			text-transform: capitalize;
			padding: 0px;
		}


@media only screen and (max-width: 568px){
.fancybox-slide--iframe .fancybox-content{
	   max-height: 470px!important;
}
#slick .field textarea.message {
    height: 105px!important;

}
}
@media only screen and (max-width: 414px){
.places_new{
	font-size:13px!important;
}
}
@media only screen and (max-width: 375px){
.places_new{
	font-size:10px!important;
}
}
	.fancybox-slide--iframe .fancybox-content {
	width  : 500px!important;
	height : 650px!important;
	max-width  : 90%!important;
	margin: 0!important;
		}
.filter-option{
	box-shadow: 0px 0px 6px rgba(0,0,0,0.18) !important;
    padding: 10px;
    background: #fff;
    display: block;
}
.inquire_fixed-plan-button {
    position: fixed;
    z-index: 99;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #f2f2f1;
    padding: 12px;
    text-align: center;
}
.inquire_fixed-plan-button .btn {
    display: inline-block;
    width: 280px;
    max-width: 100%;
}
.btn.primary {

    font-size: 17px;
    color: #fff;
    background-color: #f29821;
    -ms-filter: "alpha(opacity=85)";
    opacity: .85;
    -webkit-transition: opacity .15s ease-in;
    -moz-transition: opacity .15s ease-in;
    -o-transition: opacity .15s ease-in;
    transition: opacity .15s ease-in;
    text-align: center;
    padding: 14px 12px;
    padding-bottom: 13px;
    font-weight: 600;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    line-height: 1;

}
@media screen and (min-width: 1000px){
.inquire_fixed-plan-button {
    display: none !important;
}
}
@media screen and (max-width: 480px){
.btn.primary{padding: 12px 12px;}
.inquire_fixed-plan-button .btn {width: 255px;}
#scroll-to-top {z-index: 0;}
}

@media only screen and (min-width: 1230px)
{.new-box-size-boot-1 {
    
    font-size: 16px!important;
}}

@media screen and (max-width: 768px){
.new-boot-mob label.tour-info-label:after {
    content: "";
    width: 11px;
    height: 10px;
    top: 31px;
    left: 45%;
    border-bottom: 5px solid #5bc0de;
    border-right: 5px solid #5bc0de;
    position: absolute;
    transform: rotate(45deg);
}	
	
.new-boot-mob label.tour-info-label {
    font-weight: 400;
    font-size: 15px;
    position: relative;
    top: -6px;
    padding: 10px 20px 10px 20px;
    margin-left: 10px;
    font-weight: 500;
}
.new-boot-mob label.tour-offer-label::after {
    content: "";
    width: 15px;
    height: 13px;
    left: -5px;
    border-bottom: 8px solid #f98764;
    border-left: 8px solid #f98764;
    position: absolute;
    transform: rotate(45deg);
    top: 4px;
}
.new-boot-mob label.tour-offer-label {
    font-size: 15px;
    position: relative;
    top: -4px;
    background: #f98764;
    padding: 10px 20px 10px 20px;
    margin-left: 23px;
    font-weight: 500;
}
.new-boot-mob header.heading {
    margin-top: 13px;
}}

@media screen and (max-width: 414px){
.new-boot-mob label.tour-info-label:after {
    content: "";
    width: 11px;
    height: 10px;
    top: 33px;
    left: 45%;
    border-bottom: 5px solid #5bc0de;
    border-right: 5px solid #5bc0de;
    position: absolute;
    transform: rotate(45deg);
}	

.box-sixz-1{
		font-weight: 500!important;
    font-size: 18px!important;
    padding-left: 5px;
}
.new-boot-mob label.tour-info-label {
    font-weight: 400;
    font-size: 15px;
    position: relative;
    top: -6px;
    padding: 10px 20px 10px 20px;
    margin-left: 10px;
    font-weight: 500;
}
.new-boot-mob label.tour-offer-label::after {
    content: "";
    width: 15px;
    height: 13px;
    left: -5px;
    border-bottom: 8px solid #f98764;
    border-left: 8px solid #f98764;
    position: absolute;
    transform: rotate(45deg);
    top: 4px;
}
.new-boot-mob label.tour-offer-label {
    font-size: 15px;
    position: relative;
    top: -4px;
    background: #f98764;
    padding: 10px 20px 10px 20px;
    margin-left: 23px;
    font-weight: 500;
}
.new-boot-mob header.heading {
    margin-top: 13px;
}
.new-boot-mob .description.new-boot-mob span {
    font-size: 20px;
}
.new-boot-mob footer.info-footer {
    display: none;
}
.new-boot-mob footer span.price {
    font-size: 21px!important;
    padding-top: 4px;
}
.new-boot-mob .article .activity-level {
    margin-bottom: 0px;
}
.new-boot-mob .btn.view-details {
    background: #f39820 !important;
    padding: 10px 40px !important;
    border: 2px solid #f39820 !important;
    margin: 2px 0px 15px !important;
    color: #fff !important;
    font-size: 20px;
    font-weight: 600;
}

.new-box-size-boot {
    font-size: 18px;
}
.new-box-size-boot-1 {
    font-size: 18px!important;
}
.places_new.new-box-size-boot-2 {
    font-weight: 500!important;
	
    word-break: break-all;
    font-size: 16px!important;
}
.new-boot-mob aside .info-day {
    font-size: 22px!important; 
    font-weight: 500;
}
#footer .tags-wrap ul li {
    float: none;
    display: inline!important;
    text-align: center;
}
.footer-nav.tags-wrap h3 {
    text-align: center;
}
section.content-block img {
    margin: 0px auto;
}
.article footer .price span, .article .info-aside .price span {
    display: inline!important;
}.description.new-boot-mob p {
    margin: 0px;
    padding: 0px;
}}
@media screen and (min-width: 1000px){
.inquire_fixed-plan-button {
    display: none !important;
}
}
@media screen and (max-width: 480px){
.btn.primary{padding: 12px 12px;}
.inquire_fixed-plan-button .btn {width: 255px;}
#scroll-to-top {z-index: 0;}
}

@media only screen and (min-width: 1230px)
{.new-box-size-boot-1 {
    
    font-size: 16px!important;
}}
@media screen and (max-width: 375px){
.new-boot-mob label.tour-info-label:after {
    content: "";
    width: 11px;
    height: 10px;
    top: 30px;
    left: 45%;
    border-bottom: 5px solid #5bc0de;
    border-right: 5px solid #5bc0de;
    position: absolute;
    transform: rotate(45deg);
}	
	
.new-boot-mob label.tour-info-label {
    font-weight: 400;
    font-size: 14px;
    position: relative;
    top: -6px;
    padding: 10px 15px 10px 15px;
    margin-left: 10px;
    font-weight: 500;
}
.new-boot-mob label.tour-offer-label::after {
    content: "";
    width: 15px;
    height: 13px;
    left: -5px;
    border-bottom: 8px solid #f98764;
    border-left: 8px solid #f98764;
    position: absolute;
    transform: rotate(45deg);
    top: 4px;
}
.new-boot-mob label.tour-offer-label {
    font-size: 14px;
    position: relative;
    top: -4px;
    background: #f98764;
    padding: 10px 15px 10px 15px;
    margin-left: 23px;
    font-weight: 500;
}
.new-boot-mob header.heading {
    margin-top: 13px;
}
.new-boot-mob .description.new-boot-mob span {
    font-size: 20px;
}
.new-boot-mob footer.info-footer {
    display: none;
}
.new-boot-mob footer span.price {
    font-size: 20px!important;
    padding-top: 4px;
}
.new-boot-mob .article .activity-level {
    margin-bottom: 0px;
}
.new-boot-mob .btn.view-details {
    background: #f39820 !important;
    padding: 10px 30px !important;
    border: 2px solid #f39820 !important;
    margin: 2px 0px 15px !important;
    color: #fff !important;
    font-size: 18px;
    font-weight: 600;
}

.new-box-size-boot {
    font-size: 18px;
}
.new-box-size-boot-1 {
    font-size: 18px!important;
}
.places_new.new-box-size-boot-2 {
    font-weight: 500!important;
	
    word-break: break-all;
    font-size: 16px!important;
}
.new-boot-mob aside .info-day {
    font-size: 22px!important; 
    font-weight: 500;
}
#footer .tags-wrap ul li {
    float: none;
    display: inline!important;
    text-align: center;
}
.footer-nav.tags-wrap h3 {
    text-align: center;
}
section.content-block img {
    margin: 0px auto;width: 205px;
}
.article footer .price span, .article .info-aside .price span {
    display: inline!important;
}.description.new-boot-mob p {
    margin: 0px;
    padding: 0px;
}}
@media screen and (max-width: 320px){
.new-boot-mob label.tour-info-label:after {
    content: "";
    width: 11px;
    height: 10px;
    top: 28px;
    left: 45%;
    border-bottom: 5px solid #5bc0de;
    border-right: 5px solid #5bc0de;
    position: absolute;
    transform: rotate(45deg);
}	
.description.new-boot-mob p {
    margin: 0px;
    padding: 0px;
}	
.new-boot-mob label.tour-info-label {
    font-weight: 400;
    font-size: 13px;
    position: relative;
    top: -6px;
    padding: 10px 15px 10px 15px;
    margin-left: 10px;
    font-weight: 500;
}
.new-boot-mob label.tour-offer-label::after {
    content: "";
    width: 15px;
    height: 13px;
    left: -5px;
    border-bottom: 8px solid #f98764;
    border-left: 8px solid #f98764;
    position: absolute;
    transform: rotate(45deg);
    top: 4px;
}
.new-boot-mob label.tour-offer-label {
    font-size: 13px;
    position: relative;
    top: -4px;
    background: #f98764;
    padding: 10px 15px 10px 15px;
    margin-left: 23px;
    font-weight: 500;
}
.new-boot-mob header.heading {
    margin-top: 13px;
}
.new-boot-mob .description.new-boot-mob span {
    font-size: 20px;
}
.new-boot-mob footer.info-footer {
    display: none;
}
.new-boot-mob footer span.price {
    font-size: 18px!important;
    padding-top: 4px;
}
.new-boot-mob .article .activity-level {
    margin-bottom: 0px;
}
.new-boot-mob .btn.view-details {
    background: #f39820 !important;
    padding: 10px 20px !important;
    border: 2px solid #f39820 !important;
    margin: 2px 0px 15px !important;
    color: #fff !important;
    font-size: 16px;
    font-weight: 600;
}

.new-box-size-boot {
    font-size: 18px;
}
.new-box-size-boot-1 {
    font-size: 18px!important;
}
.places_new.new-box-size-boot-2 {
    font-weight: 500!important;
	
    word-break: break-all;
    font-size: 16px!important;
}
.new-boot-mob aside .info-day {
    font-size: 22px!important; 
    font-weight: 500;
}
#footer .tags-wrap ul li {
    float: none;
    display: inline!important;
    text-align: center;
}
.footer-nav.tags-wrap h3 {
    text-align: center;
}
section.content-block img {
    margin: 0px auto;width: 205px;
}
.article footer .price span, .article .info-aside .price span {
    display: inline!important;
}
.new-box-size-boot-1{font-size:16px;}

.doublespace {
	   
	    display:inline-block;
	    width:100%;
}

.breadcrumb>li+li:before{content:'>>' !important; padding:0 5px;color:#ccc}

@media only screen and (min-width: 1230px) {
	.filter-option .result-info {
		float: left;
		max-width: 60%;
		margin-bottom: 0;
	}

	.filter-option .result-info {
			font-size: 1.543em;
			line-height: 1em;
			padding-top: 0px;
			display: block;
			margin-bottom: 15px;
			padding-left: 20px;
		}
	.filter-option .layout-holder {

		float: right;
		width: 40%;

	}
}


</style>

<style type="text/css">.js-slide-hidden{position:absolute !important;left:-9999px !important;top:-9999px !important;display:block !important}</style><style></style>

</head>