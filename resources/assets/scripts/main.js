// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

import $ from 'jquery';
// Load Events
$(document).on('scroll', function(){
    if ( $(window).scrollTop() > 30) {
        $('#container-header').addClass('change-color');
        $('#logo').addClass('change-color-txt');
        $('[id^="menu-item-"]').addClass('change-color-txt');
    } else {
        $('#container-header').removeClass('change-color');
        $('#logo').removeClass('change-color-txt');
        $('[id^="menu-item-"]').removeClass('change-color-txt');
    }
});
