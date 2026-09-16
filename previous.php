<?php
$query = $_GET['id'];

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
for ($i = 0; $i < $num_entries; $i++) {
    if ($json_data->entries[$i]->id === $query) {
        $redirect_url = $json_data->entries[($i + $num_entries - 1) % $num_entries]->url;
        header("Location: $redirect_url");
        exit;
    }
}

echo "<a href=\"directory.php\">Invalid id!</a>\n";
die();
?>