<?php

/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

	<?php do_action('woocommerce_edit_account_form_start'); ?>
	<h2 class="woocommerce-Address-title title f__h3">Edit Profile Information</h2>
	<div class="form-group form__group">
		<label for="account_first_name" class="f__ul spacing__20">
			<?php esc_html_e('First name', 'woocommerce'); ?> <span class="required">*</span>
		</label>
		<div class="input__group">
			<input type="text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr($user->first_name); ?>" class="form-control form__control" required />
		</div>
	</div>

	<div class="form-group form__group">
		<label for="account_last_name" class="f__ul spacing__20">
			<?php esc_html_e('Last name', 'woocommerce'); ?> <span class="required">*</span>
		</label>
		<div class="input__group">
			<input type="text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr($user->last_name); ?>" class="form-control form__control" required />
		</div>
	</div>

	<div class="form-group form__group">
		<label for="account_display_name" class="f__ul spacing__20">
			<?php esc_html_e('Display name', 'woocommerce'); ?> <span class="required">*</span>
		</label>
		<div class="input__group">
			<input type="text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr($user->display_name); ?>" class="form-control form__control" required />
			<span><em><?php esc_html_e('This will be how your name will be displayed in the account section and in reviews', 'woocommerce'); ?></em></span>
		</div>
	</div>

	<div class="form-group form__group">
		<label for="account_email" class="f__ul spacing__20">
			<?php esc_html_e('Email address', 'woocommerce'); ?> <span class="required">*</span>
		</label>
		<div class="input__group">
			<input type="email" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>" class="form-control form__control" required />
		</div>
	</div>


	<?php
	/**
	 * Hook where additional fields should be rendered.
	 *
	 * @since 8.7.0
	 */
	do_action('woocommerce_edit_account_form_fields');
	?>

	<fieldset>
		<legend class="f__ul spacing__20"><?php esc_html_e('Password change', 'woocommerce'); ?></legend>

		<div class="form-group form__group">
			<label for="password_current" class="f__ul spacing__20">
				<?php esc_html_e('Current password (leave blank to leave unchanged)', 'woocommerce'); ?>
			</label>
			<div class="input__group">
				<input type="password" name="password_current" id="password_current" autocomplete="off" class="form-control form__control" />
			</div>
		</div>

		<div class="form-group form__group">
			<label for="password_1" class="f__ul spacing__20">
				<?php esc_html_e('New password (leave blank to leave unchanged)', 'woocommerce'); ?>
			</label>
			<div class="input__group">
				<input type="password" name="password_1" id="password_1" autocomplete="off" class="form-control form__control" />
			</div>
		</div>

		<div class="form-group form__group spacing__bottom__12">
			<label for="password_2" class="f__ul spacing__20">
				<?php esc_html_e('Confirm new password', 'woocommerce'); ?>
			</label>
			<div class="input__group">
				<input type="password" name="password_2" id="password_2" autocomplete="off" class="form-control form__control" />
			</div>
		</div>

	</fieldset>
	<div class="clear"></div>

	<?php
	/**
	 * My Account edit account form.
	 *
	 * @since 2.6.0
	 */
	do_action('woocommerce_edit_account_form');
	?>

	<p>
		<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
		<button type="submit" class="submit__btn" name="save_account_details" value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>">
    <?php esc_html_e('Save changes', 'woocommerce'); ?>
</button>

		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>