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
  get_template_part('template-parts/title-podcast-single');

  $series = get_the_terms(get_the_ID(), 'series')[0];
  $seriesName = $series->name;
  $media_id = get_term_meta( $series->term_id, 'podcast_series_image_settings', true );
  $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
  $src = $image_attributes[0];
  ?>

<div class="container podcast-single-body">
  <div class="row justify-content-center">
    <div class="col-sm-4">
      <img src="<?php echo $src ?>" alt="<?php echo $seriesName . " art" ?>" class="img-responsive">
    </div>
    <div class="col-sm-8">
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
      ?>
    </div>
  </div>
</div>

<?php else: ?>
<div class="podcast-archive-item">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="title-link" href="<?php the_permalink(get_the_ID()) ?>"><?php the_title('<h2  class="podcast-archive-title">', '</h2>'); ?>
    </a>
    <?php
    $dateRecorded = get_post_meta(get_the_ID())['date_recorded'][0];
    if ($dateRecorded != "") { ?>
      <p class="">Recorded on <?php echo $dateRecorded ?></p>
    <?php } ?>
    <div class="entry-content">
      <?php
      the_excerpt();
      ?>
      <a class="btn btn-primary btn-outline" href="<?php the_permalink(get_the_ID()) ?>">Listen -></a>
    </div><!-- .entry-content -->
  </article>
</div>
<?php endif; ?>
