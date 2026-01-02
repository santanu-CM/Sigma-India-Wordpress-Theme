<?php
/**
 * Template Name: Learn
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>

<?php
get_template_part('template-parts/learn', 'banner-section');
get_template_part('template-parts/learn', 'list-section');
get_template_part('template-parts/learn', 'review-post-section');
get_template_part('template-parts/learn', 'recent-blog-section');
get_template_part('template-parts/learn', 'sigma-ambassador-section');
get_template_part('template-parts/learn', 'events-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
