<?php


namespace App\Service\Admin;


use App\Data\UserDTO;

interface AdminServiceInterface
{
    public function approveUser(array $getData): bool;
}