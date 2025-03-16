<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property int $id
 * @property string $teljes_nev
 * @property string $szul_hely
 * @property string $szul_ido
 * @property string $neptun
 * @property string $diakigazolvany
 * @property int $evfolyam
 * @property string $kepzes_szint
 * @property string $kepzes_munkarend
 * @property string $szak
 * @property string $matrica
 * @property string $email
 * @property string $kiadas_idopontja
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teljes_nev', 'szul_hely', 'szul_ido', 'neptun', 'diakigazolvany', 'evfolyam', 'kepzes_szint', 'kepzes_munkarend', 'szak', 'matrica', 'email'], 'required'],
            [['szul_ido', 'kiadas_idopontja'], 'safe'],
            [['evfolyam'], 'integer'],
            [['teljes_nev', 'szul_hely', 'neptun', 'diakigazolvany', 'kepzes_szint', 'kepzes_munkarend', 'szak', 'matrica', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teljes_nev' => 'Teljes Nev',
            'szul_hely' => 'Szul Hely',
            'szul_ido' => 'Szul Ido',
            'neptun' => 'Neptun',
            'diakigazolvany' => 'Diakigazolvany',
            'evfolyam' => 'Evfolyam',
            'kepzes_szint' => 'Kepzes Szint',
            'kepzes_munkarend' => 'Kepzes Munkarend',
            'szak' => 'Szak',
            'matrica' => 'Matrica',
            'email' => 'Email',
            'kiadas_idopontja' => 'Kiadas Idopontja',
        ];
    }
}
