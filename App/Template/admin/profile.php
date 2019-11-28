<?php /** @var  \App\Data\UserDTO $data[0] */ ?>
<?php /** @var \App\Data\UserDTO $user */ ?>

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
        <h2>Hello, <?= $data[0]->getFirstName(); ?></h2>

        <a href="#">Pending users</a> | <a href="logout.php">Logout</a>

        <table>
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
                <td><?= $user->getActive()?></td>
                <td><a href="approve_user.php?id=<?= $user->getId() ?>">Approve</a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <br/><br/>
        <a href="edit_profile.php?id=<?= $data[0]->getId() ?>">Edit profile</a>
        <a href="#">All books</a><br/>
        <a href="index.php">Home</a>
    </div>

</body>
</html>