<?php


class CurrencyForm {
   private string $abbr;
   private string $name;
   private float $rate;
           
   public function __construct(string $abbr, string $name, float $rate) {
       $this->abbr = $abbr;
       $this->name = $name;
       $this->rate = $rate;
   }
   public function print_form()
   {
       
       echo "<Form name = '$this->abbr._Form' method = 'Post' Action = ''";
            echo "<div allign='center'>$this->abbr $this->name $this->rate"; 
            echo " <span style='float: right'><input type = 'number' size='25' value = '0' step='any' name='$this->abbr'>";
            echo "<-> <input type = 'number' step='any' size='20' value = '0' name='RUB$this->abbr'> RUB <input type='submit' name='S$this->abbr'>";
            echo " </div> </span></form><br>";
   }
   public function calc_to_right(float $value)
   {
       $ans = $value*floatval($this->rate);
       echo "<Form name = '$this->abbr._Form' method = 'Post' Action = ''";
            echo "<div allign='center'>$this->abbr $this->name $this->rate"; 
            echo " <span style='float: right'><input type = 'number' size='25' value = '0' step='any' name='$abbr'>";
            echo "<-> <input type = 'number' step='any' size='20' value = '$ans' name='RUB$this->abbr'> RUB <input type='submit' name='S$this->abbr'>";
            echo " </div> </span></form><br>";
   }
   public function calc_to_left(float $value)
   {
        $ans = $value/floatval($this->rate);
       echo "<Form name = '$this->abbr._Form' method = 'Post' Action = ''";
            echo "<div allign='center'>$this->abbr $this->name $this->rate"; 
            echo " <span style='float: right'><input type = 'number' size='25' value = '$ans' step='any' name='$abbr'>";
            echo "<-> <input type = 'number' step='any' size='20' value = '0' name='RUB$this->abbr'> RUB <input type='submit' name='S$this->abbr'>";
            echo " </div> </span></form><br>";
   }
}
