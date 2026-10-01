<?php
	$generalData = $data['general'];
	$cityList = array();
	
	foreach($data['general']['destinations'] as $cities)
	{
		if(in_array($cities['city'],$cityList))
		{
			continue;
		}
		$cityList[] = $cities['city'];
	}
	

?>
<style>
/* Grid layout */
.video-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 20px;
}

.video-item {
  text-align: center;
}

.thumbnail-wrapper {
  position: relative;
  width: 100%;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
  background-color: #000; /* Fallback if image not loaded */
  overflow: hidden;
  border-radius: 8px;
}

.thumbnail-wrapper img {
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures uniform size */
}

.play-button-overlay {
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  font-size: 30px;
  color: white;
  background: rgba(0,0,0,0.5);
  border-radius: 50%;
  padding: 12px 20px;
  cursor: pointer; 
}


.video-details {
  margin-top: 8px;
}

.video-name {
  font-size: 1.1em;
  margin: 0;
  font-weight: bold;
}

.video-country {
  font-size: 0.9em;
  color: #666;
  margin: 0;
}
</style>
<script>
	var _csrfToken = '<?=$this->request->getAttribute('csrfToken')?>';	
</script>

 <div
        class="bottom-strip row align-items-center position-fixed start-0 bottom-0 py-3"
      >
        <div class="col-md-6 fw-semibold bs-fs text-start d-none d-md-block">
          <p class="m-0" aria-label="Tour title"><?=$generalData['name']?></p>
        </div>
        <div class="col-md-6 fw-semibold bs-fs text-center text-md-end text-nowrap">
          Prices starting from <span id="tourPriceStartFrom"><?=$data['tour_prices']['base_price']['currency_code']?> <?=$data['general']['price']?></span>
          <button
            class="btn bg-teal text-white rounded-1 ms-3"
            data-bs-toggle="modal"
            data-bs-target="#enquireModal"
          >
            Enquire Now
          </button>
        </div>
      </div>
      <section class="heroSection w-100 py-4">
        <?php echo $this->element('common/breadcrumb-ver2'); ?>
        <div class="row align-items-center">
          <div class="col-12 col-md-6">
            <h1 class="fs-3 fw-bold"><?=$generalData['name']?></h1>
          </div>
		  <?php
		  /*
          <div class="col-12 col-md-6 text-start text-md-end mt-md-0 mt-2">
            <!-- mark -->
            <a
              href="#"
              class="d-inline-flex align-items-center justify-content-center rounded-pill border-teal py-2 px-4 text-black text-decoration-none btn-hover"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              ><i class="ri-upload-2-line"></i>
              <span class="ms-2">Share</span>
              <i class="ms-1 ri-arrow-down-s-line"></i>
            </a>

            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item d-flex align-items-center gap-2" href="<?=$data['sharing_urls']['facebook']?>" target="_blank">
					<i class="fa-brands fa-facebook"></i> Facebook
				</a>
              </li>
              <li>
                <a
                  class="dropdown-item d-flex align-items-center gap-2"
                  href="<?=$data['sharing_urls']['twitter']?>" target="_blank"
                  ><i class="fa-brands fa-x-twitter"></i> Twitter</a
                >
              </li>
              <li>
                <a
                  class="dropdown-item d-flex align-items-center gap-2"
                  href="<?=$data['sharing_urls']['linkedin']?>" target="blank"
                  ><i class="fa-brands fa-linkedin-in"></i> LinkedIn</a
                >
              </li>
              <li>
                <a
                  class="dropdown-item d-flex align-items-center gap-2"
                  href="<?=$data['sharing_urls']['whatsapp']?>" target="blank"
                  ><i class="fa-brands fa-whatsapp"></i> WhatsApp</a
                >
              </li>
            </ul>

            <a
              href="#" onclick="bookmarkPage(); return false;"
              class="d-inline-flex align-items-center justify-content-center rounded-pill border-teal py-2 px-4 text-black text-decoration-none ms-1 ms-md-3 btn-hover"
              ><i class="ri-bookmark-fill"></i>
              <span class="ms-2">Save</span></a
            >
          </div>
		  */
		  ?>
        </div>
        <div class="w-100 mt-3 mt-md-2 text-secondary">
          <p><?=implode("-",$cityList)?> · <?=($generalData['duration']-1)?> Nights&nbsp;&nbsp;&nbsp;[<?=$generalData['tour_code']?>]</p>
        </div>
        <div class="row g-2">
          <div class="col-9 col-md-6">
            <img
              src="<?=WEBROOT?>version2/assets/images/grid-img1.png"
              class="img-fluid w-100 h-100"
              alt="Large Image"
            />
          </div>

          <div class="col-3 d-flex flex-column gap-2">
            <img
              src="<?=WEBROOT?>version2/assets/images/grid-img2.png"
              class="img-fluid w-100"
              alt="Small Image 1"
            />
            <img
              src="<?=WEBROOT?>version2/assets/images/grid-img3.png"
              class="img-fluid w-100"
              alt="Small Image 2"
            />
            <img
              src="<?=WEBROOT?>version2/assets/images/grid-img5.png"
              class="img-fluid w-100 d-block d-md-none"
              alt="Small Image 2"
            />
          </div>

          <div class="col-3 d-none d-md-flex flex-column gap-2">
            <img
              src="<?=WEBROOT?>version2/assets/images/grid-img4.png"
              class="img-fluid w-100"
              alt="Small Image 3"
            />
            <div class="position-relative">
              <div
                class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"
              ></div>
              <img
                src="<?=WEBROOT?>version2/assets/images/grid-img5.png"
                class="img-fluid w-100"
                alt="Small Image 4"
              />
              <div
                class="position-absolute top-50 start-50 translate-middle text-white text-center"
              >
                <?php /*<h5 class="fw-bold">+120 More</h5>
                <p
                  class="mb-0 cursor-[pointer]"
                  data-bs-toggle="modal"
                  data-bs-target="#moreImagesModal"
                >
                  View all
                </p> */ ?>
              </div>
            </div>
          </div>
        </div>
        <div
          class="affiliationImgContainer w-100 d-flex align-items-center justify-content-around mt-4 overflow-x-auto"
        >
          
          <img
            class="img-fluid"
            src="<?=WEBROOT?>version2/assets/images/affiliation (2).png"
            alt="affiliation-img"
            style="width: 15%"
          />
          <img
            class="img-fluid"
            src="<?=WEBROOT?>version2/assets/images/affiliation (3).png"
            alt="affiliation-img"
            style="width: 15%"
          />
          <img
            class="img-fluid"
            src="<?=WEBROOT?>version2/assets/images/affiliation (4).png"
            alt="affiliation-img"
            style="width: 15%"
          />
          <img
            class="img-fluid"
            src="<?=WEBROOT?>version2/assets/images/affiliation (5).png"
            alt="affiliation-img"
            style="width: 15%"
          />
          <img
            class="img-fluid"
            src="<?=WEBROOT?>version2/assets/images/affiliation (6).png"
            alt="affiliation-img"
            style="width: 15%"
          />
        </div>
      </section>
      <section class="w-100 py-4">
        <div class="row">
          <div class="col-md-8">
            <!-- Navigation -->
            <ul
              id="accordionScrollSpy"
              class="nav nav-pills w-100 d-flex align-items-center justify-content-between gap-1 gap-sm-3 list-unstyled border-bottom px-0 px-md-4 position-sticky bg-white py-2"
              style="top: 90px"
            >
              <li class="nav-item">
                <a
                  href="#spyScroll1"
                  class="text-black text-decoration-none fs-18 nav-link px-1 py-2 px-sm-3"
                  data-bs-target="#collapseOne"
                  >Itinerary</a
                >
              </li>
              <li class="nav-item">
                <a
                  href="#spyScroll2"
                  class="text-black text-decoration-none fs-18 nav-link px-1 px-sm-3"
                  data-bs-target="#collapseTwo"
                  >Inclusions</a
                >
              </li>
              <li class="nav-item">
                <a
                  href="#spyScroll3"
                  class="text-black text-decoration-none fs-18 nav-link px-1 px-sm-3"
                  data-bs-target="#collapseThree"
                  >Hotels</a
                >
              </li>
              <li class="nav-item">
                <a
                  href="#spyScroll4"
                  class="text-black text-decoration-none fs-18 nav-link px-1 px-sm-3"
                  data-bs-target="#collapseFour"
                  >Prices</a
                >
              </li>
              <li
                class="btn bg-blue rounded-1 text-white d-none d-md-block fw-semibold"
                data-bs-toggle="modal"
                data-bs-target="#enquireModal"
              >
                Request a Callback
              </li>
            </ul>
			
			<?php
				if($data['content']['tour_overview']!="")
				{
					echo $this->element('version2/tour/section-tour-overviw'); 
				}
			?>
           
            <div
              class="accordion accordion-flush scrollspy-example position-relative"
              id="accordionExample"
              data-bs-spy="scroll"
              data-bs-target="#accordionScrollSpy"
              data-bs-root-margin="0px 0px -40%"
              data-bs-smooth-scroll="true"
              tabindex="0"
            >
              <div class="accordion-item mt-3 border border-1" id="spyScroll1">
                <h2 class="accordion-header bg-light-subtle">
                  <button
                    class="accordion-button bg-transparent shadow-none fw-semibold"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                  >
                    Itinerary
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <!-- Content -->
                    <div class="row">
                      <!-- Table Column -->
                      <div class="col-md-12">
						<?php 
							
							if($generalData['view_type']=='city_view')
							{
								echo $this->element('version2/tour/section-tour-summary-city-view'); 
							}
							else
							{
								echo $this->element('version2/tour/section-tour-summary-day-view');
							}
							
						?>
                     
                        <div>
                          <span
                            class="fs-12 text-teal cursor-[pointer]"
                            data-bs-toggle="modal"
                            data-bs-target="#itineraryPopup"
                          >
                            See Detailed Itinerary
                          </span>
                          <div
                            class="modal fade"
                            id="itineraryPopup"
                            tabindex="-1"
                            aria-labelledby="itineraryPopupLabel"
                            aria-hidden="true"
                          >
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5
                                    class="modal-title fw-semibold"
                                    id="itineraryPopupLabel"
                                  >
                                    <?=$generalData['name']?>
                                  </h5>
                                 
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                  <!-- Detailed itinerary content goes here -->
                                 
								  <?php 
									if($generalData['view_type']=='city_view')
									{
										echo $this->element('tours/city-view-itineraray-ver2');
									}
									else
									{
										echo $this->element('tours/day-view-itineraray-ver2');
									}
									
								?>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!--<span class="fs-12 text-teal ms-4 cursor-[pointer]"
                            >Download</span
                          >-->
                        </div>
                      </div>
                      <!-- Map Column -->
                      <?php //echo $this->element('version2/tour/section-tour-detail-map'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item mt-3 border border-1" id="spyScroll2">
                <h2 class="accordion-header bg-light-subtle">
                  <button
                    class="accordion-button bg-transparent shadow-none fw-semibold"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    Inclusions
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <!-- Content -->
                    <div>
                      <h4 class="fw-semibold">Tour Inclusions</h4>
                      <ul class="fs-14 list-unstyled">
						<?php
							foreach($data['inclusion_exclusion']['inclusion'] as $inclusion)
							{
						?>
							<li class="d-flex align-items-center gap-2">
							  <i class="ri-check-double-line"></i>
							  <?=$inclusion?>
							</li>
						<?php
							}
						?>
                        
                      </ul>
                    </div>
                    <div>
                      <h4 class="fw-semibold">Tour Exclusions</h4>
                      <ul class="fs-14 list-unstyled">
						<?php
							foreach($data['inclusion_exclusion']['exclusion'] as $exclusion)
							{
						?>
                        <li class="d-flex align-items-center gap-2">
                          <i class="ri-close-line"></i>
						  <?=$exclusion?>
                        </li>
                        <?php
							}
						?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item mt-3 border border-1" id="spyScroll3">
                <h2 class="accordion-header bg-light-subtle">
                  <button
                    class="accordion-button bg-transparent shadow-none fw-semibold"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    Hotels
                  </button>
                </h2>
                <div
                  id="collapseThree"
                  class="accordion-collapse collapse show"
                >
                  <div class="accordion-body p-0">
                    <!-- Nested Accordion -->
                    <div class="accordion" id="nestedAccordion">
					
					
					<?php
						
						foreach($data['tour_hotels'] as $tourHotels)
						{
						
					?>
                      <!--  Nested Item 1 -->
                      <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                          <button
                            class="accordion-button collapsed fw-semibold shadow-none"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#nestedCollapse<?=$tourHotels['group_id']?>">
                            <?=$tourHotels['hotel_alias_name']?>
                          </button>
                        </h2>
                        <div id="nestedCollapse<?=$tourHotels['group_id']?>" class="accordion-collapse collapse">
                          <div class="accordion-body">
						  <?php
								$lastDayCityHotel = '';
								foreach($tourHotels['hotels'] as $hotels)
								{
									if($lastDayCityHotel==$hotels['city_name'])
									{
										continue;
									}
								
						  ?>
	                        <div class="w-100 border border-1 border-secondary-subtle mb-3 rounded-2 overflow-hidden">
                              <p class="fw-semibold bg-gradient1 border-bottom p-2 px-3">
                                Hotels in <?=$hotels['city_name']?>
                              </p>
                              <div class="w-100 d-flex gap-2 overflow-x-auto p-2 px-3">
							  <?php
								foreach($hotels['hotel_list'] as $hotelList)
								{
									
							  ?>
                                <div class="card clickable-card position-relative flex-shrink-0 p-0 border-0" data-title="Howard Plaza - The Fern">
                                  <!--<span class="badge text-bg-light position-absolute fw-medium right-[5px]">
								  Heritage Luxury</span>
                                  <img src="<?=WEBROOT?>version2/assets/images/hotel-img1.png" class="card-img-top" alt="..." />-->
                                  <div class="card-body p-0 pt-2">
                                    <p class="m-0 fw-semibold fs-14">
                                      <?=$hotelList['hotel_name']?>
                                    </p>
                                    <p class="m-0 text-secondary fs-12">
                                      <?=$hotelList['room_name']?>
                                    </p>
                                  </div>
                                </div>
							<?php
								}
							?>
								
                              </div>
							  
                            </div>
						<?php
									$lastDayCityHotel = $hotels['city_name'];
								}
						?>
						
							
                            
                          </div>
                        </div>
                      </div>
					<?php
						}
					?>

                   

                      

                    
                    </div>
                    <!-- End Nested Accordion -->
                  </div>
                </div>
              </div>
              <div class="accordion-item mt-3 border border-1" id="spyScroll4">
                <h2 class="accordion-header bg-light-subtle">
                  <button
                    class="accordion-button bg-transparent shadow-none fw-semibold"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseFour"
                    aria-expanded="false"
                    aria-controls="collapseFour"
                  >
                    Tour Prices 2025
                    <div id="priceDropdown" class="btn btn-sm dropdown-toggle border border-1 ms-3 z-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="fi fi-in"></span> INR
                      <ul class="dropdown-menu">
						<li>
                          <a class="dropdown-item" href="#"
                            onclick="changeTourCurrencyPrice('AED'); return false;"><span class="fi fi-ae me-1"></span>AED</a
                          >
                        </li>
						<li>
                          <a class="dropdown-item" href="#"
                            onclick="changeTourCurrencyPrice('AUD'); return false;"><span class="fi fi-au me-1"></span>AUD</a
                          >
                        </li>
						<li>
                          <a class="dropdown-item" href="#"
                            onclick="changeTourCurrencyPrice('CAD'); return false;"><span class="fi fi-ca me-1"></span>CAD</a
                          >
                        </li>
						 <li>
                          <a class="dropdown-item" href="#"
                            onclick="changeTourCurrencyPrice('EUR'); return false;"><span class="fi fi-eu me-1"></span>EURO</a
                          >
                        </li>
						<li>
                          <a class="dropdown-item" href="#"
                            onclick="changeTourCurrencyPrice('GBP'); return false;"><span class="fi fi-gb me-1"></span>GBP</a
                          >
                        </li>
						 <li>
                          <a class="dropdown-item" href="#"
                            onclick="changeTourCurrencyPrice('INR'); return false;"><span class="fi fi-in me-1"></span>INR</a
                          >
                        </li>
                        <li>
                          <a class="dropdown-item" href="#"
                            onclick="changeTourCurrencyPrice('USD'); return false;"><span class="fi fi-us me-1"></span>USD</a
                          >
                        </li>
                      </ul>
                    </div>
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse show">
                  <div class="accordion-body p-2">
                    <!-- Content -->
                    <table class="table border-bottom">
                      <thead>
                        <tr>
                          <th class="fw-semibold">Tour Category</th>
                          <th class="fw-semibold">Lean Season</th>
                          <th class="fw-semibold">High Season</th>
                        </tr>
                      </thead>
                      <tbody id="areaHotelPrice">
					  <?php
							
							for($i=0;$i<=count($data['tour_prices']['hotel_price']['best_price']);$i++)
							{
					 ?>
                        <tr>
                          <td class="fs-14"><?=$data['tour_prices']['hotel_price']['best_price'][$i]['hotel_type_alias']?></td>
						   <td class="fs-14">
                            <p class="m-0 text-success fw-semibold">
                              <?=$data['tour_prices']['hotel_price']['minimum_price'][$i]['currency_code']?> <?=$data['tour_prices']['hotel_price']['minimum_price'][$i]['profit_price']?>
                            </p>
                            <p
                              class="m-0 text-decoration-line-through text-danger"
                            >
                             <?=$data['tour_prices']['hotel_price']['minimum_price'][$i]['currency_code']?> <?=$data['tour_prices']['hotel_price']['minimum_price'][$i]['discount_price']?>
                            </p>
                          </td>
                          <td class="fs-14">
                            <p class="m-0 text-success fw-semibold">
                              <?=$data['tour_prices']['hotel_price']['best_price'][$i]['currency_code']?> <?=$data['tour_prices']['hotel_price']['best_price'][$i]['profit_price']?>
                            </p>
                            <p
                              class="m-0 text-decoration-line-through text-danger"
                            >
                              <?=$data['tour_prices']['hotel_price']['minimum_price'][$i]['currency_code']?> <?=$data['tour_prices']['hotel_price']['best_price'][$i]['discount_price']?>
                            </p>
                          </td>
                         
                        </tr>
						<?php
							}
						?>
                       
                      </tbody>
                    </table>
                    <p class="mt-2 text-muted fs-12 lh-base">
                      <strong class="text-black">Note:</strong> The cost of this
                      trip is calculated based on double or twin shared
                      accommodation and for the mentioned services on a per
                      person basis. However, the price may change depending on
                      availability, currency fluctuations, and the number of
                      travelers. For festive periods, holiday weekends, or peak
                      seasons, please contact us with your specific travel
                      dates.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php echo $this->element('tours/tour-right-section'); ?>
        </div>
      </section>
       <?php //echo $this->element('tours/customer-review-parallel-scroll'); ?>
       <?php //echo $this->element('tours/related-tour-parallel-scroll'); ?>
      <section class="w-100 py-4">
        <h2 class="fw-semibold mb-3">Let us help you</h2>
         <?= $this->Form->create(null, [
    'url' => ['controller' => 'Tours', 'action' => 'tourEnquiry'],
    'id' => 'tourEnquiryForm',
    'class' => 'row p-2 py-4 p-md-5 rounded-2 shadow-sm needs-validation',
    'novalidate',
  ]) ?>
  <input type="hidden" value="<?=$generalData['encrypted_tour_token']?>" name="enquiry_token">
  <input type="hidden" value="<?=$generalData['page_url']?>" name="page_url">
  <input type="hidden" value="<?=$generalData['name']?>" name="tour_title">
  <input type="hidden" value="<?=$generalData['tour_code']?>" name="tour_code">
  <div class="col-md-6">
    <h5 class="border-bottom pb-2">Your Details</h5>
    <!-- Full Name -->
    <div class="col-md-12">
      <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
      <input
        type="text"
        class="form-control"
        name="fullName"
        placeholder="Full Name"
        required />

    </div>

    <!-- Email -->
    <div class="col-md-12 mt-3">
      <label for="email" class="form-label">Email ID <span class="text-danger">*</span></label>
      <input
        type="email"
        class="form-control"
        name="email"
        placeholder="Email Id"
        required />

    </div>

    <!-- Phone -->
    <div class="col-md-12 mt-3">
      <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
      <input
        type="tel"
        class="form-control"
        name="phone"
        placeholder="Phone"
        maxlength="13"
        pattern="\d{10,13}"
        required
        oninput="this.value = this.value.replace(/[^0-9]/g, '')" />

    </div>

    <!-- Country -->
    <div class="col-md-12 mt-3">
      <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
      <select class="form-select" name="country" id="country" required autocomplete="off">
        <option value="">Select Country</option>
        <?php
        foreach ($countryList as $key => $val) {
        ?>
          <option value="<?= $val ?>"><?= $val ?></option>
        <?php
        }
        ?>
      </select>

    </div>
    <!-- Tour Start Date -->
    <div class="col-md-12 mt-2">
      <label for="tourStartDate" class="form-label">Tour Start Date <span class="text-danger">*</span></label>
      <input
        type="date"
        class="form-control"
        name="tourStartDate"
        required />

    </div>
  </div>
  <div class="col-md-6">
    <!-- Hotel Category -->
    <div class="col-md-12 mb-3 mt-3 mt-md-0">
      <label class="form-label">Hotel Category <span class="text-danger">*</span></label>
      <div class="hotel-cat">
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            name="hotel_preferences[]"
            value="3-star"
            required />
          <label class="form-check-label" for="3-star">3 Star</label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            name="hotel_preferences[]"
            value="4-star"
            required />
          <label class="form-check-label" for="4-star">4 Star</label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            name="hotel_preferences[]"
            value="5-star"
            required />
          <label class="form-check-label" for="5-star">5-star</label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            name="hotel_preferences[]"
            value="luxury"
            required />
          <label class="form-check-label" for="luxury">Luxury</label>
        </div>
      </div>

    </div>
    <h5 class="border-bottom pb-2 mt-3 mt-md-0 fs-14">
      Number of Travelers
    </h5>
    
    <!-- Hidden Room Template -->
<div id="roomTemplate" class="d-none">
  <div class="room-block mt-2">
    <span class="d-flex align-items-center gap-1 fs-12 text-secondary">Room __NUMBER__</span>
    <div class="d-flex gap-2">
      <div class="col-6">
        <label class="form-label">Adults <span class="text-danger">*</span></label>
        <select class="form-select" name="rooms[__KEY__][adults]"  required>
          <option disabled selected value="">--Select--</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
      </div>
      <div class="col-6">
        <label class="form-label">Child</label>
        <select class="form-select" name="rooms[__KEY__][childs]" onchange="showChildCount(this, '__KEY__')" required>
          <option value="0" selected>--Select--</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
        </select>
      </div>
    </div>
    <div class="d-flex gap-2 mt-1" id="childContainer___KEY__"></div>
  </div>
</div>
<div id="roomContainer"></div>

    <button
      type="button"
      class="d-inline-flex align-items-center gap-1 fs-12 text-secondary border-0 bg-transparent mt-2"
      onclick="addRooms(event)">
      <i class="ri-add-box-line"></i> Add Room
    </button>

    <!-- Special Requirements -->
    <div class="col-md-12 mt-3">
      <label for="specialRequests" class="form-label">Your Special Requirements</label>
      <textarea
        class="form-control"
        name="specialRequests"
        rows="3"
        placeholder="Please specify here, if any customization required"></textarea>
    </div>
    <!-- Security Text -->
    <div class="col-md-12 mt-3">
      <label for="securityText" class="form-label">Security Text</label>
      <div class="d-md-flex">
        <input
          type="text"
          class="form-control text-uppercase w-50"
          name="tcaptcha"
          maxlength="6"
          id="captchaInput"
          placeholder="Enter security text"
          required />
        <span>
          <img src="<?= WEBROOT ?>/tcaptcha" alt="CAPTCHA Image" class="captcha-img" id="tcaptchaImage" style="height: 40px;">
          <a href="javascript:void(0);" onclick="document.getElementById('tcaptchaImage').src = '<?= WEBROOT ?>tcaptcha?' + Date.now();"><i class="fa fa-refresh" aria-hidden="true"></i></a>

        </span>

      </div>
    </div>
  </div>
  <hr class="my-4" />
  <div class="col-12 d-flex gap-2 justify-content-start mb-3">
    <button
      type="submit"
      class="btn bg-teal text-white fw-semibold"
      onclick="submitForm(this)">
      Enquire Now
    </button>

  </div>

  <div class="col-md-12">
    <ul class="fs-14 m-0 p-md-0">
      <li>
        Book Now by paying only INR 1000 or equivalent initial deposit.
      </li>
      <li>Pay 25% deposit after receiving booking confirmation.</li>
      <li>Balance payment 60 days before arrival.</li>
      <li>
        For Festival period travel (like Pushkar Fair, Christmas/New
        Year, etc.) - balance payment 90 days before arrival.
      </li>
    </ul>
  </div>
  <?php echo $this->Form->end(); ?>
  </section>
  
 
	<?php 
		if($data['faq']['faq_list'][0]['question']!="")
		{
			echo $this->element('version2/category/faq'); 
			
		}
	?>
	  
	  
<script>
		function assigneSelectedCurrencyFlag(currencyCode='INR')
		{
			 var htmlString = '';
			 var flagCss = 'fi-in';
			 
			 switch(currencyCode)
			 {
				 case 'AED':
						flagCss = 'fi-ae';
					break;
				case 'AUD':
						flagCss = 'fi-au';
					break;
				case 'CAD':
						flagCss = 'fi-ca';
					break;
				case 'EUR':
						flagCss = 'fi-eu';
					break;
				case 'GBP':
						flagCss = 'fi-gb';
					break;
				case 'INR':
						flagCss = 'fi-in';
					break;
				case 'USD':
						flagCss = 'fi-us';
					break;
				default:
						flagCss = 'fi-en';
					break;
			 }
			
			 htmlString = htmlString + '<span class="fi '+flagCss+'"></span> '+currencyCode;
             htmlString = htmlString + '<ul class="dropdown-menu">';
			 
			 
						
			 htmlString = htmlString + '<li>';
             htmlString = htmlString + '<a class="dropdown-item" href="#" onclick="changeTourCurrencyPrice(\'AED\'); return false;">';
			 htmlString = htmlString + '<span class="fi fi-ae me-1"></span>AED</a>';
             htmlString = htmlString + '</li>';
			 
			 htmlString = htmlString + '<li>';
             htmlString = htmlString + '<a class="dropdown-item" href="#" onclick="changeTourCurrencyPrice(\'AUD\'); return false;">';
			 htmlString = htmlString + '<span class="fi fi-au me-1"></span>AUD</a>';
             htmlString = htmlString + '</li>';
			 
			 htmlString = htmlString + '<li>';
             htmlString = htmlString + '<a class="dropdown-item" href="#" onclick="changeTourCurrencyPrice(\'CAD\'); return false;">';
			 htmlString = htmlString + '<span class="fi fi-ca me-1"></span>CAD</a>';
             htmlString = htmlString + '</li>';
			 
			 htmlString = htmlString + '<li>';
             htmlString = htmlString + '<a class="dropdown-item" href="#" onclick="changeTourCurrencyPrice(\'EUR\'); return false;">';
			 htmlString = htmlString + '<span class="fi fi-eu me-1"></span>EURO'
			 htmlString = htmlString + '</a>';
             htmlString = htmlString + '</li>';
			 
			 htmlString = htmlString + '<li>';
             htmlString = htmlString + '<a class="dropdown-item" href="#" onclick="changeTourCurrencyPrice(\'GBP\'); return false;">';
			 htmlString = htmlString + '<span class="fi fi-gb me-1"></span>GBP</a>';
              htmlString = htmlString + '</li>';
			 
             htmlString = htmlString + '<li>';
             htmlString = htmlString + '<a class="dropdown-item" href="#" onclick="changeTourCurrencyPrice(\'INR\'); return false;">';
			 htmlString = htmlString + '<span class="fi fi-in me-1"></span>INR';
			 htmlString = htmlString + '</a>';
             htmlString = htmlString + '</li>';
			 			 			 
             htmlString = htmlString + '<li>';
             htmlString = htmlString + '<a class="dropdown-item" href="#" onclick="changeTourCurrencyPrice(\'USD\'); return false;">';
			 htmlString = htmlString + '<span class="fi fi-us me-1"></span>USD';
			 htmlString = htmlString + '</a>';
             htmlString = htmlString + '</li>';
			
             htmlString = htmlString + '</ul>';
			 
			 $('#priceDropdown').html(htmlString);
			 
			
		}
		function changeTourCurrencyPrice(currencyCode='INR')
		{

			//var currencyCode= $('#selectHotelPriceCurrency').val();
			var tourPageId = '<?=$data['general']['tour_page_id']?>';
			var tourId = '<?=$data['general']['tour_id']?>';



			$.ajax({
						url: '<?=WEBROOT?>get-tour-price-by-currency',
						type: 'post',
						data: {_csrfToken:_csrfToken,currency_code:currencyCode,tour_id:tourId,tour_page_id:tourPageId},
						dataType: 'json',
						success: function(json)
						{
							if(json.result=='success')
							{
								var data = json.data;
								var hotelPrices = data.hotel_price;
								var bestPrice = hotelPrices.best_price;	
								var minimumPrice = hotelPrices.minimum_price

								var basePrice = data.base_price['price'];
								var baseCurrencyCode = data.base_price['currency_code'];
							
								var htmlString = '';
								for(var i=0;i<minimumPrice.length; i++)
								{
									if(minimumPrice[i].hotel_type_id=='land_price')
									{
										continue;
									}
									
									htmlString = htmlString+'<tr>';
									htmlString = htmlString+'<td class="fs-14">'+bestPrice[i].hotel_type_alias+'</td>';
									htmlString = htmlString+'<td class="fs-14">';
									htmlString = htmlString+'<p class="m-0 text-success fw-semibold">';
									htmlString = htmlString+ minimumPrice[i].currency_code+'&nbsp;'+minimumPrice[i].profit_price;
                                    htmlString = htmlString+'</p>';
									htmlString = htmlString+'<p class="m-0 text-decoration-line-through text-danger">';
									htmlString = htmlString+ minimumPrice[i].currency_code+'&nbsp;'+minimumPrice[i].discount_price;
									htmlString = htmlString+'</p>';
									htmlString = htmlString+'</td>';
									htmlString = htmlString+'<td class="fs-14">';
									htmlString = htmlString+'<p class="m-0 text-success fw-semibold">'
									htmlString = htmlString+ minimumPrice[i].currency_code+'&nbsp;'+bestPrice[i].profit_price;
									htmlString = htmlString+'<p class="m-0 text-decoration-line-through text-danger">';
									htmlString = htmlString+ minimumPrice[i].currency_code+'&nbsp;'+bestPrice[i].discount_price;
								    htmlString = htmlString+'</p>';
									htmlString = htmlString+'</td>';
									htmlString = htmlString+'</tr>';



							}



							$('#areaHotelPrice').html(htmlString);
							$('#tourPriceStartFrom').html(baseCurrencyCode+'&nbsp;'+basePrice);
							assigneSelectedCurrencyFlag(currencyCode);

						}

					}

			});



	}
</script>
<script>
  $(document).ready(function() {
    // Convert captcha to uppercase
    $('#captchaInput').on('input', function() {
      this.value = this.value.toUpperCase();
    });
    $('#tourEnquiryForm').validate({
      errorClass: 'text-danger',
      rules: {
        fullName: 'required',
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          digits: true,
          minlength: 10,
          maxlength: 13
        },
        country: 'required',
        tcaptcha: {
          required: true,
          minlength: 6,
          maxlength: 6,
          remote: {
            url: "<?= $this->Url->build('/tverify-captcha') ?>",
            type: "post",
            data: {
              captcha: function() {
                return $('#captchaInput').val();
              },
              _csrfToken: _csrfToken
            }
          }
        },
        tourStartDate: 'required',
        'hotel_preferences[]': {
          required: true
        },
        adults: 'required'
      },
      messages: {
        fullName: "Please enter your full name",
        email: "Please enter a valid email address",
        phone: "Enter a valid phone number (10-13 digits)",
        country: "Please select a country",
        tourStartDate: "Please select a start date",
        'hotel_preferences[]': "Please select at least one hotel category",
        adults: "Please select number of adults",
        tcaptcha: {
          remote: "Incorrect security text."
        },
      },
      errorPlacement: function(error, element) {
        if (element.attr("name") == "hotel_preferences[]") {
          error.insertAfter(".hotel-cat");
        } else if (element.attr("name") === "tcaptcha") {
          error.insertAfter(element.closest('div'));
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {
        if (!validateRoomOccupancy()) return false;
        form.submit(); // Can be replaced with AJAX submit if needed
      }
    });
  });
</script>

<script>
let roomNumber = 1;

function addRooms(e) {
  e.preventDefault();

  const roomKey = `room_${roomNumber}`;
  const roomTemplate = document.getElementById("roomTemplate").innerHTML;

  // Replace placeholders
  const html = roomTemplate
    .replace(/__KEY__/g, roomKey)
    .replace(/__NUMBER__/g, roomNumber);

  const wrapper = document.createElement("div");
  wrapper.classList.add("room-block-wrapper");
  wrapper.innerHTML = html;

  // Add remove icon
  const span = wrapper.querySelector("span");
  span.innerHTML += ` <i class="ri-delete-bin-line" style=" color: rgb(222, 17, 17); font-size: 15px; cursor: pointer;" onclick="removeRoom(this)"></i>`;

  document.getElementById("roomContainer").appendChild(wrapper);
  roomNumber++;
}

// ✅ Remove room and reindex remaining
function removeRoom(icon) {
  icon.closest(".room-block-wrapper").remove();
  reindexRooms();
}

// ✅ Reindex room blocks after removal
function reindexRooms() {
  const wrappers = document.querySelectorAll("#roomContainer .room-block-wrapper");
  roomNumber = 1; // Reset global count

  wrappers.forEach((wrapper, index) => {
    const key = `room_${index + 1}`;

    // Update room label
    const span = wrapper.querySelector("span");
    span.innerHTML = `Room ${index + 1} <i class="ri-delete-bin-line" style=" color: rgb(222, 17, 17); font-size: 15px; cursor: pointer;" onclick="removeRoom(this)"></i>`;

    // Update all select name attributes (adults, childs)
    wrapper.querySelectorAll("select").forEach(select => {
      let name = select.getAttribute("name");
      if (name) {
        name = name.replace(/rooms\[room_\d+\]/, `rooms[${key}]`);
        select.setAttribute("name", name);
      }
    });

    // Update onchange handler for child count dropdown
    const childSelect = wrapper.querySelector("select[name*='[childs]']");
    if (childSelect) {
      childSelect.setAttribute("onchange", `showChildCount(this, '${key}')`);
    }

    // Update childContainer ID
    const childContainer = wrapper.querySelector("[id^='childContainer_']");
    if (childContainer) {
      childContainer.setAttribute("id", `childContainer_${key}`);
    }
  });

  roomNumber = wrappers.length + 1;
}

// ✅ Show Child Age dropdowns
function showChildCount(select, key) {
  const count = parseInt(select.value || 0);
  const container = document.getElementById(`childContainer_${key}`);
  if (!container) return;

  container.innerHTML = "";

  for (let i = 0; i < count; i++) {
    const ageField = `
      <div class="col-4">
        <label class="form-label">Child ${i + 1} Age</label>
        <select class="form-select" name="rooms[${key}][childAges][]">
          <option selected disabled>--select--</option>
          ${[...Array(13)].map((_, j) => `<option>${j + 1}</option>`).join("")}
        </select>
      </div>
    `;
    container.innerHTML += ageField;
  }
}

// ✅ Validate adult + child <= 3
function validateRoomOccupancy() {
  let isValid = true;
  const rooms = document.querySelectorAll("#roomContainer .room-block-wrapper");

  rooms.forEach(room => {
    const adult = parseInt(room.querySelector("select[name*='[adults]']").value || 0);
    const child = parseInt(room.querySelector("select[name*='[childs]']").value || 0);
    if (adult + child > 3) {
      isValid = false;
      alert("Total people in each room must not exceed 3.");
    }
  });

  return isValid;
}

// ✅ Add first room on page load
document.addEventListener("DOMContentLoaded", function () {
  addRooms(new Event('init'));
});


function bookmarkPage() 
{
  const title = "<?=$metaTags['meta_title']?>";
  const url = "<?=$metaTags['canonical_url']?>";

  // For old Firefox
  if (window.sidebar && window.sidebar.addPanel) 
  {
    window.sidebar.addPanel(title, url, '');
  } 
  // For Internet Explorer
  else if (window.external && ('AddFavorite' in window.external))
  {
    window.external.AddFavorite(url, title);
  } 
  // For all modern browsers
  else 
  {
    alert('Press Ctrl+D (Windows) or Cmd+D (Mac) to bookmark this page manually.');
  }
}


</script>