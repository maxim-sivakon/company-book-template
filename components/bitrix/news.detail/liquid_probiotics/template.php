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
<section class="page-section top">
    <div class="line-bg__media">
        <img class="lazy" data-srcset="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-white.svg" alt="<?= $arResult["PROPERTIES"]["EX_TITLE"]["VALUE"] ?>">
    </div>
    <div class="container container-top__bg">
        <div class="line-bg">
            <img class="lazy" data-srcset="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>" src="<?= SITE_TEMPLATE_PATH ?>/moscow/images/loader/loading-white.svg" alt="<?= $arResult["PROPERTIES"]["EX_TITLE"]["VALUE"] ?>">
        </div>
        <div class="top__wrapper">
            <div class="row">
                <div class="col-md-6 top__img">
                    <div class="title title--top"><?= $arResult["PROPERTIES"]["EX_TITLE"]["VALUE"] ?></div>
                    <div class="top__subtitle"><?= $arResult["PREVIEW_TEXT"] ?></div>
                    <a class="default-btn-more" href="<?= $arResult["PROPERTIES"]["EX_BUTTON"]["VALUE"] ?>"><?= $arResult["PROPERTIES"]["EX_BUTTON"]["DESCRIPTION"] ?></a>
                </div>
            </div>
        </div>
        <div class="top__line">
            <? foreach ($arResult["PROPERTIES"]["EX_POINTS"]["VALUE"] as $key => $exPoint): ?>
                <div class="top__item">
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
                    <div class="top__item-text"><?= $exPoint ?></div>
                </div>
                <?if($key == 3) break;?>
            <? endforeach; ?>
        </div>
    </div>
</section>
