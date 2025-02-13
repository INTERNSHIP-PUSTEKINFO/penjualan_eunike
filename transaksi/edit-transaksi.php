<?php 
  
  include('../koneksi.php');
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM transaksi WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Transaksi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT TRANSAKSI
            </div>
            <div class="card-body">
              <form action="update-transaksi.php" method="POST">

              <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>

                <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="date" name="tanggal" value="<?php echo $row['tanggal'] ?>" placeholder="Masukkan Tanggal Transaksi" class="form-control">
                </div>

                <div class="form-group">
                    <label>Customer</label>
                    <select name="id_customer" id="id_customer" value="<?php echo $row['id_customer'] ?>" class="form-control">
                        <option value="">Pilih ID Customer</option>
                        <?php
                        $query_customer = "SELECT id, nama FROM customer";
                        $result_customer = mysqli_query($connection, $query_customer);

                        while ($customer = mysqli_fetch_assoc($result_customer)) {
                            $selected = ($customer['id'] == $row['id_customer']) ? "selected" : "";
                            echo '<option value="' . $customer['id'] . '" ' . $selected . '>' . $customer['nama'] . '</option>';
                        }
                        ?>
                    </select>
                    
                </div>

                <div class="form-group">
                  <label>Produk</label>
                  <select name="id_produk" id="id_produk" value="<?php echo $row['id_produk'] ?>" class="form-control" onchange="hitungTotal()">
                      <option value="">Pilih Produk</option>
                      <?php
                      $query_produk = "SELECT id, nama, harga FROM produk";
                      $result_produk = mysqli_query($connection, $query_produk);

                      while ($produk = mysqli_fetch_assoc($result_produk)) {
                          $selected = ($produk['id'] == $row['id_produk']) ? "selected" : "";
                          echo '<option value="' . $produk['id'] . '" data-harga="' . $produk['harga'] . '" ' . $selected . '>'
                              . $produk['nama'] . ' - Rp' . $produk['harga'] . '</option>';
                      }
                      ?>

                  </select>
              </div>

                <div class="form-group">
                  <label>Jumlah Produk</label>
                  <input type="number" name="jumlah" id="jumlah" value="<?php echo $row['jumlah'] ?>" placeholder="Masukkan Jumlah Produk" class="form-control">
                </div>

                <div class="form-group">
                  <label>Total Harga</label>
                  <input type="number" name="total_harga" id="total_harga" value="<?php echo $row['total_harga'] ?>" class="form-control" readonly>
                </div>
                
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>

<script>
  function hitungTotal() {
    let selectProduk = document.getElementById("id_produk");
    let hargaProduk = selectProduk.options[selectProduk.selectedIndex].getAttribute("data-harga");
    let jumlahProduk = document.getElementById("jumlah").value;

    if (hargaProduk && jumlahProduk) {
        document.getElementById("total_harga").value = hargaProduk * jumlahProduk;
    } else {
        document.getElementById("total_harga").value = "";
    }
  }

  document.addEventListener("DOMContentLoaded", function() {
    hitungTotal();
  });

  document.getElementById("jumlah").addEventListener("input", hitungTotal);
  document.getElementById("id_produk").addEventListener("change", hitungTotal);

</script>