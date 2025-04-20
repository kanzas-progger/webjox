<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php'); 
?>

<?php
$APPLICATION->SetTitle("Результаты поиска");
?>

<main>
    <?php 
        $APPLICATION->IncludeComponent(
            "bitrix:search.title",
            ".default",
            array(
                "CHECK_DATES" => "N", 
                "arrWHERE" => array(), 
                "SHOW_WHERE" => "N",  
            ),
            false
        );
    ?>
</main>


<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); 
?>
