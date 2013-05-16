/**
 * Tree Nodes
 *
 * @author patric gutersohn
 */
(function ($) {

    $.fn.treeNode = function (options) {

        //defaults
        var settings = $.extend({
            "color": "#556B2F",
            "background-color": "white"
        }, options);

        return this.each(function () {
            var box = $(this);

            $.get("library/TreeNodes.php", function (data) {
                box.append(data);
                subManagement();
            });

        });

    }
})(jQuery);


var old = null;
var old_child = null;

function toggle(id) {
    var e = document.getElementById(id);

    if (e != null) {
        if (e.style.display == '') {
            e.style.display = 'none';
        } else {
            if ($(e).isChildOf(".sub")) {
                if (old_child) {
                    $(old_child).css('display', 'none');
                }
            } else {
                if (old) {
                    $(old).css('display', 'none');
                }
            }

            e.style.display = '';

            if (!$(e).isChildOf(".sub")) {
                old = e;
            } else {
                old_child = e;
            }
        }
    }

}

(function ($) {
    $.fn.extend({
        isChildOf: function (filter_string) {

            var parents = $(this).parents().get();

            for (j = 0; j < parents.length; j++) {
                if ($(parents[j]).is(filter_string)) {
                    return true;
                }
            }

            return false;
        }
    });
})(jQuery);

function subManagement() {

    var array = $('.sub').toArray();

    $('.sub:not(:has(ul))').each(function (index, value) {
        $(this).off('click');
        $(this).children('a').remove();
        $(this).prepend('<span class="icon_file" style="margin: 0 4px 0 15px"></span>');


    });

    var sum = $('.sub').length / 2;
    var sum_o = $('.sub').length / 2;

    $('.s_node').each(function () {
        $(this).attr('id', 'node' + sum);
        $('.open_s_node').attr('onclick', "toggle('node" + sum_o + "')");

        sum++;
    });

    $('.open_s_node').each(function () {
        $(this).attr('onclick', "toggle('node" + sum_o + "')");
        sum_o++;
    });

}




  





