<table id = "data" class = "tabel-barang display" name = "data" border = "1px">

  <thead>
      <tr>
          <td class = "kolom"> ID </td>
          <td class = "kolom"> Nama Produk </td>
          <td class = "kolom"> Harga </td>
          <td class = "kolom"> ID Kategori </td>
          <td class = "kolom"> Nama Kategori </td>
          <td class = "kolom"> ID Status </td>
          <td class = "kolom"> Nama Status </td>
          <td class = "kolom"> Manajemen Barang </td>
      </tr>
  </thead>

  <tbody>

    <?php

      if (isset($barang) && $barang != 0) 
      {
          foreach ($barang as $barang)
          {

    ?>

        <tr>

          <td class = "kolom">
            <?php echo $barang['id_produk']; ?>
          </td>

          <td class = "kolom">
            <?php echo $barang['nama_produk']; ?>
          </td>

          <td class = "kolom">
            <?php echo $barang['harga']; ?>
          </td>

          <td class = "kolom">
            <?php echo $barang['kategori_id']; ?>
          </td>

          <td class = "kolom">
            <?php echo $barang['nama_kategori']; ?>
          </td>

          <td class = "kolom">
            <?php echo $barang['status_id']; ?>
          </td>

          <td class = "kolom">
            <?php echo $barang['nama_status']; ?>
          </td>

          <td class = "kolom">
              <?php $id_barang = $barang['id_produk']; ?>
              <input type = "button" id = "edit-<?= $id_barang ?>" class = "update" value = "edit">
              <br/>
              <input type = "button" id = "delete-<?= $id_barang ?>" class = "delete" value = "delete">
              <br/>
          </td>

        </tr>

    <?php

          }

      }

    ?>

  </tbody>

</table>
