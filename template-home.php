<?php
/**
 * Template Name: Home
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php


get_template_part('template-parts/home', 'banner-section');
get_template_part('template-parts/home', 'discover-sigma-range-section');
get_template_part('template-parts/home', 'featured-section');
get_template_part('template-parts/home', 'made-in-aizu-section');
//get_template_part('template-parts/home', 'new-products-section'); 
get_template_part('template-parts/home', 'latest-review-section'); 
get_template_part('template-parts/home', 'latest-blog-section'); 
?>

<?php 
endwhile;
endif;
get_footer();
?>
