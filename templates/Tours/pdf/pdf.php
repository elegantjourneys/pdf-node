<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Itinerary Summary</title>

    <style>
		
		@page {
            margin: 50px 30px 30px 30px; /* Top, Right, Bottom, Left margins */
            border: 2px solid #000;
        }

        .header {
            position: fixed;
            top: -50px;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            /* background-color: #f8f9fa; */
            padding: 10px;
			
        }

        .header img {
            height: 30px; /* Adjust the logo size */
        }

        .footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            height: 30px;
            text-align: center;
            font-size: 12px;
            background-color: #f1f1f1;
            padding: 0px;
        }

        .page-number:after {
            content: counter(page);
        }
		@font-face {
  font-family: LexendExa-Regular;
  src: url("../../webroot/version1/TTF/LexendExa/LexendExa-Regular.ttf") format('truetype');
  }
  
  @font-face {
  font-family: LexendExa-Bold;
  src: url("../../webroot/version1/TTF/LexendExa/LexendExa-Bold.ttf") format('truetype');
  }
		
      body {
        font-family: 'LexendExa-Regular' !important;
        font-size: 12px;
        margin: 0;
        padding: 0;

      }
      .container {
        max-width: 950px !important;
        margin: auto;
        padding: 5px;
      }
      .mx-lg-auto {
        margin-right: auto !important;
        margin-left: auto !important;
      }
      .blue {
        color: #000;
      }
      .font-3 {
        font-size: 18px;
      }
      .font-20 {
        font-size: 14px;
      }
      .font-23 {
        font-size: 16px;
      }
      .mb-3 {
        margin-bottom: 1rem !important;
      }
      .m-0 {
        margin: 0 !important;
      }

	  .px-2 {
    padding-right: .5rem !important;
    padding-left: .5rem !important;
}
      
      .grey-box {
        background: #fafafa 0% 0% no-repeat padding-box;
        
      }

      .p-3 {
        padding: 1rem !important;
      }
      .position-relative {
        position: relative !important;
      }
      .left {
        left: calc(-1 * var(--f));
        border-right: var(--r) solid #0000;
        clip-path: polygon(
          100% 0,
          0 0,
          0 calc(100% - var(--f)),
          var(--f) 100%,
          var(--f) calc(100% - var(--f)),
          100% calc(100% - var(--f)),
          calc(100% - var(--r)) calc(50% - var(--f) / 2)
        );
      }

      .ribbon {
        --f: 10px;
        position: absolute;
        top: 10px;
        padding: 7px 14px;
        color: #34549c;
        line-height: 1.3em;
        font-size: 17px;
        background: #ececec;
      }
      .mt-7 {
        margin-top: 3em;
      }

      p {
        margin-top: 0;
        margin-bottom: 1rem;
      }
      .ps-md-3 {
        padding-left: 1rem !important;
      }

      .p-0 {
        padding: 0 !important;
      }
      
      .text-decoration-underline {
        text-decoration: underline !important;
      }
      .rounded-3 {
        border-radius: 0.3rem !important;
      }
      .mb-3 {
        margin-bottom: 1rem !important;
      }
      .shadow {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
      }

      
      .h2,
      h2 {
        font-size: calc(1.325rem + 0.9vw);
      }
      .h1,
      .h2,
      .h3,
      .h4,
      .h5,
      .h6,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
      }
      
      .p-0 {
        padding: 0 !important;
      }
     
      .text-dark {
        color: #212529 !important;
      }

      .h6,
      h6 {
        font-size: 1rem;
      }
      
      .mb-5 {
        margin-bottom: 3rem !important;
      }

      .table {
        --bs-table-bg: transparent;
        --bs-table-accent-bg: transparent;
        --bs-table-striped-color: #212529;
        --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
        --bs-table-active-color: #212529;
        --bs-table-active-bg: rgba(0, 0, 0, 0.1);
        --bs-table-hover-color: #212529;
        --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;
        border-color: #dee2e6;
      }

      table {
        caption-side: bottom;
        border-collapse: collapse;
      }
      
      .table .table-header {
       
        background: #f7f6f6;
        color: #34549c;
        font-size: 16px;
      }

      
      .text-center {
        text-align: center !important;
      }
      .col-2 {
        flex: 0 0 auto;
        width: 16.66666667%;
      }
     

     
      .me-2 {
        margin-right: 0.5rem !important;
      }
      img,
      svg {
        vertical-align: middle;
      }

      .me-lg-3 {
        margin-right: 1rem !important;
      }

      
      .btn-border {
        border: 1px solid #e4e1e1;
        background: #f3f3f3;
        border-radius: 0px;
        width: 100%;
      }
      .py-1 {
        padding-top: 0.25rem !important;
        padding-bottom: 0.25rem !important;
      }
      .px-4 {
        padding-right: 1.5rem !important;
        padding-left: 1.5rem !important;
      }
	  .py-2 {
    	padding-top: .5rem !important;
    	padding-bottom: .5rem !important;
	}
     
      .my-2 {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
      }
      .mx-4 {
        margin-right: 1.5rem !important;
        margin-left: 1.5rem !important;
      }
      .gap-3 {
        gap: 1rem !important;
      }
     
      .text-red {
        color: #ff6e7c;
        font-size: 16px;
      }
      .text-decoration-line-through {
        text-decoration: line-through !important;
      }
      .ps-1 {
        padding-left: 0.25rem !important;
      }
      .mx-lg-4 {
        margin-right: 1.5rem !important;
        margin-left: 1.5rem !important;
      }
      .me-lg-3 {
        margin-right: 1rem !important;
      }
      .text-lg-start {
        text-align: left !important;
      }
      .btn {
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    border-radius: .25rem;
    transition: color .15sease-in-out, background-color .15sease-in-out, border-color .15sease-in-out, box-shadow .15sease-in-out;
}

      .btn-green {
        background: #00c060 0% 0% no-repeat padding-box !important;
        border-radius: 9px !important;
        color: #fff !important;
      }
      .lh-1 {
        line-height: 1 !important;
      }
      
     
      
      .form-bg {
        background: #e0e0e0 0% 0% no-repeat padding-box;
        border: 1px solid #e0e0e0;
        border-radius: 0px;
      }
      .pp {
        padding-left: 4.2rem !important;
      }
      

      .gr img {
        height: 150px !important;
        width: 100% !important;
      }

      .img-fluid {
        max-width: 100%;
        height: auto;
      }
      .table-border {
        border: #dee2e6 solid 1px;
      }
      .vertical-middle {
        vertical-align: middle;
      }
	  .box-bg{
		background: #ececec 0% 0% no-repeat padding-box;
		height: 50px;
		line-height: 38px;
		font-weight: 700;
    	font-style: italic;
	  }
	  .margin-left-2{margin-left: 4px;}
	  .banner {
            
            color: #34549c;
            
        }
        .overlay {
            background: #ececec;
            padding: 20px;
        }
        
        .tour-title {
            font-size: 18px;
            font-weight: bold;
            font-style: italic;
        }
        .route, .nights {
            font-weight: bold;
        }
        .price {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
        .discount {
            text-decoration: line-through;
            color: red;
            padding-left: 10px;
        }
        .per-person {
            font-size: 12px;
            text-align: right;
        }
    </style>
  </head>
  <body>
  
	<div class="header">
        <img src="https://dev.elegantjourneys.com/version1/image/header/logo.png"  width="150" alt="Logo" />
    </div>
    <main class="container">

		<section class="mx-3 mb-3">
			<div class="banner">
				<div class="overlay">
					<table style="width: 100%;">
						<tr>
							<td>
								<div class="tour-title">3 Day Golden Triangle Tour (GT-05)</div>
								<div class="route">Delhi - Agra - Jaipur</div>
								<div class="nights">2 Nights</div>
							</td>
							<td class="price">
								INR 58187 <span class="discount">72734</span>
								<div class="per-person">Per Person</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</section>

      <section class="mx-lg-auto mx-3 mb-3">
        <div id="itinerary" class="wsbold font-3 blue mb-3">
          Itinerary Summary
        </div>
        <table>
          <tbody>
            <tr>
              <td style="width: 50%; padding: 8px; height: 150px">
                <div class="col grey-box p-3 position-relative">
                  <div class="ribbon left wsbolditalic">Day 1 to 1, Delhi</div>
                  <p class="mt-7"></p>
                  <p>
                    Delhi, as the capital of the world's largest democracy, it
                    bridges two contrasting worlds. Old Delhi's mysterious
                    narrow lanes, havelis, and majestic mosques contrast N....
                  </p>
                </div>
              </td>
              <td style="width: 50%; padding: 8px; height: 150px">
                <div class="gr ps-md-3 p-0" style="height: 150px">
                  <img
                    src="https://controll.elegantjourneys.com/repository/city/67a07306bd1e1_delhi02.png"
                    class="img-fluid"
                    alt="Delhi"
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 50%; padding: 8px; height: 150px">
                <div class="col grey-box p-3 position-relative">
                  <div class="ribbon left wsbolditalic">Day 1 to 2, Agra</div>
                  <p class="mt-7"></p>
                  <p>
                    Agra is famous for being the home of the Taj Mahal, one of
                    the world's seven wonders. It is a highly sought-after
                    tourist destination in India, steeped in historical ....
                  </p>
                </div>
              </td>
              <td style="width: 50%; padding: 8px; height: 150px">
                <div class="gr ps-md-3 p-0" style="height: 150px">
                  <img
                    src="https://controll.elegantjourneys.com/repository/city/67a063a820bba_agra01.png"
                    class="img-fluid"
                    alt="Agra"
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 50%; padding: 8px; height: 150px">
                <div class="col grey-box p-3 position-relative">
                  <div class="ribbon left wsbolditalic">Day 2 to 3, Jaipur</div>
                  <p class="mt-7"></p>
                  <p>
                    Jaipur was founded by Maharaja Jai Singh II in 1727 AD, a
                    city known for its rich heritage and legacy bestowed upon by
                    the Rajputs. It includes various heritage sites, ....
                  </p>
                </div>
              </td>
              <td style="width: 50%; padding: 8px">
                <div class="gr ps-md-3 p-0" style="height: 150px">
                  <img
                    src="https://controll.elegantjourneys.com/repository/city/67a073662ae05_jaipur02.png"
                    class="img-fluid"
                    alt="Jaipur"
                  />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </section>

      <section class="mx-lg-auto mx-3 mb-3">
        <div>
          <div class="font-3 blue mb-3">Itinerary Details</div>
        </div>
        
          <div class="mb-3">
            <h3 class="mb-3 box-bg">
              
                <span class="p-3">
                  Day 1<span
                    class="h6 text-dark margin-left-2"
                    >[Delhi-Agra]</span
                  ></span>
              
            </h3>
            <div class="py-1">
              <div>
                
                <p>
                  Your tour starts with your early morning pick-up from your
                  Delhi hotel or airport and drive to the love city of Agra
                  (approx. 4-hour drive).
                </p>
                <p><b>Agra Sightseeing</b></p>
                <p>
                  Drive to the love city of Agra by a
                  private&nbsp;chauffeur-driven vehicle.<br /><br /><em
                    ><strong>Agra</strong>, the capital of the Mughal Empire
                    during the 16th and 17th centuries, boasts three UNESCO
                    world heritage sites that serve as legacies from that
                    period: the Taj Mahal, Agra Fort, and the ancient city of
                    Fatehpur Sikri.</em
                  >
                </p>
                
                <ul>
                  <li>
                    <strong>AFTERNOON: TOUR OF AGRA FORT AND TAJ MAHAL</strong>
                  </li>
                </ul>
                
                <p>
                  Visit the Red Fort, also called as the Lal-Qila, is a red
                  sandstone fort, built by Akbar, is admired for its splendour,
                  architectural beauty and magnificent halls. A UNESCO World
                  Heritage Site, the fort is the emblem of resilience, power and
                  strength. Once the capital of the Mughal Sultanate, the
                  citadel brags about several majestic palaces, masjids and
                  halls; the most prominent amongst them are Macchi Bhawan, Shah
                  Jahani Mahal, Khas Mahal, Mina Masjid, Nagina Masjid and Hall
                  of Public Audience (Diwan-I-Am).
                </p>
                
                <p>
                  Enjoy a horse-drawn carriage ride to the fabled Taj Mahal, the
                  legendary Mughal monument built in the 17th century. The Taj
                  Mahal is one of the Seven Wonders of the World and stands tall
                  as a memorial to the beloved queen of Emperor Shah Jahan. The
                  spectacular white marble mausoleum is well-complimented by the
                  sprawling gardens, royal audience halls and private chambers.
                </p>
                
                <p>
                  <span
                    style="text-decoration: underline"
                    _mce_style="text-decoration: underline;"
                    >INCLUDED</span
                  >: Monument Entrance Fees, Decorated Horse-carriage/Battery
                  Van ride, personal English-speaking guide and private
                  Chauffeur-driven vehicle<span
                    style="text-decoration: line-through"
                    _mce_style="text-decoration: line-through;"
                    ></span>
                </p>
                
              </div>
            </div>
          </div>

          <div class="mb-3">
            <h3 class="mb-3 box-bg">
              
                <span class="p-3">
                  Day 1&nbsp;&nbsp;&nbsp;<span
                    class="h6 text-dark margin-left-2"
                    >[Delhi-Agra]</span
                  ></span>
              
            </h3>
            <div class="py-1">
              <div>
                
                <p>
                  Your tour starts with your early morning pick-up from your
                  Delhi hotel or airport and drive to the love city of Agra
                  (approx. 4-hour drive).
                </p>
                <p><b>Agra Sightseeing</b></p>
                <p>
                  Drive to the love city of Agra by a
                  private&nbsp;chauffeur-driven vehicle.<br /><br /><em
                    ><strong>Agra</strong>, the capital of the Mughal Empire
                    during the 16th and 17th centuries, boasts three UNESCO
                    world heritage sites that serve as legacies from that
                    period: the Taj Mahal, Agra Fort, and the ancient city of
                    Fatehpur Sikri.</em
                  >
                </p>
                
                <ul>
                  <li>
                    <strong>AFTERNOON: TOUR OF AGRA FORT AND TAJ MAHAL</strong>
                  </li>
                </ul>
                
                <p>
                  Visit the Red Fort, also called as the Lal-Qila, is a red
                  sandstone fort, built by Akbar, is admired for its splendour,
                  architectural beauty and magnificent halls. A UNESCO World
                  Heritage Site, the fort is the emblem of resilience, power and
                  strength. Once the capital of the Mughal Sultanate, the
                  citadel brags about several majestic palaces, masjids and
                  halls; the most prominent amongst them are Macchi Bhawan, Shah
                  Jahani Mahal, Khas Mahal, Mina Masjid, Nagina Masjid and Hall
                  of Public Audience (Diwan-I-Am).
                </p>
                
                <p>
                  Enjoy a horse-drawn carriage ride to the fabled Taj Mahal, the
                  legendary Mughal monument built in the 17th century. The Taj
                  Mahal is one of the Seven Wonders of the World and stands tall
                  as a memorial to the beloved queen of Emperor Shah Jahan. The
                  spectacular white marble mausoleum is well-complimented by the
                  sprawling gardens, royal audience halls and private chambers.
                </p>
                
                <p>
                  <span
                    style="text-decoration: underline"
                    _mce_style="text-decoration: underline;"
                    >INCLUDED</span
                  >: Monument Entrance Fees, Decorated Horse-carriage/Battery
                  Van ride, personal English-speaking guide and private
                  Chauffeur-driven vehicle<span
                    style="text-decoration: line-through"
                    _mce_style="text-decoration: line-through;"
                    ></span>
                </p>
                
              </div>
            </div>
          </div>

          <div class="mb-3">
            <h3 class="mb-3 box-bg">
              
                <span class="p-3">
                  Day 1&nbsp;&nbsp;&nbsp;<span
                    class="h6 text-dark margin-left-2"
                    >[Delhi-Agra]</span
                  ></span>
              
            </h3>
            <div class="py-1">
              <div>
                
                <p>
                  Your tour starts with your early morning pick-up from your
                  Delhi hotel or airport and drive to the love city of Agra
                  (approx. 4-hour drive).
                </p>
                <p><b>Agra Sightseeing</b></p>
                <p>
                  Drive to the love city of Agra by a
                  private&nbsp;chauffeur-driven vehicle.<br /><br /><em
                    ><strong>Agra</strong>, the capital of the Mughal Empire
                    during the 16th and 17th centuries, boasts three UNESCO
                    world heritage sites that serve as legacies from that
                    period: the Taj Mahal, Agra Fort, and the ancient city of
                    Fatehpur Sikri.</em
                  >
                </p>
                
                <ul>
                  <li>
                    <strong>AFTERNOON: TOUR OF AGRA FORT AND TAJ MAHAL</strong>
                  </li>
                </ul>
                
                <p>
                  Visit the Red Fort, also called as the Lal-Qila, is a red
                  sandstone fort, built by Akbar, is admired for its splendour,
                  architectural beauty and magnificent halls. A UNESCO World
                  Heritage Site, the fort is the emblem of resilience, power and
                  strength. Once the capital of the Mughal Sultanate, the
                  citadel brags about several majestic palaces, masjids and
                  halls; the most prominent amongst them are Macchi Bhawan, Shah
                  Jahani Mahal, Khas Mahal, Mina Masjid, Nagina Masjid and Hall
                  of Public Audience (Diwan-I-Am).
                </p>
                
                <p>
                  Enjoy a horse-drawn carriage ride to the fabled Taj Mahal, the
                  legendary Mughal monument built in the 17th century. The Taj
                  Mahal is one of the Seven Wonders of the World and stands tall
                  as a memorial to the beloved queen of Emperor Shah Jahan. The
                  spectacular white marble mausoleum is well-complimented by the
                  sprawling gardens, royal audience halls and private chambers.
                </p>
                
                <p>
                  <span
                    style="text-decoration: underline"
                    _mce_style="text-decoration: underline;"
                    >INCLUDED</span
                  >: Monument Entrance Fees, Decorated Horse-carriage/Battery
                  Van ride, personal English-speaking guide and private
                  Chauffeur-driven vehicle<span
                    style="text-decoration: line-through"
                    _mce_style="text-decoration: line-through;"
                    ></span>
                </p>
                
              </div>
            </div>
          </div>
        
      </section>

      <section id="hotels" class="mx-lg-auto mx-3">
        <div class="font-3 blue mb-3">Hotels</div>

        <div class="mb-3">
          <div class="font-20">
            PREMIUM LEVEL
          </div>
		  <div class="mb-3">
			<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				

		  </div>
         
          <table cellpadding="10" class="table" style="width: 100%; border: #dee2e6 solid 1px">
            <thead>
              <tr class="table-header">
                <th class="text-center table-border">Place</th>
                <th class="text-center table-border">Hotel</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center table-border vertical-middle">Agra</td>
                <td class="text-center table-border">
                  <table cellpadding="10">
                    <tr>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
							<div>Trident by Oberoi</div>
							<div class="font-13">
								Deluxe Garden View (CP)
							</div>
                              
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Taj View</div>
                                <div class="font-13">
                                  Deluxe Room Pool View (CP)
                                </div>
                              
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="text-center table-border vertical-middle">Jaipur</td>
                <td class="text-center table-border">
                  <table cellpadding="10">
                    <tr>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Hilton</div>
                                <div class="font-13">
                                  Hilton Guest Room (CP)
                                </div>
                              
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Trident by Oberoi</div>
                                <div class="font-13">
                                  Deluxe Garden View (CP)
                                </div>
                              
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="text-center table-border vertical-middle">Jaipur</td>
                <td class="text-center table-border">
                  <table cellpadding="10">
                    <tr>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Hilton</div>
                                <div class="font-13">
                                  Hilton Guest Room (CP)
                                </div>
                              
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Trident by Oberoi</div>
                                <div class="font-13">
                                  Deluxe Garden View (CP)
                                </div>
                              
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mb-3">
          <div class="font-20">LUXURY LEVEL</div>
          <div class="mb-3">
			<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				<img
                  src="https://dev.elegantjourneys.com/tours/image/star.png"
                  width="16"
                  class="img-fluid"
                />
				

		  </div>
          <table cellpadding="10" class="table" style="width: 100%; border: #dee2e6 solid 1px">
            <thead>
              <tr class="table-header">
                <th class="text-center table-border">Place</th>
                <th class="text-center table-border">Hotel</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center table-border vertical-middle">Agra</td>
                <td class="text-center table-border">
                  <table cellpadding="10">
                    <tr>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
							<div>Trident by Oberoi</div>
							<div class="font-13">
								Deluxe Garden View (CP)
							</div>
                              
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Taj View</div>
                                <div class="font-13">
                                  Deluxe Room Pool View (CP)
                                </div>
                              
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="text-center table-border vertical-middle">Jaipur</td>
                <td class="text-center table-border">
                  <table cellpadding="10">
                    <tr>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Hilton</div>
                                <div class="font-13">
                                  Hilton Guest Room (CP)
                                </div>
                              
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Trident by Oberoi</div>
                                <div class="font-13">
                                  Deluxe Garden View (CP)
                                </div>
                              
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="text-center table-border vertical-middle">Jaipur</td>
                <td class="text-center table-border">
                  <table cellpadding="10">
                    <tr>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Hilton</div>
                                <div class="font-13">
                                  Hilton Guest Room (CP)
                                </div>
                              
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-border px-2 py-2">
                          
                                <div>Trident by Oberoi</div>
                                <div class="font-13">
                                  Deluxe Garden View (CP)
                                </div>
                              
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <section id="inclusions" class="mx-lg-auto mx-3 mb-3">
        <table cellpadding="10" style="width: 100%">
          <tr>
            <td class="font-3 blue mb-3" style="width: 50%">Tour Inclusions</td>
            <td class="font-3 blue mb-3" style="width: 50%">Tour Exclusions</td>
          </tr>
          <tr>
            <td style="width: 50%; padding-right: 10px">
              <table>
                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/include.png"
                      width="15"
                    />
                  </td>
                  <td>
                    Accommodation on Double/Twin share in base category room
                  </td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/include.png"
                      width="15"
                    />
                  </td>
                  <td>Daily breakfast in the hotel restaurant</td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/include.png"
                      width="15"
                    />
                  </td>
                  <td>
                    Private Chauffeur driven Air-conditioned Sedan Car (Dzire or
                    similar)
                  </td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/include.png"
                      width="15"
                    />
                  </td>
                  <td>
                    English-speaking guide services for private sightseeing tour
                    in each city
                  </td>
                </tr>
                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/include.png"
                      width="15"
                    />
                  </td>
                  <td>
                    Monuments admissions (one-time) as listed in the itinerary
                  </td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/include.png"
                      width="15"
                    />
                  </td>
                  <td>
                    Bottled water during sightseeing/tours and inter-city drives
                  </td>
                </tr>
              </table>
            </td>
            <td style="width: 50%">
              <table>
                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/exclude.png"
                      width="15"
                    />
                  </td>
                  <td>Hotel or Sightseeing services in Delhi</td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/exclude.png"
                      width="15"
                    />
                  </td>
                  <td>GST - 5% (or as applicable) payable to Govt. of India</td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/exclude.png"
                      width="15"
                    />
                  </td>
                  <td>International and domestic airfare</td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/exclude.png"
                      width="15"
                    />
                  </td>
                  <td>Travel, health, and cancellation insurance</td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/exclude.png"
                      width="15"
                    />
                  </td>
                  <td>Camera charges (Video and Still camera)</td>
                </tr>

                <tr>
                  <td style="padding-right: 5px">
                    <img
                      src="https://dev.elegantjourneys.com/tours/image/exclude.png"
                      width="15"
                    />
                  </td>
                  <td>
                    Personal Expenses (tips, porterage, phone, internet,
                    beverages)
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </section>
      <section
        id="datesprices"
        class="mx-lg-auto mx-3 mb-3"
        style="margin-top: 30px"
      >
        <table style="width: 60%">
          <tr>
            <td class="font-3 blue me-lg-3">
              Tour Prices (2024-25)
            </td>
            <td class="me-lg-3 text-center text-lg-start mb-lg-0">
              <button
                type="button"
                class="lh-1 btn btn-green font-13"
              >
                Sale Price
              </button>
            </td>
          </tr>
        </table>

        <table
          class="table" cellpadding="10"
          style="
            width: 100%;
            margin-top: 20px;
            border: #dee2e6 solid 1px;
            box-shadow: -3px 5px 21px #00000029;">
          <thead>
            <tr class="table-header" style="border: #dee2e6 solid 1px">
              <th
                style="border: #dee2e6 solid 1px"
                class="text-center"
              >
                Hotel Category
              </th>
              <th
                style="border: #dee2e6 solid 1px"
                class="text-center"
              >
                Low Season Price
              </th>
              <th
                style="border: #dee2e6 solid 1px"
                class="text-center"
              >
                High Season Price
              </th>
            </tr>
          </thead>
          <tbody>
            <tr style="border: #dee2e6 solid 1px">
              <td class="text-center">
                <div>
                  PREMIUM LEVEL
                </div>
				<div>
					<img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					<img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					<img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					<img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					<img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
				</div>
                    
              </td>
              <td style="border: #dee2e6 solid 1px" class="text-center">
                <div class="mx-lg-4">
                  <div class="wsbold font-20">
                    INR&nbsp;55,420
                    <span class="ps-1 text-decoration-line-through text-red"
                      >69,280</span
                    >
                  </div>
                  <div class="font-13">Per Person</div>
                </div>
              </td>
              <td style="border: #dee2e6 solid 1px" class="text-center">
                <div class="mx-lg-4">
                  <div class="wsbold font-20">
                    INR&nbsp;57,270
                    <span class="ps-1 text-decoration-line-through text-red"
                      >71,580</span
                    >
                  </div>
                  <div class="font-13">Per Person</div>
                </div>
              </td>
            </tr>

            <tr style="border: #dee2e6 solid 1px">
              <td class="text-center">
                <div>
					LUXURY LEVEL
				  </div>
				  <div>
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
				  </div>
              </td>
              <td style="border: #dee2e6 solid 1px" class="text-center">
                <div class="mx-lg-4">
                  <div class="wsbold font-20">
                    INR&nbsp;52,510
                    <span class="ps-1 text-decoration-line-through text-red"
                      >65,630</span
                    >
                  </div>
                  <div class="font-13">Per Person</div>
                </div>
              </td>
              <td style="border: #dee2e6 solid 1px" class="text-center">
                <div class="mx-lg-4">
                  <div class="wsbold font-20">
                    INR&nbsp;60,600
                    <span class="ps-1 text-decoration-line-through text-red"
                      >75,750</span
                    >
                  </div>
                  <div class="font-13">Per Person</div>
                </div>
              </td>
            </tr>

            <tr style="border: #dee2e6 solid 1px">
              <td class="text-center">
                

                <div>
					OBEROI LUXURY
				  </div>
				  <div>
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
					  <img src="https://dev.elegantjourneys.com/tours/image/star.png" width="15" class="img-fluid" />
				  </div>
              </td>
              <td style="border: #dee2e6 solid 1px" class="text-center">
                <div class="mx-lg-4">
                  <div class="wsbold font-20">
                    INR&nbsp;92,760
                    <span class="ps-1 text-decoration-line-through text-red"
                      >115,950</span
                    >
                  </div>
                  <div class="font-13">Per Person</div>
                </div>
              </td>
              <td style="border: #dee2e6 solid 1px" class="text-center">
                <div class="mx-lg-4">
                  <div class="wsbold font-20">
                    INR&nbsp;147,380
                    <span class="ps-1 text-decoration-line-through text-red"
                      >184,220</span
                    >
                  </div>
                  <div class="font-13">Per Person</div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div>
          <p class="font-13">
            <span class="wsbold">Note:</span> The cost of this trip is
            calculated based on low season rates for shared twin accommodation
            and the mentioned services. However, the price is subject to change
            based on availability, currency fluctuations, and the number of
            travelers. For high season rates, please get in touch with us and
            provide your specific travel dates and preferences.
          </p>
        </div>
      </section>
    </main>
	<div class="footer">
        <span style="font-size: 10px;" class="page-number"></span>
		<div style="font-size: 10px;"><a href="https://www.elegantjourneys.com/">https://www.elegantjourneys.com/</a></div>
    </div>
	</body>
</html>