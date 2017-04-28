
(function (factory) {
    // Support module loading scenarios
    if (typeof define === 'function' && define.amd) {
        // AMD Anonymous Module
        define(['jquery'], factory);
    } else {
        // No module loader (plain <script> tag) - put directly in global namespace
        jQuery.griner = window.Griner = factory(jQuery);
    }
})(function ($) {

    function Griner() {
    }

    Griner.windowDimensions = function (force) {
        window_dimensions = (!force && window_dimensions) ? window_dimensions : {
            width: $(window).width(),
            height: $(window).height()
        };
        return window_dimensions;
    };

    Griner.timestamp = function () {
        return Math.round(new Date().getTime() / 1000);
    }

    Griner.preloadImages = function () {
        var d = document;
        Sammy.log('preloadImages', arguments);
        if (d.images) {
            if (!d.MM_p) d.MM_p = new Array();
            var i, j = d.MM_p.length, a = arguments;
            for (i = 0; i < a.length; i++) {
                if (a[i].indexOf("#") != 0) {
                    d.MM_p[j] = new Image;
                    d.MM_p[j++].src = a[i];
                }
            }
        }
    };

    Griner.showNotification = function (status, message) {
        var $notification = $('#inline-notification');
        $notification
            .attr('class', 'notification')
            .addClass(status)
            .find('.message')
            .html(message).end()
            .find('button').one('click', function () {
                $(this).parent().slideUp(200);
            }).end()
            .slideDown(400);
        setTimeout(function () {
            $notification.slideUp();
        }, 6000)
    };

    return Griner;
});
