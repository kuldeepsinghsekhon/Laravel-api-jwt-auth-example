<div class="container col-lg-6">
	<div class="card">
	  <div class="card-header alert-success">
	    <?php if($fd = $this->session->flashdata('success')): ?>
				<?=$fd?>
			<?php endif; ?>
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">Name => <?=$name?></li>
	    <li class="list-group-item">Paid => $<?=$paid?></li>
	    <li class="list-group-item">Date and Time => <?=$date_time?></li>
	    <li class="list-group-item">Transaction ID => <?=$txn_id?></li>
	    <li class="list-group-item"><a href="<?=base_url()?>" class="btn btn-info">Home</a></li>
	  </ul>
</div>
</div>