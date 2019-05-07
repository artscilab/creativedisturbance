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

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info text-center">
      A project of the <a href="https://artscilab.atec.io">ArtSciLab</a>
      <br>
      <a href="<?php echo get_permalink(get_page_by_title("Report a Bug")->ID) ?>">Report a bug</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
