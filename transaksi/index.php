<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Transaksi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              DATA TRANSAKSI
            </div>
            <div class="card-body">
              <a href="tambah-transaksi.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">ID TRANSAKSI</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">CUSTOMER</th>
                    <th scope="col">PRODUK</th>
                    <th scope="col">JUMLAH</th>
                    <th scope="col">TOTAL HARGA</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    include('../koneksi.php');
                    $no = 1;
                    $query = mysqli_query($connection, "
                        SELECT transaksi.*, customer.nama AS nama_customer, produk.nama AS nama_produk
                        FROM transaksi
                        JOIN customer ON transaksi.id_customer = customer.id
                        JOIN produk ON transaksi.id_produk = produk.id
                    ");

                    while($row = mysqli_fetch_array($query)){
                ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['tanggal'] ?></td>
                      <td><?php echo $row['nama_customer'] ?></td>
                      <td><?php echo $row['nama_produk'] ?></td>
                      <td><?php echo $row['jumlah'] ?></td>
                      <td><?php echo $row['total_harga'] ?></td>
                      <td class="text-center">
                        <a href="edit-transaksi.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="hapus-transaksi.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>