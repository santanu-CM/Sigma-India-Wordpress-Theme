<?php

/**
 * Template Name: Camera Compatibility Page
 */
get_header();
$image1 =  get_field('page_image');

?>
<div class="body__container__inner container__fluid__wrap">
    <div class="large__block">
        <div class="content__width500__pc">
            <p class="text__center"><a href="<?php echo get_field('support_link'); ?>" class="f__uppercase f__ul"><?php echo get_field('parent_title'); ?></a></p>
            <h1 class="f__h2 f__uppercase spacing__40 text__center"><?php echo get_field('title'); ?></h1>
            <p class="spacing__40 text__center"><?php echo get_field('paragraph'); ?></p>
        </div>
    </div>
    <div class="medium__block">
        <div class="content__width560__pc">
            <figure>
                <img src="<?php echo $image1['url']; ?>" alt="">
            </figure>
        </div>
    </div>
    <div class="large__block">
        <div class="l__grid panel__3__pc">
            <div class="c__select__line">
                <p class="f__ul">STEP 1<br>Camera Brand</p>
                <div class="m__select">
                    <select id="camera_brand_select" class="form-control form__control">
                        <option value="" selected>All</option>

                        <?php
                        $brands = get_terms(['taxonomy' => 'camera_brand', 'hide_empty' => false]);
                        foreach ($brands as $brand) {
                            echo '<option value="' . esc_attr($brand->slug) . '">' . esc_html($brand->name) . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="c__select__line spacing__32__sp">
                <p class="f__ul">STEP 2<br>Camera Type / Sensor Size</p>
                <div class="m__select">
                    <select id="camera_type_select" class="form-control form__control">
                        <option value="">Select</option>
                    </select>
                </div>
            </div>
            <div class="c__select__line spacing__32__sp">
                <p class="f__ul">STEP 3<br>Camera Model</p>
                <div class="m__select">
                    <select id="camera_model_select" class="form-control form__control">
                        <option value="">Select</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="medium__block">
            <div class="accordion" id="accordionExample">

            </div>
        </div>
    </div>
</div>
<script>
    // jQuery(document).ready(function($) {
    //     function updateAccordion() {
    //         const brand = $('#camera_brand_select').val();
    //         const type = $('#camera_type_select').val();
    //         const model = $('#camera_model_select').val();
    //         if (brand === 'All') brand = '';
    //         if (type === 'All') type = '';
    //         if (model === 'All') model = '';

    //         // Only run AJAX if any value is selected (filtering)
    //         if (brand || type || model) {
    //             $.ajax({
    //                 url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //                 type: 'POST',
    //                 data: {
    //                     action: 'filter_camera_models_accordion',
    //                     brand: brand,
    //                     type: type,
    //                     model: model
    //                 },
    //                 success: function(res) {
    //                     $('#accordionExample').html(res);
    //                 }
    //             });
    //         }
    //     }

    //     // Load all models on first page load
    //     function loadAllAccordionsInitially() {
    //         $.ajax({
    //             url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //             type: 'POST',
    //             data: {
    //                 action: 'filter_camera_models_accordion'
    //                 // No filters passed — returns all
    //             },
    //             success: function(res) {
    //                 $('#accordionExample').html(res);
    //             }
    //         });
    //     }

    //     $('#camera_brand_select').on('change', function() {
    //         let brand = $(this).val();

    //         $.ajax({
    //             url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //             type: 'POST',
    //             data: {
    //                 action: 'get_types_and_models_from_brand',
    //                 brand: brand
    //             },
    //             success: function(res) {
    //                 $('#camera_type_select').html(res.types);
    //                 $('#camera_model_select').html(res.models);
    //                 updateAccordion(); // filter accordion after brand change
    //             }
    //         });
    //     });

    //     $('#camera_type_select').on('change', function() {
    //         let brand = $('#camera_brand_select').val();
    //         let type = $(this).val();

    //         $.ajax({
    //             url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //             type: 'POST',
    //             data: {
    //                 action: 'get_models_from_brand_and_type',
    //                 brand: brand,
    //                 type: type
    //             },
    //             success: function(res) {
    //                 $('#camera_model_select').html(res);
    //                 updateAccordion(); // filter accordion after type change
    //             }
    //         });
    //     });

    //     $('#camera_model_select').on('change', function() {
    //         updateAccordion(); // filter accordion after model change
    //     });

    //     // 👇 Load everything by default on first load
    //     loadAllAccordionsInitially();
    // });
   
jQuery(document).ready(function($) {

    function updateAccordion() {
        let brand = $('#camera_brand_select').val();
        let type = $('#camera_type_select').val();
        let model = $('#camera_model_select').val();

        // Normalize "All" or empty to ""
        if (brand === 'All') brand = '';
        if (type === 'All') type = '';
        if (model === 'All') model = '';

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'filter_camera_models_accordion',
                brand: brand,
                type: type,
                model: model
            },
            success: function(res) {
                $('#accordionExample').html(res);
            }
        });
    }

    // Step 1: Brand change
    $('#camera_brand_select').on('change', function() {
        let brand = $(this).val();

        // If 'All', reset dependent selects and fetch all models
        if (brand === 'All' || brand === '') {
            $('#camera_type_select').html('<option value="">Select</option>');
            $('#camera_model_select').html('<option value="">Select</option>');
            updateAccordion(); // Load all
            return;
        }

        // Normal brand filter AJAX
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'get_types_and_models_from_brand',
                brand: brand
            },
            success: function(res) {
                $('#camera_type_select').html(res.types);
                $('#camera_model_select').html(res.models);
                updateAccordion(); // Show models of this brand
            }
        });
    });

    // Step 2: Type change
    $('#camera_type_select').on('change', function() {
        let brand = $('#camera_brand_select').val();
        let type = $(this).val();

        if (brand === 'All') brand = '';
        if (type === 'All') type = '';

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'get_models_from_brand_and_type',
                brand: brand,
                type: type
            },
            success: function(res) {
                $('#camera_model_select').html(res);
                updateAccordion(); // Show models of this brand+type
            }
        });
    });

    // Step 3: Model change
    $('#camera_model_select').on('change', function() {
        updateAccordion(); // Show only selected model
    });

    // ✅ Initial load: show all
    updateAccordion();

});


</script>
<?php get_footer(); ?>