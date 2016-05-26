/**
 * @file
 * A JavaScript file for the theme.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
!function ($) {
  // Always use strict mode to enable better error handling in modern browsers.
  "use strict";


  // Init foundation with options
  $(document).ready(function() {

    // Function defaults
    function sayHello($name = 'Jeb', $greeting = 'G\'day!') {
      console.log($name + 'says' + $greeting);
    }

    // Arrow functions
    $('body').on('click', (event) => {
      console.log('I heard a click!');
    });

  });

}(jQuery);
