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

$sectionFields = \biovestin24\SectionConf::getSectionFields(
  [
    'IBLOCK_ID'    => $arParams["DATA_PROPS"]["IBLOCK_ID"],
    'IBLOCK_TYPE'  => $arParams["DATA_PROPS"]["IBLOCK_TYPE"],
    'SECTION_CODE' => $arParams["DATA_PROPS"]["SECTION_CODE"],
    'SITE_ID'      => $arParams["DATA_PROPS"]["SITE_ID"],
  ]
);

?>
<section class="page-section descr">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title title--descr"><?= $sectionFields["UF_TITLE"]; ?></div>
            </div>
        </div>
        <div class="row">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
                <div class="col-md-6 col-lg-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="descr__item">
                        <div class="descr__content">
                            <div class="descr__icon">
                                <img class="lazy" data-srcset="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-green.svg" alt="<?= $arItem["NAME"] ?>">
                            </div>
                            <div class="descr__title"><?= $arItem["NAME"] ?></div>
                        </div>
                        <div class="descr__text"><?= $arItem["PREVIEW_TEXT"] ?></div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>

