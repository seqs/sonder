<?php
namespace Acme\Controllers\Admin\User;

use Acme\Controllers\BaseController;

class LoginController extends BaseController
{
    public function __invoke($request, $response, $args)
    {
         // Render index view
         $args['_layout'] = '_layout.phtml';
         return $this->ci->view->render($response, 'admin/user/login.phtml', $args);
    }
}
