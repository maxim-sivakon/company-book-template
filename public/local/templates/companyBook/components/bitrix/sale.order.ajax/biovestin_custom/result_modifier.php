<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

use Bitrix\Sale\Delivery\Restrictions\ByPaySystem;
use Bitrix\Sale\Internals\DeliveryPaySystemTable;
use biovestin24\City;

$objCity = new City();
$arCityInfo = $objCity->getCurrentCityInfo();

$arResult['JS_DATA']['ORDER_PROP_LIST'] = array_combine(array_column($arResult['JS_DATA']['ORDER_PROP']['properties'], 'CODE'), $arResult['JS_DATA']['ORDER_PROP']['properties']);

/*
 * Нужно в доставку добавить  еденичную Доп услугу и назвать ее MKAD, права указать для менеджера и клиента (на всяк)
 *
 * */

$arResult['JS_DATA']['BIO_BASKET']['DELIVERY'] = null;

// Доставка
(int) $i = 0;

// MKAD
$delivery_mkad_inside = COption::GetOptionString('cosmos.settings', 'delivery_mkad_inside_' . SITE_ID);
$delivery_mkad_behind = COption::GetOptionString('cosmos.settings', 'delivery_mkad_behind_' . SITE_ID);

// KAD
$delivery_kad_inside = COption::GetOptionString('cosmos.settings', 'delivery_kad_inside_' . SITE_ID);
$delivery_kad_behind = COption::GetOptionString('cosmos.settings', 'delivery_kad_behind_' . SITE_ID);

foreach ($arResult['JS_DATA']['DELIVERY'] as $result){

    $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["ID"] = $result["ID"];
    $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["NAME"] = $result["NAME"];
    $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["PRICE"] = $result["PRICE"];
    $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["LOGOTIP_SRC"] = $result["LOGOTIP"]["SRC"];
    $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["PRICE_FORMATED"] = $result["PRICE_FORMATED"];
    $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["DESCRIPTION"] = $result["DESCRIPTION"];

    if(SITE_ID == "s2"){
        // ВНУТРИ МКАД
        if (!empty(strpos($delivery_mkad_inside, (string)$result["ID"]))) {
            $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["EXTRA_SERVICES"]["MKAD"] = true;
        }

        // ЗА МКАД
        if (!empty(strpos($delivery_mkad_behind, (string)$result["ID"]))) {
            $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["EXTRA_SERVICES"]["MKAD"] = false;
        }
    }

    if(SITE_ID == "s4"){
        // для простоты работы фронта отдаём ключ MKAD вместо KAD

        // ВНУТРИ КАД
        if (!empty(strpos($delivery_kad_inside, (string)$result["ID"]))) {
            $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["EXTRA_SERVICES"]["MKAD"] = true;
        }

        // ЗА КАД
        if (!empty(strpos($delivery_kad_behind, (string)$result["ID"]))) {
            $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["EXTRA_SERVICES"]["MKAD"] = false;
        }
    }

    if(empty($arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["EXTRA_SERVICES"]["MKAD"]) && $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["EXTRA_SERVICES"]["MKAD"] !== false){
        $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["EXTRA_SERVICES"]["MKAD"] = null;
    }

    $arResult['JS_DATA']['BIO_BASKET']['DELIVERY'][$i]["PAY_LIMITATIONS"] = [];

    $i++;
}

// Вывод название сайта и его ID
$frameCitySel = new \Bitrix\Main\Page\FrameHelper('city_order');
$frameCitySel->begin();
$objCity = new City();
$arCityInfo = $objCity->getCurrentCityInfo();

$arResult['JS_DATA']['SITE'] = [
  "SITE_ID" => SITE_ID,
  "CITY_NAME" => $arCityInfo['NAME']
];

$frameCitySel->beginStub();
$frameCitySel->end();

$arResult['JS_DATA']['BIO_BASKET']['INFO'] = null;

$arResult['JS_DATA']['BIO_BASKET']['INFO'] = [
    'DESCRIPTION_DELIVERY' => COption::GetOptionString('cosmos.settings', 'description_order_' . SITE_ID)
];

$arResult['JS_DATA']['CURRENT_USER'] = null;

global $USER;

// Данные из последнего заказа
if ($USER->IsAuthorized()) {
    $arResult['JS_DATA']['CURRENT_USER'] = \CUser::GetByID($USER->GetID())->fetch();

    $dbRes = \Bitrix\Sale\Order::getList([
      'select' => ['ID'],
      'filter' => [
        'USER_ID' => $USER->GetID(),
      ],
      'order' => ['ID' => 'DESC'],
      'limit' => 1,
    ]);

    if ($arRes = $dbRes->fetch()){
        $order = \Bitrix\Sale\Order::load($arRes['ID']);
        $propertyCollection = $order->getPropertyCollection();

        foreach ($propertyCollection as $property) {
            if (!$arResult['JS_DATA']['ORDER_PROP_LIST'][$property->getField('CODE')]['VALUE'][0]) {
                $arResult['JS_DATA']['ORDER_PROP_LIST'][$property->getField('CODE')]['VALUE'][0] = $property->getField('VALUE');
            }
        }

    }
}

    // Меняет регистр всех ключей в массиве
    $arResult['JS_DATA']['ORDER_PROP_LIST']
      = array_change_key_case($arResult['JS_DATA']['ORDER_PROP_LIST'],
      CASE_UPPER);


$component = $this->__component;
$component::scaleImages($arResult['JS_DATA'], $arParams['SERVICES_IMAGES_SCALING']);

