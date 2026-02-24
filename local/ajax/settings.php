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

use Bitrix\Main\Config\Option;

$login = Option::get("main", "efrsb_login");
$password = Option::get("main", "efrsb_password");
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
							<span id="pagetitle" class="ui-wrap-title-name-item ui-wrap-title-name">Настройки ЕФРСБ</span>
						</span>		
					</div>					
				</div>
			</div>
		</div>
	</div>

	<form class="ui-form" id="efrsb-settings">
		<div class="ui-form-row">
			<div class="ui-form-label">
				<div class="ui-ctl-label-text">Логин в ЕФРСБ<span style="color:red">*</span></div>
			</div>
			<div class="ui-form-content">
				<div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
					<input type="text" class="ui-ctl-element" name="login" required value="<?=$login?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="ui-form-row">
			<div class="ui-form-label">
				<div class="ui-ctl-label-text">Пароль в ЕФРСБ<span style="color:red">*</span></div>
			</div>
			<div class="ui-form-content">
				<div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
					<input type="password" class="ui-ctl-element" name="password" required value="<?=$password?>">
				</div>
			</div>
		</div>
		<div class="ui-entity-editor-content-block-new-fields-btn-container">
 			<button type="submit" class="ui-btn ui-btn-primary">Сохранить</button>
		</div>
	</form>
</div>

<script>
	$(function() {
		$('#efrsb-settings').on('submit', function(e) {
			e.preventDefault();

			$.ajax({
				url: '/local/ajax/save-settings.php',
				data: $(this).serialize(),
				type: 'POST',
				dataType: 'json',
				success: function(result) {
					alert('Успешно сохранено');
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
</style>


