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

/* blog/index.html.twig */
class __TwigTemplate_e90f7af3e23b1265b13fce4ef39aafc010281ec2b2093c2ac47863e4e17e3993 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "blog/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "blog/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello BlogController!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<div style=\"background-image: url('build/images/wallpaper.89d04ce2.jpg');
            background-size: unset; width: 100%; background-repeat: repeat; min-height: 100vh\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-center\" style=\"background-color: white; margin-top: 30px; padding-bottom: 2vh\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <div class=\"container\">
                        <h1>Welcome to the blog user ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 13, $this->source); })()), "name", [], "any", false, false, false, 13), "html", null, true);
        echo "! ✅</h1>
                        <div class=\"row\">
                            <div class=\"col-sm-12\">
                                <h1 class=\"text-info\"> All posts</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"card-body\">
                    <div class=\"container\">
                        <table class=\"table\">
                            <thead>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Body
                                </th>
                                <th>
                                    Author
                                </th>
                            </thead>
                            <tbody>
                            ";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["blog_posts_all"]) || array_key_exists("blog_posts_all", $context) ? $context["blog_posts_all"] : (function () { throw new RuntimeError('Variable "blog_posts_all" does not exist.', 39, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 40
            echo "                                <tr>
                                    <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 41), "html", null, true);
            echo "</td>
                                    <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "description", [], "any", false, false, false, 42), "html", null, true);
            echo "</td>
                                    <td>";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "body", [], "any", false, false, false, 43), "html", null, true);
            echo "</td>
                                    <td>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 44), "name", [], "any", false, false, false, 44), "html", null, true);
            echo "</td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "                            </tbody>
                        </table>

                    </div>
                    <div class=\"container\">
                        <h1>
                            Make a new post <span class=\"flag-icon flag-icon-gr\"></span>
                        </h1>

                        <form action=\"";
        // line 56
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("postblog");
        echo "\" method=\"post\">
                            <div class=\"form-group\">
                                <label for=\"title\">Title</label>
                                <input type=\"text\" class=\"form-control\" style=\"width: 50%\" id=\"title\" name=\"title\" placeholder=\"Enter Post Title\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"description\">Description</label>
                                <textarea style=\"width: 50%\"
                                        rows=\"10\" type=\"text\"
                                        class=\"form-control\" id=\"description\"
                                        name=\"description\" placeholder=\"Enter Blog Post Description\">
                                </textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"body\">Post Body</label>
                                <input type=\"text\" style=\"width: 50%\" class=\"form-control\" id=\"body\" name=\"body\" placeholder=\"Enter Post Body\">
                            </div>
                            <input type=\"submit\" class=\"btn btn-secondary\" value=\"Post\">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "blog/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 56,  139 => 47,  130 => 44,  126 => 43,  122 => 42,  118 => 41,  115 => 40,  111 => 39,  82 => 13,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello BlogController!{% endblock %}

{% block body %}
<div style=\"background-image: url('build/images/wallpaper.89d04ce2.jpg');
            background-size: unset; width: 100%; background-repeat: repeat; min-height: 100vh\">
    <div class=\"container\">
        <div class=\"d-flex justify-content-center\" style=\"background-color: white; margin-top: 30px; padding-bottom: 2vh\">
            <div class=\"card\">
                <div class=\"card-header\">
                    <div class=\"container\">
                        <h1>Welcome to the blog user {{ user.name }}! ✅</h1>
                        <div class=\"row\">
                            <div class=\"col-sm-12\">
                                <h1 class=\"text-info\"> All posts</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"card-body\">
                    <div class=\"container\">
                        <table class=\"table\">
                            <thead>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Body
                                </th>
                                <th>
                                    Author
                                </th>
                            </thead>
                            <tbody>
                            {% for post in blog_posts_all %}
                                <tr>
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.description }}</td>
                                    <td>{{ post.body }}</td>
                                    <td>{{ post.author.name }}</td>
                                </tr>
                            {% endfor %}
                            </tbody>
                        </table>

                    </div>
                    <div class=\"container\">
                        <h1>
                            Make a new post <span class=\"flag-icon flag-icon-gr\"></span>
                        </h1>

                        <form action=\"{{ path('postblog') }}\" method=\"post\">
                            <div class=\"form-group\">
                                <label for=\"title\">Title</label>
                                <input type=\"text\" class=\"form-control\" style=\"width: 50%\" id=\"title\" name=\"title\" placeholder=\"Enter Post Title\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"description\">Description</label>
                                <textarea style=\"width: 50%\"
                                        rows=\"10\" type=\"text\"
                                        class=\"form-control\" id=\"description\"
                                        name=\"description\" placeholder=\"Enter Blog Post Description\">
                                </textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"body\">Post Body</label>
                                <input type=\"text\" style=\"width: 50%\" class=\"form-control\" id=\"body\" name=\"body\" placeholder=\"Enter Post Body\">
                            </div>
                            <input type=\"submit\" class=\"btn btn-secondary\" value=\"Post\">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "blog/index.html.twig", "/home/andreas/spaces/SK/smart-id-symfony-demo/templates/blog/index.html.twig");
    }
}
