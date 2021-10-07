// Define Name Space
;BS_JQUERY = {};

// Course Builder
BS_JQUERY.BOX = {
    
    icon_open: "dashicons-minus",
    icon_closed: "dashicons-plus",
    icon_remove: "dashicons-no",

    init: function() {
        var _this = this;

        jQuery(document).on('click', '[data-widget="collapse"]', function (e) {
            e.preventDefault();
            _this.collapse(jQuery(this));
        });

        jQuery(document).on('click', '[data-widget="remove"]', function (e) {
            e.preventDefault();
            _this.remove(jQuery(this));
        });

    },

    collapse: function (element) {
        var _this = this;
        
        //Find the box parent
        var box = element.parents(".box").first();
        
        //Find the body and the footer
        var box_content = box.find("> .box-body, > .box-footer, > form  >.box-body, > form > .box-footer");
        
        if (!box.hasClass("collapsed-box")) {

            //Convert minus into plus
            element.children(":first")
                .removeClass(_this.icon_open)
                .addClass(_this.icon_closed);

            //Hide the content
            box_content.slideUp(_this.animationSpeed, function () {
                box.addClass("collapsed-box");
            });

        } else {

            //Convert plus into minus
            element.children(":first")
                .removeClass(_this.icon_closed)
                .addClass(_this.icon_open);

            //Show the content
            box_content.slideDown(_this.animationSpeed, function () {
                box.removeClass("collapsed-box");
            });
        }
        
    },

    remove: function (element) {

        //Find the box parent
        var box = element.parents(".box").first();
        var type = element.parents("li").data('type');

        if (type == 99) {

            jQuery('.addtext[data-type="99"]').removeClass('disabled').bind("click", function (e) {
                e.preventDefault();

                // GET TYPE
                var btn = jQuery(this);
                var type = btn.data('type');

                if (type == 99) {
                    btn.addClass('disabled').unbind();
                }

                jQuery.ajax({
                    type: 'POST',
                    url: ajax_object.ajax_url,
                    data: {
                        action: 'bsf_ajax',
                        post_type: 'addFormType',
                        type: type,
                        order: BS_JQUERY.EDITFORM.order
                    },
                    success: function (data, textStatus, jqXHR) {

                        jQuery("#sortable").append(data);

                        console.log(BS_JQUERY.EDITFORM.order);

                        BS_JQUERY.EDITFORM.order++;
                    },
                    dataType: 'html'
                });

            });

        }

        jQuery(box).remove();
    }

};

// Course Builder
BS_JQUERY.EDITFORM = {

    order: 0,

    init: function() {
        var _this = this;

        //
        jQuery('.addtext').bind("click", function (e) {
            e.preventDefault();

            // GET TYPE
            var btn = jQuery(this);
            var type = btn.data('type');

            if (type == 99) {
                btn.addClass('disabled').unbind();
            }

            jQuery.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'bsf_ajax',
                    post_type: 'addFormType',
                    type: type,
                    order: _this.order
                },
                success: function (data, textStatus, jqXHR) {

                    console.log(data);

                    jQuery("#sortable").append(data);

                    _this.order++;
                },
                dataType: 'html'
            });

        });

        // Check if we already have a reCAPTCHA field present, if so, disable it...
        if (jQuery('.field_row[data-type="99"]').length > 0) {
            jQuery('.addtext[data-type="99"]').addClass('disabled').unbind();
        }

        //
        // Init Functions
        //
        BS_JQUERY.EDITFORM.initHandlers();

    },

    initHandlers: function () {

        //
        // THIS WILL EDIT THE CHOSEN FIELD
        //
        jQuery(document).on('click', '.add_option', function () {

            var append = jQuery(this).prev();
            var inputID = jQuery(this).closest('.field_row').data('index');

            jQuery.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'bsf_ajax',
                    post_type: 'addOption',
                    input_id: inputID
                },
                success: function (data, textStatus, jqXHR) {
                    jQuery(append).append(data);
                },
                dataType: 'html'
            });
            

        });


        //
        // THIS WILL EDIT THE CHOSEN FIELD
        //
        jQuery(document).on('click', '.remove_option', function () {
            jQuery(this).parent('.panel').remove();
        });
        

    },

    initSortable: function () {

        jQuery( "#sortable" ).sortable({
            stop: function() {
                var c_data = [];

                // Loop through all types and get data_id
                jQuery(this).children('li').each(function(index) {
                    jQuery(this).attr("data-sortid", index);
                    c_data[index] = jQuery(this).data('field');
                });

                var postData = {
                    action : 'bsf_ajax',
                    post_type : 'sort',
                    c_data : c_data
                };

                jQuery.ajax({
                    type: 'POST',
                    url: ajax_object.ajax_url,
                    data: postData,
                    success: function (data, textStatus, jqXHR) {
                        //console.log(data);
                    },
                    dataType: 'json'
                });

            },
            handle: ".box-header",
            placeholder: "sortable-highlight"
        });


    }

};

//
// PHP GET Initializer
//
// function populateGet() {
//     var obj = {}, params = location.search.slice(1).split('&');
//     for(var i=0,len=params.length;i<len;i++) {
//         var keyVal = params[i].split('=');
//         obj[decodeURIComponent(keyVal[0])] = decodeURIComponent(keyVal[1]);
//     }
//     return obj;
// }

jQuery(function() {

    //
    var field_row = jQuery(".field_row");

    ////
    BS_JQUERY.EDITFORM.order = field_row.length+1;

    // Initialise
    BS_JQUERY.EDITFORM.init();
    
    // Init Sortable
    BS_JQUERY.EDITFORM.initSortable();

    // Init Box
    BS_JQUERY.BOX.init();

});