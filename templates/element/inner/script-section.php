
	<!-- jquery library -->
	
		<script src="<?=WEBROOT?>inner/vendors/jquery/jquery-2.1.4.min.js"></script>
	<!-- external scripts -->
	<script src="<?=WEBROOT?>inner/vendors/bootstrap/javascripts/bootstrap.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jquery-placeholder/jquery.placeholder.min.js"></script>

	
	<script src="<?=WEBROOT?>inner/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jcf/js/jcf.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/jcf/js/jcf.select.js"></script>
	<script src="<?=WEBROOT?>inner/vendors/bootstrap-datetimepicker-master/dist/js/bootstrap-datepicker.js"></script>
	<!-- custom jquery script -->
	<script src="<?=WEBROOT?>inner/js/jquery.main.js"></script>
	
	
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
			url: '<?=WEBROOT?>jquery.php',
			type: 'post',
			data: {token:'sppgrih4c7il89cvdksuu4odu7', method:'sendFeedback', process:'feedback_process',feedback_name:name,feedback_email:email, feedback_contact_number:contactNumber, feedback_feedback_type:feedbackType, feedback_message:feedbackMessage, feedback_attach_screenshot:attachScreenshot, page_url:pageUrl},
			dataType: 'json',
			success: function(json) 
			{
				if(json.result=='success')
				{
					window.location='<?=WEBROOT?>confirmation.php'
				}
			}
		  
		});


		 return false

	}


	
	</script>

	<script>
		function filterResult()
		{
			var travelParameter = "";
			var travelTheme = $('#travelThemeFilter').val();
			var travelDays = $('#travelDaysFilter').val();
			//var travelPrices = $('#travelPriceFilter').val();
			if(travelTheme!="0"||travelDays!="0"||travelPrices!="0")
			{
				
				if(travelTheme!="0")
				{
					//travelParameter = '&'+travelParameter+"travelType="+travelTheme;
				}

				if(travelDays!="0")
				{
					var arrTravelDuration = travelDays.split('to');
					travelParameter = travelParameter+"&minTravelDuration="+arrTravelDuration[0]+'&maxTravelDuration='+arrTravelDuration[1];
				}

				/*if(travelPrices!="0")
				{
					var arrTravelPrice = travelPrices.split('to');
					travelParameter = '&'+travelParameter+"&minTravelPrice="+arrTravelPrice[0]+'&maxTravelPrice='+arrTravelPrice[1];
				}*/

			}
			
						window.location='/holidays-india-oberoi-vilas-holidays'+travelParameter;

		}
		
		 $('#totalTourCount').html('16');


	</script>