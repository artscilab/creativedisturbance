<?php
/**
 * Created by PhpStorm.
 * User: aahladmadireddy
 * Date: 11/9/18
 * Time: 3:10 PM
 */

?>
<?php
if ( is_singular() ) :
  set_query_var('display_title', the_title('', '', false));
  get_template_part('template-parts/title');
else: ?>
<div class="podcast-archive-item">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="title-link" href="<?php get_permalink(the_ID()) ?>"><?php the_title('<h2  class="podcast-archive-title">', '</h2>'); ?>
    </a>
    <div class="entry-content">
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
    </div><!-- .entry-content -->
  </article>
</div>
<?php endif; ?>
