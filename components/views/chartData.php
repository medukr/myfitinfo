<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 07.08.18
 * Time: 17:57
 */
?>
<?php ?>
<script>
    function randColor(){
        return Math.round(Math.random() * 180);
    }
    let boSmallStatsDatasets = [
        <?php foreach ($roulettes as $roulette):?>
        {
            backgroundColor: 'rgba(' + randColor() + ', ' + randColor() + ', ' + randColor() + ', 0.3)',
            borderColor: 'rgb(' + randColor() + ', ' + randColor() + ', ' + randColor() + ')',
            data: [<?php foreach ($roulette as $data) echo $data . ',';?>],
            labels: [<?php foreach ($roulette as $data) echo $data . ',';?>],
        },
        <?php endforeach;?>
    ];

</script>