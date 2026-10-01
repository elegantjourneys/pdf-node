<section class="w-100 py-4">
      <div class="w-100 d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
        <div>
          <h5 class="fw-semibold">Reviews</h5>
          <p class="text-secondary">
            Don't take it from us - here's what people have to say about this
            operator
          </p>
        </div>
        <div>
          <i class="remixIcon ri-arrow-left-s-line border border-1 p-1 rounded-1" onclick="moveReviewCards('left')"></i>

          <i class="remixIcon ri-arrow-right-s-line border border-1 p-1 rounded-1 ms-2"
            onclick="moveReviewCards('right')"></i>
        </div>
      </div>
      <div class="row flex-nowrap mt-2 overflow-hidden" id="reviewContainer">
        <div class="col-sm-4 col-md-3" id="reviewCard">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-start gap-3 mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                  class="w-25 rounded-circle shadow-1-strong" />
                <div>
                  <h5 class="fw-normal fs-14 m-0">Elizabeth R</h5>
                  <h5 class="fw-normal fs-14 m-1">Alexandria, VA</h5>
                </div>
              </div>
              <ul class="list-unstyled d-flex justify-content-start m-0">
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star-half-alt fa-sm text-teal"></i>
                </li>
              </ul>
              <p class="m-0 fw-semibold">Perfection -- do not hesitate</p>
              <p class="mt-2 m-0 fw-normal truncate-4 review">
                <i class="fas fa-quote-left pe-2"></i>Visiting India was a
                lifelong dream. A friend recommended Elegant Journeys and our
                high expectations were exceeded. Mr. Vivek Wadhawan is
                extremely responsive to requests and organizes incredible,
                customized trips.
              </p>
              <!-- <a class="text-primary toggle-btn" onclick="toggleTruncate(this)" data-state="collapsed">See More</a> -->
              <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#reviewModal"
                onclick="openReviewModal(this)" data-name="Elizabeth R" data-location="Alexandria, VA"
                data-image="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" data-rating="4.5"
                data-title="Perfection -- do not hesitate"
                data-review="Visiting India was a lifelong dream. A friend recommended Elegant Journeys and our high expectations were exceeded. Mr. Vivek Wadhawan is extremely responsive to requests and organizes incredible, customized trips. The positive difference between a private trip like this (at your own pace, in your own comfortable car) and a big tour cannot be overemphasized. tenetur.">
                See More
              </a>

              <!-- generalized modal -->
              <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="reviewModalLabel">Review</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body max-height">
                      <div class="d-flex align-items-center justify-content-start gap-3 mb-2">
                        <img id="modalImg" class="w-25 rounded-circle shadow-1-strong" />
                        <div>
                          <h5 class="fw-normal fs-14 m-0" id="modalName"></h5>
                          <h5 class="fw-normal fs-14 m-1" id="modalLocation"></h5>
                        </div>
                      </div>
                      <ul id="modalStars" class="list-unstyled d-flex justify-content-start m-0"></ul>
                      <p class="m-0 fw-semibold" id="modalTitle"></p>
                      <p class="mt-2 m-0 fw-normal review" id="modalReview"></p>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-start gap-3 mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                  class="w-25 rounded-circle shadow-1-strong" />
                <div>
                  <h5 class="fw-normal fs-14 m-0">gumchiu</h5>
                  <h5 class="fw-normal fs-14 m-1">Hong Kong</h5>
                </div>
              </div>
              <ul class="list-unstyled d-flex justify-content-start m-0">
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star-half-alt fa-sm text-teal"></i>
                </li>
              </ul>
              <p class="m-0 fw-semibold">Our 2nd incredible India</p>
              <p class="mt-2 m-0 fw-normal truncate-4 review">
                <i class="fas fa-quote-left pe-2"></i>We had an incredible
                holiday in India organised by Elegant Journey Mr Vivek 11th
                years ago, I’m so glad we ask Mr Vivek to helped us again this
                time. And without fail this was another incredible holiday,
              </p>
              <!-- <a class="text-primary toggle-btn" onclick="toggleTruncate(this)" data-state="collapsed">See More</a> -->
              <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#reviewModal"
                onclick="openReviewModal(this)" data-name="gumchiu" data-location="Hong Kong"
                data-image="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" data-rating="4.5"
                data-title="Our 2nd incredible India"
                data-review="We had an incredible holiday in India organised by Elegant Journey Mr Vivek 11th years ago, I’m so glad we ask Mr Vivek to helped us again this time. And without fail this was another incredible holiday.">
                See More
              </a>
              <span class="fs-12 fw-light">Written Oct 2023</span>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-start gap-3 mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                  class="w-25 rounded-circle shadow-1-strong" />
                <div>
                  <h5 class="fw-normal fs-14 m-0">Jenny T</h5>
                  <h5 class="fw-normal fs-14 m-1">St Leonards, Australia</h5>
                </div>
              </div>
              <ul class="list-unstyled d-flex justify-content-start m-0">
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star-half-alt fa-sm text-teal"></i>
                </li>
              </ul>
              <p class="m-0 fw-semibold">BEYOND MY EXPECTATIONS</p>
              <p class="mt-2 m-0 fw-normal truncate-4 review">
                <i class="fas fa-quote-left pe-2"></i>Absolutely everything.
                My expectations were exceeded far & away more than I thought.
                Perfection from day 1 to day 14. Amazing itinerary, the best
                driver, wonderful guides, sublime accommodation. If you plan
                to visit India
              </p>
              <!-- <a class="text-primary toggle-btn" onclick="toggleTruncate(this)" data-state="collapsed">See More</a> -->.
              <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#reviewModal"
                onclick="openReviewModal(this)" data-name="Jenny T" data-location="St Leonards, Australia"
                data-image="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" data-rating="4.5"
                data-title="BEYOND MY EXPECTATIONS"
                data-review="Absolutely everything. My expectations were exceeded far & away more than I thought. Perfection from day 1 to day 14. Amazing itinerary, the best driver, wonderful guides, sublime accommodation. If you plan to visit India.">
                See More
              </a>
              <span class="fs-12 fw-light">Written Apr 2023</span>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-start gap-3 mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                  class="w-25 rounded-circle shadow-1-strong" />
                <div>
                  <h5 class="fw-normal fs-14 m-0">Nir E</h5>
                  <h5 class="fw-normal fs-14 m-1">Austin, TX</h5>
                </div>
              </div>
              <ul class="list-unstyled d-flex justify-content-start m-0">
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star-half-alt fa-sm text-teal"></i>
                </li>
              </ul>
              <p class="m-0 fw-semibold">Highly recommended tour operator</p>
              <p class="mt-2 m-0 fw-normal truncate-4 review">
                <i class="fas fa-quote-left pe-2"></i>They arranged one of the
                best tours we ever had. The guides and the driver they
                provided us were extremely knowledgeable, polite, helpful and
                were able to answer all our questions. The service was
                excellent
              </p>
              <!-- <a class="text-primary toggle-btn" onclick="toggleTruncate(this)" data-state="collapsed">See More</a> -->
              <a href="#" class="text-primary see-more-btn" data-bs-toggle="modal" data-bs-target="#reviewModal"
                onclick="openReviewModal(this)" data-name="Nir E" data-location="Austin, TX"
                data-image="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" data-rating="4.5"
                data-title="Highly recommended tour operator"
                data-review="They arranged one of the best tours we ever had. The guides and the driver they provided us were extremely knowledgeable, polite, helpful and were able to answer all our questions. The service was excellent">
                See More
              </a>
              <span class="fs-12 fw-light">Written Jan 2020</span>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-start gap-3 mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                  class="w-25 rounded-circle shadow-1-strong" />
                <div>
                  <h5 class="fw-normal fs-14 m-0">Melissa E</h5>
                  <h5 class="fw-normal fs-14 m-1">Westport, CT</h5>
                </div>
              </div>
              <ul class="list-unstyled d-flex justify-content-start m-0">
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star-half-alt fa-sm text-teal"></i>
                </li>
              </ul>
              <p class="m-0 fw-semibold">Excellent India Tour Operator</p>
              <p class="mt-2 m-0 fw-normal truncate-4 review">
                <i class="fas fa-quote-left pe-2"></i>Elegant Journeys is a
                five-star tour company headed by Vivek Wadhawan. He is on top
                of very single issue. Tours are custom-made, and private.
                Vivek meets you personally at the beginning of the tour and he
                sends a company representative to every city we visited. You
                have your own AC car, driver and guide for every destination.
              </p>
              <!-- <a class="text-primary toggle-btn" onclick="toggleTruncate(this)" data-state="collapsed">See More</a> -->
              <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#reviewModal"
                onclick="openReviewModal(this)" data-name="Melissa E" data-location="Westport, CT"
                data-image="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" data-rating="4.5"
                data-title="Excellent India Tour Operator"
                data-review="Elegant Journeys is a five-star tour company headed by Vivek Wadhawan. He is on top of very single issue. Tours are custom-made, and private. Vivek meets you personally at the beginning of the tour and he sends a company representative to every city we visited.">
                See More
              </a>
              <span class="fs-12 fw-light">Written Jun 2019</span>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-start gap-3 mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                  class="w-25 rounded-circle shadow-1-strong" />
                <div>
                  <h5 class="fw-normal fs-14 m-0">crisismanager6</h5>
                  <h5 class="fw-normal fs-14 m-1">NYG</h5>
                </div>
              </div>
              <ul class="list-unstyled d-flex justify-content-start m-0">
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star fa-sm text-teal"></i>
                </li>
                <li>
                  <i class="fas fa-star-half-alt fa-sm text-teal"></i>
                </li>
              </ul>
              <p class="m-0 fw-semibold">GREAT INDIA TOUR OPERATOR</p>
              <p class="mt-2 m-0 fw-normal truncate-4 review">
                <i class="fas fa-quote-left pe-2"></i>Elegant Journeys is an
                excellent company headed by Vivek Wadhawan who is very hands
                on. All of the tours offered are private and there are both
                predetermined tours and special itineraries if desired.
              </p>
              <!-- <a class="text-primary toggle-btn" onclick="toggleTruncate(this)" data-state="collapsed">See More</a> -->
              <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#reviewModal"
                onclick="openReviewModal(this)" data-name="crisismanager6" data-location="NYG"
                data-image="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" data-rating="4.5"
                data-title="GREAT INDIA TOUR OPERATOR"
                data-review="Elegant Journeys is an excellent company headed by Vivek Wadhawan who is very hands on. All of the tours offered are private and there are both predetermined tours and special itineraries if desired.">
                See More
              </a>
              <span class="fs-12 fw-light">Written Feb 2019</span>
            </div>
          </div>
        </div>
      </div>
    </section>