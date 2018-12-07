<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CreativeDisturbance
 */

?>

<div class="container">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <?php
      if ( is_singular() ) :
        set_query_var('display_title', the_title('', '', false));
        get_template_part('template-parts/title', get_post_type());
      else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        if ( 'post' === get_post_type() ) :?>
          <div class="entry-meta">
            <?php
            creativedisturbance_posted_on();
            creativedisturbance_posted_by();
            ?>
          </div><!-- .entry-meta -->
        <?php endif; ?>
      <?php endif; ?>
    </header><!-- .entry-header -->

    <?php creativedisturbance_post_thumbnail(); ?>
    <?php if ( is_singular() ) : ?>
      <hr class="blog-seperator">
      <div class="row justify-content-center">
        <div class="col-sm-8 post-content">
          <?php
          the_content( sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
              __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'creativedisturbance' ),
              array(
                'span' => array(
                  'class' => array(),
                ),
              )
            ),
            get_the_title()
          ) );

          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'creativedisturbance' ),
            'after'  => '</div>',
          ) );
          ?>
        </div>
      </div>
      <div class="row justify-content-center">
        <footer class="entry-footer">
          <?php creativedisturbance_entry_footer(); ?>
        </footer><!-- .entry-footer -->
      </div>

    <?php else: ?>
      <div class="row post-listing">
        <div class="col-sm-8">
          <?php the_excerpt(); ?>
        </div>
      </div>
    <?php endif ?>
  </div><!-- #post-<?php the_ID(); ?> -->
</div>
