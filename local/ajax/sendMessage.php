<?
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/../..");
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define('BX_NO_ACCELERATOR_RESET', true);
define('CHK_EVENT', true);

set_time_limit(0);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $USER;

CModule::IncludeModule('iblock');

if ($_POST['id'] && $_POST['dealId']) {
	$el = new CIBlockElement;
	$el->Add([
		'IBLOCK_ID' => 22,
		'NAME' => 'Сообщение',
		'PROPERTY_VALUES' => [
			'TYPE' => $_POST['name'],
			'USER' => $USER->GetID(),
			'DEAL_ID' => $_POST['dealId'],
			'STATUS' => 'WAIT',
			'TYPE_ID' => $_POST['id']
		]
	]);

	$count = CIBlockElement::GetList([], ['IBLOCK_ID' => 22, 'PROPERTY_STATUS' => 'WAIT'], false, false, ['ID']);

	echo json_encode(['count' => $count->SelectedRowsCount()]);
	die();
}

echo json_encode('ok');
die();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>