<?php
/**
 * Template Name: Reward Program
 */


get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php
get_template_part('template-parts/reward', 'program-main-content-section');
?>

<?php 
endwhile;
endif;
get_footer();
?>
