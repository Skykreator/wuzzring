<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="favicon.ico">
        <title>WuzzRing</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <style>
            h1 {text-align: center; color: black; font-family:'Times New Roman', Times, serif}
            p {text-align: center; color: black; font-family:'Times New Roman', Times, serif}
            div {text-align: center; color: black; font-family:'Times New Roman', Times, serif}
            br {text-align: center; color: black; font-family:'Times New Roman', Times, serif}
            a {
                text-decoration: none;
                color: rgb(122, 240, 240);
            }
            body {background-color: rgb(133, 15, 15);}
        </style>
    </head>
    <body>
        <div>
            <p>
                <h1>
                    <span style="color: black">Wuzz</span><span style="color: white">Ring</span> Directory
                </h1>
            </p>
            <?php
            $json = file_get_contents("./wuzzring_data.json");

            if ($json === false) {
                die('Error reading the JSON file');
            }

            $json_data = json_decode($json);

            if ($json_data === null) {
                die('Error decoding the JSON file');
            }

            foreach ($json_data->entries as $entry) {
                echo "<p><a style=\"font-size:30px;\" href=\"", $entry->url, "\">", $entry->title, "</a>\n";
                echo "<br>by ", $entry->author, "</p>\n";
            }
            ?>
        </div>
        
        <p>
            <a href="https://milesgee.com/wuzzring/random.php">random</a> 
        </p>
        <p>
            The source for the <img src="https://milesgee.com/media/wuzzring.gif" alt="WuzzRing" width="88" height="31" title="WuzzRing"> can be viewed <a href="https://github.com/Skykreator/wuzzring/tree/main">here</a>.
        </p>
    </body>
</html>

