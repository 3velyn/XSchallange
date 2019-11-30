<?php


namespace App\Service\UserBook;


use App\Data\BookDTO;
use App\Repository\UsersBooks\UserBookRepositoryInterface;

class UserBookService implements UserBookServiceInterface
{
    /**
     * @var UserBookRepositoryInterface
     */
    private $userBookRepository;

    public function __construct(UserBookRepositoryInterface $userBookRepository)
    {
        $this->userBookRepository = $userBookRepository;
    }

    public function add(int $userId, int $bookId): bool
    {
        if ($this->userBookRepository->findOneByUserIdAndBookId($userId, $bookId)) {
            throw new \Exception("Already in you book collection.");
        }
        return $this->userBookRepository->insert($userId, $bookId);
    }

    public function delete(int $bookId): bool
    {
        return $this->userBookRepository->remove($bookId);
    }

    public function deleteForCurrentUser(int $userId, int $bookId): bool
    {
        return $this->userBookRepository->removeForCurrentUser($userId, $bookId);
    }

    public function getOneByUserIdAndBookId(int $userId, int $bookId): ?BookDTO
    {
        return $this->userBookRepository->findOneByUserIdAndBookId($userId, $bookId);
    }

    /**
     * @param int $userId
     * @return \Generator|BookDTO[]
     */
    public function getAllByUser(int $userId): \Generator
    {
        return $this->userBookRepository->findAllByUserId($userId);
    }
}