<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
class SeoComponent extends Component
{
	function getSeoTags($data,$sectionCode="")
	{
		$data['description'] = str_replace('"','',str_replace("'","",@$data['description']));
		$metaTags = array();
		switch($sectionCode)
		{
			case 'general':
					if(@$data['image']!="")
					{
						$image = @$data['image'];
					}
					else
					{
						$image = WEBROOT."images/elegantjourneys.png";
					}
					$metaTags = array(
											'meta_title'				=> substr($data['meta_title'],0,120),
											'page_title'				=> substr($data['meta_title'],0,120),
											'meta_description'			=> substr($data['meta_description'],0,300),
											'meta_keyword'				=> @$data['meta_keyword'],
											'canonical_url'				=> $this->getPageUrl(),
											'image'						=> $image,
											"date_published"			=> $data['date_published'].", 2:02:00,+5:30",
											"date_modified"				=> $data['date_modified'].", 2:02:00,+5:30"
								);
				break;
			case 'home':
					if(@$data['image']!="")
					{
						$image = @$data['image'];
					}
					else
					{
						$image = WEBROOT."/img/entrancei.jpg";
					}
					$metaTags = array(
											'metaTitle'				=> substr($data['meta_title'],0,120),
											'pageTitle'				=> substr($data['meta_title'],0,120),
											'metaDescription'		=> substr($data['meta_description'],0,300),
											'metaKeyword'			=> $data['meta_keywords'],
											'canonicalUrl'			=> 'https://www.pw.live',
											'image'					=> $image
								);
				break;
			case 'general_metakeyword':
					if($data['image']!="")
					{
						$image = $data['image'];
					}
					else
					{
						$image = WEBROOT."/img/entrancei.jpg";
					}
					$metaTags = array(
											'metaTitle'				=> substr($data['meta_title'],0,120),
											'pageTitle'				=> substr($data['meta_title'],0,120),
											'metaDescription'		=> substr($data['meta_description'],0,300),
											'metaKeyword'			=> $data['meta_keyword'],
											'canonicalUrl'			=> $this->getPageUrl(),
											'image'					=> $image
								);
				break;
			default:
				  $metaTags = array(
											'metaTitle'				=> '',
											'pageTitle'				=> '',
											'metaDescription'		=> '',
											'metaKeyword'			=> '',
											'ogTitle'				=> '',
											'ogDescription'			=> '',
											'ogKeyword'				=> '',
											'ogImage'				=> '',
											'twitterogTitle'		=> '',
											'twitterDescription'	=> '',
											'twitterKeyword'		=> '',
											'twitterImage'			=> ''
										);
				break;
		}
		return $metaTags;
	}
	function getSchema($data)
	{
		if(@$data['image']=="")
		{
			$data['image']= $this->getDefaultImage();
		}
		if(@$data['headline']=="")
		{
			@$data['headline']= @$data['name'];
		}

		
		
		#### filtering description
		$data['description'] = str_replace('"','',str_replace("'","",@$data['description']));
		
		switch($data['schema_category_type'])
		{
			case 'review':
					$schemaScript = '{
							  "@context": "https://schema.org",
							  "@type": "TravelAgency",
							  "name": "Elegant Journeys",
							  "url": "https://www.elegantjourneys.com/",
							  "address": "D-8/8048 Vasant Kunj, New Delhi, India",
							  "aggregateRating": {
								"@type": "AggregateRating",
								"ratingValue": "4.9",
								"reviewCount": "324"
							  }
							}';
				break;
			case 'website':
					$schemaScript ='{
						  "@context": "https://schema.org",
						  "@type": "WebSite",
						  "url": "https://www.elegantjourneys.com/",
						  "name": "Elegant Journeys"
						}';
				break;
			case 'article':
					if(@$data['author_url']=="")
					{
						$data['author_url'] = WEBROOT;
					}
					$schemaScript = '{
							"@context": "https://schema.org",
							"@type": "Article",
							"mainEntityOfPage": {
							"@type": "WebPage",
							"url": "'.$data['page_url'].'"
							},
							"name": "'.$data['name'].'",
							"headline": "'.$data['headline'].'",
							"description": "'.$data['description'].'",
							"image": {
							"@type": "ImageObject",
							"url": "'.$data['image'].'",
							"width": 700,
							"height": 365
							},
							"author": {
							"@type": "Organization",
							"name": "Elegant Journeys",
							"url": "'.$data['author_url'].'"
							},
							"publisher": {
							"@type": "Organization",
							"name": "Elegant Journeys",
							"logo": {
							  "@type": "ImageObject",
							  "url": "'.WEBROOT.'images/elegantjourneys.png",
							  "width": 180,
							  "height": 81
							}
							},
							"datePublished": "'.$data['date_created'].'T09:00:00+08:00",
							"dateModified": "'.$data['date_modified'].'T11:00:00+08:00"
							}';
				break;
			case 'breadcrumb':
							$schemaScript = '{
							"@context": "https://schema.org",
							"@type": "BreadcrumbList",
							"itemListElement":
							[';
							$breadCrumbElements = '';
							$countBreadCrumbPosition = 1;
							foreach($data['breadcrumbs'] as $breadcrumb)
							{
							if(is_object($breadcrumb))
							{
							$breadcrumbInfo = (array) $breadcrumb;
							}
							else
							{
							$breadcrumbInfo = $breadcrumb;
							}
							if($breadCrumbElements=='')
							{
							$breadCrumbElements = '{
							"@type": "ListItem",
							"position": '.$countBreadCrumbPosition.',
							"name": "'.$breadcrumbInfo['label'].'",
							"item": "'.$breadcrumbInfo['link'].'"
							}';
							}
							else
							{
							$breadCrumbElements = $breadCrumbElements.',
							{
							"@type": "ListItem",
							"position": '.$countBreadCrumbPosition.',
							"name": "'.$breadcrumbInfo['label'].'",
							"item": "'.$breadcrumbInfo['link'].'"
							}';
							}
							$countBreadCrumbPosition++;
							}
							$schemaScript = $schemaScript.$breadCrumbElements;

							$schemaScript = $schemaScript.'	]
							}';
				break;
			case 'organisation':
					$schemaScript = '
								{
								  "@context": "https://schema.org",
								  "@graph": [
									{
									  "@type": "Organization",
									  "name": "Elegant Journeys",
									  "url": "https://www.elegantjourneys.com/",
									  "logo": "https://www.elegantjourneys.com/version2/assets/images/newLogo.png",
									  "image": "https://www.elegantjourneys.com/version2/assets/images/newLogo.png",
									  "sameAs": [
										"https://www.facebook.com/ElegantJourneys",
										"https://www.instagram.com/elegantjourneysindia",
										"https://www.linkedin.com/company/elegant-journeys"
									  ],
									  "contactPoint": {
										"@type": "ContactPoint",
										"telephone": "+91-99100-78975",
										"contactType": "customer service",
										"email": "sales@elegantjourneys.com"
									  },
									  "address": {
										"@type": "PostalAddress",
										"streetAddress": "D-8/8048 Vasant Kunj",
										"addressLocality": "New Delhi",
										"addressRegion": "Delhi",
										"postalCode": "110070",
										"addressCountry": "IN"
									  }
									},
									{
									  "@type": "TravelAgency",
									  "name": "Elegant Journeys",
									  "url": "https://www.elegantjourneys.com/",
									  "image": "https://www.elegantjourneys.com/version2/assets/images/newLogo.png",
									  "address": {
										"@type": "PostalAddress",
										"streetAddress": "D-8/8048 Vasant Kunj",
										"addressLocality": "New Delhi",
										"addressRegion": "Delhi",
										"postalCode": "110070",
										"addressCountry": "IN"
									  },
									  "telephone": "+91-99100-78975",
									  "priceRange": "₹44,894+",
									  "areaServed": ["India", "Bhutan", "Nepal"],
									  "sameAs": [
										"https://www.facebook.com/ElegantJourneys",
										"https://www.instagram.com/elegantjourneysindia",
										"https://www.linkedin.com/company/elegant-journeys"
									  ],
									  "aggregateRating": {
										"@type": "AggregateRating",
										"ratingValue": "4.9",
										"reviewCount": "324"
									  }
									}
								  ]
								}

								';
				break;
			case 'qa_pages':
					$data['question_answer'] =  trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($data['question_answer']))))));
					if($data['question_answer']=="")
					{
						return;
					}
					$schemaScript = '{
								"@context": "http://schema.org",
								"@type": "QAPage",
								"name": "'.$data['question_title'].'",
								"image": [
									"'.$data['image'].'"
								],
								"mainEntity": {
									"@type": "Question",
									"@id": "'.$data['page_url'].'",
									"name": "'.$data['question_title'].'",
									"text": "'.$data['question_title'].'",
									"dateCreated": "'.$data['question_creation_date'].'",
									"answerCount": "1",
									"author": {
										"@type": "Person",
										"name": "Home Tution"
									},
									"acceptedAnswer": {
										"@type": "Answer",
										"upvoteCount": "22",
										"text": "'.$data['question_answer'].'",
										"url": "'.$data['page_url'].'",
										"dateCreated": "'.$data['answer_creation_date'].'",
										"author": {
											"@type": "Person",
											"name": "Home Tution"
										}
									},
									"suggestedAnswer": []
								}
							}';
				break;
			case 'quiz':
							foreach ($data['quiz']['suggested_answer'] as $key=>$row){
								$quizAnswers[]=  '{
									"@type": "Answer",
									"position": '.$key.',
									"encodingFormat": "text/html",
									"text": "'.$row.'",
									"comment": {
										"@type": "Comment",
										"text": "This is a hint about the answer."
								}
								},';
							}
							$schemaQuizInfoDataRaw = (implode("",$quizAnswers));
							$schemaQuizInfoData = substr_replace($schemaQuizInfoDataRaw, "", -1);
							$data = $data['quiz'];
							$schemaQuizInfo = '{
								"@context": "https://schema.org/",
								"@type": "Quiz",
								"name": "'.$data['name'].'",
								"hasPart": {
								"@type": "Question",
								"typicalAgeRange": "",
								"educationalAlignment": [
									{
									"@type": "AlignmentObject",
									"alignmentType": "educationalSubject",
									"targetName": "'.$data['subject'].'"
									},
									{
									"@type": "AlignmentObject",
									"alignmentType": "educationalLevel",
									"targetName": "'.$data['class'].'",
									}
								],
									"about": {
									"@type": "Thing",
									"name": "'.$data['name'].'"
								},
									"educationalLevel": "intermediate",
									"eduQuestionType": "Multiple choice",
									"learningResourceType": "'.$data['resource_type'].'",
									"assesses": "'.$data['subject'].'",
									"name": "",
									"comment": {
										"@type": "Comment",
										"text": "This is a hint about the question."
									},
										"encodingFormat": "text/markdown",
										"text": "'.$data['question'].'",
										"suggestedAnswer": [
											'.$schemaQuizInfoData.'],
										"acceptedAnswer": {
										"@type": "Answer",
										"position": '.$data['accepted_answer'].',
										"encodingFormat": "text/html",
										"text": "'.$data['accepted_answer_position'].'",
										"comment": {
										"@type": "Comment",
										"text": "This is a hint about the answer."
									},
										"answerExplanation": {
										"@type": "Comment",
										"text": "This is a full explanation on how this answer was achieved."
									}
								}
							}
						}';
							$schemaScript = $schemaQuizInfo;
					break;
				case 'faq':
								
								$countQuestion=count($data['faq_list']);
								$countQuestionLoop = 1;
								$schemaScript = '{
										"@context": "https://schema.org",
										"@type": "FAQPage",
										"mainEntity": [';
										foreach($data['faq_list'] as $questionInfo)
										{
										
											if($countQuestion>$countQuestionLoop)
											{
												$schemaScript = $schemaScript.'{
																			"@type": "Question",
																			"name": "'.strip_tags($questionInfo['question']).'",
																			"acceptedAnswer": {
																				"@type": "Answer",
																				"text": "'.strip_tags($questionInfo['answer']).'"
																			}
																	},';
											}
											else
											{
												$schemaScript = $schemaScript.'{
																	"@type": "Question",
																	"name": "'.strip_tags($questionInfo['question']).'",
																	"acceptedAnswer": {
																		"@type": "Answer",
																		"text": "'.strip_tags($questionInfo['answer']).'"
																	}
															}';
											}

											$countQuestionLoop++;
										}
										$schemaScript = $schemaScript.']
									}';
						break;
				case 'job_card':
									$schemaScript = '{
								  "@context": "https://schema.org/",
								  "@type": "JobPosting",
								  "title": "'.$data['job_title'].'",
								  "datePosted": "'.$data['job_posting_date'].'",
								  "validThrough": "'.$data['job_valid_through'].'",
								  "description": "'.$data['job_description'].'",
								  "hiringOrganization": {
								    "@type": "Organization",
								    "name": "home-tution.com",
								    "sameAs": "'.$data['page_url'].'",
								    "logo": "https://www.home-tution.com/version1/assets/images/logo.png"
								  },
								  "jobLocation": {
								    "@type": "Place",
								    "address": {
								      "@type": "PostalAddress",
								      "postalCode": "'.$data['pincode'].'",
								      "streetAddress": "-",
								      "addressCountry": "India",
								      "addressRegion": "'.$data['city'].'",
								      "addressLocality": "'.$data['state'].'"
								    }
								  },
								  "employmentType": "PART_TIME",
								  "baseSalary": {
								    "@type": "MonetaryAmount",
								    "currency": "INR"
								  },
								  "jobLocationType": ""
								}';
				 	break;
					case 'local_business':
							$schemaScript = '{
																  "@context": "https://schema.org/",
																  "@type": "LocalBusiness",
																  "name": "'.$data['name'].'",
																  "address": {
																    "@type": "PostalAddress",
																    "addressLocality": "'.$data['city'].'"
																  },
																  "image": "https://www.home-tution.com/version1/assets/images/logo.png",
																  "url": "'.$data['page_url'].'",
																  "description": "'.$data['description'].'"
																}';
						break;
					case 'tourist_trip':
							$schemaScript = '{
								  "@context": "https://schema.org",
								  "@type": "TouristTrip",
								  "name": "'.$data['name'].'",
								  "description": "'.$data['description'].'",
								  "image": "'.$data['image'].'",
								  "touristType": ["Couples", "Families", "Solo Travelers", "Groups"],
								  "itinerary": [';
								   $countCity = 1;
								   foreach($data['cities'] as $city)
								   {
									   if($countCity==1)
									   {
										   $schemaScript = $schemaScript.'{ "@type": "Place", "name": "'.$city.', India" }';
									   }
									   else
									   {
											$schemaScript = $schemaScript.',{ "@type": "Place", "name": "'.$city.', India" }';
									   }
									   $countCity++;
								   }
								  $schemaScript = $schemaScript.'],
								  "offers": {
									"@type": "Offer",
									"priceCurrency": "'.$data['currency'].'",
									"price": "'.$data['price'].'",
									"url": "'.$data['page_url'].'",
									"availability": "https://schema.org/InStock"
								  },
								 
								  "provider": {
									"@type": "TouristInformationCenter",
									"name": "Elegant Journeys",
									"url": "https://www.elegantjourneys.com",
									"logo": "https://www.elegantjourneys.com/version2/assets/images/newLogo.png_small.png",
									"address": {
									  "@type": "PostalAddress",
									  "addressCountry": "IN"
									}
								  }
								}';
						
						break;
					case 'video_object_list':
								$schemaScript = '{
								  "@context": "https://schema.org",
								  "@graph": [';
								  $countVideos = 1;
								  foreach($data['videos'] as $video)
								  {
									
									 if($countVideos==1)
									 {
										$schemaScript = $schemaScript.'{
											  "@type": "VideoObject",
											  "name": "'.$video['name'].'",
											  "description": "'.$video['description'].'",
											  "thumbnailUrl": "'.$video['thumbnail_url'].'",
											  "uploadDate": "'.$video['upload_date'].' T08:00:00+08:00",
											  "duration": "PT'.$video['duration_minute'].'M'.$video['duration_second'].'S",
											  "contentUrl": "'.$video['video_url'].'",
											  "embedUrl": "'.$video['video_url'].'"
											}';
									 }
									 else
									 {
										$schemaScript = $schemaScript.',{
											  "@type": "VideoObject",
											  "name": "'.$video['name'].'",
											  "description": "'.$video['description'].'",
											  "thumbnailUrl": "'.$video['thumbnail_url'].'",
											  "uploadDate": "'.$video['upload_date'].' T08:00:00+08:00",
											  "duration": "PT'.$video['duration_minute'].'M'.$video['duration_second'].'S",
											  "contentUrl": "'.$video['video_url'].'",
											  "embedUrl": "'.$video['video_url'].'"
											}';
										 
									 }
									 $countVideos++;
								  }
									
								$schemaScript = $schemaScript.'  ]
								}';
					
						break;
					case 'review_list':
							$schemaScript = '{
										  "@context": "https://schema.org",
										  "@type": "ItemList",
										  "name": "Customer Reviews – Elegant Journeys",
										  "url": "https://www.elegantjourneys.com/tripadvisor-review",
										  "itemListElement": [';
										  
										  $countReviews = 1;
										  foreach($data['reviews'] as $review)
										  {
											  if($countReviews==1)
											  {
													$schemaScript = $schemaScript.'{
																		  "@type": "ListItem",
																		  "position": 1,
																		  "item": {
																			"@type": "Review",
																			"author": {
																			  "@type": "Person",
																			  "name": "Elizabeth R"
																			},
																			"datePublished": "2025-08-15",
																			"reviewBody": "Visiting India was a lifelong dream. A friend recommended Elegant Journeys and our high expectations were exceeded. Mr. Vivek Wadhawan is extremely responsive to requests and organizes incredible, customized trips. The positive difference between a private trip like this (at your own pace, in your own comfortable car) and a big tour cannot be overemphasized. As a mother-daughter pair, the itinerary was perfection, the guides knowledgeable, and the Oberoi accommodations beyond wonderful. We felt safe and comfortable throughout, and it was wonderful to have the freedom to make adjustments on the fly as our interests evolved. We appreciated how Vivek arranged for us female guides in two cities who provided helpful perspectives on this dynamic country. Special thanks to our wonderful and skilled driver, Mr. Yoginder, who took such good care of us for days on end and answered our many questions – he is a gem. You will be very happy with the careful attention to detail that the entire Elegant Journeys team puts into their work. We have incredible memories. Highly recommend!"
																		  }
																		}';
												  
											  }
											  else
											  {
													$schemaScript = $schemaScript.',{
																		  "@type": "ListItem",
																		  "position": 1,
																		  "item": {
																			"@type": "Review",
																			"author": {
																			  "@type": "Person",
																			  "name": "Elizabeth R"
																			},
																			"datePublished": "2025-08-15",
																			"reviewBody": "Visiting India was a lifelong dream. A friend recommended Elegant Journeys and our high expectations were exceeded. Mr. Vivek Wadhawan is extremely responsive to requests and organizes incredible, customized trips. The positive difference between a private trip like this (at your own pace, in your own comfortable car) and a big tour cannot be overemphasized. As a mother-daughter pair, the itinerary was perfection, the guides knowledgeable, and the Oberoi accommodations beyond wonderful. We felt safe and comfortable throughout, and it was wonderful to have the freedom to make adjustments on the fly as our interests evolved. We appreciated how Vivek arranged for us female guides in two cities who provided helpful perspectives on this dynamic country. Special thanks to our wonderful and skilled driver, Mr. Yoginder, who took such good care of us for days on end and answered our many questions – he is a gem. You will be very happy with the careful attention to detail that the entire Elegant Journeys team puts into their work. We have incredible memories. Highly recommend!"
																		  }
																		}';
											  }
											  $countReviews++;
										  }
											
											/* Add more ListItem reviews as needed */
										  $schemaScript = $schemaScript.']
										}';
						
						break;
					case 'product_services':
							$schemaScript = '{
												  "@context": "https://schema.org",
												  "@type": ["Product", "Service"],
												  "name": "'.$data['name'].'",
												  "description": "'.$data['description'].'",
												  "image": "'.$data['image'].'",
												  "offers": {
													"@type": "Offer",
													"price": "'.$data['tour_price'].'",
													"priceCurrency": "'.$data['currency'].'",
													"availability": "https://schema.org/InStock",
													"url": "'.$data['page_url'].'",
													"priceValidUntil": "2025-12-31",
													"hasMerchantReturnPolicy": {
														  "@type": "MerchantReturnPolicy",
														  "applicableCountry": "IN",
														  "returnPolicyCategory": "https://schema.org/MerchantReturnFiniteReturnWindow",
														  "merchantReturnDays": 15,
														  "returnMethod": "https://schema.org/ReturnByMail",
														  "returnFees": "https://schema.org/FreeReturn",
														  "url": "https://www.elegantjourneys.com/refund-and-cancellation"
														},
													 "shippingDetails": {
															  "@type": "OfferShippingDetails",
															  "shippingDestination": {
																"@type": "DefinedRegion",
																"addressCountry": "IN"
															  },
															  "deliveryTime": {
																"@type": "ShippingDeliveryTime",
																"handlingTime": {
																  "@type": "QuantitativeValue",
																  "minValue": 0,
																  "maxValue": 1,
																  "unitCode": "DAY"
																},
																"transitTime": {
																  "@type": "QuantitativeValue",
																  "minValue": 0,
																  "maxValue": 2,
																  "unitCode": "DAY"
																}
															  },
															  "shippingRate": {
																"@type": "MonetaryAmount",
																"value": "0.00",
																"currency": "'.$data['currency'].'"
															  }
															}
												  },
												  "aggregateRating": {
														"@type": "AggregateRating",
														"ratingValue": "4.9",
														"bestRating": "5",
														"reviewCount": "22"
													  },
												"hasMerchantReturnPolicy": {
															  "@type": "MerchantReturnPolicy",
															  "url": "https://www.elegantjourneys.com/terms-and-conditions"
															},
												  "shippingDestination": {
															"@type": "DefinedRegion",
															"addressCountry": "IN"
														  },
												"shippingDetails": {
														  "@type": "OfferShippingDetails",
														  "shippingRate": {
															"@type": "MonetaryAmount",
															"value": 0,
															"currency": "INR"
														  }
													}
												}';
						break;
					case 'tour_item_list':
							$schemaScript = '{
								  "@context": "https://schema.org",
								  "@type": "ItemList",
								  "name": "Luxury Tour Offers – Elegant Journeys",
								  "description": "A collection of luxury Golden Triangle and Rajasthan tour packages ranging from 3 to 15 days with Udaipur, Varanasi, Ranthambore & more.",
								  "url": "https://www.elegantjourneys.com/tours-luxury-offers",
								  "numberOfItems": 3,
								  "itemListOrder": "ItemListOrderAscending",
								  "itemListElement": [
									{
									  "@type": "ListItem",
									  "position": 1,
									  "url": "https://www.elegantjourneys.com/tours-luxury-offers/luxury-3-day-golden-triangle",
									  "item": {
										"@type": "TouristTrip",
										"name": "3 Day Golden Triangle Luxury Tour",
										"description": "Private 3-day Delhi, Agra & Jaipur tour with luxury accommodations.",
										"offers": {
										  "@type": "Offer",
										  "price": "75000",
										  "priceCurrency": "INR",
										  "availability": "https://schema.org/InStock",
										  "url": "https://www.elegantjourneys.com/tours-luxury-offers/luxury-3-day-golden-triangle"
										}
									  }
									},
									{
									  "@type": "ListItem",
									  "position": 2,
									  "url": "https://www.elegantjourneys.com/tours-luxury-offers/luxury-8-day-golden-triangle-udaipur",
									  "item": {
										"@type": "TouristTrip",
										"name": "8 Day Golden Triangle with Udaipur",
										"description": "Delhi, Agra, Jaipur & Udaipur luxury tour with private guide and stays.",
										"offers": {
										  "@type": "Offer",
										  "price": "185000",
										  "priceCurrency": "INR",
										  "availability": "https://schema.org/InStock",
										  "url": "https://www.elegantjourneys.com/tours-luxury-offers/luxury-8-day-golden-triangle-udaipur"
										}
									  }
									},
									{
									  "@type": "ListItem",
									  "position": 3,
									  "url": "https://www.elegantjourneys.com/tours-luxury-offers/luxury-12-day-golden-triangle-ranthambore",
									  "item": {
										"@type": "TouristTrip",
										"name": "12 Day Golden Triangle with Ranthambore",
										"description": "Luxury tour covering Delhi, Agra, Jaipur & Ranthambore National Park.",
										"offers": {
										  "@type": "Offer",
										  "price": "245000",
										  "priceCurrency": "INR",
										  "availability": "https://schema.org/InStock",
										  "url": "https://www.elegantjourneys.com/tours-luxury-offers/luxury-12-day-golden-triangle-ranthambore"
										}
									  }
									}
								  ]
								}';
						
						break;
					case 'video_single_testimonial_tour':
							$schemaScript = '{
												  "@context": "https://schema.org",
												  "@type": "VideoObject",
												  "name": "Customer Testimonial – '.$data['tour_name'].'",
												  "description": "A valued guest shares their experience on the '.str_replace("Tour","",$data['tour_name']).' by Elegant Journeys. Listen to authentic feedback about visiting Delhi, Agra, Ranthambore National Park, and Jaipur, highlighting seamless travel, expert guidance, and memorable cultural encounters.",
												  "thumbnailUrl": "'.$data['thumbnail_url'].'",
												  "uploadDate": "'.$data['upload_date'].' T08:00:00+08:00",
												  "duration": "PT'.$data['duration_minute'].'M'.$data['duration_second'].'S",
												  "contentUrl": "'.$data['page_url'].'",
												  "embedUrl": "'.$data['video_url'].'",
												  "publisher": {
													"@type": "Organization",
													"name": "Elegant Journeys",
													"logo": {
													  "@type": "ImageObject",
													  "url": "https://www.elegantjourneys.com/version2/assets/images/new-logo.png"
													}
												  }
												}';
						break;
					case 'single_client_testimonial':
							$schemaScript = '{
												  "@context": "https://schema.org",
												  "@type": "Review",
												  "author": {
													"@type": "Person",
													"name": "'.$data['reviewer_name'].'"
												  },
												  "datePublished": "'.$data['review_date'].'",
												  "reviewBody": "'.$data['review_description'].'",
												  "reviewRating": {
													"@type": "Rating",
													"ratingValue": "'.$data['review_rating'].'",
													"bestRating": "'.$data['review_rating'].'"
												  },
												  "itemReviewed": {
													"@type": "Organization",
													"name": "Elegant Journeys"
												  }
											}';
						break;
					case 'single_client_trip_testimonial':
							$schemaScript = '{
												  "@context": "https://schema.org",
												  "@type": "Review",
												  "author": {
													"@type": "Person",
													"name": "'.$data['reviewer_name'].'"
												  },
												  "datePublished": "'.$data['review_date'].'",
												  "reviewBody": "'.$data['review_description'].'",
												  "reviewRating": {
													"@type": "Rating",
													"ratingValue": "'.$data['review_rating'].'",
													"bestRating": "'.$data['review_rating'].'"
												  },
												  "itemReviewed": {
													"@type": "TravelAgency",
													"name": "Elegant Journeys",
													"address": "D-8/8048 Vasant Kunj, New Delhi, India"
												  }
											}';
						break;
		}
		
		return $schemaScript;
	}
	function getPageUrl()
	{
		$pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return $pageUrl;
	}
	function getDefaultImage()
	{
		return 'https://www.home-tution.com/img/home-tution.jpg';
	}
}
?>
