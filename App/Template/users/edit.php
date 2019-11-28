<?php /** @var array $errors | null */ ?>
<?php foreach ($errors as $error): ?>
    <p><?= $error ?></p>
<?php endforeach; ?>

<?php /** @var \App\Data\UserDTO $data */ ?>

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

        <form method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $data->getEmail() ?>" disabled>


            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?= $data->getFirstName() ?>">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?= $data->getLastName() ?>">

            <input type="submit" name="edit" value="Edit">
        </form>
    </div>

</body>
</html>
