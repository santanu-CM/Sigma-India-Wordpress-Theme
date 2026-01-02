<?php

/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined('ABSPATH') || exit;

$page_title = ('billing' === $load_address) ? esc_html__('Billing address', 'woocommerce') : esc_html__('Shipping address', 'woocommerce');

do_action('woocommerce_before_edit_account_address_form'); ?>

<?php if (! $load_address) : ?>
	<?php wc_get_template('myaccount/my-address.php'); ?>
<?php else : ?>

	<form method="post">

		<h2 class="f__h3">
			<?php echo ('billing' === $load_address) ? esc_html__('Billing address', 'woocommerce') : esc_html__('Shipping address', 'woocommerce'); ?>
		</h2>

		<div class="woocommerce-address-fields">
			<div class="woocommerce-address-fields__field-wrapper">
				<?php foreach ($address as $key => $field) :
					$field_value = wc_get_post_data_by_key($key, $field['value']);
				?>
					<div class="form-group form__group" id="<?php echo esc_attr($key); ?>_field">
						<label for="<?php echo esc_attr($key); ?>" class="f__ul spacing__20">
							<?php echo esc_html($field['label']); ?>
							<?php if (! empty($field['required'])) : ?>
								<span class="required">*</span>
							<?php endif; ?>
						</label>
						<div class="input__group">
							<?php if ($field['type'] === 'select') : ?>
								<select name="<?php echo esc_attr($key); ?>" id="<?php echo esc_attr($key); ?>" class="form-control form__control">
									<?php foreach ($field['options'] as $option_key => $option_value) : ?>
										<option value="<?php echo esc_attr($option_key); ?>" <?php selected($field_value, $option_key); ?>><?php echo esc_html($option_value); ?></option>
									<?php endforeach; ?>
								</select>
							<?php elseif ($field['type'] === 'country') : ?>
								<?php
								$default_country_code = WC()->countries->get_base_country(); // Fallback country
								$country_code = $field_value ?: $default_country_code;
								$country_name = WC()->countries->countries[$country_code] ?? $country_code;
								?>
								<strong><?php echo esc_html($country_name); ?></strong>
								<input type="hidden"
									name="<?php echo esc_attr($key); ?>"
									id="<?php echo esc_attr($key); ?>"
									value="<?php echo esc_attr($country_code); ?>"
									class="form-control form__control"
									readonly />
							<?php else : ?>
								<input type="<?php echo esc_attr($field['type']); ?>"
									name="<?php echo esc_attr($key); ?>"
									id="<?php echo esc_attr($key); ?>"
									value="<?php echo esc_attr($field_value); ?>"
									class="form-control form__control"
									placeholder="<?php echo esc_attr($field['placeholder'] ?? ''); ?>"
									<?php echo ! empty($field['required']) ? 'required' : ''; ?> />
							<?php endif; ?>

						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<p>
				<button type="submit" class="submit__btn" name="save_address" value="<?php esc_attr_e('Save address', 'woocommerce'); ?>">
					<?php esc_html_e('Save address', 'woocommerce'); ?>
				</button>
				<input type="hidden" name="action" value="edit_address" />
				<?php wp_nonce_field('woocommerce-edit_address', 'woocommerce-edit-address-nonce'); ?>
			</p>
		</div>
	</form>

<?php endif; ?>

<?php do_action('woocommerce_after_edit_account_address_form'); ?>