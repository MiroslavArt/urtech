<?
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/../..");
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define('BX_NO_ACCELERATOR_RESET', true);
define('CHK_EVENT', true);

set_time_limit(0);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$dealId = intval($_POST['id']);
?>

<link rel="stylesheet" type="text/css" href="/bitrix/components/bitrix/ui.sidepanel.wrapper/templates/.default/template.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/components/bitrix/ui.toolbar/templates/.default/dist/ui.toolbar.bundle.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/js/ui/design-tokens/dist/ui.design-tokens.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/js/ui/entity-editor/entity-editor.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/js/ui/forms/ui.forms.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/js/ui/buttons/dist/ui.buttons.bundle.min.css">

<script type="text/javascript" src="/bitrix/js/main/jquery/jquery-3.6.0.min.js"></script>

<div class="ui-page-slider-wrapper ui-page-slider-padding template-bitrix24 template-air ui-page-slider-wrapper-default-theme --ui-context-content-light crm-pagetitle-view grid-mode intranet-binding-menu-page crm-pagetitle-view no-paddings no-background top-menu-mode top-menu-mode">
	<div class="ui-side-panel-toolbar">
		<div id="uiToolbarContainer" class="ui-toolbar --air --multiline-title">
			<div id="pagetitleContainer" class="ui-toolbar-title-box ">		
				<div class="ui-toolbar-title-inner">
					<div class="ui-toolbar-title-item-box">
						<span id="ui-editable-title-wrapper" class="ui-toolbar-title-item">
							<span id="pagetitle" class="ui-wrap-title-name-item ui-wrap-title-name">Создать сообщение</span>
						</span>		
					</div>					
				</div>
			</div>
		</div>
	</div>

	<div>
		<ul class="efrsb_ul">
			<li>
				<span>+</span>Реализация
				<ul class="efrsb_ul_2">
					<li>
						<span>+</span> Начало процедуры
						<ul class="efrsb_ul_3">
							<li data-id="1">ЕФРСБ РИ начало процедуры</li>
						</ul>
					</li>
					<li>
						<span>+</span> Завершение процедуры
						<ul class="efrsb_ul_3">
							<li data-id="2">Отчет завершение на ЕФРСБ</li>
							<li data-id="3">ЕФРСБ Преднамеренное банкротство РИ</li>
						</ul>
					</li>
					<li>
						<span>+</span> Собрание кредиторов
						<ul class="efrsb_ul_3">
							<li data-id="4">ЕФРСБ собрание кредиторов</li>
							<li data-id="5">ЕФРСБ по собранию - есть голоса</li>
							<li data-id="6">ЕФРСБ по собранию - нет голосов</li>
						</ul>
					</li>
					<li>
						<span>+</span> Остальное
						<ul class="efrsb_ul_3">
							<li data-id=7>Сообщение о получении требования кредиторов</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<span>+</span>Реструктуризация
				<ul class="efrsb_ul_2">
					<li>
						<span>+</span> Начало процедуры
						<ul class="efrsb_ul_3">
							<li data-id="8">ЕФРСБ РД начало процедуры</li>
						</ul>
					</li>
					<li>
						<span>+</span> Завершение процедуры
						<ul class="efrsb_ul_3">
							<li data-id="9">Отчет завершение на ЕФРСБ</li>
							<li data-id="10">ЕФРСБ Преднамеренное банкротство РД</li>
						</ul>
					</li>
					<li>
						<span>+</span> Собрание кредиторов
						<ul class="efrsb_ul_3">
							<li data-id="11">ЕФРСБ собрание кредиторов</li>
							<li data-id="12">ЕФРСБ по собранию - есть голоса</li>
							<li data-id="13">ЕФРСБ по собранию - нет голосов</li>
						</ul>
					</li>
					<li>
						<span>+</span> Остальное
						<ul class="efrsb_ul_3">
							<li data-id="14">Сообщение о получении требования кредиторов</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				<span>+</span>Торги
				<ul class="efrsb_ul_2">
					<li>
						<span>+</span> Все документы
						<ul class="efrsb_ul_3">
							<li data-id="15">Сообщение о собрании кредиторов</li>
							<li data-id="16">Сообщение о результатах торгов</li>
							<li data-id="17">Сообщение о результатах торгов. (с несколькими покупателями)</li>
							<li data-id="18">Сообщение о результатах торгов. (с одним покупателем)</li>
							<li data-id="19">Сообщение о результатах торгов. (с покупателем прямое предложение)</li>
							<li data-id="20">Шаблон Положение о реализации имущества недвижимости</li>
							<li data-id="21">Объявление о проведении торгов</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>

<script>
	$(function() {
		$('.efrsb_ul li').on('click', function(e) {
			e.preventDefault();

			if ($(e.target).parent().hasClass('efrsb_ul')) {
				if ($($(this).find('span')[0]).html() == '+') {
					$($(this).find('span')[0]).html('-');
					$(this).find('.efrsb_ul_2').show();
				} else {
					$($(this).find('span')[0]).html('+');
					$(this).find('.efrsb_ul_2').hide();
				}
			}
		})

		$('.efrsb_ul_2 li').on('click', function(e) {
			e.preventDefault();

			if ($(e.target).parent().hasClass('efrsb_ul_2')) {
				if ($($(this).find('span')[0]).html() == '+') {
					$($(this).find('span')[0]).html('-');
					$(this).find('.efrsb_ul_3').show();
				} else {
					$($(this).find('span')[0]).html('+');
					$(this).find('.efrsb_ul_3').hide();
				}
			}
		})

		$('.efrsb_ul_3 li').on('click', function(e) {
			e.preventDefault();

			$.ajax({
				url: '/local/ajax/sendMessage.php',
				type: 'POST',
				dataType: 'json',
				data: {id: $(this).data('id'), dealId: '<?=$dealId?>', name: $(this).html()},
				success: function(result) {
					alert('Отправка сообщения добавлена в очередь. Номер в очереди - ' + result.count);
				}
			})
		})
	})
</script>

<style>
	.ui-page-slider-padding {
		padding: 15px!important;
	}
	.ui-side-panel-toolbar {
		margin-left: 0;
		margin-bottom: 20px;
	}
	.ui-form-row {
		margin-bottom: 20px;
	}

	.efrsb_ul, .efrsb_ul_2, .efrsb_ul_3 {
		list-style: none;
		padding: 0;
	}
	.efrsb_ul li, .efrsb_ul_2 li, .efrsb_ul_3 li {
		font-size: 18px;
		margin-bottom: 10px;
		color: #1058d0;
		cursor: pointer;
	}
	.efrsb_ul li span, .efrsb_ul_2 li span, .efrsb_ul_3 li span {
		font-weight: bold;
		margin-right: 5px;
	}

	.efrsb_ul .efrsb_ul_2 {
		display: none;
	    margin-left: 15px;
    	margin-top: 10px;
	}

	.efrsb_ul .efrsb_ul_2 .efrsb_ul_3 {
		display: none;
	    margin-left: 30px;
    	margin-top: 10px;
	}

	.efrsb_ul_3 li {
		font-weight: bold;
	}
</style>


