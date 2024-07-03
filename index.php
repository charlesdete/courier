

<!DOCTYPE html>
<html>
    <head> 
        <title>SIGN IN  HERE! </title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
<body>
<section>
<div class="wrapper" id="wrapper" >
  
   <div class="semi-wrapper">
     <nav class="navbar">
        <div class="nav-info">
          <div class="icon">
                  <h2><img src="images/logo.png" alt="Your Logo" /><a href="index.php">CITY COURIER</a></h2>
          </div>
           <div class="menu">
            <ul>
            <li><a href="info.php">HOW IT WORKS</a></li>
            <li><a href="about.php">ABOUT US</a></li>
            <div class="dropdown-center">
  <button class="dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    SIGN IN
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" id="login" >Customer</a></li>
    <li><a class="dropdown-item" href="login_courier.php">Courier</a></li>
  </ul>
</div>

<br>






<!-- login  user-->
      
<div class="popup" >
 <form action=" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
      <div class="card-header">
    <img src="images/close.png" alt="close" class="close">
      <h2>Sign in here!</h2>
    </div>
         
         <div class="form-group ">
             
               <input type="text" name="Name" placeholder="Name" class="input-style"></br>
               
               <input type="email" name="Email" placeholder="Email" class="input-style">
                
               <input type="password" name="Password"placeholder="Password" class="input-style">
               <br/>
               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" name="remember" id="flexCheckIndeterminate">
  <label class="form-check-label" for="flexCheckIndeterminate">
    Remember me
  </label>
</div>
        
               </br>
            
               <button type="submit" name="loginbtn"  class="button">Login
               </button>
               </br>
             
            </div>
          </form> 
         </div> 
      </div> 
      
      <?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// declare the post variables from form input
$email=validate($_POST['Email']);
$password=validate($_POST['Password']);
$set_remember = $_POST['remember'];

include 'dbh.class.php';
include 'login.class.php';
include 'login.contr.class.php';

$login = new loginContr($email, $password, $set_remember );
$login->showLoginUser();

 
}
?>


<script>
 document.getElementById("login").addEventListener("click", function(){
 
  document.querySelector(".popup").style.display = "flex";
   document.querySelector(".semi-wrapper").classList.add('blur'); 
   document.getElementById(".popup").classList.remove('clear');
    
 })
 document.querySelector(".close").addEventListener("click", function(){
  document.querySelector(".popup").style.display ="none";
  document.querySelector(".semi-wrapper").classList.remove('blur');

 })
</script>
   
            <!-- <li><a href="contact.php">CONTACT</a></li> -->

            </ul>

     

          </div>
        </div>
     </nav>




     <div class="content">
       <div class="semi-content">
       <img src="images/postman.jpg">
              <br><br><br><br>
             <h2>FOCUS ON DOING YOUR BEST AND LEAVE THE REST TO US </h2>
            
      
       </div>
            <!-- <div class="delivery">
              <img src="images/delivery.jpeg" alt="">
             </div> -->
                   </br>
               <h2>#Save 25% on your first delivery costs today</h2>
               <p>Create an account  <i id="showregister" class="uil uil-arrow-circle-right"></i></p>

               
<div class="registration">
 <form action=" register-inc.php" method="POST">
      <div class="card-header">
      <img src="images/close.png" alt="closer" class="closer">
      <h2>Sign up here!</h2>
    </div>
         
         <div class="form-group ">
         <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="Name" placeholder="Name" aria-label="First name">
  </div>
  
  <div class="col">
    <input type="text" class="form-control" name="Email" placeholder="Email" aria-label="Last name">
  </div>
</div>
<br/>
<div class="col-12">
    
    <input type="phone" class="form-control" id="phone" name="Phone" placeholder="Phone Number">
  </div>
  <br/>
  <div class="col-12">
    
    <input type="password" class="form-control" id="password" name="Password" placeholder="Password">
  </div>    <br/>          
      
  <div class="col-sm-3">
    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
    <select class="form-select" name="Role" id="specificSizeSelect">
      <option selected>Role..</option>
      <option value="1">Courier</option>
      <option value="0">Customer</option>
    
    </select>
</div>
                

               <br/>
        
               </br>
            
               <button type="submit" name="registerbtn"  class="button">Register
               </button>
            
            </div>
          </form> 
         </div> 
           
         <script>
 document.getElementById("showregister").addEventListener("click", function(){
  document.querySelector(".registration").style.display="flex";
   document.querySelector(".wrapper").classList.add('blur'); 
   document.querySelector(".registration").classList.remove('clear');
    
 })
 document.querySelector(".closer").addEventListener("click", function(){
  document.querySelector(".registration").style.display ="none";
  document.querySelector(".wrapper").classList.remove('blur');

 })
</script>
    </div>
</div>
</br></br>


<section class="slide-container">
   <div class="slides">
    
   <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="images/dreamstime.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/postman.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>


        </br></br>

        <div class="side-content">

            <h3>Route optimization</h3>
            <p> Route optimization software for delivery businesses that care about efficiency.
            Clean, practical routes your drivers will love.     </p>

            <li><a href="learn.php" >Learn more <i class="uil uil-arrow-right"></i></a></li>
        </div>
    </div>

</section>
</br>

<section class="route">
    <div class="route-container">
          <div class="route-content">
           
           <!-- descriptive side-->

           <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btna">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btna">Go somewhere</a>
      </div>
    </div>
  </div>
</div>


                      
        </div>
    </div>
</section>





<footer>

<!-- <i class="uil uil-truck"> -->
<div class="footer_socials">
                <a href="https://youtube.com/egatortutorials" target="_blank"><i class="uil uil-youtube"></i></a>
                <a href="https://facebook.com/egatortutorials" target="_blank"><i class="uil uil-facebook-f"></i></a>
                <a href="https://instagram.com/egatortutorials" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://linkedin.com/egatortutorials" target="_blank"><i class="uil uil-linkedin"></i></a>
                <a href="https://twitter.com/egatortutorials" target="_blank"><i class="uil uil-twitter"></i></a>
            </div> 
            <div class="footer_container">        
                <article>
                    <h4>COURIER</h4 >
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="service.php">Services</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="courier.php">Courier</a></li>
                        </ul>
                </article>
              </div>
              <div class="footer_copyright">
                <small>Copyright &copy;COURIER </small>
              </div>


</footer>
</body>
 
</html>
