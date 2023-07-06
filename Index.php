<?php
header('Content-Type: application/json');

if($_GET["search"]){
$search = $_GET["search"];
$get = file_get_contents("https://youtube.com/search?q=" . urlencode("$search music"));
$pattrn = '/\\,{"videoRenderer":{"videoId":"(.*?)","thumbnail":{"thumbnails":\[{"url":"(.*?)"\\b(.*?)\\"title":{"runs":\[{"text":"(.*?)\"\\b(.*?)\\,"simpleText":"(.*?)"},"viewCountText":{"simpleText":"(.*?)"}/';
preg_match_all($pattrn, $get, $json);
function unescapeUTF8EscapeSeq($str)
{
return preg_replace_callback(
"/\\\u([0-9a-f]{4})/i",
create_function(
'$matches',
'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_QUOTES, \'UTF-8\');'
),
$str
);
}
$array['ok'] = true;
for ($i = 1; $i <= count($json[1]) - 1; $i++) {
if($i == 13){break;}
$time1  = $json[6][$i];
$tim1= str_replace(':','', $time1);
$bir= explode(":",$time1)[1];
if(1059>$tim1){
$title = str_replace('",', null, preg_replace('#[0-9@=|()!-/"\}]]#', null, unescapeUTF8EscapeSeq($json[4][$i])));
$url   = $json[1][$i];
$image = str_replace('",', null, $json[2][$i]);
$time  = $json[6][$i];
$view  = str_replace("weergaven", "views", $json[7][$i]);
$text .= "$title\n";
}}
echo $text;
}



@infotuit  Youtube Search api  kodi￼Enter
