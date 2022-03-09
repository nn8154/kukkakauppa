<?php
    include('./../kukka/config/db_connect.php');

    //DELETE - function
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM kukat WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            //success
            header('Location: index.php');
        } {
            //failure
            echo 'query error: ' .mysqli_error($conn);
        }
    }

    //check GET request id param
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        //make sql
        $sql = "SELECT * FROM kukat WHERE id = $id";
        //get the query result
        $result = mysqli_query($conn, $sql);

        //fetch result in array format
        $kukka = mysqli_fetch_ASSOC($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        //print_r($pizza);

    }
?>

<!DOCTYPE html>
<html>

<?php include('./../kukka/templates/header.php'); ?>

<div class="container center blue-grey-text">
    <?php if($kukka): ?>
        <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="kuvat/logo1.jpg" class="kukka" alt="kukka" width="250" height="130">
                    <div class="card-content-center card-action center-align">
                        <h5>Tuotteen nimi: <?php echo htmlspecialchars($kukka['title']); ?></h5>
                        <h5>Asetelma: <?php echo htmlspecialchars($kukka['flowers']); ?></h5>
                        <h5>Tilannut: <?php echo htmlspecialchars($kukka['email']); ?></h5>
                        <h5>Tilauspäivä: <?php echo date($kukka['created_at']); ?></h5>         
                    </div>

        <!-- DELETE FORM -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $kukka['id'] ?>">
            <input type="submit" name="delete" value="Poista" class="btn brand z-depth-0">
        </form>
    
    <?php else: ?>
        <h5>Tuote ei ole listalla</h5>
    <?php endif; ?>

</div>
</div>    

<?php include('./../kukka/templates/footer.php'); ?>

</html>