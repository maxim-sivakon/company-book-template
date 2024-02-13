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

</head>
<body>

<!--    --><?//$APPLICATION->ShowPanel()?>








    <!DOCTYPE html>
    <html lang="<?=LANGUAGE_ID?>">
    <head>
        <title><? $APPLICATION->ShowTitle() ?></title>
        <?
        /* Meta tags */
        $APPLICATION->AddHeadString('<meta charset="UTF-8" />');
        $APPLICATION->AddHeadString('<meta http-equiv="X-UA-Compatible" content="IE=edge" />');
        $APPLICATION->AddHeadString('<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>');
        $APPLICATION->AddHeadString('<link rel="icon" type="image/png" href="images/favicon.png" />');

        /* CSS Assets */
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "css/app.css");

        /* Javascript Assets */
        $APPLICATION->AddHeadString('<script src="' . SITE_TEMPLATE_PATH . 'js/app.js" defer data-skip-moving="true"></script>');

        /* Fonts */
        $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.googleapis.com" />');
        $APPLICATION->AddHeadString('<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />');
        $APPLICATION->AddHeadString('<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>');

        /* Additional scripts */
        $APPLICATION->AddHeadString('<script data-skip-moving="true">
            localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
        </script>');
        ?>
    </head>

    <body x-data x-bind="$store.global.documentBody" class="is-sidebar-open is-header-blur navigation:sideblock">
    <!-- App preloader-->
    <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
        <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
    </div>

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        <!-- Sidebar -->
        <div class="sidebar sidebar-panel print:hidden">
            <div class="flex h-full grow flex-col border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-750">
                <div class="flex items-center justify-between px-3 pt-4">
                    <!-- Application Logo -->
                    <div class="flex">
                        <a href="/">
                            <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]" src="images/app-logo.svg" alt="logo"/>
                        </a>
                    </div>
                    <button @click="$store.global.isSidebarExpanded = false" class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                </div>
                <!-- Left menu -->
                <div x-data="{expandedItem:'menu-item-3'}" class="mt-5 h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-init="$el._x_simplebar = new SimpleBar($el);">
                    <ul class="flex flex-1 flex-col px-4 font-inter">
                        <li x-data="accordionItem('menu-item-1')">
                            <a :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide text-slate-500 outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50" href="javascript:void(0);">
                                <span>Onboarding</span>
                                <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <ul x-collapse x-show="expanded">
                                <li>
                                    <a x-data="navLink" href="pages-onboarding-1.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>Onboarding 1</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-onboarding-2.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>Onboarding 2</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li x-data="accordionItem('menu-item-2')">
                            <a :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide text-slate-500 outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50" href="javascript:void(0);">
                                <span>User Card</span>
                                <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <ul x-collapse x-show="expanded">
                                <li>
                                    <a x-data="navLink" href="pages-card-user-1.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>User Card 1</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-card-user-2.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>User Card 2</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-card-user-3.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>User Card 3</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-card-user-4.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>User Card 4</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-card-user-5.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>User Card 5</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-card-user-6.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>User Card 6</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-card-user-7.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>User Card 7</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>

                    <ul class="flex flex-1 flex-col px-4 font-inter">
                        <li x-data="accordionItem('menu-item-7')">
                            <a :class="expanded && 'text-slate-800 font-semibold dark:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide text-slate-500 outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50" href="javascript:void(0);">
                                <span>Sign In</span>
                                <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <ul x-collapse x-show="expanded">
                                <li>
                                    <a x-data="navLink" href="pages-login-1.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>Sign In 1</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a x-data="navLink" href="pages-login-2.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                                            <span>Sign In 2</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- App Header Wrapper-->
        <nav class="header print:hidden">
            <!-- App Header  -->
            <div class="header-container relative flex w-full bg-white dark:bg-navy-700 print:hidden">
                <!-- Header Items -->
                <div class="flex w-full items-center justify-between">
                    <!-- Left: Sidebar Toggle Button -->
                    <div class="h-7 w-7">
                        <button class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80" :class="$store.global.isSidebarExpanded && 'active'" @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                    <!-- Right: Header buttons -->
                    <div class="-mr-1.5 flex items-center space-x-2">
                        <!-- Mobile Search Toggle -->
                        <button @click="$store.global.isSearchbarActive = !$store.global.isSearchbarActive" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-slate-500 dark:text-navy-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>

                        <!-- Main Searchbar -->
                        <template x-if="$store.breakpoints.smAndUp">
                            <div class="flex" x-data="usePopper({placement:'bottom-end',offset:12})" @click.outside="isShowPopper && (isShowPopper = false)">
                                <div class="relative mr-4 flex h-8">
                                    <input placeholder="Search here...!" class="form-input peer h-full rounded-full bg-slate-150 px-4 pl-9 text-xs+ text-slate-800 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:text-navy-100 dark:placeholder-navy-300 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900" :class="isShowPopper ? 'w-80' : 'w-60'" @focus="isShowPopper= true" type="text" x-ref="popperRef"/>
                                    <div class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Dark Mode Toggle -->
                        <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg x-show="$store.global.isDarkModeEnabled"
                                 x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                                 x-transition:enter-start="scale-75"
                                 x-transition:enter-end="scale-100 static"
                                 class="h-6 w-6 text-amber-400"
                                 fill="currentColor"
                                 viewBox="0 0 24 24">
                                <path d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 x-show="!$store.global.isDarkModeEnabled"
                                 x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                                 x-transition:enter-start="scale-75"
                                 x-transition:enter-end="scale-100 static"
                                 class="h-6 w-6 text-amber-400"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <!-- Monochrome Mode Toggle -->
                        <button @click="$store.global.isMonochromeModeEnabled = !$store.global.isMonochromeModeEnabled" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <i class="fa-solid fa-palette bg-gradient-to-r from-sky-400 to-blue-600 bg-clip-text text-lg font-semibold text-transparent"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile Searchbar -->
        <div x-show="$store.breakpoints.isXs && $store.global.isSearchbarActive" x-transition:enter="easy-out transition-all" x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in transition-all" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-[100] flex flex-col bg-white dark:bg-navy-700 sm:hidden">
            <div class="flex items-center space-x-2 bg-slate-100 px-3 pt-2 dark:bg-navy-800">
                <button class="btn -ml-1.5 h-7 w-7 shrink-0 rounded-full p-0 text-slate-600 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25" @click="$store.global.isSearchbarActive = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke-width="1.5" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <input x-effect="$store.global.isSearchbarActive && $nextTick(() => $el.focus() );" class="form-input h-8 w-full bg-transparent placeholder-slate-400 dark:placeholder-navy-300" type="text" placeholder="Search here...111"/>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <main class="main-content w-full px-[var(--margin-x)] pb-8">

            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    Blank Template
                </h2>
                <div class="hidden h-full py-1 sm:flex">
                    <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                </div>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Forms</a>
                        <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </li>
                    <li>Blank Template</li>
                </ul>
            </div>


