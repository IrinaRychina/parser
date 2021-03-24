<?php
include 'simple_html_dom.php';

// загрузка веб страницы
//$data = file_get_html('https://www.sports.ru/karen-khachanov/calendar/');
$data = file_get_html('https://www.sports.ru/naomi-osaka/calendar/');

$scores = [];
if($data->innertext!='' and count($data->find('.bordR'))){
    foreach($data->find('.bordR') as $bordR){
        foreach($bordR->find('a') as $bordR_a){
            $scores[] = $bordR_a->plaintext;
        }
    }
}
$my_score = 0;
$opponent_score = 0;
$wins = 0;
$all_games = 0;
foreach($scores as $score){
    $results = str_split($score);
    $my_score += $results[0];
    $opponent_score += $results[2];
    $all_rounds += 1;
    if ($results[0] > $results[2]){
        $wins += 1;
    }
}
echo 'Количество голов спорстмена: ' . $my_score . '<br> Количество голов оппонента: ' . $opponent_score . '<br> Количество побед в раунде: ' . $wins . '<br> Всего раундов: ' . $all_rounds;
//очистка памяти
$data->clear();
unset($data);