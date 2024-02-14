<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
global $USER;
?>


	<? if($arResult['NUM_PRODUCTS'] <= 0):?>

	<div class="bx-basket-block">
		<div class="cart-tooltip__header">
			<div class="cart-tooltip__label">В корзине <?=$arResult['NUM_PRODUCTS']?> товара</div>
			<div class="cart-tooltip__button">				
<? if($USER->IsAuthorized()) {  ?>
					<? if($arResult['NUM_PRODUCTS'] > 0):?> <a href="/order/" class="default-btn">Оформить заказ</a> <?endif;?>
<? } else { ?>
<? if($arResult['NUM_PRODUCTS'] > 0):?> <button data-mfp-src="#modalAuth" class="js-modalLink cart-order__btn default-btn ">Оформить заказ</button><?endif;?>
<? } ?>

			</div>
		</div>
	</div>
	<?endif;?>
