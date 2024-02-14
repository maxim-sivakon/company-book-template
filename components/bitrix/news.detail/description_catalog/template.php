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
$this->setFrameMode(true);
?>
<section class="page-section product">
    <div class="container">
        <div class="product__wrapper row align-items-center">
            <div class="col-md-6 col-lg-7">
                <div class="title"><?= $arResult["PROPERTIES"]["EX_TITLE"]["VALUE"] ?></div>
            </div>
            <div class="col-md-6 col-lg-5 ml-auto">
                <a href="<?= $arResult["PROPERTIES"]["EX_DOSAGE"]["VALUE"] ?>" class="dosage product-dosage">
                <span class="dosage-icon_wrapper">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24.9255 2.9796H22.0408V1.08813C22.0408 0.488192 21.5526 0 20.9527 0C20.3527 0 19.8645 0.488192 19.8645 1.08813V2.9796H8.13545V1.08813C8.13545 0.488192 7.64726 0 7.04733 0C6.44739 0 5.9592 0.488192 5.9592 1.08813V2.9796H3.07453C1.37941 2.9796 0 4.35901 0 6.05413V24.9255C0 26.6206 1.37941 28 3.07453 28H24.9255C26.6206 28 28 26.6206 28 24.9255V6.05413C28 4.35901 26.6211 2.9796 24.9255 2.9796ZM7.04733 8.13545C7.64726 8.13545 8.13545 7.64726 8.13545 7.04733V5.15585H19.8645V7.04733C19.8645 7.64726 20.3527 8.13545 20.9527 8.13545C21.5526 8.13545 22.0408 7.64726 22.0408 7.04733V5.15585H24.9255C25.4207 5.15585 25.8237 5.55888 25.8237 6.05413V9.932H2.17625V6.05413C2.17625 5.55888 2.57928 5.15585 3.07453 5.15585H5.9592V7.04733C5.9592 7.64726 6.44739 8.13545 7.04733 8.13545ZM25.8237 12.1088V24.926C25.8237 25.4213 25.4207 25.8243 24.9255 25.8243H3.07453C2.57928 25.8243 2.17625 25.4213 2.17625 24.926V12.1088H25.8237Z" fill="#2F3639"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3739 23.3885C12.6855 23.3885 12.998 23.2702 13.2361 23.0341L19.7476 16.561L19.7517 16.5568C20.2202 16.0741 20.2065 15.3025 19.7217 14.8362C19.2465 14.3802 18.5011 14.3804 18.0257 14.8372L12.3739 20.4557L9.98042 18.0762L9.97616 18.0721C9.49179 17.6075 8.71912 17.6208 8.25108 18.1019C7.79097 18.575 7.79135 19.3199 8.25194 19.7935L11.5115 23.0338C11.75 23.2709 12.0633 23.3885 12.3739 23.3885ZM12.3735 20.9198L9.74814 18.3099C9.69624 18.2601 9.63979 18.2178 9.58016 18.183C9.6396 18.2178 9.69588 18.2599 9.74763 18.3096L12.3734 20.9199L12.3735 20.9198ZM11.9231 22.938C12.0617 23.0186 12.2177 23.0588 12.3734 23.0588C12.6019 23.0588 12.8299 22.9722 13.0037 22.7999L19.5148 16.3271C19.8562 15.9754 19.8464 15.4134 19.4931 15.0736C19.4395 15.0222 19.3813 14.9787 19.3198 14.9432C19.3815 14.9788 19.4399 15.0223 19.4936 15.0739C19.8469 15.4137 19.8567 15.9757 19.5153 16.3274L13.0042 22.8002C12.8304 22.9725 12.6024 23.0591 12.3739 23.0591C12.218 23.0591 12.0618 23.0188 11.9231 22.938Z" fill="#2F3639"/>
                    </svg>
                </span>
                <span><?= $arResult["PROPERTIES"]["EX_DOSAGE"]["DESCRIPTION"] ?></span>
                </a>
            </div>
        </div>
        <div class="row">
            <?
            /*
             * Ранее был вывод раздела с SECTION_CODE == s2, в текущем случае такой потребности нет
             * */
            global $arrFilter;
            //$arrFilter['SECTION_CODE']          = SITE_ID;
            $arrFilter['INCLUDE_SUBSECTIONS']     = 'Y';
            $arrFilter['PROPERTY_HIDE_IN_PUBLIC'] = false;

            $APPLICATION->IncludeComponent(
              "bitrix:catalog.top",
              ".default",
              [
                "ACTION_VARIABLE"            => "action",
                "ADD_PICT_PROP"              => "-",
                "ADD_PROPERTIES_TO_BASKET"   => "Y",
                "ADD_TO_BASKET_ACTION"       => "ADD",
                "BASKET_URL"                 => "/cart/",
                "CACHE_FILTER"               => "N",
                "CACHE_GROUPS"               => "Y",
                "CACHE_TIME"                 => "36000000",
                "CACHE_TYPE"                 => "A",
                "COMPARE_NAME"               => "CATALOG_COMPARE_LIST",
                "COMPATIBLE_MODE"            => "Y",
                "COMPONENT_TEMPLATE"         => ".default",
                "CONVERT_CURRENCY"           => "N",
                "CUSTOM_FILTER"              => "",
                "DETAIL_URL"                 => "/kupit/#ELEMENT_CODE#/",
                "DISPLAY_COMPARE"            => "N",
                "ELEMENT_COUNT"              => "2",
                "ELEMENT_SORT_FIELD"         => "sort",
                "ELEMENT_SORT_FIELD2"        => "id",
                "ELEMENT_SORT_ORDER"         => "asc",
                "ELEMENT_SORT_ORDER2"        => "desc",
                "ENLARGE_PRODUCT"            => "STRICT",
                "FILTER_NAME"                => "arrFilter",
                "HIDE_NOT_AVAILABLE"         => "N",
                "HIDE_NOT_AVAILABLE_OFFERS"  => "N",
                "IBLOCK_ID"                  => "1",
                "IBLOCK_TYPE"                => "catalog",
                "LABEL_PROP"                 => [
                ],
                "LINE_ELEMENT_COUNT"         => "3",
                "MESS_BTN_ADD_TO_BASKET"     => "В корзину",
                "MESS_BTN_BUY"               => "Купить",
                "MESS_BTN_COMPARE"           => "Сравнить",
                "MESS_BTN_DETAIL"            => "Подробнее",
                "MESS_NOT_AVAILABLE"         => "Нет в наличии",
                "OFFERS_FIELD_CODE"          => [
                  0 => "NAME",
                  1 => "PREVIEW_TEXT",
                  2 => "PREVIEW_PICTURE",
                  3 => "DETAIL_PICTURE",
                  4 => "",
                ],
                "OFFERS_LIMIT"               => "5",
                "OFFERS_SORT_FIELD"          => "sort",
                "OFFERS_SORT_FIELD2"         => "id",
                "OFFERS_SORT_ORDER"          => "asc",
                "OFFERS_SORT_ORDER2"         => "desc",
                "OFFER_ADD_PICT_PROP"        => "-",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "PRICE_CODE"                 => [
                  0 => "base",
                ],
                "PRICE_VAT_INCLUDE"          => "Y",
                "PRODUCT_BLOCKS_ORDER"       => "price,props,sku,quantityLimit,quantity,buttons",
                "PRODUCT_DISPLAY_MODE"       => "Y",
                "PRODUCT_ID_VARIABLE"        => "id",
                "PRODUCT_PROPS_VARIABLE"     => "prop",
                "PRODUCT_QUANTITY_VARIABLE"  => "quantity",
                "PRODUCT_ROW_VARIANTS"       => "[{'VARIANT':'1','BIG_DATA':false}]",
                "PRODUCT_SUBSCRIPTION"       => "Y",
                "ROTATE_TIMER"               => "30",
                "SECTION_URL"                => "",
                "SEF_MODE"                   => "N",
                "SHOW_CLOSE_POPUP"           => "Y",
                "SHOW_DISCOUNT_PERCENT"      => "N",
                "SHOW_MAX_QUANTITY"          => "N",
                "SHOW_OLD_PRICE"             => "N",
                "SHOW_PAGINATION"            => "Y",
                "SHOW_PRICE_COUNT"           => "1",
                "SHOW_SLIDER"                => "Y",
                "SLIDER_INTERVAL"            => "3000",
                "SLIDER_PROGRESS"            => "N",
                "TEMPLATE_THEME"             => "blue",
                "USE_ENHANCED_ECOMMERCE"     => "N",
                "USE_PRICE_COUNT"            => "N",
                "USE_PRODUCT_QUANTITY"       => "Y",
                "VIEW_MODE"                  => "SECTION",
              ],
              false
            ); ?>
            <div class="product-which product-which--white-bg">
                <div class="product-which__img">
                    <img src="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-white.svg" alt="<?= $arResult["PROPERTIES"]["EX_TITLE_LITTLE"]["VALUE"] ?>">
                </div>
                <div class="product-which__content">
                    <div class="product-which__title"><?= $arResult["PROPERTIES"]["EX_TITLE_LITTLE"]["VALUE"] ?></div>
                    <a href="<?= $arResult["PROPERTIES"]["EX_BUTTON"]["VALUE"] ?>" class="default-btn-green2"><?= $arResult["PROPERTIES"]["EX_BUTTON"]["DESCRIPTION"] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
