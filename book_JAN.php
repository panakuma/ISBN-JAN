<?php
$stdin = trim(fgets(STDIN));
$genre_code = substr($stdin, 3, 4);
$price = substr($stdin, 7, 5);
print("図書分類: ".$genre_code."\n本体価格: ￥ ".(int)$price."\n販売価格: ￥ ".(int)($price*1.08)."\n");

?>
