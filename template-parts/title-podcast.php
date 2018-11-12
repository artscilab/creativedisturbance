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
    <div class="row align-items-center">
      <div class="col-sm-4">
        <img src="https://unsplash.it/500">
      </div>
      <div class="col-sm-8">
        <h1 class="display-3"><?php echo get_the_archive_title() ?></h1>
        <?php echo get_the_archive_description() ?>
      </div>
    </div>
  </div>
</div>