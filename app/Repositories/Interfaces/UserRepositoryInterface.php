<?php
namespace App\Repositories\Interfaces;

Interface UserRepositoryInterface{

    public function allUsers();
    public function storeUser($data);

}
