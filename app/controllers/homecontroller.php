<?php

class HomeController extends BaseController implements Controller
{
    const viewDirectory = "home/";

    public function __construct()
    {
        if (Session::getConnectedUser()) {
            header("Location:" . PAGE_DASHBOARD);
        }
    }

    public function render()
    {
        $this->breadCrumbs[""] = "";
        $content = false;
        $this->h1 = "";
        $this->description = "";
        $this->title = home . " | TasteMyBeer";

        $view = "index.phtml";

        $content = App::get_content(
            self::viewDirectory . $view,
            array()
        );
        return $content;
    }
}