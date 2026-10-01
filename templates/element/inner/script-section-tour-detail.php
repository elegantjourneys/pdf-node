
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="<?=WEBROOT?>inner/js/fancybox/jquery.fancybox.min.js"></script>

<script>

		$('[data-fancybox]').fancybox({



			smallBtn : true,
			fullScreen : false,
			iframe : {
				preload : true
			}
		});


		/*$('#mobilePriceDate').change(function() {
			  displayPrice();
		});*/

</script>
	<!-- jquery library -->
	<script>
		var tourDates = [''];

		function showChildAgeOption(sectionNumber)
		{
			var noOfChild = parseInt($('#child'+sectionNumber).val());

			for(i=1;i<=3;i++)
			{
				$('#sectionChildAge'+sectionNumber+'_'+i).css('display','none');
			}

			for(i=1;i<=noOfChild;i++)
			{
				$('#sectionChildAge'+sectionNumber+'_'+i).css('display','block');
			}

		}

		function expanAllDays(requestType)
		{

			for(i=1;i<25;i++)
			{
				//alert('---------------ok--'+i);
				if(document.getElementById('tourFirstDescription'+i))
				{
					if(requestType=='expand')
					{
						expandTourDescription(i);
					}
					else if(requestType=='hide')
					{
						hideTourDescription(i);
					}
				}
			}

			if(requestType=='expand')
			{
				$('#expandAllDays').css('display','none');
				$('#closeAllDays').css('display','inline');
			}
			else if(requestType=='hide')
			{
				$('#expandAllDays').css('display','inline');
				$('#closeAllDays').css('display','none');
			}

		}
		function expandTourDescription(divId)
		{
			//$('#tourDescriptionDot'+divId).css('display','none');
			$('#tourFirstDescription'+divId).css('display','none');
			$('#tourLastDescription'+divId).css('display','inline');
			$('#tourDescriptionExpand'+divId).css('display','none');
			$('#tourDescriptionHide'+divId).css('display','inline');

		}

		function hideTourDescription(divId)
		{
			//$('#tourDescriptionDot'+divId).css('display','inline');
			$('#tourLastDescription'+divId).css('display','none');
			$('#tourFirstDescription'+divId).css('display','inline');
			$('#tourDescriptionExpand'+divId).css('display','inline');
			$('#tourDescriptionHide'+divId).css('display','none');

		}

		function displayPriceInSelectedCurrency()
		{
			var selectedCurrency = $('#userSelectedCurrency').val();
			$('.priceLoader').css('display','inline');
			$('.priceDisplay').css('display','none');

			$.ajax({
				url: '<?=WEBROOT?>inner/jquery.php',
				type: 'post',
				data: {token:'m7ep7a6mboh11db4s4k35mb067', method:'updateSelectedCurrency', currency_code:selectedCurrency},
				dataType: 'json',
				success: function(json)
				{
					for(var i=0;i<tourDates.length;i++)
					{

						setTourPrice(tourDates[i],json.selectedCurrency,json.currencySymbol);

					}

				}

			});

		}




		function setTourPrice(tourStartDate,selectedCurrencyCode, currencySymbol)
		{

			var tourHotelIds = ['13####9593####759273','7####23####759272','12####34####759271','611####1772####759274','1235####3567####759275','1432####4272####759276','18####47####759264','1690####9628####759267','5970####9638####759266','14####38####759265','610####1768####759268','601####1758####759269','644####1858####759270','3####13####759277','627####1813####759278','3####9643####759279','638####9631####759280'];

			for(i=0;i<tourHotelIds.length;i++)
			{
				var dateDivId = tourStartDate.replace("-","_");
				var dateDivId = dateDivId.replace("-","_");
				$('#tourPrice_'+tourHotelIds[i]+'_'+dateDivId).html('');

			}

			$.ajax({
				url: '<?=WEBROOT?>jquery.php',
				type: 'post',
				data: {token:'m7ep7a6mboh11db4s4k35mb067', method:'setTourPrice', event_tax:'5',vehicle_tax:'5',vehicleId:'1',tourId:'322',tourStartDate:tourStartDate, noOfPerson:'2',mislaneous_cost_price:'200',profit:'', discount:'',selectedCurrencyCode:selectedCurrencyCode},
				dataType: 'json',
				success: function(json)
				{
					for(i=0;i<tourHotelIds.length;i++)
					{
						var dateDivId = tourStartDate.replace("-","_");
						var dateDivId = dateDivId.replace("-","_");
						if(json[tourHotelIds[i]]['price_exception']=='n')
						{
							$('#tourPrice_'+tourHotelIds[i]+'_'+dateDivId).html('<span>'+selectedCurrencyCode+' '+currencySymbol+json[tourHotelIds[i]]['profit_price']+'</span> <br><strike class="discount">'+currencySymbol+json[tourHotelIds[i]]['discount_price']+'</strike>');

							$('#tourPrice_'+tourHotelIds[i]+'_'+dateDivId+'_loader').css('display','none');
							$('#tourPrice_'+tourHotelIds[i]+'_'+dateDivId).css('display','block');
						}
						else
						{
							$('#tourPrice_'+tourHotelIds[i]+'_'+dateDivId).html('<span>Click Here to<br /><a href="#tourBookingForms">Request Price</a></span>');

							$('#tourPrice_'+tourHotelIds[i]+'_'+dateDivId+'_loader').css('display','none');
							$('#tourPrice_'+tourHotelIds[i]+'_'+dateDivId).css('display','block');
						}

					}




				}

			});

		}

	</script>
		<script src="<?=WEBROOT?>inner/vendors/jquery/jquery-2.1.4.min.js"></script>
	<!-- external scripts -->
	<script src="<?=WEBROOT?>inner/vendors/bootstrap/javascripts/bootstrap.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jquery-placeholder/jquery.placeholder.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/match-height/jquery.matchHeight.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/wow/wow.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/stellar/jquery.stellar.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/validate/jquery.validate.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/waypoint/waypoints.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/counter-up/jquery.counterup.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jQuery-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<script src="<?=WEBROOT?>inner/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jcf/js/jcf.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jcf/js/jcf.select.js"></script>
	<script src="<?=WEBROOT?>inner/js/mailchimp.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/retina/retina.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/bootstrap-datetimepicker-master/dist/js/bootstrap-datepicker.js"></script>
	<!-- custom jquery script -->
	<script src="<?=WEBROOT?>inner/js/jquery.main.js"></script>
	<!-- revolution slider plugin -->
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<!-- rs5.0 core files -->
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="<?=WEBROOT?>inner/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<!-- revolutions slider script -->
	<script src="<?=WEBROOT?>inner/js/revolution.js"></script>
	<script>
	$(document).ready(function(){
		$('.header-animated').click(function(){
			$(this).toggleClass('open');
		});
	});
	</script>
	<script>
	$("#button_open").click(function(){
		$("#feedback_form").addClass("slide");
	});
	$("#button_close").click(function(){
		$("#feedback_form").removeClass("slide");
	});

	function validateFeedbackForm()
	{
		var name = $('#feedback_name').val();
		var email = $('#feedback_email').val();
		var contactNumber = $('#feedback_contact_number').val();
		var feedbackType = $('#feedback_feedback_type').val();
		var feedbackMessage = $('#feedback_message').val();
		var pageUrl = $('#feedback_page_url').val();
		var attachScreenshot = 'no';
		var validation = true;
		if(name=="")
		{
			//alert('Please enter your name');
			$('#feedback_name').addClass('borderAlertRed');
			$('#feedback_name').focus();
			validation = false;
		}

		if(email=="")
		{
			//alert('Please enter your email');
			$('#feedback_email').addClass('borderAlertRed');
			$('#feedback_email').focus();
			validation = false
		}

		if(contactNumber=="")
		{
			//alert('Please enter your email');
			$('#feedback_contact_number').addClass('borderAlertRed');
			$('#feedback_contact_number').focus();
			validation = false;
		}
		
		if(!validation)
		{
			return false;
		}

		$('#submitFeedback').css('display','none');
		$('#feedbackReset').css('display','none');
		$('#buttonProcessingFeedBack').css('display','inline');

		/*if(document.getElementById('feedback_attach_screenshot').checked)
		{
			attachScreenshot = 'yes';
		}*/
		
		 $.ajax({
			url: '<?=WEBROOT?>inner/jquery.php',
			type: 'post',
			data: {token:'m7ep7a6mboh11db4s4k35mb067', method:'sendFeedback', process:'feedback_process',feedback_name:name,feedback_email:email, feedback_contact_number:contactNumber, feedback_feedback_type:feedbackType, feedback_message:feedbackMessage, feedback_attach_screenshot:attachScreenshot, page_url:pageUrl},
			dataType: 'json',
			success: function(json) 
			{
				if(json.result=='success')
				{
					window.location='<?=WEBROOT?>inner/confirmation.php'
				}
			}
		  
		});


		 return false

	}


	
	</script>

			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128748434-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-128748434-1');
		</script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script  src="<?=WEBROOT?>inner/js/jquery.singlePageNav.min.js" /></script>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

            // The actual plugin
            $('.single-page-nav').singlePageNav({
                offset: $('.single-page-nav').outerHeight(),
                filter: ':not(.external)',
                updateHash: true,
                beforeStart: function() {
                    console.log('begin scrolling');
                },
                onComplete: function() {
                    console.log('done scrolling');
                }
            });
</script>

	  <link href="<?=WEBROOT?>inner/js/date_picker/css/jquery.datepick.css" rel="stylesheet">
		<script src="<?=WEBROOT?>inner/js/date_picker/js/jquery.plugin.min.js"></script>
		<script src="<?=WEBROOT?>inner/js/date_picker/js/jquery.datepick.js"></script>

		<script>
			$(function() {
				$('#enquiryTravelDate').datepick(
					{
						 minDate: 0,
						 dateFormat: 'dd MM yyyy',
						 monthsToShow: 2
					}
				);

			});


			$(function() {
				$('#enquiryTravelDate1').datepick(
					{
						 minDate: 0,
						 dateFormat: 'dd MM yyyy',
						monthsToShow: 2
					}
				);

			});
		</script>

	  <script>
	 /* $( function() {
		$( "#enquiryTravelDate" ).datepicker({ minDate: +1, maxDate: "+24M +10D", numberOfMonths: 1,
      showButtonPanel: true,       changeMonth: true, changeYear: true, dateFormat: 'd MM yy' });
	  } );*/
	  </script>

	<script type="text/javascript">
	var countHotelArea = 1;
	var captchaValidation = false;



	function validateEnquiryForm()
	{
		var enquiryName = $('#enquiryName').val();
		var enquiryEmail = $('#enquiryEmail').val();
		var country = $('#enquiryCountry').val();
		var startDate = $('#enquiryTravelDate').val();
		var enquiryPhone = $('#enquiryPhone').val();
		var noOfPersonRoom1 = $('#adults1').val();
		var captchaText = $('#txtEnquiryCaptchaText').val();

		$('#submitTourEnquiry').css('display','none');
		$('#loadingTourEnquiry').css('display','inline');

		$('#enquiryNameAlert').html('');
		$('#enquiryEmailAlert').html('');
		$('#enquiryCountryAlert').html('');
		$('#enquiryTravelDateAlert').html('');
		$('#enquiryPhoneAlert').html('');
		$('#hotelCategoryAlert').html('');
		$('#adults1Alert').html('');
		$('#txtEnquiryCaptchaTextAlert').html('');

		var validation = true;

		if(enquiryName=="")
		{
			$('#enquiryNameAlert').html('please enter...');
			$('#enquiryName').focus();
			validation = false;
		}

		if(enquiryEmail=="")
		{
			$('#enquiryEmailAlert').html('please enter....');
			$('#enquiryEmail').focus();
			validation = false;
		}

		if(enquiryPhone=="")
		{
			$('#enquiryPhoneAlert').html('please enter....');
			$('#enquiryPhone').focus();
			validation = false;
		}

		if(country=="")
		{
			$('#enquiryCountryAlert').html('please select...');
			$('#enquiryCountry').focus();
			validation = false;
		}

		if(startDate=="")
		{
			$('#enquiryTravelDateAlert').html('please select...');
			$('#enquiryTravelDate').focus();
			validation = false;

		}

		if(noOfPersonRoom1=="")
		{
			$('#adults1Alert').html('please select...');
			$('#adults1').focus();
			validation = false;

		}

		hotelValidation = true;
		for(i=1;i<=totalHotel;i++)
		{

			if(document.getElementById('enquiryHotelPreference'+i).checked)
			{
				hotelValidation = true;
				break;
			}
			else
			{
				hotelValidation = false;
			}
		}

		if(hotelValidation==false)
		{
			$('#hotelCategoryAlert').html('please select...');
			//$('#adults1').focus();
			validation = false;
		}

		if(captchaText=="")
		{
			$('#txtEnquiryCaptchaTextAlert').html('please enter...');
			$('#txtEnquiryCaptchaText').focus();
			validation = false;
		}

		if(captchaText.length!=6)
		{
			$('#txtEnquiryCaptchaTextAlert').html('please enter...');
			$('#txtEnquiryCaptchaText').focus();
			validation = false;
		}

		if(!validation)
		{
			$('#submitTourEnquiry').css('display','inline');
			$('#loadingTourEnquiry').css('display','none');
			return validation;
		}

		if(!captchaValidation)
		{
			captchaText = captchaText.toUpperCase();

			$.ajax({
					url: '<?=WEBROOT?>inner/jquery.php',
					type: 'post',
					data: {method:'validateSecurityText',security_text:captchaText},
					dataType: 'json',
					success: function(json)
					{
						if(json.result=='success')
						{
							captchaValidation = true;
							$('#tourEnquiryForm').submit();
						}
						else
						{
							alert('Please validate that you are not robot.');
						}

					}

				});
		}
		else
		{
			return true;
		}

		return false;

	}

   $(function() {
		var header = $(".fix-strip");
		$(window).scroll(function() {
		 var scroll = $(window).scrollTop();

			if (scroll >= 370){
				header.removeClass('fix-strip').addClass("scroll-strip");
			} else {
				header.removeClass("scroll-strip").addClass('fix-strip');
			}
		});
	});

	 $(function() {
		var header = $(".video-scroll");
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 1500){
				header.removeClass('video-scroll').addClass("video-fixed");
			}

			if(scroll >= 3150){
				header.removeClass("video-fixed").addClass('video-scroll');
			}
			if(scroll <1000){
				header.removeClass("video-fixed").addClass('video-scroll');
			}
		});
	});


	function displayItinerary()
	{
		$('.tourDays4').css('display','block');
		$('#displayItineraryButton').css('display','none');
		return false;

	}

	function hideRoom(divId)
	{
		$('#hotelInfoArea'+divId).css('display','none');

	}


	var informationSend=false;

	function sendShortInformation()
	{

		if(informationSend)
		{
			return;
		}

		var objForm = document.tourEnquiryForm;
		customerName = objForm.enquiryName.value;
		customerEmail = objForm.enquiryEmail.value;
		customerPhone = objForm.enquiryPhone.value;
		//var subject = 'Short enquiry received from tour detail page';


		if(customerName!=""&&customerEmail!=""&&customerPhone!="")
		{
			var tourName = '3 Day Golden Triangle Tour';
			var tourId = '322';
			var pageUrl = '<?=WEBROOT?>inner/holidays-india-oberoi-vilas-holidays/3-day-golden-triangle-tour-322';
			var tourCode = '322';

			$.ajax({
					url: '<?=WEBROOT?>inner/jquery.php',
					type: 'post',
					data: {method:'sendShortCustomerInfo', customerName:customerName, customerEmail:customerEmail, customerPhone:customerPhone, tour_name:tourName, tour_id:tourId, page_url:pageUrl, tour_code:tourCode},
					dataType: 'json',
					success: function(json)
					{
						if(json.result=='success')
						{
							informationSend=true;


						}

					}

				});


		}

	}

	function addMoreRoom()
	{
		countHotelArea = (countHotelArea+1);
		if(countHotelArea>=4)
		{
			$('#addMoreRoom').css('display','none');
		}
		$('#hotelInfoArea'+countHotelArea).css('display','block');

	}

	function getRoomInformation()
	{
		var roomHotels = ["13####9593####759273","7####23####759272","12####34####759271","611####1772####759274","1235####3567####759275","1432####4272####759276","18####47####759264","1690####9628####759267","5970####9638####759266","14####38####759265","610####1768####759268","601####1758####759269","644####1858####759270","3####13####759277","627####1813####759278","3####9643####759279","638####9631####759280"];
		$.ajax({
				url: '<?=WEBROOT?>inner/ajax/jquery-hotels.php',
				type: 'post',
				data: {method:'getHotelRoomInformation', roomIds:roomHotels},
				dataType: 'json',
				success: function(json)
				{
					for(var i=0;i<json.length;i++)
					{
						$('#hotelName_'+json[i].hotel_id+'_'+json[i].row_id).html(json[i].hotel_name);
						$('#roomName_'+json[i].room_id+'_'+json[i].row_id).html(json[i].room_name);

					}

				}
			});


	}



	</script>

       <script>
	    $(document).ready(function() {

			//getRoomInformation();


			var scrollLink = $('.scroll');

		  // Smooth scrolling
		  scrollLink.click(function(e) {
		  e.preventDefault();
		  $('body,html').animate({
			  scrollTop: $(this.hash).offset().top
			}, 1000 );
		  });

		  // Active link switching
		  $(window).scroll(function()
		  {
				var scrollbarLocation = $(this).scrollTop();

				scrollLink.each(function() {

				var sectionOffset = '';
				if($(this.hash).offset())
				{
					sectionOffset = $(this.hash).offset().top - 100;
				}

			  if ( sectionOffset <= scrollbarLocation ) {
				$(this).parent().addClass('active');
				$(this).parent().siblings().removeClass('active');
			  }
		})

	})


		displayDayPrice();
	

  })

 function customtour(){

	 $('#tourInclusion').addClass('custominclusion');
 }



</script>
