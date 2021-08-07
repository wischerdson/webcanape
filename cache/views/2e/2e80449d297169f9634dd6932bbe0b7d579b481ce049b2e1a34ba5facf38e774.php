<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* guest/layout.php */
class __TwigTemplate_6d8d1c36c921c375d331815cf5215ce5b5711ee68d16a9d696c46745947d6130 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 10
        echo "</head>
<body>
\t<main>
\t\t";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        // line 14
        echo "\t</main>
</body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<link rel=\"stylesheet\" href=\"/css/app.css\" />
\t";
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "guest/layout.php";
    }

    public function getDebugInfo()
    {
        return array (  80 => 13,  68 => 7,  64 => 5,  60 => 4,  54 => 14,  52 => 13,  47 => 10,  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
\t{% block head %}
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>{% block title %}{% endblock %}</title>
\t\t<link rel=\"stylesheet\" href=\"/css/app.css\" />
\t{% endblock %}
</head>
<body>
\t<main>
\t\t{% block content %}{% endblock %}
\t</main>
</body>
</html>", "guest/layout.php", "D:\\Domains\\wc.loc\\resources\\views\\guest\\layout.php");
    }
}
