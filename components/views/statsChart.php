<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 24.08.18
 * Time: 23:08
 */
?>

<script>
    function randColor(){
        return Math.round(Math.random() * 180);
    }
    let boSmallStatsDatasets = [
        <?php foreach ($data as $sets):?>
        {
            backgroundColor: 'rgba(' + randColor() + ', ' + randColor() + ', ' + randColor() + ', 0.3)',
            borderColor: 'rgb(' + randColor() + ', ' + randColor() + ', ' + randColor() + ')',
            data: [<?php foreach ($sets['sets'] as $set) echo $set['sum']['weight'] . ','?>],
            labels: [<?php foreach ($sets['sets'] as $set) echo $set['sum']['weight'] . ','?>],
        },
        <?php endforeach;?>
    ];

</script>

