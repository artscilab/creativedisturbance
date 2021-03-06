<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CreativeDisturbance
 */

?>

<?php
  set_query_var('display_title', the_title('', '', false));
  get_template_part('template-parts/title');
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php creativedisturbance_post_thumbnail(); ?>

        <div class="entry-content">
          <?php
          the_content();

          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'creativedisturbance' ),
            'after'  => '</div>',
          ) );
          ?>
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
          <footer class="entry-footer">
            <?php
            edit_post_link(
              sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                  __( 'Edit <span class="screen-reader-text">%s</span>', 'creativedisturbance' ),
                  array(
                    'span' => array(
                      'class' => array(),
                    ),
                  )
                ),
                get_the_title()
              ),
              '<span class="edit-link">',
              '</span>'
            );
            ?>
          </footer><!-- .entry-footer -->
        <?php endif; ?>
      </article><!-- #post-<?php the_ID(); ?> -->
    </div>
  </div>
</div>
