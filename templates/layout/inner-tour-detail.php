<!doctype html>
<html lang="en">

<?php echo $this->element("inner/head-section-tour-detail");?>

<body>
<div id="wrapper">
<div class="page-wrapper">
	<?php echo $this->element("inner/header");?>
	<style>
	.close {
		  cursor: pointer;		 
		  top: 10%;
		  right: 0%;
		  padding: 12px 0;
		  font-weight:normal;
		  transform: translate(0%, -50%);
		}

	.feedbackLoaderButton{
			display: inline-block;
			padding: 8px 25px;
			background: #f39820;
			color: #fff;
			outline: none;
			box-shadow: none;
			border: none;
			margin-right: 10px;
	}

	
</style>
			
			<div class="feedbabk_wrapper" id="feedback_form">
				<div class="feedback_bx">
									<span class="close" onclick="$( &quot;#button_close&quot; ).trigger( &quot;click&quot; );"><i class="fas fa-window-close"></i>x</span>
					<form name="sendFeedback" action="" method="post" onsubmit="return validateFeedbackForm();">
					<input type="hidden" value="submit_feedback" name="process" id="feedback_process">
					<input type="hidden" value="https://www.elegantjourneys.com/holidays-india-oberoi-vilas-holidays/3-day-golden-triangle-tour-322" name="page_url" id="feedback_page_url">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="feedback_name" id="feedback_name">
						</div>
						<div class="form-group">
							<label>Email <sup>*</sup></label>
							<input type="email" name="feedback_email" id="feedback_email">
						</div>
						<div class="form-group">
							<label>Contact Number <sup>*</sup></label>
							<input type="text" name="feedback_contact_number" id="feedback_contact_number">
						</div>
						<div class="form-group" id="fieldFeedbackType">
							<label>Feedback Type <sup>*</sup></label>
							<div class="select_wr">
								<select name="feedback_feedback_type" id="feedback_feedback_type" class="jcf-hidden">
									<option selected="selected" value="Sales Enquiry">Sales Enquiry</option>	
									<option value="Website Issue">Website Issue</option>
									<option value="Suggestion">Suggestion</option>
									<option value="Other">Other</option>
								</select><span class="jcf-select jcf-unselectable"><span class="jcf-select-text"><span class="">Sales Enquiry</span></span><span class="jcf-select-opener"></span></span>
							</div>
						</div>
						<div class="form-group">
							<label>Message </label>
							<textarea name="feedback_message" id="feedback_message"></textarea>
						</div>
						<!--<label for="field_attachement_SCREENSHOT" class="choice ltr" id="fieldAttachment">
							<input type="checkbox" name="feedback_attach_screenshot" id="feedback_attach_screenshot" value="1"> Click to automatically attach a screenshot of this page
						</label>-->
						<div class="form-group">
							<input type="submit" value="Submit" name="" id="submitFeedback" style="display:inline;">
							<button class="feedbackLoaderButton" id="buttonProcessingFeedBack" style="display:none;"><i class="fa fa-refresh fa-spin"></i> Processing</button>
							<button type="reset" id="feedbackReset" style="display:inline;">Cancel</button>
						</div>
					</form>
				</div>
				<input type="checkbox" id="feedback_btn">
				<label for="feedback_btn">
					<span id="button_open">Enquire Now</span>
					<span id="button_close">Enquire Now</span>
				</label>
			</div>
			<!-- main banner -->

			

			<!-- main container -->

			
			<!-- Inquire Now -->
			<div class="inquire_fixed-plan-button">
			
				<!-- <a data-fancybox data-type="iframe" data-src="../inquire.php?eid="  href="javascript:;" class="btn primary"> Inquire Now</a> -->
			</div>
			<!-- Inquire Now -->
	<main id="main" class="maindb" style=" background-color:#ffffff;">
		   <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
	</main>
	</div>
	<?php echo $this->element("inner/footer");?>
	</div>
	
</body>
<?php echo $this->element("inner/script-section-tour-detail");?>	
</html>