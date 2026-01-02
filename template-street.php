<?php
/**
 * Template Name: Street
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>



<?php

get_template_part('template-parts/street', 'main-content-section');

?>

<?php 
endwhile;
endif;
get_footer();
?>
