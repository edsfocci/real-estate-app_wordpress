<?php
function custom_admin_bar() {
  global $wp_admin_bar;

  /* Remove WordPress logo menu */
  $wp_admin_bar->remove_menu('wp-logo');

  $user_id = get_current_user_id();
  $current_user = wp_get_current_user();
  $profile_url = get_edit_profile_url( $user_id );
 
  if ( 0 != $user_id ) {
//  if ( false ) {
    /* Add the "My Account" menu */
    $avatar = get_avatar( $user_id, 40 );
    $username = sprintf( __('%1$s'), $current_user->display_name );
    $class = empty( $avatar ) ? '' : 'with-avatar';

    $wp_admin_bar->add_menu( array(
        'id' => 'my-account',
        'parent' => 'top-secondary',
        'title' => $username . $avatar,
        'href' => $profile_url,
        'meta' => array(
        'class' => $class,
    ),
  ) );
  }
}

add_action('wp_before_admin_bar_render', 'custom_admin_bar');
?>
