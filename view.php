<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>ERA - Product Pricing</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="main">
    
<?php
class Order{
    public $customerName;
    public $phone;
    public $pumpVoltage;
    public $cableLength;
    public $price_per_meter;
    public $area;

    public function __construct($_customerName,$_phone,$_pumpVoltage,$_cableLength){
        $this->customerName=$_customerName;
        $this->phone=$_phone;
        $this->pumpVoltage=$_pumpVoltage;
        $this->cableLength=$_cableLength;
    }

    public function cleanData($_customerName){
        $this->customerName=trim($this->customerName);
        $this->customerName=stripslashes($this->customerName);
        $this->customerName=htmlspecialchars($this->customerName);
        return $this->customerName;
    }
    public function calcPrice(){
        if($this->pumpVoltage == 24){
            if($this->cableLength<=25){
                $this->area="2.5 mm2";
                $this->price_per_meter=4.8;
                $result=$this->cableLength*$this->price_per_meter;
                return "$".$result;
            }
            elseif($this->cableLength>25 && $this->cableLength<=50){
                $this->area="4 mm2";
                $this->price_per_meter=6;
                $result=$this->cableLength*$this->price_per_meter;
                return "$".$result;
            }
            else{
                return "Maximum cable length is 50 Meter";
            }
        }
        if($this->pumpVoltage == 48){
            if($this->cableLength<=35){
                $this->area="2.5 mm2";
                $this->price_per_meter=4.8;
                $result=$this->cableLength*$this->price_per_meter;
                return "$".$result;
            }
            elseif($this->cableLength>35 && $this->cableLength<=70){
                $this->area="4 mm2";
                $this->price_per_meter=6;
                $result=$this->cableLength*$this->price_per_meter;
                return "$".$result;
            }
            else{
                return "Maximum cable length is 70 Meter";
            }
        }
        if($this->pumpVoltage == 72){
            if($this->cableLength<=40){
                $this->area="2.5 mm2";
                $this->price_per_meter=4.8;
                $result=$this->cableLength*$this->price_per_meter;
                return "$".$result;
            }
            elseif($this->cableLength>40 && $this->cableLength<=80){
                $this->area="4 mm2";
                $this->price_per_meter=6;
                $result=$this->cableLength*$this->price_per_meter;
                return "$".$result;
            }
            else{
                return "Maximum cable length is 80 Meter";
            }
        }
    }
}

if(isset($_POST['name'])){
$_name=$_POST['name'];
$_phone=$_POST['phone'];
$_volt=$_POST['pump_type'];
    if(empty($_POST['length'])){
        $_cableLength=0;
    }
    else{
        $_cableLength=$_POST['length'];
    }
//// Validation Data
    $validData=true;
    if(empty($_name)){
        $name_error="Please, Insert your valid name";
        $validData=false;
    }
    if(!preg_match('/(?=^.{0,40}$)^[a-zA-Z-]+\s[a-zA-Z-]+$/',$_name)){
        $name_error="Please, Insert valid name ex:- Omar Ghoniem";
        $validData=false;
    }
    if(empty($_phone) || !preg_match('/^[0-9]{11}$/',$_phone)){
        $phone_error="Please, Insert valid mobile number";
        $validData=false;

    }
    if(empty($_volt)){
        $pump_voltage_error="Please, Select solar pump voltage";
        $validData=false;

    }
    if(isset($_POST['checkcable']) && empty($_cableLength)){
        $cable_error="Please, Insert Cable Length";
        $validData=false;
    }
        $order1= new Order($_name,$_phone,$_volt,$_cableLength);
        $order1->cleanData($_name);
        $order1->calcPrice();
}
else{
header("location:index.php");
}
include('index.php');

?>

<div class="container" <?php if($validData==false){echo "hidden"; }?>>
        <div class="col-4 py-5 total">
            <div class="row">
            <div class="col-6">
                    <h6>Customer Name:</h6>
                    <p><?php if($validData==true){echo $order1->customerName;} ?></p>
            </div>
            <div class="col-6">
                    <h6>Mobile Number:</h6>
                    <p><?php if($validData==true){echo $order1->phone;} ?></p>
            </div>
            <div class="col-6">
                    <h6>Pump Voltage:</h6>
                    <p><?php if($validData==true){echo $order1->pumpVoltage;} ?></p>
            </div>
            <div class="col-6">
                    <h6>Price Per Meter:</h6>
                    <p><?php if($validData==true){echo $order1->price_per_meter;} ?></p>
            </div>
            <div class="col-6">
                    <h6>Cable length:</h6>
                    <p><?php if($validData==true){echo $order1->cableLength;} ?></p>
            </div>
            <div class="col-6">
                    <h6>Cross Sectional Area:</h6>
                    <p><?php if($validData==true){echo $order1->area;} ?></p>
            </div>
            <h3 class="col-12 mt-4 text-center">Price of Cable</h3>
            <h1 class="col-12 text-center price mt-3"><?php echo $order1->calcPrice(); ?></h1>
            </div>
            <a href="index.php" class="btn btn-danger col-12 mt-5">Back</a>
         </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>