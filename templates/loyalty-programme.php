<?php

/**
 * Template Name: Loyalty Programme Page
 */
get_header();
$banner_image = get_field('banner_image');
?>
<div class="body__container__inner">
    <div class="large__block container__fluid__wrap">
        <div class="content__wid740 text__center">
            <h1 class="f__h1 f__uppercase"><?php echo get_field('title'); ?></h1>
        </div>
        <div class="content__wid415 spacing__40">
            <p><?php echo get_field('sub_title'); ?></p>
        </div>
        <div class="btn__wrap__center spacing__56">
            <!--<a href="#myModal" id="cust_btn"><?php echo get_field('sign_up'); ?></a>-->
             <!--<a href="javascript:void(0);" id="cust_btn" data-bs-toggle="modal" data-bs-target="#myModal">-->
            <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo home_url('/my-account/offline-verify/'); ?>">Product Registration For Loyalty Program</a>
            <?php else : ?>
                <a href="<?php echo home_url('/my-account/'); ?>"><?php echo get_field('sign_up'); ?></a>
            <?php endif; ?>
            
        </div>
        <?php if ( ! is_user_logged_in() ) { ?>
            <p class="spacing__24 single__link fit__content align__center">Already a member? <a href="<?php echo home_url('/my-account/'); ?>"><?php echo get_field('sign_in_txt'); ?></a></p>
        <?php } ?>
    </div>
    <div class="large__block container__fluid__wrap">
        <div class="large__panel__grid large__panel__grid__full">
            <div class="content__card">
                <figure>
                    <img src="<?php echo $banner_image['url']; ?>" alt="" />
                </figure>
            </div>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <p class="align__center fit__content f__uppercase">BENEFITS</p>
        <h2 id="loyalty-section" class="f__h2 f__uppercase content__wid760 spacing__40 text__center haver__cl"><?php echo get_field('description'); ?></h2>
        <?php
        $tier_posts = get_posts([
            'post_type'      => 'membership_tier',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ]);

        $tier_order = ['bronze', 'silver', 'gold'];
        $tier_map = [];
        $merged_benefits = [];

        if (!empty($tier_posts)) {
            // Build tier icon map
            foreach ($tier_posts as $tier_post) {
                $slug = strtolower(trim($tier_post->post_title));
                $icon_class = '';
                if ($slug === 'silver') $icon_class = 'silver__icon';
                elseif ($slug === 'gold') $icon_class = 'gold__icon';

                $tier_map[$slug] = [
                    'name'       => strtoupper($tier_post->post_title),
                    'icon_class' => $icon_class,
                ];
            }

            // Merge benefits from all tiers
            foreach ($tier_posts as $tier_post) {
                $tier_name = strtolower(trim($tier_post->post_title)); // bronze, silver, gold
                $benefits = get_post_meta($tier_post->ID, 'benefits', true);

                if (!empty($benefits) && is_array($benefits)) {
                    foreach ($benefits as $benefit) {
                        $title = trim($benefit['title'] ?? '');
                        if (!$title) continue;

                        if (!isset($merged_benefits[$title])) {
                            $merged_benefits[$title] = [
                                'title'  => $title,
                                'bronze' => '-',
                                'silver' => '-',
                                'gold'   => '-',
                            ];
                        }

                        foreach (['bronze', 'silver', 'gold'] as $tier) {
                            if (!empty($benefit[$tier]) && $merged_benefits[$title][$tier] === '-') {
                                $merged_benefits[$title][$tier] = $benefit[$tier];
                            }
                        }
                    }
                }
            }


        ?>

            <div class="table__wrapp">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead__dark">
                            <tr>
                                <th scope="col">BENEFITS</th>
                                <?php foreach ($tier_order as $tier_slug): ?>
                                    <?php if (isset($tier_map[$tier_slug])): ?>
                                        <th scope="col">
                                            <i class="icon__box <?php echo esc_attr($tier_map[$tier_slug]['icon_class']); ?>"></i>
                                            <?php echo esc_html($tier_map[$tier_slug]['name']); ?>
                                        </th>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody class="table__body">
                            <?php foreach ($merged_benefits as $benefit): ?>
                                <tr>
                                    <td scope="col"><?php echo esc_html($benefit['title']); ?></td>
                                    <?php foreach ($tier_order as $tier): ?>
                                        <td scope="col"><?php echo esc_html($benefit[$tier]); ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php } ?>

        <div class="btn__wrap__center spacing__64">
            <a href="<?php echo get_field('tmc_link'); ?>"><?php echo get_field('tmc_txt'); ?></a>
        </div>
    </div>
    <div class="large__block container__fluid__wrap">
        <h2 class="f__h2 f__uppercase content__wid740 text__center"><?php //echo get_field('description'); ?></h2>
        <?php if (have_rows('impression_repeater')) : ?>
            <div class="large__panel__grid spacing__64">
                <?php while (have_rows('impression_repeater')) : the_row();
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $sub_title = get_sub_field('sub_title');
                    $learn_button_txt = get_sub_field('learn_button_txt');
                    $btn_link = get_sub_field('btn_link');
                ?>
                    <div class="content__card no__spacing">
                        <?php if ($image) : ?>
                            <figure>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: ''); ?>">
                            </figure>
                        <?php endif; ?>

                        <?php if ($title) : ?>
                            <p class="single__link fit__content spacing__16"><?php echo esc_html($title); ?></p>
                        <?php endif; ?>

                        <?php if ($sub_title) : ?>
                            <p class="spacing__24 f__uppercase content__wid310"><?php echo esc_html($sub_title); ?></p>
                        <?php endif; ?>

                        <?php if ($learn_button_txt && $btn_link) : ?>
                            <p class="single__link fit__content spacing__24 f__uppercase">
                                <a href="<?php echo esc_url($btn_link); ?>"><?php echo esc_html($learn_button_txt); ?></a>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>

</div>
<div class="modal fade modal__main" id="myModal" role="dialog">
    <div class="modal-dialog modal__dialog">
        <div class="modal-content modal__content">
            <div class="modal-body modal__body">
                <h4><?php echo get_field('popup_title'); ?></h4>
                <p><?php echo get_field('popup_description'); ?></p>
                <div class="form__wrapp">
                    <?php echo do_shortcode('[contact-form-7 id="483fa74" title="BF Camera Pre-book"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>