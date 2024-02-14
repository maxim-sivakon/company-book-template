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

<section class="page-section question">
    <div class="container">
        <div class="row">
            <div class="col question-top">
                <div class="title question__title"><?= $sectionFields["UF_TITLE"]; ?></div>
                <div class="question__logo">
                    <img class="lazy" data-srcset="<?= CFile::GetPath($sectionFields["PICTURE"]); ?>" alt="<?= $sectionFields["UF_TITLE"]; ?>">
                </div>
                <div class="question__subtitle"><?= htmlspecialcharsBack($sectionFields["DESCRIPTION"]); ?></div>
            </div>
        </div>
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
            <?if($key % 2 == 0):?>
                <div class="row question-row">
                    <div class="col-lg-6 question__left"
                         style="background-image: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>);">
                        &nbsp;<img class="lazy" data-srcset="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>">
                    </div>
                    <div class="col-lg-6">
                        <div class="question__item question__content-pl">
                            <div class="question__num-img">
                                <img class="lazy"
                                     data-srcset="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                                     alt="">
                            </div>
                            <div class="question__num-text">
                                <?= $arItem["PREVIEW_TEXT"] ?>
                                <? if($arItem["PROPERTIES"]["EX_BTN"]): ?>
                                    <p>
                                        <a class="default-btn kkup" href="<?= $arItem["PROPERTIES"]["EX_BTN"]["VALUE"] ?>"><?= $arItem["PROPERTIES"]["EX_BTN"]["DESCRIPTION"] ?></a>
                                    </p>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? else:?>
                <div class="row question-row question-row__reverse">
                    <div class="col-lg-6">
                        <div class="question__item question__content-pr">
                            <div class="question__num-img">
                                <img class="lazy"
                                     data-srcset="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>"
                                     alt="">
                            </div>
                            <div class="question__num-text">
                                <?= $arItem["PREVIEW_TEXT"] ?>
                                <? if($arItem["PROPERTIES"]["EX_BTN"]): ?>
                                <p>
                                    <a class="default-btn kkup" href="<?= $arItem["PROPERTIES"]["EX_BTN"]["VALUE"] ?>"><?= $arItem["PROPERTIES"]["EX_BTN"]["DESCRIPTION"] ?></a>
                                </p>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 question__right"
                         style="background-image: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>);">
                        <img class="lazy"
                             data-srcset="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                             alt="">
                    </div>
                </div>
            <? endif;?>
        <?endforeach;?>
    </div>
</section>

