<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

if($arResult["ERROR_MESSAGE"] <> '')
{
	ShowError($arResult["ERROR_MESSAGE"]);
}
if($arResult["NAV_STRING"] <> '')
{
	?>
	<p><?=$arResult["NAV_STRING"]?></p>
	<?
}

if (is_array($arResult["PROFILES"]) && !empty($arResult["PROFILES"]))
{
	?>
	
		<?foreach($arResult["PROFILES"] as $val)
		{
			?>
			
			<div class="radio-box__item js-parentProfile" data-id="<?=$val['ID']?>">
				<div class="row">
					<div class="col-md-1">
						<input id="radio__<?=$val['ID']?>" class="radio-btn" checked type="radio" name="nameradio" value="<?=$val['ID']?>">
						<label for="radio__<?=$val['ID']?>" class="fake-radio"></label>
					</div>
					<div class="col-md-6">
						<div class="radio-box__address">
							<?=$val["NAME"]?>
						</div>
					</div>

					<div class="col-md-5 radio-box__wrapper">
						<div class="radio-box__edit js-editProfile">
							<span class="form-icon"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M14.4374 0C15.0921 0 15.7197 0.261419 16.1781 0.723423L19.279 3.82432C19.7407 4.286 20.0001 4.91217 20.0001 5.56508C20.0001 6.21799 19.7407 6.84416 19.279 7.30584L7.95751 18.6238C7.25902 19.4295 6.2689 19.9245 5.1346 20.0023H0V19.0023L0.00324765 14.7873C0.0884382 13.7328 0.578667 12.7523 1.3265 12.0934L12.6954 0.724628C13.1564 0.26083 13.7834 0 14.4374 0ZM5.06398 18.0048C5.59821 17.967 6.09549 17.7184 6.49479 17.2616L14.0567 9.6997L10.3023 5.94518L2.6961 13.5496C2.29095 13.9079 2.04031 14.4092 2 14.8678V18.0029L5.06398 18.0048ZM11.7167 4.53114L15.4709 8.28549L17.8648 5.89162C17.9514 5.80502 18.0001 5.68756 18.0001 5.56508C18.0001 5.4426 17.9514 5.32514 17.8648 5.23854L14.7611 2.13486C14.6755 2.04855 14.5589 2 14.4374 2C14.3158 2 14.1992 2.04855 14.1136 2.13486L11.7167 4.53114Z"
										fill="#52636C"></path>
								</svg>

							</span>
							<span class="radio-box__edit-span">Изменить</span>
						</div>

						<div class="radio-box__del">
							<span class="form-icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M10 1.81818C5.48131 1.81818 1.81818 5.48131 1.81818 10C1.81818 14.5187 5.48131 18.1818 10 18.1818C14.5187 18.1818 18.1818 14.5187 18.1818 10C18.1818 5.48131 14.5187 1.81818 10 1.81818ZM0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10Z"
										fill="#52636C"></path>
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M13.3701 6.6299C13.7251 6.98493 13.7251 7.56053 13.3701 7.91555L7.91555 13.3701C7.56053 13.7251 6.98493 13.7251 6.6299 13.3701C6.27488 13.0151 6.27488 12.4395 6.6299 12.0844L12.0844 6.6299C12.4395 6.27488 13.0151 6.27488 13.3701 6.6299Z"
										fill="#52636C"></path>
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M6.6299 6.6299C6.98493 6.27488 7.56053 6.27488 7.91555 6.6299L13.3701 12.0844C13.7251 12.4395 13.7251 13.0151 13.3701 13.3701C13.0151 13.7251 12.4395 13.7251 12.0844 13.3701L6.6299 7.91555C6.27488 7.56053 6.27488 6.98493 6.6299 6.6299Z"
										fill="#52636C"></path>
								</svg>

							</span>
							<a href="javascript:if(confirm('<?= Loc::getMessage("STPPL_DELETE_CONFIRM") ?>')) window.location='<?= $val["URL_TO_DETELE"] ?>'"><span>Удалить</span></a>
						</div>
					</div>
					<div class="data-box js-newAddressBox" style="display: none">
						<div class="form__title">
							Добавление нового адреса
						</div>
						<div class="data-box__wrapper">
							<div class="row">
								<div class=" js-editBlock">

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<?
		}?>
	<?
	if($arResult["NAV_STRING"] <> '')
	{
		?>
		<p><?=$arResult["NAV_STRING"]?></p>
		<?
	}
}
elseif ($arResult['USER_IS_NOT_AUTHORIZED'] !== 'Y')
{
	?>
	<h3><?=Loc::getMessage("STPPL_EMPTY_PROFILE_LIST") ?></h3>
	<?
}
?>
