<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php wc_print_notices(); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

    <div class="u-columns col2-set" id="customer_login">

        <div class="u-column1 col-1 mt-4 ">

        <?php endif; ?>

        <h2 class="f__h3 spacing__32"><?php esc_html_e('Login', 'woocommerce'); ?></h2>

        <form class="woocommerce-form woocommerce-form-login login" method="post">

            <?php do_action('woocommerce_login_form_start'); ?>

            <div class="form-group form__group">
                <label for="username" class="f__ul spacing__20">
                    <?php esc_html_e('Username or email address', 'woocommerce'); ?> <span class="required">*</span>
                </label>
                <div class="input__group">
                    <input type="text"
                        name="username"
                        id="username"
                        autocomplete="username"
                        class="form-control form__control"
                        value="<?php echo (! empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
                </div>
            </div>

            <div class="form-group form__group">
                <label for="password" class="f__ul spacing__20">
                    <?php esc_html_e('Password', 'woocommerce'); ?> <span class="required">*</span>
                </label>
                <div class="input__group">
                    <input type="password"
                        name="password"
                        id="password"
                        autocomplete="current-password"
                        class="form-control form__control" />
                </div>
            </div>

            <?php do_action('woocommerce_login_form'); ?>

            <p class="form-row">
                <label
                    class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
                        type="checkbox" id="rememberme" value="forever" />
                    <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
                </label>
                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                <button type="submit"
                    class="submit__btn"
                    name="login"
                    value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
            </p>

            <p class="woocommerce-LostPassword lost_password">
                <a
                    href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
            </p>

            <?php do_action('woocommerce_login_form_end'); ?>

        </form>

        <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

        </div>

        <div class="u-column2 col-2 mt-4">

            <h2 class="f__h3 spacing__32"><?php esc_html_e('Register', 'woocommerce'); ?></h2>

            <form method="post" class="woocommerce-form woocommerce-form-register register">

                <?php do_action( 'woocommerce_register_form_start' ); ?>

                <!-- Name -->
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <div class="form-group form__group">
                    <label class="f__ul spacing__20" for="reg_name"><?php esc_html_e( 'Name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <div class="input__group">
                        <input required type="text" class="form-control form__control woocommerce-Input woocommerce-Input--text input-text" name="fullname" id="reg_name" value="<?php echo ( ! empty( $_POST['name'] ) ) ? esc_attr( wp_unslash( $_POST['name'] ) ) : ''; ?>" />
                        </div>
                    </div>
                </p>

                <!-- Occupation -->
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <div class="form-group form__group">
                    <label class="f__ul spacing__20" for="reg_occupation"><?php esc_html_e( 'Occupation', 'woocommerce' ); ?></label>
                     <div class="input__group">
                    <input type="text" class="form-control form__control woocommerce-Input woocommerce-Input--text input-text" name="occupation" id="reg_occupation" value="<?php echo ( ! empty( $_POST['occupation'] ) ) ? esc_attr( wp_unslash( $_POST['occupation'] ) ) : ''; ?>" />
                    </div>
                    </div>
                </p>

                <!-- Email -->
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <div class="form-group form__group">
                    <label class="f__ul spacing__20" for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                     <div class="input__group">
                        <input type="email" class="form-control form__control woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
                    </div>
                    </div>
                </p>

                <!-- Password -->
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <div class="form-group form__group">
                    <label class="f__ul spacing__20" for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <div class="input__group">
                    <input type="password" class="form-control form__control woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                    </div>
                    </div>
                </p>


                <!-- Genre -->
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <div class="form-group form__group spacing__bottom__16">
                    <label class="f__ul spacing__20" for="reg_password"><?php esc_html_e( 'Genre of Photography', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <div class="input__group">
                   <select name="genre_pic" id="reg_genre" class="form-control form__control" required="">
                            <option value="">Select a genre</option>
                            <option value="84">Commercial Photography</option>
                            <option value="85">Landscape Photography</option>
                            <option value="82">Portrait Photography</option>
                            <option value="83">Wedding Photography</option>
                    </select>
                    </div>
                    </div>
                </p>

                <?php do_action( 'woocommerce_register_form' ); ?>

                <p class="woocommerce-FormRow form-row">
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    <button type="submit" class="submit__btn woocommerce-Button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                </p>

                <?php do_action( 'woocommerce_register_form_end' ); ?>

            </form>

        </div>

    </div>

<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>