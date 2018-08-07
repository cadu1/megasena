<div class="row">
	<div class="col-xs-6 col-sm-offset-2 col-sm-4 col-md-offset-3 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">Qtd Jogos</h4>
			</div>
			<div class="panel-body center">
				<h1><?php echo $qtd; ?></h1>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-sm-4 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">Total Jogos(R$)</h4>
			</div>
			<div class="panel-body center">
				<h1><?php echo $valor; ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">Números Mais Jogados</h4>
			</div>
			<div class="panel-body center">
				<?php
				forEach($numeros as $num) {
					?>
					<div class="bola non-click"><?php echo str_pad($num['numero'], 2, '0', STR_PAD_LEFT); ?></div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 center">
		<a class="btn btn-default sorteio" href="#" role="button">Gerar Sorteio</a>
	</div>
</div>

<div class="conteudo mt-10"></div>