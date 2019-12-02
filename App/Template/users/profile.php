<?php /** @var  \App\Data\UserDTO $data */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a href="index.php" class="btn btn-primary">Home</a>
        <div class="btn float-right">
            <a href="profile.php" class="btn btn-primary">Profile</a>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </nav>


    <h2>Hello, <?= $data->getFirstName(); ?></h2>

    <a href="my_books.php" class="btn btn-primary">My books</a>
    <a href="edit_profile.php?id=<?= $data->getId() ?>" class="btn btn-primary">Edit Profile</a>
</div>

</body>
</html>