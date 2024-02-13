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
<section class="page-section about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-bg">
                    <img class="lazy" data-srcset="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-white.svg" alt="<?= $arResult["PROPERTIES"]["EX_TITLE"]["VALUE"] ?>">
                </div>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="about__content">
                    <div class="about__logo">
                        <img class="lazy" data-srcset="<?= CFile::GetPath($arResult["PROPERTIES"]["EX_LOGO"]["VALUE"]) ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-green.svg"  alt="<?= $arResult["PROPERTIES"]["EX_TITLE"]["VALUE"] ?>">
                    </div>
                    <div class="about__title title"><?= $arResult["PROPERTIES"]["EX_TITLE"]["VALUE"] ?></div>
                    <div class="about__text"><?= $arResult["PREVIEW_TEXT"] ?></div>
                    <a class="default-btn-more" href="<?= $arResult["PROPERTIES"]["EX_BUTTON"]["VALUE"] ?>"><?= $arResult["PROPERTIES"]["EX_BUTTON"]["DESCRIPTION"] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
