<?php 
namespace App\Helpers;
use App\Enums\Cabin;
use App\Helpers\Interfaces\ICabinet;


/**
 * @author Murat CAN <muratcan.php@gmail.com>
*/
class Cabinet implements ICabinet
{
    // True is open, false is closed
    private $cabinetDoorStatus = false;


    public function __construct()
    {
        if(!isset($_SESSION["roofs"])){
           foreach(Cabin::ROOFS as $roof){
               $_SESSION["roofs"][$roof] = 0;
           }
        }
    }

    public function getRoofCapacity(string $roof) :int{
        return $_SESSION["roofs"][$roof];
    }


    public function add(string $roof){
        $currentCount = $this->getRoofCapacity($roof);
        
        if($currentCount >= Cabin::ROOF_LIMIT){
            echo $roof. " rafı için maksimum kapasiteye ulaşıldı <br>";
            return false;
        }
        $this->doorStatus();
        $_SESSION["roofs"][$roof] = $currentCount + 1;
        echo "1 adet şişe ". $roof . " rafına eklendi <br>";
        $this->doorStatus();
    }

    public function take(string $roof){
        $currentCount = $this->getRoofCapacity($roof);
        
        if($currentCount < 1){
            echo $roof. " rafında hiç içecek kalmamış <br>";
            return false;
        }
        
        $this->doorStatus();
        $_SESSION["roofs"][$roof] = $currentCount - 1;
        echo "1 adet şişe ". $roof . " rafından alındı <br>";
        $this->doorStatus();

    }

    public function doorStatus(){
        if($this->cabinetDoorStatus === true){
            echo "Dolabın kapağı açık, kapanıyor <br>";
            $this->cabinetDoorStatus == false;
        }
        if($this->cabinetDoorStatus === false){// if the cabinet door is opened
            echo "Dolabın kapağı kapalı, açılıyor. <br>";
            $this->cabinetDoorStatus == true;
        }
        return $this->cabinetDoorStatus;
    }

    public function emptyRoofCount() :int{
        $count = 0;
        foreach(Cabin::ROOFS as $roof){
            $currentRoof = $_SESSION["roofs"][$roof];
            if($currentRoof < 1) $count = $count+1;
        }
        
        return $count;
    }

    public function fullRoofCount() :int{
        $count = 0;
        foreach(Cabin::ROOFS as $roof){
            $currentRoof = $_SESSION["roofs"][$roof];
            if($currentRoof == Cabin::ROOF_LIMIT) $count =  $count+1;
        }
        
        return $count;
    }

    public function cabinetStatus(){
        
        if($this->emptyRoofCount() == count(Cabin::ROOFS)){ 
            echo "Dolap tamamen boş <br>";
        }else if($this->fullRoofCount() == count(Cabin::ROOFS)){ 
            echo "Dolap tamamen dolu <br>";
        }else if($this->emptyRoofCount() < count(Cabin::ROOFS)){
            echo "Dolap kısmen dolu <br>";
        }else{
            echo "Dolap durumu hakkında bilgi alınamıyor... <br>";
        }
        
    }
}
    
?>