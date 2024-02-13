<?
/**
 * @global $APPLICATION
 * @global $USER
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\{ Context, Application, Page\Asset };

global $APPLICATION;
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
        <title><? $APPLICATION->ShowTitle() ?></title>
        <?
        $APPLICATION->ShowHead();

        $APPLICATION->AddHeadString('<meta charset="UTF-8">');
        $APPLICATION->AddHeadString('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
        $APPLICATION->AddHeadString('<meta http-equiv="X-UA-Compatible" content="ie=edge">');

        $APPLICATION->AddHeadString('<meta name="facebook-domain-verification" content="leq1oeb1uzyvmyyokaifpobz82kbnh" />');
        $APPLICATION->AddHeadString('<meta name="facebook-domain-verification" content="e0b74exzwsc9rpg87jtq8j31ogcayk" />');
        $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.googleapis.com">');
        $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>');
        $APPLICATION->AddHeadString('<link media="all" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">',true);
        if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false) {
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/moscow/css/bootstrap.min.css");
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/moscow/css/slick.css");
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/moscow/css/magnific-popup.css");
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/moscow/css/fancy.min.css");
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/moscow/css/style.min.css");
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/chosen.min.css");
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
            $APPLICATION->AddHeadString('<script type="text/javascript" src="' . SITE_TEMPLATE_PATH . '/moscow/js/jquery-3.5.1.min.js" data-skip-moving="true"></script>');
            Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/moscow/js/slick.js");
            Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/custom.js");
            Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/webDevLazy.min.js");
            $APPLICATION->AddHeadString('<link type="text/css" href="' . SITE_TEMPLATE_PATH . '/moscow/css/media.css" rel="stylesheet">');
            $APPLICATION->AddHeadString('<link type="text/css" href="' . SITE_TEMPLATE_PATH . '/moscow/css/patch.css" rel="stylesheet">', true);
            $APPLICATION->AddHeadString('<script type="text/javascript" src="' . SITE_TEMPLATE_PATH . '/moscow/js/main.js" data-skip-moving="true"></script>');
        }else{
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/moscow/css/style.min.css");
            Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
        }
        ?>
    <script>
        function loadScript(src) {
            var s = document.createElement('script');
            s.src = src;
            document.body.appendChild(s)
        }
        var timeOut = 2000;
        setTimeout(function() { loadScript('<?= SITE_TEMPLATE_PATH . "/moscow/js/popper.min.js" ?>') }, timeOut);
        setTimeout(function() { loadScript('<?= SITE_TEMPLATE_PATH . "/moscow/js/bootstrap.min.js" ?>') }, timeOut);
        setTimeout(function() { loadScript('<?= SITE_TEMPLATE_PATH . "/moscow/js/jquery.fancybox.min.js" ?>') }, timeOut);
        setTimeout(function() { loadScript('<?= SITE_TEMPLATE_PATH . "/moscow/js/imask2.js" ?>') }, timeOut);
        setTimeout(function() { loadScript('<?= SITE_TEMPLATE_PATH . "/moscow/js/js.cookie.min.js" ?>') }, timeOut);
        setTimeout(function() { loadScript('<?= SITE_TEMPLATE_PATH . "/moscow/js/jquery.magnific-popup.min.js" ?>') }, timeOut);
        setTimeout(function() { loadScript('<?= SITE_TEMPLATE_PATH . "/js/chosen.jquery.min.js" ?>') }, timeOut);
    </script>
  <?
  $requestUTM = \Bitrix\Main\Context::getCurrent()->getRequest();
  $linkUTM = [
    "utm_source"   => $requestUTM->get( "utm_source" ),
    "utm_medium"   => $requestUTM->get( "utm_medium" ),
    "utm_campaign" => $requestUTM->get( "utm_campaign" ),
    "utm_content"  => $requestUTM->get( "utm_content" )
  ];
  if($linkUTM["utm_source"] != "" && $linkUTM["utm_medium"] != "" && $linkUTM["utm_campaign"] != "" && $linkUTM["utm_content"] != ""){
    setcookie( "utm_source", $linkUTM['utm_source'] );
    setcookie( "utm_medium", $linkUTM['utm_medium'] );
    setcookie( "utm_campaign", $linkUTM['utm_campaign'] );
    setcookie( "utm_content", $linkUTM['utm_content'] );
  } else if ($_COOKIE['utm_source'] && $_COOKIE['utm_medium'] && $_COOKIE['utm_campaign'] && $_COOKIE['utm_content']){?>
      <script data-skip-moving="true">
        window.addEventListener('b24:form:init', (event) => {
          let form = event.detail.object;
          if (form.identification.id == 28) {
            form.setProperty("utm_source", "<?= $_COOKIE['utm_source'] ?>");
            form.setProperty("utm_medium", "<?= $_COOKIE['utm_medium'] ?>");
            form.setProperty("utm_campaign", "<?= $_COOKIE['utm_campaign'] ?>");
            form.setProperty("utm_content", "<?= $_COOKIE['utm_content'] ?>");
          }
        });
      </script>
  <? } ?>
</head>
<body>

    <?$APPLICATION->ShowPanel()?>

<main>