<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri().'/bf-assets/img/sigma-fav.png';?>" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/bf-assets/css/styles.css';?>" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/bf-assets/css/fonts.css';?>" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/bf-assets/css/custom-style.css';?>"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/bf-assets/css/layout.css';?>" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/bf-assets/css/responsive.css';?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar__top js--sticky-nav">
      <div class="container-fluid">
         <a class="navbar-brand navbar___brand" href="<?php echo esc_url( home_url( '/' )); ?>"><img src="<?php echo get_stylesheet_directory_uri().'/bf-assets/img/logo.svg';?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
         <button class="navbar-toggler navbar__toggler hamburger__menu" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">Menu</button>
         <div class="collapse navbar-collapse navbar__main" id="navbarSupportedContent">

            <div class="header__bar">
               <button class="navbar__toggler__btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Menu</button>
               <button class="navbar__toggler__btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Close</button>
            </div>

            <ul class="navbar-nav navbar__nav">
               <li class="dropdown dropdown__wrap">
                  <a class="dropdown-toggle dropdown__toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Camera<i class="icon__box"></i></a>
                  <ul class="dropdown-menu dropdown__menu" aria-labelledby="dropdownMenuLink">
                     <li><a href="#">Mirrorless</a></li>
                  </ul>
               </li>
               <li><a href="#">Lenses</a></li>
               <li class="dropdown dropdown__wrap">
                  <a class="dropdown-toggle dropdown__toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Cine Lenses<i class="icon__box"></i></a>
                  <ul class="dropdown-menu dropdown__menu" aria-labelledby="dropdownMenuLink">
                     <li><a href="#">FF Zoom Line</a></li>
                     <li><a href="#">High Speed Zoom Line</a></li>
                     <li><a href="#">FF High Speed Prime Line</a></li>
                     <li><a href="#">FF Classic Prime Line</a></li>
                  </ul>
               </li>
               <li class="dropdown dropdown__wrap">
                  <a class="dropdown-toggle dropdown__toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Accessories<i class="icon__box"></i></a>
                  <ul class="dropdown-menu dropdown__menu" aria-labelledby="dropdownMenuLink">
                     <li><a href="#">Filter</a></li>
                     <li><a href="#">Flash</a></li>
                     <li><a href="#">Mount Converter</a></li>
                     <li><a href="#">Tele Converter</a></li>
                     <li><a href="#">Tripod Socket</a></li>
                     <li><a href="#">USB Dock</a></li>
                  </ul>
               </li>
               <li class="dropdown dropdown__wrap">
                  <a class="dropdown-toggle dropdown__toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Support<i class="icon__box"></i></a>
                  <ul class="dropdown-menu dropdown__menu" aria-labelledby="dropdownMenuLink">
                     <li><a href="#">Service Centre</a></li>
                     <li><a href="#">Dealer Network</a></li>
                     <li><a href="#">Track Order</a></li>
                  </ul>
               </li>
               <li class="dropdown dropdown__wrap">
                  <a class="dropdown-toggle dropdown__toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Learn<i class="icon__box"></i></a>
                  <ul class="dropdown-menu dropdown__menu" aria-labelledby="dropdownMenuLink">
                     <li><a href="#">Reviews</a></li>
                     <li><a href="#">Our Story</a></li>
                     <li><a href="#">Events</a></li>
                     <li><a href="#">Workshop</a></li>
                     <li><a href="#">Ambassador</a></li>
                     <li><a href="#">Firmware Updates</a></li>
                     <li><a href="#">Blogs</a></li>
                  </ul>
               </li>
            </ul>
			  <div class="nav__items__small__device">
                 <a href="#">Login</a>
               </div> 
         </div>
         <div class="nav__info__right">
               <div class="user__info">
                 <a href="#">Login</a>
                 <a href="#">Search</a>
             </div>
               <a href="#">Cart</a>
            </div>
      </div>
   </nav>