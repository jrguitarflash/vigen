<?php
/* hello world json */

$json=$_REQUEST['json'];
session_start();

switch($json)
{
    case 'evaSesi':

        $flag=0;

        if(isset($_SESSION['user']))
        {
            $flag=1;
        }

        $data=Array();
        $data[0]=$flag;

        print json_encode($data);

    break;

    case 'salir':

        session_destroy();

        $flag=0;

        if(isset($_SESSION['user']))
        {
            $flag=1;
        }

        $data=Array();
        $data[0]=$flag;

        print json_encode($data);

    break;

    default:
    break;
}

?>