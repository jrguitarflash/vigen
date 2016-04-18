<?php

/* importar.html */
class __TwigTemplate_12ee0e0a3a6336a8fcca43110b96ced1d3bc3490d224d95b2849b96ade292ecc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("home.html", "importar.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "home.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<section>
    <form name=\"import\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
        <label>Importar Data XLS:</label>
        <input type=\"file\" name=\"files\">
        <input type=\"button\" value=\"Importar\" onclick=\"importar();\" >
        <input type=\"hidden\" name=\"action\" value=\"importar\" >
    </form>
</section>

<div>";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["excel"]) ? $context["excel"] : null), "html", null, true);
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "importar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 14,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "home.html" %}*/
/* */
/* {% block content %}*/
/* */
/* <section>*/
/*     <form name="import" method="post" action="" enctype="multipart/form-data">*/
/*         <label>Importar Data XLS:</label>*/
/*         <input type="file" name="files">*/
/*         <input type="button" value="Importar" onclick="importar();" >*/
/*         <input type="hidden" name="action" value="importar" >*/
/*     </form>*/
/* </section>*/
/* */
/* <div>{{ excel }}</div>*/
/* */
/* {% endblock %}*/
