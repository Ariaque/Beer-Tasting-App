<?php

class ErrorController extends BaseController implements Controller
{
    const viewDirectory = "error/";

    public function __construct()
    {
    }

    public function render()
    {
        $this->breadCrumbs[""] = "";
        $content = false;
        $this->h1 = "";
        $this->description = "";
        $this->title = "404 | TasteMyBeer";

        $view = "page404.phtml";

        $content = App::get_content(
            self::viewDirectory . $view,
            array()
        );
        return $content;
    }
}