<?php

$db = ORM::get_db();

$active = $db->query("
SELECT COUNT(DISTINCT username) total
FROM radacct
WHERE acctstoptime IS NULL
")->fetch(PDO::FETCH_ASSOC);

$activeCount = (int)$active['total'];

$total = $db->query("
SELECT COUNT(*) total
FROM tbl_customers
WHERE service_type='PPPoE'
")->fetch(PDO::FETCH_ASSOC);

$totalCount = (int)$total['total'];

$offlineCount = max(0, $totalCount - $activeCount);

?>

<div class="row">

<div class="col-md-4">
<div class="small-box bg-green">
<div class="inner">
<h3><?php echo $activeCount; ?></h3>
<p>PPPoE Aktif</p>
</div>
<div class="icon">
<i class="fa fa-wifi"></i>
</div>
</div>
</div>

<div class="col-md-4">
<div class="small-box bg-red">
<div class="inner">
<h3><?php echo $offlineCount; ?></h3>
<p>PPPoE Offline</p>
</div>
<div class="icon">
<i class="fa fa-times-circle"></i>
</div>
</div>
</div>

<div class="col-md-4">
<div class="small-box bg-aqua">
<div class="inner">
<h3><?php echo $totalCount; ?></h3>
<p>Total PPPoE</p>
</div>
<div class="icon">
<i class="fa fa-users"></i>
</div>
</div>
</div>

</div>