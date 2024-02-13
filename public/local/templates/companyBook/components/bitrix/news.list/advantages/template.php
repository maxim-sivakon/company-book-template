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

<div class="top__line">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<div class="top__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="top__item-img">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="8" cy="8" r="6.5" fill="url(#paint0_linear)" stroke="#E45A1E" stroke-width="3" />
					<defs>
						<linearGradient id="paint0_linear" x1="8" y1="3" x2="8" y2="13" gradientUnits="userSpaceOnUse">
							<stop stop-color="#FFCBAE" />
							<stop offset="1" stop-color="#FFF7F3" />
						</linearGradient>
					</defs>
				</svg>
			</div>
			<div class="top__item-text">
				<?echo $arItem["NAME"]?>
			</div>
		</div>
	<?endforeach;?>
</div>
