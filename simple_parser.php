<?php
function Parser($search_string, $unique_expression_start, $unique_expression_end)
{
    $unique_expression_start_position = strpos($search_string, $unique_expression_start);
    if ($unique_expression_start_position === false){
        return 0;
    }
    $first_cut = substr($search_string, $unique_expression_start_position);
    $unique_expression_end_position = strpos($first_cut, $unique_expression_end);
    $second_cut = substr($first_cut, 0, $unique_expression_end_position);
    return strip_tags($second_cut);
}

$string = file_get_contents('https://obninsksite.ru/');
echo Parser($string, '<title>', '</title>');