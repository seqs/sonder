<?php
namespace Acme\Models;

class Base
{
   protected $db;

   public function __construct($db)
   {
       $this->db = $db;
   }
}
