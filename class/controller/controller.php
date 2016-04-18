<?php

#print "hello world controlador";

//instancia conexion
	require_once("conf.php");

//instancia sql
	require_once("class/sql/sql.class.php");

//instancia libreria twig
	require_once("class/library/Twig-1.24.0/lib/Twig/Autoloader.php");
	Twig_Autoloader::register();
	$loader = new Twig_Loader_Filesystem('html/');
	$twig = new Twig_Environment($loader, array(
		'cache' => 'cache/',
	));

#instancia modelo
	require_once("class/model/user.class.php");
	require_once("class/model/vigen.class.php");
	require_once("class/model/tip_prod.class.php");

#instancia core
	require_once("class/core/core.class.php");

#instancia phpExcel
	require_once("class/library/phpExcel/Excel/reader.php");

	if(isset($_GET['view']))
	{
		switch($_GET['view'])
		{

			case 'login':

				$mensaje="";

				//up
				if(isset($_POST['action']))
				{
					switch($_POST['action'])
					{
						case 'logear':

							conectar();

							user::user_alias_set($_POST['user']);
							user::user_pass_set($_POST['password']);
							$sql=user::vali_usu();
							$user=core::getData($sql);

							$cont=count($user);

							if($cont>0)
							{
								$mensaje="correct user";

								//iniciar sesion
								session_start();
								$_SESSION['user']=$_POST['user'];
								$_SESSION['pass']=$_POST['password'];
							}
							else
							{
								$mensaje="incorrect user";
								session_destroy();
							}

						break;

						default:
						break;
					}
				}


				//down

				echo $twig->render('login.html', array('mensaje' =>$mensaje));

			break;

			case 'home':

				//up

				//down
				session_start();
				$user=$_SESSION['user'];

				echo $twig->render('home.html', array('mensaje' => 'Mensaje','usuario'=>$user));

			break;

			case 'importar':

				$str="";
				//up
				if(isset($_POST['action']))
				{
					switch($_POST['action'])
					{
						case 'importar':

							$data = new Spreadsheet_Excel_Reader();
							$data->setOutputEncoding('CP1251');
							$data->read($_POST['file']['name']);
							$str="<table>";
							for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
								$str.="<tr>";
								for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
									$str.="<td>".$data->sheets[0]['cells'][$i][$j] ."</td>";
								}
								$str.="</tr>";

							}
								$str.="</table>";

						break;
					}
				}


				//down
				session_start();
				$user=$_SESSION['user'];

				echo $twig->render('importar.html', array('mensaje' => 'Mensaje','usuario'=>$user,'excel'=>$_POST['file']['name']));

			break;
			
			default:

				//up

				//down

			break;
		}
	}
	else
	{
		echo $twig->render('index.html', array('mensaje' => 'Fabien'));
	}

?>