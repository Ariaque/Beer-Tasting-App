<?php

class LoginController extends BaseController implements Controller
{

    const viewDirectory = 'login/';

    public function __construct()
    {
        if (Session::getConnectedUser()) {
            header('Location:' . PAGE_DASHBOARD);
        }
    }

    public function signIn()
    {
        if (!empty($_POST)) {
            /*
            if (SITE_URL == URL_PROD || SITE_URL == URL_DEV) {
                if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                    $response = $_POST['g-recaptcha-response'];
                    if (Captcha::isCaptchaOk($response)) {
                        return $this->signUpAjaxProcessing();
                    }
                } else {
                    die("error captcha");
                }
            }
            */
            return $this->signInAjaxProcessing();
        }
        $view = 'signin.phtml';
        $this->h1 = "";
        $this->description = "";
        $this->title = signIn . " | TasteMyBeer";

        $content = App::get_content(
            self::viewDirectory . $view,
            array()
        );
        return $content;
    }

    public function signInAjaxProcessing()
    {
        $this->useLayout = false;
        //email validation
        if (!isset($_POST['email']) or empty(trim($_POST['email']))) {
            $errors[] = 'L\'email est obligatoire.';
        } else if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email saisi n\'est pas correct.';
        }

        //password validation
        if (!isset($_POST['password']) or empty(trim($_POST['password']))) {
            $errors[] = 'Le mot de passe est obligatoire.';
        }

        if (empty($errors)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = false;
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            //check if user exists
            $user = User::logIn($email, $password);
            if ($user) {
                //if the user exists, create the session variable and do the redirection
                Session::setConnectedUser($user);
                return json_encode(["status" => "success"]);
            } else {
                $errors[] = "Les identifiants fournis sont incorrects.";
            }
        }
        return json_encode(["status" => "error", "message" => $errors]);
    }

    public function signUpAjaxProcessing()
    {
        $this->useLayout = false;
        //name validation
        if (!isset($_POST['firstName'])) {
            $errors[] = 'Le prénom est obligatoire. ';
        } else if (!User::checkUserName($_POST['firstName'])) {
            $errors[] = PATTERN_FIRST_NAME_EXPL;
        }

        if (!isset($_POST['name'])) {
            $errors[] = 'Le nom est obligatoire. ';
        } else if (!User::checkUserName($_POST['name'])) {
            $errors[] = PATTERN_NAME_EXPL;
        }

        //email validation
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errors[] = 'L\'email est obligatoire. ';
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email saisi n\'est pas correct.';
        }

        //password validation
        if (!isset($_POST['password']) || empty(($_POST['password']))) {
            $errors[] = "Le mot de passe est obligatoire";
        } else if (!preg_match(PATTERN_PASSWORD, $_POST['password'])) {
            $errors[] = "Le mot de passe n'est pas correct. Les caractères spéciaux autorisés sont : ! % & @ # $ ^ * ? _";
        }
        if (empty($errors)) {
            $email = $_POST['email'];
            //check if user already exists
            if (!User::isUserExists($email)) {
                //if not saving the user in the database
                $firstName = $_POST['firstName'];
                $lastName = $_POST['name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $user = new User();
                $user->initValue(false, $firstName, $lastName, $email, $password);
                if ($user->save()) {
                    //$subject = "Confirmation";
                    $success = "Votre compte utilisateur a été créé. Vous pouvez vous connecter ";

                    //Mailer::sendMail($email, $success, $subject);
                    return json_encode(['status' => 'success', 'message' => $success]);
                }
                $errors[] = "Une erreur s'est produite lors de la création du compte";
            } else {
                $errors[] = 'Cet email est déjà associé à un compte.';
            }
        }
        return json_encode(['status' => 'error', 'message' => $errors]);
    }

    public function signUp()
    {
        if (!empty($_POST)) {
            return $this->signUpAjaxProcessing();
        }
        $view = 'signup.phtml';
        $this->h1 = "";
        $this->description = "";
        $this->title = signUp . " | TasteMyBeer";
        $content = App::get_content(
            self::viewDirectory . $view,
            array()
        );
        return $content;
    }

    public function logOut()
    {
        Session::deleteConnectedUser();
        header('location:' . PAGE_HOME);
        die();
    }

    public function render()
    {
        $this->breadCrumbs[""] = "";
        $content = false;
        $operation = $_GET['operation'];
        switch ($operation) {
            case 'signUp':
                $content = $this->signUp();
                break;
            case 'logOut':
                $content = $this->logOut();
                break;
            case 'signIn':
            default:
                $content = $this->signIn();
                break;
        }
        return $content;
    }
}