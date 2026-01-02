<?php
/**
 * Template Name: Dealer Network
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/inner', 'banner-section');
get_template_part('template-parts/dealer', 'network-dealer-details-section');
get_template_part('template-parts/dealer', 'network-experience-zone-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
