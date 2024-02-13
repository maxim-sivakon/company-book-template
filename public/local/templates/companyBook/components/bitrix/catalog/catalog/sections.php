<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
// $this->addExternalCss("/bitrix/css/main/bootstrap.css");
?><section class="buy product" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/moscow/images//top-bg.jpg); background-repeat: no-repeat; background-position:center;">
	<div class="crumbs">
		<div class="container">
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"main",
				Array(
					"PATH" => "",
					"SITE_ID" => "s2",
					"START_FROM" => "0"
				)
			);?>
		</div>
	</div>
	<div class="container">
		<div class="product__wrapper row align-items-center">
			<div class="col-md-6 col-lg-7">
				<a href="/" class="link_back buy__back">Назад на главную</a>
				<div class="title">
					Мы выпускаем «Биовестин» двух видов:
				</div>
			</div>
			<div class="col-md-6 col-lg-5  ml-auto">
				<a href="/dozirovka-i-skhema-priema/" class="dosage buy-dosage">
					<span class="dosage-icon_wrapper">
						<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M24.9255 2.9796H22.0408V1.08813C22.0408 0.488192 21.5526 0 20.9527 0C20.3527 0 19.8645 0.488192 19.8645 1.08813V2.9796H8.13545V1.08813C8.13545 0.488192 7.64726 0 7.04733 0C6.44739 0 5.9592 0.488192 5.9592 1.08813V2.9796H3.07453C1.37941 2.9796 0 4.35901 0 6.05413V24.9255C0 26.6206 1.37941 28 3.07453 28H24.9255C26.6206 28 28 26.6206 28 24.9255V6.05413C28 4.35901 26.6211 2.9796 24.9255 2.9796ZM7.04733 8.13545C7.64726 8.13545 8.13545 7.64726 8.13545 7.04733V5.15585H19.8645V7.04733C19.8645 7.64726 20.3527 8.13545 20.9527 8.13545C21.5526 8.13545 22.0408 7.64726 22.0408 7.04733V5.15585H24.9255C25.4207 5.15585 25.8237 5.55888 25.8237 6.05413V9.932H2.17625V6.05413C2.17625 5.55888 2.57928 5.15585 3.07453 5.15585H5.9592V7.04733C5.9592 7.64726 6.44739 8.13545 7.04733 8.13545ZM25.8237 12.1088V24.926C25.8237 25.4213 25.4207 25.8243 24.9255 25.8243H3.07453C2.57928 25.8243 2.17625 25.4213 2.17625 24.926V12.1088H25.8237Z" fill="#2F3639"></path>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M12.3739 23.3885C12.6855 23.3885 12.998 23.2702 13.2361 23.0341L19.7476 16.561L19.7517 16.5568C20.2202 16.0741 20.2065 15.3025 19.7217 14.8362C19.2465 14.3802 18.5011 14.3804 18.0257 14.8372L12.3739 20.4557L9.98042 18.0762L9.97616 18.0721C9.49179 17.6075 8.71912 17.6208 8.25108 18.1019C7.79097 18.575 7.79135 19.3199 8.25194 19.7935L11.5115 23.0338C11.75 23.2709 12.0633 23.3885 12.3739 23.3885ZM12.3735 20.9198L9.74814 18.3099C9.69624 18.2601 9.63979 18.2178 9.58016 18.183C9.6396 18.2178 9.69588 18.2599 9.74763 18.3096L12.3734 20.9199L12.3735 20.9198ZM11.9231 22.938C12.0617 23.0186 12.2177 23.0588 12.3734 23.0588C12.6019 23.0588 12.8299 22.9722 13.0037 22.7999L19.5148 16.3271C19.8562 15.9754 19.8464 15.4134 19.4931 15.0736C19.4395 15.0222 19.3813 14.9787 19.3198 14.9432C19.3815 14.9788 19.4399 15.0223 19.4936 15.0739C19.8469 15.4137 19.8567 15.9757 19.5153 16.3274L13.0042 22.8002C12.8304 22.9725 12.6024 23.0591 12.3739 23.0591C12.218 23.0591 12.0618 23.0188 11.9231 22.938Z" fill="#2F3639"></path>
						</svg>
					</span>
					<span class="dosage__text">Дозировка и схема приема</span>
				</a>
			</div>
		</div>
	<?
	$sectionListParams = array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
		"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
		"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
		"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
	);

	if ($arParams["SHOW_TOP_ELEMENTS"] !== "N")
	{
		if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y')
		{
			$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
		}
		else
		{
			$basketAction = isset($arParams['TOP_ADD_TO_BASKET_ACTION']) ? $arParams['TOP_ADD_TO_BASKET_ACTION'] : '';
		}

		$APPLICATION->IncludeComponent(
			"bitrix:catalog.top",
			"",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"ELEMENT_SORT_FIELD" => $arParams["TOP_ELEMENT_SORT_FIELD"],
				"ELEMENT_SORT_ORDER" => $arParams["TOP_ELEMENT_SORT_ORDER"],
				"ELEMENT_SORT_FIELD2" => $arParams["TOP_ELEMENT_SORT_FIELD2"],
				"ELEMENT_SORT_ORDER2" => $arParams["TOP_ELEMENT_SORT_ORDER2"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
				"ELEMENT_COUNT" => $arParams["TOP_ELEMENT_COUNT"],
				"LINE_ELEMENT_COUNT" => $arParams["TOP_LINE_ELEMENT_COUNT"],
				"PROPERTY_CODE" => (isset($arParams["TOP_PROPERTY_CODE"]) ? $arParams["TOP_PROPERTY_CODE"] : []),
				"PROPERTY_CODE_MOBILE" => $arParams["TOP_PROPERTY_CODE_MOBILE"],
				"PRICE_CODE" => $arParams["~PRICE_CODE"],
				"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"PRICE_VAT_SHOW_VALUE" => $arParams["PRICE_VAT_SHOW_VALUE"],
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
				"OFFERS_FIELD_CODE" => $arParams["TOP_OFFERS_FIELD_CODE"],
				"OFFERS_PROPERTY_CODE" => (isset($arParams["TOP_OFFERS_PROPERTY_CODE"]) ? $arParams["TOP_OFFERS_PROPERTY_CODE"] : []),
				"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
				"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
				"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
				"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
				"OFFERS_LIMIT" => (isset($arParams["TOP_OFFERS_LIMIT"]) ? $arParams["TOP_OFFERS_LIMIT"] : 0),
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
				'VIEW_MODE' => (isset($arParams['TOP_VIEW_MODE']) ? $arParams['TOP_VIEW_MODE'] : ''),
				'ROTATE_TIMER' => (isset($arParams['TOP_ROTATE_TIMER']) ? $arParams['TOP_ROTATE_TIMER'] : ''),
				'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),

				'LABEL_PROP' => $arParams['LABEL_PROP'],
				'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
				'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
				'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
				'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
				'PRODUCT_BLOCKS_ORDER' => $arParams['TOP_PRODUCT_BLOCKS_ORDER'],
				'PRODUCT_ROW_VARIANTS' => $arParams['TOP_PRODUCT_ROW_VARIANTS'],
				'ENLARGE_PRODUCT' => $arParams['TOP_ENLARGE_PRODUCT'],
				'ENLARGE_PROP' => isset($arParams['TOP_ENLARGE_PROP']) ? $arParams['TOP_ENLARGE_PROP'] : '',
				'SHOW_SLIDER' => $arParams['TOP_SHOW_SLIDER'],
				'SLIDER_INTERVAL' => isset($arParams['TOP_SLIDER_INTERVAL']) ? $arParams['TOP_SLIDER_INTERVAL'] : '',
				'SLIDER_PROGRESS' => isset($arParams['TOP_SLIDER_PROGRESS']) ? $arParams['TOP_SLIDER_PROGRESS'] : '',

				'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
				'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
				'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
				'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
				'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
				'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
				'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
				'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
				'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE'],
				'ADD_TO_BASKET_ACTION' => $basketAction,
				'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
				'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
				'USE_COMPARE_LIST' => 'Y',
				'FILTER_NAME' => $arParams['FILTER_NAME'],

				'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : '')
			),
			$component
		);
		unset($basketAction);
	}?>

<div class="product-which product-which--white-bg">
    <div class="product-which__img">
		<img src="/local/templates/bioMoscow/moscow/images/product-which.png" alt="Какой Биовестин выбрать">
    </div>
    <div class="product-which__content x">
        <div class="product-which__title">
            Какой «Биовестин» выбрать?
        </div>
        <a href="/dozirovka-i-skhema-priema/" class="default-btn default-btn--green">подробнее <br>о продукте</a>
    </div>
</div>

	<a href="http://biovestin24.ru/dozirovka-i-skhema-priema/" class="dosage motto-dosage__bottom">
		<span class="dosage-icon_wrapper">
			<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M24.9255 2.9796H22.0408V1.08813C22.0408 0.488192 21.5526 0 20.9527 0C20.3527 0 19.8645 0.488192 19.8645 1.08813V2.9796H8.13545V1.08813C8.13545 0.488192 7.64726 0 7.04733 0C6.44739 0 5.9592 0.488192 5.9592 1.08813V2.9796H3.07453C1.37941 2.9796 0 4.35901 0 6.05413V24.9255C0 26.6206 1.37941 28 3.07453 28H24.9255C26.6206 28 28 26.6206 28 24.9255V6.05413C28 4.35901 26.6211 2.9796 24.9255 2.9796ZM7.04733 8.13545C7.64726 8.13545 8.13545 7.64726 8.13545 7.04733V5.15585H19.8645V7.04733C19.8645 7.64726 20.3527 8.13545 20.9527 8.13545C21.5526 8.13545 22.0408 7.64726 22.0408 7.04733V5.15585H24.9255C25.4207 5.15585 25.8237 5.55888 25.8237 6.05413V9.932H2.17625V6.05413C2.17625 5.55888 2.57928 5.15585 3.07453 5.15585H5.9592V7.04733C5.9592 7.64726 6.44739 8.13545 7.04733 8.13545ZM25.8237 12.1088V24.926C25.8237 25.4213 25.4207 25.8243 24.9255 25.8243H3.07453C2.57928 25.8243 2.17625 25.4213 2.17625 24.926V12.1088H25.8237Z" fill="#2F3639"></path>
				<path fill-rule="evenodd" clip-rule="evenodd" d="M12.3739 23.3885C12.6855 23.3885 12.998 23.2702 13.2361 23.0341L19.7476 16.561L19.7517 16.5568C20.2202 16.0741 20.2065 15.3025 19.7217 14.8362C19.2465 14.3802 18.5011 14.3804 18.0257 14.8372L12.3739 20.4557L9.98042 18.0762L9.97616 18.0721C9.49179 17.6075 8.71912 17.6208 8.25108 18.1019C7.79097 18.575 7.79135 19.3199 8.25194 19.7935L11.5115 23.0338C11.75 23.2709 12.0633 23.3885 12.3739 23.3885ZM12.3735 20.9198L9.74814 18.3099C9.69624 18.2601 9.63979 18.2178 9.58016 18.183C9.6396 18.2178 9.69588 18.2599 9.74763 18.3096L12.3734 20.9199L12.3735 20.9198ZM11.9231 22.938C12.0617 23.0186 12.2177 23.0588 12.3734 23.0588C12.6019 23.0588 12.8299 22.9722 13.0037 22.7999L19.5148 16.3271C19.8562 15.9754 19.8464 15.4134 19.4931 15.0736C19.4395 15.0222 19.3813 14.9787 19.3198 14.9432C19.3815 14.9788 19.4399 15.0223 19.4936 15.0739C19.8469 15.4137 19.8567 15.9757 19.5153 16.3274L13.0042 22.8002C12.8304 22.9725 12.6024 23.0591 12.3739 23.0591C12.218 23.0591 12.0618 23.0188 11.9231 22.938Z" fill="#2F3639"></path>
			</svg>
		</span>
		<span class="dosage__text">Дозировка и схема приема</span></a>
	</div>
</section>