<?php 
if(isset($_GET['names'])&&isset($_GET['passw'])&&isset($_GET['email']))//me permite verificar si los campos enviados se han instanciado
{
	$nick1=$_GET['names'];//cargamos los datos a las variables
    $passw1=$_GET['passw'];
    $email1=$_GET['email'];
	$conec=mysqli_connect("192.168.0.27","usuario_remoto","Holiwi123*");//la direccion del servidor base de datos,el usuario,la contraseña
	mysqli_select_db($conec,"db_sist_dist_cliente_servidores");//se escoje la base de datos a usar(la conexion de base de datos,y la tabla a usar)	
	$very_dat="INSERT INTO usuario(Nom_usuario,Email_usuario,Pass_usuario) VALUES ('$nick1', '$email1', '$passw1')";//la consula sql para ver los registros de los usuario 
    
    $datos=mysqli_query($conec,$very_dat);//encapsula la consulta en datos (la conexion de base de datos y  la cadena sql )
	
	if(!$datos){
        die("Query failed"); 
	}
	header("location:about.html");
}
?>