<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Routing\Router;
use Spatie\Browsershot\Browsershot;
use Cake\Http\Exception\BadRequestException;
use Cake\View\View;

//use Cake\Mailer\Mailer;

class ToursController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        //$this->loadComponent('Email'); // Load the EmailComponent
        //$this->loadComponent('UserIpLocator'); // Load the IpLocatorComponent
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        //Configure::write('debug', true);
    }

   
     public function pdf($token = '')
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $tourData = [];
        $tourRequestData = array();
        $tourRequestData['token'] = $token;

        $tourData = $this->getTourData($tourRequestData);
		
        $this->set([
            'tourData' => $tourData,
            'token'    => $token,
            'saveUrl'  => $this->request->getAttribute('webroot') . 'tours/save-pdf/' . $token,
        ]);
        $this->render("pdf/pdf_version7_editable");
    }
	 
	 public function getTourData($data=array())
	 {
		
		 $tabClientCommunicationTours = $this->fetchTable('ClientCommunicationTours');
		 
		 $clientComTourInfo = $tabClientCommunicationTours->findByToken($data['token'])->toArray();
		 $clientComTourInfo = @$clientComTourInfo[0];
		 
		
		 if($clientComTourInfo['view_type']=='day_view')
		 {
			
			 $requestDayViewData = array();
			 $requestDayViewData['client_communication_tour_id'] = $clientComTourInfo['id'];
			 $requestDayViewData['duration'] = $clientComTourInfo['duration'];
			 $tourDayViewData = $this->getTourDayView($requestDayViewData);
								 
			 $tourDayViewData['id'] = $clientComTourInfo['id'];
			 $tourDayViewData['name'] = $clientComTourInfo['name'];
			 $tourDayViewData['duration'] = $clientComTourInfo['duration'];
			 $tourDayViewData['price'] = $clientComTourInfo['price'];
			 $tourDayViewData['no_of_person'] = $clientComTourInfo['no_of_person'];
			 $tourDayViewData['view_type'] = $clientComTourInfo['view_type'];
           	 $tourDayViewData['token'] = $data['token'];
			 
			 return $tourDayViewData;
		 }
		 else if($clientComTourInfo['view_type']=='city_view')
		 {
			 $requestDayViewData = array();
			 $requestDayViewData['client_communication_tour_id'] = $clientComTourInfo['id'];
			 $requestDayViewData['duration'] = $clientComTourInfo['duration'];
			 $tourDayViewData = $this->getTourCityView($requestDayViewData);
			 $tourDayViewData['id'] = $clientComTourInfo['id'];
			 $tourDayViewData['name'] = $clientComTourInfo['name'];
			 $tourDayViewData['duration'] = $clientComTourInfo['duration'];
			 $tourDayViewData['price'] = $clientComTourInfo['price'];
			 $tourDayViewData['no_of_person'] = $clientComTourInfo['no_of_person'];
			 $tourDayViewData['view_type'] = $clientComTourInfo['view_type'];
           	 $tourDayViewData['token'] = $data['token'];
			
			 return $tourDayViewData;
		 }
		 
	}
	
	function getCityDayList($data=array())
	{
		$tabClientCommunicationTourCities = $this->fetchTable('ClientCommunicationTourCities');
		$tabTblsCity = $this->fetchTable('TblsCity');
		
		$blockIds = $tabClientCommunicationTourCities->find()
					->select(['block_id'])
					->distinct(['block_id'])
					->where(['client_communication_tour_id' => $data['client_communication_tour_id'] ])
					->order(['day_count' => 'ASC'])
					->all()->toArray();
					
		$cityDayList = array();
		
		foreach($blockIds as $blockId)
		{
			
			$dayCountFirst = $tabClientCommunicationTourCities->find()
						->select(['day_count'])
						->where([
							'client_communication_tour_id' => $data['client_communication_tour_id'],
							'block_id' => $blockId['block_id']
						])
						->order(['day_count' => 'ASC'])
						->first()->toArray();
						
			$dayCountLast = $tabClientCommunicationTourCities->find()
						->select(['day_count'])
						->where([
							'client_communication_tour_id' => $data['client_communication_tour_id'],
							'block_id' => $blockId['block_id']
						])
						->order(['day_count' => 'desc'])
						->first()->toArray();
						
			$tourCityInfo = $tabClientCommunicationTourCities->findByBlockId($blockId['block_id'])->first()->toArray();
			
			
			$cityInfo = $tabTblsCity->findById($tourCityInfo['city_id'])->toArray();
			$cityInfo = $cityInfo[0];
			
			$cityDayList[] = array(
										"city_name"		=>		$cityInfo['city_name'],
										"block_id"		=>		$blockId['block_id'],
										"start_day"		=>		$dayCountFirst['day_count'],
										"end_day"		=>		$dayCountLast['day_count']
								);
			
						
						
		}
		
		return $cityDayList;
		
	}
	
	private function getTourCityView($data=array())
	{
		$tabClientCommunicationTours = $this->fetchTable('ClientCommunicationTours');
		$tabClientCommunicationTourCities = $this->fetchTable('ClientCommunicationTourCities');
		$tabClientCommunicationTourDayPlans = $this->fetchTable('ClientCommunicationTourDayPlans');
		$tabClientCommunicationTourDayPlanDesc = $this->fetchTable('ClientCommunicationTourDayPlanDescriptions');
		$tabTblsCity = $this->fetchTable('TblsCity');
		
		$clientComTourInfo = $tabClientCommunicationTours->findById($data['client_communication_tour_id'])->toArray();
		$clientComTourInfo = $clientComTourInfo[0];
		
		$tourStartDate = "";
		
		if($clientComTourInfo['start_date']!="")
		{
			$tourStartDate = $clientComTourInfo['start_date']->format('Y-m-d');
		}
		
		$tourCityViewList = array();
		
		$blockIds = $tabClientCommunicationTourCities->find()
					->select(['block_id'])
					->distinct(['block_id'])
					->where(['client_communication_tour_id' => $data['client_communication_tour_id'] ])
					->order(['day_count','day_order_sequence'])
					->all()->toArray();
					
		$cityDayList = array();
		
		foreach($blockIds as $blockId)
		{
			$dayCountFirst = $tabClientCommunicationTourCities->find()
						->select(['day_count'])
						->where([
							'client_communication_tour_id' => $data['client_communication_tour_id'],
							'block_id' => $blockId['block_id']
						])
						->order(['day_count' => 'ASC'])
						->first()->toArray();
						
			$dayCountLast = $tabClientCommunicationTourCities->find()
						->select(['day_count'])
						->where([
							'client_communication_tour_id' => $data['client_communication_tour_id'],
							'block_id' => $blockId['block_id']
						])
						->order(['day_count' => 'desc'])
						->first()->toArray();
						
			$tourCityInfo = $tabClientCommunicationTourCities->findByBlockId($blockId['block_id'])->first()->toArray();
			
			
			$cityInfo = $tabTblsCity->findById($tourCityInfo['city_id'])->toArray();
			$cityInfo = $cityInfo[0];
			
			$filterClientComTourDayPlans = array();
			$filterClientComTourDayPlans['conditions'] = array(
																	"block_id"		=>		$blockId['block_id']
															);
			$filterClientComTourDayPlans['order'] = array(
																"day_order_sequence"	=>		"asc"
													);
		
			$tourDayPlans = $tabClientCommunicationTourDayPlans->find('all',$filterClientComTourDayPlans)->toArray();
			
			$tourDayPlanList = array();
			
			foreach($tourDayPlans as $tourDayPlan)
			{
				$tourDayPlanDesc = $tabClientCommunicationTourDayPlanDesc->findByClientCommunicationTourDayPlanIdAndViewType($tourDayPlan['id'],'city_view')->toArray();
				$tourDayPlanDesc = $tourDayPlanDesc[0];
				
				$tourDayPlanList[] = array(
												"id"				=>			$tourDayPlan['id'],
												"name"				=>			$tourDayPlan['name'],
												"event_id"			=>			$tourDayPlan['event_id'],
												"description"		=>			$tourDayPlanDesc['description']
									);
			}
			
			$requestHotelData = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														"day_count"						=>	$dayCountFirst['day_count']
												);
												
			$dayHotelList = $this->getCityHotelByDay($requestHotelData);
			
			//$tourCityList[$tourcityListIndex]['hotels'] = $dayHotelList;
			
			if($tourStartDate!="")
			{
				$tourCityViewList[] = array(
											"city_name"		=>		$cityInfo['city_name'],
											"block_id"		=>		$blockId['block_id'],
											"start_day"		=>		$dayCountFirst['day_count'],
											"end_day"		=>		$dayCountLast['day_count'],
											"start_date"	=>		date('d-m-Y', strtotime("+".($dayCountFirst['day_count']-1)." days", strtotime($tourStartDate))),
											"end_date"		=>		date('d-m-Y', strtotime("+".($dayCountLast['day_count']-1)." days", strtotime($tourStartDate))),
											"events"		=>		$tourDayPlanList,
											"hotels"		=>		$dayHotelList
									);
			}
			else
			{
				$tourCityViewList[] = array(
											"city_name"		=>		$cityInfo['city_name'],
											"block_id"		=>		$blockId['block_id'],
											"start_day"		=>		$dayCountFirst['day_count'],
											"end_day"		=>		$dayCountLast['day_count'],
											"events"		=>		$tourDayPlanList,
											"hotels"		=>		$dayHotelList
									);
				
			}
					
		}
		
		
		
		$requestInclusionData = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														
												);
												
		$inclusionList = $this->getTourInclusion($requestInclusionData);
		
		$requestInclusionData = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														
												);
												
		$exclusionList = $this->getTourExclusion($requestInclusionData);
		
		$requestCityListData = array(
											"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
											
									);
		
		$cityDayList = $this->getCityDayList($requestCityListData);
		
		$requestHotelGroupList = array(
											"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
											
									);
		$hotelGroupList = $this->getHotelGroupList($requestHotelGroupList);
		
		
		$tourInfo = array(
								"cities"   			=>		$tourCityViewList,
								"inclusion"			=>		$inclusionList,
								"exclusion"			=>		$exclusionList,
								"city_day_list"		=>		$cityDayList,
								"hotel_group_list"	=>		$hotelGroupList
					);
					
		return $tourInfo;
		
		
	}
	
	
	private function getTourDayView($data=array())
	{
		
		$tabClientCommunicationTours = $this->fetchTable('ClientCommunicationTours');
		$tabClientCommunicationTourCities = $this->fetchTable('ClientCommunicationTourCities');
		$tabClientCommunicationTourDayPlans = $this->fetchTable('ClientCommunicationTourDayPlans');
		$tabClientCommunicationTourDayPlanDesc = $this->fetchTable('ClientCommunicationTourDayPlanDescriptions');
		$tabTblsCity = $this->fetchTable('TblsCity');
		$tabEventIncExc = $this->fetchTable('TblsEventInclusionExclusion');
		$tabInclusionExclusion = $this->fetchTable('TblsInclusionExclusion');
		
		$eventIncList = array();
		
		$clientComTourInfo = $tabClientCommunicationTours->findById($data['client_communication_tour_id'])->toArray();
		$clientComTourInfo = $clientComTourInfo[0];
		
		$tourStartDate = "";
		
		if($clientComTourInfo['start_date']!="")
		{
			$tourStartDate = $clientComTourInfo['start_date']->format('Y-m-d');
		}
		
		$tourCityList = array();
		for($i=1;$i<=$data['duration'];$i++)
		{
			
			$filterTourCities = array();
			$filterTourCities['conditions'] = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														"day_count"		=>		$i
												);
			$filterTourCiteis['order'] = array(
													"day_order_sequence"	=>	"asc"
											);
			
			$tourCities = $tabClientCommunicationTourCities->find('all',$filterTourCities)->toArray();
			
			
			$cityList = array();
			foreach($tourCities as $tourCity)
			{
				
				$cityInfo = $tabTblsCity->findById($tourCity['city_id'])->toArray();
				$cityInfo = $cityInfo[0];
				
				if($tourStartDate!="")
				{
					$cityList[] = array(
											"id"					=>		$tourCity['id'],
											"order_sequence"		=>		$tourCity['day_order_sequence'],
											"day_count"				=>		$tourCity['day_count'],
											"tour_date"				=>		date('d-m-Y', strtotime("+".($tourCity['day_count']-1)." days", strtotime($tourStartDate))),
											"start_day"				=>		$tourCity['start_day'],
											"end_day"				=>		$tourCity['end_day'],
											"block_id"				=>		$tourCity['block_id'],
											"city_id"				=>		$tourCity['city_id'],
											"city_name"				=>		$cityInfo['city_name']
											
								);
				}
				else
				{
							
					$cityList[] = array(
											"id"					=>		$tourCity['id'],
											"order_sequence"		=>		$tourCity['day_order_sequence'],
											"day_count"				=>		$tourCity['day_count'],
											"start_day"				=>		$tourCity['start_day'],
											"end_day"				=>		$tourCity['end_day'],
											"block_id"				=>		$tourCity['block_id'],
											"city_id"				=>		$tourCity['city_id'],
											"city_name"				=>		$cityInfo['city_name']
											
								);
				}
			}
			$tourCityList[$i] = $cityList;
			
		}
		
		foreach($tourCityList as $tourcityListIndex=>$tourCity)
		{
			
			$eventDayList = array();
			foreach($tourCity as $tourCityIndex=>$city)
			{
				$filterTourDayPlans = array();
				$filterTourDayPlans['conditions'] = array(
															"day_count"						=>		$city['day_count'],
															"city_id"						=>		$city['city_id'],
															"client_communication_tour_id"	=>		$data['client_communication_tour_id']
												);
				
				$filterTourDayPlans['order'] = array(
													"day_order_sequence"	=>		"asc"
											);
				
				$tourDayPlans = $tabClientCommunicationTourDayPlans->find('all',$filterTourDayPlans)->toArray();
				
							
				$tourDayPlanList = array();
				
				foreach($tourDayPlans as $tourDayPlan)
				{
					$tourDayPlanDescInfo = $tabClientCommunicationTourDayPlanDesc->findByClientCommunicationTourDayPlanIdAndViewType($tourDayPlan['id'],'day_view')->toArray();
					$tourDayPlanDescInfo = @$tourDayPlanDescInfo[0];
					
					$tourDayPlanList[] = array(
													"id"						=>				$tourDayPlan['id'],
													"name"						=>				$tourDayPlan['name'],
													"city_id"					=>				$tourDayPlan['city_id'],
													"description"				=>				@$tourDayPlanDescInfo['description']
										);
										
					//ADDING EVENT inclusions
					$eventIncExcs = $tabEventIncExc->findByEventId($tourDayPlan['event_id'])->toArray();
					
					if(!empty($eventIncExcs))
					{
						foreach($eventIncExcs as $eventIncExc)
						{
							$incExcInfo = $tabInclusionExclusion->findById($eventIncExc['inclusion_exclusion_id'])->toArray();
							
							$eventIncList[] = array(
														"id"			=>	$incExcInfo[0]['id'],
														"description"	=>	$incExcInfo[0]['incexcdesc']
												);
						}
					}								
				}
				
				
				
				$tourCityList[$tourcityListIndex][$tourCityIndex]['events'] = $tourDayPlanList;
			}
			
			$requestHotelData = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														"day_count"		=>		$tourcityListIndex
												);
												
			$dayHotelList = $this->getCityHotelByDay($requestHotelData);
			
			$tourCityList[$tourcityListIndex]['hotels'] = $dayHotelList;
			
			

			
			
		}
		
		$requestInclusionData = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														
												);
												
		$inclusionList = $this->getTourInclusion($requestInclusionData);
		
		$requestInclusionData = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														
												);
												
		$exclusionList = $this->getTourExclusion($requestInclusionData);
		
		$requestCityListData = array(
											"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
											
									);
		
		$cityDayList = $this->getCityDayList($requestCityListData);
		
		$requestHotelGroupList = array(
											"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
											
									);
		$hotelGroupList = $this->getHotelGroupList($requestHotelGroupList);
		
		
		$tourInfo = array(
								"cities"   			=>		$tourCityList,
								"inclusion"			=>		$inclusionList,
								"exclusion"			=>		$exclusionList,
								"event_inclusion"	=>		$eventIncList,
								"city_day_list"		=>		$cityDayList,
								"hotel_group_list"	=>		$hotelGroupList
					);
					
		return $tourInfo;
		
		
	}
	
	private function getHotelGroupList($data=array())
	{
		$tabTblsCity = $this->fetchTable('TblsCity');
		$tabClientComHotelGroups = $this->fetchTable('ClientCommunicationHotelGroups');
		$tabClientComHotel = $this->fetchTable('ClientCommunicationHotels');

		$hotelTypes = $tabClientComHotelGroups->find()
											->select([
												'hotel_type_id',
												'hotel_type_name'
											])
											->where([
												'client_communication_tour_id' => $data['client_communication_tour_id']
											])
											->distinct([
												'hotel_type_id',
												'hotel_type_name'
											])
											->toArray();
		foreach($hotelTypes as $hotelType)
		{
			$filterHotelGroup = array();
			$filterHotelGroup['conditions'] = array(
															"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
															"hotel_type_id"					=>	$hotelType['hotel_type_id']
													);
			$filterHotelGroup['order'] = array(
													"day_count"	=>		"asc"
										);
										
			$hotelGroups = $tabClientComHotelGroups->find('all',$filterHotelGroup)->toArray();
			
			$hotelCityList = array();
			foreach($hotelGroups as $hotelGroup)
			{
				if(!empty($hotelCityList))
				{
					$lastCityListIndex = ((count($hotelCityList))-1);
					
					if($hotelCityList[$lastCityListIndex]['city_id']==$hotelGroup['city_id'])
					{
						$hotelCityList[$lastCityListIndex]['end_day']  = $hotelGroup['day_count'];
						continue;
					}
					
				}
				$cityInfo = $tabTblsCity->findById($hotelGroup['city_id'])->toArray();
				$cityInfo = $cityInfo[0];
			
				$filterClientComHotels = array();
				$filterClientComHotels['conditions'] = array(
																"client_communication_hotel_group_id"  =>   $hotelGroup['id']
														);
				$filterClientComHotels['order'] = array(
															"id"	=>		"asc"
													);
				$hotelGroupHotels = $tabClientComHotel->find('all',$filterClientComHotels)->toArray();
				if(empty($hotelGroupHotels))
				{
					continue;
				}
				
				$hotelList = array();
				
				foreach($hotelGroupHotels as $hotelGroupHotel)
				{
					$hotelList[] = array(
											"hotel_name"	=>		$hotelGroupHotel['hotel_name'],
											"room_name"		=>		$hotelGroupHotel['room_name'],
											"room_code"		=>		$hotelGroupHotel['room_code']
									);
					
				}
				
				$hotelCityList[] = array(
											"city_id"		=>		$cityInfo['id'],
											"city_name"		=>		$cityInfo['city_name'],
											"day_count"		=>		$hotelGroup['day_count'],
											"start_day"		=>		$hotelGroup['day_count'],
											"end_day"		=>		$hotelGroup['day_count'],
											"hotel_list"	=>		$hotelList
									);
									
				
			}
			
			$hotelGroupList[] = array(
											"hotel_type_id"		=>		$hotelType['hotel_type_id'],
											"hotel_type_name"	=>		$hotelType['hotel_type_name'],
											"hotel_city_list"	=>		$hotelCityList
								);
			
		}
		
		return $hotelGroupList;
		
	}
	
	private function getCityHotelByDay($data=array())
	{
		
		$tabTblsCity = $this->fetchTable('TblsCity');
		$tabClientComHotelGroups = $this->fetchTable('ClientCommunicationHotelGroups');
		$tabClientComHotel = $this->fetchTable('ClientCommunicationHotels');
		
		$filterHotelGroup = array();
		$filterHotelGroup['conditions'] = array(
														"client_communication_tour_id"	=>	$data['client_communication_tour_id'],
														"day_count"						=>		$data['day_count']
												);
		$filterHotelGroup['order'] = array(
												"order_sequence"	=>		"asc"
									);
									
		$hotelGroups = $tabClientComHotelGroups->find('all',$filterHotelGroup)->toArray();
				
		$hotelGroupList = array();
		foreach($hotelGroups as $hotelGroup)
		{
			
			$cityInfo = $tabTblsCity->findById($hotelGroup['city_id'])->toArray();
			$cityInfo = $cityInfo[0];
			
			$hotels = $tabClientComHotel->findAllByClientCommunicationHotelGroupId($hotelGroup['id'])->toArray();
			
			$hotelList = array();
			foreach($hotels as $hotel)
			{
				$hotelList[] = array(
											"id"			=>		$hotel['id'],
											"hotel_name"	=>		$hotel['hotel_name'],
											"room_name"		=>		$hotel['room_name']
								);
			}
			
			$hotelGroupList[] = array(
										"id"				=>		$hotelGroup['id'],
										"hotel_type_name"	=>		$hotelGroup['hotel_type_name'],
										"hotel_type_id"		=>		$hotelGroup['hotel_type_id'],
										"hotels"			=>		$hotelList
								);
		}
		
		return $hotelGroupList;
		
	}
	
	private function getTourInclusion($data=array())
	{
		$tabClientComTourIncExc = $this->fetchTable('ClientCommunicationTourInclusionExclusion');
		$tabIncExc = $this->fetchTable('TblsInclusionExclusion');
		
		$filterIncExc = array();
		$filterIncExc['conditions'] = array(
												"client_communication_tour_id"		=>		$data['client_communication_tour_id'],
												"inc_exc_type"						=>		'inclusion'
										);
		$filterIncExc['order'] = array(
											"order_sequence"		=>		"asc"
								);
								
		$tourInclusions = $tabClientComTourIncExc->find('all',$filterIncExc)->toArray();
		
		$inclusionList = array();
		foreach($tourInclusions as $tourInclusion)
		{
			
			$inclusionInfo = $tabIncExc->findById($tourInclusion['inclusion_exclusion_id'])->toArray();
			$inclusionInfo = $inclusionInfo[0];
			
			$inclusionList[] = array(
											"id"			=>		$tourInclusion['id'],
											"description"	=>		$inclusionInfo['incexcdesc']
								);
		}
		
		return $inclusionList;
		
	}
	
	private function getTourExclusion($data=array())
	{
		$tabClientComTourIncExc = $this->fetchTable('ClientCommunicationTourInclusionExclusion');
		$tabIncExc = $this->fetchTable('TblsInclusionExclusion');
		
		$filterIncExc = array();
		$filterIncExc['conditions'] = array(
												"client_communication_tour_id"		=>		$data['client_communication_tour_id'],
												"inc_exc_type"						=>		'exclusion'
										);
		$filterIncExc['order'] = array(
											"order_sequence"		=>		"asc"
								);
								
		$tourInclusions = $tabClientComTourIncExc->find('all',$filterIncExc)->toArray();
		
		$inclusionList = array();
		foreach($tourInclusions as $tourInclusion)
		{
			
			$inclusionInfo = $tabIncExc->findById($tourInclusion['inclusion_exclusion_id'])->toArray();
			$inclusionInfo = $inclusionInfo[0];
			
			$inclusionList[] = array(
											"id"			=>		$tourInclusion['id'],
											"description"	=>		$inclusionInfo['incexcdesc']
								);
		}
		
		return $inclusionList;
		
	}

    public function pdfORG($id = null, string $token = '')
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');

        $tourData = [];
        $tourData = $this->getClientCommunication($token);
        $this->set('tourData', $tourData);

        // Default filename based on condition
        $fileName = 'TourSummary.pdf';

        if ($id == "1") {
            $this->viewBuilder()->setOption('pdfConfig', [
                'orientation' => 'portrait',
                'download' => true,
                'filename' => 'TourSummary_V1.pdf',
            ]);
            $this->render("pdf_version1");
        } elseif ($id == "2") {
            $this->viewBuilder()->setOption('pdfConfig', [
                'orientation' => 'portrait',
                'download' => true,
                'filename' => 'TourSummary_V2.pdf',
            ]);
            $this->render("pdf_version2");
        } elseif ($id == "3") {
            $this->viewBuilder()->setOption('pdfConfig', [
                'orientation' => 'portrait',
                'download' => true,
                'filename' => 'TourSummary_V3.pdf',
            ]);
            $this->render("pdf_version3");
        } elseif ($id == "4") {
            $this->viewBuilder()->setOption('pdfConfig', [
                'orientation' => 'portrait',
                'download' => true,
                'filename' => 'TourSummary_V4.pdf',
            ]);
            $this->render("pdf_version4");
        } elseif ($id == "5") {
            $this->viewBuilder()->setOption('pdfConfig', [
                'orientation' => 'portrait',
                'download' => true,
                'filename' => 'TourSummary_V5.pdf',
            ]);
            $this->render("pdf_version5");
        } else {
            $this->viewBuilder()->setOption('pdfConfig', [
                'orientation' => 'portrait',
                'download' => true,
                'filename' => $fileName,
            ]);
            $this->render("pdf");
        }
    }

    public function getClientCommunication(string $token)
    {
        $clientCommunicationTours = $this->fetchTable('ClientCommunicationTours');
        $tourData = $clientCommunicationTours
            ->find()
            ->contain(['ClientCommunications'])
            ->where(['ClientCommunicationTours.token' => $token])
            ->first();

        $communicationId = $tourData->client_communication_id;


        $hotels           = $this->getHotels($communicationId);
        $inclusions       = $this->getTourInclusionExclusion($communicationId);
        // $cities           = $this->getTourCities($communicationId);
        $dayPlans         = $this->getTourDayPlans($communicationId);

        $tourDataArray = array();

        if (!$tourData) {
            $tourDataArray = [
                'status' => false,
                'message' => 'Invalid token',
            ];
        } else {
            $tourDataArray = [
                'status' => true,
                'message' => 'Valid token',
                'client_communication_id' => $tourData['client_communication_id'],
                'token' => $tourData['token'],
                'name' => $tourData['name'],
                'price' => $tourData['price'],
                'duration' => $tourData['duration'],
                'no_of_person' => $tourData['no_of_person'],
                'start_date' => $tourData['start_date']->format('Y-m-d'),
                'end_date'   => $tourData['end_date']->format('Y-m-d'),
                'enquiry_id' => $tourData['client_communication']['enquiry_id'],
                'customer_id' => $tourData['client_communication']['customer_id'],
                'communication_type' => $tourData['client_communication']['communication_type'],
                'communication_date' => $tourData['client_communication']['communication_date']->format('Y-m-d'),
                'system_comment' => $tourData['client_communication']['system_comment'],
                'user_comment' => $tourData['client_communication']['user_comment'],
                'day_plans' => $dayPlans,
            ];
        }




        $result = [
            'tour' => $tourDataArray,
            //'tour_day_plans' => $dayPlans,
            //'hotels' => $hotels,
            'inclusion_exclusion' => $inclusions,
            //'tour_cities' => $cities,

        ];

       /* echo "<pre>";
        print_r($result);
        exit;*/

        return $result;
    }

    private function getHotels(int $clientCommunicationTourId)
    {
        $clientCommunicationHotelGroups = $this->fetchTable('ClientCommunicationHotelGroups');
        $options['contain'] = array("ClientCommunicationHotels");
        $hotelData = $clientCommunicationHotelGroups->find()->where(['client_communication_tour_id' => $clientCommunicationTourId])->contain($options['contain'])->toArray();
        return json_decode(json_encode($hotelData), true); //$hotelData;
    }

    private function getTourCities(int $clientCommunicationTourId)
    {
        $clientCommunicationTourCities = $this->fetchTable('clientCommunicationTourCities');
        $options['contain'] = array("TblsCity");
        $cityData = $clientCommunicationTourCities->find()->where(['client_communication_tour_id' => $clientCommunicationTourId])->contain($options['contain'])->toArray();
        return json_decode(json_encode($cityData), true); //$cityData;
    }

    /* private function getTourDayPlans(int $clientCommunicationTourId)
    {
        $clientCommunicationTourDayPlans = $this->fetchTable('ClientCommunicationTourDayPlans');
        $options['contain'] = array("ClientCommunicationTourDayPlanDescriptions", "TblsCity");
        $dayPlanData = $clientCommunicationTourDayPlans->find()->where(['client_communication_tour_id' => $clientCommunicationTourId])->contain($options['contain'])->order(["day_order_sequence" => "ASC"])->toArray();

        $dayPlanDataArray = array();
        foreach ($dayPlanData as $dayPlan) {
            $dayPlanDataArray[] = array(
                'id' => $dayPlan->id,
                'client_communication_tour_id' => $dayPlan->client_communication_tour_id,
                'day_count' => $dayPlan->day_count,
                'day_order_sequence' => $dayPlan->day_order_sequence,
                'day_title' => $dayPlan->name,
                'city_id' => $dayPlan->city_id,
                'city_name' => isset($dayPlan->tbls_city->city_name) ? $dayPlan->tbls_city->city_name : '',
                //'modified' => $dayPlan->modified,
                'descriptions' => $dayPlan->client_communication_tour_day_plan_descriptions[0]->description, //$descriptionsArray,
            );
        }


        return $dayPlanDataArray; //json_decode(json_encode($dayPlanData), true); //$dayPlanData;
    } */
 /*  private function getTourDayPlans(int $clientCommunicationTourId)
{
    // 1. Load Day Plans
    $clientCommunicationTourDayPlans = $this->fetchTable('ClientCommunicationTourDayPlans');
    $options['contain'] = ["ClientCommunicationTourDayPlanDescriptions", "TblsCity"];

    $dayPlanData = $clientCommunicationTourDayPlans
        ->find()
        ->where(['client_communication_tour_id' => $clientCommunicationTourId])
        ->contain($options['contain'])
        ->order(["day_order_sequence" => "ASC"])
        ->toArray();

    // 2. Load Hotels (your existing function)
    $hotels = $this->getHotels($clientCommunicationTourId);

    // 3. Index hotels by day_count for faster matching
    $hotelsByDay = [];
    foreach ($hotels as $hotelGroup) {
        foreach ($hotelGroup['client_communication_hotels'] as $hotel) {
            $hotelsByDay[$hotel['day_count']][] = $hotel;
        }
    }

    // 4. Build Final DayPlan Array with Hotels added
    $dayPlanDataArray = [];

    foreach ($dayPlanData as $dayPlan) {

        $dayCount = $dayPlan->day_count;

        $dayPlanDataArray[] = [
            'id' => $dayPlan->id,
            'client_communication_tour_id' => $dayPlan->client_communication_tour_id,
            'day_count' => $dayCount,
            'day_order_sequence' => $dayPlan->day_order_sequence,
            'day_title' => $dayPlan->name,
            'city_id' => $dayPlan->city_id,
            'city_name' => $dayPlan->tbls_city->city_name ?? '',
            'descriptions' => $dayPlan->client_communication_tour_day_plan_descriptions[0]->description ?? '',
            
            'hotels' => $hotelsByDay[$dayCount] ?? []
        ];
    }

    return $dayPlanDataArray;
}
*/
 /* private function getTourDayPlans(int $clientCommunicationTourId)
{
    // 1. Load Day Plans
    $clientCommunicationTourDayPlans = $this->fetchTable('ClientCommunicationTourDayPlans');
    $options['contain'] = ["ClientCommunicationTourDayPlanDescriptions", "TblsCity"];

    $dayPlanData = $clientCommunicationTourDayPlans
        ->find()
        ->where(['client_communication_tour_id' => $clientCommunicationTourId])
        ->contain($options['contain'])
        ->order(["day_order_sequence" => "ASC"])
        ->toArray();

    // 2. Load Hotels from your existing function
    $hotels = $this->getHotels($clientCommunicationTourId);

    // 3. Index hotels by day_count
    $hotelsByDay = [];
    foreach ($hotels as $hotelGroup) {
        foreach ($hotelGroup['client_communication_hotels'] as $hotel) {
            $day = (int) $hotel['day_count'];
            $hotelsByDay[$day][] = $hotel;
        }
    }

    // 4. Group cities by day_count
    $citiesByDay = [];
    foreach ($dayPlanData as $dp) {
        $citiesByDay[$dp->day_count][] = $dp;
    }

    // 5. Build final output
    $dayPlanDataArray = [];

    foreach ($dayPlanData as $dayPlan) {

        $day = $dayPlan->day_count;

        // Get all cities for this day
        $cities = $citiesByDay[$day];

        // Check if this is the LAST city of that same day
        $isLastCity = end($cities)->id == $dayPlan->id;

        $dayPlanDataArray[] = [
            'id' => $dayPlan->id,
            'client_communication_tour_id' => $dayPlan->client_communication_tour_id,
            'day_count' => $day,
            'day_order_sequence' => $dayPlan->day_order_sequence,
            'day_title' => $dayPlan->name,
            'city_id' => $dayPlan->city_id,
            'city_name' => $dayPlan->tbls_city->city_name ?? '',
            'descriptions' => $dayPlan->client_communication_tour_day_plan_descriptions[0]->description ?? '',

            // ⭐ Only LAST CITY shows hotels
            'hotels' => $isLastCity ? ($hotelsByDay[$day] ?? []) : []
        ];
    }

    return $dayPlanDataArray;
}
*/
  private function getTourDayPlans(int $clientCommunicationTourId)
{
    // 1. Load Day Plans
    $clientCommunicationTourDayPlans = $this->fetchTable('ClientCommunicationTourDayPlans');
    $options['contain'] = ["ClientCommunicationTourDayPlanDescriptions", "TblsCity"];

    $dayPlanData = $clientCommunicationTourDayPlans
        ->find()
        ->where(['client_communication_tour_id' => $clientCommunicationTourId])
        ->contain($options['contain'])
        ->order(["day_order_sequence" => "ASC"])
        ->toArray();

    // 2. Load Hotels
    $hotels = $this->getHotels($clientCommunicationTourId);

    // 3. Index hotels by day_count + include hotel_type_name
    $hotelsByDay = [];
    foreach ($hotels as $hotelGroup) {
        foreach ($hotelGroup['client_communication_hotels'] as $hotel) {

            $day = (int) $hotel['day_count'];

            // ⭐ Add hotel_type_name inside hotel array
            $hotelsByDay[$day][] = [
                'hotel_id'        => $hotel['hotel_id'],
                'hotel_name'      => $hotel['hotel_name'] ?? '',
              	'room_name'      => $hotel['room_name'] ?? '',
                'hotel_type_id'   => $hotel['hotel_type_id'] ?? null,
                'hotel_type_name' => $hotelGroup['hotel_type_name'] ?? '',  // <-- ADDED
                'day_count'       => $hotel['day_count']
            ];
        }
    }

    // 4. Group cities by day_count
    $citiesByDay = [];
    foreach ($dayPlanData as $dp) {
        $citiesByDay[$dp->day_count][] = $dp;
    }

    // 5. Build final output
    $dayPlanDataArray = [];

    foreach ($dayPlanData as $dayPlan) {

        $day = $dayPlan->day_count;
        $cities = $citiesByDay[$day];

        // Check if this is last city for this day
        $isLastCity = end($cities)->id == $dayPlan->id;

        $dayPlanDataArray[] = [
            'id' => $dayPlan->id,
            'client_communication_tour_id' => $dayPlan->client_communication_tour_id,
            'day_count' => $day,
            'day_order_sequence' => $dayPlan->day_order_sequence,
            'day_title' => $dayPlan->name,
            'city_id' => $dayPlan->city_id,
            'city_name' => $dayPlan->tbls_city->city_name ?? '',
            'descriptions' => $dayPlan->client_communication_tour_day_plan_descriptions[0]->description ?? '',

            // ⭐ Only last city gets hotels
            'hotels' => $isLastCity ? ($hotelsByDay[$day] ?? []) : []
        ];
    }

    return $dayPlanDataArray;
}

    private function getTourInclusionExclusion(int $clientCommunicationTourId)
    {
        $table = $this->fetchTable('ClientCommunicationTourInclusionExclusion');
        $data = $table->find()
        ->where(['client_communication_tour_id' => $clientCommunicationTourId])
        ->contain(['TblsInclusionExclusion'])
        ->order(['inc_exc_type' => 'ASC'])
        ->toArray();
        $data = json_decode(json_encode($data), true);
        $output = ['inclusion' => [], 'exclusion' => []];
        foreach ($data as $row) {
            if ($row['inc_exc_type'] == 'inclusion') {
                $output['inclusion'][] = ['id' => $row['id'], 'inclusion_exclusion_id' => $row['inclusion_exclusion_id'], 'order_sequence' => $row['order_sequence'], 'detail' => $row['tbls_inclusion_exclusion']['incexcdesc'] ?? null];
            } else {
                $output['exclusion'][] = ['id' => $row['id'], 'inclusion_exclusion_id' => $row['inclusion_exclusion_id'], 'order_sequence' => $row['order_sequence'], 'detail' => $row['tbls_inclusion_exclusion']['incexcdesc'] ?? null];
            }
        } 
        //echo "<pre>"; //print_r($output);exit; 
        return $output; 
    }
  
  
public function copyPage(string $token = ''): void
{
    $this->viewBuilder()->enableAutoLayout(false);

    $tourData = $this->getTourData(['token' => $token]);

    $this->set([
        'tourData' => $tourData,
        'token'    => $token,
        'saveUrl'  => $this->request->getAttribute('webroot') . 'tours/save-pdf/' . $token,
    ]);

    $this->render('pdf/pdf_version7_editable');
}

// ──────────────────────────────────────────
// 2.  POST  /tours/save-pdf/{token}
//     Receives edited form data  renders plain HTML  converts to PDF → sends file.
// ──────────────────────────────────────────
public function savePdf(string $token = '')
{
    $this->autoRender = false;

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    ini_set('error_log', 'c:\wamp64\logs\pdf_debug.log');

    while (ob_get_level()) {
        ob_end_clean();
    }

    $this->request->allowMethod(['post']);

    // CKEditor HTML
    $editedHtml = $this->request->getData('html_content');

    if (empty($editedHtml)) {
        exit('HTML content empty');
    }

    // Tour data
    $tourData = $this->getTourData([
        'token' => $token
    ]);

    // Pass edited HTML
    $tourData['edited_html'] = $editedHtml;

    // Create CakePHP View
    $view = new View($this->request, $this->response, null);

    $view->disableAutoLayout();

    $view->set(compact('tourData'));

    // IMPORTANT
    $view->setTemplatePath('Tours/pdf');

    $view->setTemplate('pdf_download');

    // Render template
    $html = $view->render();

    require ROOT . DS . 'vendor' . DS . 'autoload.php';

    $currentDate = strtoupper(date('d/M/Y'));
    
    // Configure header and footer for Browsershot
    $headerHtml = '<div></div>';
    
    $partnerFooter = '';
    $parts = explode('<footer class="footer">', $html);
    if (count($parts) > 1) {
        $footerInner = explode('</footer>', $parts[1])[0];
        $originalFooter = '<footer class="footer">' . $footerInner . '</footer>';
        
        // Remove all footers from the body
        $html = str_replace($originalFooter, '', $html);
        
        // Remove hardcoded page numbers from the HTML
        $html = preg_replace('/<div class="page-no">.*?<\/div>/s', '', $html);
        
        // Inject a single fixed footer into the HTML that will repeat on every printed page
        // Set bottom: 12mm to avoid overlapping with the native PDF page numbers at the very bottom
        $fixedFooter = '<footer style="position: fixed; bottom: 12mm; left: 15mm; right: 15mm; z-index: 1000; background: white; border-top: 1px solid #b8860b; padding-top: 2mm; display: flex; align-items: center; justify-content: space-between;">' . $footerInner . '</footer>';
        
        // Add CSS to fix ugly page breaks and prevent blank pages from sheet margins
        $pageBreakFixes = '<style>@media print { .sheet { margin: 0 !important; border: none !important; } h1, h2, h3, h4, h5, h6, .title, .sub-title, .day-title { page-break-after: avoid !important; } .day, p, tr, td, th, li { page-break-inside: avoid !important; } }</style>';
        
        // Insert right after <body> tag
        $html = preg_replace('/<body.*?>/', '$0' . $fixedFooter . $pageBreakFixes, $html);
        
        // Inject JS to automatically scale down each sheet to perfectly fit exactly one A4 page
        $autoFitScript = "<script>
        window.addEventListener('load', function() {
            var sheets = document.querySelectorAll('.sheet');
            sheets.forEach(function(sheet) {
                var a4Height = Math.floor(sheet.offsetWidth * (297 / 210)) - 1; 
                
                var inner = document.createElement('div');
                inner.style.transformOrigin = 'top left';
                while (sheet.firstChild) {
                    inner.appendChild(sheet.firstChild);
                }
                sheet.appendChild(inner);
                
                var style = window.getComputedStyle(sheet);
                var paddingTop = parseFloat(style.paddingTop);
                var paddingBottom = parseFloat(style.paddingBottom);
                var availableHeight = a4Height - paddingTop - paddingBottom;
                
                var scale = 1.0;
                while (true) {
                    inner.style.width = (100 / scale) + '%';
                    var currentHeight = inner.scrollHeight;
                    if ((currentHeight * scale) <= availableHeight || scale <= 0.4) {
                        break;
                    }
                    scale -= 0.01;
                }
                
                inner.style.transform = 'scale(' + scale + ')';
                
                sheet.style.height = a4Height + 'px';
                sheet.style.minHeight = a4Height + 'px';
                sheet.style.maxHeight = a4Height + 'px';
                sheet.style.overflow = 'hidden';
            });
        });
        </script>";
        $html .= $autoFitScript;
    }

    $footerHtml = '
    <div style="font-size: 8px; width: 100%; font-family: Arial, sans-serif; display: flex; justify-content: space-between; padding: 0 15mm 10mm 15mm; color: #17345f;">
        <div>Page <span class="pageNumber"></span> of <span class="totalPages"></span></div>
        <div>' . $currentDate . '</div>
    </div>';

    // Generate PDF using Browsershot
    // Using absolute paths for node and npm so WAMP doesn't fail
    try {
        $browsershot = Browsershot::html($html);

        if (PHP_OS_FAMILY === 'Windows') {
            $browsershot->setNodeBinary('C:\Program Files\nodejs\node.exe')
                ->setNpmBinary('C:\Program Files\nodejs\npm.cmd')
                ->setChromePath('C:\Program Files\Google\Chrome\Application\chrome.exe');
        } else {
            $browsershot->noSandbox();
        }

        $pdfOutput = $browsershot->format('A4')
            ->showBackground()
            ->margins(0, 0, 0, 0)
            ->showBrowserHeaderAndFooter()
            ->headerHtml($headerHtml)
            ->footerHtml($footerHtml)
            ->pdf();

        return $this->response
            ->withType('application/pdf')
            ->withHeader(
                'Content-Disposition',
                'attachment; filename="tour-pdf.pdf"'
            )
            ->withStringBody($pdfOutput);

    } catch (\Exception $e) {
        // Return the actual error message so we can debug on production
        return $this->response
            ->withType('text/plain')
            ->withStringBody("PDF Generation Failed:\n\n" . $e->getMessage());
    }
}


  
}

