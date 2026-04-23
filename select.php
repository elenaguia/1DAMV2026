<html>
<head>
<title></title>
<body>
 
<?php
 // nos conectamos a la base de datos
$mysqli = new mysqli("localhost","root", "");

// comprobamos conexion
if ($mysqli->connect_error){
         print "error en la conexión"; // si  la conexion falla
  }
  else // si no seleccionamos nuestra base de datos y realizamos una consulta con toda la informacion de nuestra tabla
  {
          $mysqli -> select_db("clientes");
          $sql = "select * from cliente";
          $respuesta =$mysqli->query($sql);
    
         
          if($respuesta)
          {
              $fila=$respuesta->fetch_assoc(); // imprimimops fila por fila los datos de nuestra tabla 
       
              while($fila)
              {
                print $fila["dni"]."<br>";
                print $fila["nombre"]."<br>";
                $fila=$respuesta->fetch_assoc();
              }
              $respuesta->close();
           }else{
             print "Ha fallado la consulta"; // mensaje de error si falla la consulta
          }
   
    $mysqli->close(); // cierre de sesion en mysql
  
  }
?>
</body>
</html>