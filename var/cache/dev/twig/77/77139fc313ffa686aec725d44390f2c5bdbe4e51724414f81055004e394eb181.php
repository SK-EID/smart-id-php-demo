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

/* login/index.html.twig */
class __TwigTemplate_3fea875f2539d6ce23e93f96684563218006555ea01bba0008b422922b1fae0b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "login/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello LoginController!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>

<div class=\"img-thumbnail\" style=\"background-image: url('build/images/wallpaper.89d04ce2.jpg');
            background-size: unset; width: 100%; height: 100vh;\">
    <h1 class=\"text-center bg-white\" style=\"color: #7abaff\">Hello! Welcome to Smart ID PHP DEMO</h1>

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-5 mx-auto\">
                <div id=\"first\">
                    <div class=\"myform form \">
                        <div class=\"logo mb-3\">
                            <div class=\"col-md-12 text-center\">
                                <h1>Login</h1>
                            </div>
                        </div>
                        <form action=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("start_login");
        echo "\" method=\"post\" id=\"loginForm\">
                            <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">Country</label>
                                <select class=\"form-control\" name=\"country\" form=\"loginForm\">
                                    <option ";
        // line 29
        if (0 === twig_compare((isset($context["country"]) || array_key_exists("country", $context) ? $context["country"] : (function () { throw new RuntimeError('Variable "country" does not exist.', 29, $this->source); })()), "EE")) {
            echo " selected ";
        }
        echo " value=\"EE\">Estonia</option>
                                    <option ";
        // line 30
        if (0 === twig_compare((isset($context["country"]) || array_key_exists("country", $context) ? $context["country"] : (function () { throw new RuntimeError('Variable "country" does not exist.', 30, $this->source); })()), "LV")) {
            echo " selected ";
        }
        echo " value=\"LV\">Latvia</option>
                                    <option ";
        // line 31
        if (0 === twig_compare((isset($context["country"]) || array_key_exists("country", $context) ? $context["country"] : (function () { throw new RuntimeError('Variable "country" does not exist.', 31, $this->source); })()), "LT")) {
            echo " selected ";
        }
        echo " value=\"LT\">Lithuania</option>
                                </select>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">National identity code</label>
                                ";
        // line 36
        if ((isset($context["personal_id"]) || array_key_exists("personal_id", $context) ? $context["personal_id"] : (function () { throw new RuntimeError('Variable "personal_id" does not exist.', 36, $this->source); })())) {
            // line 37
            echo "                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["personal_id"]) || array_key_exists("personal_id", $context) ? $context["personal_id"] : (function () { throw new RuntimeError('Variable "personal_id" does not exist.', 37, $this->source); })()), "html", null, true);
            echo "\" disabled>
                                ";
        } else {
            // line 39
            echo "                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\">
                                ";
        }
        // line 41
        echo "                            </div>

                            <div class=\"form-group\">
                                <p class=\"text-center\">By signing up you accept our <a href=\"#\">Terms Of Use</a></p>
                            </div>

                            <div class=\"col-md-12 text-center \">
                                <input type=\"submit\" value=\"Login with Smart ID\" class=\"btn btn-success\">
                            </div>

                            ";
        // line 51
        if ((isset($context["verification_code"]) || array_key_exists("verification_code", $context) ? $context["verification_code"] : (function () { throw new RuntimeError('Variable "verification_code" does not exist.', 51, $this->source); })())) {
            // line 52
            echo "                                <p>
                                    Please check that the code matches the one in your smart device
                                </p>
                                <div class=\"col-md-12 text-center\">
                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\" value=\"";
            // line 56
            echo twig_escape_filter($this->env, (isset($context["verification_code"]) || array_key_exists("verification_code", $context) ? $context["verification_code"] : (function () { throw new RuntimeError('Variable "verification_code" does not exist.', 56, $this->source); })()), "html", null, true);
            echo "\" disabled>
                                </div>
                            ";
        }
        // line 59
        echo "
                            ";
        // line 60
        if ((isset($context["login_error"]) || array_key_exists("login_error", $context) ? $context["login_error"] : (function () { throw new RuntimeError('Variable "login_error" does not exist.', 60, $this->source); })())) {
            // line 61
            echo "                                <div class=\"col-md-12 text-center\">
                                    <p class=\"error\">";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["login_error"]) || array_key_exists("login_error", $context) ? $context["login_error"] : (function () { throw new RuntimeError('Variable "login_error" does not exist.', 62, $this->source); })()), "html", null, true);
            echo "</p>
                                </div>
                            ";
        }
        // line 65
        echo "                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
        // line 72
        if ((isset($context["verification_code"]) || array_key_exists("verification_code", $context) ? $context["verification_code"] : (function () { throw new RuntimeError('Variable "verification_code" does not exist.', 72, $this->source); })())) {
            // line 73
            echo "    <script>
        fetch(\"/login\", {
            method: \"POST\"
        }).then(r => window.location=\"/blog\")
    </script>
    ";
        }
        // line 79
        echo "</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "login/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 79,  186 => 73,  184 => 72,  175 => 65,  169 => 62,  166 => 61,  164 => 60,  161 => 59,  155 => 56,  149 => 52,  147 => 51,  135 => 41,  131 => 39,  125 => 37,  123 => 36,  113 => 31,  107 => 30,  101 => 29,  94 => 25,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello LoginController!{% endblock %}

{% block body %}
<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>

<div class=\"img-thumbnail\" style=\"background-image: url('build/images/wallpaper.89d04ce2.jpg');
            background-size: unset; width: 100%; height: 100vh;\">
    <h1 class=\"text-center bg-white\" style=\"color: #7abaff\">Hello! Welcome to Smart ID PHP DEMO</h1>

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-5 mx-auto\">
                <div id=\"first\">
                    <div class=\"myform form \">
                        <div class=\"logo mb-3\">
                            <div class=\"col-md-12 text-center\">
                                <h1>Login</h1>
                            </div>
                        </div>
                        <form action=\"{{ path('start_login') }}\" method=\"post\" id=\"loginForm\">
                            <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">Country</label>
                                <select class=\"form-control\" name=\"country\" form=\"loginForm\">
                                    <option {% if country == \"EE\" %} selected {% endif %} value=\"EE\">Estonia</option>
                                    <option {% if country == \"LV\" %} selected {% endif %} value=\"LV\">Latvia</option>
                                    <option {% if country == \"LT\" %} selected {% endif %} value=\"LT\">Lithuania</option>
                                </select>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">National identity code</label>
                                {% if personal_id %}
                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\" value=\"{{ personal_id }}\" disabled>
                                {% else %}
                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\">
                                {% endif %}
                            </div>

                            <div class=\"form-group\">
                                <p class=\"text-center\">By signing up you accept our <a href=\"#\">Terms Of Use</a></p>
                            </div>

                            <div class=\"col-md-12 text-center \">
                                <input type=\"submit\" value=\"Login with Smart ID\" class=\"btn btn-success\">
                            </div>

                            {% if verification_code %}
                                <p>
                                    Please check that the code matches the one in your smart device
                                </p>
                                <div class=\"col-md-12 text-center\">
                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\" value=\"{{ verification_code }}\" disabled>
                                </div>
                            {% endif %}

                            {% if login_error %}
                                <div class=\"col-md-12 text-center\">
                                    <p class=\"error\">{{ login_error }}</p>
                                </div>
                            {% endif %}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {% if verification_code %}
    <script>
        fetch(\"/login\", {
            method: \"POST\"
        }).then(r => window.location=\"/blog\")
    </script>
    {% endif %}
</div>
{% endblock %}
", "login/index.html.twig", "/home/andreas/spaces/SK/smart-id-symfony-demo/templates/login/index.html.twig");
    }
}
