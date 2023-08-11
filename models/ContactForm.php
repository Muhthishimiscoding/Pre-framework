<?php
namespace Worth\models;

use MuhthishimisCoding\PreFramework\DbModel;
use MuhthishimisCoding\PreFramework\Application;

class ContactForm extends DbModel
{
    public string $email = '';
    public string $fullname = '';
    public string $subject = '';
    public string $message = '';
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'fullname' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], [self::RULE_MAX, 'max' => 100]],
            'subject' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 50], [self::RULE_MAX, 'max' => 250]],
            'message' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 100], [self::RULE_MAX, 'max' => 2750]]
        ];
    }
    public function tableName(): string
    {
        return 'contact';
    }
    public function col_values(): array
    {
        return [
            'email' => $this->email,
            'fullName' => $this->fullname,
            'subject' => $this->subject,
            'message' => $this->message
        ];
    }
    public function send()
    {
        if ($this->validate()) {
            if ($this->save()) {
                Application::app()->session->putFlash('contact', ['Thanks for Your message it has been successfully delivered to us.We will reply as soon as possible.', true]);
                return true;
            }
        }
        return false;
    }
}