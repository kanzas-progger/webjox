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

// echo "<pre>";
// echo print_r($arParams);
// echo "</pre>";
?>
<section class="products">
	<div class="container">
		<h2>Похожие товары</h2>
		<div class="slider slick-good-slider">
			<?php foreach ($arResult['ITEMS'] as $arItem): ?>
				<?php
				$price = null;

				$offers = \CCatalogSKU::getOffersList(
					$arItem['ID'],
					0,
					['ACTIVE' => 'Y'],
					['ID'],
					[]
				);

				if (!empty($offers[$arItem['ID']])) {
					foreach ($offers[$arItem['ID']] as $offer) {
						$priceRes = CPrice::GetList(
							[],
							[
								"PRODUCT_ID" => $offer['ID'],
								"CATALOG_GROUP_ID" => 1
							]
						);
						if ($priceArr = $priceRes->Fetch()) {
							$price = round($priceArr["PRICE"]);
							break; 
						}
					}
				}
				?>

				<div class="slider__item">
					<div class="slider__item-wrp">
						<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['PREVIEW_TEXT'] ?>">
						<div class="slider__item-content-wrp">
							<h3><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['PREVIEW_TEXT'] ?></a></h3>
							<p><?= $price ?> ₽</p>
						</div>
					</div>
				</div>

			<?php endforeach ?>
		</div>
	</div>
</section>