<?php

namespace app\models;

use yii;
use yii\base\Model;

class Test extends Model {

    public $test1;
    public $test2;
    public $test3;

    public function rules() {
        return [
            [['test1','test2','test3'],'required','message' => 'ว่างทำไมละ']
        ];
    }
    
    public function attributeLabels() {
        return[
            'test1' => 'ทดสอบ1',
            'test2' => 'ทดสอบ2',
            'test3' => 'ทดสอบ3',
        ];
    }

}

?>