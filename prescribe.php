
<?php
include('func1.php');
$pid='';
$ID='';
$appdate='';
$apptime='';
$fname = '';
$lname= '';
$doctor = $_SESSION['dname'];
if(isset($_GET['pid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
$pid = $_GET['pid'];
  $ID = $_GET['ID'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $appdate = $_GET['appdate'];
  $apptime = $_GET['apptime'];
}



if(isset($_POST['prescribe']) && isset($_POST['pid']) && isset($_POST['ID']) && isset($_POST['appdate']) && isset($_POST['apptime']) && isset($_POST['lname']) && isset($_POST['fname'])){
  $appdate = $_POST['appdate'];
  $apptime = $_POST['apptime'];
  //box1
  $drugname1 = $_POST['drugname1'];
  $route1 = $_POST['route1'];
  $frequencytime1 = $_POST['frequencytime1'];
  $quantity1 = $_POST['quantity1'];
  //box2
  $drugname2 = $_POST['drugname2'];
  $route2 = $_POST['route2'];
  $frequencytime2 = $_POST['frequencytime2'];
  $quantity2 = $_POST['quantity2'];
  //box3
  $drugname3 = $_POST['drugname3'];
  $route3 = $_POST['route3'];
  $frequencytime3 = $_POST['frequencytime3'];
  $quantity3 = $_POST['quantity3'];
  $price = $_POST['totalPrice'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $pid = $_POST['pid'];
  $did = $_POST['ID'];
  
  $query=mysqli_query($con,"insert into prestb(doctor,pid,did,fname,lname,appdate,apptime,drugname1,route1,frequencytime1,quantity1,drugname2,route2,frequencytime2,quantity2,drugname3,route3,frequencytime3,quantity3,price) values ('$doctor','$pid','$did','$fname','$lname','$appdate','$apptime','$drugname1','$route1','$frequencytime1','$quantity1','$drugname2','$route2','$frequencytime2','$quantity2','$drugname3','$route3','$frequencytime3','$quantity3','$price')");
    if($query)
    {
      echo "<script>alert('Prescribed successfully!');</script>";
    }
    else{
      echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
//   else{
//     echo "<script>alert('GET is not working!');</script>";
//   }
//   enga error?
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prescriptions</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        .form-container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
    </style>
</head>
<body style="padding-top:50px;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus"></i> WellCare Hospital</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="logout1.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                <li class="nav-item"><a class="nav-link" href="doctor-panel.php"><i class="fa fa-arrow-left"></i> Back</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h3 class="text-center">Prescription</h3>
        <!-- <form id="prescriptionForm" class="form-group"> -->
            <form method="post" action="prescribe.php" class="form-group">
            <input type="hidden" name="fname" value="<?= $fname ?>">
            <input type="hidden" name="lname" value="<?= $lname ?>">
            <input type="hidden" name="appdate" value="<?= $appdate ?>">
            <input type="hidden" name="apptime" value="<?= $apptime ?>">
            <input type="hidden" name="pid" value="<?= $pid ?>">
            <input type="hidden" name="ID" value="<?= $ID ?>">
        <!-- Single Form for All Sections -->
        <form action="process_all.php" method="post">
            <div class="row">
                <!-- First Prescription -->
                <div class="col-md-4">
                    <div class="form-container">
                        <div class="form-group">
                            <label>Drug Name1:</label>
                            <select class="form-control drug-select" name="drugname1" required>
                                <option disabled selected>Select Drug</option>
                                <option value="paracetamol" data-price="5">Paracetamol</option>
                                <option value="omeprazole" data-price="7">Omeprazole</option>
                                <option value="metformin" data-price="10">Metformin HCL</option>
                                <option value="pantoprazole" data-price="6">Pantoprazole</option>
                                <option value="diclofenace" data-price="8">Diclofenace</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Route:</label>
                          <select class="form-control" name="route1" required>
                              <option disabled selected>Select Route</option>
                              <option value="oral">Oral</option>
                              <option value="ointment">Ointment</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Frequency Time:</label>
                          <input type="text" class="form-control" name="frequencytime1" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <input type="number" class="form-control quantity" name="quantity1" required>
                        </div>
                        <div class="form-group">
                            <h5>Price: Rs. <span class="price">0</span></h5>
                        </div>
                    </div>
                </div>

                <!-- Second Prescription -->
                <div class="col-md-4">
                    <div class="form-container">
                        <div class="form-group">
                            <label>Drug Name2:</label>
                            <select class="form-control drug-select" name="drugname2" required>
                                <option disabled selected>Select Drug</option>
                                <option value="paracetamol" data-price="5">Paracetamol</option>
                                <option value="omeprazole" data-price="7">Omeprazole</option>
                                <option value="metformin" data-price="10">Metformin HCL</option>
                                <option value="pantoprazole" data-price="6">Pantoprazole</option>
                                <option value="diclofenace" data-price="8">Diclofenace</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Route:</label>
                          <select class="form-control" name="route2" required>
                              <option disabled selected>Select Route</option>
                              <option value="oral">Oral</option>
                              <option value="ointment">Ointment</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Frequency Time:</label>
                          <input type="text" class="form-control" name="frequencytime2" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <input type="number" class="form-control quantity" name="quantity2" required>
                        </div>
                        <div class="form-group">
                            <h5>Price: Rs. <span class="price">0</span></h5>
                        </div>
                    </div>
                </div>

                <!-- Third Prescription -->
                <div class="col-md-4">
                    <div class="form-container">
                        <div class="form-group">
                            <label>Drug Name3:</label>
                            <select class="form-control drug-select" name="drugname3" required>
                                <option disabled selected>Select Drug</option>
                                <option value="paracetamol" data-price="5">Paracetamol</option>
                                <option value="omeprazole" data-price="7">Omeprazole</option>
                                <option value="metformin" data-price="10">Metformin HCL</option>
                                <option value="pantoprazole" data-price="6">Pantoprazole</option>
                                <option value="diclofenace" data-price="8">Diclofenace</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Route:</label>
                          <select class="form-control" name="route3" required>
                              <option disabled selected>Select Route</option>
                              <option value="oral">Oral</option>
                              <option value="ointment">Ointment</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Frequency Time:</label>
                          <input type="text" class="form-control" name="frequencytime3" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <input type="number" class="form-control quantity" name="quantity3" required>
                        </div>
                        <div class="form-group">
                            <h5>Price: Rs. <span class="price">0</span></h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Price -->
            <div class="text-center mt-3">
                <h3>Total Price: Rs. <span id="totalPrice">0</span></h3>
                <input type="hidden" id="totalPriceInput" name="totalPrice" value="0">
                <button type="submit" class="btn btn-primary btn-lg mt-3">Submit All</button>
            </div>
        </form>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            function updatePrices() {
                let total = 0;
                
                $(".form-container").each(function () {
                    let drugPrice = $(this).find(".drug-select option:selected").data("price") || 0;
                    let quantity = parseInt($(this).find(".quantity").val()) || 0;
                    let price = drugPrice * quantity;

                    $(this).find(".price").text(price); // Update individual prescription price
                    total += price;
                });

                $("#totalPrice").text(total);
                $("#totalPriceInput").val(total);
            }

            // Update on change of drug or quantity
            $(".drug-select, .quantity").on("change keyup", updatePrices);
        });
    </script>
</body>
</html>


    <script>
        $(document).ready(function() {
            

            document.getElementById("drugSelect").addEventListener("change", function() {
        let selectedOption = this.options[this.selectedIndex];
        let drugPrice = parseFloat(selectedOption.dataset.price) || 0;
        let quantityInput = document.querySelector('input[name="quantity"]');

        // Set default quantity to 1 if empty
        if (!quantityInput.value) {
            quantityInput.value = 1;
        }

        calculateTotal(drugPrice);
        
        // Update total price when quantity changes
        quantityInput.addEventListener("input", function() {
            calculateTotal(drugPrice);
        });
    });

    function calculateTotal(price) {
        let quantity = parseInt(document.querySelector('input[name="quantity"]').value) || 0;
        let total = price * quantity;
        document.getElementById("totalPrice").textContent = total.toFixed(2);
        $("#totalPriceInput").val(total.toFixed(2)); 
    }

           
        });
    </script>
</body>
</html>

