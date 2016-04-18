<?php

	ini_set('display_errors',0);

	error_reporting(E_ALL|~E_NOTICE|~E_DEPRECATED|~E_STRICT);

	function conectar()
	{
		$servidor = "192.168.1.190";
		$usuario = "root";
		$password = "toor";
		$base_de_datos = "vigencia";
		// ***** Conexion a Base de Datos *****
		$cn = mysql_connect ($servidor,$usuario,$password) or die('Imposible conectarse con Jano, en Mantemiento disculpe las molestias..!');
		mysql_select_db($base_de_datos) or die('Imposible conectarse con la Base de Datos Jano en Mantemiento disculpe las molestias..!');

		mysql_query("SET NAMES 'utf8'", $cn);
		mysql_query("SET lc_time_names = 'es_PE'", $cn);
		mysql_query("SET CHARACTER SET utf8", $cn);
		mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $cn);
		mysql_query("SET SQL_MODE = ''", $cn);


		//session_start();
	}

	function desconectar()
	{
		mysql_close();
	}

	conectar();

?>