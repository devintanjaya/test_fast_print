<?php if (isset($heading)) { ?>
    <h1 class="page-title"><?= $heading ?></h1>
<?php } ?>

<div class = "col-md-12 col-lg-12">

	<div class = "col-md-1 col-lg-1"></div>

	<div class = "col-md-10 col-lg-10 container">

		<div class = "col-12 col-md-6 col-lg-6 float-start kolom-kiri">

			<div class = "col-md-12 row row-master-barang">
				<label class = "barang-label">ID Produk : </label>
				<input type = "text" id = "id" name = "id" class = "form__input col-xs-12" value = "<?= (isset($content[0]['id_produk'])) ? $content[0]['id_produk'] : ""  ?>" disabled>
				<div id = "error-id" class = "input-error hidden"></div>
			</div>

			<div class = "col-md-12 row row-master-barang">
				<label class = "barang-label">Nama Produk : </label>
				<input type = "text" id = "nama" name = "nama" class = "form__input col-xs-12" value = "<?= (isset($content[0]['nama_produk'])) ? $content[0]['nama_produk'] : ""  ?>">
				<div id = "error-nama" class = "input-error hidden"></div>
			</div>

			<div class = "col-md-12 row row-master-barang">
				<label class = "barang-label">Harga : </label>
				<input type = "text" id = "harga" name = "harga" class = "form__input col-xs-12" value = "<?= (isset($content[0]['harga'])) ? $content[0]['harga'] : ""  ?>">
				<div id = "error-harga" class = "input-error hidden"></div>
			</div>

		</div>

		<div class = "col-12 col-md-6 col-lg-6 float-end kolom-kanan">

			<div class = "col-md-12 row row-master-barang">
				<label class = "barang-label">Kategori : </label>
				<!-- 
				<input type = "text" id = "kategori" name = "kategori" class = "form__input col-xs-12">
 				-->
 				<select id = "kategori" name = "kategori" class = "form__input col-xs-12">
					<?php if (isset($kategori)) : ?>
						<?php if (is_array($kategori)) : ?>
							<?php foreach ($kategori as $value) : ?>
								<?php if (isset($content[0]['kategori_id']) && $content[0]['kategori_id'] == $value["id_kategori"]) : ?>
									<option value = "<?= $value["id_kategori"] ?>" selected><?= $value["nama_kategori"] ?></option>
								<?php else : ?>
									<option value = "<?= $value["id_kategori"] ?>"><?= $value["nama_kategori"] ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endif; ?>
				</select>
			</div>

			<div class = "col-md-12 row row-master-barang">
				<label class = "barang-label">Status : </label>
				<!-- 
				<input type = "text" id = "status" name = "status" class = "form__input col-xs-12">
				-->
				<select id = "status" name = "status" class = "form__input col-xs-12">
					<?php if (isset($status)) : ?>
						<?php if (is_array($status)) : ?>
							<?php foreach ($status as $value) : ?>
								<?php if (isset($content[0]['status_id']) && $content[0]['status_id'] == $value["id_status"]) : ?>
									<option value = "<?= $value["id_status"] ?>" selected><?= $value["nama_status"] ?></option>
								<?php else : ?>
									<option value = "<?= $value["id_status"] ?>"><?= $value["nama_status"] ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endif; ?>
				</select>
			</div>

			<div class = "col-md-12">
				<input type = "button" id = "update-barang" class = "col-md-12" value = "Ubah Barang">
			</div>
			
		</div>

		<input type = "hidden" id = "id-barang" value = "<?= (isset($content[0]['id_produk'])) ? $content[0]['id_produk'] : ""  ?>">

		<div class = "col-12 col-md-12 col-lg-12 row">
		</div>

	</div>

	<div class = "col-md-1 col-lg-1"></div>

</div>

