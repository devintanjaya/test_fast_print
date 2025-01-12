<script>

	$("#update-barang").click(function(){

		var id_produk = $("#id").val();
		var nama_produk = $("#nama").val();
		var harga = $("#harga").val();
		var kategori_id = $("#kategori").find(":selected").val();
		var status_id = $("#status").find(":selected").val();

		$("#error-id").html("");
		$("#error-id").addClass("hidden");
		$("#error-nama").html("");
		$("#error-nama").addClass("hidden");
		$("#error-harga").html("");
		$("#error-harga").addClass("hidden");

		//if (id_produk != "" && nama_produk != "") {
			$.post( "<?= base_url("home/update_barang") ?>",
                { id_produk : id_produk, nama_produk : nama_produk, harga : harga, kategori_id : kategori_id, status_id : status_id })
            .done(function( data ) {

            	if (data["cek_validasi"] == 1 || data["cek_validasi"] == "1") {
            		alert("ubah barang berhasil");
            		window.location.href = "<?= base_url() ?>";
            	} else {

            		var data_err = data["error"];
            		if (typeof(data_err["id_produk"]) != "undefined" && data_err["id_produk"] !== null) {
            			$("#error-id").removeClass("hidden");
            			$("#error-id").html(data_err["id_produk"]);
            		}
            		if (typeof(data_err["nama_produk"]) != "undefined" && data_err["nama_produk"] !== null) {
            			$("#error-nama").removeClass("hidden");
            			$("#error-nama").html(data_err["nama_produk"]);
            		}
            		if (typeof(data_err["harga"]) != "undefined" && data_err["harga"] !== null) {
            			$("#error-harga").removeClass("hidden");
            			$("#error-harga").html(data_err["harga"]);
            		}

            	}

            	
            });
    	//}


	});

</script>
