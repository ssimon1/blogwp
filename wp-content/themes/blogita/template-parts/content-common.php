<div class="blog__content">
  <ul class="blog_category">
    <li><?php the_category(" , "); ?></li>
  </ul>
  <h2 class="blog__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <ul class="blog__meta">
    <li class="blog__author"><?php the_author_posts_link(); ?></li>
    <li class="blog__date"><?php echo esc_html( get_the_date('jS M, Y') ); ?></li>
  </ul>
  <a href="<?php the_permalink(); ?>" class="blog__link"><?php echo __( "Read More", "blogita" ); ?></a>
</div>