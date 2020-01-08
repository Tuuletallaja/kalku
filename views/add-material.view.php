<?php require('partials/head.php'); ?>







<table >
    <tr>
        <th style="border: solid 1px">MATERIAL</th>
        <th style="border: solid 1px">ÜHIK</th>
    </tr>

<?php if(!empty($materials)) : foreach ($materials as $material) : ?>
    <tr>
        <td style="border: solid 1px"><?php echo $material->name?></td>
        <td style="border: solid 1px"><?php echo $material->unit?></td>
        <td style="border: solid 1px"><a href="">MUUDA</a></td>
        <td style="border: solid 1px"><a href="/delete_material?id=<?php echo $material->idmaterials ?>">KUSTUTA</a></td>
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