<?php


namespace App\Repository\Roles;


use App\Data\UserRoleDTO;
use App\Repository\DatabaseAbstract;

class UserRoleRepository extends DatabaseAbstract implements UserRoleRepositoryInterface
{

    public function insertUserRole(int $userId, int $roleId): bool
    {
        $this->db->query(
            "INSERT INTO users_roles(user_id, role_id) VALUES (?, ?)"
        )->execute([
            $userId,
            $roleId
        ]);

        return true;
    }

    public function findOneByUserId(int $userId): ?UserRoleDTO
    {
        return $this->db->query(
            "SELECT 
                    user_id AS userId, 
                    role_id AS roleId
                FROM users_roles WHERE user_id = ?"
        )->execute([$userId])
            ->fetch(UserRoleDTO::class)
            ->current();
    }
}