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
class __TwigTemplate_c58f8738d8fc9cc7a8bb2a721420373996e4373e5854714f860221c798afd817 extends Template
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

<div class=\"img-thumbnail\" style=\"background-color: #313131;
            background-size: unset; width: 100%; height: 100vh;\">

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-sm-12 mx-auto\">
                <div id=\"first\">
                    <div class=\"myform form \">
                        <div class=\"logo mb-3\">
                            <div class=\"col-md-12 text-center\">
                                <h1>Login</h1>
                            </div>
                        </div>
                        <form action=\"";
        // line 24
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("start_login");
        echo "\" method=\"post\" id=\"loginForm\">
                            <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">Country</label>
                                <select class=\"form-control\" name=\"country\" form=\"loginForm\">
                                    <option ";
        // line 28
        if (0 === twig_compare((isset($context["country"]) || array_key_exists("country", $context) ? $context["country"] : (function () { throw new RuntimeError('Variable "country" does not exist.', 28, $this->source); })()), "EE")) {
            echo " selected ";
        }
        echo " value=\"EE\">Estonia</option>
                                    <option ";
        // line 29
        if (0 === twig_compare((isset($context["country"]) || array_key_exists("country", $context) ? $context["country"] : (function () { throw new RuntimeError('Variable "country" does not exist.', 29, $this->source); })()), "LV")) {
            echo " selected ";
        }
        echo " value=\"LV\">Latvia</option>
                                    <option ";
        // line 30
        if (0 === twig_compare((isset($context["country"]) || array_key_exists("country", $context) ? $context["country"] : (function () { throw new RuntimeError('Variable "country" does not exist.', 30, $this->source); })()), "LT")) {
            echo " selected ";
        }
        echo " value=\"LT\">Lithuania</option>
                                </select>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">National identity code</label>
                                ";
        // line 35
        if ((isset($context["personal_id"]) || array_key_exists("personal_id", $context) ? $context["personal_id"] : (function () { throw new RuntimeError('Variable "personal_id" does not exist.', 35, $this->source); })())) {
            // line 36
            echo "                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["personal_id"]) || array_key_exists("personal_id", $context) ? $context["personal_id"] : (function () { throw new RuntimeError('Variable "personal_id" does not exist.', 36, $this->source); })()), "html", null, true);
            echo "\" disabled>
                                ";
        } else {
            // line 38
            echo "                                    <input class=\"form-control\" type=\"text\" name=\"personal-id\">
                                ";
        }
        // line 40
        echo "                            </div>

                            <div class=\"col-md-12 text-center \">
                                <input type=\"submit\" value=\"Sign in with Smart-ID\" class=\"btn btn-success\">
                            </div>

                            ";
        // line 46
        if ((isset($context["verification_code"]) || array_key_exists("verification_code", $context) ? $context["verification_code"] : (function () { throw new RuntimeError('Variable "verification_code" does not exist.', 46, $this->source); })())) {
            // line 47
            echo "                                <div class=\"col-md-12 text-center\">
                                    <h3 style=\"display: inline\">Your control code: </h3>
                                    <h2 style=\"display: inline\">";
            // line 49
            echo twig_escape_filter($this->env, (isset($context["verification_code"]) || array_key_exists("verification_code", $context) ? $context["verification_code"] : (function () { throw new RuntimeError('Variable "verification_code" does not exist.', 49, $this->source); })()), "html", null, true);
            echo "</h2>
                                </div>
                            ";
        }
        // line 52
        echo "
                            ";
        // line 53
        if ((isset($context["login_error"]) || array_key_exists("login_error", $context) ? $context["login_error"] : (function () { throw new RuntimeError('Variable "login_error" does not exist.', 53, $this->source); })())) {
            // line 54
            echo "                                <div class=\"col-md-12 text-center\">
                                    <p class=\"error\">";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["login_error"]) || array_key_exists("login_error", $context) ? $context["login_error"] : (function () { throw new RuntimeError('Variable "login_error" does not exist.', 55, $this->source); })()), "html", null, true);
            echo "</p>
                                </div>
                            ";
        }
        // line 58
        echo "                            ";
        if ((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 58, $this->source); })())) {
            // line 59
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 59, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 60
                echo "                                    <div class=\"col-md-12 text-center\">
                                        <p class=\"error\">";
                // line 61
                echo twig_escape_filter($this->env, (isset($context["login_error"]) || array_key_exists("login_error", $context) ? $context["login_error"] : (function () { throw new RuntimeError('Variable "login_error" does not exist.', 61, $this->source); })()), "html", null, true);
                echo "</p>
                                    </div>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "                            ";
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
        return array (  210 => 79,  202 => 73,  200 => 72,  191 => 65,  188 => 64,  179 => 61,  176 => 60,  171 => 59,  168 => 58,  162 => 55,  159 => 54,  157 => 53,  154 => 52,  148 => 49,  144 => 47,  142 => 46,  134 => 40,  130 => 38,  124 => 36,  122 => 35,  112 => 30,  106 => 29,  100 => 28,  93 => 24,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
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

<div class=\"img-thumbnail\" style=\"background-color: #313131;
            background-size: unset; width: 100%; height: 100vh;\">

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-sm-12 mx-auto\">
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

                            <div class=\"col-md-12 text-center \">
                                <input type=\"submit\" value=\"Sign in with Smart-ID\" class=\"btn btn-success\">
                            </div>

                            {% if verification_code %}
                                <div class=\"col-md-12 text-center\">
                                    <h3 style=\"display: inline\">Your control code: </h3>
                                    <h2 style=\"display: inline\">{{ verification_code }}</h2>
                                </div>
                            {% endif %}

                            {% if login_error %}
                                <div class=\"col-md-12 text-center\">
                                    <p class=\"error\">{{ login_error }}</p>
                                </div>
                            {% endif %}
                            {% if errors %}
                                {% for e in errors %}
                                    <div class=\"col-md-12 text-center\">
                                        <p class=\"error\">{{ login_error }}</p>
                                    </div>
                                {% endfor %}
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
", "login/index.html.twig", "/home/andreas/spaces/SK/smart-id-php-demo/templates/login/index.html.twig");
    }
}
