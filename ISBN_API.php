<?php

print("書籍裏面のバーコードを2つを読み取って下さい。\n");

$isbn = NULL;
$JAN = NULL;

$stdin1 = trim(fgets(STDIN));
$stdin2 = trim(fgets(STDIN));

if(substr($stdin1, 0, 3) == '978'){
    $isbn = $stdin1;
}else if(substr($stdin1, 0, 3) == '192'){
    $JAN = $stdin1;
}else die("読み取りに失敗しました。");

if(substr($stdin2, 0, 3) == '978'){
    $isbn = $stdin2;
}else if(substr($stdin2, 0, 3) == '192'){
    $JAN = $stdin2;
}else die("読み取りに失敗しました。");


$genre_code = substr($JAN, 3, 4);
$price = substr($JAN, 7, 5);


$API_XML = simplexml_load_file("http://www.hanmoto.com/api/book.php?ISBN=$isbn");

$json = json_encode($API_XML);

$API_DATA = json_decode($json, true);

$isbn = $API_DATA['Head']['param']['isbn'];

$title = $API_DATA['Book']['Product']['DescriptiveDetail']['TitleDetail']['TitleElement']['TitleText'];

$author = $API_DATA['Book']['Product']['DescriptiveDetail']['Contributor']['0']['PersonName'];

$publisher = $API_DATA['Book']['Product']['PublishingDetail']['Imprint']['ImprintName'];

print('ISBN:'.$isbn.'
タイトル:'.$title.'
著者:'.$author.'
出版社:'.$publisher.'
');
print("図書分類: ".$genre_code."\n本体価格: ￥ ".(int)$price."\n販売価格: ￥ ".(int)($price*1.08)."\n");
?>
