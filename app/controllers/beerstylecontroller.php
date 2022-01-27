<?php

class BeerStyleController extends BaseController implements Controller
{
    const viewDirectory = "beerstyle/";

    public function __construct()
    {
    }

    public function getAllBeerStyles()
    {
        if ((isset($_GET['mode']))) {
            if (($_GET['mode'] != "visitor")) {
                header("Location:" . PAGE_SIGNIN);
            }
        } else if (!Session::getConnectedUser()) {
            header("Location:" . PAGE_SIGNIN);
        }

        $this->breadCrumbs[dashboard] = PAGE_DASHBOARD;
        $this->breadCrumbs[beerStyles] = "";

        $content = false;
        $this->h1 = "";
        $this->description = "";
        $this->title = beerStyles . " | TasteMyBeer";

        $view = "index.phtml";


        $limit = DEFAULT_PAGINATION;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $offset = ($page - 1) * $limit;

        $beerStylesCount = BeerStyle::count();

        $pages = ceil($beerStylesCount / $limit);

        $beerStyles = BeerStyle::getBeerStyles($offset, $limit);

        $content = App::get_content(
            self::viewDirectory . $view,
            array(
                "beerStyles" => $beerStyles,
                'pages' => $pages,
                'count' => $beerStylesCount,
                'page' => $page
            )
        );
        return $content;
    }

    public function getBeerStyleById($id)
    {
        $this->breadCrumbs[dashboard] = PAGE_DASHBOARD;
        $this->breadCrumbs[beerStyles] = PAGE_BEER_STYLES;

        $this->h1 = "BeerStyle " . $id;
        $this->description = "BeerStyle " . $id;

        $view = "viewBeerStyle.phtml";

        $beerStyle = BeerStyle::getBeerStyle($id);
        $this->title = $beerStyle->title . " | TasteMyBeer";

        $this->breadCrumbs[$beerStyle->title] = "";

        return App::get_content(
            self::viewDirectory . $view,
            array('beerStyle' => $beerStyle)
        );
    }

    public function deleteBeerStyle($id)
    {
        $this->useLayout = false;
        BeerStyle::delete($id) ? header("Location:" . PAGE_BEER_STYLES) : "";
    }

    public function render()
    {
        $content = false;
        $operation = $_GET['operation'];
        switch ($operation) {
            case 'delete':
                $content = $this->deleteBeerStyle($_GET['id']);
                break;
            case 'getAll':
                $content = $this->getAllBeerStyles();
                break;
            case 'getBeerStyle':
            default:
                $content = $this->getBeerStyleById($_GET['id']);
                break;
        }
        return $content;
    }
}