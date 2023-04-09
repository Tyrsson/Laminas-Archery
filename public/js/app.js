(function ($) {
    "use strict";
    // Ajax the main navigation
    $('#main-navigation a').on('click', function(event) {
        event.preventDefault();
        // goTo is the target, the clicked link
        let goTo = $(this);
        let get  = $.ajax({
            url: goTo.attr('href'), // use the links href to request the page
            dataType: 'html',
            method: 'get'
        });
        get.done(function(response, textStatus,jqXHR) {
            // only after the deffered is resolved do we try to update the DOM
            $('#app-workspace').html(response);
            // if were here we did not have a 403, 404, 500
            // If this was not ajaxed we would've navigated away from this tab, it can not stay in an active state
            let previous = $('#main-navigation a.active');
            // remove its state
            previous.removeClass('active');
            // set the clicked link as active
            goTo.addClass('active');
        });
        //console.log('cartId', cartId);
    });
})(jQuery);