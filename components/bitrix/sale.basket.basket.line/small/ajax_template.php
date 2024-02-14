<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(dirname(__FILE__)).'/top_template.php');

if ($arParams["SHOW_PRODUCTS"] == "Y" && ($arResult['NUM_PRODUCTS'] > 0 || !empty($arResult['CATEGORIES']['DELAY'])))
{
?>
	<div data-role="basket-item-list" class="bx-basket-item-list">
		<div id="<?=$cartId?>products" class="bx-basket-item-list-container">
			<input type="hidden" name="num_products" value="<?=$arResult['NUM_PRODUCTS']?>">
			<input type="hidden" name="total_price" value="<?=$arResult['TOTAL_PRICE']?>">
			<?foreach ($arResult["CATEGORIES"] as $category => $items):
				if (empty($items))
					continue;
				?>
				<div class="cart-tooltip__content">
				<?foreach ($items as $v):?>
					<div class="cart-prod cart<?=$v["PRODUCT_ID"]?>">
						<a onclick="<?=$cartId?>.removeItemFromCart(<?=$v['ID']?>, <?=$v["PRODUCT_ID"]?>)" class="cart-prod__remove"></a>
						<div class="cart-prod__top">
							<div class="cart-prod__image">
								<img src="<?=$v["PICTURE_SRC"]?>" alt="">
							</div>
							<div class="cart-prod__title"><?=$v["NAME"]?></div>
						</div>
						<div class="cart-prod__bottom">
							 <div class="cart-prod__count">
								<div class="cart-count">
									<div class="cart-count__input"><?=$v["QUANTITY"]?> шт</div>
								</div>
							</div>
							<div class="cart-prod__price">
								<?if ($arParams["SHOW_PRICE"] == "Y"):?>
									<?if ($v["FULL_PRICE"] != $v["PRICE_FMT"]):?>
										<?//=$v["FULL_PRICE"]?>
									<?endif?>
									<span><?=$v["SUM"]?></span>
								<?endif?>
							</div>
						</div>
					</div>
				<?endforeach?>
				</div>
				<div class="cart-tooltip__footer d-flex align-items-center">
				<? if($USER->IsAuthorized()) {  ?>
					<? if($arResult['NUM_PRODUCTS'] > 0):?> <a href="/order/" class="default-btn mr-1">Оформить заказ</a> <?endif;?>
				<? } else { ?>
					<? if($arResult['NUM_PRODUCTS'] > 0):?>
					<? //<button data-mfp-src="#modalAuth" class="js-modalLink default-btn mr-1">Оформить заказ</button> ?>
<? if($arResult['NUM_PRODUCTS'] > 0):?> <a href="/order/" class="default-btn mr-1">Оформить заказ</a> <?endif;?>
					 <?endif;?>
				<? } ?>
					<a href="#" class="cart-tooltip__clear">Очистить корзину</a>
				</div>
			<?endforeach?>
		</div>
	</div>

	<script>
		BX.ready(function(){
			<?=$cartId?>.fixCart();
		});
	</script>
<?
}