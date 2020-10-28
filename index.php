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

    <div class="container">
        <div class="row">
            <div class="col-6 m-auto py-5">
                <form action="view.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>">
                        <?php if(isset($name_error)){
                            echo '<div class="alert alert-danger mt-2 pt-2 pb-2" style="font-size:14px;">'.$name_error.'</div>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your mobile number" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; } ?>">
                        <?php if(isset($phone_error)){
                            echo '<div class="alert alert-danger mt-2 pt-2 pb-2" style="font-size:14px;">'.$phone_error.'</div>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="voltage">Choose Solar Pump Voltage</label>
                        <select name="pump_type" id="voltage" class="form-control">
                            <option value="">-- Select One --</option>
                            <option value="24">Solar Pump - 24 V</option>
                            <option value="48">Solar Pump - 48 V</option>
                            <option value="72">Solar Pump - 72 V</option>
                        </select>
                        <?php if(isset($pump_voltage_error)){
                            echo '<div class="alert alert-danger mt-2 pt-2 pb-2" style="font-size:14px;">'.$pump_voltage_error.'</div>';
                        } ?>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" onchange="showHide(this.checked)" name="checkcable" <?php if(isset($_POST['checkcable'])){ echo "checked"; } ?>>
                        <label class="form-check-label" for="exampleCheck1">Yes, I Need Extra Cable</label>
                    </div>
                    <div class="form-group mt-3" id="cable_length" <?php if(!isset($_POST['checkcable'])){ echo 'style="display: none;"'; } ?>>
                        <label for="exampleInputEmail1">Cable Length</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Cable Length" name="length">
                        <?php if(isset($cable_error)){
                            echo '<div class="alert alert-danger mt-2 pt-2 pb-2" style="font-size:14px;">'.$cable_error.'</div>';
                        } ?>
                    </div>
                    <button type="submit" class="btn btn-success mt-2" name="submit">Calculate</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>