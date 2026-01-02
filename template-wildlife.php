<?php
/**
 * Template Name: Wild Life
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php

get_template_part('template-parts/wildlife', 'main-content-section');

?>

<?php 
endwhile;
endif;
get_footer();
?>
