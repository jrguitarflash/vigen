<?php

    //subir imagen
    function subImg($ficheroName,$ficheroTmp,$ficheroSize,$ficheroType,$raiz)
    {
        if(is_uploaded_file($ficheroTmp))
        {
            // verifica haya sido cargado el archivo

            if(move_uploaded_file($ficheroTmp,$raiz."/".$ficheroName))
            {
                // se coloca en su lugar final
                //echo "<b>Upload exitoso!. Datos:</b><br>";
                //echo "Nombre: <i><a href=\"".$ficheroName."\">".$ficheroName."</a></i><br>";
                $ruta= $raiz."/".$ficheroName;
                //echo "Tipo MIME: <i>".$ficheroType."</i><br>";
                //echo "Peso: <i>".$ficheroSize." bytes</i><br>";
                //echo "<br><hr><br>";
            }
        }
        else
        {
            $ruta=null;
        }

        return $ruta;
    }

    //formatear fecha
    function formtFech($fech)
    {
        $arr=explode("/",$fech);
        $fechFn=$arr[2]."-".$arr[1]."-".$arr[0];
        return $fechFn;
    }

    //evaluar tipo producto
    function evaTipProd($tip)
    {
        $fil=array("acc","sum","ser","nin");
        $acc=strpos($tip,$fil[0]);
        $sum=strpos($tip,$fil[1]);
        $ser=strpos($tip,$fil[2]);
        $nin=strpos($tip,$fil[3]);
        $flag=4;

        if($acc!==false)
        {
            $flag=1;
        }

        if($sum!==false)
        {
            $flag=2;
        }

        if($ser!==false)
        {
            $flag=3;
        }

        return $flag;

    }

?>