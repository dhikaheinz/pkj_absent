    <!-- Footer -->
    <footer
			class="bottom-0 left-0 transition-all flex justify-center items-center h-14 w-full bg-gradient-to-r from-[#a2c082] to-[#a2c082] shadow"
		>
			<div class="container mx-auto flex justify-center items-center">
				<div>
					<p class="text-white">
						Copyright © 2022
						<span class="font-semibold sm:inline-block hidden"
							>POLTEKKES KEMENKES JAKARTA I</span
						>
					</p>
					<p class="text-white">
						<span class="font-semibold block sm:hidden"
							>POLTEKKES KEMENKES JAKARTA I</span
						>
					</p>
				</div>
			</div>
		</footer>
		<!-- plugnin textarea -->
		
		<!-- close -->
		<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
				<!-- Footer Close -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
      	<script>

		var btnKegiatanFile = document.getElementById("btnKegiatanFile");
		var cekDescKeg = "<?php 
			if(!empty($data_today_row->id_job)){
			echo $data_today_row->id_job;
			}else{
			echo "";
			}
			?>";
		if (cekDescKeg) {
			btnKegiatanFile.classList.add("hover:bg-slate-400");
			btnKegiatanFile.classList.remove("bg-slate-400");
			btnKegiatanFile.classList.remove("cursor-not-allowed");
			btnKegiatanFile.classList.add("bg-[#64b3f4]");
			btnKegiatanFile.disabled = false;
			// btnMasuk.classList.add("hover:bg-slate-400");
		}

			function Menu(e) {
				let list = document.querySelector("ul");
				e.name === "menu"
					? ((e.name = "close"),
					  list.classList.add("top-[70px]"),
					  list.classList.add("opacity-100"))
					: ((e.name = "menu"),
					  list.classList.remove("top-[70px]"),
					  list.classList.remove("opacity-100"));
			}
			$(function(){
            setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
        })
        
        //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
        function timestamp() {
            $.ajax({
                url: '<?= base_url('assets/php/ajax_timestamp.php') ?>',
                    success: function(data) {
                    $('#timestamp').html(data);
                },
            });
        }

		// Get Location
		// var x = document.getElementById("demo");
		var gmap = document.getElementById("gmap_canvas");

		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.watchPosition(showPosition);
			} else { 
				// x.innerHTML = "Geolocation is not supported by this browser.";
			}
		}
			
		function showPosition(position) {
			// x.innerHTML="Latitude: " + position.coords.latitude + 
			// "<br>Longitude: " + position.coords.longitude;
			gmap.src = "https://maps.google.com/maps?q="+ position.coords.latitude +","+ position.coords.longitude +"&t=&z=15&ie=UTF8&iwloc=&output=embed";
			document.getElementById("lokasi_user").value = position.coords.latitude+","+position.coords.longitude;
			document.getElementById("lokasi_user_keluar").value = position.coords.latitude+","+position.coords.longitude;
		}

		function disabledLoc() {
			var getLocBtn = document.getElementById("getLocBtn");
			getLocBtn.disabled = true;
			getLocBtn.classList.remove("bg-[#64b3f4]");
			getLocBtn.classList.remove("hover:bg-slate-400");
			getLocBtn.classList.add("bg-slate-400");
			getLocBtn.classList.add("cursor-not-allowed");
			getLocBtn.textContent = 'Lokasi Terkunci';

			var btnMasuk = document.getElementById("btnMasuk");
			btnMasuk.classList.add("hover:bg-slate-400");
			btnMasuk.classList.remove("bg-slate-400");
			btnMasuk.classList.remove("cursor-not-allowed");
			btnMasuk.classList.add("bg-[#a2c082]");
			btnMasuk.disabled = false;

			if (cekDescKeg) {
				var btnKeluar = document.getElementById("btnKeluar");
				btnKeluar.classList.add("hover:bg-slate-400");
				btnKeluar.classList.remove("bg-slate-400");
				btnKeluar.classList.remove("cursor-not-allowed");
				btnKeluar.classList.add("bg-[#a2c082]");
				btnKeluar.disabled = false;	
			} else {
				
			}
		}

		$('.hide-it').delay(3000).fadeOut(1000);

		var btnKegiatan = document.getElementById("btnKegiatan");
		var cekMasuk = "<?php 
			if(!empty($data_absent->attendance_entry)){
			echo $data_absent->attendance_entry;
			}else{
			echo "";
			}
			?>";
		if (cekMasuk) {
			btnKegiatan.classList.add("hover:bg-slate-400");
			btnKegiatan.classList.remove("bg-slate-400");
			btnKegiatan.classList.remove("cursor-not-allowed");
			btnKegiatan.classList.add("bg-[#64b3f4]");
			btnKegiatan.disabled = false;
			// btnMasuk.classList.add("hover:bg-slate-400");
			btnMasuk.classList.remove("bg-[#a2c082]");
			btnMasuk.classList.add("bg-slate-400");
			btnMasuk.classList.add("cursor-not-allowed");
			btnMasuk.disabled = true;
			btnMasuk.hidden = true;
		}

		function closeSide(){
			var modal = document.getElementById("closeModal");
			modal.classList.add("hidden");
		}

		function closeSidePulang(){
			var modal = document.getElementById("notifKeluar");
			modal.classList.add("hidden");
		}

		</script>
		<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>