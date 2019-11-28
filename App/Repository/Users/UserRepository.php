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
                    last_name = ?,
                    active = ?
                WHERE id = ?
            "
        )->execute([
            $userDTO->getEmail(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getActive(),
            $id
        ]);

        return true;
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query(
            "SELECT 
                    id, 
                    email, 
                    password,
                    first_name AS firstName, 
                    last_name AS lastName
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
            "SELECT 
                    id, 
                    email, 
                    password,
                    first_name AS firstName, 
                    last_name AS lastName, 
                    active
                FROM users
                WHERE email = ?
            "
        )->execute([$email])
            ->fetch(UserDTO::class)
            ->current();
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAllPending(): \Generator
    {
        $usersResult =  $this->db->query(
            "
                  SELECT 
                    id, 
                    email, 
                    password,
                    first_name AS firstName, 
                    last_name AS lastName, 
                    active
                  FROM users
                  WHERE active = ?
            "
        )->execute(["Pending"])
            ->fetchAssoc();

        foreach ($usersResult as $row) {
            $user = $this->dataBinder->bind($row, UserDTO::class);
            yield $user;
        }
    }

    public function updateUserStatus(UserDTO $userDTO, string $status): bool
    {
        $this->db->query("UPDATE users 
                SET email = ?, 
                    password = ?, 
                    first_name = ?, 
                    last_name = ?, 
                    active = ? 
                WHERE id = ?")
            ->execute([
                $userDTO->getEmail(),
                $userDTO->getPassword(),
                $userDTO->getFirstName(),
                $userDTO->getLastName(),
                $status,
                $userDTO->getId()
            ]);
        return true;
    }
}