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

<div class="container descr">
	<div class="feedback_wrapper">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<div class="slider_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="top">
					<?if($arItem["PROPERTIES"]["POL"]['VALUE'] == 'М'):?>
						<img src="/local/templates/.default/biovestin_markup/Images/feedback/man_icon.png" alt="man_icon">
					<?else:?>
						<img src="/local/templates/.default/biovestin_markup/Images/feedback/woman_icon.png" alt="man_icon">
					<?endif;?>
					<div class="name"><?=$arItem["NAME"]?></div>
				</div>
				<img src="/local/templates/.default/biovestin_markup/Images/feedback/Divider.png" alt="divider" class="divider">
				<div class="text">
					<?=$arItem['PREVIEW_TEXT']?>
				</div>
				<a class="read_more" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать полностью ></a>
				<img src="/local/templates/.default/biovestin_markup/Images/feedback/Quote_icon.png" alt="quote" class="quote">
			</div>
		<?endforeach;?>
	</div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
