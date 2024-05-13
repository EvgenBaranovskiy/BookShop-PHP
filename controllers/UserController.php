<?php
require_once "Controller.php";

class UserController extends Controller
{
    private $_userModel;

    public function __construct(UserModel $userModel)
    {
        $this->_userModel = $userModel;
    }

    public function index()
    {
        $this->login();
    }

    public function logout()
    {
        $this->_userModel->deauthorize();
        header("Location: /");
    }

    public function login()
    {
        $is_auth = $this->_userModel->is_auth();
        if ($is_auth) {
            header("Location: /");
        } else {
            if (isset($_POST['log-btn'])) {
                if (empty($_POST['login']) || empty($_POST['password'])) {
                    $error = "Not all fields were filled in!";
                } else {
                    $user = $this->_userModel->GetUserByLogin($_POST['login']);

                    if (is_null($user) || $user->Password != $_POST['password'])
                    {
                        $error = "Wrong login or password!";
                    }
                    else 
                    {
                        $this->_userModel->authorization($user);
                        header("Location: /");
                    }
                }
            }
            require $this->view_path . "login_template.php";
        }
    }

    public function registration()
    {
        $is_auth = $this->_userModel->is_auth();
        if ($is_auth) {
            header("Location: /");
        } else {

            if (isset($_POST['reg-btn'])) {
                if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['repassword'])) {
                    $error = "Not all fields were filled in!";
                } else if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['login'])) {
                    $error = "Login should contain only letters and numbers!";
                } else if (strlen($_POST['login']) > 30) {
                    $error = "Login should be no more than 30 characters long!";
                } else if (strlen($_POST['password']) < 6) {
                    $error = "Password should be at least 6 characters long!";
                } else if (strlen($_POST['password']) > 30) {
                    $error = "Password should be no more than 30 characters long!";
                } else if ($_POST['password'] != $_POST['repassword']) {
                    $error = "The passwords don't match!";
                } else if (!is_null($this->_userModel->GetUserByLogin($_POST['login']))) {
                    $error = "This user already exists!";
                } else if ($this->_userModel->CreateUser($_POST['login'], $_POST['password'])){
                    $msg = "Registration has been successful!";
                }
            }

            require $this->view_path . "registration_template.php";
        }
    }
}
