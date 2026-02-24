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

CModule::IncludeModule('iblock');
?>

<link rel="stylesheet" type="text/css" href="/bitrix/components/bitrix/ui.sidepanel.wrapper/templates/.default/template.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/components/bitrix/ui.toolbar/templates/.default/dist/ui.toolbar.bundle.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/js/ui/design-tokens/dist/ui.design-tokens.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/components/bitrix/main.ui.filter/templates/.default/themes/air/style.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/components/bitrix/main.ui.grid/templates/.default/style.min.css">
<link rel="stylesheet" type="text/css" href="/bitrix/js/ui/buttons/dist/ui.buttons.bundle.min.css">

<script type="text/javascript" src="/bitrix/js/main/jquery/jquery-3.6.0.min.js"></script>

<div class="ui-page-slider-wrapper ui-page-slider-padding template-bitrix24 template-air ui-page-slider-wrapper-default-theme --ui-context-content-light crm-pagetitle-view grid-mode intranet-binding-menu-page crm-pagetitle-view no-paddings no-background top-menu-mode top-menu-mode">
	<div class="ui-side-panel-toolbar">
		<div id="uiToolbarContainer" class="ui-toolbar --air --multiline-title">
			<div id="pagetitleContainer" class="ui-toolbar-title-box ">		
				<div class="ui-toolbar-title-inner">
					<div class="ui-toolbar-title-item-box">
						<span id="ui-editable-title-wrapper" class="ui-toolbar-title-item">
							<span id="pagetitle" class="ui-wrap-title-name-item ui-wrap-title-name">История отправок</span>
						</span>		
					</div>					
				</div>
			</div>
		</div>
	</div>

	<?
	$rows = [];

	$rsElements = CIBlockElement::GetList(['ID' => 'DESC'], ['IBLOCK_ID' => 22, 'PROPERTY_DEAL_ID' => $dealId], false, false, []);
	while($arElement = $rsElements->GetNextElement()) {
		$fields = $arElement->getFields();
		$props = $arElement->getProperties();

		$flds = [
			'DATE' => date('d.m.Y', strtotime($fields['DATE_CREATE'])),
			'TYPE' => $props['TYPE']['VALUE'],
			'RESULT' => $props['RESULT']['VALUE']
		];

		if ($props['STATUS']['VALUE'] == 'WAIT') {
			$flds['STATUS'] = 'Ожидание отправки';
		} elseif ($props['STATUS']['VALUE'] == 'PROCESS') {
			$flds['STATUS'] = 'Отправляется';
		} else {
			$flds['STATUS'] = 'Отправлено';
		}

		$rows[]['data'] = $flds;
	}
	?>

	<?/* $APPLICATION->includeComponent(
		"bitrix:main.ui.filter",
		"",
		[
			"FILTER_ID" => "EFRSB_HISTORY_FILTER",
			"GRID_ID" => "EFRSB_HISTORY",
			'COLUMNS' => [ 
				['id' => 'DATE', 'name' => 'Дата', 'sort' => 'DATE', 'default' => true], 
				['id' => 'TYPE', 'name' => 'Тип сообщения', 'sort' => 'TYPE', 'default' => true], 
		        ['id' => 'STATUS', 'name' => 'Статус', 'sort' => 'STATUS', 'default' => true],
		    ], 
		]
	); */?>

	<? $APPLICATION->includeComponent(
		"bitrix:main.ui.grid",
		"",
		[
			'COLUMNS' => [ 
				['id' => 'DATE', 'name' => 'Дата', 'sort' => 'DATE', 'default' => true], 
				['id' => 'TYPE', 'name' => 'Тип сообщения', 'sort' => 'TYPE', 'default' => true], 
		        ['id' => 'STATUS', 'name' => 'Статус', 'sort' => 'STATUS', 'default' => true],
		        ['id' => 'RESULT', 'name' => 'Результат', 'sort' => 'RESULT', 'default' => true],
		    ], 
			"GRID_ID" => "EFRSB_HISTORY",
			"ROWS" => $rows,
		]
	); ?>
</div>

<script>
	$(function() {

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
</style>


