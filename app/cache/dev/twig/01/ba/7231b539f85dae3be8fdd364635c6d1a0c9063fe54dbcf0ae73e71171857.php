<?php

/* OVTFrontEndProviderBundle:ProviderAdmin:sessionInfos.json.twig */
class __TwigTemplate_01ba7231b539f85dae3be8fdd364635c6d1a0c9063fe54dbcf0ae73e71171857 extends Twig_Template
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
        echo "{
\t\"id\":\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "id", array()), "html", null, true);
        echo "\", 
\t\"title\":\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "title", array()), "html", null, true);
        echo "\", 
\t\"description\":\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "description", array()), "html", null, true);
        echo "\" , 
\t\"startTime\":\"";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "startTime", array()), "Y-m-d H:i:s"), "html", null, true);
        echo "\" , 
\t\"endTime\":\"";
        // line 6
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "endTime", array()), "Y-m-d H:i:s"), "html", null, true);
        echo "\", 
\t\"requestDate\":\"";
        // line 7
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "requestdate", array()), "Y-m-d H:i:s"), "html", null, true);
        echo "\", 
\t\"type\":\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "type", array()), "html", null, true);
        echo "\",
\t\"client\":\"";
        // line 9
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "client", array()), "user", array()), "firstname", array()) . " ") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "client", array()), "user", array()), "lastname", array())), "html", null, true);
        echo "\",
\t";
        // line 10
        if (($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "worker", array()) != null)) {
            // line 11
            echo "\t\t\"woker\":\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "worker", array()), "user", array()), "firstname", array()) . " ") . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "worker", array()), "user", array()), "lastname", array())), "html", null, true);
            echo "\",
\t";
        } else {
            // line 13
            echo "\t\t\"worker\" : \"NONE\",
\t";
        }
        // line 15
        echo "\t\"state\":\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "state", array()), "html", null, true);
        echo "\",
\t";
        // line 16
        if (($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "service", array()) != null)) {
            // line 17
            echo "\t\t\"service\":\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["s"]) ? $context["s"] : $this->getContext($context, "s")), "service", array()), "name", array()), "html", null, true);
            echo "\"
\t";
        } else {
            // line 19
            echo "\t\t\"service\": \"NONE\"
\t";
        }
        // line 21
        echo "}";
    }

    public function getTemplateName()
    {
        return "OVTFrontEndProviderBundle:ProviderAdmin:sessionInfos.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 21,  79 => 19,  73 => 17,  71 => 16,  66 => 15,  62 => 13,  56 => 11,  54 => 10,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
