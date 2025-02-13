<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Customer</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH CUSTUMER
            </div>
            <div class="card-body">
              <form action="simpan-customer.php" method="POST">

                <div class="form-group">
                  <label>Nama Customer</label>
                  <input type="text" name="nama" placeholder="Masukkan Nama Customer" class="form-control">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Customer"></textarea>
                </div>

                <div class="form-group">
                  <label>Kontak</label>
                  <input type="text" name="kontak" placeholder="Masukkan No Telepon" class="form-control">
                </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success">SIMPAN</button>
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