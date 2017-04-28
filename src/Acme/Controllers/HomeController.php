<?php
namespace Acme\Controllers;

class HomeController extends BaseController
{
    public function __invoke($request, $response, $args)
    {
         // Sample log message
         $this->ci->logger->info("Slim-Skeleton '/' route");

         // $data = ["username" => "foo"];
         // $account = new Account($this->ci);
         // $account->create($data);
         // $this->ci->logger->debug($this->ci->db->last_query());

         // Render index view
         $args['_layout'] = '_layout.phtml';
         return $this->ci->view->render($response, 'index.phtml', $args);
    }
}
