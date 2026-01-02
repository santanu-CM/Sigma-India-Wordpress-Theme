<?php
/**
 * Template Name: Service And Support
 */


get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/service', 'and-support-banner-section');
get_template_part('template-parts/service', 'and-support-repair-section');
get_template_part('template-parts/service', 'and-support-featured-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
