<?php

session_start();
spl_autoload_register();

$template = new \Core\Template();
$dataBinder = new \Core\DataBinder();
$dbInfo = parse_ini_file("Config/db.ini");

$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);
$encryptionService = new \App\Service\Encryption\BcryptEncryptionService();
$userRepository = new \App\Repository\Users\UserRepository($db, $dataBinder);
$userRoleRepository = new \App\Repository\Roles\UserRoleRepository($db, $dataBinder);

$userService = new \App\Service\Users\UserService($userRepository, $encryptionService,$userRoleRepository);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder, $userService);
$adminService = new \App\Service\Admin\AdminService($userService, $userRoleRepository);

$bookRepository = new \App\Repository\Books\BookRepository($db, $dataBinder);
$bookService = new \App\Service\Book\BookService($bookRepository);
$homeHttpHandler = new \App\Http\HomeHttpHandler($template, $dataBinder, $bookService);
$userBookRepository = new \App\Repository\UsersBooks\UserBookRepository($db, $dataBinder);
$userBookService = new \App\Service\UserBook\UserBookService($userBookRepository);
$bookHttpHandler = new \App\Http\BookHttpHandler($template, $dataBinder, $bookService, $userService, $userBookService);