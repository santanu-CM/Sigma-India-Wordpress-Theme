<?php get_header(); ?>

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

if (have_posts()):
    while (have_posts()):
        the_post();
?>

<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="text__center">
            <p class="f__ul f__uppercase">News</p>
            <h1 class="f__h2 spacing__32"><?php the_title(); ?></h1>
            
            <p class="f__ul spacing__32">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo esc_html($categories[0]->name) . '<br>';
                }
                echo get_the_date('Y.m.d');
                ?>
            </p>
        </div>
    </div>

    <div class="large__block container__fluid__wrap">
        <div class="c__news__detail">
            <div class="content__width560__pc">
                <?php the_content(); ?>

            </div>
        </div>
    </div>
</div>

<?php
    endwhile;
endif;
get_footer();
