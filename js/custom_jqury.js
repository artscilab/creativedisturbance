
        $( ".series-desc" ).hide();
       $( ".podcast-img" ).click(function() {
            $( ".series-desc" ).empty();
            $name = $(this).find(".pod-name").val();
            console.log("name : "+ $name);
            $slug = $(this).find(".pod-slug").val();
            console.log("slug : "+ $slug);
            $desc = $(this).find(".pod-description").val();
            console.log("Description : "+ $desc);
            $src = $(this).find(".pod-src").val();
            console.log("src : "+ $src);
            $lang = $(this).find(".pod-lang").val();
            console.log("language : "+ $lang);
            $cat = $(this).find(".pod-cat").val();
            console.log("Categories : "+ $cat);
            $ele = '<img class="col-sm-4" src="'+$src+'" alt="podcast image"style="width:250px;height:250px;"/>';
            console.log($ele);
            $ele += '<div class="col-sm-8"><div class="float-right pod-lan">'+ $lang +'</div>';
            $ele += '<h3>'+$name+'</h3>';
            $ele += '<p> Hosted By <div class="div-host"></div></p>';
            $ele += '<p>' + $desc + '</p>';

    $ele += ' <div class="float-right"><a href="http://localhost/wordpress/taxonomy-series/">Go to Page <i class="fa fa-chevron-right"';
            $ele += 'aria-hidden="true" style ="color: #FCAE54;font-size:30px;"></i> </a></div></div>';

               
            
             $( ".series-desc" ).append($ele);
             $( ".series-desc" ).show();
        });