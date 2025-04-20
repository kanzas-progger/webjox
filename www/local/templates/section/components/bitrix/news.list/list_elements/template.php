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
$parentId = isset($_GET['parent']) ? intval($_GET['parent']) : 0;
$childId = isset($_GET['child']) ? intval($_GET['child']) : 0;

$sectionTitle = ''; 

if ($childId > 0) {

    $res = CIBlockSection::GetByID($childId);
    if ($arSection = $res->GetNext()) {
        $sectionTitle = $arSection['NAME'];
    }
} elseif ($parentId > 0) {
    $res = CIBlockSection::GetByID($parentId);
    if ($arSection = $res->GetNext()) {
        $sectionTitle = $arSection['NAME'];
    }
}
?>

<?php if (!empty($arResult['ITEMS'])) : ?>
	<section class="products-list">
	<div class="container">
            <h2><?=$sectionTitle?></h2>
            <div class="products-list__wrp">
				<? foreach ($arResult['ITEMS'] as $arItem): ?>
					<div class="products-list__item">
						<div class="products-list__content-wrp">
							<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>">
							<div class="goods__item-content-wrp">
								<h3><a href="product.html"><?= $arItem['PREVIEW_TEXT'] ?></a></h3>
								<p><?=$arItem['PROPERTIES']['price']['VALUE']?> ₽</p>
							</div>
						</div>
						<button onclick="window.location.href='/product.php?product_id=<?=$arItem['ID']?>'">купить</button>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
