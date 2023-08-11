<?php
namespace Worth\models;

use MuhthishimisCoding\PreFramework\Application;
use MuhthishimisCoding\PreFramework\DbModel;
use MuhthishimisCoding\PreFramework\Session;


class RegisterModel extends DbModel
{
    public array $labels = [
        'password' => 'upper password field'
    ];
    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELETED = 2;
    public string $fullName = '';
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public int $status = 0;
    public function tableName(): string
    {
        return 'users';
    }
    public function register(): bool
    {
        if ($this->save()) {
            Application::app()->session->putFlash('login',['Welcome ' . $this->fullName . ' you have succefully registered with us kindly login to continue.',true]);
            return true;
        }
        return false;
    }

    public function columns(): array
    {
        // $columns = $this->db->getcolumns('users', 1);
        // unset($columns[0], $columns[count($columns)]);
        return [
            'email',
            'fullName',
            'username',
            'status',
            'user_pass'
        ];
    }
    public function col_values(): array
    {

        return array_combine($this->columns(), [
            $this->email,
            $this->fullName,
            $this->username,
            $this->status,
            password_hash($this->password, PASSWORD_DEFAULT)
        ]);
    }

    public function rules(): array
    {
        return [
            'fullName' => [self::RULE_REQUIRED, self::RULE_NOTSPECIAL, [self::RULE_MIN, 'min' => 4]],
            'username' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'table' => 'users', 'column' => 'username']],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'table' => 'users', 'column' => 'email']],
            'password' => [self::RULE_REQUIRED, self::RULE_SPECIAL, self::RULE_LOWERCASE, self::RULE_UPPERCASE, self::RULE_NOSPACE, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

}