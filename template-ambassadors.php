<?php
/**
 * Template Name: Ambassador
 */


get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/ambassador', 'banner-section');
get_template_part('template-parts/ambassador', 'sigma-ambassadors-details-section');

?>

<?php 
endwhile;
endif;
get_footer();
?>
