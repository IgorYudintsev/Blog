<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booba".
 *
 * @property int $id
 * @property int $nomber
 * @property string $myname
 * @property string $username
 * @property string $profession
 */
class Booba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomber', 'myname', 'username', 'profession'], 'required'],
            [['nomber'], 'integer'],
            [['myname', 'username', 'profession'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomber' => 'Nomber',
            'myname' => 'Myname',
            'username' => 'Username',
            'profession' => 'Profession',
        ];
    }
}
