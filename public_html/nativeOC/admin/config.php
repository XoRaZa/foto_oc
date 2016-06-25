<?php
// BACKEND CONFIG

// HTTP
define('HTTP_SERVER', 'http://kado.lt/nativeOC/admin/');
define('HTTP_CATALOG', 'http://kado.lt/nativeOC/');
define('HTTP_IMAGE', 'http://kado.lt/nativeOC/image/');
define('HTTP_ADMIN', 'http://kado.lt/nativeOC/admin/');

// HTTPS
define('HTTPS_SERVER', HTTP_SERVER);
define('HTTPS_CATALOG', HTTP_CATALOG);
define('HTTPS_IMAGE', HTTP_IMAGE);
define('HTTPS_ADMIN', HTTP_ADMIN);

// DIR
define('DIR_CATALOG', '/home/pprelati/domains/kado.lt/public_html/nativeOC/catalog/');
define('DIR_APPLICATION', '/home/pprelati/domains/kado.lt/public_html/nativeOC/admin/');
define('DIR_SYSTEM', '/home/pprelati/domains/kado.lt/public_html/nativeOC/system/');
define('DIR_DATABASE', DIR_SYSTEM.'database/');
define('DIR_LANGUAGE', DIR_APPLICATION.'language/');
define('DIR_TEMPLATE', DIR_APPLICATION.'view/template/');
define('DIR_CONFIG', DIR_SYSTEM.'config/');
define('DIR_IMAGE', '/home/pprelati/domains/kado.lt/public_html/nativeOC/image/');
define('DIR_CACHE', DIR_SYSTEM.'cache/');
define('DIR_DOWNLOAD', DIR_SYSTEM.'download/');
define('DIR_UPLOAD', DIR_SYSTEM.'upload/');
define('DIR_LOGS', DIR_SYSTEM.'logs/');
define('DIR_MODIFICATION', DIR_SYSTEM.'modification/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'pprelati_oc');
define('DB_PASSWORD', 'jusK1tas');
define('DB_DATABASE', 'pprelati_oc');
define('DB_PREFIX', 'oc_');
?>
