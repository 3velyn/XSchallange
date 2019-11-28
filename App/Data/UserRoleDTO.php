<?php


namespace App\Data;


class UserRoleDTO
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $roleId;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return UserRoleDTO
     */
    public function setUserId(int $userId): UserRoleDTO
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     * @return UserRoleDTO
     */
    public function setRoleId(int $roleId): UserRoleDTO
    {
        $this->roleId = $roleId;
        return $this;
    }
}