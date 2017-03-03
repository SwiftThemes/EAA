<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 28/02/17
 * Time: 7:45 PM
 */


/* Responsive */
function swift_shortcode_rc($attr, $content)
{
	GLOBAL $rcc;
	$show_on = explode(",",$attr['show_on']);
	if(array_search('desktop', $show_on) !== false  &&  !$rcc->is_mobile()){
		return $content;
	}
	if(array_search('tablet', $show_on)!== false && $rcc->is_tablet()){
		return $content;
	}
	if(array_search('mobile', $show_on)!== false && !$rcc->is_tablet() && $rcc->is_mobile()){
		return $content;
	}
}
add_shortcode('rc', 'swift_shortcode_rc');
add_shortcode('rcc', 'swift_shortcode_rc');