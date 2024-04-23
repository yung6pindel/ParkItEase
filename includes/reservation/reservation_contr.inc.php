<?php

declare(strict_types=1);

function is_input_empty(string $regPlate, $regDateTime, $duration){
    if (empty($regPlate) || empty($regDateTime) || empty($duration)){
        return true;
    } else {
        return false;
    }

}
function is_plate_invalid(string $plate){
    $pattern = '/^(EA|E|A|B|BT|BH|BP|EB|TX|K|OB|M|PA|PK|EH|PB|PP|P|CC|CH|CM|CO|C|CA|CB|CT|T|X|H|Y|ЕА|Е|А|В|ВТ|ВН|ВР|ЕВ|ТХ|К|КН|ОВ|М|РА|РК|ЕН|РВ|РР|Р|СС|СН|СМ|СО|С|СА|СВ|СТ|Т|Х|Н|У){1,2}+\d{4}+([АВЕКМНОРСТУХ]|[ABEKMHOPCTYX]){2}$/ui';
    $pattern2 = '/^(AA|АА|ВВ|BB|ЕЕ|EE|КК|KK|ММ|MM|TT|ТТ|XX|ХХ|HH|НН|YY|УУ){1,2}/ui';
    if(!preg_match($pattern, $plate)){
        return true;
    } 
    else if(preg_match($pattern2, $plate)){
        return true;
    }
    else {
        return false;
    }
}
function is_date_invalid($regDateTime){
    date_default_timezone_set('Europe/Sofia');
    $current_datetime = date("c");
    if ($regDateTime < $current_datetime) {
        return true;
    } else {
        return false;
    }
}
function is_number_taken(object $pdo, int $park_Number, int $mallId){
    if(get_number($pdo, $park_Number, $mallId)){
        return true;
    } else {
        return false;
    }
}
function create_reservation($pdo, $mallId, $userId, $regPlate, $regDateTime, $duration, $park_Number){
    set_reservation($pdo, $mallId, $userId, $regPlate, $regDateTime, $duration, $park_Number);
}
