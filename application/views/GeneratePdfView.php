<!DOCTYPE html>
<html>
  <head>
  <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    </style>
  </head>
  <body>
  <h2 align="center">DATA JADWAL DOKTER RS TRUSMEDIKA SURABAYA</h2>
    <!-- <p>For zebra-striped tables, use the nth-child() selector and add a background-color to all even (or odd) table rows:</p> -->
    <table style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Klinik</th>
        <th>Senin</th>
        <th>Selasa</th>
        <th>Rabu</th>
        <th>Kamis</th>
        <th>Jum'at</th>
        <th>Sabtu</th>
        <th>Minggu</th>
        <!-- <?php foreach ($data_hari as $hari) :?>
            <th><?php echo $hari->nama ?> </th>
        <?php endforeach; ?> -->
      </tr>
      <?php $no = 1; ?> 
      <?php foreach ($data_poli as $row) :?>
      <tr>
          <td> <?php echo $no; $no++; ?> </td>
          <td> <?php echo $row->poli; echo '<br>'; echo $row->pegawai; ?> </td>
          <td> <?php echo $row->jam_mulai;?> </td>  
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
      </tr>
      <?php endforeach; ?>
      
    </thead>
    </table>
  </body>
</html>