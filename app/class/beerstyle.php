<?php

class BeerStyle
{
    const ID = 'beer_style_id';
    const TITLE = 'style';
    const AROMA = 'aroma';
    const APPEARANCE = 'appearance';
    const FLAVOR = 'flavor';
    const BODY = 'body';
    const COMMENTS = 'comments';
    const STORY = 'story';
    const INGREDIENTS = 'ingredients';
    const STYLES_COMPARISON = 'styles_comparison';
    const COMMERCIAL_EXAMPLES = 'commercial_examples';


    public $id;
    public $title;
    public $aroma;
    public $appearance;
    public $flavor;
    public $body;
    public $comments;
    public $story;
    public $ingredients;
    public $stylesComparison;
    public $commercialExamples;


    public function __construct()
    {
    }

    public function initValue($title, $aroma, $appearance, $flavor, $body, $comments, $story, $ingredients, $stylesComparison, $commercialExamples)
    {
        $this->title = $title;
        $this->aroma = $aroma;
        $this->appearance = $appearance;
        $this->flavor = $flavor;
        $this->body = $body;
        $this->comments = $comments;
        $this->story = $story;
        $this->ingredients = $ingredients;
        $this->stylesComparison = $stylesComparison;
        $this->commercialExamples = $commercialExamples;
    }

    public function save()
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = 'INSERT INTO beer_style (style, aroma, appearance, flavor, body, comments, story, ingredients, styles_comparison, commercial_examples)
                    VALUES (
                        \'' . mysqli_real_escape_string($dbInstance, $this->title) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->aroma) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->appearance) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->flavor) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->body) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->comments) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->story) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->ingredients) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->stylesComparison) . '\', 
                        \'' . mysqli_real_escape_string($dbInstance, $this->commercialExamples) . '\'
                    )';
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {
            return true;
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public function __initFromDbObject($o)
    {
        $this->id                 = (int)$o[self::ID];
        $this->title              = $o[self::TITLE];
        $this->aroma              = $o[self::AROMA];
        $this->appearance         = $o[self::APPEARANCE];
        $this->flavor             = $o[self::FLAVOR];
        $this->body               = $o[self::BODY];
        $this->comments           = $o[self::COMMENTS];
        $this->story              = $o[self::STORY];
        $this->ingredients        = $o[self::INGREDIENTS];
        $this->stylesComparison   = $o[self::STYLES_COMPARISON];
        $this->commercialExamples = $o[self::COMMERCIAL_EXAMPLES];
    }

    public static function getBeerStyles($offset = false, $limit = false)
    {
        $res = array();
        $dbInstance = Db::getInstance()->getDbInstance();
        $offset = ($offset) ? $offset : 0;
        $sql = "SELECT * FROM beer_style";
        if ($limit) {
            $sql .= ' LIMIT ' . $offset . ', ' . $limit;
        }
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $beerStyle = new BeerStyle();
                $beerStyle->__initFromDbObject($row);
                array_push($res, $beerStyle);
            }
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public static function getBeerStyle($id)
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = "SELECT * FROM beer_style where beer_style_id=" . $id;
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $beerStyle = new BeerStyle();
                $beerStyle->__initFromDbObject($row);
                return $beerStyle;
            }
        } else {
            App::logError(mysqli_error($dbInstance) . "\r\n" . $sql);
        }
        return $res;
    }

    public static function count()
    {
        $res = false;

        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = 'SELECT count(beer_style_id) AS total FROM `beer_style`';

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

    public static function delete($id)
    {
        $res = false;
        $dbInstance = Db::getInstance()->getDbInstance();
        $sql = "DELETE FROM beer_style WHERE beer_style_id= " . $id;
        $result = mysqli_query($dbInstance, $sql);
        if ($result) {
            $res = true;
        }
        return $res;
    }
}