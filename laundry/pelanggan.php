<?php
include "config.php";

// Memeriksa apakah pelanggan telah login
session_start();

// Periksa apakah pelanggan telah login atau alihkan ke halaman login jika belum
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// Mendapatkan nama pelanggan dari session atau sumber lainnya
$nama = $_SESSION['username'];

// Query untuk mendapatkan daftar pelanggan dari tabel Pelanggan
$query = "SELECT * FROM Pelanggan";
$result = mysqli_query($conn, $query);

mysqli_close($conn);
?>

<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<link rel="stylesheet" type="text/css" href="styles.css">

<style>
  /* Additional styles to adjust the content position */
  #main {
    padding-top: 70px;
    /* Adjust the value as needed */
  }
</style>

<main id="main">
  <section id="admin" class="admin">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Daftar Pelanggan</h2>
          <div class="text-right">
            <a href="tambah_pelanggan.php" class="btn btn-primary">Tambah Pelanggan</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                  <td>
                    <?php echo $row['id_pelanggan']; ?>
                  </td>
                  <td>
                    <?php echo $row['nama']; ?>
                  </td>
                  <td>
                    <?php echo $row['alamat']; ?>
                  </td>
                  <td>
                    <?php echo $row['telepon']; ?>
                  </td>
                  <td>
                    <a href="edit_pelanggan.php?id=<?php echo $row['id_pelanggan']; ?>"
                      class="btn btn-primary btn-sm">Edit</a>
                    <a href="hapus_pelanggan.php?id=<?php echo $row['id_pelanggan']; ?>"
                      class="btn btn-danger btn-sm">Hapus</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>