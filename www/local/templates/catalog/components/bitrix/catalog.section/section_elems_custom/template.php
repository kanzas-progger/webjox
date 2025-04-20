<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);



if (!empty($arResult['NAV_RESULT'])) {
	$navParams = array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
} else {
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
}

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$obName = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-' . $navParams['NavNum'];

if ($showTopPager) {
?>
	<div data-pagination-num="<?= $navParams['NavNum'] ?>">
		<!-- pagination-container -->
		<?= $arResult['NAV_STRING'] ?>
		<!-- pagination-container -->
	</div>
<?
}

if (!isset($arParams['HIDE_SECTION_DESCRIPTION']) || $arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y') {
?>
	<div class="section-description">
		<p><?= $arResult['DESCRIPTION'] ?? '' ?></p>
	</div>
<?
}
?>

<?php
$arFilter = [
	'IBLOCK_ID' => $arParams['IBLOCK_ID'],
	'SECTION_ID' => $arResult['ID'],
	'ACTIVE' => 'Y',
	'GLOBAL_ACTIVE' => 'Y'
];

$rsSections = CIBlockSection::GetList(['SORT' => 'ASC'], $arFilter, false, ['ID', 'NAME', 'SECTION_PAGE_URL', 'PROPERTY_*']);
$arChildSections = [];
while ($arSection = $rsSections->GetNext()) {
	$arChildSections[] = $arSection;
}

$arItemsBySection = [];
foreach ($arResult['ITEMS'] as $item) {
	$rsGroups = CIBlockElement::GetElementGroups($item['ID'], true);
	while ($arGroup = $rsGroups->Fetch()) {
		$sectionId = $arGroup['ID'];
		$arItemsBySection[$sectionId][] = $item;
	}
}


?>

<?php
$isFirstSection = true;
?>

<?php foreach ($arChildSections as $section): ?>
	<?php if (!empty($arItemsBySection[$section['ID']])): ?>
		<?
		$sectionClass = $isFirstSection ? 'products' : 'products products--catalog';
		$isFirstSection = false;

		?>
		<section class="<?= $sectionClass ?>">
			<div class="container">
				<h2><?= $section['NAME'] ?> <?= $arResult['NAME'] ?></h2>
				<div class="slider slick-good-slider">
					<?php foreach ($arItemsBySection[$section['ID']] as $arItem): ?>
						<?
						$price = null;
						$res = \CCatalogSKU::getOffersList(
							$arItem['ID'],
							0,
							array('ACTIVE' => 'Y'),
							array("ID", "IBLOCK_ID", "CATALOG_QUANTITY"),
							array()
						);

						if (!empty($res[$arItem['ID']])) {
							foreach ($res[$arItem['ID']] as $offer) {
								$priceRes = CPrice::GetList(
									array(),
									array(
										"PRODUCT_ID" => $offer['ID'],
										"CATALOG_GROUP_ID" => 1
									)
								);
								if ($priceArr = $priceRes->Fetch()) {
									$price = round($priceArr["PRICE"]);
								}
							}
						}
						?>
						<div class="slider__item">
							<div class="slider__item-wrp">
								<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem['NAME'] ?>">
								<div class="slider__item-content-wrp">
									<h3><a href="/catalog/<?= $section['CODE'] ?>/<?= $arItem['CODE'] ?>/"><?= $arItem['PREVIEW_TEXT'] ?></a></h3>
									<p><?= $price ?> ₽</p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php endforeach; ?>

<?php if (!empty($arResult['ITEMS']) && empty($arChildSections)): ?>

	<section class="products-list">
		<div class="container">
			<?php
			$sectionTitle = $arResult['NAME'];

			if (CModule::IncludeModule('iblock') && !empty($arResult['IBLOCK_SECTION_ID'])) {
				$parentSectionRes = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
				if ($parentSection = $parentSectionRes->GetNext()) {
					$sectionTitle .= ' ' . $parentSection['NAME'];
				}
			}
			?>
			<h2><?= htmlspecialchars($sectionTitle) ?></h2>
			<div class="products-list__wrp">
				<?php foreach ($arResult['ITEMS'] as $arItem): ?>
					<?
					$price = null;
					$res = \CCatalogSKU::getOffersList(
						$arItem['ID'],
						0,
						array('ACTIVE' => 'Y'),
						array("ID", "IBLOCK_ID", "CATALOG_QUANTITY"),
						array()
					);

					if (!empty($res[$arItem['ID']])) {
						foreach ($res[$arItem['ID']] as $offer) {
							$priceRes = CPrice::GetList(
								array(),
								array(
									"PRODUCT_ID" => $offer['ID'],
									"CATALOG_GROUP_ID" => 1
								)
							);
							if ($priceArr = $priceRes->Fetch()) {
								$price = round($priceArr["PRICE"]);
							}
						}
					}
					?>
					<div class="products-list__item">
						<div class="products-list__content-wrp">
							<img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['PREVIEW_TEXT'] ?>">
							<div class="goods__item-content-wrp">
								<h3><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['PREVIEW_TEXT'] ?></a></h3>
								<p><?= $price ?> ₽</p>
							</div>
						</div>
						<button onclick="window.location.href='<?= $arItem['DETAIL_PAGE_URL'] ?>'">купить</button>
					</div>

				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?
if ($showBottomPager) {
?>
	<div data-pagination-num="<?= $navParams['NavNum'] ?>">
		<!-- pagination-container -->
		<?= $arResult['NAV_STRING'] ?>
		<!-- pagination-container -->
	</div>
<?
}

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>

<script>
	BX.message({
		BTN_MESSAGE_BASKET_REDIRECT: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
		BASKET_URL: '<?= $arParams['BASKET_URL'] ?>',
		ADD_TO_BASKET_OK: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		TITLE_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
		TITLE_BASKET_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
		TITLE_SUCCESSFUL: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		BASKET_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
		BTN_MESSAGE_SEND_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS') ?>',
		BTN_MESSAGE_CLOSE: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP') ?>',
		SITE_ID: '<?= CUtil::JSEscape($component->getSiteId()) ?>'
	});

	var <?= $obName ?> = new JCCatalogSectionComponent({
		siteId: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
		componentPath: '<?= CUtil::JSEscape($componentPath) ?>',
		navParams: <?= CUtil::PhpToJSObject($navParams) ?>,
		deferredLoad: false,
		initiallyShowHeader: '<?= !empty($arResult['ITEMS']) ?>',
		lazyLoad: false,
		template: '<?= CUtil::JSEscape($signedTemplate) ?>',
		ajaxId: '<?= CUtil::JSEscape($arParams['AJAX_ID'] ?? '') ?>',
		parameters: '<?= CUtil::JSEscape($signedParams) ?>',
		container: '<?= $containerName ?>'
	});

	// Добавление товаров в корзину
	BX.ready(function() {
		BX.bindDelegate(
			document.querySelector('.products-list__wrp'),
			'click', {
				attribute: 'data-add-basket'
			},
			function(e) {
				var productId = this.getAttribute('data-add-basket');
				if (productId) {
					BX.ajax.runComponentAction('bitrix:catalog.section', 'addToBasket', {
						mode: 'class',
						data: {
							id: productId,
							quantity: 1
						}
					}).then(function(response) {
						if (response.status === 'success') {
							alert('Товар добавлен в корзину');
						}
					});
				}
				e.preventDefault();
			}
		);
	});
</script>