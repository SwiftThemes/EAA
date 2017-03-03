<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 28/02/17
 * Time: 6:19 PM
 */


function swift_random_string( $length = 5 ) {
	return substr( str_shuffle( str_repeat( $x = 'abcdefghijklmnopqrstuvwxyz', ceil( $length / strlen( $x ) ) ) ), 1, $length );
}