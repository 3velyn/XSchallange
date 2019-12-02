<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a href="all_books.php" class="btn btn-primary">Home</a>
        <div class="btn float-right">
            <a href="profile.php" class="btn btn-primary">Profile</a>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </nav>

    <?php /** @var \App\Data\BookDTO $data[0] */ ?>

    <div class="card col-7">
        <div class="card-header">
            <h2><?= $data[0]->getName() ?></h2>
        </div>

        <?php if ($data[0]->getImage()): ?>
            <a href="view_book.php?id=<?= $data[0]->getId() ?>"><img src="<?= $data[0]->getImage() ?>"
                                                                     class="card-img-top"></a>
        <?php else: ?>
            <a href="view_book.php?id=<?= $data[0]->getId() ?>"><img src="Web/img/1461-512.png"
                                                                     class="card-img-top"></a>
        <?php endif; ?>

        <p>ISBN: <?= $data[0]->getIsbn() ?></p>
        <p>Description: <?= $data[0]->getDescription() ?></p>

        <div class="text-left">
            <a href="add_to_my_books.php?id=<?= $data[0]->getId() ?>" class="btn btn-success">Add to My Books</a>
            <?php if ($data[1] === true): ?>
                <a href="edit_book.php?id=<?= $data[0]->getId() ?>" class="btn btn-info">Edit</a>
                <a href="delete_book.php?id=<?= $data[0]->getId() ?>" class="btn btn-danger" id="delete_book">Delete</a>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>