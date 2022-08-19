<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center h-screen -mt-14 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all my-24 md:my-0">
				<div class="profil-detail flex items-center justify-center flex-col w-96 md:w-96 px-6 pb-6 shadow-lg rounded-lg bg-white">
					<!-- <div class="nama-profil mt-2 self-end">
						  <a href="" class="text-white px-1 pb-1 pt-3 bg-[#3BACB6] rounded-md hover:bg-slate-400 transition-all"><ion-icon name="create-outline" class="text-2xl"></ion-icon></a>
					</div> -->
					<div class="foto-profil h-30 w-30 rounded-full bg-slate-100 mt-5">
						<img src="https://icon-library.com/images/person-image-icon/person-image-icon-2.jpg" alt="" class="rounded-full w-28 h-28">
					</div>
	  				<div class="nama-profil mt-2">
						  <p class="font-bold">Administrator</p>
					</div>
	  				<div class="nomor-profil">
						  NIP. 
					</div>
					<div class="social-media">
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-twitter"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-facebook"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-instagram"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-linkedin"></ion-icon></span></a>
					</div>
				</div>
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[784px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Administrator Absen Pegawai
						</div>
						<?php
							echo $this->session->flashdata('success'); 
						?>
						<?php //foreach ($data_kunjungan_aktif as $row) { ?>
						<div class="konten-profil flex items-center justify-center md:items-start md:justify-start flex-col mt-5 shadow-md w-80 py-5 transition-all">
							<div class="nomor-antrian ml-3">
								Data 1 <span class="p-1 m-2 bg-blue-400 rounded-lg text-white">00</span>
							</div>
							<div class="tgl-antrian mt-5 ml-3">
								Data 2 <span class="p-1 bg-yellow-300 rounded-lg"></span>
							</div>
						</div>
						<?php //} ?>
					</div>
					<div class="flex items-center justify-center flex-row mt-14 gap-1 transition-all">
						<a href="<?= base_url('Kunjungan/daftar') ?>" class="bg-green-500 text-white p-2 rounded-md hover:bg-slate-400 transition-all">Absen Masuk</a>
						<a href="<?= base_url('Kunjungan/riwayat') ?>" class="bg-red-400 text-slate-700 p-2 rounded-md hover:bg-slate-400 transition-all">Absen Keluar</a>
					</div>
				</div>
			</div>
			<!-- flex content -->
     	</div>
    </div>

	<?php $this->load->view('template/footer'); ?>
		<!-- Footer Close -->

      <script>
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
		</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
	</body>
</html>
