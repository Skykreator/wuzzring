<?php
$json = file_get_contents("./wuzzring_data.json");

if ($json === false) {
    echo "<a href=\"directory.php\">something's off with the webring!</a>\n";
    die('Error reading the JSON file');
}

$json_data = json_decode($json);

if ($json_data === null) {
    echo "<a href=\"directory.php\">something's off with the webring!</a>\n";
    die('Error decoding the JSON file');
}

$num_entries = count($json_data->entries);
$redirect_url = $json_data->entries[rand(0, $num_entries - 1)]->url;
header("Location: $redirect_url");
exit;
?>