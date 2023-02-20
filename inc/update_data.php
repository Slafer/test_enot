<?php
    require 'db.php';
    require 'CurrencyTable.php';

    $db = new db();
    $table = new CurrencyTable("https://www.cbr.ru/currency_base/daily/");
    if ($db->CheckDb()){
    for ($i = 1; $i < $table->get_size(); $i++)
    {
     $db->updateCurrency($table->get_abbr($i), str_replace(',', '.', $table->get_rate($i)));
    }
    } else
    {
      for ($i = 1; $i < $table->get_size(); $i++)
    {
     $db->addCurrency($table->get_abbr($i),$table->get_name($i), str_replace(',', '.', $table->get_rate($i)));
    }
    }
?>

