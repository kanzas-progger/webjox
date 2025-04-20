<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
    $INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
    $CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
    <!-- <div id="<?echo $CONTAINER_ID?>" class="header__search"> -->
        <form action="<?echo $arResult["FORM_ACTION"]?>">
            <label>
                <input id="<?echo $INPUT_ID?>" type="search" name="q" value="" placeholder="Поиск" autocomplete="off" />
                <span class="visually-hidden">поиск</span>
            </label>
        </form>
    <!-- </div> -->
<?endif?>
<script>
    BX.ready(function(){
        new JCTitleSearch({
            'AJAX_PAGE' : '<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>',
            'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
            'INPUT_ID': '<?echo $INPUT_ID?>',
            'MIN_QUERY_LEN': 2
        });
    });
</script>