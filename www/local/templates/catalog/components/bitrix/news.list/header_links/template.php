<?php
use Bitrix\Main\Loader;
if (!Loader::includeModule('iblock')) return;

$IBLOCK_ID = 1;
$curDir = $APPLICATION->GetCurDir();
$curDir = trim($curDir, '/');
$pathParts = explode('/', $curDir);


$urls = [];
$isRender = false;


if (count($pathParts) === 2 && $pathParts[0] === 'catalog') {
    $sectionCode = $pathParts[1];
    

    $section = \CIBlockSection::GetList([], [
        'IBLOCK_ID' => $IBLOCK_ID,
        'CODE' => $sectionCode
    ], false, ['ID', 'NAME', 'IBLOCK_SECTION_ID', 'CODE'])->GetNext();
    

    if ($section && $section['IBLOCK_SECTION_ID']) {
       
        $parentSection = \CIBlockSection::GetByID($section['IBLOCK_SECTION_ID'])->GetNext();
        
        if ($parentSection) {
            $urls[] = [
                'NAME' => $parentSection['NAME'],
                'URL' => '/catalog/' . $parentSection['CODE'] . '/',
                'IS_LINK' => true
            ];
            
            $urls[] = [
                'NAME' => $section['NAME'],
                'IS_LINK' => false
            ];
            
            $isRender = true;
        }
    }
}

elseif (count($pathParts) === 3 && $pathParts[0] === 'catalog') {
    $sectionCode = $pathParts[1];
    $elementCode = $pathParts[2];
    

    $section = \CIBlockSection::GetList([], [
        'IBLOCK_ID' => $IBLOCK_ID,
        'CODE' => $sectionCode
    ], false, ['ID', 'NAME', 'IBLOCK_SECTION_ID', 'CODE'])->GetNext();
    

    $element = \CIBlockElement::GetList([], [
        'IBLOCK_ID' => $IBLOCK_ID,
        'CODE' => $elementCode,
        'SECTION_ID' => $section['ID'],
        'INCLUDE_SUBSECTIONS' => 'Y'
    ], false, false, ['ID', 'NAME'])->GetNext();
    
    if ($section && $element) {

        if ($section['IBLOCK_SECTION_ID']) {

            $parentSection = \CIBlockSection::GetByID($section['IBLOCK_SECTION_ID'])->GetNext();
            
            if ($parentSection) {
                $urls[] = [
                    'NAME' => $parentSection['NAME'],
                    'URL' => '/catalog/' . $parentSection['CODE'] . '/',
                    'IS_LINK' => true
                ];
            }
        }
        
        $urls[] = [
            'NAME' => $section['NAME'],
            'URL' => '/catalog/' . $section['CODE'] . '/',
            'IS_LINK' => true
        ];
        
        $urls[] = [
            'NAME' => $element['NAME'],
            'IS_LINK' => false
        ];
        
        $isRender = true;
    }
}

if ($isRender && !empty($urls)) {
    ?>
    <div class="header__inner">
        <div class="container">
            <nav>
                <ul class="header__inner-breadcrumbs-list">
                    <?php
                    $lastIndex = count($urls) - 1;
                    foreach ($urls as $index => $item) {
                        echo '<li>';
                        if ($item['IS_LINK']) {
                            echo '<a href="' . htmlspecialchars($item['URL']) . '">' . htmlspecialchars($item['NAME']);
                            if ($index < $lastIndex) {
                                echo '&nbsp;/&nbsp;';
                            }
                            echo '</a>';
                        } else {
                            echo '<a>' . htmlspecialchars($item['NAME']) . '</a>';
                        }
                        echo '</li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php
}
?>