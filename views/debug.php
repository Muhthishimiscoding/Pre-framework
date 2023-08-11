<?php
$where = ['name'=>'Muhthishim','class'=>13,'iq'=>'unimaginably high'];
$stw = '';
foreach ($where as $key => $value) {
    $stw .="$key=:$key OR ";
}
echo substr($stw,0,-4);