/**
 * Script run inside a Customizer control sidebar
 */
(function($) {
    wp.customize.bind('ready', function() {
        rangeSlider();
        $('.range-reset-slider').click( function(){
            resetDefault( $(this) );
        });
        $('.range-slider-value').keyup( function(){
            updateControl( $(this) );
        });
    });

    var rangeSlider = function() {
        var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider-value');

        slider.each(function() {

            value.each(function() {
                var value = $(this).prev().attr('value');
                $(this).val( value );
            });

            range.on('input', function() {
                $(this).next().val( this.value );
            });
        });
    };

    var resetDefault = function( content ) {
        var range = content.parent().find('.range-slider__range'),
            value = content.parent().find('.range-slider-value');
            value.val(25);
            range.val(25);
            range.trigger('change');
    };

    var updateControl = function ( content ) {
        var range = content.parent().find('.range-slider__range');
        range.val( content.val() );
        range.trigger('change');
    };

})(jQuery);
