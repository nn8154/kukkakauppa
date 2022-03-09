<?php
    include('./../kukka/config/db_connect.php');

    $email = $title = $flowers = '';
    $errors = array('email' => '', 'title' => '', 'flowers' => '');

    if(isset($_POST['submit'])){

    //check email
    if(empty($_POST['email'])){
        $errors['email'] = 'Sähköposti on sallittu <br />';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Sähköposti salittuun muotoon, @';
        }
    }

    //check title
    if(empty($_POST['title'])){
        $errors['title'] = 'Tuotteen nimi on salittu <br />';
    } else {
         $title = $_POST['title'];
         if(!preg_match('/^[a-zA-Zäö-ÄÖ\s]+$/', $title)){
            $errors['title'] = 'Tuotteen nimessä on vaan kirjaimet ja tyhjä tila';
        }
    }  
    
    //check flowers
    if(empty($_POST['flowers'])){
        $errors['flowers'] = 'Asetelma on sallittu <br />';
    } else {
        $flowers = $_POST['flowers'];
        if(!preg_match('/^([a-zA-Zäö-ÄÖ\s]+)(,\s*[a-zA-Z\s]*)*$/', $flowers)){
            $errors['flowers'] = 'Asetelma on vaan pilkun kautta';
        }
    }

     if (array_filter($errors)){
         //echo 'error in the form';
     } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $flowers = mysqli_real_escape_string($conn, $_POST['flowers']); 

        //create sql INSERT
        $sql = "INSERT INTO kukat(email,title,flowers) VALUES('$email', '$title', '$flowers')";

        //save to db and check
        if(mysqli_query($conn, $sql)){
            //success
            //echo 'form is valid';
            header('Location: index.php');
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
            }
        }
    }   // End of POST check
    
?>

<!DOCTYPE html>
<html>

<?php include('./../kukka/templates/header.php'); ?>
<section class="container grey-text">
    <h4 class="center">Tilaa tuote</h4>
    <form class="white" action="add.php" method="POST">

        <label>Sähköposti:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="blue-text"><?php echo $errors['email'];?></div>

        <label>Tuotteen nimi:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="blue-text"><?php echo $errors['title'];?></div>

        <label>Asetelma (käytä pilkkua):</label>
        <input type="text" name="flowers" value="<?php echo htmlspecialchars($flowers) ?>">
        <div class="blue-text"><?php echo $errors['flowers'];?></div>

        <div class="center">
            <input type="submit" name="submit" value="Lisää" class="btn brand z-depth-0">
        </div>              
    </form>
</section>

<?php include('./../kukka/templates/footer.php'); ?>

</body>
</html>