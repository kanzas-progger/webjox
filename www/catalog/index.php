<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "каталог, товары");
$APPLICATION->SetPageProperty("description", "Страница каталога");
$APPLICATION->SetTitle("Каталог");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"includes",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "standard.php",
		"PATH" => "/includes"
	)
);?> <main>
<?
	$request_path = trim($_SERVER["REQUEST_URI"], "/");
	$request_path = str_replace("catalog/", "", $request_path);
	$path_parts = explode("/", $request_path);

	$isRootCatalog = ($_SERVER["REQUEST_URI"] == "/catalog/" || $_SERVER["REQUEST_URI"] == "/catalog");
	$isElementRequest = count($path_parts) > 1;

	if ($isRootCatalog) {
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"section_elems_custom",
			array(
				"ACTION_VARIABLE" => "action",
				"ADD_PICT_PROP" => "-",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"COMPATIBLE_MODE" => "Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_TO_BASKET_ACTION" => "ADD",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => "/personal/cart/",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"COMPATIBLE_MODE" => "N",
				"CONVERT_CURRENCY" => "N",
				"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
				"DETAIL_URL" => "",
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_COMPARE" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_FIELD2" => "id",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_ORDER2" => "desc",
				"ENLARGE_PRODUCT" => "STRICT",
				"FILTER_NAME" => "arrFilter",
				"HIDE_NOT_AVAILABLE" => "N",
				"HIDE_NOT_AVAILABLE_OFFERS" => "N",
				"IBLOCK_ID" => "1",
				"IBLOCK_TYPE" => "2",
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => "",
				"LAZY_LOAD" => "N",
				"LINE_ELEMENT_COUNT" => "3",
				"LOAD_ON_SCROLL" => "N",
				"MESSAGE_404" => "",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_BTN_LAZY_LOAD" => "Показать ещё",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_NOT_AVAILABLE" => "Нет в наличии",
				"MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"OFFERS_LIMIT" => "5",
				"OFFERS_FIELD_CODE" => array("ID", "CODE", "NAME", "SORT"),
				"OFFERS_PROPERTY_CODE" => array(
					0 => "COLOR",
					1 => "SIZE",
				),
				"OFFERS_CART_PROPERTIES" => array(
					0 => "COLOR",
					1 => "SIZE",
				),
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "",
				"PAGER_TITLE" => "Товары",
				"PAGE_ELEMENT_COUNT" => "18",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => array("BASE"),
				"PRICE_VAT_INCLUDE" => "N",
				"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_DISPLAY_MODE" => "Y",
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
				"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
				"PRODUCT_SUBSCRIPTION" => "N",
				"PROPERTY_CODE" => array(
					0 => "price",
					1 => "",
				),
				"SECTION_CODE" => "bicycles",
				"SECTION_ID" => "",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"SECTION_URL" => "/catalog/#SECTION_CODE#/",
				"SECTION_USER_FIELDS" => array(0 => "", 1 => "",),
				"SEF_FOLDER" => "/catalog/",
				"SEF_MODE" => "Y",
				"SEF_URL_TEMPLATES" => array(
					"compare" => "compare.php?action=#ACTION_CODE#",
					"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
					"section" => "#SECTION_CODE#/",
					"sections" => "",
					"smart_filter" => "#SECTION_ID#/filter/#SMART_FILTER_PATH#/apply/",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "N",
				"SHOW_CLOSE_POPUP" => "N",
				"SHOW_DISCOUNT_PERCENT" => "N",
				"SHOW_MAX_QUANTITY" => "N",
				"SHOW_OLD_PRICE" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"SHOW_SLIDER" => "N",
				"SLIDER_INTERVAL" => "3000",
				"SLIDER_PROGRESS" => "N",
				"TEMPLATE_THEME" => "blue",
				"USE_ENHANCED_ECOMMERCE" => "N",
				"USE_MAIN_ELEMENT_SECTION" => "N",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "N",
			)
		);
	} elseif ($isElementRequest) {

		$sectionCode = $path_parts[0];
		$elementCode = $path_parts[1];

		$GLOBALS["CATALOG_CURRENT_SECTION_CODE"] = $sectionCode;
		$GLOBALS["CATALOG_CURRENT_ELEMENT_CODE"] = $elementCode;


		$APPLICATION->IncludeComponent(
			"bitrix:catalog.element",
			"detail_element",
			array(
				"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
				"ADDITIONAL_FILTER_NAME" => "elementFilter",	// Имя массива со значениями фильтра для дополнительной фильтрации элемента
				"ADD_DETAIL_TO_SLIDER" => "N",	// Добавлять детальную картинку в слайдер
				"ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
				"ADD_PICT_PROP" => "photogallery",	// Дополнительная картинка основного товара
				"ADD_PROPERTIES_TO_BASKET" => "N",	// Добавлять в корзину свойства товаров и предложений
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"ADD_TO_BASKET_ACTION" => array(	// Показывать кнопки добавления в корзину и покупки
					0 => "BUY",
				),
				"ADD_TO_BASKET_ACTION_PRIMARY" => array(	// Выделять кнопки добавления в корзину и покупки
					0 => "BUY",
				),
				"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
				"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
				"BRAND_USE" => "N",	// Использовать компонент "Бренды"
				"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
				"CACHE_GROUPS" => "N",	// Учитывать права доступа
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CHECK_SECTION_ID_VARIABLE" => "N",	// Использовать код группы из переменной, если не задан раздел элемента
				"COMPATIBLE_MODE" => "N",	// Включить режим совместимости
				"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
				"DETAIL_PICTURE_MODE" => array(	// Режим показа детальной картинки
					0 => "POPUP",
					1 => "MAGNIFIER",
				),
				"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
				"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
				"DISPLAY_NAME" => "Y",	// Выводить название элемента
				"DISPLAY_PREVIEW_TEXT_MODE" => "S",	// Показ описания для анонса
				"ELEMENT_CODE" => $elementCode,	// Код элемента
				"ELEMENT_ID" => "",	// ID элемента
				"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
				"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
				"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
				"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
				"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
				"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
				"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
				"GIFTS_MESS_BTN_BUY" => "Выбрать",
				"GIFTS_SHOW_DISCOUNT_PERCENT" => "N",
				"GIFTS_SHOW_IMAGE" => "Y",
				"GIFTS_SHOW_NAME" => "Y",
				"GIFTS_SHOW_OLD_PRICE" => "N",
				"HIDE_NOT_AVAILABLE_OFFERS" => "Y",	// Недоступные торговые предложения
				"IBLOCK_ID" => "1",	// Инфоблок
				"IBLOCK_TYPE" => "2",	// Тип инфоблока
				"IMAGE_RESOLUTION" => "1by1",	// Соотношение сторон изображения товара
				"LABEL_PROP" => array(	// Свойство меток товара
					0 => "is_popular",
				),
				"LABEL_PROP_MOBILE" => "",	// Свойства меток товара, отображаемые на мобильных устройствах
				"LABEL_PROP_POSITION" => "top-left",	// Расположение меток товара
				"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
				"LINK_IBLOCK_ID" => "",	// ID инфоблока, элементы которого связаны с текущим элементом
				"LINK_IBLOCK_TYPE" => "",	// Тип инфоблока, элементы которого связаны с текущим элементом
				"LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
				"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
				"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
				"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
				"MESS_COMMENTS_TAB" => "Комментарии",	// Текст вкладки "Комментарии"
				"MESS_DESCRIPTION_TAB" => "Описание",	// Текст вкладки "Описание"
				"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
				"MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",	// Сообщение о недоступности услуги
				"MESS_PRICE_RANGES_TITLE" => "Цены",	// Название блока c расширенными ценами
				"MESS_PROPERTIES_TAB" => "Характеристики",	// Текст вкладки "Характеристики"
				"META_DESCRIPTION" => "size",	// Установить описание страницы из свойства
				"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
				"OFFERS_LIMIT" => "5",
				"OFFERS_PROPERTY_CODE" => array(
					0 => "SIZE",
					1 => "COLOR",
				),
				"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
				"PRICE_CODE" => array("BASE"),	// Тип цены
				"PRICE_VAT_INCLUDE" => "N",	// Включать НДС в цену
				"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
				"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
				"PRODUCT_INFO_BLOCK_ORDER" => "sku,props",	// Порядок отображения блоков информации о товаре
				"PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",	// Порядок отображения блоков покупки товара
				"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
				"PRODUCT_SUBSCRIPTION" => "N",	// Разрешить оповещения для отсутствующих товаров
				"PROPERTY_CODE" => array(
					0 => "price",
					1 => "photogallery",
					2 => "size",
					3 => "color",
					4 => "availability"
				),
				"SECTION_CODE" => $sectionCode,	// Код раздела
				"SECTION_CODE_PATH" => "",	// Путь из символьных кодов раздела
				"SECTION_ID" => "",	// ID раздела
				"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
				"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
				"SEF_FOLDER" => "/catalog/",
				"SEF_MODE" => "Y",
				"SEF_URL_TEMPLATES" => array(
					"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
				),	// Включить поддержку ЧПУ
				"SEF_RULE" => "",	// Правило для обработки
				"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
				"SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
				"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
				"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
				"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
				"SET_STATUS_404" => "N",	// Устанавливать статус 404
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SET_VIEWED_IN_COMPONENT" => "Y",	// Включить сохранение информации о просмотре товара для старых шаблонов
				"SHOW_404" => "N",	// Показ специальной страницы
				"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
				"SHOW_DEACTIVATED" => "N",	// Показывать деактивированные товары
				"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
				"SHOW_MAX_QUANTITY" => "N",	// Показывать остаток товара
				"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
				"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
				"SHOW_SKU_DESCRIPTION" => "N",	// Отображать описание для каждого торгового предложения
				"SHOW_SLIDER" => "N",	// Показывать слайдер для товаров
				"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа элемента
				"TEMPLATE_THEME" => "",	// Цветовая тема
				"USE_COMMENTS" => "N",	// Включить отзывы о товаре
				"USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
				"USE_ENHANCED_ECOMMERCE" => "N",	// Включить отправку данных в электронную торговлю
				"USE_GIFTS_DETAIL" => "N",	// Показывать блок "Подарки" в детальном просмотре
				"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",	// Показывать блок "Товары к подарку" в детальном просмотре
				"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
				"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
				"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
				"USE_RATIO_IN_RANGES" => "N",	// Учитывать коэффициенты для диапазонов цен
				"USE_VOTE_RATING" => "N",	// Включить рейтинг товара
			),
			false
		);
	} else {

		$sectionCode = $request_path;

		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"section_elems_custom",
			array(
				"ACTION_VARIABLE" => "action",
				"ADD_PICT_PROP" => "-",
				"ADD_PROPERTIES_TO_BASKET" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_TO_BASKET_ACTION" => "ADD",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => "/personal/basket.php",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"COMPATIBLE_MODE" => "N",
				"CONVERT_CURRENCY" => "N",
				"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
				"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
				"DISABLE_INIT_JS_IN_COMPONENT" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_COMPARE" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_FIELD2" => "id",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_ORDER2" => "desc",
				"ENLARGE_PRODUCT" => "STRICT",
				"FILTER_NAME" => "arrFilter",
				"HIDE_NOT_AVAILABLE" => "N",
				"HIDE_NOT_AVAILABLE_OFFERS" => "N",
				"IBLOCK_ID" => "1",
				"IBLOCK_TYPE" => "2",
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => "",
				"LAZY_LOAD" => "N",
				"LINE_ELEMENT_COUNT" => "3",
				"LOAD_ON_SCROLL" => "N",
				"MESSAGE_404" => "",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_BTN_LAZY_LOAD" => "Показать ещё",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_NOT_AVAILABLE" => "Нет в наличии",
				"MESS_NOT_AVAILABLE_SERVICE" => "Недоступно",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"OFFERS_LIMIT" => "5",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "",
				"PAGER_TITLE" => "Товары",
				"PAGE_ELEMENT_COUNT" => "18",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => "",
				"PRICE_VAT_INCLUDE" => "N",
				"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
				"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
				"PRODUCT_SUBSCRIPTION" => "N",
				"PROPERTY_CODE" => array(
					0 => "price",
					1 => "",
				),
				"SECTION_CODE" => $sectionCode,
				"SECTION_ID" => "",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"SECTION_URL" => "/catalog/#SECTION_CODE#/",
				"SECTION_USER_FIELDS" => array(0 => "", 1 => "",),
				"SEF_FOLDER" => "/catalog/",
				"SEF_MODE" => "Y",
				"SEF_URL_TEMPLATES" => array(
					"compare" => "compare.php?action=#ACTION_CODE#",
					"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
					"section" => "#SECTION_CODE#/",
					"sections" => "",
					"smart_filter" => "#SECTION_ID#/filter/#SMART_FILTER_PATH#/apply/",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "N",
				"SHOW_CLOSE_POPUP" => "N",
				"SHOW_DISCOUNT_PERCENT" => "N",
				"SHOW_MAX_QUANTITY" => "N",
				"SHOW_OLD_PRICE" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"SHOW_SLIDER" => "N",
				"SLIDER_INTERVAL" => "3000",
				"SLIDER_PROGRESS" => "N",
				"TEMPLATE_THEME" => "blue",
				"USE_ENHANCED_ECOMMERCE" => "N",
				"USE_MAIN_ELEMENT_SECTION" => "N",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "N"
			)
		);
	}
	?><?$APPLICATION->IncludeComponent(
	"bitrix:catalog.products.viewed",
	"products_viewed_custom",
	Array(
		"ACTION_VARIABLE" => "action_cpv",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"DEPTH" => "2",
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
		"DISPLAY_COMPARE" => "N",
		"ENLARGE_PRODUCT" => "STRICT",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_MODE" => "single",
		"IBLOCK_TYPE" => "2",
		"LABEL_PROP_POSITION" => "top-left",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_PROPERTY_CODE" => array("price"),
		"PAGE_ELEMENT_COUNT" => "9",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("BASE"),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE_1" => array(0=>"price",1=>""),
		"SECTION_CODE" => $GLOBALS["CATALOG_CURRENT_SECTION_CODE"],
		"SECTION_ELEMENT_CODE" => $GLOBALS["CATALOG_CURRENT_ELEMENT_CODE"],
		"SECTION_ELEMENT_ID" => "",
		"SECTION_ID" => "",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?></main><main><?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"sales_list",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"CODE",1=>"NAME",2=>"PREVIEW_TEXT",3=>"PREVIEW_PICTURE",4=>"DETAIL_TEXT",5=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "2",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "12",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"good",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "",
		"STRICT_SECTION_CHECK" => "N"
	)
);?> </main><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>