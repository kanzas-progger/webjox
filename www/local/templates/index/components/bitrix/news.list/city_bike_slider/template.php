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
	<section class="city-bike">
		<div class="container">
			<h2>Городские велосипеды</h2>
			<div class="slider slick-city-slider">

				<?php foreach ($arResult["ITEMS"] as $arItem): ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="slider__item" id="<?= $this->GetEditAreaId($arItem["ID"]) ?>">
						<div class="city-bike__slide-wrp">
							<?php if (!empty($arItem["PREVIEW_PICTURE"]["SRC"])): ?>
								<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="city-bike">
							<? endif; ?>
							<div class="city-bike__content">
								<?= isset($arItem["PREVIEW_TEXT"]) ? $arItem["PREVIEW_TEXT"] : ""; ?>
								<?php if (!empty($arItem["DETAIL_TEXT"]) && !empty($arItem["PROPERTIES"]["link"]["VALUE"])): ?>
									<a href="<?= $arItem["PROPERTIES"]["link"]["VALUE"] ?>"><?= $arItem["DETAIL_TEXT"] ?></a>
								<? endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</section>
<?php endif; ?>
<!-- <section class="city-bike">
		<div class="container">
			<h2>Городские велосипеды</h2>
			<div class="slider slick-city-slider">
				<div class="slider__item">
					<div class="city-bike__slide-wrp">
						<img src="img/city-bike.png" alt="city-bike">
						<div class="city-bike__content">
							<p>Предназначены для езды по дорогам с твердым покрытиям на не большие расстояния. Имеют гладкие покрышки, жесткую вилки, комфортную посадку. Как правило, сразу же оборудованы крыльями и багажником.</p>
							<a href="#">в раздел</a>
						</div>
					</div>
				</div>
				<div class="slider__item">
					<div class="city-bike__slide-wrp">
						<img src="img/city-bike.png" alt="city-bike">
						<div class="city-bike__content">
							<p>Это особенная модель городского велосипеда, на которую сейчас действуют скидки и акции</p>
							<a href="#">подробнее</a>
						</div>
					</div>
				</div>

				<div class="slider__item">
					<div class="city-bike__slide-wrp">
						<img src="img/city-bike.png" alt="city-bike">
						<div class="city-bike__content">
							<p>Дополнительные аксессуары для городских велосипедов. Все самое нужное и полезное. Без этих штучек ваша дорога будет скучна и безрадостно. Просто необходимо их приобрести</p>
							<a href="#">срочно купить</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section> -->