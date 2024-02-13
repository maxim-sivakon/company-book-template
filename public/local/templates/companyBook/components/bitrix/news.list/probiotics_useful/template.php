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
<section class="page-section good">
    <div class="container container-position">
        <div class="inner">
            <div class="good__title title"><?= $sectionFields["UF_TITLE"]; ?></div>
        </div>
        <div class="buttons-wrapper"></div>
        <a href="<?= $sectionFields["UF_LINK_BTN"]; ?>" class="good__btn default-btn"><?= $sectionFields["UF_NAME_BTN"]; ?></a>
    </div>

    <div class="good__slider">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class=" good__slider-wrapper<?= $key == 0 ? '__1' : ''; ?>">
            <div class="container container-good__bg">
                <div class="good__line-bg ">
                    <img class="lazy image<?= $key?>" data-srcset="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-white.svg" alt="<?= $arItem["NAME"] ?>">
                </div>
                <div class="good__wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="good__subtitle"><?= $arItem["PROPERTIES"]["EX_DESC_SLIDE"]["VALUE"] ?></div>
                        </div>
                    </div>
                    <div class="good__slider-item__inner">
                        <?foreach($arItem["PROPERTIES"]["EX_POINTS_SLIDE"]["VALUE"] as $key => $arPhoto):?>
                            <div class="good__slider-item">
                                <div class="good__slider-icon">
                                    <img class="lazy" data-srcset="<?= CFile::GetPath($arPhoto) ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-green.svg">
                                </div>
                                <div class="good__slider-text"><?= htmlspecialcharsBack($arItem["PROPERTIES"]["EX_POINTS_SLIDE"]["DESCRIPTION"][$key]) ?></div>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
</section>


