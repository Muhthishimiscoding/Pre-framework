<?php
namespace Worth\controllers;

use MuhthishimisCoding\PreFramework\Application;
use MuhthishimisCoding\PreFramework\Request;
use MuhthishimisCoding\PreFramework\Controller;
use Worth\models\LoginForm;
use Worth\models\RegisterModel;

class AuthController extends Controller
{
    public RegisterModel $model;
    public LoginForm $login;
    // public function __construct()
    // {

    // }
    public function register(Request $request)
    {
        $modelRegister = new RegisterModel();
        if (!Application::isLogedin()) {
            if ($request->isPost()) {
                $modelRegister->loadData($request->getBody());

                if ($modelRegister->validate()) {
                    if ($modelRegister->register()) {
                        header('location:/login');
                        exit;
                    }
                }
                $this->render('register', [
                    'model' => $modelRegister
                ]);
            } else if ($request->isGet()) {
                $this->render('register', [
                    'model' => $modelRegister
                ]);
            }
        } else {
            header('location:/');
        }
    }
    public function login(Request $request)
    {
        $modelLogin = new LoginForm();
        if (!Application::isLogedin()) {
            if ($request->isPost()) {
                $modelLogin->loadData($request->getBody());
                if ($modelLogin->validate()) {
                    if ($modelLogin->login()) {
                        header('location:/');
                        exit;
                    }
                }
                $this->render('login', [
                    'model' => $modelLogin
                ]);
            } else if ($request->isGet()) {
                $this->render('login', [
                    'model' => $modelLogin
                ]);
            }
        } else {
            header('location:/');
        }

    }
    public function logout(Request $request)
    {
        $modelLogin = new LoginForm();
        if ($modelLogin->logout()) {
            header('location:login');
        }
    }

    function profile()
    {
        if (Application::isLogedin()) {
            $this->render('profile');
        } else {
            header('location:login');
        }
    }
}