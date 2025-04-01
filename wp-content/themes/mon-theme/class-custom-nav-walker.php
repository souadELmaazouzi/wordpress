<?php
class Custom_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Get custom field for icons (Requires Advanced Custom Fields plugin)
        $icon_class = get_field('icon_class', $item->ID);

        // Generate menu item HTML
        $output .= '<li><a href="' . esc_url($item->url) . '">';
        if ($icon_class) {
            $output .= '<i class="' . esc_attr($icon_class) . '"></i> ';
        }
        $output .= '<span>' . esc_html($item->title) . '</span></a></li>';
    }
}
?>
