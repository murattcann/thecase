<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require(__DIR__."/autoload.php");

use App\Enums\Cabin;
use App\Helpers\Cabinet;

$roofs = Cabin::ROOFS;
$cabinet = new Cabinet();
/**
 * Aşağıda farklı senaryolara göre kullanım testleri bulunaktadır.
 * 
 * -> SENARYO 1 - Raflar boş iken (instance ilk oluştuğunda hepsi boş) içecek almaya çalışmak  
 * -> SENARYO 2 - Rafları doldurma  
 * -> SENARYO 3 - Raflar dolu iken rafa eklemek
 * -> SENARYO 4 - Raflar dolu iken birer tane almak  
 */


 //SENARYO 1 
 
 
 echo "<br>--------------------- SENARYO 1 --------------------- <br>";
 echo  $cabinet->cabinetStatus();
 echo "------------ <br>";
 foreach($roofs as $roof){
     $cabinet->take($roof);
 }

 echo "<br>--------------------- SENARYO 2 --------------------- <br>";
 echo  $cabinet->cabinetStatus();
 echo "------------ <br>";
 foreach($roofs as $roof){
     for($i = 1; $i<=20;  $i++){
        $cabinet->add($roof);
     }
 }
 
 echo "<br>--------------------- SENARYO 3 --------------------- <br>";
 echo  $cabinet->cabinetStatus();
 echo "------------ <br>";
 foreach($roofs as $roof){
    $cabinet->add($roof);   
 }

 echo "<br>--------------------- SENARYO 4 --------------------- <br>";
 echo  $cabinet->cabinetStatus();
 echo "------------ <br>";
foreach($roofs as $roof){
    $cabinet->take($roof);   
 }
 

 //Sonuç 

 echo "<br><br>*-*-*-*-*-*-*-*-*-*-*<br>";
    echo $cabinet->cabinetStatus();
 echo "*-*-*-*-*-*-*-*-*-*-*<br>";

?>