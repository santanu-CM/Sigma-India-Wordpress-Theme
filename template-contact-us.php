<?php
/**
 * Template Name: Contact Us
 */
get_header();
if (have_posts()):
    while (have_posts()):
        the_post();
?>


<div class="user__info__wrapp container__fluid__wrap">
    <div class="container">
<?php
get_template_part('template-parts/contact', 'us-banner-section');
get_template_part('template-parts/contact', 'us-form-section');
?>
    </div>
</div>


<?php 
endwhile;
endif;
get_footer();
?>