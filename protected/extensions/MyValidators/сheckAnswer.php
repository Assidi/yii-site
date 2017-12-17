<?php
class сheckAnswer extends CValidator {
    // класс для проверки моей капчи, ответов на вопросы из базы
    /**
     * Метод проверяет правильность ответа на вопрс
     * правильный ответ записан в переменной сессии
     * @param CModel $object модель валидации
     * @param string $attribute атрибут, который валидируется в данный момент
     */
    protected function validateAttribute($object,$attribute){
        $answer=$object->$attribute;
        $answer =  mb_strtolower(trim($answer), 'UTF-8');        
        $answerRight = $_SESSION['answer'];
        if ($answer!=$answerRight && (Yii::app()->user->isGuest)) 
            $this->addError($object, $attribute, 'Дан неверный ответ');

    }

}
