<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<div class="bg__banner">
    <div class="container">
        <div class="title__wrapp">
            <div class="breadcrumb__wrapp breadcrumb__wrapp__body no__mr">
                <ul>
                    <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
            <h3>Blogs</h3>
        </div>
    </div>
</div>
<div class="blog__list__wrapp">
    <div class="container">

        <div class="dropdown my-4">
            <a class="btn btn-secondary dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
               Filter
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php
                // Fetch all categories
                $categories = get_categories(array(
                    'orderby' => 'name',
                    'order'   => 'ASC'
                ));

                // Loop through each category and generate a link to its archive page
                foreach ($categories as $category) {
                    $category_link = get_category_link($category->term_id); // Get the category archive link
                    ?>
                <a class="dropdown-item" href="<?php echo esc_url($category_link); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
                <?php } ?>
            </div>
        </div>

        <div class="list__cards__wrapp">
            <?php
			        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post', 
                        'posts_per_page' => 9, 
						'paged' => $paged,
                    );
                    $posts_query = new WP_Query($args);
                    if ($posts_query->have_posts()) :
                        while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                        
            <div class="list__card">
                <a href="<?php the_permalink(); ?>">
                    <div class="image__box">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
                        <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature-3.png"
                            alt="Default Image" />
                        <?php endif; ?>
                        <div class="blog__meta">
                            <?php echo get_the_date(); ?>
                        </div>
                    </div>
                </a>
                <div class="content__box">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php the_excerpt();?>
                    <div class="btn__wrapp">
                        <a href="<?php the_permalink(); ?>">Read More
                            <i class="ico__box"> <img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/red-arrow.svg"
                                    alt="" /> </i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts at this time.' ); ?></p>
            <?php endif; ?>
        </div>
        <div class="pagination__wrapp">
            <ul class="pagination pagination__list">
                <?php
                        $total_pages = $posts_query->max_num_pages;
                        if ($total_pages > 1) :
                            $current_page = max(1, get_query_var('paged'));

                if ($current_page > 1): ?>
                <li class="page-item page__item">
                    <a href="<?php echo get_pagenum_link($current_page - 1); ?>" aria-label="Previous">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.21238 12.5707C7.92921 12.2598 7.92921 11.7403 8.21238 11.4286L14.7462 4.23618C15.033 3.92127 15.4981 3.92127 15.7842 4.23618C16.071 4.55108 16.071 5.06257 15.7842 5.37748L9.76941 12L15.7849 18.6217C16.0717 18.9374 16.0717 19.4481 15.7849 19.7638C15.4981 20.0787 15.033 20.0787 14.7469 19.7638L8.21238 12.5707Z"
                                fill="#6A6C76" />
                        </svg>
                    </a>
                </li>
                <?php endif;

                            for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item page__item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor;

                            if ($current_page < $total_pages): ?>
                <li class="page-item page__item">
                    <a href="<?php echo get_pagenum_link($current_page + 1); ?>" aria-label="Next">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.7876 12.5707C16.0708 12.2598 16.0708 11.7403 15.7876 11.4286L9.25383 4.23618C8.96702 3.92127 8.50191 3.92127 8.21583 4.23618C7.92903 4.55108 7.92903 5.06257 8.21583 5.37748L14.2306 12L8.2151 18.6217C7.9283 18.9374 7.9283 19.4481 8.2151 19.7638C8.50191 20.0787 8.96702 20.0787 9.2531 19.7638L15.7876 12.5707Z"
                                fill="#6A6C76" />
                        </svg>
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php
get_footer();