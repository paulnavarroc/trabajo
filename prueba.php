<?php
session_start();

//Pega todo tu codigo aqui, excepto <?php y ? > porque ya se tiene


$_SESSION['producto'][]=$row;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo 5</title>
</head>
<body>
    <table border="1">
       <tr>
           <td>id</td>
           <td>name</td>
           <td>quantity</td>
       </tr>
       <?php if(isset($_SESSION['producto'])){
        foreach ($_SESSION['producto'] as $key => $value) {?>
           <tr>
           <td><?php echo $value['id']; ?></td>
           <td><?php echo $value['name']; ?></td>
           <td><?php echo $value['quantity']; ?></td>
           </tr>
       <?php } } ?>
    </table>
</body>
</html>