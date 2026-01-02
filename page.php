<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<div class="no__bg__banner no__bg__banner__cms">
    <div class="container">
        <div class="breadcrumb__wrapp breadcrumb__wrapp__body">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li><?php the_title();?></li>
            </ul>
        </div>
    </div>
</div>
<div class="section__global__wrapp warranty__registration__wrapp large__block">
    <div class="container">
        <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', 'page' );
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
    </div>
</div>
<?php
//get_sidebar();
get_footer();
