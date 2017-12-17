<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>MQTT Test</title>

  <meta name="description" content="Garage Door Opener">
  <meta name="author" content="Ryan">
  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
  <?php
    echo "<h2>Toggle Garage Door!</h2>";
   ?>
<form action = "/test.php" method="POST">
  <input type="submit" name="Toggle" value="GO!" />
</form>
<?php
  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Toggle'])){
    func();
  }
  function func(){
    echo "<h2>Button Pressed</h2>";
    $cmd = "mosquitto_pub -h 10.0.0.10 -d -t garage/ReqToOpen -m 'TRUE'"; // Linux, Unix & Mac
    exec(escapeshellcmd($cmd), $output, $status);
  }
?>
</body>
</html>
