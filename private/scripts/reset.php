<?php

print( "\n==== WP Reset Starting ====\n" );


// Get paths for imports
$path  = $_SERVER['DOCUMENT_ROOT'] . '/private/data';

// Import database
// exec( 'wp db import ' );

print( "\n==== _SERVER START ====\n" );
var_dump($_SERVER);
print( "\n==== _SERVER END ====\n" );
print( "" );
print( "\n==== _POST START ====\n" );
var_dump($_POST);
print( "\n==== _POST END ====\n" );
print( "" );
print( "\n==== _GET START ====\n" );
var_dump($_GET);
print( "\n==== _GET END ====\n" );
print( "" );

/**


// Import all config .json files in private/config
foreach( $files as $file ){

	$file_parts = pathinfo($file);

	if( $file_parts['extension'] != 'json' ){
		continue;
	}

	exec( 'wp config pull ' . $file_parts['filename'] . ' 2>&1', $output );

	if ( count( $output ) > 0 ) {
		$output = preg_replace( '/\s+/', ' ', array_slice( $output, 1, - 1 ) );
		$output = str_replace( ' update', ' [update]', $output );
		$output = str_replace( ' create', ' [create]', $output );
		$output = str_replace( ' delete', ' [delete]', $output );
		$output = implode( $output, "\n" );
		$output = rtrim( $output );
	}
}

// Flush the cache
exec( 'wp cache flush' );

*/

print( "\n==== WP Reset Complete ====\n" );