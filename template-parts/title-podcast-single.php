<?php
/**
 * Created by PhpStorm.
 * User: aahladmadireddy
 * Date: 11/9/18
 * Time: 3:09 PM
 */

  $term = get_the_terms(get_the_ID(), 'series')[0];
  $seriesName = $term->name;
  $slug = $term->slug;
  $media_id = get_term_meta( $term->term_id, 'podcast_series_image_settings', true );
  $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
  $src = $image_attributes[0];
?>

<div class="jumbotron jumbotron-fluid jumbotron-title jumbotron-podcast-single">
  <div class="container">
    <div class="row series-name">
      <div class="col-sm-12">
        <h2><a href="<?php echo get_site_url() . '/series/' . $slug ?>"><?php echo $seriesName ?></a></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h1 class="display-3"><?php echo get_the_title() ?></h1>
      </div>
    </div>
  </div>
</div>