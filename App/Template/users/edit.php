<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Edit Profile</title>
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

    <?php /** @var array $errors | null */ ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger" role="alert">
            <p><?= $error ?></p>
        </div>
    <?php endforeach; ?>

    <?php /** @var \App\Data\UserDTO $data */ ?>

    <div class="form-group mx-sm-3 mb-2">
        <h1>EDIT PROFILE</h1>
        <h3><?= $data->getEmail() ?></h3>

        <form method="post">
            <label for="old_password">Current Password:</label>
            <input type="password" id="old_password" name="old_password" class="form-control">

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" class="form-control">

            <label for="confirm_password">Confirm password:</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control">

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?= $data->getFirstName() ?>" class="form-control">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?= $data->getLastName() ?>" class="form-control">

            <input type="submit" name="edit" value="Edit" class="btn btn-primary mt-3">
        </form>
    </div>
</div>
</body>
</html>
