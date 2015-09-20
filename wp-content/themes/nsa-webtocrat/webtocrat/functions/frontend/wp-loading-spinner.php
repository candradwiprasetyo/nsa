<?php

/**

----------------------------------------------------------------------------------------------------

	Filename	: wp-loading-spinner.php
	Location	: ../webtocrat/functions/frontend/
	Author		: BAS - Webtocrat Motion
	Version		: 1.0.0
	Description	: loading spinner
	
----------------------------------------------------------------------------------------------------

*/


if( ! function_exists( 'webtocrat_loading_spinner' ) ) {

	function webtocrat_loading_spinner() {
		global $redux_webtocrat;

		$s = $redux_webtocrat['select-loading-spinner'];

		if ($s == 'chasing-dots') {
			$spinner = '<div class="spinner chasing-dots"><div class="dot1"></div><div class="dot2"></div></div>';
		} elseif ($s == 'circle') {
			$spinner = '<div class="spinner circle-spin"><div class="circle1 circle"></div><div class="circle2 circle"></div><div class="circle3 circle"></div><div class="circle4 circle"></div><div class="circle5 circle"></div><div class="circle6 circle"></div><div class="circle7 circle"></div><div class="circle8 circle"></div><div class="circle9 circle"></div><div class="circle10 circle"></div><div class="circle11 circle"></div><div class="circle12 circle"></div></div>';
		} elseif ($s == 'cube-grid') {
			$spinner = '<div class="spinner cube-grid"><div class="cube"></div><div class="cube"></div><div class="cube"></div><div class="cube"></div><div class="cube"></div><div class="cube"></div><div class="cube"></div><div class="cube"></div><div class="cube"></div></div>';
		} elseif ($s == 'double-bounce') {
			$spinner = '<div class="spinner double-bounce"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>';
		} elseif ($s == 'pulse') {
			$spinner = '<div class="spinner pulse"></div>';
		} elseif ($s == 'rotating-plane') {
			$spinner = '<div class="spinner rotating-plane"></div>';
		} elseif ($s == 'three-bounce') {
			$spinner = '<div class="spinner three-bounce"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>';
		} elseif ($s == 'wandering-cubes') {
			$spinner = '<div class="spinner wandering-cubes"><div class="cube1"></div><div class="cube2"></div></div>';
		} elseif ($s == 'wave') {
			$spinner = '<div class="spinner wave"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>';
		} elseif ($s == 'wordpress') {
			$spinner = '<div class="spinner wordpress"><span class="inner-circle"></span></div>';
		}

		return $spinner;
	}
}