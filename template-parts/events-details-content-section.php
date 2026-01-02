<div id="start" class="section__global__wrapp">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/'));?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
        <div class="global__heading__wrapp mt-5">
            <h2><?php the_title();?></h2>
        </div>
        <div class="category__filter__wrapp event__filter__wrapp">
            <div class="filter__wrapp">
                <!-- <div class="filter__card">
                    <h3>Filter by type</h3>
                    <div class="form-group form__group">
                        <div class="input__group">
                            <input type="checkbox" id="1">
                            <label for="1">See all</label>
                        </div>
                        <div class="input__group">
                            <input type="checkbox" id="2">
                            <label for="2">Public Events</label>
                        </div>
                        <div class="input__group">
                            <input type="checkbox" id="3">
                            <label for="3">Workshop</label>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
         <?php echo do_shortcode('[events-calendar-templates category="all" template="default" style="style-2" date_format="default" start_date="" end_date="" limit="10" order="ASC" hide-venue="no" socialshare="no" time="all"]');?>
    </div>
</div>