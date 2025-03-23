<?php
include('func1.php');
// session_start();

$pid = $_GET['pid'] ?? '';
$ID = $_GET['ID'] ?? '';
$appdate = $_GET['appdate'] ?? '';
$apptime = $_GET['apptime'] ?? '';
$fname = $_GET['fname'] ?? '';
$lname = $_GET['lname'] ?? '';
$doctor = $_SESSION['dname'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prescribe'])) {
    $pid = $_POST['pid'];
    $ID = $_POST['ID'];
    $appdate = $_POST['appdate'];
    $apptime = $_POST['apptime'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $drugname = $_POST['drugname'] ?? '';
    $route = $_POST['route'];
    $frequencytime = $_POST['frequencytime'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $query = mysqli_query($con, "INSERT INTO prestb (doctor, pid, ID, fname, lname, appdate, apptime, drugname, route, frequencytime, quantity, price) 
                              VALUES ('$doctor', '$pid', '$ID', '$fname', '$lname', '$appdate', '$apptime', '$drugname', '$route', '$frequencytime', '$quantity', '$price')");
    
    if ($query) {
        echo "<script>alert('Prescribed successfully!');</script>";
    } else {
        echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prescription</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <style>
        .bg-primary { background: linear-gradient(to right, #3931af, #00c6ff); }
        .btn-primary { background-color: #3c50c1; border-color: #3c50c1; }
        button:hover, #inputbtn:hover { cursor: pointer; }
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
    
    <div class="container" style="margin-top:80px;">
        <h3 class="text-center" style="font-family: 'IBM Plex Sans', sans-serif;">Prescription</h3>
        
        <form method="post" action="prescribe.php" class="form-group">
            <input type="hidden" name="fname" value="<?= $fname ?>">
            <input type="hidden" name="lname" value="<?= $lname ?>">
            <input type="hidden" name="appdate" value="<?= $appdate ?>">
            <input type="hidden" name="apptime" value="<?= $apptime ?>">
            <input type="hidden" name="pid" value="<?= $pid ?>">
            <input type="hidden" name="ID" value="<?= $ID ?>">
            
            <div class="form-group">
                <label>Serial No:</label>
                <textarea class="form-control" name="srno" required></textarea>
            </div>
            <div class="form-group">
                <label>Date:</label>
                <textarea class="form-control" name="date" required></textarea>
            </div>
            <div class="form-group">
                <label>Drug Name:</label>
                <select class="form-control " name="drugname" id="drugSelect" required>
                    <option disabled selected>Select Drug</option>
                     <option value="paracetamol" data-price="5">Paracetamol - $5</option>
                    <option value="omeprazole" data-price="7">Omeprazole - $7</option>
                    <option value="metformin hcl" data-price="10">Metformin HCL - $10</option>
                    <option value="pantoprazole" data-price="6">Pantoprazole - $6</option>
                    <option value="diclofenace" data-price="8">Diclofenace - $8</option>
                    <option value="lovastatin" data-price="12">Lovastatin - $12</option>
                    <option value="trimethoprim" data-price="9">Trimethoprim - $9</option>
                    <option value="paroxetine" data-price="11">Paroxetine - $11</option>
                    <option value="brufin" data-price="4">Brufin - $4</option>
                    <option value="dermosporin" data-price="15">Dermosporin - $15</option>
                    <option value="terbiderm" data-price="14">Terbiderm - $14</option>
                    <option value="aquazole" data-price="13">Aquazole - $13</option>
                </select>
            </div>
            <div class="form-group">
                <label>Route:</label>
                <select class="form-control" name="route" required>
                    <option disabled selected>Select Route</option>
                    <option value="oral">Oral</option>
                    <option value="ointment">Ointment</option>
                </select>
            </div>
            <div class="form-group">
                <label>Frequency Time:</label>
                <textarea class="form-control" name="frequencytime" required></textarea>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="number" class="form-control" name="quantity" required></input>
            </div>
            <div class="form-group">
               <h4>Total Price: $<span id="totalPrice">0</span></h4>
            </div>

            

            
            <button type="submit" name="prescribe" class="btn btn-primary btn-block">Prescribe</button>
        </form>
    </div>

   <script>
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
    }
</script>

</body>
</html>
