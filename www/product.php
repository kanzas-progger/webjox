<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "product, catalog, cart, detail");
$APPLICATION->SetPageProperty("description", "Детальная страница товара");
$APPLICATION->SetTitle("Товар");
?><?$APPLICATION->IncludeComponent("bitrix:main.include", "includes", Array(
	"AREA_FILE_SHOW" => "file",	// Показывать включаемую область
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "standard.php",	// Шаблон области по умолчанию
		"PATH" => "",	// Путь к файлу области
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>