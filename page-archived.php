<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CreativeDisturbance
 */

get_header();

$channels = get_terms(array(
  'taxonomy' => 'series',
  'hide_empty' => false
));
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <?php
      set_query_var('display_title', the_title('', '', false));
      get_template_part('template-parts/title'); ?>

      <div class="container">
        <div class="row all-channels-row">
        <?php
        $i = 1;
        foreach ($channels as $channel):
          $media_id = get_term_meta( $channel->term_id, 'podcast_series_image_settings', true );
          $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );

          $language = get_term_meta( $channel->term_id, 'language', true );
          $src = $image_attributes[0];
          $name = $channel->name;
          $slug = $channel->slug;
          $description = $channel->description; ?>
          <div class="col-sm-3">
            <a class="link-block link-channel" href="<?php echo get_term_link($channel->term_id) ?>">
              <img src="<?php echo $src ?>" alt="<?php echo $name ?>" class="img-responsive">
              <h3><?php echo $name ?></h3>
              <p class="text-muted"><?php echo $language['post_title']; ?></p>
              <p><?php echo wp_trim_words($description, 15) ?></p>
            </a>
          </div>
        <?php
        if ($i%4 == 0) echo '</div><div class="row">';
        $i++;
        endforeach;
        if ($i%4 != 0) echo '</div>'; ?>
      </div>

      <!-- <div id = "Archived Channels"> 
        
     </div>  -->
     
    </main>
  </div>

<?php
get_footer();