<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
</head>
<body>

<?php /** @var array $errors | null */ ?>
<?php foreach ($errors as $error): ?>
    <p><?= $error ?></p>
<?php endforeach; ?>

    <div>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn">

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <label for="image_url">Image URL:</label>
            <input type="url" id="image_url" name="image" alt="">

            <input type="submit" name="create" value="Add Book">
        </form>
    </div>

</body>
</html>