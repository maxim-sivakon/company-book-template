<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;


		

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
// $this->addExternalCss("/bitrix/css/main/bootstrap.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}

}
else
{
	?>
	<?
	
	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$paymentChangeData = array();
		$orderHeaderStatus = null;

		foreach ($arResult['ORDERS'] as $key => $order)
		{
			

			?>
			
			<!-- row-1 -->
			<div class=" row profile-orders" onclick="this.classList.toggle('is-open'); 
			document.querySelector('.js-acc-<?=$order['ORDER']['ID']?>').classList.toggle('is-height')">
				<div class=" col-md-2 profile-orders-img">
					<img src="<?=SITE_TEMPLATE_PATH?>/moscow/images/profile-cart.jpg" alt="">
				</div>
				<div class="col-md-4 status-col">
					<div class="status-col__num">
						№ <?=$order['ORDER']['ACCOUNT_NUMBER']?> от <?=$order['ORDER']['DATE_INSERT_FORMATED']?>
					</div>
					<div class="status-col__position">
						<?=CSaleStatus::GetByID($order['ORDER']['STATUS_ID'])["NAME"]?>
					</div>
				</div>
				<div class=" col-md-2 prise-col">
					<div class="prise-col__sum">
						Сумма заказа
					</div>
					<div class="prise-col__value">
						<?=$order['ORDER']['FORMATED_PRICE']?>
					</div>
				</div>
				<div class=" col-md-3 paid-col">
					<?
					$showDelimeter = false;
					foreach ($order['PAYMENT'] as $payment)
					{
						if ($order['ORDER']['LOCK_CHANGE_PAYSYSTEM'] !== 'Y')
						{
							$paymentChangeData[$payment['ACCOUNT_NUMBER']] = array(
								"order" => htmlspecialcharsbx($order['ORDER']['ACCOUNT_NUMBER']),
								"payment" => htmlspecialcharsbx($payment['ACCOUNT_NUMBER']),
								"allow_inner" => $arParams['ALLOW_INNER'],
								"refresh_prices" => $arParams['REFRESH_PRICES'],
								"path_to_payment" => $arParams['PATH_TO_PAYMENT'],
								"only_inner_full" => $arParams['ONLY_INNER_FULL'],
								"return_url" => $arResult['RETURN_URL'],
							);
						}
						?>
						
					
						<?if ($payment['PAID'] === 'Y'):?>
							<div class="paid-col__icon">
								<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M20.7071 1.29289C21.0976 1.68342 21.0976 2.31658 20.7071 2.70711L10.7071 12.7071C10.3166 13.0976 9.68342 13.0976 9.29289 12.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L10 10.5858L19.2929 1.29289C19.6834 0.902369 20.3166 0.902369 20.7071 1.29289Z"
										fill="#A3CF6C" />
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M3 2C2.73478 2 2.48043 2.10536 2.29289 2.29289C2.10536 2.48043 2 2.73478 2 3V17C2 17.2652 2.10536 17.5196 2.29289 17.7071C2.48043 17.8946 2.73478 18 3 18H17C17.2652 18 17.5196 17.8946 17.7071 17.7071C17.8946 17.5196 18 17.2652 18 17V10C18 9.44771 18.4477 9 19 9C19.5523 9 20 9.44771 20 10V17C20 17.7957 19.6839 18.5587 19.1213 19.1213C18.5587 19.6839 17.7957 20 17 20H3C2.20435 20 1.44129 19.6839 0.87868 19.1213C0.31607 18.5587 0 17.7957 0 17V3C0 2.20435 0.31607 1.44129 0.87868 0.87868C1.44129 0.31607 2.20435 0 3 0H14C14.5523 0 15 0.447715 15 1C15 1.55228 14.5523 2 14 2H3Z"
										fill="#A3CF6C" />
								</svg>
							</div>
						<?endif;?>
						<div class=" paid-col__status">
							
							<?
								if ($payment['PAID'] === 'Y')
								{
									?>
									<span class="sale-order-list-status-success"><?=Loc::getMessage('SPOL_TPL_PAID')?></span>
									<?
								}
								elseif ($order['ORDER']['IS_ALLOW_PAY'] == 'N')
								{
									?>
									<span class="sale-order-list-status-restricted"><?=Loc::getMessage('SPOL_TPL_RESTRICTED_PAID')?></span>
									<?
								}
								else
								{
									?>
									<div class="sale-order-list-button-container">
										<a class=" default-btn paid-col__link sale-order-list-button ajax_reloads" href="<?=htmlspecialcharsbx($payment['PSA_ACTION_FILE'])?>">
											<?=Loc::getMessage('SPOL_TPL_PAY')?>
										</a>
									</div>
									<?
								}
							?>
							
						</div>
					<?}?>
				</div>
				<div class="col-md-1 arrow-col">
					<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683417 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z"
							fill="#2F3639" />
					</svg>
				</div>
				
				<div class="reloads_op"></div>
			</div>
			<div class="row accordion js-acc-<?=$order['ORDER']["ID"]?>">
				<div class="col-12">
					<div class="row accordion-top">
						<div class=" col-md-6 accordion-col__title">
							Список товаров в заказе:
						</div>
						<div class=" col-md-2 accordion-col__prise">
							<div class="accordion__prise">
								Цена
							</div>

						</div>

						<div class=" col-md-2 accordion-col__value">
							<div class="accordion__value">
								Количество
							</div>

						</div>
						<div class=" col-md-2 ">
							<div class="accordion__sum">
								Сумма
							</div>
						</div>

					</div>
					
					<!--  -->
					<?
						$ORDER_ID=$order['ORDER']['ID'];
						CModule::IncludeModule('sale');
						$res = CSaleBasket::GetList(array(), array("ORDER_ID" => $ORDER_ID)); // ID заказа
						$json_product=array();
						while ($arItem = $res->Fetch()) {
							
						?>	

						
							<div class="row accordion-content">
								<div class=" col-md-6 accordion-col__title">
									<?=$arItem['NAME']?>
								</div>
								<div class="col-4 col-md-2 accordion-col__prise">
									<div class="accordion__prise">
										<?=CurrencyFormat($arItem['PRICE'], 'RUB');?>
									</div>

								</div>

								<div class="col-4 col-md-2 accordion-col__value">
									<div class="accordion__value">
										<?=$arItem['QUANTITY']?> шт
									</div>

								</div>
								<div class="col-4 col-md-2 accordion-col__sum">
									<div class="accordion__sum">
										<?=CurrencyFormat($arItem['PRICE']*$arItem['QUANTITY'], 'RUB');?>
									</div>
								</div>

							</div>
							
						<?}
					?>
				</div>
			</div>

			<?
		}
	}
	?>

	<?
	echo $arResult["NAV_STRING"];

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$javascriptParams = array(
			"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"templateName" => $this->__component->GetTemplateName(),
			"paymentList" => $paymentChangeData,
			"returnUrl" => CUtil::JSEscape($arResult["RETURN_URL"]),
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
		?>
		<script>
			BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
		</script>
		<?
	}
}
?>
