<?php
    class AssidiHelper {
        static function getMonth($month) {
            $array = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
            // индексы массива начинаются с нуля
            $n = $month - 1;    
            $result = $array[$n];
            return $result;
        }
    }
?>