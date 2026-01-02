<?php
/**
 * Template Name: Firmware Updates
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>

<?php

get_template_part('template-parts/firmware', 'updates-all-post-section');

?>

<?php 
endwhile;
endif;
get_footer();
?>
