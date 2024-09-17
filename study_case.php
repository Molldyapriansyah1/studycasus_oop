<?php
if(isset($_POST['beli'])){
    $liter = $_POST['liter'];
    $bensin = $_POST['pilih']; 
    
    class Shell {
        public $liter;
        public $bensin;
        protected $ppn = 0.10;
        protected $shell_super = 15420;
        protected $shell_vpower = 16130;
        protected $shell_vpower_diesel = 18310;
        protected $shell_vpower_nitro = 16510;
        
        function __construct($bensin, $liter) {
            $this->bensin = $bensin;
            $this->liter = intval($liter);
        }

        function harga() {
            switch($this->bensin) { 
                case "Shell Super":
                    $hasil = $this->liter * $this->shell_super;
                    break;
                case "Shell V-Power":
                    $hasil = $this->liter * $this->shell_vpower;
                    break;
                case "Shell V-Power Diesel":
                    $hasil = $this->liter * $this->shell_vpower_diesel;
                    break;
                case "Shell V-Power Nitro":
                    $hasil = $this->liter * $this->shell_vpower_nitro;
                    break;
                default:
                    $hasil = 0; 
            }
            return $hasil; 
        }
    }

    $transaction = new Shell($bensin, $liter);
     
    class beli extends Shell {
        function __construct($bensin, $liter) {
            parent::__construct($bensin, $liter);
        }
        function beli() {
            $total = $this->harga() + ($this->harga() * $this->ppn);
            $total_formatted = number_format($total, 2, '.', ',');
            echo "================================================================<br>";
            echo "Anda membeli bahan bakar tipe ".$this->bensin."<br> dengan jumlah ".$this->liter." liter"."<br>"; 
            echo "dasar harga Rp".number_format($this->harga(), 0, ',', '.')."<br>";
            echo "Total PPN 10%: Rp " . number_format($this->harga() * $this->ppn, 0, ',', '.') ."<br>";
            echo "Harga total yang harus dibayarkan adalah Rp. ".$total_formatted ."<br>";
            echo "================================================================<br>";
        }
    }

    $buy = new beli($bensin, $liter);
    $buy->beli();
}
?>
 <!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            @media print{
                form{
                    display: none;
                }
            }
        body{
            background-color: black;
            color: white;
        }    
        Form {
            background-color: white;
            width: 320px;
            height: 150px;
            position: absolute; 
            right: 50px;
            top: 350px;
            border-radius: 10px;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 25px;
            color:rgb(0, 0, 0);
            justify-content: center;
    }
    </style>
    </head>
<body style="display: flex; flex-direction: column; align-items: center; text-align: center;">
<form action="" method="post">
    <label for="text">masukan jumlah liter</label><br>
    <input type="number" name="liter" id="number" ><br>
    <select name="pilih" id="bensin" placeholder="pilih bahan bakar">
        <option value="Shell Super">Shell Super</option>
        <option value="Shell V-Power">Shell V-Power</option>
        <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
        <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
    </select><br>
    <input type="submit" name="beli" value="beli"  > 
    <input type="submit" name="print" value="print" onclick="window.print();return false;">
</form>




