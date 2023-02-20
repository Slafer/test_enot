<?php

class CurrencyTable {
    private $rows;
    private $size;
    public function __construct($source) {
$data = file_get_contents($source);

$dom = new domDocument;

@$dom->loadHTML($data);
$dom->preserveWhiteSpace = false;
$tables = $dom->getElementsByTagName('table');

$this->rows = $tables->item(0)->getElementsByTagName('tr');
$this->size = sizeof($this->rows);

    }
    public function get_abbr($id)
    {
        $cols = $this->rows[$id]->getElementsByTagName('td');
        return $cols[1]->textContent;
    }
    public function get_name($id)
    {
        $cols = $this->rows[$id]->getElementsByTagName('td');
        return $cols[3]->textContent;
    }
    public function get_rate($id)
    {
        $cols = $this->rows[$id]->getElementsByTagName('td');
        return $cols[4]->textContent;
    }
    public function get_size() {
        return $this->size;
    }
    public function __print_whole_table() {
        foreach ($this->rows as $row) {
            echo $row->textContent;
            echo '<br>';
        }
    }
}
