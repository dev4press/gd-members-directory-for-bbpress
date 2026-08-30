<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function d4p_plugin_gdmed_autoload( $class ) : void {
	$path = __DIR__ . '/';
	$base = 'Dev4Press\\Plugin\\GDMED\\';

	dev4press_v56_autoload_for_plugin( $class, $base, $path );
}

spl_autoload_register( 'd4p_plugin_gdmed_autoload' );
