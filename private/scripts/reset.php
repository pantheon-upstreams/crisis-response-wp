<?php

print( "\n==== WP Reset Starting ====\n" );

// Get paths for imports
$path  = $_SERVER['DOCUMENT_ROOT'] . '/private/data';

echo "\n========= START SERVER ===========\n";
print_r($_SERVER);
echo "\n========== END SERVER ============\n";
echo "\n";
echo "\n========= START ENV ===========\n";
print_r($_ENV);
echo "\n========== END ENV ============\n";
echo "\n";
echo "\n========= START PAYLOAD ===========\n";
print_r($_POST);
echo "\n========== END PAYLOAD ============\n";

// Import database
echo $path;
$cmd = "wp db import ${path}/database.sql";
$results = passthru($cmd);

// Shell text?
echo($results);

// Get environment variables, create password.
$email = $_ENV['user_email'];
$password = bin2hex(random_bytes(10));

// Update WP admin user
$cmd = "wp user update 1 --user_email=${email} --user_pass=${password}";
passthru($cmd);

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

// Clear cache, because why not.
passthru( 'wp cache flush' );

print( "\n==== WP Reset Complete ====\n" );