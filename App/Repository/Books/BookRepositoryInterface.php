<?php


namespace App\Repository\Books;


use App\Data\BookDTO;

interface BookRepositoryInterface
{
    public function insert(BookDTO $bookDTO): bool;
    public function update(BookDTO $bookDTO, int $id): bool ;
    public function remove(int $id): bool;
    public function findOneById(int $id): BookDTO;
    public function findOneByName(string $name): ?BookDTO;
    public function findOneByISBN(string $isbn): ?BookDTO;

    /**
     * @return \Generator|BookDTO[]
     */
    public function findAll(): \Generator;
}