<?php

/* ::baseProfil.html.twig */
class __TwigTemplate_390cfeee116f0488993a975d0f4a030102dd4c0a91c490e70d1f0ff5d19ea096 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::newGeneralLayout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'userName' => array($this, 'block_userName'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::newGeneralLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_userName($context, array $blocks = array())
    {
        echo " ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("OVTUserBundle:UserInfos:getUserName"));
        echo " ";
    }

    public function getTemplateName()
    {
        return "::baseProfil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 4,  11 => 1,);
    }
}
