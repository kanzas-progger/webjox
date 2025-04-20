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
	$linkedItems = [];

	foreach ($arResult["ITEMS"] as $key => $arItem) {
		if (!empty($arItem['PROPERTIES']['good']['VALUE'])) {
			$linkedItems[$key] = $arItem;
		}
	}

	if (!empty($linkedItems)):

		$randomKey = array_rand($linkedItems);
		$randomItem = $linkedItems[$randomKey];

		$linkedItemsIds = is_array($randomItem['PROPERTIES']['good']['VALUE'])
			? $randomItem['PROPERTIES']['good']['VALUE']
			: array($randomItem['PROPERTIES']['good']['VALUE']);

		$res = CIBlockElement::GetList(
			array(),
			array("ID" => $linkedItemsIds, "ACTIVE" => "Y"),
			false,
			false,
			array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE")
		);

		if ($linkedElement = $res->GetNext()) {
			$imageSrc = "";
			if (!empty($linkedElement["PREVIEW_PICTURE"])) {
				$imageSrc = CFile::GetPath($linkedElement["PREVIEW_PICTURE"]);
			}

			if (!empty($imageSrc)):

	?>
				<div class="header__catalog-offer">
					<div class="container">
						<div class="header__catalog-offer-wrp">
							<h2><?= $randomItem["NAME"] ?></h2>
							<div class="header__catalog-offer-img">
								<img src="<?= $imageSrc ?>" width="350" height="350">
							</div>
						</div>
					</div>
				</div>
<?php
			endif;
		}
	endif;
endif;
?>

<?php
// echo '<pre>';
// print_r($randomItem);
// echo '</pre>';
?>

<script>
	console.log(<?php echo json_encode($arResult, JSON_PRETTY_PRINT); ?>);
</script>