<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Page\Asset;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 * @var CUser $USER
 * @var SaleOrderAjax $component
 * @var string $templateFolder
 */

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();

if ($request->get('ORDER_ID') <> '') {
    include(Main\Application::getDocumentRoot() . $templateFolder . '/confirm.php');
} elseif ($arParams['DISABLE_BASKET_REDIRECT'] === 'Y' && $arResult['SHOW_EMPTY_BASKET']) {
    include(Main\Application::getDocumentRoot() . $templateFolder . '/empty.php');
} else {
    Asset::getInstance()->addString('<script>let orderInfo = ' . CUtil::PhpToJSObject($arResult['JS_DATA']) . ';</script>');

    Asset::getInstance()->addString('<script type="module" crossorigin src="/order/vue/index.js?v=5"></script>');

    echo '<div id="app"></div>';
}
