<?php
/**
 * Template Name: Mount Conversion Service
 */

get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/mount', 'conversion-service-banner-section');
get_template_part('template-parts/mount', 'conversion-service-details-section');
get_template_part('template-parts/mount', 'conversion-service-how-it-works-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
