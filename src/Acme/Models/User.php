<?php
namespace Acme\Models;

class Account extends Base
{
    public function create($data)
    {
        return $this->ci->db->insert("account", $data);
    }

    public function getByEmail($email)
    {
        $this->ci->db->select("account", "username", [
            "email" => $email
        ]);
    }
}
