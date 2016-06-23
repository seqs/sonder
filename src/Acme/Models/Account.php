<?php
namespace Acme\Models;

class Account extends Base
{
    public function getByEmail($email)
    {
        $this->db->select("account", "username", [
            "email" => $email
        ]);
    }
}
