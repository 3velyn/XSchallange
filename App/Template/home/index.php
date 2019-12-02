<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a href="index.php" class="btn btn-primary">Home</a>
        <div class="btn float-right">
            <a href="register.php" class="btn btn-primary">Register</a>
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
    </nav>

    <?php /** @var array $errors | null */ ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger" role="alert">
            <p><?= $error ?></p>
        </div>
    <?php endforeach; ?>

    <div class="row justify-content-right  mb-3">
        <?php /** @var \App\Data\BookDTO $data */ ?>
        <?php /** @var \App\Data\BookDTO $book */ ?>
        <?php foreach ($data as $book): ?>
            <div class="card col-3  mt-1">
                <h2><?= $book->getName() ?></h2>

                <?php if ($book->getImage()): ?>
                    <a href="view_book.php?id=<?= $book->getId() ?>"><img src="<?= $book->getImage() ?>"
                                                                          class="card-img-top"></a>
                <?php else: ?>
                    <a href="view_book.php?id=<?= $book->getId() ?>"><img src="Web/img/1461-512.png"
                                                                          class="card-img-top"></a>
                <?php endif; ?>

                <div class="card-body">
                    <p>ISBN: <?= $book->getIsbn() ?></p>
                    <p>Description: <?= substr($book->getDescription(), 0, 150) . "..." ?></p>
                </div>
                <div class="text-left">
                    <a href="view_book.php?id=<?= $book->getId() ?>" class="btn btn-info mb-1">View</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>