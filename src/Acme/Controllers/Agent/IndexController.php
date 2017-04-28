<?php
namespace Acme\Controllers\Agent;

use Acme\Controllers\BaseController;

class IndexController extends BaseController
{
    public function __invoke($request, $response, $args)
    {
         // Render index view
         $args['_layout'] = 'agent/_layout.phtml';
         return $this->ci->view->render($response, 'agent/index.phtml', $args);
    }
}
