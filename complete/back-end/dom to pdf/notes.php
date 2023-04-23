<?php foreach($row as $k=>$f) {?>
    <?php if($k!=='created_at' && $k!=='updated_at' && $k!=='id'){ ?>
        <tr style="padding:10px">
            <th style="border:1px solid grey;padding:10px"><?= str_replace("_", " ", strtoupper($k)); ?></th>
            <td style="border:1px solid grey;padding:10px"><?= $f ?></td>
        </tr>
    <?php } ?>
<?php } ?>