<?php
namespace Acme\Controllers;

class HomeController extends BaseController
{
    public function __invoke($request, $response, $args)
    {
         // Sample log message
         $this->ci->logger->info("Slim-Skeleton '/' route");

         // $account = new Account($this->ci->db);
         // $account->create($data);
         $this->ci->db->insert("account", [
             "username" => "foo",
         ]);

         // $this->ci->logger->debug($this->db->last_query());

         // Render index view
         $args['_layout'] = '_layout.phtml';
         return $this->ci->renderer->render($response, 'index.phtml', $args);
    }
}
