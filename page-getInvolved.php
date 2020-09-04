<?php  /* Template Name: Get Involved */
get_header();
?>

<div class="get-involved container">
    <h3 class="text-white"><center>Interested in becoming part of Creative Disturbance ?</center></h3>
    <hr class="color-yellow">
   <center> <img src="<?php echo get_template_directory_uri() . '/img/get-involved.png'; ?>" /></center>

    <div class="row content">
        <div class="col-1">
        </div>
        <div class="col-3">
            <a href="#become-podcaster"><center> <img class="involve" src="<?php echo get_template_directory_uri() . '/img/head.png'; ?>"  style="width:200px;height:200px;"/></a>
            <h6 class="text-grey">Want to become a podcaster ?</h6></center>
        </div>
        <div class="col-3">
            <a href="http://localhost/wordpress/get-involved-1/"><center> <img class="involve1" style="width:200px;height:200px;" src="<?php echo get_template_directory_uri() . '/img/people.png'; ?>" /></a>
            <h6 class="text-grey">Want to become a part of our team ?</h6></center>
        </div>
        <div class="col-3">
            <a href="http://localhost/wordpress/get-involved-2/"><center> <img class="involve2" style="width:200px;height:200px;" src="<?php echo get_template_directory_uri() . '/img/hand-heart.png'; ?>" /></a>
            <h6 class="text-grey">Would you like to contribute to Creative Disturbance ?</h6></center>
        </div>
         <div class="col-1">
        </div>
    </div>
</div>
<div class="become-a-podcaster" id="become-podcaster">
    <div class="podcaster-header">
        <img src="<?php echo get_template_directory_uri() . '/img/become-podcaster.png'; ?>"/>
        <h4 class="text-white">Become a Podcaster</h4>
    </div>
    <hr class="color-yellow">
    <div class="container-podcaster">
        <h5 class="text-grey">Interested to become a podcaster with Creative Disturbance? In order to become a podcaster,
            please fill out these two forms so that the CD team can check out your proposal for a podcast </h5>
        <div class="row content">
            <div class="col-4">
                <a href="https://utdallas.qualtrics.com/jfe/form/SV_0MMkBx2IJNMDI57" target="_blank"><center> <img class="round-corner" src="<?php echo get_template_directory_uri() . '/img/create-your-channel.png'; ?>" /></center></a>

            </div>
            <div class="col-4">
                <a href="https://utdallas.qualtrics.com/jfe/form/SV_cwoVhNDFQn3utTL" target="_blank"> <center> <img class="round-corner" src="<?php echo get_template_directory_uri() . '/img/form-for-voices.png'; ?>" /></center></a>

            </div>
            <div class="col-4">
                <a href="https://utdallas.qualtrics.com/jfe/form/SV_bDGNOSGjKbgyXXf" target="_blank"> <center> <img class="round-corner" src="<?php echo get_template_directory_uri() . '/img/create-an-episode.png'; ?>" /></center></a>

            </div>
        </div>
    </div>
</div>

<?php
get_footer();
