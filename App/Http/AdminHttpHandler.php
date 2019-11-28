<?php


namespace App\Http;


use App\Service\Admin\AdminServiceInterface;
use App\Service\Users\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class AdminHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var AdminServiceInterface
     */
    private $adminService;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                AdminServiceInterface $adminService,
                                UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder);
        $this->adminService = $adminService;
        $this->userService = $userService;
    }

    public function profile()
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
        }

        $currentUser = $this->userService->currentUser();

        if (!$this->userService->isAdmin()) {
            $this->render("user/profile", $currentUser);
        }

        $allPendingUsers = $this->userService->getAllPending();
        $this->render("admin/profile", [$currentUser, $allPendingUsers]);
    }
}