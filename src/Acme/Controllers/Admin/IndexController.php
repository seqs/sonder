<?php
namespace Acme\Controllers\Admin;

use Acme\Controllers\BaseController;

class IndexController extends BaseController
{
    public function __invoke($request, $response, $args)
    {
         // Render index view
         $args['_layout'] = 'admin/_layout.phtml';
         return $this->ci->view->render($response, 'admin/index.phtml', $args);
    }
}
