<?php



  $db_name  ="user_accounts";
  $db_user  = "root";
  $dp_pass  = "";
  $dsn      ='mysql:host=localhost;dbname='.$db_name ;

/*--------------- create connection----------------------------*/
try{
    $db = new PDO($dsn,$db_user,$dp_pass);

    /*---------------set Attributes ----------------------------*/
$db -> setAttribute( PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e){
  echo 'failed ' . $e->getMessage();
}
