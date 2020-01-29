<br>
<?php require('partials/head.php'); ?>
<br>
<br>
<br>
<?php 

echo $error['username_error']; ?>

<form action="register" method="POST">
    <div>
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit" name="action" value="checkUser">Registreeri</button>
    </div>

</form>

<?php require('partials/footer.php'); ?>