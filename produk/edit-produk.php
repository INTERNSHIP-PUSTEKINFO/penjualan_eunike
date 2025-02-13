<?php 
  
  include('../koneksi.php');
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM produk WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Produk</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT PRODUK
            </div>
            <div class="card-body">
              <form action="update-produk.php" method="POST">

              <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>
                
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="nama" value=" <?php echo $row['nama'] ?>" placeholder="Masukkan Nama Produk" class="form-control">
                </div>

                <div class="form-group">
                  <label>Harga Produk</label>
                  <input type="number" name="harga" value="<?php echo $row['harga'] ?>" placeholder="Masukkan Harga Produk" class="form-control">
                </div>

                <div class="form-group">
                  <label>Stok Produk</label>
                  <input type="number" name="stok" value="<?php echo $row['stok'] ?>" placeholder="Masukkan Stok Produk" class="form-control">
                </div>

                <div class="form-group">
                  <label>Berat Produk</label>
                  <input type="number" name="berat" value="<?php echo $row['berat'] ?>" placeholder="Masukkan Berat Produk" class="form-control">
                </div>

                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" name="kategori" value="<?php echo $row['kategori'] ?>"  placeholder="Masukkan Kategori" class="form-control">
                </div>

                <div class="form-group">
                    <label>Supplier</label>
                    <select name="id_supplier" id="id_supplier" class="form-control">
                        <option value="">Pilih Supplier</option>
                        <?php
                        $query = "SELECT id, nama FROM supplier";
                        $result = mysqli_query($connection, $query);
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row['id'] == $id) ? "selected" : ""; 
                            echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['nama'] . '</option>';
                        }                        
                        ?>
                    </select>
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