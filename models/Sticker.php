<?php

namespace app\models;

use yii\db\ActiveRecord;

class Sticker extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sticker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'datename'], 'required'], // A kötelező mezők
            [['date', 'datename'], 'string', 'max' => 255], // A mezők maximális hossza
        ];
    }
}
