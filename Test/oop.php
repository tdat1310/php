<?php
class animals {
    public $name;
    public $color;
    public function __construct($name, $color){
        $this->name = $name;
        $this->color = $color;
    }
    public function getName(){
        return $this->name;
    }
    public function getColor(){
        return $this->color;
    }
}
class cat extends animals {
    public $hate;
    public function __construct($name, $color, $hate){
        parent::__construct($name, $color);
        $this->hate = $hate;
    }
    public function getHate(){
        return $this->hate;
    }
    public function getData(){
         $a = $this->getHate();
        $a .= '<br/>'.parent::getName().'<br/>'.parent::getColor();
       return  $a;
    }
}
$blonecat = new cat('john', 'red', 'dog');
echo $blonecat->getData();
?>