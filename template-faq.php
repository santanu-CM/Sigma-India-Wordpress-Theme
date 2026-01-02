<?php
/**
 * Template Name: FAQ
 */


get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/faq', 'all-content-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
