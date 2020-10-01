<?php
/**
 * QRcdr - php QR Code generator
 * head.php
 *
 * PHP version 5.3+
 *
 * @category  PHP
 * @package   QRcdr
 * @author    Nicola Franchini <info@veno.it>
 * @copyright 2015-2019 Nicola Franchini
 * @license   item sold on codecanyon https://codecanyon.net/item/qrcdr-responsive-qr-code-generator/9226839
 * @link      http://veno.es/qrcdr/
 */
date_default_timezone_set('UTC');
$getsection = $_CONFIG['default_tab'];
$optionlogo = 'none';

$PNG_TEMP_DIR = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$_CONFIG['qrcodes_dir'].DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = $_CONFIG['qrcodes_dir'].'/';

if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR);
}

$matrixPointSize = 16;
$errorCorrectionLevel = 'M'; // available: L, M, Q, H
$stringbackcolor = $_CONFIG['qr_bgcolor'];
$stringfrontcolor = $_CONFIG['qr_color'];
$output_data = false;

if ($_CONFIG['delete_old_files']) {
    $lifetime = $_CONFIG['file_lifetime'];
    deleteOldFiles($PNG_WEB_DIR, ($lifetime*3600));
}
