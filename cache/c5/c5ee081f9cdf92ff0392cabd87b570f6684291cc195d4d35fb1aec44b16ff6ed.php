<?php

/* login.html */
class __TwigTemplate_55b63fb3681e964e41be81b152e60c806f45ba994af7d1868e2bcc8e097ca734 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href=\"html/bootstrap-3.3.6-dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- estilos -->
    <link href=\"css/estilos.css\" rel=\"stylesheet\">

    <!-- jquery -->
    <script src=\"js/jquery-2.2.3.js\" type=\"text/javascript\"></script>

    <!-- js -->
    <script src=\"js/load.js\" type=\"text/javascript\" ></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>

<!-- view -->
<input type=\"hidden\" value=\"login\" id=\"view\" >

<section class=\"login\">

    <h3>Ingreso</h3>
    <div class=\"input-group\">
        <form name=\"login\" method=\"post\" action=\"\" >
        <input type=\"text\" class=\"form-control\" placeholder=\"user\" aria-describedby=\"sizing-addon2\" name=\"user\">
        <input type=\"password\" class=\"form-control\" placeholder=\"password\" aria-describedby=\"sizing-addon2\" name=\"password\" >
        <a href=\"Javascript:ingresar()\" class=\"btn btn-primary\" role=\"button\">Login</a></p>
        <span id=\"mensaje\" >";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["mensaje"]) ? $context["mensaje"] : null), "html", null, true);
        echo "</span>
        <input type=\"hidden\" name=\"action\" value=\"logear\" >
        </form>
    </div>

</section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src=\"html/bootstrap-3.3.6-dist/js/bootstrap.min.js\"></script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 43,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->*/
/*     <title>Bootstrap 101 Template</title>*/
/* */
/*     <!-- Bootstrap -->*/
/*     <link href="html/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/*     <!-- estilos -->*/
/*     <link href="css/estilos.css" rel="stylesheet">*/
/* */
/*     <!-- jquery -->*/
/*     <script src="js/jquery-2.2.3.js" type="text/javascript"></script>*/
/* */
/*     <!-- js -->*/
/*     <script src="js/load.js" type="text/javascript" ></script>*/
/* */
/* */
/*     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>*/
/*     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* </head>*/
/* <body>*/
/* */
/* <!-- view -->*/
/* <input type="hidden" value="login" id="view" >*/
/* */
/* <section class="login">*/
/* */
/*     <h3>Ingreso</h3>*/
/*     <div class="input-group">*/
/*         <form name="login" method="post" action="" >*/
/*         <input type="text" class="form-control" placeholder="user" aria-describedby="sizing-addon2" name="user">*/
/*         <input type="password" class="form-control" placeholder="password" aria-describedby="sizing-addon2" name="password" >*/
/*         <a href="Javascript:ingresar()" class="btn btn-primary" role="button">Login</a></p>*/
/*         <span id="mensaje" >{{ mensaje }}</span>*/
/*         <input type="hidden" name="action" value="logear" >*/
/*         </form>*/
/*     </div>*/
/* */
/* </section>*/
/* */
/* <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->*/
/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>*/
/* <!-- Include all compiled plugins (below), or include individual files as needed -->*/
/* <script src="html/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>*/
/* </body>*/
/* </html>*/
