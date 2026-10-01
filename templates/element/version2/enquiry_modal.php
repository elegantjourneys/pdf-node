<div id="form-placeholder">
    <?php if (!isset($showEnquiryModal) || $showEnquiryModal !== false): ?>
        <button
            class="bg-warning p-2 py-3 position-fixed top-50 end-0 z-3 rounded-end border-0"
            style="writing-mode: vertical-rl; transform: rotate(180deg)"
            data-bs-toggle="modal"
            data-bs-target="#enquireModal">
            Enquire Now
        </button>
    <?php endif; ?>
    <!-- Modal -->
    <div
        class="modal fade"
        id="enquireModal"
        tabindex="-1"
        aria-labelledby="enquireModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-body d-flex flex-column flex-md-row p-0">
                    <!-- Left half: Image -->
                    <div class="col-md-6 d-none d-md-block">
                        <img
                            src="<?= WEBROOT ?>version2/assets/images/form-image.png"
                            alt="Image"
                            class="img-fluid" />
                    </div>

                    <!-- Right half: Form -->
                    <div class="col-md-6 position-relative p-4">
                        <button
                            type="button"
                            class="btn-close position-absolute"
                            style="top: 10px; right: 10px"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>

                        <?= $this->Form->create(null, ['url' => ['controller' => 'Enquiries', 'action' => 'sendEnquiry'], 'id' => 'enquiryForm', 'novalidate',]) ?>
                        <div class="mb-2">
                            <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="fullName"
                                name="fullName"
                                placeholder="Enter Your Name"
                                required />
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email Id <span class="text-danger">*</span></label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter Your Email"
                                required />
                        </div>
                        <div class="mb-2">
                            <label for="phoneNumber" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input
                                type="tel"
                                class="form-control"
                                id="phoneNumber"
                                name="phoneNumber"
                                placeholder="Enter Your Mobile No."
                                required />
                        </div>
                        <div class="mb-2">
                            <label for="extraNote" class="form-label">Any specific requirements</label>
                            <textarea
                                class="form-control"
                                id="extraNote"
                                name="extraNote"
                                rows="2"
                                placeholder="eg: no of peoples, rooms, doubt etc..."></textarea>
                        </div>
                        <!-- Security Text -->
                        <div class="mb-2">
                            <label for="ecaptcha" class="form-label">Security Text <span class="text-danger">*</span></label>
                            <div class="d-flex gap-2 align-items-center">
                                <input
                                    type="text"
                                    class="form-control text-uppercase w-50"
                                    name="ecaptcha"
                                    maxlength="6"
                                    id="ecaptchaInput"
                                    placeholder="Enter security text"
                                    required />
                                <span>
                                    <img src="<?= WEBROOT ?>/ecaptcha" alt="CAPTCHA Image" class="captcha-img" id="ecaptchaImage" style="height: 40px;">
                                    <a href="javascript:void(0);" onclick="document.getElementById('ecaptchaImage').src = '<?= WEBROOT ?>ecaptcha?' + Date.now();"><i class="fa fa-refresh" aria-hidden="true"></i></a>

                                </span>
                            </div>

                        </div>
                        <button type="submit" class="btn bg-teal text-white">Submit</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-3">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="confirmationModalLabel">Thank You</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-5 mb-0" id="confirmationMessage">
                <h3>Your query has been received.</h3>
                <div>Thank you for contacting us. Your query has been received to us.</div>
                <div> We will contact you shortly.</div>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    $('#ecaptchaInput').on('input', function() {
        this.value = this.value.toUpperCase();
    });

    $(function() {
        const $form = $('#enquiryForm');

        var _csrfToken = '<?= $this->request->getAttribute('csrfToken') ?>';

        // jQuery Validation with CAPTCHA remote check
        $form.validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "phoneNumber") {
                    error.insertAfter(element.parent());
                } else if (element.attr("name") == "ecaptcha") {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                fullName: "required",
                 phoneNumber: {
                    required: true,
                    digits: true,
                    minlength: 5,
                    maxlength: 15
                },
                email: {
                    required: true,
                    email: true
                },
                ecaptcha: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                    remote: {
                        url: "<?= WEBROOT ?>everify-captcha",
                        type: "post",
                        data: {
                            captcha: function() {
                                return $('#ecaptchaInput').val();
                            },
                            _csrfToken: _csrfToken
                        }
                    }
                }
            },
            messages: {
                fullName: "Please enter your name",
                phoneNumber: {
                    required: "Please enter your phone number",
                    digits: "Phone number must contain digits only",
                    minlength: "Phone number must be at least 5 digits",
                    maxlength: "Phone number can't be longer than 15 digits"
                },
                email: {
                    required: "Please enter your email",
                    email: "Enter a valid email"
                },
                ecaptcha: {
                    required: "Please enter the security code",
                    remote: "Incorrect security text."
                }
            },
            /*  submitHandler: function (form) {
              // AJAX submission
              $.ajax({
                url: "<?= WEBROOT ?>send-enquiry",
                type: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                headers: {
                  'X-CSRF-Token': _csrfToken
                },
                success: function (response) {
                    if (response.status === 'success') {
                        $form[0].reset();
                        $('.ecaptcha-img').attr('src', '<?= WEBROOT ?>ecaptcha?ts=' + new Date().getTime());

                        // Hide enquiry modal
                        var enquireModal = bootstrap.Modal.getInstance(document.getElementById('enquireModal'));
                        if (enquireModal) enquireModal.hide();

                        // Set message and show confirmation modal
                        //$('#confirmationMessage').text(response.message || 'Your enquiry has been successfully submitted.');
                        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                        confirmationModal.show();
                    } else if (response.status === 'error' && response.errors) {
                        // Clear previous error labels
                        $form.find('label.error').remove();

                        $.each(response.errors, function (field, message) {
                            const $field = $form.find('[name="' + field + '"]');
                            if ($field.length) {
                                $field.after('<label class="error text-danger">' + message + '</label>');
                            }
                        });

                        $('.ecaptcha-img').attr('src', '<?= WEBROOT ?>ecaptcha?ts=' + new Date().getTime());
                    } else {
                        alert(response.message || 'Something went wrong.');
                    }
                },
                error: function () {
                  alert('Server error. Please try again.');
                }
              });
              return false;
            }  */
            submitHandler: function(form) {
                const $loader = $('#pageLoader'); // Full-page loader

                // Show loader
                $loader.removeClass('d-none').addClass('d-flex');

                $.ajax({
                    url: "<?= WEBROOT ?>send-enquiry",
                    type: 'POST',
                    data: $form.serialize(),
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': _csrfToken
                    },
                    success: function(response) {
                        // Hide loader
                        $loader.removeClass('d-flex').addClass('d-none');

                        if (response.status === 'success') {
                            $form[0].reset();
                            $('.ecaptcha-img').attr('src', '<?= WEBROOT ?>ecaptcha?ts=' + new Date().getTime());

                            const enquireModal = bootstrap.Modal.getInstance(document.getElementById('enquireModal'));
                            if (enquireModal) enquireModal.hide();

                            //$('#confirmationMessage').text(response.message || 'Your enquiry has been successfully submitted.');
                            const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                            confirmationModal.show();
                        } else if (response.status === 'error' && response.errors) {
                            $form.find('label.error').remove();

                            $.each(response.errors, function(field, message) {
                                const $field = $form.find('[name="' + field + '"]');
                                if ($field.length) {
                                    $field.after('<label class="error text-danger">' + message + '</label>');
                                }
                            });

                            $('.ecaptcha-img').attr('src', '<?= WEBROOT ?>ecaptcha?ts=' + new Date().getTime());
                        } else {
                            alert(response.message || 'Something went wrong.');
                        }
                    },
                    error: function() {
                        $loader.removeClass('d-flex').addClass('d-none');
                        alert('Server error. Please try again.');
                    }
                });

                return false;
            }

        });
    });
</script>