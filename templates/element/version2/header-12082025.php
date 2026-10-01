 <nav
        class="w-100 navbar navbar-expand-lg bg-white border-bottom navbar-dark position-fixed top-0 z-5"
      >
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="<?=WEBROOT?>version2/assets/images/newLogo.png_small.png" alt="logo" />
          </a>
          <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav gap-xl-2 ms-auto mr-custom">
              <li class="nav-item">
                <a
                  class="nav-link text-black fw-semibold"
                  href="<?=WEBROOT?>tours-popular-golden-triangle"
                  style="font-size: 14px"
                  ;
                  >Destinations</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-black fw-semibold"
                  href="<?=WEBROOT?>tours-luxury-offers"
                  style="font-size: 14px"
                  ;
                >
                  Luxury Offers
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-black fw-semibold"
                  href="<?=WEBROOT?>tailor-make-a-tour"
                  style="font-size: 14px"
                  ;
                  >Plan Your Trip</a
                >
              </li>
              <li class="nav-item">
                <div class="dropdown">
                <a class="nav-link text-black fw-semibold" href="#" data-bs-toggle="dropdown" style="font-size: 14px";>Information</a>
                <ul class="dropdown-menu" style="top: 150% !important;">

                  <li><a class="dropdown-item" href="<?=WEBROOT?>tripadvisor-review">Trip Advisor Review</a></li>

                  <li><a class="dropdown-item" href="<?=WEBROOT?>terms-privacy"> Terms & Privacy</a></li>

                  <li><a class="dropdown-item" href="<?=WEBROOT?>video-testimonial">Video Testimonial</a></li>

                  <li><a class="dropdown-item" href="<?=WEBROOT?>review">Guest Email Testimonial</a></li>

                  <li><a class="dropdown-item" href="<?=WEBROOT?>about-us">About Us</a></li>

                  <li><a class="dropdown-item" href="<?=WEBROOT?>faq">General FAQs</a></li>
				  
				   <li><a class="dropdown-item" href="<?=WEBROOT?>travel-guide">Travel Guide</a></li>

                </ul>
                </div>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link text-black fw-semibold"
                  href="<?=WEBROOT?>contact-us"
                  style="font-size: 14px"
                  ;
                >
                  Contact Us</a
                >
              </li>
            </ul>
            <address
              class="dropdown number-dropdown border border-1 m-0 rounded-2"
              style="height: 36px"
            >
              <!-- Dropdown Toggle -->
              <button
                class="btn dropdown-toggle p-0 px-2 overflow-hidden border-0"
                style="height: 36px"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <div class="number-items">
                                <img
                                    src="<?=WEBROOT?>version2/assets/images/usa.png"
                                    alt="usa-flag"
                                    width="30"
                                    height="30" />
                                (+1) 332-213-8200
                            </div>
                            <div class="number-items">
                                <img
                                    src="<?=WEBROOT?>version2/assets/images/united-kingdom.png"
                                    alt="uk-flag"
                                    width="30"
                                    height="30" />
                                (+44) 20-3769-7001
                            </div>
                            <div class="number-items">
                                <img
                                    src="<?=WEBROOT?>version2/assets/images/australia.png"
                                    alt="australia-flag"
                                    width="30"
                                    height="30" />
                                (+61) 28-488-0900
                            </div>
              </button>

              <!-- Dropdown Menu -->
              <ul class="dropdown-menu number-dropdown-menu">
                <li class="dropdown-item">
                                <img
                                    src="<?=WEBROOT?>version2/assets/images/usa.png"
                                    alt="usa-flag"
                                    width="30"
                                    height="30" />
                                (+1) 332-213-8200
                            </li>
                            <li class="dropdown-item">
                                <img
                                    src="<?=WEBROOT?>version2/assets/images/united-kingdom.png"
                                    alt="uk-flag"
                                    width="30"
                                    height="30" />
                                (+44) 20-3769-7001
                            </li>
                            <li class="dropdown-item">
                                <img
                                    src="<?=WEBROOT?>version2/assets/images/australia.png"
                                    alt="aus-flag"
                                    width="30"
                                    height="30" />
                                (+61) 28-488-0900
                            </li>
              </ul>
            </address>

            <div class="ms-0 ms-lg-3 mt-3 mt-lg-0">
			<?php
				/*
              <div class="dropdown">
                <button
                  class="btn dropdown-toggle border border-1"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  EN
                </button>
                <ul class="dropdown-menu" style="width: 100px; min-width: 0">
                  <li><a class="dropdown-item" href="#">FR</a></li>
                  <li><a class="dropdown-item" href="#">ES</a></li>
                  <li><a class="dropdown-item" href="#">DE</a></li>
                  <li><a class="dropdown-item" href="#">HI</a></li>
                </ul>
              </div>
			  */
			  ?>
            </div>
          </div>
        </div>
      </nav>
