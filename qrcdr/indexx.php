<?php
/**
 * VFM - veno file manager index
 *
 * PHP version >= 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <info@veno.it>
 * @copyright 2013 Nicola Franchini
 * @license   Exclusively sold on CodeCanyon: https://codecanyon.net/item/veno-file-manager-host-and-share-files/6114247
 * @link      http://filemanager.veno.it/
 */
define('VFM_APP', true);
require_once 'vfm-admin/include/head.php';
?>
<!doctype html>
<html lang="<?php echo $setUp->lang; ?>">
<head>
    <title><?php echo $setUp->getConfig("appname"); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo $setUp->printIcon("vfm-admin/_content/uploads/"); ?>
    <meta name="description" content="file manager">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="vfm-admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="vfm-admin/vfm-style.css">
	 
    <?php 
    if ($setUp->getConfig("txt_direction") == "RTL") { ?>
        <link rel="stylesheet" href="vfm-admin/css/bootstrap-rtl.min.css">
        <?php 
    } ?>
    <link rel="stylesheet" href="vfm-admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="vfm-admin/_content/skins/<?php echo $setUp->getConfig('skin') ?>">
	<link rel="stylesheet" href="_demo-inc/demo-style.css">
    <script type="text/javascript" src="vfm-admin/js/jquery-3.3.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="vfm-admin/js/html5.js" type="text/javascript"></script>
    <script src="vfm-admin/js/respond.min.js" type="text/javascript"></script>
    <![endif]-->
    <?php
    $bodyclass = 'vfm-body';
    if ($setUp->getConfig('inline_thumbs') == true) {
        $bodyclass .= ' inlinethumbs';
    }
    if (!$gateKeeper->isAccessAllowed()) {
        $bodyclass .= ' unlogged';
    }
    $audioping = $setUp->getConfig('audio_notification');
    if ($audioping) { ?>
    <script type="text/javascript">
        var audio_ping = new Audio("vfm-admin/<?php echo $setUp->getConfig('audio_notification'); ?>");
    </script>
        <?php
    } ?>
</head>
 <body id="uparea" class="vfm-body inlinethumbs unlogged">

        <!-- ++++++++++++++++++++++++++++++++++++ DEMO STUFF ++++++++++++++++++++++++++++++++++++ -->
        <div class="style-select">
            <div class="stalabel"> <i class="fa fa-cog fa-spin"></i></div>
            <div class="stylepanel">
                <form method="post" role="form" id="themeswitcher">

                    <input type="hidden" name="submitform">
                    <label>Select skin</label>
                    <select class="form-control syleselecta" name="stile">
                    <option value="material-amber-cyan.css" data-color="#FFC107" data-primary="#FFC107" data-secondary="#00BCD4">material-amber-cyan</option><option value="material-blue-pink.css" data-color="#2196F3" data-primary="#2196F3" data-secondary="#FF4081">material-blue-pink</option><option value="material-bluegrey-lightgreen.css" data-color="#607D8B" data-primary="#607D8B" data-secondary="#8BC34A">material-bluegrey-lightgreen</option><option value="material-brown-lightblue.css" data-color="#795548" data-primary="#795548" data-secondary="#03A9F4">material-brown-lightblue</option><option value="material-cyan-lime.css" data-color="#00BCD4" data-primary="#00BCD4" data-secondary="#CDDC39">material-cyan-lime</option><option value="material-dark.css" data-color="#333333" data-primary="#333333" data-secondary="#82b440">material-dark</option><option value="material-dpurple-pink.css" data-color="#673AB7" data-primary="#673AB7" data-secondary="#FF4081">material-dpurple-pink</option><option value="material-green-teal.css" data-color="#4CAF50" data-primary="#4CAF50" data-secondary="#009688"selected >material-green-teal</option><option value="material-indigo-grey.css" data-color="#3F51B5" data-primary="#3F51B5" data-secondary="#9E9E9E">material-indigo-grey</option><option value="material-lightgreen-bluegrey.css" data-color="#8BC34A" data-primary="#8BC34A" data-secondary="#607D8B">material-lightgreen-bluegrey</option><option value="material-orange-pink.css" data-color="#FF9800" data-primary="#FF9800" data-secondary="#FF4081">material-orange-pink</option><option value="material-pink-lightblue.css" data-color="#E91E63" data-primary="#E91E63" data-secondary="#03A9F4">material-pink-lightblue</option><option value="material-purple-orange.css" data-color="#9C27B0" data-primary="#9C27B0" data-secondary="#FF9800">material-purple-orange</option><option value="material-red-brown.css" data-color="#F44336" data-primary="#F44336" data-secondary="#795548">material-red-brown</option><option value="material-teal-cyan.css" data-color="#009688" data-primary="#009688" data-secondary="#00BCD4">material-teal-cyan</option><option value="blank.css" data-color="#fff" data-primary="#563d7c" data-secondary="#fff">blank</option><option value="cs-black.css" data-color="#ecf0f5" data-primary="#212121" data-secondary="#ecf0f5">cs-black</option><option value="cs-blue.css" data-color="#ecf0f5" data-primary="#448AFF" data-secondary="#ecf0f5">cs-blue</option><option value="cs-brown.css" data-color="#ecf0f5" data-primary="#5D4037" data-secondary="#ecf0f5">cs-brown</option><option value="cs-green.css" data-color="#ecf0f5" data-primary="#8BC34A" data-secondary="#ecf0f5">cs-green</option><option value="cs-navy.css" data-color="#ecf0f5" data-primary="#163268" data-secondary="#ecf0f5">cs-navy</option><option value="cs-purple.css" data-color="#ecf0f5" data-primary="#934ea5" data-secondary="#ecf0f5">cs-purple</option><option value="cs-red.css" data-color="#ecf0f5" data-primary="#D32F2F" data-secondary="#ecf0f5">cs-red</option><option value="cs-sand.css" data-color="#ecf0f5" data-primary="#b8a852" data-secondary="#ecf0f5">cs-sand</option><option value="cs-white.css" data-color="#ecf0f5" data-primary="#ffffff" data-secondary="#ecf0f5">cs-white</option><option value="cs-yellow.css" data-color="#ecf0f5" data-primary="#f39c12" data-secondary="#ecf0f5">cs-yellow</option><option value="vfm-2016.css" data-color="#ecf0f5" data-primary="#0193B7" data-secondary="#ecf0f5">vfm-2016</option>                    </select>

                    <div class="checkbox clear">
                        <label>
                            <input type="checkbox" name="showhead" class="checkhead"
                            checked                            > Header image
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="showdesc" class="checkhead"
                            checked                            > Description
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="inlinethumbs" class="checkhead"
                            checked                            > Inline thumbnails
                        </label>
                    </div>
                    <button type="submit" class="btn btn-block"><i class="fa fa-refresh"></i> update</button>
                </form>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="_demo-inc/bootstrap-colorselector-0.2.0/css/bootstrap-colorselector.css" />
        <script src="_demo-inc/bootstrap-colorselector-0.2.0/js/bootstrap-colorselector.js"></script>

        <script type="text/javascript">
            $('.syleselecta').colorselector({
                callback: function () {
                    $('#themeswitcher').submit();
                }
            });

            $(document).on('click', '.stalabel', function(){
                $(this).parent().toggleClass('aperto');
            });

            $(document).on('click', '.sendata', function(){
                var name = $(this).data('name');
                var pwd = $(this).data('pwd');
                $("#user_name").val(name);
                $("#user_pass").val(pwd);
                //$(window).scrollTop(0);
                $('html, body').animate({
                  scrollTop: 0
                }, 500);

            });

        </script>
        <!-- ++++++++++++++++++++++++++++++++++++ DEMO STUFF / END ++++++++++++++++++++++++++++++++++++ -->
    <body id="uparea" class="<?php echo $bodyclass; ?>">
        <div class="overdrag"></div>
            <?php
            /**
             * ************************************************
             * ******************** HEADER ********************
             * ************************************************
             */
            $template->getPart('activate');
            $template->getPart('navbar');
            $template->getPart('header');
            ?>
        <div class="container">
            <?php
            /**
             * ************************************************
             * **************** Response messages *************
             * ************************************************
             */
            ?>
            <div id="error">
                <noscript>
                    <div class="response boh">
                        <span><i class="fa fa-exclamation-triangle"></i> Please activate JavaScript</span>
                    </div>
                </noscript>
                <?php echo $setUp->printAlert(); ?>
            </div>
            <div class="main-content">
            <?php 
            $getrp = filter_input(INPUT_GET, "rp", FILTER_SANITIZE_STRING);
            $getreg = filter_input(INPUT_GET, "reg", FILTER_SANITIZE_STRING);

            if ($getdownloadlist) :
                /**
                * ************************************************
                * ********* SHOW FILE SHARING DOWNLOADER *********
                * ************************************************
                */
                $template->getPart('downloader');

            elseif ($getrp) :
                /**
                * ************************************************
                * **************** PASSWORD RESET ****************
                * ************************************************
                */
                $template->getPart('reset');
            else :
                /**
                * ************************************************
                * **************** SHOW FILEMANAGER **************
                * ************************************************
                */
                if (!$getreg || $setUp->getConfig('registration_enable') == false) {
                    $template->getPart('user-redirect');
                    $template->getPart('remote-uploader');
                    $template->getPart('notify-users');
                    $template->getPart('uploadarea');
                    $template->getPart('breadcrumbs');
                    $template->getPart('list-folders');
                    $template->getPart('list-files');
                    $template->getPart('disk-space');
                }
                if ($getreg && $setUp->getConfig('registration_enable') == true) {
                    $template->getPart('register');
                } else {
                    $template->getPart('login');
                }
            endif; ?>
            </div> <!-- .main-content -->
        </div> <!-- .container -->
        <?php
        /**
         * ************************************************
         * ******************** FOOTER ********************
         * ************************************************
         */
        $template->getPart('footer');
        $template->getPart('load-js');
        $template->getPart('modals');

        // Audio notification after upload
        if ($audioping && isset($_GET['response'])) { ?>
            <script type="text/javascript">
                audio_ping.play();
            </script>
            <?php
        } ?>
    </body>
</html>