<?php
/**
 * Template Name: Reviews
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>

<?php

get_template_part('template-parts/reviews', 'all-post-section');

?>

<?php 
endwhile;
endif;
get_footer();
?>
