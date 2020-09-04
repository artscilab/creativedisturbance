<?php /* Template Name: Podcasts*/
get_header();

$channels = get_terms(array(
  'taxonomy' => 'series',
  'hide_empty' => false, 
   'meta_key' => 'archived',
   'meta_value' => '0'
));


$term_id = get_queried_object_id();
$pod = pods('series', $term_id);

$categories = $pod->display('series_category');
?>

 <div class="podcasts-page">
    <h3 class="text-white"><center>Explore our Podcasts</center></h3>
    <hr class="color-yellow">


<center><div class="btn-group" role="group" aria-label="...">
   		<button type="button" class="btn btn-default">Podcasts:</button>
  		<div class="btn-group" role="group">
    		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      		All
      		<span class="caret"></span>
    		</button>
    		<ul class="dropdown-menu">
      			<li><a href="#">Dropdown link</a></li>
      			<li><a href="#">Dropdown link</a></li>
    		</ul>
  		</div>
  		<button type="button" class="btn btn-default">Topics:</button>
  		<div class="btn-group" role="group">
    		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      		All 
      		<span class="caret"></span>
    		</button>
    		<ul class="dropdown-menu">
      			<li><a href="#">Dropdown link</a></li>
      			<li><a href="#">Dropdown link</a></li>
    		</ul>
  		</div>
		<button type="button" class="btn btn-default">Country:</button>
  		<div class="btn-group" role="group">
    		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      		All
      		<span class="caret"></span>
    		</button>
    		<ul class="dropdown-menu">
      			<li><a href="#">Dropdown link</a></li>
      			<li><a href="#">Dropdown link</a></li>
    		</ul>
  		</div>
	</div>
</center>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    	<div class="series-desc row">
    		
    	</div>
      <div class="container">
        <div class="row all-channels-row">
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
          <div class="col-sm-4 podcast-img" style="margin-top: 40px; margin-bottom : 40px;">
              <img src="<?php echo $src ?>" alt="<?php echo $name ?>" class="img-responsive" style  = "width:250px;height:250px;">
              <input type="text" class="pod-name"value ="<?php echo $name ?>" style="display:none;"/>
               <input type="text" class="pod-slug" value ="<?php echo $slug ?>" style="display:none;"/>
                <input type="text" class="pod-description" value ="<?php echo wp_trim_words($description, 15) ?>" style="display:none;"/>
                <input type="text" class="pod-src" value ="<?php echo $src ?>" style="display:none;"/>
                <input type="text" class="pod-lang" value ="<?php echo $language['post_title']; ?>" style="display:none;"/>
                <input type="text" class="pod-cat" value ="<?php set_query_var('categories', $categories); ?>" style="display:none;"/>
          </div>
        <?php
        if ($i%3 == 0) echo '</div><div class="row">';
        $i++;
        endforeach;
        if ($i%3 != 0) echo '</div>'; ?>
      </div></div>
    </main>
  </div>

</div>
<?php
get_footer();