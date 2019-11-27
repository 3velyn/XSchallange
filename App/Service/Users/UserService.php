<?php


namespace App\Service\Users;


use App\Data\UserDTO;
use App\Repository\Users\UserRepositoryInterface;
use App\Service\Encryption\EncryptionServiceInterface;
use mysql_xdevapi\Exception;

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

    public function __construct(UserRepositoryInterface $userRepository,
                                EncryptionServiceInterface $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
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

        if ($this->encryptionService->verify($password, $userFromDB->getPassword())) {
            throw new \Exception("Invalid Email or Password");
        }

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

    public function edit(UserDTO $userDTO): bool
    {
        // TODO: Implement edit() method.
    }

    private function encryptPassword (UserDTO $userDTO): void
    {
        $plainPassword = $userDTO->getPassword();
        $passwordHash = $this->encryptionService->hash($plainPassword);
        $userDTO->setPassword($passwordHash);
    }
}