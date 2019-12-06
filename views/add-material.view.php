<?php require('partials/head.php'); ?>







<table >

<?php if(!empty($materials)) : foreach ($materials as $material) : ?>
    <tr>
        <th style="border: solid 1px"><?php echo $material->name?></th>
        <th style="border: solid 1px"><?php echo $material->unit?></th>
    </tr>
<?php endforeach; endif; ?>

</table>
<br>
<h1>Materiali lisamine</h1>

<form method='POST' action='/store'> 
    <input name='material_name'>
    <input name='unit' type="text">
    <button type='submit'>LISA</button>
</form>

<?php  ?>

<?php require('partials/footer.php'); ?>