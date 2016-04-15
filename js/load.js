window.onload=function()
{
    view=document.getElementById('view').value;

    switch(view)
    {
        case 'login':

            console.log("hello view login..!");

        break;

        case 'home':

            console.log("hello view home..!");

        break;

        default:
        break;
    }

}

function salir()
{
    if(confirm("¿Desea Salir del modulo?"))
    {
        location.href="index.php?view=login";
    }

}

function ingresar()
{
    location.href="index.php?view=home";
}