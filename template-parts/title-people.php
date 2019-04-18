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
    <div class="row align-items-center">
      <div class="col-sm-9">
        <h1 class="display-3"><?php echo $title ?></h1>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="peopleFilterSelect">View</label>
          <select onchange="handlePeopleFilterChange()" class="form-control" id="peopleFilterSelect">
            <option>Hosts</option>
            <option>Voices</option>
            <option selected>Both</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>