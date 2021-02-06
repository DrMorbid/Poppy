<?php

/***** Register Widgets *****/

function mh_elegance_lite_register_widgets() {
	register_widget('mh_elegance_lite_news_widget');
}
add_action('widgets_init', 'mh_elegance_lite_register_widgets');

/***** Include Widgets *****/

require_once('widgets/mh-news-widget.php');

?>