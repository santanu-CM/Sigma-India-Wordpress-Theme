<?php
$contact_us_content = get_field('contact_us_content');
?>

<div class="large__block info__wrapp__inner l__wid700__pc">
    <div class="form__wrapp">
        <h3 class="heading__medium"><?php the_title();?></h3>
        <?php echo do_shortcode('[contact-form-7 id="eca931a" title="Contact Form For Contact Page"]'); ?>
    </div>
    <div class="content__wrapp contact__wrapp">
        <div class="global__heading__wrapp">
            <h2><?php the_title();?></h2>
            <?php echo apply_filters('the_content', $contact_us_content['contact_us_content']);?>
        </div>
        <div class="support__wrapp">
            <div class="contact__info"><?php echo $contact_us_content['contact_number_title'];?> 
            <a href="tel:<?php echo $contact_us_content['first_phone_no'];?>"><?php echo $contact_us_content['first_phone_no'];?></a> | <a href="tel:<?php echo $contact_us_content['second_phone_no'];?>"><?php echo $contact_us_content['second_phone_no'];?></a>
            </div>
            <div class="contact__info email__info"><?php echo $contact_us_content['email_title'];?> <a href="mailto:<?php echo $contact_us_content['email_address'];?>"><?php echo $contact_us_content['email_address'];?></a></div>
        </div>
        <div class="contact__info address__info"><?php echo $contact_us_content['address_title'];?> <?php echo $contact_us_content['address_content'];?>
        </div>
    </div>
</div>