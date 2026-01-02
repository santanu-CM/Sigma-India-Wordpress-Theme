<?php
/**
 * Template Name: Terms And Conditions
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>

<?php
get_template_part('template-parts/terms', 'and-conditions-all-content-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
