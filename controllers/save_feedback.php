<?php

//echo 'sumbit';
//echo '<br>';

$app['database']->insert('feedback', [
    'subject' => $_POST['subject'],
    'body' => $_POST['body']
]);

header("Location: /feedback");