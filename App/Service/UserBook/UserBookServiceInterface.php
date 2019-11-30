<?php


namespace App\Service\UserBook;


use App\Data\BookDTO;

interface UserBookServiceInterface
{
    public function add(int $userId, int $bookId): bool;
    public function delete(int $bookId): bool;
    public function deleteForCurrentUser(int $userId, int $bookId): bool;
    public function getOneByUserIdAndBookId(int $userId, int $bookId): ?BookDTO;

    /**
     * @param int $userId
     * @return \Generator|BookDTO[]
     */
    public function getAllByUser(int $userId): \Generator;
}