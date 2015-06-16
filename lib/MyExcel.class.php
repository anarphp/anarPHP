<?php

/**
 * Description of MyExcel
 *
 * @author Mohsen
 */
require 'PHPExcel/IOFactory.php';

class MyExcel {

    function __construct() {
        set_time_limit(0);
    }

    /**
     * Export Data from Excel to array
     * @param string $inputFileName
     * @return array
     */
    public function ExportData2007($inputFileName) {

        $objReader = new PHPExcel_Reader_Excel2007();
        $objPHPExcel = $objReader->load($inputFileName);
        return $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
    }

    /**
     * Read Data from Excel file and with map array convert to array of Object
     * map sample :
     * $map = array(
     *  "A" => "name",
     *  "B" => "title",
     *  "C" => "group",
     *  "D" => "stock",
     *  "E" => "price",
     *  "F" => "tags",
     *  "G" => "enable",
     *  "H" => "visible"
     *  );
     * @param string $inputFileName file path
     * @param array $map  map array to create object
     * @param int $skip skip row number start from zero
     * @return \ArrayToObj array of object
     */
    public function ExportData2007asObject($inputFileName, $map,$skip=-1) {
        $Data = $this->ExportData2007($inputFileName);
        $objArray = array();
        $i=0;
        foreach ($Data as $row) {
            if ($i==$skip){
                $i++;
                continue;
            }            
            $tmp = array();
            foreach ($map as $key => $value) {
                $tmp[$value] = $row[$key];               
            }
            $obj = new ArrayToObj($tmp, ArrayToObj::CAMEL);
            $objArray[] = $obj;
            $i++;
        }
        return $objArray;
    }

}
