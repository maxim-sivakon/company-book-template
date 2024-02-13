<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;
use biovestin24\Content;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>
<?
	if ($item['LABEL'])
	{
		?>
		<div id="<?=$itemIds['STICKER_ID']?>" class="good_mark">
			<?
			
			
			
			if (!empty($item['PROPERTIES']['METKI']['VALUE_ENUM']))
			{
				foreach ($item['PROPERTIES']['METKI']['VALUE_ENUM'] as $key => $value)
				{
					?>
					<div class="<?=$item['PROPERTIES']['METKI']['VALUE_XML_ID'][$key]?>"><?=$value?></div>
					<?
				}
			}
			?>
		</div>
		<?
	}
?>

<?
	if($item["PREVIEW_PICTURE"]["ID"] != 0){
		$renderImage = CFile::ResizeImageGet($item["PREVIEW_PICTURE"]["ID"], Array("width" => '234', "height" => '179'), BX_RESIZE_IMAGE_EXACT, false);
	}
	else{
		$renderImage["src"] = '/local/templates/.default/components/bitrix/catalog.section/hits/images/no_photo.png';
		$class = 'no-photo';
	}
?>

<div class="product__img">
	<a href="<?=$item['DETAIL_PAGE_URL']?>" data-href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>" data-entity="image-wrapper">
		<img src='<?=$item["PREVIEW_PICTURE"]["SRC"]?>' alt="<?=$imgTitle?>">
	</a>
</div>

<div class="product__item-title">
	<a href="<?=$item['DETAIL_PAGE_URL']?>" data-href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>">
		<?=$productTitle?>
	</a>
</div>


<div class="tab-content" id="pills-tabContent">
	<div class="product__content-item ">
		<?=$item["PREVIEW_TEXT"]?>
	</div>
</div>

<div class="type_buttons_title" id="flacons">
	<?if($haveOffers && !empty($item['OFFERS_PROP'])):?>
		Флаконов в упаковке:
	<?endif;?>
</div>

<?
if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
{
	?>
	<div id="<?=$itemIds['PROP_DIV']?>" class="scuu">
        <div class="product-item-info-container product-item-hidden" data-entity="sku-block">
            <ul class="nav nav-pills product__item-list" data-entity="sku-line-block">
                <?foreach ($item['OFFERS'] as $itemSKU){?>
                    <li title="<?=$itemSKU['NAME']?>"
                        class="nav-link default-btn-type<?= Content::checkProductInBasket($itemSKU['ID']) == true ? ' in_basket' : '' ?>"
                        data-treevalue="<?= $itemSKU["PROPERTIES"]["COUNT"]["ID"] ?>_<?= $itemSKU["TREE"]["PROP_122"] ?>"
                        data-onevalue="<?= $itemSKU["TREE"]["PROP_122"] ?>"
                        data-prod-id="<?=$itemSKU['ID']?>">
                        <img src="/local/templates/bioMoscow/moscow/images/checkfull.png" alt="<?=$itemSKU['NAME']?>">
                        <a>
                            <p class="d-flex align-items-center h-100 justify-content-center">
                                <?= $arParams['SKU_PROPS']['COUNT']['VALUES'][$itemSKU["TREE"]["PROP_122"]]['NAME'] ?>
                            </p>
                        </a>
                    </li>
                <?}?>
            </ul>
        </div>
	</div>
	<?
	foreach ($arParams['SKU_PROPS'] as $skuProperty)
	{
		if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
			continue;

		$skuProps[] = array(
			'ID' => $skuProperty['ID'],
			'SHOW_MODE' => $skuProperty['SHOW_MODE'],
			'VALUES' => $skuProperty['VALUES'],
			'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
		);
	}

	unset($skuProperty, $value);

	if ($item['OFFERS_PROPS_DISPLAY'])
	{
		foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
		{
			$strProps = '';

			if (!empty($jsOffer['DISPLAY_PROPERTIES']))
			{
				foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
				{
					$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
						.(is_array($displayProperty['VALUE'])
							? implode(' / ', $displayProperty['VALUE'])
							: $displayProperty['VALUE'])
						.'</dd>';
				}
			}

			$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
		}
		unset($jsOffer, $strProps);
	}
}
?>

<?
	if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
	{
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
		{
			switch ($blockName)
			{
				case 'price': ?>
					<div class="product__item-box">
					<span class="product__item-pryce" data-entity="price-block" id="<?=$itemIds['PRICE']?>">
						<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
							<span class="product-item-price-old" id="<?=$itemIds['PRICE_OLD']?>"
								<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
								<?=$price['PRINT_RATIO_BASE_PRICE']?>
							</span>
							<?
						}
						?>
							<?
							if (!empty($price))
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
								{
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
										)
									);
								}
								else
								{
									echo $price['PRINT_RATIO_PRICE'];
								}
							}
							?>
					</span>

					<?
					break;

				case 'quantity':
					?>

					<?
					if (!$haveOffers)
					{
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product__counter" data-entity="quantity-block">
								<div alt="minus" class='product__counter__btn' id="<?=$itemIds['QUANTITY_DOWN']?>">-</div>
								<input class="product__counter__value" id="<?=$itemIds['QUANTITY']?>" type="text"
											name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
											value="<?=$measureRatio?>">
								<div alt="plus" class='product__counter__btn' id="<?=$itemIds['QUANTITY_UP']?>">+</div>
							</div>
							<?
						}
					}
					elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
					{
						if ($arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product__counter" data-entity="quantity-block">
								<span class="product__counter__btn" id="<?=$itemIds['QUANTITY_DOWN']?>">-</span>
								<input class="product__counter__value" id="<?=$itemIds['QUANTITY']?>" type="text"
									name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
									value="<?=$measureRatio?>">
								<span class="product__counter__btn" id="<?=$itemIds['QUANTITY_UP']?>">+</span>
							</div>
							<?
						}
					}
					?>

					<?
					break;

				case 'buttons':
					?>
					<div class="product__item-btn<?= Content::checkProductInBasket($item['ID']) == true ? ' in_basket' : '' ?>" data-entity="<?=!$haveOffers && empty($item['OFFERS_PROP']) ? 'buttons-block-one' : 'buttons-block';?>"
                      <?if(!$haveOffers && empty($item['OFFERS_PROP'])):?>
                          data-id="<?=$item['ID']?>"
                      <?endif;?>>
						<?
						if (!$haveOffers)
						{
							if ($actualItem['CAN_BUY'])
							{
								?>
								<div data-entity="button-block-buy-onec" id="<?=$itemIds['BASKET_ACTIONS']?>">
									<a class="product__item-btn default-btn <?=!$haveOffers && empty($item['OFFERS_PROP']) ? 'once' : 'twice';?>" id="<?=$itemIds['BUY_LINK']?>"
										href="javascript:void(0)" rel="nofollow">
										<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
									</a>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $actualItem['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => true,
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<a class="btn btn-link <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow">
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
								</div>
								<?
							}
						}
						else
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $item['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<a class="btn btn-link <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
										<?=($actualItem['CAN_BUY'] ? 'style="display: none;"' : '')?>>
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
									<div data-entity="button-block-buy" id="<?=$itemIds['BASKET_ACTIONS']?>" <?=($actualItem['CAN_BUY'] ? '' : 'style="display: none;"')?>>
										<a class="product__item-btn default-btn twice" id="<?=$itemIds['BUY_LINK']?>"
											href="javascript:void(0)" rel="nofollow">
											<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
										</a>
									</div>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<a class="btn product__item-btn default-btn <?=$buttonSizeClass?>" href="<?=$item['DETAIL_PAGE_URL']?>">
										<?=$arParams['MESS_BTN_DETAIL']?>
									</a>
								</div>
								<?
							}
						}
						?>

                        <a data-entity="button-block-inbasket" class="default-btn bask" href="/cart/">В корзине</a>

					</div>
					</div>
					<?
					break;
			}
		}
	}
	?>
