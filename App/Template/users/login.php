<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
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

    <?php /** @var array $errors | null */ ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger" role="alert">
            <p><?= $error ?></p>
        </div>
    <?php endforeach; ?>


    <div class="form-group mx-sm-3 mb-2">
        <h1>LOGIN</h1>

        <form method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : null ?>" class="form-control">

            <label for="pass">Password:</label>
            <input type="password" id="pass" name="password" value="" class="form-control">

            <input type="submit" name="login" value="Login" class="btn btn-primary mt-3"/>
        </form>
    </div>
</div>
</body>
</html>
