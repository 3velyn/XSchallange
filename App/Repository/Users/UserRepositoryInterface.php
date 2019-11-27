<?php


namespace App\Repository\Users;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO) : bool;
    public function update(int $id, UserDTO $userDTO) : bool;
    public function findOneByEmail(string $email) : ?UserDTO;
    public function findOneById(int $id) : ?UserDTO;
}