<?php
class sinhvien {
    public $mssv;
    public $hoten;
    public  $ngaysinh;
   function __construct($a, $b, $c){
        $this->mssv = $a;
        $this->hoten = $b;
        $this->ngaysinh = $c;
    }
    function getMssv(){
        return $this->mssv;
    }
    function getHoten(){
        return $this->hoten;
    }
    function getNgaysinh(){
         return $this->ngaysinh;
    }
    function resetinfo($a, $b, $c) {
        $this->mssv = $a;
        $this->hoten = $b;
        $this->ngaysinh = $c;
        $a .='<br/>'.$b.'<br/>'.$c;
        return $a;
    }
    function getAge () {
        $dateArray = explode("-",$this->ngaysinh);
        $age = date('Y') - $dateArray[0] - 1;
        if($dateArray[1] > date('m')) $age++;
        if($dateArray[1] == date('m')) {
            if($dateArray[2] > date('d')) $age++;
        }
        return $age;
    }
    function __destruct()
    {
        echo 'Đây là phương thức hủy của sinh viên '.$this->hoten.'<br/>';
    }
}
$sv01 = new sinhvien('B2011968', 'Thế Kiệt', '2004-7-17');
echo $sv01->getMssv();
echo '<br/>';
echo $sv01->getHoten();
echo '<br/>';
echo $sv01->getNgaysinh();
echo '<br/>';
echo $sv01->getAge();
echo '<br/>';
$sv02 = new sinhvien('B2011967', 'Vy Hưng', '2002-2-2');
echo $sv02->getMssv();
echo '<br/>';
echo $sv02->getHoten();
echo '<br/>';
echo $sv02->getNgaysinh();
echo '<br/>';
echo $sv02->getAge();
echo '<br/>';
echo "THÔNG TIN SAU KHI RESET SV_01";
echo '<br/>';
echo $sv01 ->resetinfo('B2011962', 'Thế Đạt', '2002-10-13');
echo '<br/>';
echo $sv01->getAge();
echo '<br/>';
?>