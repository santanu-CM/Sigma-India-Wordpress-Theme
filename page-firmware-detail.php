<?php

/**
 * Template Name: Firmware Detail
 */
get_header();
$product_id = isset($_GET['product_id']) ? (int) $_GET['product_id'] : 0;
$mount_param = isset($_GET['mount']) ? sanitize_text_field(urldecode($_GET['mount'])) : '';
echo $mount_param;
?>
<div class="body__container__inner">
    <?php
    $product_id = isset($_GET['product_id']) ? (int) $_GET['product_id'] : 0;
    $mount_param = isset($_GET['mount']) ? sanitize_text_field(urldecode($_GET['mount'])) : '';

    if ($product_id && have_rows('firmware_main_page_repeter', $product_id)) {
        while (have_rows('firmware_main_page_repeter', $product_id)) {
            the_row();

            $mount   = get_sub_field('mount_name');
            $version = get_sub_field('version_txt');
            $view    = get_sub_field('view_btn') ?: 'Download';
            $link    = get_sub_field('view_link');

            // New: WYSIWYG tab contents
            $before_windows = get_sub_field('before_updating_window');
            $version_name_window = get_sub_field('version_name_window');
            $version_text_window = get_sub_field('version_text_window');
            $download_txt_window = get_sub_field('download_txt_window');
            $download_btn_link_window = get_sub_field('download_txt_window');
            $update_procedure_txt_window = get_sub_field('update_procedure_txt_window');
            $update_procedure_repeater_window = get_sub_field('update_procedure_repeater_window');
            $download_btn_link_window = get_sub_field('download_btn_link_window');


            //mac
            $version_name = get_sub_field('version_name');
            $version_text = get_sub_field('version_text');
            $download_txt = get_sub_field('download_txt');
            $download_btn_link = get_sub_field('download_txt');
            $update_procedure_txt = get_sub_field('update_procedure_txt');
            $update_procedure_repeater = get_sub_field('update_procedure_repeater');
            $download_btn_link = get_sub_field('download_btn_link');


            $before_mac     = get_sub_field('before_updating');

            if (trim(strtolower($mount)) === trim(strtolower($mount_param))) {
    ?>
                <div class="large__block container__fluid__wrap">
                    <p class="text__center">
                        <a href="#" class="f__uppercase f__ul">Firmware download</a>
                    </p>
                    <h1 class="f__h2 spacing__40 text__center content__wid415">
                        <span class="f__uppercase">Art<br></span>
                        <?php echo esc_html(get_the_title($product_id)); ?> <br>
                        (<?php echo esc_html($mount); ?>)
                    </h1>
                </div>

                <div class="large__block">
                    <div class="nav nav-tabs nav__tabs" id="nav-tab" role="tablist">
                        <button class="nav-link nav__link f__uppercase f__ul active" id="nav-windows-tab" data-bs-toggle="tab" data-bs-target="#nav-windows" type="button" role="tab" aria-controls="nav-windows" aria-selected="true">Windows</button>
                        <button class="nav-link nav__link f__uppercase f__ul" id="nav-mac-tab" data-bs-toggle="tab" data-bs-target="#nav-mac" type="button" role="tab" aria-controls="nav-mac" aria-selected="false">Mac os</button>
                    </div>

                    <div class="tab-content tab__content" id="nav-tabContent">

                        <!-- WINDOWS TAB -->
                        <div class="tab-pane tab__pane fade show active" id="nav-windows" role="tabpanel" aria-labelledby="nav-windows-tab" tabindex="0">
                            <div class="large__block">
                                <div class="l__wid560__pc container__fluid__wrap">

                                    <?php echo $before_windows ?: '<p>No instructions available.</p>'; ?>

                                </div>
                                <div class="large__block l__wid560__pc container__fluid__wrap">
                                    <h2 class="heading__medium f__uppercase text__center"><?php echo $version_name_window; ?></h2>
                                    <div class="m__ul spacing__40">
                                        <?php echo $version_text_window; ?>
                                    </div>
                                    <div class="btn__full__width spacing__40 product__overview__block__body">
                                        <a class="m__btn" href="<?php echo esc_url(get_sub_field('download_btn_link_window')); ?>" target="_blank">
                                            <?php echo esc_html($download_txt_window); ?>
                                        </a>
                                    </div>

                                </div>
                                <div class="large__block container__fluid__wrap">
                                    <h2 class="heading__medium f__uppercase text__center l__wid560__pc"><?php echo $update_procedure_txt_window; ?></h2>
                                    <?php if (have_rows('update_procedure_repeater_window')): ?>
                                        <?php while (have_rows('update_procedure_repeater_window')): the_row();
                                            $text  = get_sub_field('text');
                                            $image = get_sub_field('image');
                                            $image_url = is_array($image) ? $image['url'] : $image;
                                        ?>
                                            <div class="l__grid content__center spacing__40">
                                                <div class="panel__child__4__pc">
                                                    <div>
                                                        <?php if ($text): ?>
                                                            <p><?php echo wp_kses_post($text); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if ($image_url): ?>
                                                    <figure class="spacing__16__sp panel__child__3__pc">
                                                        <img src="<?php echo esc_url($image_url); ?>" alt="">
                                                    </figure>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <!-- MAC TAB -->
                        <div class="tab-pane tab__pane fade" id="nav-mac" role="tabpanel" aria-labelledby="nav-mac-tab" tabindex="0">
                            <div class="large__block">
                                <div class="l__wid560__pc container__fluid__wrap">

                                    <?php echo $before_mac ?: '<p>No instructions available.</p>'; ?>

                                </div>
                                <div class="large__block l__wid560__pc container__fluid__wrap">
                                    <h2 class="heading__medium f__uppercase text__center"><?php echo $version_name; ?></h2>
                                    <div class="m__ul spacing__40">
                                        <?php echo $version_text; ?>
                                    </div>
                                    <div class="btn__full__width spacing__40 product__overview__block__body">
                                        <a class="m__btn" href="<?php echo esc_url(get_sub_field('download_btn_link')); ?>" target="_blank">
                                            <?php echo esc_html($download_txt); ?>
                                        </a>
                                    </div>

                                </div>
                                <div class="large__block container__fluid__wrap">
                                    <h2 class="heading__medium f__uppercase text__center l__wid560__pc"><?php echo $update_procedure_txt; ?></h2>
                                    <?php if (have_rows('update_procedure_repeater')): ?>
                                        <?php
                                        $step = 1;
                                        while (have_rows('update_procedure_repeater')): the_row();
                                            $text      = get_sub_field('text');
                                            $image     = get_sub_field('image');
                                            $image_url = is_array($image) ? $image['url'] : $image;
                                        ?>

                                            <?php if ($image_url): ?>
                                                <!-- With image -->
                                                <div class="l__grid content__center spacing__40">
                                                    <div class="panel__child__4__pc">
                                                        <div>
                                                            <?php if ($text): ?>
                                                                <p><?php echo wp_kses_post($text); ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <figure class="spacing__16__sp panel__child__3__pc">
                                                        <img src="<?php echo esc_url($image_url); ?>" alt="">
                                                    </figure>
                                                </div>
                                            <?php else: ?>
                                                <!-- Without image (step layout) -->
                                                <div class="spacing__40 l__line__7__pc">
                                                <?php echo wp_kses_post($text); ?>
                                                </div>
                                            <?php endif; ?>

                                        <?php
                                            $step++;
                                        endwhile; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    <?php
                break;
            }
        }
    } else {
        echo '<div class="large__block container__fluid__wrap"><p class="text__center">No firmware data found.</p></div>';
    }
    ?>
</div>


<?php get_footer(); ?>