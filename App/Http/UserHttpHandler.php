<?php


namespace App\Http;


use App\Service\Users\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;
use App\Data\UserDTO;

class UserHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder);
        $this->userService = $userService;
    }

    public function register(array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($formData);
        } else {
            $this->render('users/register');
        }
    }

    private function handleRegisterProcess(array $formData)
    {
        try {
            /** @var UserDTO $user */
            $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->register($user, $formData['confirm_password']);
            $_SESSION['email'] = $user->getEmail();
            $this->redirect("login.php");
        } catch (\Exception $exception) {
            $this->render('users/register', null, [$exception->getMessage()]);
        }
    }

    public function login(array $formData = [])
    {
        $email = '';

        if (isset($formData['login'])) {
            $this->handleLoginProcess($formData);
        } else {
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
            }

            $this->render('users/login', $email === '' ? '' : $email);
        }
    }

    private function handleLoginProcess(array $formData)
    {
        try {
            $user = $this->userService->login($formData['email'], $formData['password']);

            $this->LoadUserOrAdminProfile($user);
        } catch (\Exception $exception) {
            $this->render('users/login', null, [$exception->getMessage()]);
        }
    }

    public function profile()
    {
        if (!$this->userService->isLogged()) {
            $this->redirect('login.php');
        }
        $currentUser = $this->userService->currentUser();
        $this->LoadUserOrAdminProfile($currentUser);
    }

    public function edit(array $formData = [])
    {
        if (!$this->userService->isLogged()) {
            $this->redirect('login.php');
        }

        if (isset($formData['edit'])) {
            $this->handleEditProcess($formData);
        } else {
            $user = $this->userService->currentUser();
            $this->render('users/edit', $user);
        }
    }

    private function handleEditProcess(array $formData)
    {
        try {
            $user = $this->userService->currentUser();
            $this->userService->edit($formData, $user);
            $this->LoadUserOrAdminProfile($user);
        } catch (\Exception $exception) {
            $user = $this->userService->currentUser();
            $this->render('users/edit', $user, [$exception->getMessage()]);
        }
    }

    /**
     * @param UserDTO|null $user
     */
    private function LoadUserOrAdminProfile(?UserDTO $user): void
    {
        if ($user !== null) {
            $_SESSION['id'] = $user->getId();
            if ($this->userService->isAdmin()) {
                $allPendingUsers = $this->userService->getAllPending();
                $this->render('admin/profile', [$user, $allPendingUsers]);
            } else {
                $this->render('users/profile', $user);
            }
        }
    }
}