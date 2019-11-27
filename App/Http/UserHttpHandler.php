<?php


namespace App\Http;


use App\Service\Users\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;
use App\Data\UserDTO;

class UserHttpHandler extends HomeHttpHandler
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
            $this->render("users/register");
        }
    }

    private function handleRegisterProcess(array $formData)
    {
        try {
            /** @var UserDTO $user */
            $user = $this->dataBinder->bind($formData, UserDTO::class);
            $this->userService->register($user, $formData['confirm_password']);
            $_SESSION['email'] = $user->getEmail();
            $this->redirect("#");
        } catch (\Exception $exception) {
            $this->render("users/register", null, [$exception->getMessage()]);
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

            if ($user !== null) {
                $_SESSION['id'] = $user->getId();
                $this->redirect('');
            }
        } catch (\Exception $exception) {
            $this->render('users/login', null, [$exception->getMessage()]);
        }
    }
}