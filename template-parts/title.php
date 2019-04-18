<?php
/**
 * Created by PhpStorm.
 * User: aahladmadireddy
 * Date: 11/9/18
 * Time: 12:19 PM
 */

$title = get_query_var('display_title');
?>

<div class="jumbotron jumbotron-fluid jumbotron-title">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="display-3"><?php echo $title ?></h1>
      </div>
    </div>
  </div>
</div>