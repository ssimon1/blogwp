<?php
/**
 *
 * @package spiraclethemes-site-library
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) :
    die;
endif;


/**
 *  Set Import files
 */

if ( ! function_exists( 'spiraclethemes_site_library_own_shop_set_import_files' ) ) :
function spiraclethemes_site_library_own_shop_set_import_files() {

		return array(
        array(
            'import_file_name'           => esc_html__('Demo 1', 'spiraclethemes-site-library'),
            'import_file_url'          => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo1/demo1-content.xml',
            'import_widget_file_url'   => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo1/demo1-widgets.wie',
            'import_customizer_file_url' => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo1/demo1-customizer.dat',    
            'import_preview_image_url'     => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo1/demo1.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://ownshopwp.spiraclethemes.com/demo1/',
        ),
        array(
            'import_file_name'           => esc_html__('Demo 2', 'spiraclethemes-site-library'),
            'import_file_url'          => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo2/demo2-content.xml',
            'import_widget_file_url'   => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo2/demo2-widgets.wie',
            'import_customizer_file_url' => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo2/demo2-customizer.dat',    
            'import_preview_image_url'     => SPIR_SITE_LIBRARY_URL . 'ocdi/own-shop/demo2/demo2.jpg',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to change some menu links. Please check documentation for more information', 'spiraclethemes-site-library' ),
            'preview_url'                  => 'https://ownshopwp.spiraclethemes.com/demo2/',
        ),
    );
}
endif;
add_filter( 'pt-ocdi/import_files', 'spiraclethemes_site_library_own_shop_set_import_files' );


/**
 *  After Import
 */

if ( ! function_exists( 'spiraclethemes_site_library_own_shop_after_import_setup' ) ) :
function spiraclethemes_site_library_own_shop_after_import_setup( $selected_import ) {
	//Assign menus to their locations
	$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
	$category_menu = get_term_by( 'name', 'Category Menu', 'nav_menu' );
	$topbar_menu = get_term_by( 'name', 'Top Bar', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
	      'primary' => $main_menu->term_id,
	      'categorymenu' => $category_menu->term_id,
	      'topbar' => $topbar_menu->term_id,
	    )
	);

    //Assign front & blog page
    $front_page = get_page_by_title( 'Home' );  
    $blog_page = get_page_by_title( 'Blog' );  

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page -> ID );    
    update_option( 'page_for_posts', $blog_page -> ID ); 
    
}
endif;
add_action( 'pt-ocdi/after_import', 'spiraclethemes_site_library_own_shop_after_import_setup' );


function spiraclethemes_site_library_own_shop_check_pro_plugin() {
    if ( ! function_exists( 'ocdi_register_plugins' ) ) :
        function ocdi_register_plugins( $plugins ) {
         
            // List of plugins used by all theme demos.
            $theme_plugins = [
                [ 
                  'name'     => 'Elementor Website Builder',
                  'slug'     => 'elementor',
                  'required' => true,
                ],
                [ 
                  'name'     => 'Contact Form 7',
                  'slug'     => 'contact-form-7',
                  'required' => true,
                ],
            ];
         
            return array_merge( $plugins, $theme_plugins );
        }
    endif;
    add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
}
add_action( 'admin_init', 'spiraclethemes_site_library_own_shop_check_pro_plugin' );



/**
 *  List All| Featured | New | Popular Products functions
 */


if( !function_exists('spiraclethemes_site_library_own_shop_listprod') ) {
    function spiraclethemes_site_library_own_shop_listprod($atts, $content = null) {
        extract(shortcode_atts(array(
            'prod_options' => '',
            'prod_count' => '8',
            'prod_columns_count' => '4',
            'prod_display_tabs' => 'true'
        ), $atts));

       
        $prod_display_tabs = ($prod_display_tabs === 'true' || $prod_display_tabs=='1');
        $arr='';
        if($prod_options != '' && $prod_options != 'all') {
            $str = str_replace(' ', '', $prod_options);
            $arr = explode(',', $str);
        }
        
        ?>
            <div class="list-products-section">
                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <?php
                            if( true==$prod_display_tabs ) :
                                ?>
                                    <ul class="nav nav-tabs ">
                                        <?php
                                            $tabcount=0;
                                            if (in_array("all", $arr)) :
                                                $tabcount++;
                                                if($tabcount==1) :
                                                    ?><li class="active"><?php
                                                else :
                                                    ?><li><?php
                                                endif;
                                                ?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('All','spiraclethemes-site-library'); ?></a></li><?php
                                            endif;
                                            if (in_array("featured", $arr)) :
                                                $tabcount++;
                                                if($tabcount==1) :
                                                    ?><li class="active"><?php
                                                else :
                                                    ?><li><?php
                                                endif;
                                                ?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('Featured','spiraclethemes-site-library'); ?></a></li><?php
                                            endif;
                                            if (in_array("new", $arr)) :
                                                $tabcount++;
                                                if($tabcount==1) :
                                                    ?><li class="active"><?php
                                                else :
                                                    ?><li><?php
                                                endif;
                                                ?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('New','spiraclethemes-site-library'); ?></a></li><?php
                                            endif;
                                            if (in_array("popular", $arr)) :
                                                $tabcount++;
                                                if($tabcount==1) :
                                                    ?><li class="active"><?php
                                                else :
                                                    ?><li><?php
                                                endif;
                                                ?><a href="#tab_default_<?php echo $tabcount; ?>" data-toggle="tab"><?php echo esc_html_e('Popular','spiraclethemes-site-library'); ?></a></li><?php
                                            endif;
                                        ?>
                                    </ul>
                                <?php
                            endif;
                        ?>
                        <div class="tab-content">
                            <?php
                                $tabcount=0;
                                if (in_array("all", $arr)) :
                                    $tabcount++;
                                    if($tabcount==1) :
                                        ?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    else :
                                        ?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    endif;
                                    ?>
                                        <?php echo do_shortcode('[products limit="'.$prod_count.'" columns="'.$prod_columns_count.'"]'); ?>
                                        </div>
                                    <?php
                                endif;
                                if (in_array("featured", $arr)) :
                                    $tabcount++;
                                    if($tabcount==1) :
                                        ?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    else :
                                        ?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    endif;
                                    ?>
                                        <?php echo do_shortcode('[products limit="'.$prod_count.'" columns="'.$prod_columns_count.'" visibility="featured"]'); ?>
                                        </div>
                                    <?php
                                endif;
                                if (in_array("new", $arr)) :
                                    $tabcount++;
                                    if($tabcount==1) :
                                        ?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    else :
                                        ?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    endif;
                                    ?>
                                        <?php echo do_shortcode('[products limit="'.$prod_count.'" columns="'.$prod_columns_count.'" orderby="id" order="DESC" visibility="visible"]'); ?>
                                        </div>
                                    <?php
                                endif;
                                if (in_array("popular", $arr)) :
                                    $tabcount++;
                                    if($tabcount==1) :
                                        ?><div class="tab-pane active" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    else :
                                        ?><div class="tab-pane" id="tab_default_<?php echo $tabcount; ?>"><?php
                                    endif;
                                    ?>	
                                        <?php echo do_shortcode('[products limit="'.$prod_count.'" columns="'.$prod_columns_count.'" best_selling="true" ]'); ?>
                                        </div>
                                    <?php
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
      
    }
    add_shortcode('listprod', 'spiraclethemes_site_library_own_shop_listprod');
}


/**
 *  List Featured Products functions
 */

 if( !function_exists('spiraclethemes_site_library_own_shop_featuredprod') ) {
    function spiraclethemes_site_library_own_shop_featuredprod($atts, $content = null) {
        extract(shortcode_atts(array(
            'prod_count' => '8',
            'prod_columns_count' => '4',
        ), $atts));
        
        ?>
            <div class="list-products-section">
                <?php echo do_shortcode('[products limit="'.$prod_count.'" columns="'.$prod_columns_count.'" visibility="featured"]'); ?>
            </div>
        <?php
      
    }
    add_shortcode('featuredprod', 'spiraclethemes_site_library_own_shop_featuredprod');
}


/**
 *  List New Products functions
 */

 if( !function_exists('spiraclethemes_site_library_own_shop_newprod') ) {
    function spiraclethemes_site_library_own_shop_newprod($atts, $content = null) {
        extract(shortcode_atts(array(
            'prod_count' => '8',
            'prod_columns_count' => '4',
        ), $atts));
        
        ?>
            <div class="list-products-section">
                <?php echo do_shortcode('[products limit="'.$prod_count.'" columns="'.$prod_columns_count.'" orderby="id" order="DESC" visibility="visible"]'); ?>
            </div>
        <?php
      
    }
    add_shortcode('newprod', 'spiraclethemes_site_library_own_shop_newprod');
}


/**
 *  List Popular Products functions
 */

 if( !function_exists('spiraclethemes_site_library_own_shop_popularprod') ) {
    function spiraclethemes_site_library_own_shop_popularprod($atts, $content = null) {
        extract(shortcode_atts(array(
            'prod_count' => '8',
            'prod_columns_count' => '4',
        ), $atts));
        
        ?>
            <div class="list-products-section">
                <?php echo do_shortcode('[products limit="'.$prod_count.'" columns="'.$prod_columns_count.'" best_selling="true" ]'); ?>
            </div>
        <?php
      
    }
    add_shortcode('popularprod', 'spiraclethemes_site_library_own_shop_popularprod');
}


/**
 *  List Categories
 */
function spiraclethemes_site_library_own_shop_get_categories(){
    $categories = get_categories( [
        'taxonomy'     => 'category',
        'type'         => 'post',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'pad_counts'   => false,
    ]);
    if( $categories ){
        foreach( $categories as $cat ){
            $cat_select[$cat->slug] = $cat->name;
        }
    } else {
        $cat_select = array(''=>'No categories');
    }
    return $cat_select;
}

/**
 *  List Recent Blog functions
 */

 if( !function_exists('spiraclethemes_site_library_own_shop_recentblog') ) {
    function spiraclethemes_site_library_own_shop_recentblog($atts, $content = null) {
        extract(shortcode_atts(array(
            'posts_count' => '3',
            'post_cat_slug' => '',
            'post_display_excerpt' => 'false',
            'post_display_readmore' => 'true',
            'post_read_more' => 'READ MORE'
        ), $atts));

        $post_display_excerpt = ($post_display_excerpt === 'true' || $post_display_excerpt=='1');
        $post_display_readmore = ($post_display_readmore === 'true' || $post_display_readmore=='1');

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_count,
            'post_status'    => 'publish',
        );
        if($post_cat_slug != '' && $post_cat_slug != 'all'){
            $str = str_replace(' ', '', $post_cat_slug);
            $arr = explode(',', $str);    
            $args['tax_query'][] = array(
              'taxonomy'  => 'category',
              'field'   => 'slug',
              'terms'   => $arr
            );

        }
        query_posts( $args );
        ?>
            <div class="latest-posts-wrapper">
                <div class="latest-posts-lists-wrapper">
                    <div class="latest-posts-content">
                        <?php
                            while ( have_posts() )  : the_post(); ?>
                                <article class="recent-blog-widget">
                                    <div class="blog-post">
                                        <div class="image">
                                            <?php
                                                if ( has_post_thumbnail()) :
                                                    the_post_thumbnail('full');
                                                else :
                                                    $post_img_url = get_template_directory_uri().'/img/no-image.jpg';
                                                    ?><img src="<?php echo esc_url($post_img_url); ?>" alt="<?php esc_attr_e('post-image','spiraclethemes-site-library'); ?>" /><?php
                                                        
                                                endif;
                                            ?>
                                            <div class="post-date bottom-left">
                                                <div class="post-day"><?php the_time(get_option('date_format')) ?></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="content">
                                            <h3 class="entry-title">
                                                <?php
                                                    if ( is_sticky() && is_home() ) :
                                                        echo "<i class='la la-thumbtack'></i>";
                                                    endif;
                                                ?>
                                                <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
                                            </h3>
                                            <?php
                                                if( true==$post_display_excerpt ) {
                                                    the_excerpt();
                                                    if( true==$post_display_readmore ) {
                                                        ?>
                                                            <div class="read-more">
                                                                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $post_read_more; ?> <i class="la la-long-arrow-alt-right"></i></a>
                                                            </div>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile;
                        ?>
                    </div>
                </div>
            </div>
        <?php
        wp_reset_query();
    }
    add_shortcode('recentblog', 'spiraclethemes_site_library_own_shop_recentblog');
}