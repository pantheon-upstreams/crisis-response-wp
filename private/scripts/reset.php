<?php

print( "\n==== WP Reset Starting ====\n" );

// Get paths for imports
$path  = $_SERVER['DOCUMENT_ROOT'] . '/private/data';

// Import database
$cmd = "wp db import ${path}/database.sql";
exec($cmd);

// Get environment variables, create password.
$email = $_ENV['user_email'];
$password = bin2hex(random_bytes(10));

// Update WP admin user
$cmd = "wp user update 1 --user_email=${email} --user_pass=${password}";
exec($cmd);

// Prepare
$site_id = $_ENV['site_id'];
$subject = "Pantheon Crisis Response Site | Password Reset | [${site_id}]";

$message = "
<html>
<head>
    <title>Pantheon Crisis Response - Password Reset</title>
</head>
<body>
    <p>Your temporary password has been reset:</p>
    <ul>
        <li><strong>Username:</strong> superuser</li>
        <li><strong>Password:</strong> ${password}</li>
    </ul>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <no-reply@pantheon.io>' . "\r\n";
// $headers .= 'Cc: support@pantheon.io' . "\r\n";

// Send email
mail($email,$subject,$message,$headers);


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