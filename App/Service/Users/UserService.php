<?php


namespace App\Service\Users;


use App\Data\UserDTO;
use App\Repository\Roles\UserRoleRepositoryInterface;
use App\Repository\Users\UserRepositoryInterface;
use App\Service\Encryption\EncryptionServiceInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    /**
     * @var UserRoleRepositoryInterface
     */
    private $userRoleRepository;

    public function __construct(UserRepositoryInterface $userRepository,
                                EncryptionServiceInterface $encryptionService,
                                UserRoleRepositoryInterface $userRoleRepository)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
        $this->userRoleRepository = $userRoleRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            throw new \Exception("Password mismatch!");
        }

        if ($this->userRepository->findOneByEmail($userDTO->getEmail())) {
            throw new \Exception("Already have an account with this email");
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->insert($userDTO);
    }

    public function login(string $email, string $password): ?UserDTO
    {
        $userFromDB = $this->userRepository->findOneByEmail($email);

        if ($userFromDB === null) {
            throw new \Exception("Account with this email does not exist. 
            You might want to <a href='register.php'>register</a> first?");
        }
        if (!$this->encryptionService->verify($password, $userFromDB->getPassword())) {
            throw new \Exception("Invalid Email or Password");
        }

        $this->findUserStatus($userFromDB);

        return $userFromDB;
    }

    public function currentUser(): ?UserDTO
    {
        if (!$_SESSION['id']) {
            return null;
        }

        return $this->userRepository->findOneById(intval($_SESSION['id']));
    }

    public function isLogged(): bool
    {
        if (!$this->currentUser()) {
            return false;
        }

        return true;
    }

    public function isAdmin(): bool
    {
        $currentUserRole = $this->userRoleRepository->findOneByUserId($this->currentUser()->getId());

        if (intval($currentUserRole->getRoleId()) !== 1) {
            return false;
        }

        return true;
    }

    public function edit(Array $formData, UserDTO $userDTO): bool
    {
        $userDTO->setFirstName($formData['first_name']);
        $userDTO->setLastName($formData['last_name']);
        return $this->userRepository->update(intval($userDTO->getId()), $userDTO);
    }

    private function encryptPassword (UserDTO $userDTO): void
    {
        $plainPassword = $userDTO->getPassword();
        $passwordHash = $this->encryptionService->hash($plainPassword);
        $userDTO->setPassword($passwordHash);
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function getAllPending(): \Generator
    {
        return $this->userRepository->findAllPending();
    }

    private function findUserStatus(UserDTO $userDTO)
    {
        if (strtolower($userDTO->getActive()) === "pending") {
            throw new \Exception("You are not approved yet");
        }
    }

    public function editUserStatus(int $userId, string $status): bool
    {
        $userDTO = $this->userRepository->findOneById($userId);
        return $this->userRepository->updateUserStatus($userDTO, $status);
    }
}