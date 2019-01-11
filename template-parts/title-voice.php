<?php
/**
 * Created by PhpStorm.
 * User: aahladmadireddy
 * Date: 11/9/18
 * Time: 3:09 PM
 */
$title = get_query_var('display_title');
$jobTitle = get_query_var('job_title');
?>

<div class="jumbotron jumbotron-fluid jumbotron-title">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h1 class="display-3 voice-title"><?php echo $title ?></h1>
        <h2><?php echo $jobTitle ?></h2>
      </div>
    </div>
  </div>
</div>

<hr>