<br>
<?php require('partials/head.php'); ?>
<br>
<br>
<br>
<form action="login" method="POST">
    <div>
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit" name="action" value="checkUser">LOGI SISSE</button>
    </div>

</form>

<?php require('partials/footer.php'); ?>