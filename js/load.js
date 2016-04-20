window.onload=function()
{
    view=document.getElementById('view').value;

    switch(view)
    {
        case 'login':

            console.log("hello view login..!");
            evaSesi(view);

        break;

        case 'home':

            console.log("hello view home..!");
            evaSesi(view);

        break;

        case 'index':

            console.log("hello world index...!");
            location.href="index.php?view=login";

        break;

        default:
        break;
    }

}

//salir del modulo
function salir()
{
    if(confirm("¿Desea Salir del modulo?"))
    {
        //location.href="index.php?view=login";

        param="view=salir";

        $.getJSON('json.php?'+param,{format: "json"}, function(data)
        {
            if(data[0]==1)
            {
                location.reload();
            }
        });
    }

}

//ingresar al modulo
function ingresar()
{
    //location.href="index.php?view=home";
    document.login.submit();
}

//evaluar sesion
function evaSesi(view)
{
    param="view=evaSesi";

    $.getJSON('json.php?'+param,{format: "json"}, function(data)
    {
        //si existe
        console.log(data[0]);
        if(data[0]>0)
        {
            if(view=="login")
            {
                location.href="index.php?view=home";
            }
            else
            {
                //location.href="index.php?view=login";
            }
        }
        //no existe
        else
        {
            if(view!="login")
            {
                location.href="index.php?view=login";
            }
        }


    });
}

//importar
function importar()
{
    document.import.submit();
}

//cargar data
function cargData()
{
    $('#mensaje').html("<img src='images/loading.gif' width='10%' >");

    file=$('#fileCarg').text();
    console.log(file);

    param="view=cargData";
    param+="&file="+file;

    $.getJSON('json.php?'+param,{format: "json"}, function(data)
    {
        console.log(data[0]);
        if(data[0]>0)
        {
            $('#mensaje').text("data cargada correctamente...!");
            $('#dataExcel').html("");
            $('#fileCarg').html("");
        }
        else
        {
            $('#mensaje').text("data no cargada....!");
        }
    });
}