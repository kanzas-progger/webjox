<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>



<?php if (!empty($arResult)): ?>


	<nav class="header__nav-list-wrp">
		<ul class="header__nav-list">
			<?php foreach ($arResult as $item): ?>
				<li>
					<a href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?> </a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>

<?php endif; ?>