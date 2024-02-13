<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<div class="basket-checkout-container" data-entity="basket-checkout-aligner">
		<div class="final">
			<div class="final_header"><?=Loc::getMessage('SBB_TOTAL')?></div>
			
			<div class="price">
				{{#DISCOUNT_PRICE_FORMATED}}
					<div class="old">{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}</div>
				{{/DISCOUNT_PRICE_FORMATED}}
				<div class="new" data-entity="basket-total-price">{{{PRICE_FORMATED}}}</div>
			</div>
			
			<button class="go_to_order {{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}"
				data-entity="basket-checkout-button">
				<?=Loc::getMessage('SBB_ORDER')?>
			</button>
		</div>
		
		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
			?>
			
			<div class="basket-coupon-section promo">
				<div class="promo_header">Промокод на скидку</div>
				<div class="input">
					<input type="text" id="" placeholder="Введите промокод" data-entity="basket-coupon-input">
					<span class="use_promo">Применить</span>
				</div>
			</div>
			<?
		}
		?>

		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
		?>
			<div class="basket-coupon-alert-section">
				<div class="basket-coupon-alert-inner">
					{{#COUPON_LIST}}
					<div class="basket-coupon-alert text-{{CLASS}}">
						<span class="basket-coupon-text">
							<strong>{{COUPON}}</strong> - <?=Loc::getMessage('SBB_COUPON')?> {{JS_CHECK_CODE}}
							{{#DISCOUNT_NAME}}({{DISCOUNT_NAME}}){{/DISCOUNT_NAME}}
						</span>
						<span class="close-link" data-entity="basket-coupon-delete" data-coupon="{{COUPON}}">
							<?=Loc::getMessage('SBB_DELETE')?>
						</span>
					</div>
					{{/COUPON_LIST}}
				</div>
			</div>
			<?
		}
		?>
	</div>
</script>