<?php
/**
* Plugin Name: 	hhdev WP readmore button
* Version:     	1.0.0
* Plugin URI:  	https://haha.nl/wordpress-plug-in-op-maat/
* Description: 	Adds a readmore option on an element using the .loadmore class. When opened shows a 'less' button. Uses FontAwesome icons. Just style it with your custom css. Based on the readmore script from https://jedfoster.com/Readmore.js/
* License: 		GPL
* Author:      	Herbert Hoekstra
* Author URI:  	https://haha.nl/
* Text Domain: readmore-js
* Domain Path: /languages/
*/


// readmore script/css enqueue
// https://github.com/jedfoster/Readmore.js
// just use loadmore class on the element that holds the readmore content
// ---------------------------------
add_action( 'wp_enqueue_scripts', 'hhdev_readmore_enqueue_script' );

function hhdev_readmore_enqueue_script() {
    wp_enqueue_script( 'readmore-js', plugin_dir_url(__FILE__) . 'js/readmore.min.js', array( 'jquery' ), '2.2.1', true );
	wp_enqueue_style( 'readmore-css', plugin_dir_url(__FILE__) . 'css/readmore.css', array(), '', 'all' );
}

// load translatable readmore in footer
function hhdev_load_readmore_config_footer() {

// make the readmore js translatable
// ---------------------------------

?>

<script>
jQuery( document ).ready(function() {
	jQuery('.loadmore').readmore({
	speed: 50,
	collapsedHeight: 0,
	moreLink: '<a href="#" class="btn-toggle"><span><?php _e("Read more",'readmore-js'); ?> <i class="fas fa-angle-down"></i></span></a>',
	lessLink: '<a href="#" class="btn-toggle active"><span><?php _e("Less",'readmore-js'); ?> <i class="fas fa-angle-up"></i></span></a>',

	// callbacks
	blockProcessed: function() {},
	beforeToggle: function(){},
	afterToggle: function(){}
	});
});
</script>
<?php

}
add_action( 'wp_footer', 'hhdev_load_readmore_config_footer' );

