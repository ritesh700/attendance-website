<?php
   include('config.php');
   session_start();
   
   $teacher_check = $_SESSION['login_teacher'];
   
   $ses_sql = mysqli_query($db,"select email from teacher_register where email = '$teacher_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session_teacher = $row['email'];
   
   if(!isset($_SESSION['login_teacher'])){
      header("location:index.php");
      die();
   }
?>