<?php

// Include composer resources.
require_once '../vendor/autoload.php';
use Google\Site_Kit_Dependencies\GuzzleHttp\Message\Request;


echo "Quicksilver Debuging Output";
echo "\n\n";
echo "\n========= START PAYLOAD ===========\n";
print_r($_POST);
echo "\n========== END PAYLOAD ============\n";

echo "\n------- START ENVIRONMENT ---------\n";
$env = $_ENV;
foreach ($env as $key => $value) {
  if (preg_match('#(PASSWORD|SALT|AUTH|SECURE|NONCE|LOGGED_IN)#', $key)) {
    $env[$key] = '[REDACTED]';
  }
}
print_r($env);
echo "\n TESTING SERVER \n";
print_r($_SERVER);

echo "\n-------- END ENVIRONMENT ----------\n";

echo "\n TESTING PYTHON \n";
passthru('python3 --version');
echo "\n END TESTING PYTHON \n";

echo "\n TESTING WP CLI \n";
passthru('wp cli info');
echo "\n END TESTING WP CLI \n";

echo "\n TESTING NODEJS \n";
passthru('node -v');
echo "\n END NODEJS \n";

echo "\n TESTING PANTHEON CURL \n";
$site =  'https://' . $_ENV['PANTHEON_ENVIRONMENT'] .'-'. $_ENV['PANTHEON_SITE_NAME'] . '.pantheonsite.io';
$headers = array('origin' => $site);
$request = Requests::get('https://enlot3qdptgut.x.pipedream.net', $headers);

var_dump($request);
echo "\n END PANTHEON CURL \n";
