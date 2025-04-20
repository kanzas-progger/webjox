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
$linkedElementsData = [];
?>

<?php if (!empty($arResult["ITEMS"])): ?>
	<?php foreach ($arResult["ITEMS"] as $arItem): ?>
		<?
		$linkedElementsIds = array();
		if (!empty($arItem['PROPERTIES']['good']['VALUE'])) {
			$linkedElementsIds = is_array($arItem['PROPERTIES']['good']['VALUE'])
				? $arItem['PROPERTIES']['good']['VALUE']
				: array($arItem['PROPERTIES']['good']['VALUE']);
		}

		if (!empty($linkedElementsIds)) {
			$res = CIBlockElement::GetList(
				array(),
				array("ID" => $linkedElementsIds, "ACTIVE" => "Y"),
				false,
				false,
				array("ID", "IBLOCK_ID", "NAME", "CODE", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*")
			);

			while ($linkedElement = $res->GetNextElement()) {
				$fields = $linkedElement->GetFields();
				$props = $linkedElement->GetProperties();

				if (!empty($fields["PREVIEW_PICTURE"])) {
					$fields["PREVIEW_PICTURE_SRC"] = CFile::GetPath($fields["PREVIEW_PICTURE"]);
				}

				$discountValue = isset($arItem["PROPERTIES"]["discount"]["VALUE"]) 
                    ? $arItem["PROPERTIES"]["discount"]["VALUE"] 
                    : 0;
			
				$discountPrice = $props["price"]["VALUE"] - ($props["price"]["VALUE"] * $discountValue / 100);

				$linkedElementsData[] = array(
					"FIELDS" => $fields,
					"PROPERTIES" => $props,
					"DISCOUNT_PRICE" => $discountPrice
				);
			};
		}

		?>
	<?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($linkedElementsData)): ?>
	<section class="favourite">
		<div class="favourite__slider">
			<div class="slider slick-favourite-slider">

				<?php foreach ($linkedElementsData as $linkedElementData): ?>
					<div class="slider__item">
						<div class="slider__item-wrp">
							<?php if (!empty($linkedElementData['FIELDS']['PREVIEW_PICTURE_SRC'])): ?>
								<img src="<?= $linkedElementData['FIELDS']['PREVIEW_PICTURE_SRC'] ?>" alt="<?= isset($linkedElementData['FIELDS']["PREVIEW_TEXT"]) ? $linkedElementData['FIELDS']["PREVIEW_TEXT"] : ""; ?>">
							<? endif; ?>
							<div class="slider__item-content-wrp">
								<h3><a href="#"><?= isset($linkedElementData['FIELDS']["PREVIEW_TEXT"]) ? $linkedElementData['FIELDS']["PREVIEW_TEXT"] : ""; ?></a></h3>
								<?php if (!empty($linkedElementData['DISCOUNT_PRICE'])): ?>
									<p><?= $linkedElementData['DISCOUNT_PRICE'] ?> ₽</p>
								<? endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="favourite__text">
			<div class="favourite__text-wrp">
				<h2>Распродажа</h2>
			</div>
		</div>
	</section>
<?php endif; ?>


<?php
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?>