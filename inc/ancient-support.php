<?php 

// add ie conditional html5 shim to header (uncomment add_action if needed)
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
// add_action('wp_head', 'add_ie_html5_shim');