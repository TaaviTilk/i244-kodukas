<?php

/*http://stackoverflow.com/questions/29817361/reverse-string-without-strrev*/

$text = "tagurgpidi string";
$lenght =strlen($text);

for ($i = $lenght - 1; $i >=0;$i--) {
    echo $text[$i];
}


?>