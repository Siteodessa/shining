<?php
/* получатели */
$to= "Lama <siteodessa.com@gmail.com>" . ", " ; //обратите внимание на запятую
$to .= "Drama <siteodessa.com@gmail.com>";
$month = $price = $day =  $year = $hours = $name = $phone = $quantity = $total_price = $price = '';
$month = $_POST['month'];
$year = $_POST['year'];
$day = $_POST['day'];
$hours = $_POST['hours'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$quantityvar = (int) $quantity;
$price = (int) $price;
  if ($quantityvar > 4){
      while ($quantityvar > 4){
        $price = $price + 100;
        $quantityvar--;
      }
}

$total_price = $price;

$subject = "Почта квеста Сияние";  $message = '
<html>
<head>
 <title>Почта квеста Сияние</title>
</head>
<body>
<p>У вас новая бронь!</p>
Дата брони: '. $day .''. $month .''. $year .';
Часы брони: '. $hours .';
Имя клиента: '. $name .';
Телефон клиента: '. $phone .';
Количество игроков: '. $quantity .';
Стоимость игры: '. $total_price .' грн;


Спасибо за обращение к нашей компании
</body>
</html>
';

$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

/* дополнительные шапки */
$headers .= "From: Birthday Reminder <siteodessa.com@gmail.com>\r\n";
$headers .= "Cc: siteodessa.com@gmail.com\r\n";
$headers .= "Bcc: siteodessa.com@gmail.com\r\n";

/* и теперь отправим из */
mail($to, $subject, $message, $headers);

print_r('');
 // <img class="jon" src="/images/jonny.jpg" />



 require_once 'config.php';


 $month = $years = $day = $hours = $name = $phone = $quantity = $price = "";
 $quantity_err = $years_err = $day_err = $hours_err = $name_err = $phone_err = $quantity_err = $price_err = "";

 if($_SERVER["REQUEST_METHOD"] == "POST"){

 // function check_input($db_stringname, $variabl, $err)
 // {
 //   $input = trim($_POST[$db_stringname]);
 //   if(empty($input)){
 //       $err[0] = "Введи задание.";
 //   } elseif(!filter_var(trim($_POST[$db_stringname]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z-А-ЯЁ-а-яёр'-.\s ]+$/")))){
 //       $err[1] = 'Введи корректное задание.';
 //   } else{
 //       $variabl = $input;
 //       return $variabl;
 //   }
 // }
 //
 // check_input("month", $month, $month_err);
 // check_input("year", $year, $year_err);
 // check_input("day", $day, $day_err);
 // check_input("hours", $hours, $hours_err);
 // check_input("name", $name, $name_err);
 // check_input("phone", $phone, $phone_err);
 // check_input("quantity", $quantity, $quantity_err);
 // check_input("price", $price, $price_err);

 $input_month = trim($_POST["month"]);
 if(empty($input_month)){
     $month_err = "Please enter the price amount.";
 } elseif(!ctype_digit($input_month)){
     $month_err = 'Please enter a positive price value.';
 } else{
     $month = $input_month;
 }

 $input_year = trim($_POST["year"]);
 if(empty($input_year)){
     $year_err = "Please enter the price amount.";
 } elseif(!ctype_digit($input_year)){
     $month_year = 'Please enter a positive price value.';
 } else{
     $year = $input_year;
 }

 $input_day = trim($_POST["day"]);
 if(empty($input_day)){
     $day_err = "Please enter the price amount.";
 } elseif(!ctype_digit($input_day)){
     $month_day = 'Please enter a positive price value.';
 } else{
     $day = $input_day;
 }

 $input_hours = trim($_POST["hours"]);
 if(empty($input_hours)){
     $hours_err = "Please enter the price amount.";
 } else{
     $hours = $input_hours;
 }

 $input_name = trim($_POST["name"]);
 if(empty($input_name)){
     $name_err = "Please enter the price amount.";
 } else{
     $name = $input_name;
 }

 $input_phone = trim($_POST["phone"]);
 if(empty($input_phone)){
     $phone_err = "Please enter the price amount.";
 } else{
     $phone = $input_phone;
 }

 $input_quantity = trim($_POST["quantity"]);
 if(empty($input_quantity)){
     $quantity_err = "Please enter the price amount.";
 } elseif(!ctype_digit($input_quantity)){
     $month_quantity = 'Please enter a positive price value.';
 } else{
     $quantity = $input_quantity;
 }

 $input_price = trim($_POST["price"]);
 if(empty($input_price)){
     $price_err = "Please enter the price amount.";
 } else{
     $price = $input_price;
 }




       if(empty($month_err)){



           $sql = "INSERT INTO bronirovki ( month , years , day , hours , name , phone , quantity , price ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


           if($stmt = mysqli_prepare($link, $sql)){
               // Bind variables to the prepared statement as parameters
               mysqli_stmt_bind_param($stmt, "sissssss", $param_month , $param_years , $param_day , $param_hours , $param_name , $param_phone , $param_quantity , $param_price );


               $param_month = $month;
               $param_years = $year;
               $param_day = $day;
               $param_hours = $hours;
               $param_name = $name;
               $param_phone = $phone;
               $param_quantity = $quantity;
               $param_price = $price;



               // Attempt to execute the prepared statement
               if(mysqli_stmt_execute($stmt)){

               } else{
                   echo "Something went wrong. Please try again later.";
               }
           }

           // Close statement
           mysqli_stmt_close($stmt);
       }

       // Close connection
       mysqli_close($link);
   }



print_r('
<div class="cont">
<div class="row">
<div class="col-md-6">

<div id="envelope">
  <div id="card">
    <p>
      Мы уже заждались, '. $name .'!
    </p>
    <div id="dribbble"></div>
  </div>
</div>
</div>
<div class="col-md-6 ress">
<div class="rz">
<div class="rs rtime">Дата брони: <div class="res">'. $day .'-'. $month .'-'. $year .'</div></div>
<div class="rs rhour">Часы брони: <div class="res">'. $hours .'</div></div>
<div class="rs rname">Имя клиента: <div class="res">'. $name .'</div></div>
<div class="rs rphone">Телефон клиента: <div class="res">'. $phone .'</div></div>
<div class="rs rquantity">Количество игроков: <div class="res">'. $quantity .'</div></div>
<div class="rs rprice">Стоимость игры: <div class="res">'. $total_price .' грн</div></div>
</div>
</div>
</div>
');



  exit();

 ?>
