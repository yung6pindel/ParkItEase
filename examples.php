<?php
date_default_timezone_set('Europe/Sofia');

$current_datetime = date("c");

echo"<br>";
$current_time = date("g:i A", time());
echo "Current time is: " . $current_datetime;
?>
<form method="post">
    <input type="time" name="userTime">
    <input type="datetime-local" name="datetime">
    <input type="text" name="plate" id="plate">
    <button type="submit">Submit</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userTime = $_POST["userTime"];
    echo "User input time: " . $userTime;
    echo"<br>";
    $datetime = $_POST["datetime"];
    echo "User input datetime: " . $datetime;
    echo"<br>";
    if ($datetime >= $current_datetime) {
        echo "You made reservation for " . $datetime;
    } else {
        echo "Error: You cannot make a reservation for a past date or time. " . $current_datetime . " " . $datetime;

    }
}
//$random = rand(100, 105);
//while ($random != 102) {
//    $random = rand(100, 105);
//    echo"<br>";
//    echo $random;
//}
echo"<br>";
$patterns ='/^([EA|E|A|B|BT|BH|BP|EB|TX|K|OB|M|PA|PK|EH|PB|PP|P|CC|CH|CM|CO|C|CA|CB|CT|T|X|H|Y]|[ЕА|Е|А|В|ВТ|ВН|ВР|ЕВ|ТХ|К|КН|ОВ|М|РА|РК|ЕН|РВ|РР|Р|СС|СН|СМ|СО|С|СА|СВ|СТ|Т|Х|Н|У]){1}+\d{4}+([АВЕКМНОРСТУХ]|[ABEKMHOPCTYX]){2}$/ui';
$plate = $_POST["plate"];
$plate = strtoupper($plate);
if (preg_match($patterns, $plate)) {
    echo "Valid plate";
} else {
    echo "Invalid plate";
}


?>