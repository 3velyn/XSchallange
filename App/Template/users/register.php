<h1>REGISTER</h1>

<?php /** @var array $errors | null */ ?>
<?php foreach ($errors as $error): ?>
    <p><?= $error ?></p>
<?php endforeach; ?>

<div>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="password">

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password">

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name">

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name">

        <input type="submit" name="register" value="Register">
    </form>
</div>