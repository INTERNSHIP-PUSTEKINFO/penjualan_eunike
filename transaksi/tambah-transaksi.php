<?php include('../koneksi.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Transaksi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH TRANSAKSI
            </div>
            <div class="card-body">
              <form action="simpan-transaksi.php" method="POST">

                <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="date" name="tanggal" placeholder="Masukkan Tanggal Transaksi" class="form-control">
                </div>

                <div class="form-group">
                    <label>Customer</label>
                    <select name="id_customer" id="id_customer" class="form-control">
                        <option value="">Pilih Nama Customer</option>
                        <?php
                        $query = "SELECT id, nama FROM customer";
                        $result = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                  <label>Produk</label>
                  <select name="id_produk" id="id_produk" class="form-control" onchange="hitungTotal()">
                      <option value="">Pilih Produk</option>
                      <?php
                      $query = "SELECT id, nama, harga FROM produk";
                      $result = mysqli_query($connection, $query);

                      while ($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="' . $row['id'] . '" data-harga="' . $row['harga'] . '">'
                              . $row['nama'] . ' - Rp' . $row['harga'] . '</option>';
                      }
                      ?>
                  </select>
              </div>

                <div class="form-group">
                  <label>Jumlah Produk</label>
                  <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Produk" class="form-control" oninput="hitungTotal()">
                </div>

                <div class="form-group">
                  <label>Total Harga</label>
                  <input type="number" name="total_harga" id="total_harga" class="form-control" readonly>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
</script>
