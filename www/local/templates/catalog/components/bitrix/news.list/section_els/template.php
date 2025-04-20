<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php
// echo '<pre>';
// echo print_r($arResult);
// echo '</pre>';
?>
<div class="slider slick-good-slider">
	<?php foreach ($arResult['ITEMS'] as $arItem): ?>
		<div class="slider__item">
			<div class="slider__item-wrp">
				<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem['NAME'] ?>">
				<div class="slider__item-content-wrp">
					<h3><a href="/catalog/<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['PREVIEW_TEXT'] ?></a></h3>
					<p><?= $arItem['PROPERTIES']['price']['VALUE'] ?> р</p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>