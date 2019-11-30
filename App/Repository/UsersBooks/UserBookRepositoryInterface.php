<?php


namespace App\Repository\UsersBooks;


use App\Data\BookDTO;

interface UserBookRepositoryInterface
{
    public function insert(int $userId, int $bookId): bool;
    public function remove(int $bookId): bool;
    public function removeForCurrentUser(int $userId, int $bookId): bool;
    public function findOneByUserIdAndBookId(int $userId, int $bookId): ?BookDTO;

    /**
     * @param int $userId
     * @return \Generator|BookDTO[]
     */
    public function findAllByUserId(int $userId): \Generator;
}