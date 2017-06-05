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
	 * @param $date системная дата
	 * @return нормальная дата и время для вывода на экран
	 */
    static function dateFormat($date) {
        $datetime = date("d.m.Y H:i", $date);
        return $datetime;
    }
    
    /**
	 * Определяет размер фика в килобайтах по размеру в байтах, для вывода
	 * @param $date системная дата
	 * @return нормальная дата и время для вывода на экран
	 */
     
     static function getSize($size) {        
        $size1 = $size/1000;
        $size1 = floor($size1);
        if ($size1==0) $size1=1;
        return $size1."К";
     }
	
	/**
	 * Проверяет, содержит ли параметр непустой массив
	 * @param string $param
	 * @return array
	 */
	static function getArrayFromRequest($param) {
		$requestParam = Yii::app()->request->getParam($param);
		if (!$requestParam || !is_array($requestParam) || empty($requestParam[0])) {
			return array();
		}
		return $requestParam;
	}
    /**
	 * Форматирует дату написания текста
     * принимает строку типа 2000-09-15
     * возвращает 15 сентября 2000 года
	 * @param string $date
	 * @return string
	 */
    static function myDate($date) {
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);
        if ($day<10) {
            $day = substr($day, 1, 1);
        }
        $array = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
        $n = $month - 1;    
		$monthResult = $array[$n];
        $result = $day.' '.$monthResult.' '.$year.' года';
        return $result;
    }
    
 }
    
    
    
?>