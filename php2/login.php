<?php  
session_start();
$title = ""; 

// Siirretty admin.php
require_once('././inc/config.php');
require_once('././inc/functions.php');

if (is_user_authenticated()){
    redirect('./../kukka/index.php');
    die();
}

//Testi isset 'login.php'
//if (isset($_POST['login'])){
//    output($_POST);
//}

if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    //echo $_POST['email'];
    //output($_POST);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password']; 

    // compare with data store
    if(authenticate_user($email, $password)){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        redirect('login.php');
        die();
        //header('Location: admin.php');
    } else {
        $status = "The provided crendentials didn't work";
    }

    if ($email == false) {
        $status ='Please enter a valid email address';
    }
}

include('././inc/header.php');

?>

<div class="container">
<div class="container-fluid vh-100">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h5 class="mt-5">Käyttäjätunnukset</h5>
        </div>
    </div>

<div class="row">
    <form action="" method="POST">
    <div class="row justify-content-center align-items-center h-100">  
       <div class="col-md-4 col-md-offset-3">
           <div class = "form-group">
               <label for="email">Email:</label>
               <input class="form-control" type="text" name="email" id="email">
            </div>
        
            <div class = "form-group">
               <label for="password">Password:</label>
               <input class="form-control" type="password" name="password" id="password">
            </div>

            <div class = "form-group">
               <input type="submit" name="login" value="Login">
            </div>
        </div>
    </div>            
    </form>
</div>
</div>


    <div class="row">
        <?php
            if (isset($status)){
                echo $status;
            }
        ?>
    </div>
</div> 

<?php include('././inc/footer.php'); ?>

