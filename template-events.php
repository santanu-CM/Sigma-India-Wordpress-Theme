<?php
/**
 * Template Name: Events
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/events', 'banner-section');
get_template_part('template-parts/events', 'details-content-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
