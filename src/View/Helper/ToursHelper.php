<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;
use Cake\ORM\Locator\LocatorAwareTrait;


class ToursHelper extends Helper
{

    public function getTourCityList($tourId="")
    {
		$tblCmsManagetour  =  TableRegistry::getTableLocator()->get('CmsManagetour');
		$tblCmsTourDayPlan  =  TableRegistry::getTableLocator()->get('CmsTourDayPlan');
		$tblSubregion  =  TableRegistry::getTableLocator()->get('TblsSubregion');
		$tblsTourEvents  =  TableRegistry::getTableLocator()->get('TblsTourEvents');
			
		$options["conditions"] = array("CmsManagetour.id"=>$tourId);
		$infoTour = $tblCmsManagetour->find("all",$options)->enableHydration(false)->first();		
		$noOfDays =@$infoTour['tour_duration'];
		
		$cityList = array();
		for($i=1;$i<=$noOfDays;$i++)
		{
			
			// checking for if day is empty
			$tourEvents = array();
			$toptions["conditions"] = array("CmsTourDayPlan.tour_id"=>$tourId,"CmsTourDayPlan.day_count"=>$i);
			$infoTourDays = $tblCmsTourDayPlan->find("all",$toptions)->enableHydration(false)->all()->toList();	
			
			
			if(!empty($infoTourDays))
			{
				
				foreach($infoTourDays as $tourDay)	
				{
					$tourEvents[]=$tourDay['id'];
					//getting city information for each day
					
					//$strsqlSubregion = $this->TblsSubregion->query("select region_location from tbls_subregion where id = (select subregion_id from tbls_tour_events where id=".$tourDay['event_id'].")");
					
					// Get the subregion_id from the tour events table where the id is event_id
					$subregionIdQuery = $tblsTourEvents->find()
						->select(['subregion_id'])
						->where(['id' => $tourDay['event_id']])
						->first();
					
					if ($subregionIdQuery) {
						$subregionId = $subregionIdQuery->subregion_id;

						// Get the region_location from the subregions table where the id is the subregion_id
						$regionLocationQuery = $tblSubregion->find()
							->select(['region_location'])
							->where(['id' => $subregionId])
							->first();

						if ($regionLocationQuery) {
							$regionLocation = $regionLocationQuery->region_location;

							if(!(in_array($regionLocation, $cityList)))
							{
								$cityList[]=$regionLocation;
							}
					
						} else {
							// Handle case where subregion_id does not match any records
						}
					} else {
						// Handle case where tour event id 336 does not match any records
					}		
					
				}
								
			}
					
		}
		
		return $cityList;
		
		
    }

    
}
