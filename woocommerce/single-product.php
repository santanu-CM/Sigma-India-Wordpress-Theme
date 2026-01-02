<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
global $post;

$specs = get_field('specifications', $post->ID);
$features = get_field('features', $post->ID);
$description = get_field('description', $post->ID);

$specs_field      = get_field_object('specifications', $post->ID);
$features_field   = get_field_object('features', $post->ID);
$description_field = get_field_object('description', $post->ID);
$specs_field = get_field_object('specifications');
$features_field = get_field_object('features');
$description_field = get_field_object('description');

$specs_label      = is_array($specs_field) ? $specs_field['label'] : '';
$features_label   = is_array($features_field) ? $features_field['label'] : '';
$description_label = is_array($description_field) ? $description_field['label'] : '';
$product = wc_get_product($post->ID);
$product = wc_get_product($post->ID);

// Initialize stock availability variable
$api_stock_available = false;

if ($product && is_a($product, 'WC_Product')) {
    $attachment_ids = $product->get_gallery_image_ids();
    $featured_image_id = $product->get_image_id();
    $all_image_ids = $featured_image_id ? array_merge([$featured_image_id], $attachment_ids) : $attachment_ids;
    $product_cats = wp_get_post_terms($post->ID, 'product_cat');
    $category_name = !empty($product_cats) ? $product_cats[0]->name : '';
    $price = $product->get_price();
    $is_in_stock = $product->is_in_stock();
}

$product_description = apply_filters('the_content', get_post_field('post_content', $post->ID));

?>
<style>
    .is-align--left {
        display: none !important;
    }

    .pr__none {
        display: none;
    }
    
    .bulet__list ul{
        list-style: inside;
        line-height: 27px;
        font-size: 14px;
    }
    .bulet__list p {
        margin-bottom: 15px;
        line-height: 22px;
    }
    .f__ul p{
        margin-bottom: 10px;
        font-size: 14px;
        line-height: 20px;
    }
</style>

<div class="body__container__inner">
    <div class="container__fluid__wrap">

        <div class="l__panel__grid panel__2__pc">
            <div class="product__overview__block__img">
                <div class="slider product__slider__content">
                    <?php foreach ($all_image_ids as $image_id): ?>
                        <div class="product__overview__img">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'full')); ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slider slider__thumb">
                    <?php foreach ($all_image_ids as $image_id): ?>
                        <div class="product__overview__img">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'thumbnail')); ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="product__overview__block__body">
                <?php wc_print_notices(); ?>

                <div class="l__panel__grid content__between">
                    <h1 class="heading__medium font">
                        <?php if ($category_name): ?>
                            <span class="f__uppercase font"><?php echo esc_html($category_name); ?></span>
                        <?php endif; ?>
                        <br /><?php echo esc_html($product->get_name()); ?>
                    </h1>
                    <div class="price__product auto__width">
                        <?php echo wp_kses_post($product->get_price_html()); ?>
                    </div>
                </div>

                <?php
                global $post;

                $serial_number = get_field('serial_number', $post->ID);

                if (!$serial_number) {
                    echo '<div class="stock-status" style="color:white; background-color: grey; padding: 8px; border-radius: 4px;width:60%">Serial number not available.</div>';
                } else {
                    $api_url = 'http://sales.shetalastock.com/api/checkStock';

                    $payload = json_encode([
                        "itemName" => $serial_number
                    ]);

                    $args = [
                        'method'  => 'POST',
                        'body'    => $payload,
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'api-key'      => 'zPw9yEgjrMAC99XCObBE1USknQe2LliGf8R0'
                        ],
                        'timeout' => 10,
                    ];

                    $response = wp_remote_post($api_url, $args);

                    if (is_wp_error($response)) {
                        echo '<div class="stock-status" style="color:white; background-color: red; padding: 8px; border-radius: 4px;width:70%">API Error: ' . esc_html($response->get_error_message()) . '</div>';
                    } else {
                        $body = wp_remote_retrieve_body($response);
                        $data = json_decode($body, true);

                        $status = isset($data['responseStatus']) ? intval($data['responseStatus']) : null;
                        $message = isset($data['responseMessage']) ? esc_html($data['responseMessage']) : 'Unknown response';
                        
                        // Set stock availability flag
                        if ($status === 1) {
                            $api_stock_available = true;
                        }
                        
                        // Handle responses
                        switch ($status) {
                            case 1:
                                echo '<div class="stock-status" style="color: green; padding: 8px;"> 
                                 Stock: ' . esc_html($message) . '
                            </div>';
                                break;
                            case 0:
                                echo '<div class="stock-status" style="color:orange;  padding: 8px;"> Stock: ' . esc_html($message) . '</div>';
                                break;
                            case -1:
                            case -2:
                            default:
                                echo '<div class="stock-status" style="color:red; padding: 8px;"> Stock: ' . esc_html($message) . '</div>';
                                break;
                        }
                    }
                }
                
                $terms = get_the_terms(get_the_ID(), 'mount');

                if (!empty($terms) && !is_wp_error($terms)) {
                    echo '<div class="f__ul">';
                    echo '<p>Available mounts</p>';
                    echo '<ul class="f__ul f__uppercase l__grid__mid panel__2__pc panel__2__sp spacing__16">';

                    foreach ($terms as $term) {
                        echo '<li class="spacing__04">' . esc_html($term->name) . '</li>';
                    }

                    echo '</ul>';
                    echo '</div>';
                }
                ?>

                <?php if ($product && $product->is_type('variable')):

                    $available_variations = $product->get_available_variations();
                    foreach ($available_variations as $variation) {
                        $variation_id = $variation['variation_id'];
                        $attributes = [];
                        foreach ($variation['attributes'] as $attr => $value) {
                            $attr_name = str_replace('attribute_', '', $attr);
                            $attributes[$attr_name] = $value;
                        }
                        ksort($attributes);
                        $key = implode('|', array_map(
                            fn($k, $v) => $k . '=' . $v,
                            array_keys($attributes),
                            array_values($attributes)
                        ));
                        $variation_map[$key] = $variation_id;
                    }

                    $attributes = $product->get_variation_attributes();
                    $default_attributes = $product->get_default_attributes();

                    if (!empty($available_variations)) : ?>
                        <p class="f__ul"><?php echo 'Choose a mount to see availability'; ?></p>
                        <form class="variations_form cart"
                            method="post"
                            enctype="multipart/form-data"
                            action="<?php echo esc_url(wc_get_cart_url()); ?>"
                            data-product_id="<?php echo esc_attr($product->get_id()); ?>"
                            data-product_variations='<?php echo wp_json_encode($available_variations); ?>'>

                            <?php foreach ($attributes as $attribute_name => $options) : ?>
                                <ul class="f__ul l__grid__mid panel__2__pc panel__2__sp">
                                    <?php foreach ($options as $option) :
                                        $sanitized_option = sanitize_title($option);
                                        $input_id = esc_attr($attribute_name . '_' . $sanitized_option);
                                        $is_default = isset($default_attributes[$attribute_name]) && $default_attributes[$attribute_name] === $option;
                                        $variation_id = '';
                                    ?>
                                        <li class="product__option__value">
                                            <input type="radio"
                                                id="<?php echo $input_id; ?>"
                                                name="attribute_<?php echo esc_attr(sanitize_title($attribute_name)); ?>"
                                                value="<?php echo esc_attr($option); ?>"
                                                data-id="<?php echo esc_attr($variation_id); ?>"
                                                <?php checked($is_default); ?>
                                                required>
                                            <label for="<?php echo $input_id; ?>"><?php echo esc_html($option); ?></label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endforeach; ?>

                            <div class="single_variation_wrap">
                                <div class="woocommerce-variation single_variation"></div>
                                <div class="woocommerce-variation-add-to-cart variations_button">
                                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
                                    <input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">
                                    <input type="hidden" name="variation_id" class="variation_id" value="">
                                    
                                    <?php if (!$api_stock_available): ?>
                                        <!-- Show "Find a dealer" button when API stock is not available -->
                                        <a class="m__btn" href="https://sigmaindia.in/dealer-network/">Find a dealer</a>
                                    <?php else: ?>
                                        <!-- Show quantity and add to cart when API stock is available -->
                                        <div class="product__quantity">
                                            <button type="button" class="btn__quantity minus__btn">-</button>
                                            <input class="number__quantity qty" type="number" name="quantity" value="1"
                                                min="<?php echo esc_attr($product->get_min_purchase_quantity()); ?>">
                                            <button type="button" class="btn__quantity plus__btn">+</button>
                                        </div>
                                        <button class="m__btn single_add_to_cart_button" type="submit">
                                            <?php echo esc_html($product->single_add_to_cart_text()); ?>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>

                <?php else: // Simple product block ?>
                    <form class="cart woocommerce-cart-form" method="post" enctype="multipart/form-data" action="<?php echo esc_url(get_permalink($product->get_id())); ?>">
                        <div class="woocommerce-variation-add-to-cart variations_button">
                            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" />
                            
                            <?php if (!$api_stock_available): ?>
                                <!-- Show "Find a dealer" button when API stock is not available -->
                                <a class="m__btn" href="https://sigmaindia.in/dealer-network/">Find a dealer</a>
                            <?php else: ?>
                                <!-- Show quantity and add to cart when API stock is available -->
                                <div class="product__quantity">
                                    <button type="button" class="btn__quantity minus__btn">-</button>
                                    <input class="number__quantity qty" type="number" name="quantity" value="1"
                                        min="<?php echo esc_attr($product->get_min_purchase_quantity()); ?>">
                                    <button type="button" class="btn__quantity plus__btn">+</button>
                                </div>
                                <button type="submit" class="m__btn single_add_to_cart_button">
                                    <?php echo esc_html($product->single_add_to_cart_text()); ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    </form>
                <?php endif; ?>

                <div class="f__ul bulet__list">
                    <?php echo $product_description; ?>
                </div>
                <div class="spacing__16">
                    <p><a href="<?php echo 'https://sigmaindia.in/dealer-network/'?>" class="f__uppercase m__txt__link"><?php echo get_field('buy_btn'); ?></a></p>
                </div>
            </div>

        </div>
    </div>
    <?php
    $has_specs = have_rows('specifications', $post->ID);
    $has_features = !empty($features);
    $has_description = !empty($description);

    if ($has_specs || $has_features || $has_description) :
    ?>
        <div class="large__block__color__bg container__fluid__wrap">
        <?php else: ?>
            <div class="large__block__color__bg container__fluid__wrap pr__none">
            <?php endif; ?>
            <div class="l__panel__grid panel__2__pc">
                <div class="product__pec__block__tab">
                    <p class="active f__ul f__uppercase show__single" target="1"><?php echo $specs_label; ?></p>
                    <p class="f__ul f__uppercase show__single" target="2"><?php echo $features_label; ?></p>
                    <p class="f__ul f__uppercase show__single" target="3"><?php echo $description_label; ?></p>
                </div>
                <div class="tab__content__details">
                    <!-- Specifications -->
                    <ul id="content1" class="c__speclist targetcontent">
                        <?php if (have_rows('specifications', $post->ID)) : ?>
                            <?php while (have_rows('specifications', $post->ID)) : the_row(); ?>
                                <?php $spec_label = get_sub_field('label'); ?>
                                <li class="l__panel__grid panel__2">
                                    <?php if (have_rows('label_type')) : ?>
                                        <?php
                                        $first = true;
                                        while (have_rows('label_type')) : the_row();
                                            $type_name = get_sub_field('type_name');
                                            $type_value = get_sub_field('type_value');
                                        ?>
                                            <?php if ($first) : ?>
                                                <div class="panel__grid">
                                                    <p class="f__ul"><?php echo esc_html($spec_label); ?></p>
                                                </div>
                                                <?php $first = false; ?>
                                            <?php endif; ?>

                                            <?php if (!empty($type_name)) : ?>
                                                <div class="panel__grid">
                                                    <p class="f__ul"><?php echo esc_html($type_name); ?></p>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (!empty($type_value)) : ?>
                                                <div class="panel__grid">
                                                    <p class="f__ul"><?php echo esc_html($type_value); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>

                    <!-- Features -->
                    <ul id="content2" class="c__speclist c__specList targetcontent">
                        <?php if ($features): foreach ($features as $item): ?>
                                <li>
                                    <div class="l__panel__grid panel__2">
                                        <div class="panel__grid">
                                            <p class="f__ul"><?= esc_html($item['label']); ?></p>
                                        </div>
                                        <div class="panel__grid">
                                            <div class="f__ul">
                                            <?php echo apply_filters('the_content', $item['value']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        <?php endforeach;
                        endif; ?>
                    </ul>

                    <!-- Description -->
                    <ul id="content3" class="c__speclist c__specList targetcontent">
                        <?php if ($description): foreach ($description as $item): ?>
                                <li>
                                    <div class="l__grid panel__2__pc">
                                        <div class="panel__grid">
                                            <p class="f__ul"><?= esc_html($item['label']); ?></p>
                                        </div>
                                        <div class="panel__grid">
                                            <p class="f__ul spacing__16__sp"><?= esc_html($item['value']); ?></p>
                                        </div>
                                    </div>
                                </li>
                        <?php endforeach;
                        endif; ?>
                    </ul>
                </div>
            </div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function($) {
                var $form = $('.variations_form');

                setTimeout(function() {
                    initCustomVariationHandler();
                }, 100);

                function initCustomVariationHandler() {
                    if ($form.length && typeof $form.wc_variation_form === 'function') {
                        try {
                            $form.wc_variation_form();
                        } catch (e) {
                            console.log('WC variation form already initialized or error:', e);
                        }
                    }

                    $form.off('change.custom_variation').on('change.custom_variation', 'input[type=radio]', function() {
                        console.log("Radio button changed: " + $(this).val());

                        try {
                            var variations = $form.data('product_variations');
                            console.log("Available variations:", variations);

                            if (!variations || !Array.isArray(variations)) {
                                console.error('No variations data found');
                                return;
                            }

                            var selectedAttributes = {};
                            $form.find('input[type=radio]:checked').each(function() {
                                var name = $(this).attr('name');
                                var value = $(this).val();
                                selectedAttributes[name] = value;
                            });

                            console.log("Selected attributes:", selectedAttributes);

                            var matchFound = false;

                            for (var i = 0; i < variations.length; i++) {
                                var variation = variations[i];
                                var isMatch = true;

                                for (var attrName in selectedAttributes) {
                                    var attrValue = selectedAttributes[attrName];
                                    var variationAttrValue = variation.attributes[attrName];

                                    if (variationAttrValue !== "" && variationAttrValue !== attrValue) {
                                        isMatch = false;
                                        break;
                                    }
                                }

                                if (isMatch) {
                                    matchFound = true;
                                    console.log("Found matching variation:", variation);

                                    $form.find('input[name="variation_id"]').val(variation.variation_id);
                                    $form.trigger('found_variation', [variation]);

                                    if (variation.price_html) {
                                        $('.single_variation').html(variation.price_html).show();
                                    }

                                    $('.single_add_to_cart_button')
                                        .removeClass('disabled wc-variation-selection-needed')
                                        .addClass('variation-selected');

                                    break;
                                }
                            }

                            if (!matchFound) {
                                console.log("No matching variation found");
                                $form.find('input[name="variation_id"]').val('');
                                $('.single_variation').hide();
                                $('.single_add_to_cart_button')
                                    .addClass('disabled wc-variation-selection-needed')
                                    .removeClass('variation-selected');

                                $form.trigger('reset_data');
                            }

                        } catch (error) {
                            console.error('Error in variation handler:', error);
                        }
                    });

                    $form.off('submit.custom_variation').on('submit.custom_variation', function(e) {
                        var variationId = $form.find('input[name="variation_id"]').val();

                        if (!variationId || variationId === '') {
                            e.preventDefault();
                            e.stopPropagation();
                            alert("Please select product options before adding to cart");
                            return false;
                        }

                        return true;
                    });

                    $(document).off('click.custom_quantity').on('click.custom_quantity', '.plus__btn', function() {
                        var $input = $(this).siblings('.qty');
                        var currentVal = parseInt($input.val()) || 1;
                        var max = parseInt($input.attr('max')) || 999999;

                        if (currentVal < max) {
                            $input.val(currentVal + 1).trigger('change');
                        }
                    });

                    $(document).off('click.custom_quantity').on('click.custom_quantity', '.minus__btn', function() {
                        var $input = $(this).siblings('.qty');
                        var currentVal = parseInt($input.val()) || 1;
                        var min = parseInt($input.attr('min')) || 1;

                        if (currentVal > min) {
                            $input.val(currentVal - 1).trigger('change');
                        }
                    });
                }

                $form.on('woocommerce_variation_has_changed', function() {
                    console.log('WooCommerce variation changed');
                });

                $form.on('found_variation', function(event, variation) {
                    console.log('WooCommerce found variation:', variation);
                });

                $form.on('reset_data', function() {
                    console.log('WooCommerce reset variation data');
                });
            });
        </script>

<?php
get_footer('shop');
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */