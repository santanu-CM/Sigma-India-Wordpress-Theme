<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php
$footer_field_content = get_field('footer_field_content','option');
?>

<footer>
    <div class="container">
        <div class="footer__top__widgets">
            <div class="widget__col">
                <div class="widget__col__inner">
                    <?php if(!empty($footer_field_content['footter_logo'])):?>
                    <img src="<?php echo esc_url($footer_field_content['footter_logo']);?>" alt="" />
                    <?php endif;?>
                    <p>SIGMA lenses are renowned for their exceptional optical performance, precision craftsmanship, and
                        versatility.</p>
                </div>
            </div>
            <div class="widget__col">
                <div class="widget__col__inner">
                    <?php if(!empty($footer_field_content['learn_title'])):?>
                    <h3><?php echo esc_html($footer_field_content['learn_title']);?></h3>
                    <?php endif;?>
                    <ul>
                        <?php
                          wp_nav_menu(array('theme_location' => 'secondary', 'menu_class' => ''));
                    ?>
                    </ul>
                </div>
                <div class="widget__col__inner">
                    <?php if(!empty($footer_field_content['customer_service_title'])):?>
                    <h3><?php echo esc_html($footer_field_content['customer_service_title']);?></h3>
                    <?php endif;?>
                    <ul>
                        <?php
                          wp_nav_menu(array('theme_location' => 'third', 'menu_class' => ''));
                    ?>
                    </ul>
                </div>
            </div>
            <div class="widget__col">
                <div class="widget__col__inner">
                    <?php if(!empty($footer_field_content['help_support_title'])):?>
                    <h3><?php echo esc_html($footer_field_content['help_support_title']);?></h3>
                    <?php endif;?>
                    <ul>
                        <?php
                          wp_nav_menu(array('theme_location' => 'fourth', 'menu_class' => ''));
                    ?>
                    </ul>
                </div>
                <div class="widget__col__inner">
                    <?php if(!empty($footer_field_content['quick_links_title'])):?>
                    <h3><?php echo esc_html($footer_field_content['quick_links_title']);?></h3>
                    <?php endif;?>
                    <ul>
                        <?php
                          wp_nav_menu(array('theme_location' => 'fifth', 'menu_class' => ''));
                    ?>
                    </ul>
                </div>
            </div>
            <div class="widget__col widget__col__mailing__list">
                <div class="widget__col__inner">
                    <?php if(!empty($footer_field_content['subscribe_now_title'])):?>
                    <h3><?php echo $footer_field_content['subscribe_now_title'];?></h3>
                    <?php endif;?>
                    <?php if(!empty($footer_field_content['subscribe_now_content'])):?>
                    <?php echo apply_filters('the_content',$footer_field_content['subscribe_now_content'] );?>
                    <?php endif;?>
                    <div class="btn__wrapp">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#signupmodal">Sign up for SIGMA
                            Newsletter</a>
                    </div>
                </div>
                <div class="widget__col__inner">
                    <div class="widget__col__solcial">
                        <h3>Get social</h3>
                        <ul>
                            <?php if(!empty($footer_field_content['social_details'])):?>
                            <?php foreach($footer_field_content['social_details'] as $listing):?>
                            <li>
                                <a href="<?php echo !empty($listing['social_url']) ? $listing['social_url']: '#';?>"
                                    target="_blank">
                                    <i class="icon__box">
                                        <img src="<?php echo $listing['social_image'];?>" alt="" />
                                    </i>
                                </a>
                            </li>
                            <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($footer_field_content['site_copyright'])):?>
    <div class="footer__bottom">
        <p>&copy; <?php echo date("Y");?> <?php echo $footer_field_content['site_copyright'];?></p>
    </div>
    <?php endif;?>
</footer>
<!-- Sidebar Cart Added Start -->
<?php get_template_part( 'custom-cart' ); ?>
<!-- Sidebar Cart Added End -->

<div class="modal fade" id="searchrmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal__dialog">
        <div class="modal-content modal__content">
            <button type="button" class="btn-close btn__close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body modal__body">
                <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="form__wrapp">
                        <div class="form-group form__group">
                            <div class="input-group input__group">
                                <label>
                                    <input type="search" class="search-field form-control form__control"
                                        placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'sigmaindia' ); ?>"
                                        value="<?php echo esc_attr( get_search_query() ); ?>" name="s"
                                        title="<?php _ex( 'Search for:', 'label', 'sigmaindia' ); ?>" required>
                                </label>
                                <button class="submit__btn" type="submit">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search-ico.svg"
                                        alt="<?php echo esc_attr_x( 'Search', 'submit button', 'sigmaindia' ); ?>" />
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="signupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal__dialog">
        <div class="modal-content modal__content">
            <button type="button" class="btn-close btn__close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body modal__body">
                <form>
                    <div class="form__wrapp">
                        <div class="form-group form__group">
                            <label>Sign up now</label>
                            <input class="form-control form__control" type="email" placeholder="Email" />
                            <button class="submit__btn submit__btn__large" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>

</html>