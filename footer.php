<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CreativeDisturbance
 */

?>

<div class="footer">
    <div class="row">
        <div class="col-1">
            <div class="row"><a href="#">Site Map</a></div>
            <div class="row"><a href="#">&copy;copyright</a></div>
        </div>
        <div class="col-3">
            <i class="fa fa-paper-plane text-white"></i>
            &nbsp;&nbsp;Edith O'Donnell Arts and Technology Building<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;University of Texas at Dallas<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;800 w Campbell road #3021, Room 314<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Richardson, TX 75080

        </div>
        <div class="col-3 email">

            <i class="fa fa-envelope text-white" ></i>
            <a href="#">&nbsp;&nbsp;CreativeDisturbanceProductionTeam@gmail.com</a>

        </div>

        <div class="col-4">
            <center>Find Us on:</center>
            <br>
            <img src="<?php echo get_template_directory_uri() . '/img/footer-link.png'; ?>" />
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<script type="text/javascript">
    
    $(".involve").hover(function(){
             $(this).attr("src", "<?php echo get_template_directory_uri() . '/img/become-podcaster.png'; ?>");

        },function(){
           $(this).attr("src", "<?php echo get_template_directory_uri() . '/img/head.png'; ?>");
       });

         $(".involve1").hover(function(){
             $(this).attr("src", "<?php echo get_template_directory_uri() . '/img/join-team.png'; ?>");

        },function(){
           $(this).attr("src", "<?php echo get_template_directory_uri() . '/img/people.png'; ?>");
        });

          $(".involve2").hover(function(){
             $(this).attr("src", "<?php echo get_template_directory_uri() . '/img/donate.png'; ?>");

        },function(){
           $(this).attr("src", "<?php echo get_template_directory_uri() . '/img/hand-heart.png'; ?>");
       });

</script>

</body>
</html>
