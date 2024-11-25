<?php
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // Валідація для поля 'name'
            [['name'], 'required', 'message' => 'Ім’я не може бути порожнім.'],
            [['name'], 'string', 'max' => 255, 'message' => 'Ім’я повинно бути не більше 255 символів.'],

            // Валідація для поля 'email'
            [['email'], 'required', 'message' => 'Адреса електронної пошти не може бути порожньою.'],
            [['email'], 'email', 'message' => 'Невірний формат електронної пошти.'],
            [['email'], 'string', 'max' => 255, 'message' => 'Адреса електронної пошти повинна бути не більше 255 символів.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ім’я',
            'email' => 'Адреса електронної пошти',
        ];
    }
}
?>