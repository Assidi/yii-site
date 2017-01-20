<?php
    /**
	 * Возвращается название месяца по его номеру 
	 * @param номер месяца
	 * @return название месяца
	 */
    class AssidiHelper {
        static function getMonth($month) {
            $array = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
            // индексы массива начинаются с нуля
            $n = $month - 1;    
            $result = $array[$n];
            return $result;
        }
        /**
	 * Заменяет переводы строки на <br> 
	 * @param текст
	 * @return текст с переводами строк для вывода на экран
	 */
        static function insertBreakes($text) {
            $newtext = preg_replace('/[\r\n]+/', "<br />", $text);
            return $newtext;
        } 
        
        /**
	 * форматирует дату из системной 
	 * @param системная дата
	 * @return нормальная дата и время для вывода на экран
	 */
    static function dateFormat($date) {
        $datetime = date("d.m.Y H:i", $date);
        return $datetime;
        
    }
  }
    
    
?>