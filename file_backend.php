<?php
include "koneksi.php";

$functionName = htmlspecialchars($_GET['functionName']);

switch ($functionName) {
  case 'getDataKependuduk':
    getDataKependuduk();
    break;

  default:
    // Kode default jika functionName tidak sesuai dengan yang diharapkan
    echo "Invalid functionName";
    break;
}

function getDataKependuduk()
{
  global $conn;

  $data = [];
  $query = mysqli_query($conn, "SELECT * FROM kependudukan");

  while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
  }
  echo json_encode($data); // Mengubah dari json_decode menjadi json_encode
}
