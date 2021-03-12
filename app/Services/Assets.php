<?php

namespace App\Services;

class Assets extends Service {

	private static $_queue 	= array(	// a queued array of js & css scripts 
		'js'			=> array(),
		'css'			=> array(),
		'headscript'	=> array()	// JS that needs ran in the <head>
	);

	/**
	* Function that displays a given type of asset 
	**/
	public static function display($type) {

		// set method we are looking to run
		$method 	= "_".$type;

		// grab assets to display
		return self::$method();

	}

	/**
	* Function that adds an asset to the queue
	**/
	public static function queue($type,$src,$slug=false) {

		// make sure this is a type we are expecting
		if (isset(self::$_queue[$type])){

			// if there is no slug, generate one based on given src
			if ( ! $slug) $slug = md5(base64_encode($src));			

			// add item to array
			self::$_queue[$type][$slug]	= $src;

		}

	}

	/**
	* Function that returns javascript within the headscript 
	**/
	private static function _headscript() {

		// init vars
		$assets 	= "";

		// iterate all current JS assets in the queue
		foreach (self::$_queue['headscript'] AS $slug => $asset){

			// build asset
			$assets .= "<script type=\"text/javascript\" src=\"$asset\"></script>";

			// remove from queue
			unset(self::$_queue['headscript'][$slug]);

		}

		return $assets;
	}

	/**
	* Function that displays all JS assets from the queue
	**/
	private static function _js() {

		// init vars
		$assets 	= "";

		// iterate all current JS assets in the queue
		foreach (self::$_queue['js'] AS $slug => $asset){

			// build asset
			$assets .= "<script type=\"text/javascript\" src=\"$asset\"></script>";

			// remove from queue
			unset(self::$_queue['js'][$slug]);

		}

		return $assets;
	}

	/**
	* Function that displays all CSS assets from the queue
	**/
	private static function _css() {

		// init vars
		$assets 	= "";

		// iterate all current JS assets in the queue
		foreach (self::$_queue['css'] AS $slug => $asset){

			// build asset
			$assets .= "<link rel=\"stylesheet\" href=\"$asset\" />";

			// remove from queue
			unset(self::$_queue['css'][$slug]);

		}

		return $assets;

	}

}