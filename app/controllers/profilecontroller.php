<?php

class ProfileController extends BaseController implements Controller
{
    const viewDirectory = "profile/";

    public function __construct()
    {
        if (!Session::getConnectedUser()) {
            header("Location:" . PAGE_SIGNIN);
        }
    }



    public function viewProfile()
    {
        $this->breadCrumbs[dashboard] = PAGE_DASHBOARD;
        $this->breadCrumbs[account] = "";
        $content = false;
        $this->h1 = "";
        $this->description = "";
        $this->title = account . " | TasteMyBeer";

        $view = "index.phtml";

        $content = App::get_content(
            self::viewDirectory . $view,
            array()
        );
        return $content;
    }

    public function deleteAccount()
    {
        $this->useLayout = false;
        if (User::delete()) {
            Session::deleteConnectedUser();
            header("Location:" . PAGE_HOME);
        }
    }

    public function changePassword()
    {
        $this->useLayout = false;
        $errors = array();
        if (!empty($_POST)) {
            $oldPassword = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            if (!isset($_POST['newPassword']) || empty(($_POST['newPassword']))) {
                $errors[] = mandatoryPassword;
            } else if (!preg_match(PATTERN_PASSWORD, $_POST['newPassword'])) {
                $errors[] = incorrectPassword;
            }
            if (empty($errors)) {
                if (User::updatePassword($oldPassword, $newPassword)) {
                    return json_encode(['status' => 'success', 'message' => passwordChangedMessage]);
                } else {
                    $errors[] = incorrectOldPassword;
                    return json_encode(['status' => 'error', 'message' => $errors]);
                }
            }
            return json_encode(['status' => 'error', 'message' => $errors]);
        }
    }

    public function changeUsername()
    {
        $firstName = "";
        $lastName = "";
        $this->useLayout = false;
        $errors = array();

        if (!empty($_POST)) {
            if (!isset($_POST['' . User::FIRST_NAME . '']) || empty($_POST['' . User::FIRST_NAME . ''])) {
                $errors[] = 'Le prénom est obligatoire.';
            } else {
                $firstName = $_POST['' . User::FIRST_NAME . ''];
                if (!User::checkUserName($firstName)) {
                    $errors[] = PATTERN_FIRST_NAME_EXPL;
                }
            }

            if (!isset($_POST['' . User::LAST_NAME . '']) || empty($_POST['' . User::LAST_NAME . ''])) {
                $errors[] = 'Le nom est obligatoire. ';
            } else {
                $lastName = $_POST['' . User::LAST_NAME . ''];
                if (!User::checkUserName($lastName)) {
                    $errors[] = PATTERN_NAME_EXPL;
                }
            }

            if (empty($errors)) {
                if (User::updateUsername($firstName, $lastName)) {
                    $user = User::getUserById(Session::getConnectedUserId());
                    Session::setConnectedUser($user);
                    return json_encode(['status' => 'success', 'message' => "Mise à jour effectuée avec succes."]);
                } else {
                    $errors[] = "Une erreur est survenue lors de la mise à jour. Veuillez réessayer plus tard.";
                    return json_encode(['status' => 'error', 'message' => $errors]);
                }
            }
            return json_encode(['status' => 'error', 'message' => $errors]);
        }
    }


    public function render()
    {
        $content = false;
        $operation = $_GET['operation'];
        switch ($operation) {
            case 'changePassword':
                $content = $this->changePassword();
                break;
            case 'changeUsername':
                $content = $this->changeUsername();
                break;
            case 'deleteAccount':
                $content = $this->deleteAccount();
                break;
            case 'viewProfile':
            default:
                $content = $this->viewProfile();
                break;
        }
        return $content;
    }
}