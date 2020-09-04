( function( $ ) {

 	 $("#profile-disturbed").hide();
     console.log("In Disturbed js file !");
       $( ".host" ).click(function() {
            $("#profile-disturbed").empty();
            $name =  $(this).find(".host-name").val();
            $src= $(this).find(".host-img").val();
            console.log($src);
            $job=$(this).find(".host-job").val();
            $desc=$(this).find(".host-desc").val();
            $singleLink = $(this).find(".host-single").val();
            $ln = $(this).find(".host-web").val();
            $ele ='<div class="col-3">';
            $ele += '<img src="'+ $src + '" alt ="Team Member Image" style="border-radius: 50%; width:150px; height:150px;"/>';  
            $ele +='<div class="ln-bottom row">';
            $ele += '<a class="col-3" href="'+ $ln +'"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></div></div>';
            $ele += '<div class="col-9"><h4>'+ $name + '</h4>';
            $ele += '<p class="team-member-position">'+ $job + '</p><p>'+ $desc +'</p>';
            $ele += '<div class="float-right"><a href="'+ $singleLink+ '">Go to Page <i class="fa fa-chevron-right" aria-hidden="true" style ="color: #FCAE54;font-size:30px;"></i> </a></div></div>';
            $( "#profile-disturbed" ).append($ele);
            $( "#profile-disturbed" ).show();
        });

        $( ".voice" ).click(function() {
            $("#profile-disturbed").empty();
            $name =  $(this).find(".voice-name").val();
            $src= $(this).find(".voice-img").val();
            console.log($src);
            $job=$(this).find(".voice-job").val();
            $desc=$(this).find(".voice-desc").val();
            $singleLink = $(this).find(".voice-single").val();
            $ln = $(this).find(".voice-web").val();
            $ele ='<div class="col-3">';
            $ele += '<img src="'+ $src + '" alt ="Disturbed Image" style="border-radius: 50%; width:150px; height:150px;"/>';  
            $ele +='<div class="ln-bottom row">';
            $ele += '<a class="col-3" href="'+ $ln +'"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></div></div>';
            $ele += '<div class="col-9"><h4>'+ $name + '</h4>';
            $ele += '<p class="team-member-position">'+ $job + '</p><p>'+ $desc +'</p>';
            $ele += '<div class="float-right"><a href="'+ $singleLink+ '">Go to Page <i class="fa fa-chevron-right" aria-hidden="true" style ="color: #FCAE54;font-size:30px;"></i> </a></div></div>';
            $( "#profile-disturbed" ).append($ele);
            $( "#profile-disturbed" ).show();
        });
	
} )( jQuery );
