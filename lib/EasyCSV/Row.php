<?php
/**
 * Created by JetBrains PhpStorm.
 * User: msmith
 * Date: 9/12/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

namespace EasyCSV;


class Row {

    protected $data = array();

    protected $headers;

    public function __construct($data, $headers = null)
    {
        $this->data = $data;
        $this->headers = $headers;
    }

    public function getData($withHeaders = true)
    {
        return ($this->headers && $withHeaders) ? array_combine($this->headers, $this->data) : $this->data;
    }

    public function getSection($start, $end, $withHeaders = true)
    {
        if(!is_numeric($start)){
            $start = ord($start) - 65;
        }

        if(!is_numeric($end)){
            $end = ord($end) - 65;
        }

        $data = array_slice($this->data, $start, $end - $start + 1);
        $headers = ($this->headers && $withHeaders) ? array_slice($this->headers, $start, $end - $start + 1) : null;

        return $headers ? array_combine($headers, $data) : $data;
    }

    public function getColumn($index)
    {
        if(!is_numeric($index)){
            $index = ord($index) - 65;
        }

        return $this->data[$index];
    }

}
