<section class="w-100 py-4 ">
    <div class="row">
        <div class="col-md-12 border border-1">
			<div class="text-left pt-4">
				<h2 class="fw-semibold fs-4" >
				  <?=$data['faq']['title']?>
				</h2>
				 <p class="text-muted"><?=$data['faq']['description']?></p>
			</div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
			<?php
				$countFaq = 1;
				foreach($data['faq']['faq_list'] as $faq)
				{
					$otherCss = '';
					if($countFaq==1)
					{
						$otherCss = 'show';
					}
			?>
			    <div class="accordion-item">
					<h2 class="accordion-header">
						<button class="accordion-button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$countFaq?>" aria-expanded="false" aria-controls="flush-collapse<?=$countFaq?>">
							<?=$countFaq?>. <?=$faq['question']?>                 
						</button>
					</h2>
                <div id="flush-collapse<?=$countFaq?>" class="accordion-collapse collapse <?=$otherCss?>" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body small">
                   <?=$faq['answer']?>   
				   </div>
                </div>
              </div>
			 <?php
					$countFaq++;
				}
			 ?>
			         
			             
			            
			              
             
            </div>
          </div>

          
        </div>
      </section>