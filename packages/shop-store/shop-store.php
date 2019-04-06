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

// Remove Posts and Pages
function shop_remove_menus() {
  global $menu;
  $restricted = array(
    __(__('Posts')),
    __(__('Pages')),
    __(__('Comments')),
    __(__('Appearance')),
  );
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  }
}
add_action('admin_menu', 'shop_remove_menus');