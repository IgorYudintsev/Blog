<?php

namespace app\models;
use Yii;
use yii\base\Model;


class Car extends Model{
    public $engine;
    public $power;

    /**
     * @param mixed $power
     */
    public function setCar($power,$engine)
    {
        $this->power = $power;
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->power.$this->engine;
    }

    function __construct($engine,$power,array $config = [])
    {
        parent::__construct($config);
        $this->setCar($engine,$power);
    }
}
