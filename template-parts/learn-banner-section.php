<?php
$learn_page_field_content= get_field('learn_page_field_content');
?>
<div class="main__banner inner__banner__main inner__banner__medium">
    <?php if(!empty($learn_page_field_content['banner_image'])):?>
    <div class="image__box">
        <img src="<?php echo $learn_page_field_content['banner_image'];?>" alt="" />
    </div>
    <?php endif;?>
    <div class="bannre__content">
        <div class="container">
            <div class="bannre__content__inner__wrapp">
                <?php if(!empty($learn_page_field_content['banner_title'])):?>
                <h1><?php echo $learn_page_field_content['banner_title'];?></h1>
                <?php endif;?>
                <?php echo apply_filters('the_content',$learn_page_field_content['banner_content'] );?>
				 <div class="btn__wrapp">
				     <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#learnModal">
							<?php echo $learn_page_field_content['banner_label_title'];?>
						</button>
                 </div>
				<!-- Modal Start-->
				<div class="modal fade" id="learnModal" tabindex="-1" aria-labelledby="centeredModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<div class="modal-content">
							<div class="modal-body p-0">
								 <div class="ratio ratio-16x9">
									<video width="750" height="600" controls>
										<source src="<?php echo $learn_page_field_content['banner_video_url']; ?>" type="video/mp4">
									</video>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal End-->
                <div class="btn__wrapp btn__wrapp__scroller">
                    <a href="#start">
                        <div class="sigma__mousey">
                            <div class="sigma__scroller"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



