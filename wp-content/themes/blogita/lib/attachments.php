<?php

define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance



function blogita_attachments( $attachments ) {
  $post_id = null;
  if( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
    $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
  }
  if( !$post_id || get_post_format( $post_id ) != 'gallery' ) {
    return;
  }

  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'blogita' ),       // label to display
      'default'   => 'title',                         // default value upon selection
    ),
  );

  $args = array(
    'label'         => __( 'Image Gallery', 'blogita' ),
    'post_type'     => array( 'post' ),
    'position'      => 'normal',
    'priority'      => 'high',
    'filetype'      => array('image'),
    'note'          => 'Attach Images',
    'button_text'   => __( 'Attach Images', 'blogita' ),
    'modal_text'    => __( 'Attach', 'blogita' ),
    'router'        => 'browse',
	  'post_parent'   => false,
    'fields'        => $fields,
  );

  $attachments->register( 'blogita_gallery', $args );
}
add_action( 'attachments_register', 'blogita_attachments' );