/**
 * File member.js.
 *
 * Theme member enhancements for a better user experience.
 */

 ( function( $ ) {
 	 $("#profile-about").hide();
       $( ".team-member" ).click(function() {
            $("#profile-about").empty();
            $name =  $(this).find(".mem-name").val();
            $src= $(this).find(".mem-img").val();
            console.log($src);
            $ln="#";
            $job=$(this).find(".mem-job").val();
            $desc=$(this).find(".mem-desc").val();
            $ele ='<div class="col-3">';
            $ele += '<img src="'+ $src + '" alt ="Team Member Image" style="border-radius: 50%; width:150px; height:150px;"/>';  
            $ele +='<div class="ln-bottom row">';
            $ele += '<a class="col-3" href="'+ $ln +'"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></div></div>';
            $ele += '<div class="col-9"><h4>'+ $name + '</h4>';
            $ele += '<p class="team-member-position">'+ $job + '</p><p>'+ $desc +'</p>';
            $ele += '<div class="float-right"><a href="http://localhost/wordpress/the-disturbed/the-disturbed-2/">Go to Page <i class="fa fa-chevron-right" aria-hidden="true" style ="color: #FCAE54;font-size:30px;"></i> </a></div></div>';
            $( "#profile-about" ).append($ele);
            $( "#profile-about" ).show();
        });
	
} )( jQuery );
