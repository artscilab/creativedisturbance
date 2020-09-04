<?php /* Template Name: The Disturbed*/
get_header();
$hosts = array();
$voices = array();

$hostParams = array(
  'limit' => -1,
);
$hostPod= pods('host', $hostParams);
while($hostPod->fetch()) {
  $name = $hostPod->display('post_title');
  $job = $hostPod->display('job_title');
  $src = $hostPod->display('profile_photo');
  $guid = $hostPod->display('guid');
  $web = $hostPod->display('website');
  $desc =  $hostPod->display('description');

  array_push($hosts, array(
    "name" => $name,
    "job" => $job,
    "src" => $src,
    "link" => $guid,
    "web" => $web,
    "desc" => $desc
  ));
}

$voices = array();
$voiceParams = array(
  'limit' => -1,
);
$voicePod= pods('voice', $voiceParams);
while($voicePod->fetch()) {
  $name = $voicePod->display('post_title');
  $job = $voicePod->display('job_title');
  $src = $voicePod->display('profile_photo');
  $guid = $voicePod->display('guid');
  $web = $voicePod->display('website');
  $desc =  $voicePod->display('description');

  array_push($voices, array(
    "name" => $name,
    "job" => $job,
    "src" => $src,
    "link" => $guid,
    "web" => $web,
    "desc" => $desc
  ));
}
?>
<div class="the-disturbed">
    <h3 class="text-white"><center>The Disturbed : Hosts and Voices</center></h3>
    <hr class="color-yellow">
</div>
<div class="become-a-podcaster">
      <center><div class="btn-group" role="group" aria-label="...">
      <button type="button" class="btn btn-default">Podcasts:</button>
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          All <i class="fa fa-angle-down" aria-hidden="true"></i>
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
          All <i class="fa fa-angle-down" aria-hidden="true"></i>
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
          All <i class="fa fa-angle-down" aria-hidden="true"></i>
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Dropdown link</a></li>
            <li><a href="#">Dropdown link</a></li>
        </ul>
      </div>
  </div>
</div></center>
<div class="the-disturbed">
<div class="profile row" style="padding:20px;" id="profile-disturbed">
        
    </div>
    <div class=" row disturbed">
        <?php foreach ($hosts as $host): ?>
        <div class="col-3 host">
                <div class=" current card" style="width: 14rem;height:22rem;">
                    <div class="card-body">
                        <center>
                            <img src="<?php echo $host['src'] ?>" style="border-radius: 50%; width:150px;
                                height:150px;"/>
                            <div class="card-title"><?php echo $host['name'] ?></div>
                            <input type="text" class="host-img display-none" value ="<?php echo $host['src'] ?>" />
                            <input type="text" class="host-name display-none" value ="<?php echo $host['name'] ?>" />
                            <input type="text" class="host-job display-none" value ="<?php echo $host['job'] ?>" />
                            <input type="text" class="host-web display-none" value ="<?php echo $host['web'] ?>" />
                            <input type="text" class="host-desc display-none" value ="<?php echo $host['desc'] ?>" />
                            <input type="text" class="host-single display-none" value ="<?php echo $host['link'] ?>" />
                        </center>
                        <div class="ln-bottom row">
                <a class="col-3" href="<?php echo $host['web'] ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><img src = "<?php echo get_template_directory_uri() . '/img/insta.png'; ?>" style="width :30px;height:30px;"/></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
            </div>
        </div>
        </div>
         <?php endforeach; ?>

         <?php foreach ($voices as $voice): ?>
        <div class="col-3 voice">
                <div class=" current card" style="width: 14rem;height:22rem;">
                    <div class="card-body">
                        <center>
                            <img src="<?php echo $voice['src'] ?>" style="border-radius: 50%; width:150px;
                                height:150px;"/>
                            <div class="card-title"><?php echo $voice['name'] ?></div>
                            <input type="text" class="voice-img display-none" value ="<?php echo $voice['src'] ?>" />
                            <input type="text" class="voice-name display-none" value ="<?php echo $voice['name'] ?>" />
                            <input type="text" class="voice-job display-none" value ="<?php echo $voice['job'] ?>" />
                            <input type="text" class="voice-web display-none" value ="<?php echo $voice['web'] ?>" />
                            <input type="text" class="voice-desc display-none" value ="<?php echo $voice['desc'] ?>" />
                            <input type="text" class="voice-single display-none" value ="<?php echo $voice['link'] ?>" />
                        </center>
                        <div class="ln-bottom row">
                <a class="col-3" href="<?php echo $voice['web'] ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><img src = "<?php echo get_template_directory_uri() . '/img/insta.png'; ?>" style="width :30px;height:30px;"/></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a class="col-3" href="https://www.linkedin.com/in/aadhavansibi"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
            </div>
        </div>
        </div>
         <?php endforeach; ?>
    </div>
 </div>
<?php
get_footer();