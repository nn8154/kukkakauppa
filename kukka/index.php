<?php
include('./../kukka/config/db_connect.php');

//write query for all kukat
$sql = 'SELECT id, title, flowers FROM kukat ORDER BY created_at';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$kukat = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

//print_r($kukat);
//Explode - function
//print_r(explode(',', $kukat[0]['flowers']));
//<div><?php  echo htmlspecialchars($kukka['flowers']); 
?>

<!DOCTYPE html>
<html>

<?php include('./../kukka/templates/header.php'); ?>

    <h4 class="center blue-grey-text">Kukkien tilaukset</h4> <br>

    <div class="container">
        <div class="row">

        <?php foreach($kukat as $kukka): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <img src="./../kukka/kuvat/logo1.jpg" class="kukka" alt="kukka" width="250" height="130">
                    <div class="card-content-center card-action center-align">
                        <h6><?php  echo htmlspecialchars($kukka['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $kukka ['flowers']) as $ing): ?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $kukka['id'] ?>">
                        Poista</a>
                    </div>
                </div>    
            </div>

        <?php endforeach; ?>
        </div>
    
        <h5>Tilausten määrä</h5>
        <?php if(count($kukat) > 0): ?>
            <p>Listalla on tilaukset.</p>
        <?php  else: ?>
            <p>Listalla ei ole tilauksia.</p>
        <?php endif; ?>    
    </div>   

<?php include('./../kukka/templates/footer.php'); ?>

</body>
</html>

