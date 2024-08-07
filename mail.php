<?php
    // Получение данных с формы:
    $name = htmlspecialchars($_POST['firstName']);
    $tel = htmlspecialchars($_POST['phone']);
   
    // Параметры для функции mail:
    $source = getenv('HTTP_REFERER');
    $subject = 'Обратный звонок';
    $message = "Текст письма:
        <br><br>
        Имя: $name<br>
        Телефон: $tel<br>
    ";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-type: text/html; charset=utf-8\r\n";

    // Отправка данных на почту:
    $success = mail("alena.shelkovich@gmail.com", $subject, $message, $headers);

    // Сохранение инфо о лидах в файл leads.xls :

    $date=date("d.m.y"); // число.месяц.год  
    $time=date("H:i"); // часы:минуты:секунды

    $f = fopen("leads.xls", "a+");
    fwrite($f," <tr>");    
    fwrite($f," <td>$name</td> <td>$tel</td>");   
    fwrite($f," <td>$source</td>");    
    fwrite($f," </tr>");  
    fwrite($f,"\n ");    
    fclose($f);
?>