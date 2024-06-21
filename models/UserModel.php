<?php
require_once "./DBConnection.php";
require_once "entities/User.php";

class UserModel extends Model
{
    public function __construct(DBConnection $dbcon)
    {
        parent::__construct($dbcon);
        session_start();
        session_regenerate_id();
    }

    public function is_admin()
    {
        return $_SESSION['user']->IsAdmin;
    }

    public function is_auth()
    {
        return isset($_SESSION['user']);
    }

    public function get_current_user()
    {
        return $_SESSION['user'];
    }

    public function authorization(User $user)
    {
        $_SESSION["user"] = $user;
    }

    public function deauthorize()
    {
        $_SESSION["user"] = null;
        session_unset();
    }

    public function GetAllUsers(bool $ignore_password = true, bool $ignore_admins = true) : array
    {
        $user_rows = $this->dbcon->readAll(self::USERS_TABLE);
        $users = [];
        foreach($user_rows as $user_row)
        {
            $password = $ignore_password ? "" : $user_row['password']; 
            
            if ($ignore_admins && $user_row['is_admin'])
                continue;

            $users[] = new User($user_row['id'], $user_row['login'], $password, $user_row['is_admin']);
        }
        return $users;
    }

    public function GetUserByLogin(string $login): ?User
    {
        $userRow = $this->dbcon->read("*", self::USERS_TABLE, "Login = '$login'");

        if (empty($userRow)) {
            return null;
        } else {
            return new User($userRow[0]['id'], $userRow[0]['login'], $userRow[0]['password'], $userRow[0]['is_admin']);
        }
    }

    public function CreateUser(string $login, string $password, bool $is_admin = false) : bool
    {
        return $this->dbcon->insert(self::USERS_TABLE, "`login`, `password`, `is_admin`", "'$login', '$password', ".($is_admin ? 1 : 0));
    }
}