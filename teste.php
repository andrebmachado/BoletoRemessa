<?php

$name = 'arquivo.txt';
$text = var_export($_POST, true);
$file = fopen($name, 'a');
fwrite($file, $text);
fclose($file);