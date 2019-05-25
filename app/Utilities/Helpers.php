<?php


use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;
if (!function_exists('ustrlen')) {
    function ustrlen($text)
    {
        if(function_exists('mb_strlen'))
            return mb_strlen( $text , 'utf-8' );
        return count(preg_split('//u', $text)) - 2;
    }
}
if (!function_exists('short_string')) {
    function short_string($text,$size=13)
    {
        return mb_substr($text,0,$size).(ustrlen($text >$size)?"...":"");
    }
}
if (!function_exists('toJalali')) {
    function toJalali($time, $format = 'Y/m/d H:i:s')
    {
        return unConvertNumber(CalendarUtils::strftime($format, strtotime($time)));
    }
}

if (!function_exists('toGregorian')) {
    function toGregorian($time, $format = 'Y/m/d H:i:s')
    {
        return CalendarUtils::createDatetimeFromFormat($format, convertNumber($time));
    }
}

if (!function_exists('persianTime')) {
    function persianTime($time)
    {
        $today = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
        $yesterday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
        $tomorrow = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
        $time_date = date("Y-m-d", strtotime($time));
        if ($today == $time_date) {
            return 'امروز ' . unConvertNumber(date("H:i", strtotime($time)));
        } elseif ($yesterday == $time_date) {
            return 'دیروز ' . unConvertNumber(date("H:i", strtotime($time)));
        } elseif ($tomorrow == $time_date) {
            return 'فردا ' . unConvertNumber(date("H:i", strtotime($time)));
        } else {
            $date = unConvertNumber(Jalalian::forge($time_date)->format('%y/%m/%d'));
            $date .= ' - ' . unConvertNumber(date("H:i", strtotime($time)));
            return $date;
        }
    }
}

if (!function_exists('persianTimeColor')) {
    function persianTimeColor($time)
    {
        $now = \Carbon\Carbon::now();
        if ($now <= $time) {
            return 'green';
        } else {
            return 'red';
        }
    }
}

if (!function_exists('arabicToPersian')) {
    function arabicToPersian($str)
    {
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', 'ي', 'ك');
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', 'ی', 'ک');
        return str_replace($arabic, $persian, $str);
    }
}

if (!function_exists('convertNumber')) {
    function convertNumber($value)
    {
        $western = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        $eastern = ['۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'];
        return str_replace($eastern, $western, $value);
    }
}

if (!function_exists('unConvertNumber')) {
    function unConvertNumber($value)
    {
        $western = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        $eastern = ['۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'];
        return str_replace($western, $eastern, $value);
    }
}
