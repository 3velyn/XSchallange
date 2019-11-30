<?php


namespace App\Service\Book;


use App\Data\BookDTO;
use App\Repository\Books\BookRepositoryInterface;

class BookService implements BookServiceInterface
{
    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @param BookDTO $bookDTO
     * @return bool
     * @throws \Exception
     */
    public function add(BookDTO $bookDTO): bool
    {
        if ($this->bookRepository->findOneByName($bookDTO->getName())) {
            throw new \Exception("Already added book with this title.");
        }

        if ($this->bookRepository->findOneByISBN($bookDTO->getIsbn())) {
            throw new \Exception("Already have a book with this ISBN.");
        }

        if ($bookDTO->getDescription() === '') {
            throw new \Exception("Please add a description.");
        }

        return $this->bookRepository->insert($bookDTO);
    }

    public function edit(BookDTO $bookDTO): bool
    {
        return $this->bookRepository->update($bookDTO, intval($bookDTO->getId()));
    }

    public function delete(int $id): bool
    {
        return $this->bookRepository->remove(intval($id));
    }

    public function getOneById(int $id): BookDTO
    {
        return $this->bookRepository->findOneById(intval($id));
    }

    /**
     * @return \Generator|BookDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->bookRepository->findAll();
    }
}