<?php
include 'header.php';

if(!isset($_SESSION['Email'])){
    header ('location:login.php'); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Placement</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="app.js" defer></script> 
</head>
<body>
    
    <div class="card2">
    <form action="<?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
         <div class="card-header">
      <h2>Place Your Order!</h2>
    </div>
    <div class="progressbar">
     <div class="progress" id="progress"></div>

         <div class="progress-step active" data-title="Name" ></div>
         <div class="progress-step" data-title="Package"></div>
         <div class="progress-step" data-title="Date"></div>
         
    </div>


    <div class="form-step active">
            <div class="form-group ">
                <div class="row g-3">
                   <div class="col">
                    <input type="text" class="form-control" name="sender_name" placeholder="Sender`s Name" aria-label="Sender`s Name"  required>
                   </div>
                  <div class="col">
                    <input type="text" class="form-control" name="sender_address" placeholder="Sender`s Address" aria-label="Sender`s Address"  required>
                   </div>
                 </div>
            
<br>
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" name="recipient_name" placeholder="Recipient`s Name" aria-label="Recipient`s Name"  required>
            </div>
            <div class="col">
                    <input type="text" class="form-control" name="recipient_address" placeholder="Recipient`s Address" aria-label="Recipient`s Address"  required>
            </div>
            </div>
        </div>
        </br>
        <div class="">
            <button  class="btna btn-next with-50 ml-auto">Next</button>
        </div>
    </div>
<br>

    <div class="form-step">
    <div class="row g-3">
                <div class="col">
                
                <input type="text" class="form-control" name="package_weight" id="inputAddress" placeholder="Package Weight"  required>
            </div>
            
                    <div class="col-md-12">
                        <label for="weight-range">Weight Range:</label>
                        <select id="weight-range" class="form-select" name="weight-range">
                            <option value="0-10">0-10 kg</option>
                            <option value="11-30">11-30 kg</option>
                            <option value="31-90">31-90 kg</option>
                        </select>
                    
                    </div>
                    <div class="col-md-12">
                        <label for="package_category">Package Category:</label>
                        <select id="package_category" class="form-select" name="package_category">
                            <option value="food">Food</option>
                            <option value="electonics">Electronics</option>
                            <option value="delicate">Delicate</option>
                        </select>
                    </div>
                    
        
            </br>
            <div class="btna-group">
            <button class="btna btn-prev">Previous</button>
            <button class="btna btn-next">Next</button>
            </div>
        </div>
    </div>
</br>
<div class="form-step">
     <div class="row g-3">
          <div class="col">
              <label for="inputPickup_date" class="form-label">Pickup Date</label>
              <input type="date" class="form-control" name="pickup_date" placeholder="Pickup Date" aria-label="pickup date"  required>
           </div>
         <div class="col">
             <label for="inputPrice" class="form-label">Order Price</label>
             <input type="int" class="form-control" name="price" placeholder="Order price" aria-label="Sender`s Address" required>
         </div>
     </div>
<br>
           <div class="btna-group">
            <button class="btna btn-prev">Previous</button>
            <button type="submit" class="btna btn-next" name="orderbtn">Submit</button>
            </div>
    </div>        
    </div>
    </form>
    </div>
</body>
</html>


<?php

if(isset($_POST['orderbtn'])){

   //database connection
$servername = "localhost";
$dbname = "courier";
$dbusername = "charlie";
$dbpassword = "root123@";


 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
} 

//

$email = $_SESSION['Email'];  


$sql= "SELECT * FROM user where Email = '$email'";
$query= mysqli_query($conn,$sql);
$user=mysqli_fetch_assoc($query);

// Retrieve form data
$sender_name = $_POST['sender_name'];
$sender_address = $_POST['sender_address'];
$recipient_name = $_POST['recipient_name'];
$recipient_address = $_POST['recipient_address'];
$package_weight = $_POST['package_weight'];
$category =$_POST['package_category'];
$weight_range = $_POST['weight-range'];

$pickup_date = $_POST['pickup_date'];
$price =$_POST['price'];


$user_id= $user['id'];

if ($weight_range < 10  ){
     $courier = 'Bicycle';
}elseif($weight_range  > 11 - 30 ){
     $courier = 'Motorbike';
}elseif($weight_range >= 31 - 90 ){
    $courier = 'Car';

}elseif($weight_range > 91){
    $courier ='Truck';
}

// Generate unique tracking ID
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$max = strlen($characters) - 1;
$tracking_id = '';
$tracking_id_length = 10;


// Function to check if tracking ID is unique
function isTrackingIDUnique($tracking_id, $conn) {
    $query = "SELECT COUNT(*) as count FROM orders WHERE tracking_id = '$tracking_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['count'] == 0;
}
// Loop until a unique tracking ID is generated
do {
    $tracking_id = '';
    for ($i = 0; $i < $tracking_id_length; $i++) {
        $tracking_id .= $characters[mt_rand(0, $max)];
    }
} while (!isTrackingIDUnique($tracking_id, $conn));

// Insert order into database
$query = "INSERT INTO orders (sender_name, sender_address, recipient_name, recipient_address, package_weight,package_category, tracking_id,assigned_courier,user_id,pickup_date,price)
          VALUES ('$sender_name', '$sender_address', '$recipient_name', '$recipient_address', '$package_weight','$category', '$tracking_id','$courier','$user_id','$pickup_date','$price')";

if (mysqli_query($conn, $query)) {
    echo "Order placed successfully. Tracking ID: $tracking_id";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

}

?>