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
    <section class="author__area">
      <div class="container">
        <div class="row">
          <div class="col-xxl-8 offset-xxl-2 col-xl-10 offset-xl-1">
            <div class="blog__detail-author">
              <div class="author__img">
                <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
              </div>
              <div class="author__info">
                <h3 class="author-name"><?php the_author(); ?></h3>
                <p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Blog area start -->
    <?php
      if ( have_posts() ) :
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
        <section class="no__blog">
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
