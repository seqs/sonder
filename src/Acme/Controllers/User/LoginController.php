<?php
namespace Acme\Controllers;

use Acme\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function __invoke($request, $response, $args)
    {
         // Render index view
         $args['_layout'] = '_layout.phtml';
         return $this->ci->renderer->render($response, 'user/login.phtml', $args);
    }
}
