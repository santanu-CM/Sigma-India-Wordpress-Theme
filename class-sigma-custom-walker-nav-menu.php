<?php
class Sigma_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="dropdown-menu dropdown__menu">';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = $item->classes ?? [];
        $has_children = in_array('menu-item-has-children', $classes);
        $class_names = $has_children ? 'dropdown dropdown__wrap' : '';

        $output .= '<li class="menu-item ' . esc_attr($class_names) . '">';

        $link_class = $depth === 0 && $has_children ? 'dropdown-toggle dropdown__toggle offset__wrapp' : 'nav-link';
        $attrs = ' class="' . $link_class . '"';
        $attrs .= ' href="' . esc_url($item->url) . '"';

        if ($has_children) {
            $attrs .= ' role="button" data-bs-toggle="dropdown" aria-expanded="false"';
        }

        $output .= '<a' . $attrs . '>' . esc_html($item->title);

        if ($depth === 0 && $has_children) {
            $output .= '<i class="icon__box"></i>';
        }

        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}
?>
