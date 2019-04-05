/**
 * Created by shahriar on 5/5/17.
 */
$(document).on('ready', function () {

    var text_cat= $('#listid').text();
    if(text_cat){
        var id = JSON.parse(text_cat);
        for (var k = 0; k < id.length; k++) {

            $.ajax({
                url: 'category/collection/' + id[k],
                type: 'POST',
                data: {},
                success: function (data) {
                    var sub = '';
                    var parent_id = data['id'];
                    delete data['id'];

                    if (data[0] !== "undefined") {
                        var m = 1;
                        var im = 0;
                        var imagef = [];
                        jQuery.each(data, function (i, val) {
                            var d = i % 2;
                            d = Math.round(d);
                            if (d == 0) {
                                sub += '<li id="menu-item-1-' + m + '" class="mega-unit mega-hdr bdr">';
                                m++;
                            }

                            sub += '<p class="blue1 b mb10 bb2 pb5 fs14"><a href="/category/' + val.friendly_url + '" title="' + val.title + '">' + val.title.substring(0, 20) + '</a></p>';
                            sub += '<ul>';
                            if (val.image !== "undefined") {
                                imagef[im] = val.image;
                                im++;
                            }
                            if (val.subcategory) {
                                jQuery.each(val.subcategory, function (j, subcat) {
                                    sub += '<li><a href="/category/' + subcat.friendly_url + '" title="' + subcat.title + '">' + subcat.title.substring(0, 20) + '</a></li>';
                                })
                                for (j = 0; j < (5 - val.subcategory.length); j++) {
                                    sub += '</br>';
                                }

                            } else {
                                for (j = 0; j <= 5; j++) {
                                    sub += '</br>';
                                }
                            }


                            sub += '</ul>';
                            if (d == 1) {
                                sub += '</li>';

                            }


                        });

                    } else {
                        $('#divsub_' + parent_id).remove();
                    }
                    if (data[0] !== "undefined") {
                        // console.log('#sub' +parentid);
                        $('#sub' + parent_id + ' div').html(sub);
                        t = 5 - (m - 1) % 5;
                        for (sh = 0; sh < t; sh++) {
                            if (typeof imagef[sh] === "undefined") {
                                continue;

                            } else {
                                $('#sub' + parent_id + ' div').append('<li id="menu-item-1-5" class="mega-unit mega-hdr last"><img src="/uploaded_files/category/' + imagef[sh] + '" class="db mt10" alt=""></li>');

                            }
                        }
                    }
                }
                , error: function (jqXHR, textStatus, errorThrown) {

                    //if fails
                }
            });
        }
    }

});



