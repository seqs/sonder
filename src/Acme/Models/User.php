<?php
namespace Acme\Models;

class Account extends Base
{
    public function create($data)
    {
        return $this->ci->db->insert("users", $data);
    }

    public function getByEmail($email)
    {
        $this->ci->db->select("users", "username", [
            "email" => $email
        ]);
    }
}
