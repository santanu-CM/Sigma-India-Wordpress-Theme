<?php
/**
 * The template for displaying archive pages
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
                <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Blog</a></li> <!-- Back to Blog link -->
                <li><?php the_archive_title();?></li>
            </ul>
        </div>
    </div>
</div>
<div class="section__global__wrapp warranty__registration__wrapp">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <h2 class="mt-3">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a>
                </h2>
                <?php the_excerpt(); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <h2>No results found.</h2>
            <p>Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();