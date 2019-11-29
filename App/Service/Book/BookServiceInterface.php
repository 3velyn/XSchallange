<?php


namespace App\Service\Book;


use App\Data\BookDTO;

interface BookServiceInterface
{
    public function add(BookDTO $bookDTO): bool;
    public function edit(BookDTO $bookDTO): bool;
    public function delete(int $id): bool;
    public function getOneById(int $id): BookDTO;

    /**
     * @return \Generator|BookDTO[]
     */
    public function getAll(): \Generator;
}