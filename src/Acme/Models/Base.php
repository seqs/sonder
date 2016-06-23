<?php
namespace Acme\Models;

class Base
{
   protected $ci;

   public function __construct($ci)
   {
       $this->ci = $ci;
   }
}
