<?php
// Avalon Hosting Services

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = "users";
    protected $allowedFields = ["name", "email", "phone", "password", "photo"];

    public function getUser($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
    }

    public function saveUserInfo($data)
    {
        $this->insert([
            "name" => $data["name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
            "photo" => $data["photo"],
        ]);
    }
}