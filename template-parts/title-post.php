<?php
/**
 * Created by PhpStorm.
 * User: aahladmadireddy
 * Date: 12/3/18
 * Time: 6:18 PM
 */

$title = get_query_var('display_title');
?>

<div class="jumbotron jumbotron-fluid jumbotron-title text-center">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="display-3"><?php echo $title ?></h1>
        <div class="entry-meta">
          <?php
          creativedisturbance_posted_on();
          creativedisturbance_posted_by();
          ?>
        </div><!-- .entry-meta -->
      </div>
    </div>
  </div>
</div>