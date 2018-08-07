var num = new Array();
var url = '';
$( document ).ready(function() {
	url = $('meta[name="url"]').attr('content');
	$('a.sorteio').click(function(evt) {
		$('div.conteudo').load( url + 'megasena/novo_sorteio');
	});

	$('div.bola:not(.non-click)').click(function(evt) {
		id = $(this).data('id');
		if($(this).hasClass('select')) {
			$(this).removeClass('select');
			num.forEach((item, ind) => {
				if( item == id ) {
					num.splice(ind, 1);
				}
			}, id);
			totalizador(num.length);
		} else if(num.length <= 7) {
			$(this).addClass('select');
			num.push(id);
			totalizador(num.length);
		} else {
			mostra_alerta('Ops! Você já selecionou o número máximo de números permitidos', 'w');
		}
	});
	$('a.jogar').click(function(evt) {
		if( num.length < 6 || num.length > 8 ) {
			mostra_alerta('Ops! Você não marcou a quantidade mínima, ou máxima de números', 'i');
			return;
		}
		$.post( url + 'megasena/novo_jogo', {num: num}, function(d) {
			if(!d.status) {
				mostra_alerta(d.msg, 'd');
			} else {
				mostra_alerta('Jogo gravado com sucesso', 's');
				num = new Array();
				totalizador(0);
				$('div.bola.select').each(function() {
					$(this).removeClass('select');
				});
			}
		}, 'json');
	});
});

function totalizador(jogadas) {
	valor = '0,00';
	if(jogadas == 6) {
		valor = '2,50';
	} else if(jogadas == 7) {
		valor = '5,00';
	} else if(jogadas == 8) {
		valor = '10,00';
	}
	$('span.total').html(valor);
}

function mostra_alerta(msg, tipo) {
	$('div#alerta').removeClass('alert-success');
	$('div#alerta').removeClass('alert-danger');
	$('div#alerta').removeClass('alert-info');
	$('div#alerta').removeClass('alert-warning');

	if(tipo == 's') {
		$('div#alerta').addClass('alert-success');
	} else if(tipo == 'd') {
		$('div#alerta').addClass('alert-danger');
	} else if(tipo == 'i') {
		$('div#alerta').addClass('alert-info');
	} else {
		$('div#alerta').addClass('alert-warning');
	}

	$('div#alerta').html(msg);
	$('div#alerta').fadeIn().delay(5000).fadeOut('slow');
}