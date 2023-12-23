<?php

function softlab_demo_enqueue_scripts()
{
    wp_enqueue_style('softlab-demo-style', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'));

    wp_enqueue_style('softlab-demo', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.0.0');


    wp_enqueue_script('softlab-demo', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'softlab_demo_enqueue_scripts');

//WooCommerce auto complete order

/**
 * Auto Complete all WooCommerce orders.
 */
add_action('woocommerce_thankyou', 'custom_woocommerce_auto_complete_order');
function custom_woocommerce_auto_complete_order($order_id)
{
    if (!$order_id) {
        return;
    }

    $order = wc_get_order($order_id);
    $order->update_status('completed');
}

add_action('mp_demo_create_sandbox', function ($source_id) {

    
    add_filter('mp_demo_create_redirect', function ($url) use ($source_id) {

        $site = get_site($source_id);
        $slug = trim($site->path, '/');

        if ('integrate-google-drive' == $slug) {
            $url .= '/wp-admin/admin.php?page=integrate-google-drive-getting-started';
        }elseif ('radio-player' == $slug) {
            $url .= '/wp-admin/admin.php?page=radio-player-getting-started';
        }elseif ('wp-radio' == $slug) {
            $url .= '/wp-admin/edit.php?post_type=wp_radio&page=wp-radio-getting-started';
        }
        elseif ('dracula-dark-mode' == $slug) {
            $url .= '/wp-admin/admin.php?page=dracula-getting-started';
        }elseif ('reader-mode' == $slug) {
            $url .= '/wp-admin/admin.php?page=reader-mode-getting-started';
        }

        return $url;
    });
});
