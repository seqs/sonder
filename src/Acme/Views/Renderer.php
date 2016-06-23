<?php
/**
 * Slim Framework (http://slimframework.com)
 *
 * @link      https://github.com/slimphp/PHP-View
 * @copyright Copyright (c) 2011-2015 Josh Lockhart
 * @license   https://github.com/slimphp/PHP-View/blob/master/LICENSE.md (MIT License)
 */
namespace Acme\Views;

use Psr\Http\Message\ResponseInterface;

/**
 * Php View
 *
 * Render PHP view scripts into a PSR-7 Response object
 */
class Renderer
{
    /**
     * @var string
     */
    protected $templatePath;

    protected $helpers = [];

    /**
     * SlimRenderer constructor.
     *
     * @param string $templatePath
     */
    public function __construct($templatePath = "")
    {
        $this->templatePath = $templatePath;

        $this->registerHelper('_e', function($str) {
            echo htmlspecialchars($str);
        });

        $this->registerHelper('_h', function($str) {
            return htmlspecialchars($str);
        });
    }

    public function registerHelper($name, $func)
    {
        $this->helpers[$name] = $func;
    }

    /**
     * Render a template
     *
     * $data cannot contain template as a key
     *
     * throws RuntimeException if $templatePath . $template does not exist
     *
     * @param \ResponseInterface $response
     * @param                    $template
     * @param array              $data
     *
     * @return ResponseInterface
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function render(ResponseInterface $response, $template, array $data = [], $layout = null)
    {
        if (isset($data['template'])) {
            throw new \InvalidArgumentException("Duplicate template key found");
        }

        $output = $this->template($this->templatePath . $template, $data);

        // layouts
        if (isset($data['_layout']) && $data['_layout']) {
            $data['_content'] = $output;
            $output = $this->template($this->templatePath . $data['_layout'], $data);
        }

        $response->getBody()->write($output);

        return $response;
    }

    public function template($template, $data)
    {
        if (!is_file($template)) {
            throw new \RuntimeException("View cannot render `$template` because the template does not exist");
        }

        ob_start();
        extract($data);
        extract($this->helpers);
        include $template;
        return ob_get_clean();
    }
}
