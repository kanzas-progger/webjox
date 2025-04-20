<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true)
?>

<?php
$elementId = null;
$offerPrice = null;

if (!empty($arResult['CODE']) && !empty($arParams['IBLOCK_ID'])) {
	$res = CIBlockElement::GetList(
		[],
		[
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'CODE' => $arResult['CODE'],
			'ACTIVE' => 'Y'
		],
		false,
		false,
		['ID']
	);

	if ($element = $res->Fetch()) {
		$elementId = $element['ID'];
	}
}

$res = \CCatalogSKU::getOffersList(
	$elementId,
	0,
	array('ACTIVE' => 'Y'),
	array("ID", "IBLOCK_ID", "CATALOG_QUANTITY"),
	array()
);

if (!empty($res[$elementId])) {
	foreach ($res[$elementId] as $offer) {
		$priceRes = CPrice::GetList(
			array(),
			array(
				"PRODUCT_ID" => $offer['ID'],
				"CATALOG_GROUP_ID" => 1
			)
		);

		if ($priceArr = $priceRes->Fetch()) {
			$offerPrice = round($priceArr["PRICE"]);
		}
	}
}

?>




<section class="product-card">
	<div class="container">

		<h1><?= $arResult['NAME'] ?></h1>
		<div class="product-card__info-wrp">
			<div class="product-card__img-wrp">
				<img src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" alt="bike">
			</div>

			<form class="product-card__form" action="">
				<div class="product-card__form-wrp">
					<fieldset>
						<div class="product-card__form-title-wrp">
							<legend>Размер</legend>
							<button type="button">Руководство</button>
						</div>
						<div class="product-card__form-radio-wrp">
							<?php foreach ($arResult['OFFERS'][0]['PROPERTIES']['SIZE']['VALUE'] as $size): ?>
								<input class="visually-hidden" type="radio" id="<?= $size ?>-size" name="size" value="<?= $size ?>-size">
								<label for="<?= $size ?>-size">
									<?= $size ?>
								</label>
							<?php endforeach; ?>
						</div>
					</fieldset>
					<fieldset>
						<div class="product-card__form-title-wrp">
							<legend>Цвета</legend>
						</div>
						<div class="product-card__form-radio-wrp product-card__form-radio-wrp--size">
							<?php foreach ($arResult['OFFERS'][0]['PROPERTIES']['COLOR']['VALUE'] as $color): ?>
								<input class="visually-hidden" type="radio" id="<?= $color ?>" name="color" value="<?= $color ?>">
								<label for="<?= $color ?>">
									<?= $color ?>
								</label>
							<?php endforeach; ?>
						</div>
					</fieldset>
					<h3>Наличие</h3>
					<span><?= $arResult['PROPERTIES']['availability']['VALUE'] ?></span>
					<p><?= $offerPrice ?> ₽</p>
				</div>
				<button type="button">добавить в избранное</button>
				<button type="submit">добавить в корзину</button>
			</form>
		</div>
	</div>
</section>

<section class="information">
	<h2 class="visually-hidden">information</h2>
	<div class="container">
		<div class="information__wrp">
			<div class="information__images">
				<?php if (!empty($arResult['PROPERTIES']['photogallery'])): ?>
					<?php foreach ($arResult['PROPERTIES']['photogallery']['VALUE'] as $photoId): ?>
						<?
						$filePath = CFile::GetPath($photoId);
						?>
						<img src="<?= $filePath ?>" alt="info">
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="information__text">
				<?= $arResult['DETAIL_TEXT'] ?>
			</div>
		</div>
	</div>
</section>

<section class="review">
	<div class="container">
		<h2>Отзывы покупателей</h2>
		<div class="review__wrp">
			<ul class="review__list">
				<li class="review__item">
					<h3>Great Bike</h3>
					<p>I bought this bike about 1.5 months ago if I recall properly, to this day I've got a little
						bit
						over 550km on it. The group set isn't the greatest, I've been having issues with it where it
						skips a cog sometimes, not sure why that might be. I also don't live near a store so I can't
						take it in, so I'll have to set if I can take it to a local bike shop I guess. Great bike
						tho,
						and if you're looking into getting something like this on a budget I would suggest it. I
						know I
						might not win any races, but I'm on it to ride and get excercise, so it meets my needs. Also
						the
						customers service is great and they helped me over the phone a lot.
					</p>
					<span>Leon</span>
					<time>Март 2025</time>
				</li>
				<li class="review__item">
					<h3>Great Bike</h3>
					<p>I bought this bike about 1.5 months ago if I recall properly, to this day I've got a little
						bit
						over 550km on it. The group set isn't the greatest, I've been having issues with it where it
						skips a cog sometimes, not sure why that might be. I also don't live near a store so I can't
						take it in, so I'll have to set if I can take it to a local bike shop I guess. Great bike
						tho,
						and if you're looking into getting something like this on a budget I would suggest it. I
						know I
						might not win any races, but I'm on it to ride and get excercise, so it meets my needs. Also
						the
						customers service is great and they helped me over the phone a lot.
					</p>
					<span>Leon</span>
					<time>Апрель 2025</time>
				</li>
			</ul>
			<button type="button">Просмотреть все</button>
		</div>
	</div>
</section>


<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"related_items",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "N",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "ID",
			1 => "CODE",
			2 => "NAME",
			3 => "PREVIEW_TEXT",
			4 => "PREVIEW_PICTURE",
			5 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => $arParams['IBLOCK_ID'],	// Код информационного блока
		"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => $arResult['SECTION']['CODE'],	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "price",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "",	// Поле для первой сортировки новостей
		"SORT_BY2" => "",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
	),
	false
); ?>