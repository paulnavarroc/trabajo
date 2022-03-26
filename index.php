<?php

//Pega todo tu codigo aqui, excepto <?php y ? > porque ya se tiene

$conn = mysqli_init();

            //mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

            // Establish the connection
            mysqli_real_connect($conn, 'servidort.mysql.database.azure.com', 'paulnc@servidort', 'Paul.1234', 'trabajo', 3306, NULL, MYSQLI_CLIENT_SSL);

            //If connection failed, show the error
            if (mysqli_connect_errno())
            {
                die('Failed to connect to MySQL: '.mysqli_connect_error());
            }


            printf("Reading data from table: \n");
            $res = mysqli_query($conn, 'SELECT * FROM datos');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trabajo</title>
</head>
<body>
            <h1>FORMULARIO</h1>
	Ingresar DNI:
<div>
            <form action="index.php" method="post">
            <input type="text" name="buscar"><br><br>
            <input type="submit" value="buscar" name="bus">
            <a href="nuevo.php">Nuevo</a>
            </form>
</div>


<div>
	<?php if(isset(bus)){ ?>
            <table>
                        <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        </tr>
                        <?php 
                        $buscar=$_POST['buscar'];
                        $sql = mysqli_query($conn,"SELECT nombre,apellido FROM datos where dni like '$buscar' '%' order by id desc";
                                    while ($mostrar=mysqli_fetch_assoc($sql)) {
                                                ?>
                                                <tr>	

                                                                        <td>	<?php 	echo $mostrar['nombre'] ?></td>
                                                                        <td>	<?php 	echo $mostrar['apellido'] ?></td>


                                                </tr>
                                                <?php 	


                                    }

                         ?>
            </table>
	<?php } ?>
</div>
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
