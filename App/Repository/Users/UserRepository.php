<?php


namespace App\Repository\Users;


use App\Data\UserDTO;
use App\Repository\DatabaseAbstract;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class UserRepository extends DatabaseAbstract implements UserRepositoryInterface
{

    public function __construct(DatabaseInterface $database, DataBinderInterface $dataBinder)
    {
        parent::__construct($database, $dataBinder);
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query(
            "INSERT INTO users(email, password, first_name, last_name)
            VALUES (?, ?, ?, ?)
            "
        )->execute([
            $userDTO->getEmail(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName()
        ]);

        return true;
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        $this->db->query(
            "
                UPDATE users
                SET
                    email = ?,
                    password = ?,
                    first_name = ?,
                    last_name = ?
                WHERE id = ?
            "
        )->execute([
            $userDTO->getEmail(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $id
        ]);

        return true;
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query(
            "SELECT id, email, first_name, last_name, password
                FROM users
                WHERE id = ?
            "
        )->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneByEmail(string $email): ?UserDTO
    {
        return $this->db->query(
            "SELECT id, email, password, first_name, last_name
                FROM users
                WHERE email = ?
            "
        )->execute([$email])
            ->fetch(UserDTO::class)
            ->current();
    }
}