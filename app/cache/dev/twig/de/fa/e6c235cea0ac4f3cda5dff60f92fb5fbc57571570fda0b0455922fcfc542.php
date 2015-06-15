<?php

/* ::newGeneralLayout.html.twig */
class __TwigTemplate_defae6c235cea0ac4f3cda5dff60f92fb5fbc57571570fda0b0455922fcfc542 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'tabTitle' => array($this, 'block_tabTitle'),
            'userName' => array($this, 'block_userName'),
            'menu' => array($this, 'block_menu'),
            'containerTab' => array($this, 'block_containerTab'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
\t<head>
\t\t";
        // line 3
        $this->displayBlock('header', $context, $blocks);
        // line 14
        echo "
\t</head>
\t<body>
\t\t<header>
\t\t\t<img src= \"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/orange/orange.png"), "html", null, true);
        echo "\" class=\"logo_visio_header theme_color_background\" />

\t\t\t";
        // line 20
        $this->displayBlock('tabTitle', $context, $blocks);
        // line 21
        echo "
\t\t\t<div class=\"container_user_account\">
\t\t\t\t<div class=\"name_user title_color_text\">
\t\t\t\t\t";
        // line 24
        $this->displayBlock('userName', $context, $blocks);
        // line 25
        echo "\t\t\t\t</div>

\t\t\t\t<div id=\"logoUserDefault\" class=\"pp_user_default subtitle_color_border\" 
\t\t\t\t\tstyle=\"background-image: url(";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/default_pp.svg"), "html", null, true);
        echo ")\">\t0
\t\t\t\t</div>
\t\t\t\t
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"container_notif\">
\t\t\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\" width=\"18\" height=\"20\" viewBox=\"0 0 36 41\">
\t\t\t\t\t<use xlink:href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/logo_notif.svg"), "html", null, true);
        echo "#logo_notif\"></use>
\t\t\t\t</svg>
\t\t\t</div> 
\t\t\t<a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">
\t\t\t<div class=\"container_maj subtitle_color_text\" style=\"width:50px;\"> 
\t\t\t\t<svg version=\"1.1\" baseProfile=\"full\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:ev=\"http://www.w3.org/2001/xml-events\"  width=\"18\" height=\"20\" viewBox=\"0 0 20 22\">
\t\t\t\t\t<use xlink:href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("svg/logout_logo.svg"), "html", null, true);
        echo "#logout_logo\"></use>
\t\t\t\t</svg>
\t\t\t</div>
\t\t\t</a>
\t\t</header>

\t\t<div class=\"bar_left height\">
\t\t\t";
        // line 48
        $this->displayBlock('menu', $context, $blocks);
        // line 49
        echo "\t\t\t 
\t\t</div> 
\t\t
\t\t";
        // line 52
        $this->displayBlock('containerTab', $context, $blocks);
        // line 53
        echo " \t\t
\t\t<script type=\"text/javascript\" src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/visio.js"), "html", null, true);
        echo "\"></script>

\t</body>
</html>";
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "\t\t<meta charset=\"utf-8\" />

\t\t<script type=\"text/javascript\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>

\t\t<link rel=\"icon\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.png"), "html", null, true);
        echo "\" />

\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/visio_desktop.css"), "html", null, true);
        echo "\"/>

\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/visio_responsive.css"), "html", null, true);
        echo " \"/> 
\t\t";
    }

    // line 20
    public function block_tabTitle($context, array $blocks = array())
    {
        echo " ";
    }

    // line 24
    public function block_userName($context, array $blocks = array())
    {
        echo " ";
    }

    // line 48
    public function block_menu($context, array $blocks = array())
    {
        echo " ";
    }

    // line 52
    public function block_containerTab($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return "::newGeneralLayout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 52,  147 => 48,  141 => 24,  135 => 20,  129 => 12,  124 => 10,  119 => 8,  114 => 6,  110 => 4,  107 => 3,  99 => 54,  96 => 53,  94 => 52,  89 => 49,  87 => 48,  77 => 41,  71 => 38,  65 => 35,  55 => 28,  50 => 25,  48 => 24,  43 => 21,  41 => 20,  36 => 18,  30 => 14,  28 => 3,  24 => 1,);
    }
}
