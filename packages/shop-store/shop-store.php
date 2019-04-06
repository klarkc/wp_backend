<?php
/**
 *  Plugin Name: Shop Store
 * */

function shop_register_product() {
  // Register shop_product
  register_post_type( 'shop_product',
    array(
      'label' => 'Produto',
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
    )
  );
}

add_action('init', 'shop_register_product');