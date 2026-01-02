# Sigma India - WordPress Theme

## Project Overview

**Sigma India** is a custom WordPress theme developed for Sigma India, a camera and lens manufacturer's official website. The theme is built on WordPress with custom code, providing a comprehensive e-commerce platform integrated with WooCommerce for product sales, along with content management features for showcasing products, community content, and customer support services.

### Key Information
- **Project Name**: Sigma India
- **Technology Stack**: WordPress Custom Theme
- **Base Framework**: WP Bootstrap Starter (Bootstrap 5.2.3)
- **E-commerce Platform**: WooCommerce
- **Version**: 1.0.0
- **Website**: https://www.sigmaindia.in/

## Technology Stack

- **WordPress**: Core CMS platform
- **Bootstrap 5.2.3**: Responsive front-end framework
- **WooCommerce**: E-commerce functionality
- **jQuery**: JavaScript library for interactive features
- **Custom Fonts**: Sigma Sans and Sigma Serif font families
- **Third-party Libraries**:
  - Owl Carousel 2
  - PhotoSwipe
  - Swiper
  - Slick Carousel
  - Bootstrap Select
  - MixItUp

## Project Structure

```
Sigma india Theme/
├── template-parts/          # Reusable template components
├── woocommerce/             # WooCommerce template overrides
├── templates/               # Custom page templates
├── inc/                     # Theme includes (customizer, navwalker, etc.)
├── css/                     # Legacy stylesheets
├── new-css/                 # Current stylesheets
├── js/                      # JavaScript files
├── new-js/                  # Current JavaScript files
├── fonts/                   # Custom font files
├── bf-assets/               # Additional assets
└── functions.php            # Main theme functions
```

## Core Features

### 1. E-commerce Functionality
- **Product Catalog**: Support for multiple product categories (Cameras, Lenses, Accessories, Cine Lenses)
- **Shopping Cart**: Custom cart implementation with slide-out mini cart
- **Checkout Process**: Full WooCommerce checkout integration
- **User Accounts**: Custom account management with login/logout functionality
- **Product Variations**: Support for product attributes and variations

### 2. Content Management
- **Custom Post Types**:
  - Ambassadors
  - Shooting with Sigma
  - Our Community
- **Page Templates**: Multiple custom templates for different content sections
- **Blog System**: Standard WordPress blog functionality
- **Reviews**: Product review system
- **Events**: Event management and display

### 3. User Features
- **Loyalty Program**: Reward points and loyalty program integration
- **Warranty Registration**: Product warranty registration system
- **My Account**: User dashboard with order history and account management
- **AJAX Login**: Custom login form with AJAX submission

### 4. Navigation & Menus
- **Primary Navigation**: Main site navigation menu
- **Footer Menus**: Multiple footer menu locations (Information, Support, Policies, Social)
- **Mobile Navigation**: Responsive hamburger menu for mobile devices
- **Slide-out Menus**: Side navigation panels for cart, search, and login

### 5. Custom Page Templates
- Home Page
- Learn Section
- Events
- Reviews
- Ambassadors
- Service & Support
- Service Centre
- Dealer Network
- Contact Us
- FAQ
- Privacy Policy
- Terms & Conditions
- Warranty Registration
- Reward Program
- E-waste Management
- Mount Conversion Service
- Firmware Updates
- Photography Categories (Landscape, Wildlife, Street, Wedding & Portraits)

## Functional Flow

### 1. Homepage Flow
```
User visits homepage
    ↓
Banner Section (Hero image/slider)
    ↓
Discover Sigma Range Section
    ↓
Featured Products Section
    ↓
Made in Aizu Section
    ↓
Latest Reviews Section
    ↓
Latest Blog Posts Section
```

### 2. E-commerce Flow
```
User browses products
    ↓
Product Category Pages (Cameras/Lenses/Accessories/Cine Lenses)
    ↓
Single Product Page
    ↓
Add to Cart (AJAX update)
    ↓
Mini Cart Slide-out Panel
    ↓
Proceed to Checkout
    ↓
Checkout Process (WooCommerce)
    ↓
Order Confirmation
    ↓
My Account (Order History)
```

### 3. User Authentication Flow
```
User clicks "My Account"
    ↓
If not logged in → Slide-out Login Panel
    ↓
AJAX Login Form Submission
    ↓
Authentication Check
    ↓
Success → Redirect to My Account
    ↓
Failure → Display Error Message
```

### 4. Loyalty Program Flow
```
User accesses Loyalty Program page
    ↓
View reward points and benefits
    ↓
If logged in → View account points
    ↓
If not logged in → Prompt to login/register
```

### 5. Content Browsing Flow
```
User navigates to content sections
    ↓
Learn Section → Events, Blog, Reviews, Ambassadors
    ↓
Events → Event listings and details
    ↓
Reviews → Product reviews listing
    ↓
Ambassadors → Ambassador profiles
    ↓
Blog → Latest articles and posts
```

### 6. Support & Service Flow
```
User accesses Support section
    ↓
Service & Support page
    ↓
Service Centre locator
    ↓
Warranty Registration form
    ↓
Contact Us form
    ↓
FAQ section
```

### 7. Product Search Flow
```
User clicks Search icon
    ↓
Slide-out Search Panel
    ↓
Enter search query
    ↓
WordPress search functionality
    ↓
Display search results
```

### 8. Cart Management Flow
```
User adds product to cart
    ↓
Cart updated via AJAX
    ↓
Cart icon shows item count
    ↓
Click Cart icon → Slide-out cart panel
    ↓
View cart items
    ↓
Update quantities (AJAX)
    ↓
Remove items
    ↓
View subtotal
    ↓
Proceed to Checkout
```

## Key Customizations

### Custom Functions
- **Session Management**: Custom session handling for user data
- **AJAX Handlers**: Custom AJAX endpoints for cart updates and login
- **Menu Walkers**: Custom navigation menu walker (`Sigma_Walker_Nav_Menu`)
- **WooCommerce Overrides**: Custom templates for product pages, cart, and checkout
- **Email Customization**: Custom WooCommerce email footer text

### Custom Assets
- **Custom Fonts**: Sigma Sans and Sigma Serif font families
- **Custom Styles**: Modular CSS architecture (core, layout, fonts, responsive)
- **Custom Scripts**: JavaScript for cart management, slide menus, and interactive features

## Menu Locations

The theme registers the following menu locations:
- **Primary Menu**: Top navigation menu
- **New Primary Menu**: Updated top navigation
- **Footer Menus**: Four footer menu locations (Information, Support, Policies, Social)

## Widget Areas

- **Sidebar**: Main sidebar widget area
- **Footer 1**: Footer widget area

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Responsive design for mobile, tablet, and desktop
- Bootstrap 5.2.3 compatibility

## Dependencies

### Required Plugins
- **WooCommerce**: For e-commerce functionality
- **Advanced Custom Fields (ACF)**: For custom field management (likely used based on `get_field()` usage)

### Recommended Plugins
- **Contact Form 7**: For contact forms
- **Visual Composer / Elementor**: Page builder compatibility

## Development Notes

- Theme is based on WP Bootstrap Starter framework
- Custom code is integrated throughout the theme
- Uses WordPress coding standards
- Session management implemented for custom functionality
- AJAX endpoints for enhanced user experience
- Custom WooCommerce templates override default behavior

## File Organization

- **Template Files**: Custom page templates in root directory
- **Template Parts**: Reusable components in `template-parts/` directory
- **WooCommerce Templates**: Overrides in `woocommerce/` directory
- **Stylesheets**: Organized in `new-css/` directory
- **JavaScript**: Custom scripts in `new-js/` directory
- **Functions**: Main theme logic in `functions.php`

## License

This theme is based on WP Bootstrap Starter, which is licensed under the GNU General Public License v2.0.

---

**Note**: This is a custom WordPress theme developed specifically for Sigma India. All customizations and modifications are proprietary to the project.

