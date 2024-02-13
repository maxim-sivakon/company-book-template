<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

global $USER;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<div class="cart-order" data-entity="basket-checkout-aligner">
		<div class="cart-order__title"><?=Loc::getMessage('SBB_TOTAL')?></div>
			
		<div class="cart-order__sum">
			{{#DISCOUNT_PRICE_FORMATED}}
				<div class="old">{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}</div>
			{{/DISCOUNT_PRICE_FORMATED}}
			<div class="new" data-entity="basket-total-price">{{{PRICE_FORMATED}}}</div>
		</div>
		
			<button style="display:none;" data-mfp-src="#modalAuth" class="<?=!$USER->GetID() ? 'js-modalLink' : ''?> cart-order__btn default-btn {{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}"
			<?=$USER->GetID() ? 'data-entity="basket-checkout-button"' : ""?>>
			<?=Loc::getMessage('SBB_ORDER')?>
		</button>

<button class=" cart-order__btn default-btn {{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}" onclick="return location.href = '/order/'">
			<?=Loc::getMessage('SBB_ORDER')?>
		</button>
		
		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
			?>
			
			<!-- <div class="basket-coupon-section promo">
				<div class="input">
					<input type="text" id="" class="cart-order__text js-cartPromoInput" placeholder="Введите промокод" data-entity="basket-coupon-input">
					<span class="use_promo cart-order__link js-cartPromoApply" style="display:none;">Применить</span>
				</div>
			</div> -->

			<a class="bx_big bx_bt_button bx_cart js-ax-buyoneclick-button text-center">
				<?=Loc::getMessage('SBB_ORDER_WTS')?>
			</a>

			<span class="btn ax-whatsapp-button js-ax-buywhatsapp-button" id="buy_whatsapp" style="display:none">
   				 Купить в WhatsApp
			</span>

      <a class="eapteka-link" href="https://www.eapteka.ru/goods/brand/biolan/?utm_source=biovestin24.ru&amp;utm_medium=button_bye&amp;utm_campaign=1"
         target="_blank"
         rel="nofollow">Купить на сайте партнера ЕАПТЕКА</a>



			
			<?
			
		}
		?>
        <?php /*
        <noindex><a class="bx_big bx_bt_button bx_cart js-eapteca-button text-center" href="https://www.eapteka.ru/search/?q=%D0%B1%D0%B8%D0%BE%D0%B2%D0%B5%D1%81%D1%82%D0%B8%D0%BD" target="_blank" rel="nofollow">
				ЗАКАЗАТЬ В СБЕР ЕАПТЕКА
        </a></noindex>
        */ ?>
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
<script>

let isBeforeDone = false;
let phone 		 = 0;
let name 		 = 0

BX.addCustomEvent('onAxBuyOnClickBeforeSendOrder', function (dataPost){
	name  = dataPost[4].value;
	phone = dataPost[5].value;

	if(phone !== undefined && name !== undefined)
		isBeforeDone = true;
});

BX.addCustomEvent('onAxBuyOnClickOrderSuccessResponse', function (response){
	if(response.STATUS && response.STATUS == 'OK' && isBeforeDone){

		let data = new FormData();
		data.append('order_id', response.ORDER.ID);
		data.append('name', name);
		data.append('phone', phone);

		fetch('/local/ajax/msc/createPayLink.php', {
			method: "POST",
			body: data
		}).then(response => response.text())
		  .then(data => {
				window.open(
					"/whatsapp.php?phone=+79250339265&text=Здравствуйте,+рассмотрите+мой+заказ+номер+" + data,
					"_blank"
				);
		  });
	}
});

</script>
