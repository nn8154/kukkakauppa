
<?php
    session_start();
    require_once('././inc/config.php');
    require_once('././inc/functions.php');

    ensure_user_is_authenticated();
    
    echo $_SESSION ["email"];
    echo "<br>";
    //echo $_SESSION ["password"];
?>

<!DOCTYPE html>
<html lang="fi">
<head>
  <title>Projekti Kukkakauppa Oy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success text-white">
        <div class="container-fluid">
         <a class="navbar-brand" href="#"><img src="./../kuvat/ruusu.jpg" alt="logo" width="50" height="50">
         Kukkakauppa Oy </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="main_nav">
           <ul class="navbar-nav">
               <li class="nav-item active"> <a class="nav-link" href="./../etusivu.html"> Etusivu</a> </li>
               <li class="nav-item"><a class="nav-link" href="toimitus.html"> Toimitus </a></li>
               <li class="nav-item"><a class="nav-link" href="yhteystiedot.html"> Yhteystiedot </a></li>
               <li class="nav-item dropdown">
                  <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">  Galleria  </a>
                   <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="#"> Galleria 1</a></li>
                   </ul>
               </li>
               <li class="nav-item"><a class="nav-link" href="./../php2/logout.php"> Logout </a></li>
           </ul>
         </div> <!-- navbar-collapse.// -->
        </div> <!-- container-fluid.// -->
       </nav>

      <div>
        <h6>Poisto sivulta</h6>
      </div>


</body>
</html>
