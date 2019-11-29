<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
</head>
<body>

<?php /** @var array $errors | null */ ?>
<?php foreach ($errors as $error): ?>
    <p><?= $error ?></p>
<?php endforeach; ?>

<?php /** @var \App\Data\BookDTO $data */ ?>
<div>
    <form method="post">
        <h1><?= $data->getName() ?></h1>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="<?= $data->getIsbn() ?>">

        <label for="description">Description:</label>
        <textarea id="description" name="description" value="<?= $data->getDescription() ?>"></textarea>

        <label for="image_url">Image URL:</label>
        <input type="url" id="image_url" name="image" alt="" value="<?= $data->getImage() ?>">

        <input type="submit" name="edit" value="Edit Book">
        <a href="delete_book.php?id=<?= $data->getId() ?>">Delete</a>
    </form>
</div>

</body>
</html>