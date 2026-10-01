<style>
.nav-tabs .nav-link {
   color: #000;
   white-space: nowrap;
   &:hover {
     text-decoration: none;
   }
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
  border-radius: 0;
  background-color: #e8f4ff;
  border-bottom: 0px !important;
}
</style>
<section class="heroSection heroSection-homePage w-100 p-0">
        <div id="homePageCarousel" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#homePageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button 
              type="button"
              data-bs-target="#homePageCarousel"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#homePageCarousel"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="<?=WEBROOT?>version2/assets/images/home-page-banner.avif"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img
                src="<?=WEBROOT?>version2/assets/images/home-page-banner.avif"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img
                src="<?=WEBROOT?>version2/assets/images/home-page-banner.avif"
                class="d-block w-100"
                alt="..."
              />
            </div>
          </div>
          <div
            class="w-75 h-100 position-absolute top-50 start-50 translate-middle text-center text-white"
            style="place-content: center"
          >
            <h1 class="fw-bold custom-heading">
              Redefining Luxury Travel Worldwide
            </h1>
            <p class="my-4">
              Bespoke Experiences Across India, Nepal, Bhutan, Srilanka &amp; Beyond Embrace the spirit of discovery 
			  with journeys crafted to immerse, inspire, and indulge—wherever your wanderlust leads.

            </p>
            <a href="<?=WEBROOT?>tours-popular-golden-triangle">
				<button class="btn bg-white text-teal py-2 px-3 fw-semibold z-3">
              Explore Tours
				</button>
			</a>
          </div>
        </div>
      </section>
      <?php echo $this->element('version2/home/section-home-most-popular-tour'); ?>
      <section class="w-100 py-4">
        <div class="row rounded-3 px-3" style="background: #f5f5f5">
          <div
            class="col-md-6 py-3 pb-5 d-flex gap-4 justify-content-between flex-column"
          >
            <h1>Mastering the art of luxury travel for 10+ years</h1>
            <div>
              <div class="row">
                <div class="col-4">
                  <h1 class="text-teal fw-bold">10K+</h1>
                  <p class="small fw-semibold text-muted">Travelers Served</p>
                </div>
                <div class="col-4">
                  <h1 class="text-teal fw-bold">4.9/5</h1>
                  <p class="small fw-semibold text-muted">
                    Customer Satisfaction
                  </p>
                </div>
                <div class="col-4">
                  <h1 class="text-teal fw-bold">95%</h1>
                  <p class="small fw-semibold text-muted">
                    Repeat & Referral Rate
                  </p>
                </div>
              </div>
            </div>
            <p class="text-muted">
              Elegant Journeys is a dedicated luxury travel agency in India
              offering an array of high quality services with first-hand
              knowledge on India tours, Bhutan tours and Nepal tours.
            </p>
            <div
              class="carousel-indicator w-75 d-flex gap-2 px-1 align-items-center"
            >
              <span
                class="d-inline-block bg-primary rounded-pill"
                style="height: 2px; width: 40%"
              ></span>
              <span
                class="d-inline-block bg-primary rounded-pill"
                style="height: 2px; width: 20%; opacity: 0.5"
              ></span>
              <span
                class="d-inline-block bg-primary rounded-pill"
                style="height: 2px; width: 20%; opacity: 0.5"
              ></span>
              <span
                class="d-inline-block bg-primary rounded-pill"
                style="height: 2px; width: 20%; opacity: 0.5"
              ></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="slider-container overflow-hidden" style="height: 400px">
              <div id="sliderInner" class="d-flex flex-column gap-4">
                <div
                  class="slider-card bg-white p-4 pb-0 rounded-3 border border-1 border-secondary-subtle"
                >
                  <h5 class="fw-semibold">About Elegant Journeys</h5>
                  <p class="mt-4 text-secondary">
                    Elegant Journeys is a dedicated luxury travel agency in
                    India offering an array of high quality services with
                    first-hand knowledge on India tours, Bhutan tours and Nepal
                    tours. Offering spectacular range of Rajasthan tours, Kerala
                    tours, private north India tours, we not only plan but book
                    trips for families, friends, couples, individuals and group
                    tours, and ensure personalized services with great value for
                    money. Our customized services and tailored luxury tours
                    promise for the best travel experience in the Incredible
                    India.
                  </p>
                  <div>
                    <img
                      class="img-fluid rounded-top-3"
                      src="<?=WEBROOT?>version2/assets/images/test-img.avif"
                      alt=""
                    />
                  </div>
                </div>
                <div
                  class="slider-card bg-white p-4 pb-0 rounded-3 border border-1 border-secondary-subtle"
                >
                  <h5 class="fw-semibold">About Elegant Journeys</h5>
                  <p class="mt-4 text-secondary">
                    Elegant Journeys is a dedicated luxury travel agency in
                    India offering an array of high quality services with
                    first-hand knowledge on India tours, Bhutan tours and Nepal
                    tours. Offering spectacular range of Rajasthan tours, Kerala
                    tours, private north India tours, we not only plan but book
                    trips for families, friends, couples, individuals and group
                    tours, and ensure personalized services with great value for
                    money. Our customized services and tailored luxury tours
                    promise for the best travel experience in the Incredible
                    India.
                  </p>
                  <div>
                    <img
                      class="img-fluid rounded-top-3"
                      src="<?=WEBROOT?>version2/assets/images/test-img.avif"
                      alt=""
                    />
                  </div>
                </div>
                <div
                  class="slider-card bg-white p-4 pb-0 rounded-3 border border-1 border-secondary-subtle"
                >
                  <h5 class="fw-semibold">About Elegant Journeys</h5>
                  <p class="mt-4 text-secondary">
                    Elegant Journeys is a dedicated luxury travel agency in
                    India offering an array of high quality services with
                    first-hand knowledge on India tours, Bhutan tours and Nepal
                    tours. Offering spectacular range of Rajasthan tours, Kerala
                    tours, private north India tours, we not only plan but book
                    trips for families, friends, couples, individuals and group
                    tours, and ensure personalized services with great value for
                    money. Our customized services and tailored luxury tours
                    promise for the best travel experience in the Incredible
                    India.
                  </p>
                  <div>
                    <img
                      class="img-fluid rounded-top-3"
                      src="<?=WEBROOT?>version2/assets/images/test-img.avif"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- new ui start -->
      <section class="w-100 py-4">
        <div class="text-center">
          <h1 class="fw-semibold">Our Signature Services</h1>
          <p class="text-muted maxWidth-[750px] w-100 mx-auto mt-3">
            Every element—curated. Every moment—seamless. Travel redefined through detail and discretion.

          </p>
        </div>
        <div class="mt-5">
          <div class="row">
            <div class="col-md-6 col-lg-4">
			<a href="<?=WEBROOT?>tailor-make-a-tour">
              <img
                class="img-fluid"
                src="<?=WEBROOT?>version2/assets/images/tailor-made-itineraries.avif"
                alt="1"
              />
			  </a>
              <div>
                <h5 class="fw-semibold mt-3">Tailor-Made Itineraries</h5>
                <p class="text-muted">
                  Trips crafted around your interests & preferences
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <a href="<?=WEBROOT?>tailor-make-a-tour"><img
                class="img-fluid"
                src="<?=WEBROOT?>version2/assets/images/luxury-and-boutique-stays.avif"
                alt="1"
              />
			  </a>
              <div>
                <h5 class="fw-semibold mt-3">Luxury & Boutique Stays</h5>
                <p class="text-muted">Handpicked accommodations for comfort</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
			<a href="<?=WEBROOT?>tailor-make-a-tour">
              <img
                class="img-fluid"
                src="<?=WEBROOT?>version2/assets/images/cultural-and-experiential-tour.avif"
                alt="1"
              />
			  </a>
              <div>
                <h5 class="fw-semibold mt-3">Cultural & Experiential Tours</h5>
                <p class="text-muted">
                  Immersive journeys that go beyond the surface
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
			<a href="<?=WEBROOT?>tailor-make-a-tour">
              <img
                class="img-fluid"
                src="<?=WEBROOT?>version2/assets/images/group-and-corporate-travel.avif"
                alt="1"
              />
			  </a>
              <div>
                <h5 class="fw-semibold mt-3">Group & Corporate Travel</h5>
                <p class="text-muted">
                  Incentives, events, and group arrangements
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
			<a href="<?=WEBROOT?>tailor-make-a-tour">
              <img
                class="img-fluid"
                src="<?=WEBROOT?>version2/assets/images/on-trip-assistance.avif"
                alt="1"
              />
			  </a>
              <div>
                <h5 class="fw-semibold mt-3">24x7 On-Trip Assistance</h5>
                <p class="text-muted">Dedicated support while you travel</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
			<a href="<?=WEBROOT?>tailor-make-a-tour">
              <img
                class="img-fluid"
                src="<?=WEBROOT?>version2/assets/images/local-expertise.avif"
                alt="1"
              />
			  </a> 
              <div>
                <h5 class="fw-semibold mt-3">Local Expertise</h5>
                <p class="text-muted">
                  In-depth insights from destination specialists
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
		<?php echo $this->element('version2/home/section-plan-your-tour'); ?>
      <!-- new ui end --> 
	  <?php //echo $this->element('version2/home/section-your-next-favorite-place'); ?>
	  
      <?php echo $this->element('version2/home/section-your-next-favorite-place2'); ?>
     
       <?php //echo $this->element('version2/home/section-home-page-gallery'); ?>
       <?php echo $this->element('version2/home/section-home-luxury-tour'); ?> 
      <?php echo $this->element('version2/home/section-home-faq'); ?> 
<script>
      const sliderInner = document.getElementById("sliderInner");
      const container = document.querySelector(".slider-container");

      const indicators = document.querySelectorAll(".carousel-indicator span");
      let activeIndex = 0;

      const scrollSpeed = 0.8;
      const intervalTime = 20;

      function updateIndicators(index) {
        indicators.forEach((el, i) => {
          if (i === index) {
            el.style.width = "40%";
            el.style.opacity = "1";
          } else {
            el.style.width = "20%";
            el.style.opacity = "0.5";
          }
        });
      }

      let carouselInterval;

      sliderInner.addEventListener("mouseenter", () =>
        clearInterval(carouselInterval)
      );
      sliderInner.addEventListener("mouseleave", startScrolling);

      function startScrolling() {
        carouselInterval = setInterval(() => {
          container.scrollTop += scrollSpeed;

          const firstCard = sliderInner.children[0];
          const cardHeight =
            firstCard.offsetHeight +
            parseInt(getComputedStyle(firstCard).marginBottom);

          if (container.scrollTop >= cardHeight) {
            sliderInner.appendChild(firstCard);
            container.scrollTop -= cardHeight;

            // Move to next indicator
            activeIndex = (activeIndex + 1) % indicators.length;
            updateIndicators(activeIndex);
          }
        }, intervalTime);
      }

      updateIndicators(activeIndex); // initialize
      startScrolling();
    </script>