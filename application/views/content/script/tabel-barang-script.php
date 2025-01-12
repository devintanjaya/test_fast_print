<script>

	$(document).ready(function(){

		var lebar = $(window).width();

		$("#data").DataTable({
			info: true,
		    ordering: true,
		    paging: true
		});

		console.log($(".tabel-barang"));

		$(".tabel-barang").DataTable({
			info: true,
		    ordering: true,
		    paging: true
		});

	});

</script>
