<?php /* Template Name: About */
get_header();
$team_members = array();

$teamMemberParams = array(
  'limit' => 4,
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
    <h2><center>About Creative Disturbance</center></h2>
    <hr class="color-yellow">

    <p class="cd"><center>Creative Disturbance is an international, multilingual, online platform that provides a unique virtual environment for the intellectually curious across the globe to meet, network, collaborate, create and socialize.</center></p>
    <div class="aboutCD row">
        <div class="col-6">
            <img src="<?php echo get_template_directory_uri() . '/img/aboutCD.png'; ?>" />
        </div>
        <div class="col-6">
            <p>Here new communities of thinkers are fostered and developed; and as a product
            of this linking, unlikely connections emerge. One means of both sharing and spurring such interactions is through a dynamic
                collection of podcasts crowdsourced and produced by Creative Disturbance members.</p>
            <p>These 'conversations help illuminate and inform others on matters of interest across the Creative Disturbance community.</p>

        </div>

    </div>

    <h1><center>Operations</center></h1>
    <hr class="color-yellow">

    <div class="operations row">

        <div class="col-9">
            <p>Creative Disturbance is currently in a prototype with an organisational node at The University of Texas at Dallas, managed from the Leonardo
                Initiatives of ArtSciLab of the Arts and Technology program, operated by faculty,
                students and research fellows, sustained through donations, crowdfunding and perhaps through membership subscriptions.
            </p>

        </div>
        <div class="col-3">
            <a href="https://artscilab.atec.io/"><img src="<?php echo get_template_directory_uri() . '/img/artscilab.png'; ?>" /></a>
        </div>

    </div>

    <h1><center>Why Creative Disturbance?</center></h1>
    <hr class="color-yellow">

    <div class="whyCD row">
        <div class="col-4">
            <center><img src="<?php echo get_template_directory_uri() . '/img/cd.png'; ?>" /></center>
        </div>
        <div class="col-8">
            <p>Our name can be interpreted in a number of ways, and thus we leave its impression primarily up to you, That said,
            we see that there is a need for the disturbance in the arcane networks that currently connect the creatives of the world, Thus we are rising to meet that challenge.
            Further, the name reflects that we primarily serve the intellectually curious of the world: individuals often disturbed about a number of problems to which they are seeking to innovate solutions,
            or to express through their art.</p>

        </div>

    </div>

    <h1><center>Meet The Team</center></h1>
    <hr class="color-yellow">
    <div class = " row meet-the-team">
        <div class="col-3">
            <div class="row">
                <div class="col-4"><img src="https://creativedisturbance.org/wp-content/uploads/2020/01/malina-roger-1.jpg" style="border-radius: 50%; width:100px;
                    height:100px;"/></div>
                <div class="col-8">
                <p class="words">"I've gotten the opportunity to learn a lot of valuable skills"</p>
                <p class="words">-Malina, Roger</p>
                </div>
            </div>
            <div class="row" style="margin-top:100px;">
                <div class="col-4"><img src="https://creativedisturbance.org/wp-content/uploads/2020/01/yvan-e1413333513417-1.jpg" style="border-radius: 50%; width:100px;
                    height:100px;"/></div>
                <div class="col-8">
                    <p class="words">"Testimonials about what it meant to be a part of CD"</p>
                    <p class="words">-Tina, Yvan Calvin</p>
                </div>
            </div>
        </div>
       <div class="col-6">
           <iframe width="560" height="315" src="https://www.youtube.com/embed/EtboCNTcexA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       </div>
        <div class="col-3">
            <div class="row">
                <div class="col-4"><img src="https://creativedisturbance.org/wp-content/uploads/2020/01/AlexGarciaTopete-1.jpg" style="border-radius: 50%; width:100px;
                    height:100px;"/></div>
                <div class="col-8">
                    <p class="words">"Testimonials about what it meant to be a part of CD"</p>
                    <p class="words">-Alex Garcia, Topete</p>
                </div>
            </div>
            <div class="row" style="margin-top:100px;">
                <div class="col-4"><img src="http://localhost/wordpress/wp-content/uploads/2020/07/IMG_20170520_151743_406.jpg" style="border-radius: 50%; width:100px;
                    height:100px;"/></div>
                <div class="col-8">
                    <p class="words">"I've gotten the opportunity to learn a lot of valuable skills"</p>
                    <p class="words">-Nimitha, Jammula</p>
                </div>
            </div>
        </div>
    </div>

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
    <div class="see-more float-right">
        <a href="http://localhost/wordpress/about/current-team/"><h4>See More <i class="fa fa-chevron-right" aria-hidden="true" style ="color: #FCAE54;font-size:30px;"></i> </h4></a>
    </div>
    <h1><center>Previous Team</center></h1>
    <hr class="color-yellow">
    <div class=" row previous-team">
        <div class="col-3">
            <div class="card" style="width: 14rem;height:22rem;">
                <div class="card-body">
                    <center>
                        <img src="http://localhost/wordpress/wp-content/uploads/2020/07/IMG_20170520_151743_406.jpg" style="border-radius: 50%; width:150px;
                                height:150px;"/>
                        <div class="card-title">Nimitha Jammula</div>
                    </center>
                    <a  class="ln-bottom" href="https://www.linkedin.com/in/nimitha-jammula98/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 14rem;height:22rem;">
                <div class="card-body">
                    <center>
                        <img src="https://creativedisturbance.org/wp-content/uploads/2020/01/AlexGarciaTopete-1.jpg" style="border-radius: 50%; width:150px;
                            height:150px;"/>
                        <div class="card-title">Alex Garcia Topete</div>
                    </center>
                    <a  class="ln-bottom" href="https://www.linkedin.com/in/nimitha-jammula98/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                </div>
            </div>

        </div>
        <div class="col-3">
            <div class="card" style="width: 14rem;height:22rem;">
                <div class="card-body">
                    <center>
                        <img src="https://creativedisturbance.org/wp-content/uploads/2020/01/yvan-e1413333513417-1.jpg" style="border-radius: 50%; width:150px;
                            height:150px;"/>
                        <div class="card-title">Tina, Yvan Calvin</div>
                    </center>
                    <a class="ln-bottom" href="https://www.linkedin.com/in/nimitha-jammula98/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                </div>
            </div>


        </div>
        <div class="col-3">
            <div class="card" style="width: 14rem; height:22rem;">
                <div class="card-body">
                    <center>
                        <img src="https://creativedisturbance.org/wp-content/uploads/2020/01/malina-roger-1.jpg" style="border-radius: 50%; width:150px;
                            height:150px;"/>
                        <div class="card-title">Malina Roger</div>
                    </center>
                    <a class="ln-bottom" href="https://www.linkedin.com/in/nimitha-jammula98/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                </div>
            </div>
            
        </div>

    </div>


</div>

<?php
get_footer();