<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
		
		/*if ((!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on')|| $_SERVER['HTTP_HOST'] === 'elegantjourneys.com')
		{
			$redirectUrl = "https://www.elegantjourneys.com" . $_SERVER['REQUEST_URI'];
			header("Location: " . $redirectUrl, true, 302);
			exit();
		}*/
		
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'index']);
        ##$builder->connect('/', ['controller' => 'Pages', 'action' => 'index']);
       /*	$builder->connect('/', ['controller' => 'Pages', 'action' => 'index-demo']);
      
		$builder->connect('about-us', ['controller' => 'Pages', 'action' => 'aboutUs']);
		$builder->connect('terms-privacy', ['controller' => 'Pages', 'action' => 'toc']);
		$builder->connect('privacy-policy', ['controller' => 'Pages', 'action' => 'privacyPolicy']);
		$builder->connect('refund-and-cancellation', ['controller' => 'Pages', 'action' => 'refundAndCancellation']);
		$builder->connect('faq', ['controller' => 'Pages', 'action' => 'faq']);
      	$builder->connect('pay-now', ['controller' => 'Pages', 'action' => 'clientPayment']);
		$builder->connect('travel-guide', ['controller' => 'Pages', 'action' => 'travelGuide']);
		$builder->connect('contact-us', ['controller' => 'Contacts', 'action' => 'contactUs']);
        $builder->connect('/captcha', ['controller' => 'Contacts', 'action' => 'captcha']);
        $builder->connect('/verify-captcha', ['controller' => 'Contacts', 'action' => 'verifyCaptcha']);
        $builder->connect('/send-contact', ['controller' => 'Contacts', 'action' => 'sendContact']);
       	$builder->connect('/ecaptcha', ['controller' => 'Enquiries', 'action' => 'ecaptcha']);
        $builder->connect('/everify-captcha', ['controller' => 'Enquiries', 'action' => 'everifyCaptcha']);
        $builder->connect('/send-enquiry', ['controller' => 'Enquiries', 'action' => 'sendEnquiry']);
      	

        $builder->connect('/terms-{param1}', ['controller' => 'Pages', 'action' => 'terms'],['pass'=>['param1']]);
		
		
		$builder->connect('/tours-{param1}',['controller' => 'Tours', 'action' => 'index'],['pass'=>['param1']]);
        $builder->connect('/tours-{param1}/{param2}',['controller' => 'Tours', 'action' => 'details'],['pass'=>['param1','param2']]);
        
        ##$builder->connect('/holidays-india-{param2}',['controller' => 'Tours', 'action' => 'index','param1'=>'holidays-india'],['pass'=>['param1','param2']]);
		
		//$builder->connect('/holidays-india-luxury-tour-offers', ['controller' => 'Tours', 'action' => 'index']);
		$builder->connect('/tailor-make-a-tour', ['controller' => 'TailorMakeTour', 'action' => 'tailorMakeTour']);
      	$builder->connect('/tcaptcha', ['controller' => 'TailorMakeTour', 'action' => 'tcaptcha']);
        $builder->connect('/tverify-captcha', ['controller' => 'TailorMakeTour', 'action' => 'tverifyCaptcha']);
		
		$builder->connect('/tripadvisor-review', ['controller' => 'Reviews', 'action' => 'index']);
		$builder->connect('/tripadvisor-review-test', ['controller' => 'Reviews', 'action' => 'indexTest']);
		$builder->connect('/review', ['controller' => 'Reviews', 'action' => 'emailTestimonial']);
		$builder->connect('/video-testimonial', ['controller' => 'Videos', 'action' => 'index']);
		$builder->connect('/video-testimonial-test', ['controller' => 'Videos', 'action' => 'index1']);
		
		$builder->connect('/blog-{param1}',['controller' => 'Blogs', 'action' => 'detail'],['pass'=>['param1']]);


        #### AJAX ROUTING OF THE WEBSITE
        $builder->connect('/get-tour-price-by-currency', ['controller' => 'Tours', 'action' => 'changeTourPriceByCurrency']);
		*/
        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
		 /*
		 $builder->redirect('/tripadvisor_review_081112021.php','/tripadvisor-review',['status' => 301]);
		 $builder->redirect('/:any.php','https://www.elegantjourneys.com',['status' => 301, 'persist' => []] )->setPatterns(['any' => '.*']);
		 $builder->redirect('/:any.html','https://www.elegantjourneys.com',['status' => 301, 'persist' => []] )->setPatterns(['any' => '.*']);	
		 
		 ### 26082025
		 $builder->redirect('/tours-popular-golden-triangle/8-day-golden-triangle-tour-and-tiger','/tours-popular-golden-triangle/8-day-golden-triangle-with-delhi-agra-ranthambore-wildlife-and-jaipur-194',['status' => 301]);
		 $builder->redirect('/tours-popular-golden-triangle/3-day-golden-triangle-tour','/tours-popular-golden-triangle/3-day-golden-triangle-tour-with-delhi-agra-and-jaipur-322',['status' => 301]);
		 $builder->redirect('/tours-popular-golden-triangle/4-day-golden-triangle-tour','/tours-popular-golden-triangle/4-day-golden-triangle-tour-with-delhi-agra-and-jaipur-323',['status' => 301]);
		 $builder->redirect('/tours-popular-golden-triangle/popular-tours.html','/tours-popular-golden-triangle',['status' => 301]);
		 $builder->redirect('/tours-popular-golden-triangle/luxury-offers.html','/tours-luxury-offers',['status' => 301]);
		 $builder->redirect('/tours/oberoi-vilas-holidays','/tours-luxury-offers',['status' => 301]);
		 $builder->redirect('/index-28012020.php','/',['status' => 301]);
		 $builder->redirect('/tailor-make-a-tour.php','/tailor-make-a-tour',['status' => 301]);
		 $builder->redirect('/holidays-india-luxury-travel-special-offers/10-day-golden-triangle-with-delhi-varanasi-agra-jaipur-and-udaipur-265','/tours-luxury-offers/luxury-10-day-golden-triangle-with-delhi-agra-jaipur-jodhpur-udaipur-jodhpur-and-udaipur-269',['status' => 301]);
		 $builder->redirect('/holidays-india-luxury-travel-special-offers/8-day-golden-triangle-with-delhi-varanasi-agra-and-jaipur-264','/tours-luxury-offers/luxury-8-day-golden-triangle-with-delhi-agra-jaipur-and-udaipur-195',['status' => 301]);
		 $builder->redirect('/holidays-india-luxury-travel-special-offers/9-day-golden-triangle-with-delhi-agra-jaipur-jodhpur-udaipur-jodhpur-and-udaipur-269','/tours-luxury-offers/luxury-9-day-golden-triangle-with-delhi-varanasi-agra-and-jaipur-264',['status' => 301]);
		 $builder->redirect('/holidays-india-luxury-travel-special-offers/12-day-golden-triangle-tour-with-delhi-varanasi-agra-ranthambore-jaipur-and-udaipur-267','/tours-luxury-offers/luxury-12-day-golden-triangle-tour-with-delhi-varanasi-agra-ranthambore-jaipur-and-udaipur-267',['status' => 301]);
		 $builder->redirect('/holidays-india-golden-triangle-india-tours','/tours-popular-golden-triangle',['status' => 301]);
		 $builder->redirect('/tours/rajasthan-tours-india','/holidays-india-luxury-travel-special-offers',['status' => 301]);
		 $builder->redirect('/hgateway/login/','/',['status' => 301]);
		
		### 30082025
		$builder->redirect('/img/vendors/owl-carousel/changelog.html','/',['status' => 302]);
		$builder->redirect('/img/vendors/jquery-placeholder/','/',['status' => 301]);
		*/
		$builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
