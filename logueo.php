<?php 
if(isset($_GET['email'])&&isset($_GET['passw']))//me permite verificar si los campos enviados se han instanciado
{
	$email1=$_GET['email'];//cargamos los datos a las variables
    $passw1=$_GET['passw'];
	//$conec=mysqli_connect("192.168.0.28","usuario_remoto","Holiwi123*");//la direccion del servidor base de datos,el usuario,la contraseña

	if(!($conec = mysqli_connect("192.168.0.27", "usuario_remoto" ,'Holiwi123*')))
    die("<B>" . __METHOD__ . "</B> dice: Fallo en la conexi&oacute;n.");

	mysqli_select_db($conec,"db_sist_dist_cliente_servidores");//se escoje la base de datos a usar(la conexion de base de datos,y la tabla a usar)	
	$very_dat="SELECT * from usuario WHERE Email_usuario='$email1'AND Pass_usuario='$passw1'";//la consula sql para ver los registros de los usuario 
	$datos=mysqli_query($conec,$very_dat);//encapsula la consulta en datos (la conexion de base de datos y  la cadena sql )
	$usua=mysqli_fetch_array($datos);
	if(!$usua['Id_usuario']){//Si existe algún registro - comparamos si id_usario es diferente de id quiere decir q si no esta la id en la base de datos vuelve a cargar el formulario 
		header("location:index.html");//redirecciona al archivo login PHP
	}
	else//y si encuentra un id q exsite en la tabla manda a iniciar la sesion
	{		
		session_start();//se instancia una sesion ejecuta el metodo sesion
		$_SESSION['Nom_usuario']=$usua['Nom_usuario'];//la variable se crea como vector para adiquirir los datos
		$_SESSION['Email_usuario']=$usua['Email_usuario'];
		$_SESSION['Id_usuario']=$usua['Id_usuario'];
		//AL obtener todos estos datos vamos a tener a disposición todos estos datos en la variable $_SESSION
		
		setcookie($_SESSION['Nom_usuario'],$_SESSION['Nom_usuario'],time()+60);
		
		header("location:about.html");
	}
}

?>