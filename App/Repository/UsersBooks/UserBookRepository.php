<?php


namespace App\Repository\UsersBooks;


use App\Data\BookDTO;
use App\Repository\DatabaseAbstract;

class UserBookRepository extends DatabaseAbstract implements UserBookRepositoryInterface
{

    public function insert(int $userId, int $bookId): bool
    {
        $this->db->query("
            INSERT INTO users_books(user_id, book_id) 
            VALUES (?, ?)
        ")->execute([
            $userId,
            $bookId
        ]);
        return true;
    }

    public function remove(int $bookId): bool
    {
       $this->db->query("DELETE FROM users_books WHERE book_id = ?")
           ->execute([$bookId]);
       return true;
    }

    public function findOneByUserIdAndBookId(int $userId, int $bookId): ?BookDTO
    {
        $book = $this->db->query("
            SELECT b.id,
                   b.name,
                   b.isbn,
                   b.description,
                   b.image
            FROM users_books AS ub
            INNER JOIN books AS b on ub.book_id = b.id
            WHERE ub.user_id = ? AND ub.book_id = ?
        ")
            ->execute([$userId, $bookId])
            ->fetch(BookDTO::class)
            ->current();
        return $book;
    }

    /**
     * @param int $userId
     * @return \Generator|BookDTO[]
     */
    public function findAllByUserId(int $userId): \Generator
    {
        $lazyBooksResult = $this->db->query("
            SELECT b.id,
                   b.name,
                   b.isbn,
                   b.description,
                   b.image
            FROM users_books AS ub
            INNER JOIN books AS b on ub.book_id = b.id
            WHERE ub.user_id = ?
            ORDER BY b.name ASC 
        ")
            ->execute([$userId])
            ->fetchAssoc();

        foreach ($lazyBooksResult as $row) {
            $book = $this->dataBinder->bind($row, BookDTO::class);
            yield $book;
        }
    }

    public function removeForCurrentUser(int $userId, int $bookId): bool
    {
        $this->db->query("DELETE FROM users_books 
            WHERE user_id = ? AND book_id = ?")
            ->execute([$userId, $bookId]);
        return true;
    }
}