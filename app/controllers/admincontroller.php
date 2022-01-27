<?php

class AdminController extends BaseController implements Controller
{

    const viewDirectory = 'admin/';

    public function __construct()
    {
        if (!Session::getConnectedUser() || !Session::getConnectedUser()->isAdmin) {
            header('Location:' . PAGE_SIGNIN);
        }
    }


    public function render()
    {
        $this->breadCrumbs[dashboard] = PAGE_DASHBOARD;
        $this->breadCrumbs[adminArea] = "";

        $success = false;
        $errors = array();

        if (!empty($_POST)) {
            if (isset($_POST["" . BeerStyle::TITLE . ""]) and !empty($_POST["" . BeerStyle::TITLE . ""])) {
                $title = $_POST["" . BeerStyle::TITLE . ""];
            }
            if (isset($_POST["" . BeerStyle::APPEARANCE . ""]) and !empty($_POST["" . BeerStyle::APPEARANCE . ""])) {
                $appearance = $_POST["" . BeerStyle::APPEARANCE . ""];
            }
            if (isset($_POST["" . BeerStyle::AROMA . ""]) and !empty($_POST["" . BeerStyle::AROMA . ""])) {
                $aroma = $_POST["" . BeerStyle::AROMA . ""];
            }
            if (isset($_POST["" . BeerStyle::FLAVOR . ""]) and !empty($_POST["" . BeerStyle::FLAVOR . ""])) {
                $flavor = $_POST["" . BeerStyle::FLAVOR . ""];
            }
            if (isset($_POST["" . BeerStyle::BODY . ""]) and !empty($_POST["" . BeerStyle::BODY . ""])) {
                $body = $_POST["" . BeerStyle::BODY . ""];
            }
            if (isset($_POST["" . BeerStyle::STORY . ""]) and !empty($_POST["" . BeerStyle::STORY . ""])) {
                $story = $_POST["" . BeerStyle::STORY . ""];
            }
            if (isset($_POST["" . BeerStyle::COMMENTS . ""]) and !empty($_POST["" . BeerStyle::COMMENTS . ""])) {
                $comments = $_POST["" . BeerStyle::COMMENTS . ""];
            }
            if (isset($_POST["" . BeerStyle::INGREDIENTS . ""]) and !empty($_POST["" . BeerStyle::INGREDIENTS . ""])) {
                $ingredients = $_POST["" . BeerStyle::INGREDIENTS . ""];
            }
            if (isset($_POST["" . BeerStyle::STYLES_COMPARISON . ""]) and !empty($_POST["" . BeerStyle::STYLES_COMPARISON . ""])) {
                $stylesComparison = $_POST["" . BeerStyle::STYLES_COMPARISON . ""];
            }
            if (isset($_POST["" . BeerStyle::COMMERCIAL_EXAMPLES . ""]) and !empty($_POST["" . BeerStyle::COMMERCIAL_EXAMPLES . ""])) {
                $commercialExamples = $_POST["" . BeerStyle::COMMERCIAL_EXAMPLES . ""];
            }
            $beerStyle = new BeerStyle();
            $beerStyle->initValue($title, $aroma, $appearance, $flavor, $body, $comments, $story, $ingredients, $stylesComparison, $commercialExamples);
            if ($beerStyle->save()) {
                $success = beerStyleSaveMessage;
            }
        }
        $view = 'index.phtml';
        $this->h1 = "";
        $this->description = "";
        $this->title = adminArea . " | TasteMyBeer";

        $content = App::get_content(
            self::viewDirectory . $view,
            array(
                "success" => $success
            )
        );

        return $content;
    }
}