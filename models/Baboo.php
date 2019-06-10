<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "baboo".
 *
 * @property int $id
 * @property string $myname
 * @property string $username
 * @property string $profession
 */
class Baboo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'baboo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['myname', 'username', 'profession'], 'required'],
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
            'myname' => 'Myname',
            'username' => 'Username',
            'profession' => 'Profession',
        ];
    }
}
