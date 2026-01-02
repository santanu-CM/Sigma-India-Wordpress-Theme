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
<footer>
  <div class="footer__inr container__fluid__wrap">
     <div class="footer__logo">
        <img src="<?php echo get_stylesheet_directory_uri().'/bf-assets/img/symbol.svg';?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
     </div>
     <ul class="footer__menu">
        <li class="footer__nav">
           <p>INFORMATION</p>
           <ul class="footer__nav__list">
              <li><a href="#">Blog</a></li>
              <li><a href="#">Events</a></li>
              <li><a href="#">SIGMA GLOBAL</a></li>
           </ul>
        </li>
        <li class="footer__nav">
           <p>SUPPORT</p>
           <ul class="footer__nav__list">
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Service Centre</a></li>
              <li><a href="#">Dealer Network</a></li>
              <li><a href="#">Track Order</a></li>
              <li><a href="#">Contact Us</a></li>
           </ul>
        </li>
        <li class="footer__nav">
           <p>Policies</p>
           <ul class="footer__nav__list">
              <li><a href="#">Terms And Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Warranty Registration</a></li>
              <li><a href="#">Mount Conversion Service</a></li>
           </ul>
        </li>
        <li class="footer__nav">
           <p>Social</p>
           <ul class="footer__nav__list">
              <li><a href="#">YOUTUBE</a></li>
              <li><a href="#">INSTAGRAM</a></li>
              <li><a href="#">FACEBOOK</a></li>
              <li><a href="#">LINKEDIN</a></li>
           </ul>
        </li>
     </ul>
     <p class="footer__copy">&copy; 2025 SIGMA India (Shetala Agencies Pvt Ltd). All rights reserved.</p>
  </div>
</footer>
<script src="//owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/bf-assets/js/scripts.js';?>"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/bf-assets/js/scripts-slider.js';?>"></script>
<?php wp_footer(); ?>
</body>
</html>