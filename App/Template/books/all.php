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
        <?php /** @var \App\Data\BookDTO[] $data[0] */ ?>
        <?php /** @var \App\Data\UserDTO $data[1] */ ?>
        <?php /** @var \App\Data\BookDTO $book */ ?>
        <?php foreach ($data[0] as $book): ?>
        <div>
            <h2><?= $book->getName() ?></h2>
            <a href="view_book.php?id=<?= $book->getId() ?>"><img src="<?= $book->getImage() ?>"></a>

            <p>ISBN: <?= $book->getIsbn() ?></p>
            <p>Description: <?= substr($book->getDescription(), 0, 150) . "..." ?></p>
            <a href="view_book.php?id=<?= $book->getId() ?>">View</a>
            <?php if ($data[1] === true): ?>
                <a href="edit_book.php?id=<?= $book->getId() ?>">Edit</a>
            <?php else: ?>
                <a href="add_to_my_books">Add to My Books</a>
            <?php endif; ?>
            <hr/>
        </div>
        <?php endforeach; ?>
    </div>

</body>
</html>