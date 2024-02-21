<?php require($_SERVER[ "DOCUMENT_ROOT" ]."/bitrix/header.php");

/** @global CMain $APPLICATION */
/** @global CUser $USER */

$APPLICATION->SetTitle("Авторизация");
if(!$USER->IsAuthorized()){
    $APPLICATION->IncludeComponent(
        "bitrix:system.auth.form",
        "",
        [
            "FORGOT_PASSWORD_URL" => "",
            "PROFILE_URL"         => "/",
            "REGISTER_URL"        => "",
            "SHOW_ERRORS"         => "N"
        ]
    );
} else{
    LocalRedirect('/');
}

require($_SERVER[ "DOCUMENT_ROOT" ]."/bitrix/footer.php");