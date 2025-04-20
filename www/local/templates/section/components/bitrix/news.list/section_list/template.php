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

$sectionData = [];

if ($parentId > 0) {
	// Получаем информацию о родительском разделе
	$res = CIBlockSection::GetByID($parentId);
	if ($arParent = $res->GetNext()) {
		$sectionData['parent'] = $arParent;

		// Получаем картинку родительского раздела
		if (!empty($arParent['PICTURE'])) {
			$sectionData['parent']['PICTURE_SRC'] = CFile::GetPath($arParent['PICTURE']);
		}
	}

	// Если есть ID дочернего раздела
	if ($childId > 0) {
		// Получаем информацию о дочернем разделе
		$res = CIBlockSection::GetByID($childId);
		if ($arChild = $res->GetNext()) {
			$sectionData['child'] = $arChild;

			// Получаем картинку дочернего раздела
			if (!empty($arChild['PICTURE'])) {
				$sectionData['child']['PICTURE_SRC'] = CFile::GetPath($arChild['PICTURE']);
			}
		}
	}
}
?>
<div class="header__inner">
	<div class="container">
		<?php if (!empty($sectionData)): ?>
			<nav>
				<ul class="header__inner-breadcrumbs-list">
					<?php if (isset($sectionData['parent'])): ?>
						<li><a href="/catalog.php"><?= $sectionData['parent']['NAME'] ?>&nbsp/&nbsp</a></li>
					<?php endif; ?>
					<?php if (isset($sectionData['child'])): ?>
						<li><a><?= $sectionData['child']['NAME'] ?></a></li>
					<?php endif; ?>
				</ul>
			</nav>
		<?php endif; ?>
	</div>
</div>
