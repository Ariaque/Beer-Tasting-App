<?php
DEFINE('APP_FOLDER', 'app/');
DEFINE('CONFIG_FOLDER', 'config/');
DEFINE('RESOURCES_FOLDER', 'public/');
DEFINE('CONTROLLERS_FOLDER', APP_FOLDER . 'controllers/');
DEFINE('CLASS_FOLDER', APP_FOLDER . 'class/');
DEFINE('VIEWS_FOLDER', RESOURCES_FOLDER . 'views/');
DEFINE('CSS_FOLDER', RESOURCES_FOLDER . 'css/');
DEFINE('JS_FOLDER', RESOURCES_FOLDER . 'js/');
DEFINE('ASSET_FOLDER', RESOURCES_FOLDER . 'assets/');
DEFINE('PARTIALS_SUBFOLDER', 'partials/');
DEFINE('EMAILS_SUBFOLDER', VIEWS_FOLDER . '/emails/');
DEFINE('LOGS_FOLDER', 'logs/');
DEFINE('LANG_FOLDER', RESOURCES_FOLDER . 'lang/');


if (isset($_SERVER['SERVER_NAME'])) {
    $serverName = $_SERVER['SERVER_NAME'];
} else {
    die();
}

DEFINE('APP_ROOT', __DIR__);

DEFINE('SERVER_NAME', $serverName);

require_once(CONFIG_FOLDER . 'init.php');

@session_start();



spl_autoload_register(function ($class) {
    $class = strtolower($class);
    $sources = array(CONTROLLERS_FOLDER . "/$class.php", CLASS_FOLDER . "$class.php");
    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
            break;
        }
    }
});

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$acceptLang = [Session::LANG_EN, Session::LANG_FR];
$lang = in_array($lang, $acceptLang) ? $lang : DEFAULT_LANG;

Session::setUserLang($lang);

require_once LANG_FOLDER . "{$lang}.php";

$controller = false;
if (isset($_GET['c']) and class_exists($_GET['c'])) {
    $controller = new $_GET['c']();
} else {
    header('HTTP/1.1 401 Unauthorized');
    die();
}

$content =  $controller->render();

if ($controller->useLayout()) {
    $h1Controller = $controller->getH1();
    $titleController = $controller->getTitle();
    $breadCrumbs = $controller->getBreadCrumbs();
    $content = App::get_content(
        'layout.phtml',
        array(
            'title' => $titleController,
            'h1' => $h1Controller,
            'content' => $content,
            'breadCrumbs' => $breadCrumbs,
        )
    );
}
unset($controller);
echo $content;