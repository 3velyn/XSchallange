<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <a href="index.php">Home</a> | <a href="profile.php">My Profile</a>
    <?php /** @var \App\Data\BookDTO $data */ ?>
    <?php /** @var \App\Data\BookDTO $book */ ?>
    <?php foreach ($data as $book): ?>
        <div>
            <h2><?= $book->getName() ?></h2>
            <a href="view_book.php?id=<?= $book->getId() ?>"><img src="<?= $book->getImage() ?>"></a>

            <p>ISBN: <?= $book->getIsbn() ?></p>
            <p>Description: <?= substr($book->getDescription(), 0, 150) . "..." ?></p>
            <a href="view_book.php?id=<?= $book->getId() ?>">View</a> |
            <a href="delete_from_my_books.php?id=<?= $book->getId() ?>">Remove From My Books</a> |
            <a href="all_books.php">All Books</a>
            <hr/>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>