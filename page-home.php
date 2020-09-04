<?php /* Template Name: Home*/
get_header();

$channels = get_terms(array(
  'taxonomy' => 'series',
  'hide_empty' => false, 
   'meta_key' => 'archived',
   'meta_value' => '0'
));


$term_id = get_queried_object_id();
$pod = pods('series', $term_id);
?>

<h3 class="text-white" style = "margin-top:40px;"><center>Latest Episodes</center></h3>
<hr class="color-yellow">

<div class="row all-channels-row">
	<div class="col-1"></div>
        <?php
        $i = 1;
        foreach ($channels as $channel):
          $media_id = get_term_meta( $channel->term_id, 'podcast_series_image_settings', true );
          $image_attributes = wp_get_attachment_image_src( $media_id, 'small' );

          $language = get_term_meta( $channel->term_id, 'language', true );
          $src = $image_attributes[0];
          $name = $channel->name;
          $slug = $channel->slug;
          $description = $channel->description; ?>
              <img class="col-2"src="<?php echo $src ?>" alt="<?php echo $name ?>" class="img-responsive" style  = "width:100px;height:150px;">
              <input type="text" class="pod-name"value ="<?php echo $name ?>" style="display:none;"/>
               <input type="text" class="pod-slug" value ="<?php echo $slug ?>" style="display:none;"/>
                <input type="text" class="pod-description" value ="<?php echo wp_trim_words($description, 15) ?>" style="display:none;"/>
                <input type="text" class="pod-src" value ="<?php echo $src ?>" style="display:none;"/>
                <input type="text" class="pod-lang" value ="<?php echo $language['post_title']; ?>" style="display:none;"/>
                <input type="text" class="pod-cat" value ="<?php set_query_var('categories', $categories); ?>" style="display:none;"/>
        <?php
        if ($i > 4) break;
        $i++;
        endforeach;
        ?>

        <div class="col-1"></div>
    </div>

    <h3 class="text-white" style = "margin-top:40px;"><center>Trending Episodes</center></h3>
	<hr class="color-yellow">



<?php
get_footer();