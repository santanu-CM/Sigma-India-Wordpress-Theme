<?php
/**
 * Template Name: Service Centre
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/inner', 'banner-section');
get_template_part('template-parts/service', 'centre-content-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
