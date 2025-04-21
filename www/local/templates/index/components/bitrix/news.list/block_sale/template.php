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

<?php if (!empty($arResult["ITEMS"])): ?>
	<?

	$randomKey = array_rand($arResult["ITEMS"]);
	$randomItem = $arResult["ITEMS"][$randomKey];

	?>

	<section class="sale">
		<div class="container sale__wrp">
			<h2><?= $randomItem["NAME"] ?></h2>
			<div class="sale__img-wrp">
				<img src="<?= $randomItem['PREVIEW_PICTURE']['SRC'] ?>" width="550" height="550">
			</div>
		</div>
	</section>
<?php endif; ?>