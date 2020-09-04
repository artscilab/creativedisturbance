<?php /* Template Name: Current Team */
get_header();
$team_members = array();

$teamMemberParams = array(
  'limit' => -1,
);

$teamMemberPod= pods('team_member', $teamMemberParams);
while($teamMemberPod->fetch()) {
  $name = $teamMemberPod->display('post_title');
  $job = $teamMemberPod->display('job_title');
  $src = $teamMemberPod->display('profile_photo');
  $linked_url = $teamMemberPod->display('linkedin_url');
  $desc = $teamMemberPod->display('description');

  array_push($team_members, array(
    "name" => $name,
    "job" => $job,
    "src" => $src,
    "linkedin" => $linked_url,
    "desc" =>  $desc
  ));
}
?>
<div class="about">
  <h1><center>Current Team</center></h1>
  <hr class="color-yellow">
  <div class="profile row" style="padding:20px;" id="profile-about">
        
    </div>
    <div class=" row current-team">
        <?php foreach ($team_members as $team_member): ?>
          <div class="col-3 team-member">
                <div class=" current card" style="width: 14rem;height:22rem;">
                    <div class="card-body">
                        <center>
                            <img src="<?php echo $team_member['src'] ?>" style="border-radius: 50%; width:150px;
                                height:150px;"/>
                            <input type="text" class="mem-img display-none" value ="<?php echo $team_member['src'] ?>" />
                            <div class="card-title"><?php echo $team_member['name'] ?></div>
                            <input type="text" class="mem-name display-none" value ="<?php echo $team_member['name'] ?>" /> 
                            <input type="text" class="mem-job display-none" value ="<?php echo $team_member['job'] ?>" />
                            <input type="text" class="mem-desc display-none" value ="<?php echo $team_member['desc'] ?>" /> 
                         </center>
                        <div class="ln-bottom row">
                            <a class="col-3" href="<?php echo $team_member['linkedin'] ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
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