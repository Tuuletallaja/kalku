<?php require('partials/head.php'); ?>


<?php if ($_SESSION['is_logged_in'] === true ): ?>
<h1>Materiali lisamine</h1>
<?php 
//$id = $_GET['id'];
if ($id = $_GET['id']) {
    $name = $_GET['name'];
    $unit = $_GET['unit'];
    echo("
    <form method='POST' action='/update'>
    <input hidden name='id' value='{$id}'>
    <input type='text' name='material_name' value='{$name}'>
    <input type='text' name='unit' type='text'value='{$unit}'>
    <button type='submit'>MUUDA</button>
    </form>"
);
} else {
    echo('
    <form method="POST" action="/store">
    <input name="material_name">
    <input name="unit" type="text">
    <button type="submit">LISA</button>
    </form>'
);

}

?>
<?php endif; ?>


<br><br>
<table >
    <tr>
        <th style="border: solid 1px">MATERIAL</th>
        <th style="border: solid 1px">ÜHIK</th>
    </tr>

<?php if(!empty($materials)) : foreach ($materials as $material) : ?>
    <tr>
        <td style="border: solid 1px"><?php echo $material->name?></td>
        <td style="border: solid 1px"><?php echo $material->unit?></td>

        <?php if ($_SESSION['is_logged_in'] === true ): ?>
        <?php endif; ?>
            
        <?php if ($_SESSION['is_admin'] === 'admin' ): ?>
        <td style="border: solid 1px"><a href="/addmaterial?id=<?php echo $material->idmaterials ?>&name=<?php echo $material->name?>&unit=<?php echo $material->unit?>">MUUDA</a></td>
        <td style="border: solid 1px"><a href="/delete_material?id=<?php echo $material->idmaterials ?>">KUSTUTA</a></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; endif; ?>

</table>
<br>


<?php  ?>

<?php require('partials/footer.php'); ?>