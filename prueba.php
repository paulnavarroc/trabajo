<?php
session_start();

//Pega todo tu codigo aqui, excepto <?php y ? > porque ya se tiene

$conn = mysqli_init();

            //mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

            // Establish the connection
            mysqli_real_connect($conn, 'servidort.mysql.database.azure.com', 'paulnc@myservidor', 'Paul.1234', 'datos', 3306, NULL, MYSQLI_CLIENT_SSL);

            //If connection failed, show the error
            if (mysqli_connect_errno())
            {
                die('Failed to connect to MySQL: '.mysqli_connect_error());
            }


            printf("Reading data from table: \n");
            $res = mysqli_query($conn, 'SELECT * FROM inventory');


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
           <td>Dni</td>
           <td>nombre</td>
           <td>apellido</td>
       </tr>
      <?php 
        
        
            
            while ($row = mysqli_fetch_assoc($res))
             {?>
                <tr>
                   <td><?php echo $row['dni']; ?></td>
                   <td><?php echo $row['nombre']; ?></td>
                   <td><?php echo $row['apellido']; ?></td>
                 </tr>
            
           
 
               <?php }  ?>
    </table>
</body>
</html>
