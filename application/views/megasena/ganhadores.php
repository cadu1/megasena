<div class="row">
	<div class="col-xs-12 col-sm-offset-1 col-sm-2 col-md-offset-2 col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">Ganhadores</h4>
			</div>
			<div class="panel-body center num-gan">
				<?php echo count($ganhadores); ?>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-8 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">Números Sorteados</h4>
			</div>
			<div class="panel-body center">
				<?php
				forEach($num_sort as $num) {
					?>
					<div class="bola non-click"><?php echo str_pad($num, 2, '0', STR_PAD_LEFT); ?></div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>