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
<section class="page-section motto">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="title"><?= $sectionFields["UF_TITLE"]; ?></div>
            </div>
            <div class="col-md-4 ml-auto">
                <a href="<?= $sectionFields["UF_LINK"]; ?>" class="dosage product-dosage">
                    <span class="dosage-icon_wrapper">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.9255 2.9796H22.0408V1.08813C22.0408 0.488192 21.5526 0 20.9527 0C20.3527 0 19.8645 0.488192 19.8645 1.08813V2.9796H8.13545V1.08813C8.13545 0.488192 7.64726 0 7.04733 0C6.44739 0 5.9592 0.488192 5.9592 1.08813V2.9796H3.07453C1.37941 2.9796 0 4.35901 0 6.05413V24.9255C0 26.6206 1.37941 28 3.07453 28H24.9255C26.6206 28 28 26.6206 28 24.9255V6.05413C28 4.35901 26.6211 2.9796 24.9255 2.9796ZM7.04733 8.13545C7.64726 8.13545 8.13545 7.64726 8.13545 7.04733V5.15585H19.8645V7.04733C19.8645 7.64726 20.3527 8.13545 20.9527 8.13545C21.5526 8.13545 22.0408 7.64726 22.0408 7.04733V5.15585H24.9255C25.4207 5.15585 25.8237 5.55888 25.8237 6.05413V9.932H2.17625V6.05413C2.17625 5.55888 2.57928 5.15585 3.07453 5.15585H5.9592V7.04733C5.9592 7.64726 6.44739 8.13545 7.04733 8.13545ZM25.8237 12.1088V24.926C25.8237 25.4213 25.4207 25.8243 24.9255 25.8243H3.07453C2.57928 25.8243 2.17625 25.4213 2.17625 24.926V12.1088H25.8237Z" fill="#2F3639" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3739 23.3885C12.6855 23.3885 12.998 23.2702 13.2361 23.0341L19.7476 16.561L19.7517 16.5568C20.2202 16.0741 20.2065 15.3025 19.7217 14.8362C19.2465 14.3802 18.5011 14.3804 18.0257 14.8372L12.3739 20.4557L9.98042 18.0762L9.97616 18.0721C9.49179 17.6075 8.71912 17.6208 8.25108 18.1019C7.79097 18.575 7.79135 19.3199 8.25194 19.7935L11.5115 23.0338C11.75 23.2709 12.0633 23.3885 12.3739 23.3885ZM12.3735 20.9198L9.74814 18.3099C9.69624 18.2601 9.63979 18.2178 9.58016 18.183C9.6396 18.2178 9.69588 18.2599 9.74763 18.3096L12.3734 20.9199L12.3735 20.9198ZM11.9231 22.938C12.0617 23.0186 12.2177 23.0588 12.3734 23.0588C12.6019 23.0588 12.8299 22.9722 13.0037 22.7999L19.5148 16.3271C19.8562 15.9754 19.8464 15.4134 19.4931 15.0736C19.4395 15.0222 19.3813 14.9787 19.3198 14.9432C19.3815 14.9788 19.4399 15.0223 19.4936 15.0739C19.8469 15.4137 19.8567 15.9757 19.5153 16.3274L13.0042 22.8002C12.8304 22.9725 12.6024 23.0591 12.3739 23.0591C12.218 23.0591 12.0618 23.0188 11.9231 22.938Z" fill="#2F3639" />
                        </svg>
                    </span>
                    <span><?= $sectionFields["UF_NAME_LINK"]; ?></span>
                </a>
            </div>
        </div>
        <div class="row no-gutters motto__items">
            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

                <div class="col-md-6 motto__item-wrapper">
                    <div class="motto__item">
                        <div class="motto__icon">
                            <img class="lazy" data-srcset="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
                        </div>
                        <div class="motto__content">
                            <div class="motto__content-title"><?= $arItem["NAME"] ?></div>
                            <div class="motto__content-text"><?= $arItem["PREVIEW_TEXT"] ?></div>
                        </div>
                    </div>
                </div>

            <?endforeach;?>

        </div>
        <?
        $APPLICATION->IncludeComponent(
          "bitrix:main.include",
          "",
          [
            "AREA_FILE_SHOW"   => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE"    => "",
            "PATH"             => "/include/dozirovkaBottom.php",
          ]
        ); ?>
    </div>
</section>
