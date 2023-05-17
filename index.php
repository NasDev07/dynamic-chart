<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Js</title>
  <!-- Chart js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
    integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- jquery js -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- collect js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.36.1/collect.min.js"
    integrity="sha512-aub0tRfsNTyfYpvUs0e9G/QRsIDgKmm4x59WRkHeWUc3CXbdiMwiMQ5tTSElshZu2LCq8piM/cbIsNwuuIR4gA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<style>
.chat-content {
  width: 700px;
}
</style>

<body onload=getDataKependudukan()>
  <div class="chat-content">
    <canvas id="myChart"></canvas>
  </div>

  <script>
  function getDataKependudukan() {
    $.ajax({
      type: 'GET',
      url: 'file_backend.php',
      data: {
        functionName: 'getDataKependuduk'
      },
      success: function(response) {
        let kependudukan = JSON.parse(response)
        // console.log(kependudukan);

        let wilayah = collect(kependudukan).map(function(item) {
          return item.nama_wilayah
        }).all()

        let jumlah_penduduk = collect(kependudukan).map(function(item) {
          return item.jumlah_penduduk
        }).all()
        // console.log(jumlah_penduduk);

        // nampil data chat
        const data = {
          labels: wilayah,
          datasets: [{
            label: 'Data Kependudukan',
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)'
            ],
            data: jumlah_penduduk,
          }]
        };

        const config = {
          type: 'polarArea',
          data: data,
          options: {}
        };

        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
      }
    })
  }
  </script>

</body>

</html>