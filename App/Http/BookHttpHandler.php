<?php


namespace App\Http;


use App\Data\BookDTO;
use App\Service\Book\BookServiceInterface;
use App\Service\UserBook\UserBookServiceInterface;
use App\Service\Users\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class BookHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var BookServiceInterface
     */
    private $bookService;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var UserBookServiceInterface
     */
    private $userBookService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                BookServiceInterface $bookService,
                                UserServiceInterface $userService,
                                UserBookServiceInterface $userBookService)
    {
        parent::__construct($template, $dataBinder);
        $this->bookService = $bookService;
        $this->userService = $userService;
        $this->userBookService = $userBookService;
    }

    public function create(array $formData)
    {
        $this->loginCheck();
        $this->adminCheck();

        if (isset($formData['create'])) {
            $this->handleCreateProcess($formData);
        } else {
            $this->render("books/create");
        }
    }

    private function handleCreateProcess(array $formData)
    {
        try {
            $book = $this->dataBinder->bind($formData, BookDTO::class);
            $this->bookService->add($book);
            $isAdmin = $this->userService->isAdmin();

            $this->render("books/view", [$book, $isAdmin]);
        } catch (\Exception $exception) {
            $this->render("books/create", null, [$exception->getMessage()]);
        }
    }

    public function view(array $getData = [])
    {
        $this->loginCheck();
        $isAdmin = $this->userService->isAdmin();

        $book = $this->bookService->getOneById($getData['id']);
        $this->render("books/view", [$book, $isAdmin]);
    }

    public function viewAll()
    {
        $this->loginCheck();
        $isAdmin = $this->userService->isAdmin();

        try {
            $allBooks = $this->bookService->getAll();
            $this->render("books/all", [$allBooks, $isAdmin]);
        } catch (\Exception $exception) {
            $allBooks = $this->bookService->getAll();
            $this->render("books/all", [$allBooks, $isAdmin], [$exception->getMessage()]);
        }
    }

    public function edit(array $getData, array $formData)
    {
        $this->loginCheck();
        $this->adminCheck();

        $book = $this->bookService->getOneById($getData['id']);

        if (isset($formData['edit'])) {
            $this->handleEditProcess($book, $formData);
        } else {
            $this->render("books/edit", $book);
        }
    }

    private function handleEditProcess(BookDTO $book, array $formData)
    {
        try {
            $editBook = $this->dataBinder->bind($formData, BookDTO::class);
            /** @var BookDTO $editBook */
            $editBook->setId($book->getId());
            $editBook->setName($book->getName());
            $this->bookService->edit($editBook);
            $this->render("books/view", $editBook);
        } catch (\Exception $exception) {
            $this->render("books/edit", $book, [$exception->getMessage()]);
        }
    }

    public function delete(array $getData)
    {
        $this->loginCheck();
        $this->adminCheck();

        $this->bookService->delete(intval($getData['id']));
        $this->userBookService->delete(intval($getData['id']));
        $this->redirect("all_books.php");
    }

    public function addToMyBooks(array $getData)
    {
        $this->loginCheck();
        $currentUser = $this->userService->currentUser();


        try {
            $this->userBookService->add(intval($currentUser->getId()), intval($getData['id']));
            $this->redirect("my_books.php");
        } catch (\Exception $exception) {
            $allBooks = $this->bookService->getAll();
            $isAdmin = $this->userService->isAdmin();
            $this->render("books/all", [$allBooks, $isAdmin], [$exception->getMessage()]);
        }

    }

    public function deleteFromMyBooks(array $getData)
    {

    }

    public function myBooks()
    {
        $this->loginCheck();
        $currentUser = $this->userService->currentUser();

        $books = $this->userBookService->getAllByUser(intval($currentUser->getId()));
        $this->render("books/my_books", $books);
    }

    private function loginCheck(): void
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
            exit();
        }
    }

    private function adminCheck(): void
    {
        if (!$this->userService->isAdmin()) {
            $this->redirect("index.php");
            exit();
        }
    }

}