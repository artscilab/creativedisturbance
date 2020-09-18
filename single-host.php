<?php /* Template Name: The Disturbed 2*/
get_header();

   
?>
<div class="the-disturbed">
  <?php
      while ( have_posts() ) :
        the_post();
        $host = pods('host', get_the_ID());
        
        $jobTitle = $host->display('job_title');
        $src = $host->display('profile_photo');
        $website = $host->display('website');
        $exp = $host->display('expertise');
        $org = $host->display('organization');
        $series = $host->field('series');
        $country = $host->display('country');
        $language = $host->display('language');

        $categories = $host -> field('categories');
        $description = $host->display('description');
        $episodes = $host->field(array(
          "name" => 'podcast',
          "raw" => false,
          "single" => null,
          "orderby" => 'post_date'
        ));

        if (!empty($episodes)) {
          $episodes = array_reverse($episodes);
        }

        // set_query_var('display_title', the_title('', '', false));
        // set_query_var('job_title', $jobTitle);
        // get_template_part('template-parts/title', "voice"); 
        ?>
  <div class="row" style="border-bottom: 4px solid  #FCB054;">

    <div class="col-4 pro-pic">
      <center>
        <img src="<?php echo $src ?>" style="border-radius: 50%; width:200px;
                                  height:200px;"/>
              <div class="row" style="padding-top:20px;">
                <?php if ($website !== ""): ?>
                <a class="col-3" href="<?php echo $website ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                <?php endif; ?>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
         </center>
    </div>
    <div class="col-8 pro-data" >
      <div class="float-right">
        Team Member
       </div>
       <h4 style="padding-bottom:20px;"><?php echo get_the_title(); ?></h4>
       <p class="team-member-position">
               <i class="fa fa-briefcase"aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $jobTitle ?>
            </p>
            <p class="team-member-position">
              <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $org ?>
            </p>
            <p class="team-member-position">
              <i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $exp ?>
            </p>
            <p class="team-member-position">
              <i class="fa fa-globe" aria-hidden="true"></i>
                &nbsp;&nbsp;&nbsp;<?php echo $country ?>; <?php echo $language ?>
            </p>
        <?php
        if(!empty($categories)) {
      foreach ($categories as $c) {
        $name = $c['post_title'];
        echo '<div class="topic">';
        echo $name;
       echo '</div>';
     }}
         ?>
       
      <!--  <div class="topic">
        Science
       </div>
       <div class="topic">
        Culture & Society
       </div> -->
    </div>
  </div>
  <div class="row pro-description">
    <?php echo $description ?>
    <h4 style="text-decoration:underline;text-decoration-color:#FCB054;margin:auto; padding:30px;">Related podcasts</h4>

     <?php foreach ($series as $s):
          $id = intval($s['term_id']);
          $media_id = get_term_meta( $id, 'podcast_series_image_settings', true );
          $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
          $language = get_term_meta( $id, 'language', true );
          $src = $image_attributes[0]; ?>
    <div class="row podcasts" style="border-bottom: 4px solid  #FCB054;">
      <div class="col-4" style="padding:0px;">
        <img src="<?php echo $src ?>" style="width:100%;height:100%;"/>
      </div>
      <div class="col-8 podcast-desc">
        <h4>Host Of:  <?php echo $s['name'] ?></h4>
        <?php echo wp_trim_words($s['description'], 40) ?>
      </div>
    </div>

    <?php endforeach; ?>
  </div>
  <?php endwhile; ?>

</div>
<?php
get_footer();