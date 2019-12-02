<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Register</title>
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


    <div class="form-group mx-sm-3 mb-2">
        <h1>REGISTER</h1>

        <form method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control">

            <label for="pass">Password:</label>
            <input type="password" id="pass" name="password" class="form-control">

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control">

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" class="form-control">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" class="form-control">

            <input type="submit" name="register" value="Register" class="btn btn-success mt-3">
        </form>
    </div>
</div>
</body>
</html>>