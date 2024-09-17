<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>

        </style>

    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
        <div class="card  mb-3 w-25 "style="position: absolute;top: 15%;left: 50%;transform: translate(-50%, -50%);">
        <form action="" method="post">
            <label for="text" class="form-label">masukan jumlah liter</label><br>
            <input type="number" class="form-control" id="number"  name="liter">
            <label for="text" class="form-label">pilih jenis bahan bakar</label><br>
            <select class="form-select" name="pilih" id="bensin" placeholder="pilih bahan bakar">
                <option value="Shell Super">Shell Super</option>
                <option value="Shell V-Power">Shell V-Power</option>
                <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
            </select><br>
            <input class="btn btn-secondary" type="submit" name="beli" value="beli"  > 
        </form>
        </div>

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
            echo '<div class="card  mb-3 w-25  position-absolute top-50 start-50 translate-middle">';
            echo '<div class="card-header">Transaksi</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Anda membeli bahan bakar tipe '.$this->bensin.'</h5>';
            echo '<p class="card-text">dengan jumlah '.$this->liter.' liter</p>';
            echo '<p class="card-text">dasar harga Rp'.number_format($this->harga(), 0, ',', '.').'</p>';
            echo '<p class="card-text">Total PPN 10%: Rp '.number_format($this->harga() * $this->ppn, 0, ',', '.').'</p>';
            echo '<p class="card-text">Harga total yang harus dibayarkan adalah Rp. '.$total_formatted.'</p>';
            echo '</div>';
            echo '</div>';

        }
    }

    $buy = new beli($bensin, $liter);
    $buy->beli();
}
?>


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous">
        </script>
    </body>
</html>

