<?php
namespace Worth\models;

use MuhthishimisCoding\PreFramework\Model;
use MuhthishimisCoding\PreFramework\Database;
use MuhthishimisCoding\PreFramework\Application;

class LoginForm extends Model
{

    public string $emailOrusername = '';
    public string $password = '';
    public function rules(): array
    {
        return [
            'emailOrusername' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    public function login(): bool
    {
        $stmt = Application::app()->db->select('users', [
            'email' => $this->emailOrusername,
            'username' => $this->emailOrusername,
        ], Database::EQUAL, 0);

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            $this->errors['password'] = 'Password is incorrect.';
            if (password_verify($this->password, $row['user_pass'])) {
                Application::app()->session->putFlash('/', ['Welcome back ' . $row['username'] . '!', true]);
                $_SESSION['uid'] = $row['id'];
                return true;
            }
        } else {

            $this->errors['emailOrusername'] = 'Username or Email doesn\'t exist.';
        }

        // Application::app()->session->putFlash('login',['Email or password is incorrect.',false]);
        return false;
    }
    public function retriveUser()
    {
        if (isset($_SESSION['uid'])) {
            $stmt = Application::app()->db->select('users', [
                'id' => $_SESSION['uid']
            ]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $row;
        }
        return false;
    }
    function retriveUserKey($key)
    {
        return $this->retriveUser()[$key] ?? false;
    }
    function isLogedin(): bool
    {
        return isset($_SESSION['uid']);
    }
    function logout():bool
    {
        $user = Application::user();
        if ($user) {
            unset($_SESSION['uid']);
            return true;
        }
        return false;
    }

}


?>