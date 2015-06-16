<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jdatetimeToolset
 * 
 * @author mohsen
 * @version  1.0.2
 */
class jDateTimeTools {

    /**
     *
     * @var jDateTime 
     */
    private $jdate;

    function __construct() {
        $this->jdate = new jDateTime(false, true, "ASIA/TEHRAN");
    }

    /**
     * return UNIX time stamp from date
     * @param string string $date jalaly date in this format 1393/01/01
     * @return timestamp
     */
    public function getTimeStamp($date) {
        $arr = $this->getArray($date);
        return $this->jdate->mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]);
    }

    /**
     * get shamsy date from a UNIX timestamp
     * @param timeStamp $timestamp
     * @return string
     */
    public function getShamsyDate($timestamp) {
        return $this->jdate->date("Y/m/d ", $timestamp, false, true);
    }

    /**
     * return shamsy date NOW
     * @return string
     */
    public function Now() {
        $dt2 = new DateTime("now", new DateTimeZone("ASIA/TEHRAN"));       
        return $this->jdate->date("Y/m/d ", $dt2->getTimestamp(), false, true);
    }

    /**
     * Convert unix time stamp to MySQL time stamp
     * @param Unix_Timestamp $timestamp
     * @return timestamp
     */
    public function getMySQL_TimeStamp($timestamp) {
        date_default_timezone_set("ASIA/TEHRAN");
        return date('Y-m-d G:i:s', $timestamp);
    }
    /**
     * Convert MySQL TimeStamp to Unix TimeStamp
     * @param String $mysqltimestamp
     * @return String
     */
    public function getUnixTimeStamp_MySQL($mysqltimestamp){
       $dt3 = new DateTime($mysqltimestamp,new DateTimeZone("ASIA/TEHRAN"));
       return $dt3->getTimestamp();
    }

    /**
     * A function for making time periods readable
     *
     * @author      Aidan Lister <aidan@php.net>
     * @version     2.0.1
     * @link        http://aidanlister.com/2004/04/making-time-periods-readable/
     * @param       int     number of seconds elapsed
     * @param       string  which time periods to display  example 'yMw'
     * @param       bool    whether to show zero time periods
     */
    public function time_duration($seconds, $use = null, $zeros = false) {
        // Define time periods
        $periods = array(
            'years' => 31556926,
            'Months' => 2629743,
            'weeks' => 604800,
            'days' => 86400,
            'hours' => 3600,
            'minutes' => 60,
            'seconds' => 1
        );

        // Break into periods
        $seconds = (float) $seconds;
        $segments = array();
        foreach ($periods as $period => $value) {
            if ($use && strpos($use, $period[0]) === false) {
                continue;
            }
            $count = floor($seconds / $value);
            if ($count == 0 && !$zeros) {
                continue;
            }
            $segments[strtolower($period)] = $count;
            $seconds = $seconds % $value;
        }

        // Build the string
        $string = array();
        foreach ($segments as $key => $value) {
            $segment_name = substr($key, 0, -1);
            $segment = $value . ' ' . $segment_name;
            if ($value != 1) {
                $segment .= 's';
            }
            $string[] = $segment;
        }

        return implode(', ', $string);
    }

    /**
     * create array from shamsy date
     * @param string $sdate
     * @return array
     */
    private function getArray($sdate) {
        $arr = explode("/", $sdate);
        return $arr;
    }
    /**
     * Calculate 
     * +1 years
     * @param String $option See http://www.php.net/manual/en/function.strtotime.php     
     * @param String $dt Shamsy Date
     */
    public function Calculate($option,$dt){
        $timestamp=$this->getTimeStamp($dt);
        $result = strtotime($option,$timestamp);
        if ($result){
            return $this->getShamsyDate($result);
        }
    }
    public function getDay($shamsyDate){
        $ar =  explode("/", $shamsyDate);
        return $ar[2];
    }
    public function getYear($shamsyDate){
        $ar =  explode("/", $shamsyDate);
        return $ar[0];
    }

    public function getMounthName($shamsyDate){
        $ar =  explode("/", $shamsyDate);
        $mName=array(
            1=>"فروردین",
            2=>"اردیبهشت",
            3=>"خرداد",
            4=>"تیر",
            5=>"مرداد",
            6=>"شهریور",
            7=>"مهر",
            8=>"آبان",
            9=>"آذر",
            10=>"دی",
            11=>"بهمن",
            12=>"اسفند"
        );
        return $mName[(int)$ar[1]];
    }

}
