<h1>LOGIN</h1>

<?php /** @var array $errors */ ?>
<?php foreach ($errors as $error) : ?>
    <p><?= $error ?></p>
<?php endforeach; ?>

<div>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : null ?>">

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="password" value="">

        <input type="submit" name="login" value="Login"/>
    </form>
</div>
