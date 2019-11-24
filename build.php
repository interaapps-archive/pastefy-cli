<?php

$files = [
    "app/Paste.php",
    "modules/cli/CLI.php",
    "modules/colorful/Colors.php",
    "main.php"
];

$out = "#!/usr/bin/env php\n";

foreach ($files as $file){
    $out .= file_get_contents($file)."\n?>";
}
file_put_contents("pastefy", $out);