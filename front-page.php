<?php 
//get_header();

$channels = get_terms(array(
    'taxonomy' => 'series',
    'hide_empty' => false
));

$recentHosts = array();
$recentPodcasts = array();
$recentParams = array(
    'limit' => '4',
    'orderby' => 't.post_modified DESC'
);
$recents = pods('podcast', $recentParams);

while ($recents->fetch()) {
    $hosts = $recents->field('hosts');

    if ($hosts != false) {
        foreach ($hosts as $host) {
            array_push($recentHosts, $host);
        }
    }

    $s = get_the_terms($recents->display('ID'), 'series')[0];
    $media_id = get_term_meta( $s->term_id, 'podcast_series_image_settings', true );
    $image_attributes = wp_get_attachment_image_src( $media_id, 'large' );
    $src = $image_attributes[0];

    $title = $recents->display('post_title');
    $series = $recents->display('series');
    $country = $recents->display('country');
    $link = $recents->display('guid');
    $countryCode = $recents->field("country");
    $id = $recents->display("id");

    $post = array(
        "id" => $id,
        "title" => $title,
        "series" => $series,
        "country" => $country,
        "link" => $link,
        "countryCode" => $countryCode,
        "src" => $src
    );

    array_push($recentPodcasts, $post);
}

$recentHosts = array_unique($recentHosts, SORT_REGULAR);

$mapFunc = function($recent) {
    $pod = pods('host', $recent['ID']);
    $name = $pod->display('post_title');
    $job= $pod->display('job_title');
    $src = $pod->display('profile_photo');
    $guid = $pod->display('guid');

    return array(
        "name" => $name,
        "job" => $job,
        "src" => $src,
        "link" => $guid
    );
};
$recentHosts = array_map($mapFunc, $recentHosts);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>

<body <?php body_class(); ?>>

    <div class="top" >
        <center><h4><b>Interested in starting your own podcast?</b> <a href="https://dev.creativedisturbance.org/dummy/">Click Here</a></h4></center>
    </div>
    <div >
        <img src="<?php echo get_template_directory_uri() . '/img/disturbance.png'; ?>" />
        <center><div class="home">
                <p>Welcome to international, multilingual network and podcast platform that supports collaboration among the arts, science, and new technologies communities.</p>
                <a href="https://dev.creativedisturbance.org/home/">Learn More</a>
            </div>
        </center>
    </div>
    <div class="artscilab">

        <div class="d-flex flex-row">
            <div class="p-6 inner">
                Creative Disturbance was created in 2014 by ArtSciLab of the School of Arts, Technology and Emerging Communication of UT Dallas, with the support of The MIT Press and Leonardo/ISAST.
                It is primarily run by UT Dallas students, with oversight and assistance from faculty.
            </div>
            <div class="p-6"><img src="<?php echo get_template_directory_uri() . '/img/artscilab.png'; ?>" /></div>
        </div>
    </div>
    <div class="home-podcasts">

        <center>
            <p>Subscribe to our podcasts on Spotify and Stitcher !</p>
            <img src="<?php echo get_template_directory_uri() . '/img/subscribe.png'; ?>" />
        </center>


        <div class="collaborators">

            <center>
                <h2>Our Collaborators</h2>
                <img src="<?php echo get_template_directory_uri() . '/img/collaborators.png'; ?>" />
            </center>

        </div>
    </div>

<?php
get_footer();
