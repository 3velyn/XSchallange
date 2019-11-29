<?php


namespace App\Repository\Books;


use App\Data\BookDTO;
use App\Repository\DatabaseAbstract;

class BookRepository extends DatabaseAbstract implements BookRepositoryInterface
{

    public function insert(BookDTO $bookDTO): bool
    {
        $this->db->query("
            INSERT INTO books(name, isbn, description, image) VALUES (?, ?, ?, ?)
            ")
            ->execute([
                $bookDTO->getName(),
                $bookDTO->getIsbn(),
                $bookDTO->getDescription(),
                $bookDTO->getImage()
            ]);

        return true;
    }

    public function update(BookDTO $bookDTO, int $id): bool
    {
        $this->db->query("
                UPDATE books 
                SET name = ?,
                    isbn = ?,
                    description = ?,
                    image = ?
                WHERE id = ?
                ")
            ->execute([
                $bookDTO->getName(),
                $bookDTO->getIsbn(),
                $bookDTO->getDescription(),
                $bookDTO->getImage(),
                $id
            ]);

        return true;
    }

    public function remove(int $id): bool
    {
        $this->db->query("DELETE FROM books WHERE id = ?")
            ->execute([$id]);
        return true;
    }

    public function findOneById(int $id): BookDTO
    {
         return $this->db->query("SELECT id, name, isbn, description, image 
                FROM books
                WHERE id = ?
                ")
            ->execute([$id])
            ->fetch(BookDTO::class)
            ->current();
    }

    /**
     * @return \Generator|BookDTO[]
     */
    public function findAll(): \Generator
    {
        $booksResult = $this->db->query("
            SELECT id, name, isbn, description, image
            FROM books
            ORDER BY name ASC 
        ")
            ->execute()
            ->fetchAssoc();

        foreach ($booksResult as $row) {
            /** @var BookDTO $book */
            $book = $this->dataBinder->bind($row, BookDTO::class);
            yield $book;
        }
    }
}