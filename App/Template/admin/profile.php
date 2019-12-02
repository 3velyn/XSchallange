<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="Web/js/admin_profile.js"></script>

    <title>Profile</title>
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
    <?php /** @var  \App\Data\UserDTO $data[0] */ ?>
    <?php /** @var \App\Data\UserDTO $user */ ?>
    <h2>Hello, <?= $data[0]->getFirstName(); ?></h2>

    <a href="edit_profile.php?id=<?= $data[0]->getId() ?>" class="btn btn-primary">Edit profile</a>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#pending_users" id="pending">
        Pending Users
    </button>
    <a href="add_book.php" class="btn btn-primary">Add Book</a>
    <a href="all_books.php" class="btn btn-primary">All Books</a>
    <div id="pending_users" style="display: none">
        <?php if ($data[1]): ?>
            <table class="table table-striped table-dark table-hover">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($data[1] as $user) : ?>
                    <tr>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->getFirstName() . ' ' . $user->getLastName() ?></td>
                        <td><?= $user->getActive() ?></td>
                        <td><a href="approve_user.php?id=<?= $user->getId() ?>" class="btn btn-primary">Approve</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No pending users</p>
        <?php endif; ?>
    </div>
</div>
<script>
    attachEvents();
</script>
</body>
</html>