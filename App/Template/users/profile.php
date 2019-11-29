<?php /** @var  \App\Data\UserDTO $data */ ?>

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
    <h2>Hello, <?= $data->getFirstName(); ?></h2>

    <a href="#">My books</a> | <a href="logout.php">Logout</a>
    <br /><br />
    <a href="edit_profile.php?id=<?= $data->getId() ?>">Edit Profile</a><br/>
    <a href="all_books.php">All books</a><br/>
    <a href="index.php">Home</a>
</div>

</body>
</html>