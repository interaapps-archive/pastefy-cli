<?php
chdir(".");

use app\Paste;
use modules\cli\CLI;
use modules\colorful\Colors;

$send = false;
$a = null;
$options = getopt("f:c:p:t:");

$paste = new Paste;

$paste->setTitle("");
$paste->setContents("");


if (isset($options["f"])) {
    echo $options["f"];
    if (file_exists($options["f"])) {
        $paste->setContents(file_get_contents($options["f"]));
        $paste->setTitle($options["f"]);
        $send = true;
    } else Colors::error("File not found");
}

if (isset($options["p"]))
    $paste->setPassword($options["p"]);

if (isset($options["c"])) {
    $paste->setContents($options["c"]);
    $send = true;
}

if (isset($options["t"]))
    $paste->setTitle($options["t"]);

if ($send)
    Colors::done("Pasted! Here is your link ".$paste->send());
else
    Colors::error("Error! Contents not sent
    -f · File
    -p · Password
    -c · contents
    -t · title
    ");