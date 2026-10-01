<style>

.asd li{

	border-bottom: 1px solid #fff;

    background: #ccc;

}

.dro{padding: 2px 4px;}

.dro:hover {

  background-color: #ddd;

  color: #fff;

  transition: transform .3s ease;

}

.tsd li{

    border-bottom: 1px solid #fff;

    background: #f98764;

}

.dropdown-menu li a{color: #fff;}

.dropdown-menu li:last-child a{border-bottom:0px;}

.dropend .dropdown-toggle {

  color: salmon;

  margin-left: 1em;

}

.dropdown-item:hover {

  background-color: #f98764;

  color: #fff;

  transition: transform .3s ease;

}

.dropdown .dropdown-menu {

  display: none;

}

.dropdown:hover > .dropdown-menu,

.dropend:hover > .dropdown-menu {

  display: block;

  margin-top: 0.125em;

  margin-left: 0.125em;

}

@media screen and (min-width: 769px) {

  .dropend:hover > .dropdown-menu {

    position: absolute;

    top: 0;

    left: 100%;

  }

  .dropend .dropdown-toggle {

    margin-left: 0.5em;

  }

}

.dropdown-toggle::after{display:none;}

#information{color: #5c5e62;}







.currency-switcher {

    position: relative;

    margin: 50px auto;

    width: 268px;

}



div.dropdown {

    position: relative;

    width: 268px;

}



div.dropdown:after {

    content: "";

    position: absolute;

    margin: 0;

    width: 16px;

    height: 17px;

    background-image: url(http://botkits.ru/img/icons/down.svg);

    top: 15px;

    right: 10px;

    -webkit-transition: .3s;

    transition: .3s;

}



div.dropdown.open:after {

    -webkit-transform: rotate(180deg);

    transform: rotate(180deg);

}





div.dropdown>div.caption {

    background: #F8F9FB;

    border-radius: 12px;

    cursor: pointer;

    padding: 12.5px 15px 12.5px 60px;

    font-size: 14px;

    line-height: 150%;

    letter-spacing: 0.3px;

}



div.dropdown>div.list {

    position: absolute;

    background-color: #fff;

    width: 100%;

    border-radius: 12px;

    -webkit-box-shadow: 0px 12px 24px rgba(21, 18, 51, 0.13);

    box-shadow: 0px 12px 24px rgba(21, 18, 51, 0.13);

    opacity: 0;

    overflow: hidden;

    -webkit-transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;

    transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;

    -webkit-transform: scale(0.85);

    transform: scale(0.85);

    -webkit-transform-origin: 50% 0;

    transform-origin: 50% 0;

    top: 52px;

    z-index: -1;

    visibility: hidden;

    padding: 10px 0;

}



div.dropdown.open>div.list {

    -webkit-transform: scale(1);

    transform: scale(1);

    opacity: 1;

    z-index: 1;

    visibility: visible;

}



div.dropdown>div.list>div.item {

    padding: 10.5px 15px 10.5px 62px;

    cursor: pointer;

    -webkit-transition: .3s;

    transition: .3s;

    font-size: 14px;

    line-height: 150%;

    letter-spacing: 0.3px;

}



div.dropdown>div.list>div.item.selected {

    background: rgba(36, 60, 187, 0.2);

    pointer-events: none;

}



div.dropdown>div.list>div.item:hover {

    background: #F8F9FB;

}



div.dropdown>div.caption img,

div.dropdown>div.list>div.item img,

div.dropdown>div.caption svg,

div.dropdown>div.list>div.item svg {

    position: absolute;

    margin-top: 2.5px;

    left: 15px;

}



div.dropdown>div.list>div.item span,

div.dropdown>div.caption span {

    font-weight: 600;

    font-size: 14px;

    letter-spacing: 0.3px;

    color: #243CBB;

    position: absolute;

    right: 36px;

}



div.dropdown>div.list>div.item span {

    right: 20px;

}



</style>

<header class="fixed-top">

		<div class="p-1 d-none d-md-block" style="background: #5a5a5a;">

			<div class="col-md-12 col-lg-12 col-xl-8 col-xxl-8 mx-md-auto d-flex text-white justify-content-around align-items-center font-14">

				<div><img src="<?=WEBROOT?>assets/image/flags/usa.png" width="30" height="30" class="me-2">USA(+1) 813 358 4455</div>

				<div><img src="<?=WEBROOT?>assets/image/flags/uk.png" width="30" height="30" class="me-2">Australia(+61) 02 8011 3300</div>

				<!--div><img src="<?=WEBROOT?>assets/image/flags/canada.png" width="30" height="30" class="me-2">(+1) 718 395 7788</div>

				<div><img src="<?=WEBROOT?>assets/image/flags/australia.png" width="30" height="30" class="me-2">(+1) 718 395 7788</div-->

				<div><i class="fa fa-envelope"></i> Email -sales@elegantjourneys.com</div>

				<div class="dropdown">

					

					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            <img src="<?=WEBROOT?>assets/image/flags/usa.png" width="30" height="30" class="me-2"> Base Currency-INR

          </a>

          <ul class="dropdown-menu p-0 asd" aria-labelledby="navbarDropdown">

            <li><a class="dro" href="#"><img src="<?=WEBROOT?>assets/image/flags/usa.png" width="30" height="30" class="me-2">Base Currency-INR</a></li>

            <li><a class="dro" href="#"><img src="<?=WEBROOT?>assets/image/flags/usa.png" width="30" height="30" class="me-2">Base Currency-EUR</a></li>

          </ul>

					</div>

					<!--<div class="currency-switcher">

  <div class="dropdown">

    <div class="caption">

      <svg width="32" height="17" viewBox="0 0 32 17" fill="none" xmlns="http://www.w3.org/2000/svg">

        <path d="M32 0.5H0V8.5H32V0.5Z" fill="#F2F2F2" />

        <path d="M32 8.5H0V16.5H32V8.5Z" fill="#D52B1E" />

        <path d="M32 5.8335H0V11.1668H32V5.8335Z" fill="#0039A6" />

      </svg>

      

      <span>RUB</span>

    </div>

    <div class="list">

      <div class="item selected" data-item="RUB">

        <svg width="32" height="17" viewBox="0 0 32 17" fill="none" xmlns="http://www.w3.org/2000/svg">

          <path d="M32 0.5H0V8.5H32V0.5Z" fill="#F2F2F2" />

          <path d="M32 8.5H0V16.5H32V8.5Z" fill="#D52B1E" />

          <path d="M32 5.8335H0V11.1668H32V5.8335Z" fill="#0039A6" />

        </svg>

       

        <span>RUB</span>

      </div>

      <div class="item" data-item="UAH">

        <svg width="32" height="17" viewBox="0 0 32 17" fill="none" xmlns="http://www.w3.org/2000/svg">

          <path d="M32 0.5H0V16.5H32V0.5Z" fill="#005BBB" />

          <path d="M32 8.5H0V16.5H32V8.5Z" fill="#FFD500" />

        </svg>

       

        <span>UAH</span>

      </div>

      <div class="item" data-item="USD">

       

		<img src="<?=WEBROOT?>assets/image/flags/usa.png" width="30" height="17">

        

        <span>USD</span>

      </div>

    </div>

  </div>

</div>-->

			</div>

		</div>

		<div class="bg-white p-2" style="box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);">

			<div class="container d-flex py-3 py-md-0 justify-content-between align-items-center">

				<div class="logo-set"><img src="<?=WEBROOT?>assets/image/new-logo.png"></div>

				<div class="ml-auto navbar-menu d-none d-md-block">

					<nav>

						<ul id="main-menu" class="text-uppercase">

							<li>Popular Tours</li>

							<li>luxury-for-less</li>

							<li>customize-a-tour</li>

							<li class="nav-item dropdown">

          <a id="information" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            information

          </a>

          <ul class="dropdown-menu tsd">

            <li><a class="dropdown-item" href="#">Trip Advisor Review</a></li>

            <li><a class="dropdown-item" href="#">Terms &amp; Privacy</a></li>

            <li><a class="dropdown-item" href="#">Guest Email Testimonial</a></li>

			<li><a class="dropdown-item" href="#">About Us</a></li>

			<li><a class="dropdown-item" href="#">General FAQs</a></li>						<li><a class="dropdown-item" href="#">Travel Guide</a></li>

						</ul></li>

						<li>contact us</li>

					</nav>

				</div>

			

			<div class="d-md-none d-block">

					<nav id="navigation1" class="navigation">

                        <div class="nav-header">

                            <div class="nav-toggle"><img src="<?=WEBROOT?>assets/image/menu-open.png" width='40' height="40" class="img-fluid"/></div>

                        </div>

                        <div class="nav-menus-wrapper">

                            <ul id="main-menu" class="nav-menu poition-relative align-to-right font-fam-bold">

								<div class="text-center mb-3"><img src="<?=WEBROOT?>assets/image/new-logo.png" width="120" class="img-fluid" /></div>

								<li class="menu-font"><a href="#">popular tours</a></li>

								<li class="menu-font"><a href="">luxury-for-less</a></li>

								<li class="menu-font"><a href="#">customize-a-tour</a></li>

                                <li class="navss menu-font">

                                    <a href="#">Information</a>

                                    <div class="megamenu-panel">

                                        <div class="megamenu-lists">

                                            <ul class="megamenu-list list-col-6">

                                                <li><a class="topMenuSpacing" href="#">Trip Advisor Review</a></li>

                                                <li><a class="topMenuSpacing" href="#">Terms &amp; Privacy</a></li>

                                                <li><a class="topMenuSpacing" href="#">Guest Email Testimonial</a></li>

												<li><a class="topMenuSpacing" href="#">About Us</a></li>

												<li><a class="topMenuSpacing" href="#">General FAQs</a></li>

                                            </ul>

                                        </div>

                                    </div>

                                </li>

								<li class="menu-font"><a href="#">Contact us</a></li>

								<!--li class="menu-font"><a href="login.html"><button type="button" class="btn btn-oranges py-1 px-3">CLIENT LOGIN</button></a></li-->

                            </ul>

                        </div>

                    </nav>		

				</div>

				</div>

		</div>

	</header>