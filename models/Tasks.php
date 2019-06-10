<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $tasks
 * @property string $deadLine
 * @property string $created_at
 * @property int $deleted
 * @property int $user_id
 *
 * @property Users $user
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tasks', 'deadLine', 'created_at', 'deleted', 'user_id'], 'required'],
            [['deleted', 'user_id'], 'integer'],
            [['tasks', 'deadLine', 'created_at'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tasks' => 'Tasks',
            'deadLine' => 'Dead Line',
            'created_at' => 'Created At',
            'deleted' => 'Deleted',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
