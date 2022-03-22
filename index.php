<doctype html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
    <script src="js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/form.css">

</head>

<body>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/media_co.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="verifi.php" method="POST">
      <input type="text" id="usuario" class="fadeIn " name="usuario" placeholder="usuario">
      <input type="password" id="clave" name="clave"  class="fadeIn " placeholder="clave">
      <input type="submit" class="fadeIn fourth" value="Ingresar">
    </form>

  </div>
</div>
</body>

</html>