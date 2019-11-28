<?php


namespace App\Service\Admin;


use App\Repository\Roles\UserRoleRepositoryInterface;
use App\Service\Users\UserServiceInterface;

class AdminService implements AdminServiceInterface
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var UserRoleRepositoryInterface
     */
    private $userRoleRepository;

    public function __construct(UserServiceInterface $userService, UserRoleRepositoryInterface $userRoleRepository)
    {
        $this->userService = $userService;
        $this->userRoleRepository = $userRoleRepository;
    }

    public function approveUser(array $getData = []): bool
    {
        $status = "Active";
        $userId = $getData['id'];

        $this->setRole($userId);

        return $this->userService->editUserStatus($userId, $status);
    }

    private function setRole(int $userId)
    {
        $roleId = 2;
        if (!$this->userRoleRepository->findOneByUserId($userId)) {
            $this->userRoleRepository->insertUserRole($userId, $roleId);
        }
    }
}