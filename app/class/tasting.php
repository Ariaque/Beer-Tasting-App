<?php

class Tasting
{
    const ID = 'tasting_id';
    const TITLE = 'title';
    const BEER_NAME = 'beer_name';

    const USER_ID = 'u_id';
    const BEER_STYLE_ID = 'bs_id';

    const AROMA_COMMENT = 'aroma_comment';
    const APPEARANCE_COMMENT = 'appearance_comment';
    const FLAVOR_COMMENT = 'flavor_comment';
    const MOUTHFEEL_COMMENT = 'mouthfeel_comment';
    const OVERALL_COMMENT = 'overall_comment';
    const BOTTLE_INSPECTION_COMMENT = 'bottle_inspection_comment';


    const AROMA_SCORE = 'aroma_score';
    const APPEARANCE_SCORE = 'appearance_score';
    const FLAVOR_SCORE = 'flavor_score';
    const MOUTHFEEL_SCORE = 'mouthfeel_score';
    const OVERALL_SCORE = 'overall_score';
    const TOTAL = 'total';

    const IS_ACETALDEHYDE = 'is_acetaldehyde';
    const IS_ALCOHOLIC = 'is_alcoholic';
    const IS_ASTRINGENT = 'is_astringent';
    const IS_DIACETYL = 'is_diacetyl';
    const IS_DMS = 'is_dms';
    const IS_ESTERY = 'is_estery';
    const IS_GRASSY = 'is_grassy';
    const IS_LIGHT_STRUCK = 'is_light_struck';
    const IS_METALLIC = 'is_metallic';
    const IS_MUSTY = 'is_musty';
    const IS_OXIDIZED = 'is_oxidized';
    const IS_PHENOLIC = 'is_phenolic';
    const IS_SOLVENT = 'is_solvent';
    const IS_ACIDIC = 'is_acidic';
    const IS_SULFUR = 'is_sulfur';
    const IS_VEGETAL = 'is_vegetal';
    const IS_BOTTLE_OK = 'is_bottle_ok';
    const IS_YEASTY = 'is_yeasty';

    const STYLISTIC_ACCURACY = 'stylistic_accuracy';
    const INTANGIBLES = 'intangibles';
    const TECHNICAL_MERIT = 'technical_merit';

    const OUTSTANDING = array('label' => OUTSTANDING, 'range' => array('start' => 45, 'end' => 50));
    const EXCELLENT = array('label' => EXCELLENT, 'range' => array('start' => 38, 'end' => 44));
    const VERY_GOOD = array('label' => VERY_GOOD, 'range' => array('start' => 30, 'end' => 37));
    const GOOD = array('label' => GOOD, 'range' => array('start' => 21, 'end' => 29));
    const FAIR = array('label' => FAIR, 'range' => array('start' => 14, 'end' => 20));
    const PROBLEMATIC = array('label' => PROBLEMATIC, 'range' => array('start' => 0, 'end' => 13));
    const CREATED_AT = 't_created_at';


    public $userId;
    public $beerStyleId;
    public $beerName;

    public $id;
    public $title;

    public $aromaComment;
    public $appearanceComment;
    public $flavorComment;
    public $mouthfeelComment;
    public $overallComment;
    public $bottleInspectionComment;


    public $aromaScore;
    public $appearanceScore;
    public $flavorScore;
    public $mouthfeelScore;
    public $overallScore;
    public $total;
    public $score;

    public $offFlavors;


    public $stylisticAccuracy;
    public $intangibles;
    public $technicalMerit;

    public $createdAt;
    public $beerStyleTitle;
    public $userName;

    public $isBottleOk;
    public $link;


    public function __construct()
    {
        $this->userId = false;
        $this->beerStyleId = false;
        $this->beerName = false;
        $this->id = false;
        $this->title = false;

        $this->aromaComment = false;
        $this->appearanceComment = false;
        $this->flavorComment = false;
        $this->mouthfeelComment = false;
        $this->overallComment = false;
        $this->bottleInspectionComment = false;

        $this->aromaScore = false;
        $this->appearanceScore = false;
        $this->flavorScore = false;
        $this->mouthfeelScore = false;
        $this->overallScore = false;
        $this->total = false;
        $this->score = false;

        $this->isBottleOk = false;

        $this->offFlavors = new OffFlavor();

        $this->stylisticAccuracy = false;
        $this->intangibles = false;
        $this->technicalMerit = false;
        $this->createdAt = false;
        $this->beerStyleTitle = false;
        $this->userName = false;

        $this->link = "";
    }


    public function initValue(
        $id = false,
        $userId,
        $beerStyleId,
        $beerName,
        $title = '',
        $aromaComment = '',
        $appearanceComment = '',
        $flavorComment = '',
        $mouthfeelComment = '',
        $overallComment = '',
        $bottleInspectionComment = '',
        $aromaScore,
        $appearanceScore,
        $flavorScore,
        $mouthfeelScore,
        $overallScore,
        $total,
        $isAcetaldehyde = 0,
        $isAlcoholic = 0,
        $isAstringent = 0,
        $isDiacetyl = 0,
        $isDms = 0,
        $isEstery = 0,
        $isGrassy = 0,
        $isLightStruck = 0,
        $isMetallic = 0,
        $isMusty = 0,
        $isOxidized = 0,
        $isPhenolic = 0,
        $isSolvent = 0,
        $isAcidic = 0,
        $isSulfur = 0,
        $isVegetal = 0,
        $isBottleOk = 0,
        $isYeasty = 0,
        $stylisticAccuracy = 1,
        $intangibles = 1,
        $technicalMerit = 1
    ) {
        $this->userId = $userId;
        $this->beerStyleId = $beerStyleId;
        $this->beerName = $beerName;
        $this->id = ($id) ? $id : false;
        $this->title = $title;

        $this->aromaComment = $aromaComment;
        $this->appearanceComment = $appearanceComment;
        $this->flavorComment = $flavorComment;
        $this->mouthfeelComment = $mouthfeelComment;
        $this->overallComment = $overallComment;
        $this->bottleInspectionComment = $bottleInspectionComment;

        $this->aromaScore = $aromaScore;
        $this->appearanceScore = $appearanceScore;
        $this->flavorScore = $flavorScore;
        $this->mouthfeelScore = $mouthfeelScore;
        $this->overallScore = $overallScore;
        $this->total = $total;

        $this->offFlavors->isAcetaldehyde = $isAcetaldehyde;
        $this->offFlavors->isAlcoholic = $isAlcoholic;
        $this->offFlavors->isAstringent = $isAstringent;
        $this->offFlavors->isDiacetyl = $isDiacetyl;
        $this->offFlavors->isDms = $isDms;
        $this->offFlavors->isEstery = $isEstery;
        $this->offFlavors->isGrassy = $isGrassy;
        $this->offFlavors->isLightStruck = $isLightStruck;
        $this->offFlavors->isMetallic = $isMetallic;
        $this->offFlavors->isMusty = $isMusty;
        $this->offFlavors->isOxidized = $isOxidized;
        $this->offFlavors->isPhenolic = $isPhenolic;
        $this->offFlavors->isSolvent = $isSolvent;
        $this->offFlavors->isAcidic = $isAcidic;
        $this->offFlavors->isSulfur = $isSulfur;
        $this->offFlavors->isVegetal = $isVegetal;
        $this->isBottleOk = $isBottleOk;
        $this->offFlavors->isYeasty = $isYeasty;

        $this->stylisticAccuracy = $stylisticAccuracy;
        $this->intangibles = $intangibles;
        $this->technicalMerit = $technicalMerit;
    }

    public function __initFromDbObject($o)
    {
        $this->id                = (int)$o[self::ID];
        $this->title             = $o[self::TITLE];
        $this->userId            = (int)$o[self::USER_ID];
        $this->beerStyleId       = (int)$o[self::BEER_STYLE_ID];
        $this->beerName          = $o[self::BEER_NAME];

        $this->aromaComment      = $o[self::AROMA_COMMENT];
        $this->appearanceComment = $o[self::APPEARANCE_COMMENT];
        $this->flavorComment     = $o[self::APPEARANCE_COMMENT];
        $this->mouthfeelComment  = $o[self::MOUTHFEEL_COMMENT];
        $this->overallComment    = $o[self::OVERALL_COMMENT];
        $this->bottleInspectionComment    = $o[self::BOTTLE_INSPECTION_COMMENT];


        $this->aromaScore        = (float)$o[self::AROMA_SCORE];
        $this->appearanceScore   = (float)$o[self::APPEARANCE_SCORE];
        $this->flavorScore       = (float)$o[self::FLAVOR_SCORE];
        $this->mouthfeelScore    = (float)$o[self::MOUTHFEEL_SCORE];
        $this->overallScore      = (float)$o[self::OVERALL_SCORE];

        $this->total             = (float)$o[self::TOTAL];
        $this->calculateScore();

        $this->offFlavors->isAcetaldehyde    = (int)$o[self::IS_ACETALDEHYDE];
        $this->offFlavors->isAlcoholic       = (int)$o[self::IS_ALCOHOLIC];
        $this->offFlavors->isAstringent      = (int)$o[self::IS_ASTRINGENT];
        $this->offFlavors->isDiacetyl        = (int)$o[self::IS_DIACETYL];
        $this->offFlavors->isDms             = (int)$o[self::IS_DMS];
        $this->offFlavors->isEstery          = (int)$o[self::IS_ESTERY];
        $this->offFlavors->isGrassy          = (int)$o[self::IS_GRASSY];
        $this->offFlavors->isLightStruck     = (int)$o[self::IS_LIGHT_STRUCK];
        $this->offFlavors->isMetallic        = (int)$o[self::IS_METALLIC];
        $this->offFlavors->isMusty           = (int)$o[self::IS_MUSTY];
        $this->offFlavors->isOxidized        = (int)$o[self::IS_OXIDIZED];
        $this->offFlavors->isPhenolic        = (int)$o[self::IS_PHENOLIC];
        $this->offFlavors->isSolvent         = (int)$o[self::IS_SOLVENT];
        $this->offFlavors->isAcidic          = (int)$o[self::IS_ACIDIC];
        $this->offFlavors->isSulfur          = (int)$o[self::IS_SULFUR];
        $this->offFlavors->isVegetal         = (int)$o[self::IS_VEGETAL];
        $this->isBottleOk        = (int)$o[self::IS_BOTTLE_OK];
        $this->offFlavors->isYeasty          = (int)$o[self::IS_YEASTY];

        $this->stylisticAccuracy = (int)$o[self::STYLISTIC_ACCURACY];
        $this->intangibles       = (int)$o[self::INTANGIBLES];
        $this->technicalMerit    = (int)$o[self::TECHNICAL_MERIT];
        $this->createdAt         = $o[self::CREATED_AT];

        $this->userName          = $o[User::FIRST_NAME] . " " . $o[User::LAST_NAME];
        $this->beerStyleTitle    = $o[BeerStyle::TITLE];
        $this->link              = str_replace("#id#", $this->id, PAGE_TASTING);
    }

    private function calculateScore()
    {
        switch (true) {
            case in_array($this->total, range(self::OUTSTANDING['range']['start'], self::OUTSTANDING['range']['end'])):
                $this->score = array(
                    "score" => $this->total,
                    "label" => self::OUTSTANDING['label']
                );
                break;
            case in_array($this->total, range(self::EXCELLENT['range']['start'], self::EXCELLENT['range']['end'])):
                $this->score = array(
                    "score" => $this->total,
                    "label" => self::EXCELLENT['label']
                );
                break;
            case in_array($this->total, range(self::VERY_GOOD['range']['start'], self::VERY_GOOD['range']['end'])):
                $this->score = array(
                    "score" => $this->total,
                    "label" => self::VERY_GOOD['label']
                );
                break;
            case in_array($this->total, range(self::GOOD['range']['start'], self::GOOD['range']['end'])):
                $this->score = array(
                    "score" => $this->total,
                    "label" => self::GOOD['label']
                );
                break;
            case in_array($this->total, range(self::FAIR['range']['start'], self::FAIR['range']['end'])):
                $this->score = array(
                    "score" => $this->total,
                    "label" => self::FAIR['label']
                );
                break;
            case in_array($this->total, range(self::PROBLEMATIC['range']['start'], self::PROBLEMATIC['range']['end'])):
            default:
                $this->score = array(
                    "score" => $this->total,
                    "label" => self::PROBLEMATIC['label']
                );
        }
    }

    //Devrait être calculé et afficher en temps réel au front
    public static function calculateTotal($arS, $appS, $flS, $mthfS, $ovS)
    {
        return $arS + $appS + $flS + $mthfS + $ovS;
    }

    public static function clearComments($comment)
    {
        return filter_var($comment, FILTER_SANITIZE_STRING);
    }

    public static function getFloat($value)
    {
        $result = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        return floatval($result);
    }

    public function save()
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = 'INSERT INTO `tasting`(
                    `title`,
                    `bs_id`,
                    `beer_name`,
                    `u_id`,
                    `aroma_comment`,
                    `aroma_score`,
                    `appearance_comment`,
                    `appearance_score`,
                    `flavor_comment`,
                    `flavor_score`,
                    `mouthfeel_comment`,
                    `mouthfeel_score`,
                    `overall_comment`,
                    `bottle_inspection_comment`,
                    `overall_score`,
                    `total`,
                    `is_acetaldehyde`,
                    `is_alcoholic`,
                    `is_astringent`,
                    `is_diacetyl`,
                    `is_dms`,
                    `is_estery`,
                    `is_grassy`,
                    `is_light_struck`,
                    `is_metallic`,
                    `is_musty`,
                    `is_oxidized`,
                    `is_phenolic`,
                    `is_solvent`,
                    `is_acidic`,
                    `is_sulfur`,
                    `is_vegetal`,
                    `is_bottle_ok`,
                    `is_yeasty`,
                    `stylistic_accuracy`,
                    `intangibles`,
                    `technical_merit`
                )VALUES (
                    \'' . mysqli_real_escape_string($dbInstance, $this->title) . '\',
                    ' . (int)$this->beerStyleId . ',
                    \'' . mysqli_real_escape_string($dbInstance, $this->beerName) . '\',
                    ' . (int) $this->userId . ',
                    \'' . mysqli_real_escape_string($dbInstance, $this->aromaComment) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->aromaScore) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->appearanceComment) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->appearanceScore) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->flavorComment) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->flavorScore) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->mouthfeelComment) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->mouthfeelScore) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->overallComment) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->bottleInspectionComment) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->overallScore) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->total) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isAcetaldehyde) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isAlcoholic) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isAstringent) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isDiacetyl) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isDms) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isEstery) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isGrassy) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isLightStruck) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isMetallic) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isMusty) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isOxidized) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isPhenolic) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isSolvent) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isAcidic) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isSulfur) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isVegetal) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->isBottleOk) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->offFlavors->isYeasty) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->stylisticAccuracy) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->intangibles) . '\',
                    \'' . mysqli_real_escape_string($dbInstance, $this->technicalMerit) . '\'
                )';
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {
            return true;
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public static function getUserTastings($userId, $offset = false, $limit = false)
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $userId = ($userId) ? (int)$userId : Session::getConnectedUserId();
        $sql = "SELECT * FROM tasting t join user u on t.u_id = u.user_id join beer_style b on t.bs_id = b.beer_style_id where u.user_id = " . $userId . " ORDER BY t.t_created_at DESC";
        if ($limit) {
            $sql .= ' LIMIT ' . $offset . ', ' . $limit;
        }
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {
            $tastings = [];
            while ($row = mysqli_fetch_assoc($result)) {

                $tasting = new Tasting();
                $tasting->__initFromDbObject($row);
                array_push($tastings, $tasting);
            }
            return $tastings;
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public static function getAllTastings($offset = false, $limit = false, $filter = false)
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();

        $offset = ($offset) ? $offset : 0;
        $sql = "SELECT * FROM tasting t join user u on t.u_id = u.user_id join beer_style b on t.bs_id = b.beer_style_id";
        if (!empty($filter)) {
            switch ($filter) {
                case 'oldest':
                    $sql .=  ' ORDER BY t.t_created_at ASC';
                    break;
                case 'best-score':
                    $sql .=  ' ORDER BY t.total DESC';
                    break;
                case 'lowest-score':
                    $sql .=  ' ORDER BY t.total ASC';
                    break;
                case 'newest':
                default:
                    $sql .=  ' ORDER BY t.t_created_at DESC';
            }
        } else {
            $sql .=  ' ORDER BY t.t_created_at DESC';
        }
        if ($limit) {
            $sql .= ' LIMIT ' . $offset . ', ' . $limit;
        }
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {

            $tastings = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $tasting = new Tasting();
                $tasting->__initFromDbObject($row);
                array_push($tastings, $tasting);
            }
            return $tastings;
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public static function getTastingById($id)
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = "SELECT * FROM tasting t join user u on t.u_id = u.user_id join beer_style b on t.bs_id = b.beer_style_id WHERE t.tasting_id = " . $id . "  ORDER BY t.t_created_at DESC";
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $tasting = new Tasting();
            $tasting->__initFromDbObject($row);
            return $tasting;
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public static function count($user = false)
    {
        $res = false;

        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = 'SELECT count(tasting_id) AS total FROM `tasting`';

        if ($user) {
            $sql .= " WHERE `u_id`=" . Session::getConnectedUserId();
        }

        $result = mysqli_query($dbInstance, $sql) or die(mysqli_error($dbInstance));
        if ($result) {
            $tastingsCount = mysqli_fetch_array($result);
            $total = $tastingsCount['total'];
            return $total;
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public static function deleteTasting($tastingId)
    {
        $res = false;

        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = "DELETE FROM tasting WHERE tasting_id= " . $tastingId . " AND u_id= " . Session::getConnectedUserId();
        $result = mysqli_query($dbInstance, $sql) or die(mysqli_error($dbInstance));
        if ($result) {
            $res = true;
        }
        return $res;
    }


    public static function deleteUserTasting()
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = "DELETE FROM tasting WHERE u_id= " . Session::getConnectedUserId();
        $result = mysqli_query($dbInstance, $sql) or die(mysqli_error($dbInstance));
        if ($result) {
            $res = true;
        }
        return $res;
    }

    public static function getLastUserTasting()
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = "SELECT * FROM tasting t join user u on t.u_id = u.user_id join beer_style b on t.bs_id = b.beer_style_id WHERE t.u_id= " . Session::getConnectedUserId() . " ORDER BY " . Tasting::ID . " DESC LIMIT 1";
        $result = mysqli_query($dbInstance, $sql) or die(mysqli_error($dbInstance));
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $tasting = new Tasting();
            $tasting->__initFromDbObject($row);
            return $tasting;
        }
        return $res;
    }
}