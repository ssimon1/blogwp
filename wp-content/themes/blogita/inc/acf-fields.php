<?php
			if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
          'key' => 'group_63438558ddd2d',
          'title' => 'Audio Resource',
          'fields' => array(
            array(
              'key' => 'field_63438559977e4',
              'label' => 'File',
              'name' => 'audio_file',
              'type' => 'file',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'return_format' => 'url',
              'library' => 'all',
              'min_size' => '',
              'max_size' => '',
              'mime_types' => '',
            ),
          ),
          'location' => array(
            array(
              array(
                'param' => 'post_format',
                'operator' => '==',
                'value' => 'audio',
              ),
            ),
          ),
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => '',
          'active' => true,
          'description' => '',
          'show_in_rest' => 0,
        ));
        
        acf_add_local_field_group(array(
          'key' => 'group_6343848d701d8',
          'title' => 'Featured Post',
          'fields' => array(
            array(
              'key' => 'field_6343848ee4080',
              'label' => 'Featured',
              'name' => 'featured',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui_on_text' => '',
              'ui_off_text' => '',
              'ui' => 0,
            ),
          ),
          'location' => array(
            array(
              array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
              ),
            ),
          ),
          'menu_order' => 0,
          'position' => 'side',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => '',
          'active' => true,
          'description' => '',
          'show_in_rest' => 0,
        ));
        
        acf_add_local_field_group(array(
          'key' => 'group_634384ec0705c',
          'title' => 'Popular Post',
          'fields' => array(
            array(
              'key' => 'field_634384ec11ddd',
              'label' => 'Popular',
              'name' => 'popular',
              'type' => 'true_false',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'message' => '',
              'default_value' => 0,
              'ui_on_text' => '',
              'ui_off_text' => '',
              'ui' => 0,
            ),
          ),
          'location' => array(
            array(
              array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
              ),
            ),
          ),
          'menu_order' => 0,
          'position' => 'side',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => '',
          'active' => true,
          'description' => '',
          'show_in_rest' => 0,
        ));
        
        acf_add_local_field_group(array(
          'key' => 'group_6343850d80e43',
          'title' => 'Video Resource',
          'fields' => array(
            array(
              'key' => 'field_6343850d54359',
              'label' => 'URL',
              'name' => 'resource_url',
              'type' => 'url',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'default_value' => '',
              'placeholder' => '',
            ),
          ),
          'location' => array(
            array(
              array(
                'param' => 'post_format',
                'operator' => '==',
                'value' => 'video',
              ),
            ),
          ),
          'menu_order' => 0,
          'position' => 'normal',
          'style' => 'default',
          'label_placement' => 'top',
          'instruction_placement' => 'label',
          'hide_on_screen' => '',
          'active' => true,
          'description' => '',
          'show_in_rest' => 0,
        ));
        
        endif;		