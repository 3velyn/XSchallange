<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php /** @var \App\Data\BookDTO $data[0] */ ?>

    <div>
        <h2><?= $data[0]->getName() ?></h2>
        <img src="<?= $data[0]->getImage() ?>">

        <p>ISBN: <?= $data[0]->getIsbn() ?></p>
        <p>Description: <?= $data[0]->getDescription() ?></p>
        <?php if ($data[1] === true): ?>
            <a href="edit_book.php?id=<?= $data[0]->getId() ?>">Edit</a>
            <a href="delete_book.php?id=<?= $data[0]->getId() ?>">Delete</a>
        <?php else: ?>
            <a href="add_to_my_books.php?id=<?= $data[0]->getId() ?>">Add to My Books</a>
        <?php endif; ?>
        <a href="all_books.php">All Books</a>
    </div>

</body>
</html>