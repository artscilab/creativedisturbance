<?php
/**
 * Created by PhpStorm.
 * User: aahladmadireddy
 * Date: 11/9/18
 * Time: 3:09 PM
 */

?>

<div class="jumbotron jumbotron-fluid jumbotron-title">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="display-3 archive-title"><?php echo get_the_archive_title() ?></h1>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-sm-4">
        <?php
        $term = get_the_terms(get_the_ID(), 'series')[0];
        $media_id = get_term_meta( $term->term_id, 'podcast_series_image_settings', true );
        $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
        $src              = $image_attributes[0];
        ?>
        <img src="<?php echo $src?>">
      </div>
      <div class="col-sm-8">
        <?php echo get_the_archive_description() ?>
      </div>
    </div>
  </div>
</div>