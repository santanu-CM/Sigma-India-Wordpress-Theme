<?php if( have_rows('tabs') ): ?>
    <ul class="nav nav-tabs nav__tabs" id="myTab" role="tablist">
        <?php 
        $tab_index = 0;
        while( have_rows('tabs') ): the_row(); 
            $tab_title = get_sub_field('tab_title');
            $active_class = $tab_index === 0 ? 'active' : ''; 
        ?>
            <li class="nav-item nav__item" role="presentation">
                <button class="nav-link nav__link <?php echo $active_class; ?>" id="tab-item-<?php echo $tab_index; ?>-tab" data-bs-toggle="tab" data-bs-target="#tab-item-<?php echo $tab_index; ?>" type="button" role="tab" aria-controls="tab-item-<?php echo $tab_index; ?>" aria-selected="<?php echo $tab_index === 0 ? 'true' : 'false'; ?>">
                    <?php echo esc_html($tab_title); ?>
                </button>
            </li>
        <?php 
            $tab_index++;
        endwhile; 
        ?>
    </ul>
    
    <div class="tab-content">
        <?php 
        $tab_index = 0;
        while( have_rows('tabs') ): the_row(); 
            $active_class = $tab_index === 0 ? 'show active' : 'fade';
        ?>
            <div class="tab-pane tab__pane <?php echo $active_class; ?>" id="tab-item-<?php echo $tab_index; ?>" role="tabpanel" aria-labelledby="tab-item-<?php echo $tab_index; ?>-tab">
                <?php if( have_rows('accordions') ): ?>
                    <div class="accordion" id="accordionExample-<?php echo $tab_index; ?>">
                        <?php 
                        $accordion_index = 0;
                        while( have_rows('accordions') ): the_row(); 
                            $accordion_title = get_sub_field('accordion_title');
                            $accordion_content = get_sub_field('accordion_content');
                            $collapse_id = 'collapse' . $tab_index . '-' . $accordion_index;
                            $heading_id = 'heading' . $tab_index . '-' . $accordion_index;
                            $accordion_show = $accordion_index === 0 ? 'show' : '';
                            $accordion_collapsed = $accordion_index !== 0 ? 'collapsed' : '';
                        ?>
                            <div class="accordion-item accordion__item">
                                <h2 class="accordion-header accordion__header" id="<?php echo esc_attr($heading_id); ?>">
                                    <button class="accordion-button accordion__button <?php echo $accordion_collapsed; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="<?php echo $accordion_index === 0 ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                        <span><?php echo esc_html($accordion_title); ?></span>
                                    </button>
                                </h2>
                                <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse accordion__collapse collapse <?php echo $accordion_show; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample-<?php echo $tab_index; ?>">
                                    <div class="accordion-body accordion__body">
                                        <p><?php echo wp_kses_post($accordion_content); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            $accordion_index++;
                        endwhile; 
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php 
            $tab_index++;
        endwhile; 
        ?>
    </div>
<?php endif; ?>
