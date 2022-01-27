<?php

const APP_VERSION = '0.0.0.1';
const APP_NAME = 'TasteMyBeer';


DEFINE('DB_HOST', $_SERVER['host']);
DEFINE('DB_USER', $_SERVER['user']);
DEFINE('DB_PASSWORD', $_SERVER['password']);
DEFINE('DB_NAME', $_SERVER['database']);

DEFINE('DEFAULT_PAGINATION', '6');
DEFINE('DEFAULT_LANG', 'en');


const PATTERN_PASSWORD = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!%&@#$^*?_])[A-Za-z\d!%&@#$^*?_]{8,}$/';
const PATTERN_PASSWORD_EXPL = '';

const PATERN_TWO_DECIMAL_DIGIT_NUMBER = '/^([0-9]{1,2}\.)?[0-9]{1,2}$/i';
const PATERN_TWO_DECIMAL_DIGIT_NUMBER_EXPL = 'Veuillez entre une valeur décimale de deux chiffre au plus après la virgule.';

const PATERN_ONE_DIGIT_BETWEEN_1_AND_5 = '/^[1-5]$/';
const PATERN_ONE_DIGIT_BETWEEN_1_AND_5_EXPL = 'Veuillez entre un chiffre compris entre 1 et 5.';

const PATTERN_NAME = '/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,50}$/i';
const PATTERN_NAME_EXPL = 'Votre nom doit comporter de 3 à 30 caractères alphanumériques. Les tirets \'-\' et \'_\' sont autorisés.';
DEFINE('PATTERN_FIRST_NAME_EXPL', str_replace('nom', 'prénom', PATTERN_NAME_EXPL));


DEFINE('URL_PROD', 'https://beer-tasting-env-production.herokuapp.com/');
DEFINE('URL_DEV', 'http://bta/');

if (SERVER_NAME == "beer-tasting-env-production.herokuapp.com" || SERVER_NAME == "beer-tasting-env-staging.herokuapp.com") {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

DEFINE('SITE_PROTOCOL', $protocol);

const SITE_URL = SITE_PROTOCOL . SERVER_NAME . '/';
const VENDOR_DIR = '../vendor/';

const EMAIL_FROM = 'no-reply@tastemybeer.com';
const EMAIL_FROM_NAME = APP_NAME;

require_once(CONFIG_FOLDER . 'routes.php');