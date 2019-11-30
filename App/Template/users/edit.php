<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
</head>
<body>

    <div>
        <h1>EDIT PROFILE</h1>

        <?php /** @var array $errors | null */ ?>
        <?php foreach ($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>

        <?php /** @var \App\Data\UserDTO $data */ ?>
        <h3><?= $data->getEmail() ?></h3>

        <form method="post">
            <label for="old_password">Current Password:</label>
            <input type="password" id="old_password" name="old_password"><br/>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password"><br/>

            <label for="confirm_password">Confirm password:</label>
            <input type="password" id="confirm_password" name="confirm_password"><br/>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?= $data->getFirstName() ?>">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?= $data->getLastName() ?>"><br/>

            <input type="submit" name="edit" value="Edit">
        </form>
    </div>

</body>
</html>
