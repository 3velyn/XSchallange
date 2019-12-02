<?php

namespace App\Http;


use App\Service\Book\BookServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var BookServiceInterface
     */
    private $bookService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                BookServiceInterface $bookService)
    {
        parent::__construct($template, $dataBinder);
        $this->bookService = $bookService;
    }


    public function index()
    {
        $allBooks = $this->bookService->getAll();
        $this->render("home/index", $allBooks);
    }
}