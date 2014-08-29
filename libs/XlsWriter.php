<?php

/**
 * XlsWriter is a php class to generate non formated xls files 
 *
 * @author  Glenn De Backer <glenn at simplicity dot be>
 *
 * @since 1.0
 *
 * @license LGPL 2.1
 */

/**
 * XlsRow
 *
 * Represents a row
 *
 * @package XlsWriter
 */
class XlsRow {

    /**
     * Columns of row
     * @var array
     */
    private $columns = '';

    /**
     * Default constructor
     * */
    public function __construct() {
        $this->columns = array();
    }

    /**
     * Add column to row
     *
     * @param mixed value of column
     */
    public function addColumn($value) {
        array_push($this->columns, $value);
    }

    /**
     * Get numer of columns
     *
     * @return integer number of columns
     */
    public function getNumberOfColumns() {
        return count($this->columns);
    }

    /**
     * Get columns
     * 
     * @return array containing columns
     */
    public function getColumns() {
        return $this->columns;
    }

    /**
     * Clears the columns
     */
    public function clearColumns() {
        unset($this->columns);
        $this->columns = array();
    }

}

/**
 * XlsWorksheet
 * 
 * Represents worksheet
 *
 * @package XlsWriter
 */
class XlsWorksheet {

    /**
     * Name of the worksheet
     * @var string
     */
    private $name = '';

    /**
     * Rows that the worksheet contains
     * @var array
     */
    private $rows;

    /**
     * Default constructor
     *
     * @param string name of worksheet
     */
    public function __construct($name = '') {
        $this->setName($name);
        $this->rows = array();
    }

    /**
     * Set name of worksheet
     * 
     * @param string name of worksheet
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get name of worksheet
     *
     * @return string name of worksheet
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Add row to worksheet
     * 
     * @param XlsRow row
     */
    public function addRow($row) {
        array_push($this->rows, $row);
    }

    /**
     * Get Number of rows
     *
     * @return integer number of rows
     */
    public function getNumberOfRows() {
        return count($this->rows);
    }

    /**
     * Get rows
     * 
     * @return array rows
     */
    public function getRows() {
        return $this->rows;
    }

    /**
     * Clears the rows
     */
    public function clearRows() {
        unset($this->rows);
        $this->rows = array();
    }

}

/**
 *  XlsWriter class
 *
 * @package XlsWriter
 */
class XlsWriter {

    /**
     * Xml schema
     * @var string
     */
    private $xmlSchema;

    /**
     * Worksheets
     * @var array
     */
    private $worksheets;

    /**
     * Default constructor
     * */
    public function __construct() {
        $this->worksheets = array();
    }

    /**
     * Start building document schema
     */
    private function startDocumentSchema() {
        $this->xmlSchema = '<?xml version="1.0" encoding="utf-8" ?>
                 <?mso-application progid="Excel.Sheet"?>
                 <Workbook
                   xmlns="urn:schemas-microsoft-com:office:spreadsheet"
                   xmlns:o="urn:schemas-microsoft-com:office:office"
                   xmlns:x="urn:schemas-microsoft-com:office:excel"
                   xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
                   xmlns:html="http://www.w3.org/TR/REC-html40">
                ';
    }

    /**
     * Create worksheet schema 
     * 
     */
    private function createWorksheetSchema() {
        // retrieve number of worksheets
        $numberOfWorksheets = count($this->worksheets);

        // generate worksheet schema for each worksheet
        foreach ($this->worksheets as $worksheet) {
            $this->xmlSchema .= '<Worksheet ss:Name="' . $worksheet->getName() . '">';
            $this->xmlSchema .= '<Table>';

            // generate schema for each row
            foreach ($worksheet->getRows() as $row) {
                $this->xmlSchema .= '<Row>';

                // generate schema for each column
                foreach ($row->getColumns() as $column) {
                    // determine type
                    $type = is_numeric($column) ? "Number" : "String";

                    $this->xmlSchema .= '<Cell>';
                    $this->xmlSchema .= '<Data ss:Type="' . $type . '">' . $column . '</Data>';
                    $this->xmlSchema .= '</Cell>';
                }

                $this->xmlSchema .= '</Row>';
            }
            $this->xmlSchema .= '</Table>';
            $this->xmlSchema .= '</Worksheet>';
        }
    }

    /**
     *  Closes document schema
     */
    private function closeDocumentSchema() {
        $this->xmlSchema .= '</Workbook>';
    }

    /**
     * Returns xml schema
     *
     * @return string office xml schema
     */
    public function getDocumentSchema() {
        // generate schema
        $this->startDocumentSchema();
        $this->createWorksheetSchema('');
        $this->closeDocumentSchema();

        return $this->xmlSchema;
    }

    /**
     * Add a new worksheet 
     * 
     * @param XlsWorksheet worksheet
     */
    public function addWorksheet($worksheet) {
        array_push($this->worksheets, $worksheet);
    }

    /**
     * Clears the rows
     */
    public function clearWorksheets() {
        unset($this->worksheets);
        $this->worksheets = array();
    }

    /**
     * Saves xls file
     * 
     * @param $filename
     */
    public function save($filename) {
        $fh = fopen($filename, 'w');
        fwrite($fh, $this->getDocumentSchema());
        fclose($fh);
    }

}
