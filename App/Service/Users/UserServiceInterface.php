<?php


namespace App\Service\Users;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO, string $confirmPassword) : bool;
    public function login(string $email, string $password) : ?UserDTO;
    public function currentUser() : ?UserDTO;
    public function isLogged() : bool;
    public function isAdmin(): bool ;
    public function edit(Array $formData, UserDTO $userDTO) :  bool;
    /**
     * @return \Generator|UserDTO[]
     */
    public function getAllPending() : \Generator;

    public function editUserStatus(int $userId, string $status) : bool ;
}