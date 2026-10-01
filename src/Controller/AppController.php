<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
		// Add this line to check authentication result and lock your site
        //$this->loadComponent('Authentication.Authentication');
        
    }
	 public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        //$this->Authentication->addUnauthenticatedActions(['home']);

        if ($this->request->is('ajax')) {
            $this->viewBuilder()->setClassName('Json');
        }
    }


    public function getCurrencyList()
    {
        $tabCurrency = $this->fetchTable('TblCurrency');

        $filterCurrency = array();
        $filterCurrency['conditions'] = array(
                                                    "status"    =>      "1"
                                        );

        $currencies = $tabCurrency->find('all',$filterCurrency)->toArray();

        $currencyList = array();

        foreach($currencies as $currency)
        {
            $defaultCurrency = false;

            if($currency['currency_code']=='INR')
            {
                $defaultCurrency = true;
            }
           
            $currencyList[] = array(
                                        "id"                =>     $currency['id'],
                                        "name"              =>     $currency['currency_name'],
                                        "code"              =>     $currency['currency_code'],
                                        "default_currency"  =>     $defaultCurrency,
                                        "image"             =>     WEBROOT_REPOSITORY.'flags/'.strtolower($currency['currency_code']).".png"
                        );
        }

      

        return $currencyList;
    }

    public function getCurrencyInfo($data=array())
    {
        $tabCurrency = $this->fetchTable('TblCurrency');

        $currencyInfo = $tabCurrency->findByCurrencyCode($data['currency_code'])->toArray();
        $currencyInfo = $currencyInfo[0];

        $responseData = array(
                                    "rate"              =>  $currencyInfo['amount'],
                                    "currency_code"     =>  $currencyInfo['currency_code'],
                                    "currency_value"    =>  $currencyInfo['currency_value']
                    );
        
        return $responseData;
    }
	
	public function getPageUrl()
	{
		$pageUrl = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		return $pageUrl;
	}			
	
	public function getTopFiveTripAdvisorReview()	
	{		
	
		$tblsTripadvisorReviews = $this->fetchTable('TblsTripadvisorReviews');				
		$tblsTripadvisorReviewDetails = $this->fetchTable('TblsTripadvisorReviewDetails');				
		$filterTripadvisorReviews = array();		$filterTripadvisorReviews['limit'] = 5;		
		$filterTripadvisorReviews['order'] = array(														
														"id"		=>  	"asc"												
											);		        
		$tripadvisorReviews = $tblsTripadvisorReviews->find('all')->toArray();		
		$tripadvisorReviewList = array();		if(!empty($tripadvisorReviews))		
		{			
			foreach($tripadvisorReviews as $tripReviews)			
			{										
				$options['fields']= array('short_description','long_description');				
				$options['conditions']= array("TblsTripadvisorReviewDetails.review_id"=>$tripReviews['id']);    				
				$tripadvisorReviewDetails = $tblsTripadvisorReviewDetails->find('all',$options)->toArray();																
				if($tripadvisorReviewDetails[0]["long_description"]=="")				
				{					
					continue;				
				}				
				
				$childcategoryAllInfo["id"]   =  $tripReviews["id"];				
				$childcategoryAllInfo["name"] =  $tripReviews["name"];				
				$childcategoryAllInfo["place"] =  $tripReviews["place"];				
				$childcategoryAllInfo["image"] =  $tripReviews["image"];				
				$childcategoryAllInfo["review_date"] =  $tripReviews["review_date"];				
				$childcategoryAllInfo["short_description"]  =  @$tripadvisorReviewDetails[0]["short_description"];				
				$childcategoryAllInfo["long_description"]   =  @$tripadvisorReviewDetails[0]["long_description"];										
				$tripadvisorReviewList[] = $childcategoryAllInfo;			
			}		
		}				
		return $tripadvisorReviewList;			
	}
}
