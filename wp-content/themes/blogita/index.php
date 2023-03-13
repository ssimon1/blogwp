<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogita
 */

get_header();
?>

	<main id="primary" class="site-main">

    <section class="bcrumb__area">
      <div class="container">
        <div class="row">
          <div class="col-xxl-12">
            <div class="bcrumb__content">
              <h1><?php _e( 'Blogs', 'blogita' ); ?></h1>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Blog area start -->
    <?php
      if ( have_posts() ) :
        if ( is_home() && !is_front_page() ):
          ?>
          <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
          </header>
          <?php
        endif;
        ?>
        <section class="blog__area">
          <div class="fluid__outer">
            <div class="container-fluid">
              <div class="row">
                <?php
                while ( have_posts() ) :
                  the_post();
                  ?>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                  </div>
                  <?php
                endwhile;
                ?>
              </div>

              <div class="blog__pagination">
                <?php  
                  the_posts_pagination();
                ?>
              </div>
            </div>
          </div>
        </section>
        <?php 
      else :
        ?>
        <section class="blog__none">
          <div class="container">
            <div class="row">
              <div class="col-xxl-12">
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
              </div>
            </div>
          </div>
        </section>
        <?php
      endif;
    ?>
    <!-- Blog area end -->

	</main><!-- #main -->
  
<?php get_footer(); ?>
