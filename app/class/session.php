<?php
class Session
{

    const USER = 'user';
    const USER_ID = 'userId';
    const LANG = 'lang';
    const LANG_FR = 'fr';
    const LANG_EN = 'en';


    public static function setConnectedUserId($userId)
    {
        $_SESSION[self::USER_ID] = $userId;
        return true;
    }

    public static function getConnectedUserId()
    {
        $user_id = false;
        if (isset($_SESSION[self::USER_ID])) {
            $user_id = $_SESSION[self::USER_ID];
        }
        return $user_id;
    }

    public static function deleteConnectedUserId()
    {
        unset($_SESSION[self::USER_ID]);
    }


    public static function setConnectedUser($user)
    {
        if ($user) {
            $_SESSION[self::USER] = serialize($user);
            self::setConnectedUserId($user->id);
        }
        return true;
    }

    public static function setUserLang($lang)
    {
        $_SESSION[self::LANG] = $lang;
        return true;
    }

    public static function getUserLang()
    {
        $lang = false;
        if (isset($_SESSION[self::LANG])) {
            $lang = $_SESSION[self::LANG];
        }
        return $lang;
    }

    public static function getConnectedUser()
    {
        $user = false;
        if (isset($_SESSION[self::USER])) {
            $user = unserialize($_SESSION[self::USER]);
        }

        return $user;
    }

    public static function deleteConnectedUser()
    {
        unset($_SESSION[self::USER]);
        self::deleteConnectedUserId();
    }
}