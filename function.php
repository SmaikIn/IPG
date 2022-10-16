<?php
require "config.php";
$today = new DateTime('+1 days');
$today_14 = new DateTime('+14 days');
$today = $today->format('Y-m-d');
$today_14 = $today_14->format('Y-m-d');
function list_doc($connect, $a)
{
    $string = "SELECT * FROM doctors WHERE cat_id = $a ";
    $sql = mysqli_query($connect, $string);
    $sql = mysqli_fetch_all($sql);
    foreach ($sql as $sql) {
        echo "<option value='$sql[0]'>$sql[1]</option>";
    }
}//список докторов в зависимости от выбранной специальности
function list_cat($connect)
{
    $sql = mysqli_query($connect, "SELECT * FROM category ");
    $sql = mysqli_fetch_all($sql);
    foreach ($sql as $sql) {
        echo "<option value='$sql[0]'>$sql[1]</option>";
    }
}//список специальностей
function check_time($connect, $p1, $p2)
{
    $string = "SELECT `time`.`id`, `time`.`time_range` FROM `tickets` INNER JOIN `time` on `time`.`id` != `tickets`.`time_id` WHERE `doc_id` = $p2 and `date` = '$p1'";
    $sql = mysqli_query($connect, $string);
    $sql = mysqli_fetch_all($sql);
    if (empty($sql)) {
        $string = "SELECT * FROM `time` ";
        $sql = mysqli_query($connect, $string);
        $sql = mysqli_fetch_all($sql);
    }
    echo $string;
    foreach ($sql as $sql) {
        echo "<option value='$sql[0]'>$sql[1]</option>";
    }

}//проверка доступности времени
function submit_form($connect, $p1, $p2, $p3, $p4, $p5)
{
    $string = "INSERT INTO `tickets`(`id`, `name`, `doc_id`, `date`, `time_id`) VALUES (NULL,'$p1',$p2,'$p3',$p4)";
    $sql = mysqli_query($connect, $string);
    $subject = "Запись к врачу";
    $to = $p5;
    $from = "www_nick2690@mail.ru";
    $message = htmlspecialchars("Вы успешно записаны к врачу");
    $message = urldecode($message);
    $headers = "From : $from" . "\r\n" .
        "Reply-to $from" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();
    if (mail($to, $subject, $message, $headers)) {
        echo "Вы успешно записаны к врачу";
    } else {
        echo "Ошибка";
    }
}

if (isset($_POST['cat_fun'])) {
    list_doc($connect, $_POST['category']);
}
if (isset($_POST['check_time'])) {
    check_time($connect, $_POST['date'], $_POST['doctors']);
}
if (isset($_POST['submit'])) {
    submit_form($connect, $_POST['name'], $_POST['doctors'], $_POST['date'], $_POST['time'], $_POST['email']);
}
