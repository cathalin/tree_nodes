/**
 * Tree Nodes
 *
 * @author patric gutersohn
 */
var old = null;
var old_child = null;

function toggle(id) {
  var e = document.getElementById(id); 

  if(e != null) {
      if (e.style.display == '') {
        e.style.display = 'none'; 
      } else {
        if($(e).isChildOf(".parent")) {
            if(old_child) {
                $(old_child).css('display', 'none');
            }
        } else {
            if(old) {
                $(old).css('display', 'none');
            }
        } 

        e.style.display = '';

        if(!$(e).isChildOf(".parent")) {
            old = e;
        } else {
            old_child = e;
        }
      }
  }
  
}

(function($) {
    $.fn.extend({
        isChildOf: function( filter_string ) {

          var parents = $(this).parents().get();

          for ( j = 0; j < parents.length; j++ ) {
           if ( $(parents[j]).is(filter_string) ) {
              return true;
           }
          }

          return false;
        }
    });
})(jQuery);

$(document).ready(function() {
  

  var array = $('.sub').toArray(); 

  $('.sub:not(:has(ul))').each( function(index, value) {
    $(this).off('click');
    $(this).children('a').remove();
    $(this).prepend('<span class="icon_file" style="margin: 0 4px 0 15px"></span>');


  });

  $('#myimage').off('click');

  

});




  





