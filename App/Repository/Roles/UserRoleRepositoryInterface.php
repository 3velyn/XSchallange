<?php


namespace App\Repository\Roles;


use App\Data\UserRoleDTO;

interface UserRoleRepositoryInterface
{
    public function insertUserRole(int $userId, int $roleId): bool;
    public function findOneByUserId(int $userId): ?UserRoleDTO;
}