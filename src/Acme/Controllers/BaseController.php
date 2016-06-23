<?php
namespace Acme\Controllers;

use Interop\Container\ContainerInterface;

class BaseController
{
   protected $ci;

   //Constructor
   public function __construct(ContainerInterface $ci)
   {
       $this->ci = $ci;
   }
}
