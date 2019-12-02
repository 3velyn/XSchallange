<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Web/css/style.css">
    <title>Add Book</title>
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

    <form method="post" class="form-inline">
        <div class="form-group ">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" id="name" name="name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="isbn" class="col-sm-2 col-form-label">ISBN:</label>
            <div class="col-sm-10">
                <input type="text" id="isbn" name="isbn" class="form-control">
            </div>
        </div>

        <div class="form-group shadow-textarea">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control "></textarea>
        </div>

        <div class="form-group">
            <label for="image_url" class="col-sm-2 col-form-label">Image URL:</label>
            <div class="col-sm-10">
                <input type="url" id="image_url" name="image" alt="" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="create" value="Add Book" class="btn btn-success">
        </div>
    </form>
</div>
</body>
</html>