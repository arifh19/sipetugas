<?php
$v1 = $model->bus->kapasitas;
$v2 = $model->jumlah;
$sum = number_format(($v2/$v1)*100,2);
?>
<html>

<h4><span class="label label-info label-md"> {{$sum."%"}}</span></h4>

</html>
