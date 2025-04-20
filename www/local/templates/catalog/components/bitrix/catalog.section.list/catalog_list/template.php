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

$sectionsById = [];
foreach ($arResult['SECTIONS'] as $section) {
	$sectionsById[$section['ID']] = $section;
}

foreach ($arResult['SECTIONS'] as $section) {
	if ($section['DEPTH_LEVEL'] > 1 && isset($section['IBLOCK_SECTION_ID'])) {
		$sectionsById[$section['IBLOCK_SECTION_ID']]['SECTIONS'][] = $section;
	}
}

$parentSections = array_filter($sectionsById, function ($section) {
	return $section['DEPTH_LEVEL'] == 1;
});
?>

<div class="header__catalog-nav container">
	<a href="/catalog/">каталог</a>
	<?php if (!empty($arResult['SECTIONS'])): ?>
		<nav class="header__catalog-categories">
			<ul>
				<?php foreach ($parentSections as $section): ?>
					<li>
					<a href="<?= $section['SECTION_PAGE_URL'] ?>"><?= $section['NAME'] ?></a>
						<?php if (!empty($section['SECTIONS'])): ?>
							<ul class="header__sub-catalog-categories">
								<?php foreach ($section['SECTIONS'] as $subSection): ?>
									<li>
									<a href="<?= $subSection['SECTION_PAGE_URL'] ?>"><?= $subSection['NAME'] ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	<?php endif; ?>
	<nav class="header__catalog-nav-list-wrp">
		<ul class="header__catalog-nav-list">
			<li><a href="#">доставка</a></li>
			<li><a href="#">распродажа</a></li>
			<li><a href="#">отзывы</a></li>
			<li><a href="#">контакты</a></li>
		</ul>
	</nav>
</div>