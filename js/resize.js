    var viewportwidth;
    var viewportheight;
    
    // the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
    
    if (typeof window.innerWidth != 'undefined')
    {
        viewportwidth = window.innerWidth,
        viewportheight = window.innerHeight
    }

    // IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)

    else if (typeof document.documentElement != 'undefined'
         && typeof document.documentElement.clientWidth !=
         'undefined' && document.documentElement.clientWidth != 0)
         {
             viewportwidth = document.documentElement.clientWidth,
             viewportheight = document.documentElement.clientHeight
         }

    // older versions of IE

    else
    {
       viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
       viewportheight = document.getElementsByTagName('body')[0].clientHeight
    }
    window.onload=function(){
      //var div = document.querySelector(".content");
      var div = document.querySelector(".display_part");
      if (viewportwidth  < 1280){
          //this is temporary measure, now I leave screen width on 1280px
          //in the future I need to resize width according to display

          //div_width = (viewportwidth*98)/100;
          div_width = (1280*98)/100;
      }
      else {
          div_width = (1280*98)/100;
      }
      div.style.width =  div_width+"px";
      
      //var myDiv = document.getElementsByTagName("body")[0];
      //document.write('<p>Your viewport width is '+myDiv.clientHeight+' x '+myDiv.scrollHeight+' x '+ myDiv.offsetHeight+'</p>'); //Your viewport on my mac width is 1280x598
      //document.write('<p>Your viewport width is '+viewportwidth+'x'+viewportheight+'</p>'); //Your viewport on my mac width is 1280x598; 1855x1079 in big screen

        var div_sidebar_logo = document.querySelector(".display_with_sibar_logos");
        
        if (div_sidebar_logo != null){
        if (viewportheight  < 800){
            div_sidebar_logo_height = 800;
        }
        else{
            div_sidebar_logo_height = (viewportheight*99)/100;
        }
        div_sidebar_logo.style.height =  div_sidebar_logo_height+"px";
        }




        var display_part_height_actual_height = document.getElementById("display_part_id").offsetHeight;
        //document.write('<p>display_partt heigh is '+ display_part_height_actual_height + '</p>');
        if (display_part_height_actual_height  < 1050){
            display_part_height = 1050;
        }
        else{
            display_part_height = display_part_height_actual_height + 50;
        }

        var display_part = document.querySelector(".display_part");
        display_part.style.height =  display_part_height+"px";
    }


