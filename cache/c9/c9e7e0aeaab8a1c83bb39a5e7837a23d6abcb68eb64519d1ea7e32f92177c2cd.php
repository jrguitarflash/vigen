<?php

/* alertas_desti.html */
class __TwigTemplate_77076ec7ce4ee86e2ca15981daf75a2d45b6d3c90b6d6ae016435b4632b19f39 extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["desti"]) ? $context["desti"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["des"]) {
            // line 2
            echo "    <tr>
        <td>";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "id", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "nom", array()), "html", null, true);
            echo "</td>
        <td>";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "mail", array()), "html", null, true);
            echo "</td>
        <td><a href=\"Javascript:ope_desti('del','";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($context["des"], "id", array()), "html", null, true);
            echo "')\" >X</a></td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['des'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "
";
    }

    public function getTemplateName()
    {
        return "alertas_desti.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 9,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }
}
/* {% for des in desti %}*/
/*     <tr>*/
/*         <td>{{ des.id }}</td>*/
/*         <td>{{ des.nom }}</td>*/
/*         <td>{{ des.mail }}</td>*/
/*         <td><a href="Javascript:ope_desti('del','{{des.id}}')" >X</a></td>*/
/*     </tr>*/
/* {% endfor %}*/
/* */
/* */
