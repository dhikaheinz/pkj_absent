<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center md:h-screen -mt-14 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all mt-48 mb-20 md:my-0">
				<div class="profil-detail flex items-center justify-center flex-col w-96 md:w-80 px-6 pb-6 shadow-lg rounded-lg bg-white">
					<!-- <div class="nama-profil mt-2 self-end">
						  <a href="" class="text-white px-1 pb-1 pt-3 bg-[#3BACB6] rounded-md hover:bg-slate-400 transition-all"><ion-icon name="create-outline" class="text-2xl"></ion-icon></a>
					</div> -->
					<div class="foto-profil h-30 w-30 rounded-full bg-slate-100 mt-5">
						<img src="https://icon-library.com/images/person-image-icon/person-image-icon-2.jpg" alt="" class="rounded-full w-28 h-28">
					</div>
	  				<div class="nama-profil mt-2">
						  <p class="font-bold"><?= $data_pegawai->profile_name ?></p>
					</div>
	  				<div class="nomor-profil">
						  NIP. <?= $data_pegawai->profile_nip ?>
					</div>
					<div class="social-media">
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-twitter"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-facebook"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-instagram"></ion-icon></span></a>
						<a href="#" class="hover:text-slate-500"><span><ion-icon name="logo-linkedin"></ion-icon></span></a>
					</div>
					<!-- <div class="bg-[#c8dab6] p-2 rounded-md mt-2">
					<b>Keterangan :</b> <br>
					Absen masuk dapat dilakukan setelah jam <b>06:00</b>. <br>
					Absen pulang hanya dapat dilakukan pada jam berikut : <br>
					1. Senin s.d. Kamis pada pukul <b>15.00</b>, dan <br>
					2. Jumat pada pukul <b>15.30</b> <br>
					Unggah file kegiatan online hanya diperbolehkan <b>file gambar (jpg, jpeg, png)</b>. <br>
					</div> -->
				</div>
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[784px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Absen Pegawai
						</div>
						<?php
							echo $this->session->flashdata('success'); 
						?>
						<div class="mt-5 text-lg text-white p-3 bg-[#64b3f4] rounded-md">
							Waktu Saat Ini : <?php date_default_timezone_set("Asia/Bangkok"); echo date("d-m-Y"); ?><div id="timestamp"></div>
						</div>
							<?php //foreach ($data_kunjungan_aktif as $row) { ?>
						<div class="konten-profil flex items-center justify-center md:items-start md:justify-start flex-col mt-5 shadow-md py-5 transition-all">
							<div class="nomor-antrian ml-3">
								Absen Masuk :<span class="p-1 m-2 bg-[#64b3f4] rounded-md text-white">
									<?php 
									if(!empty($data_absent->attendance_entry)){
										echo $data_absent->attendance_entry;
										}else{
										echo "Belum Absen Masuk";
										}
										 ?>
										 </span>&nbsp; | &nbsp;
										 <?php 
									if(!empty($data_absent->location_entry)){
										echo '<a href="https://google.com/maps/place/'.$data_absent->location_entry.'" target="_blank" class="p-1 m-2 bg-[#64b3f4] rounded-md text-white hover:bg-slate-400">Lihat Lokasi 📌</a>';
										}else{
										echo "";
										}
										 ?>
							</div>
							<div class="tgl-antrian mt-5 ml-3">
								Absen Pulang :<span class="p-1 m-2 bg-[#a2c082] rounded-md text-white">
								<?php 
									if(!empty($data_absent->attendance_return)){
										echo $data_absent->attendance_return;
										}else{
										echo "Belum Absen Pulang";
										}
										 ?>	
										</span>&nbsp; | &nbsp;
										 <?php 
									if(!empty($data_absent->location_return)){
										echo '<a href="https://google.com/maps/place/'.$data_absent->location_return.'" target="_blank" class="p-1 m-2 bg-[#a2c082] rounded-md text-white hover:bg-slate-400">Lihat Lokasi 📌</a>';
										}else{
										echo "";
										}
										 ?>
							</div>
							<!-- <p id="demo"></p> -->
						</div>
						<?php //} ?>
					</div>
							<!-- absen masuk  -->
						<form action="<?php echo site_url('home/absentMasuk'); ?>" method="post">
						<input id="lokasi_user" name="lokasi_user" type="text" value="" hidden>
						<div class="flex items-center justify-center flex-row mt-14 gap-1 transition-all">
							<button id="getLocBtn" type="button" onclick="getLocation()" class="bg-[#64b3f4] text-white p-2 rounded-md hover:bg-slate-400 transition-all" data-bs-toggle="modal" data-bs-target="#exampleModal">Konfirmasi Lokasi</button>
								<?php 
									date_default_timezone_set("Asia/Bangkok");
									$jam = date("H");
									$menit = date("i");
									//if ($jam >= 6 && $menit > 00) {
										echo '<button type="submit" id="btnMasuk" class="text-white p-2 rounded-md bg-slate-400 transition-all" title="Konfirmasi Lokasi Terlebih Dahulu" disabled>Absen Masuk</button>';
									//};
								?>
						</form>
						<!-- absen masuk  -->
							
						<!-- input kegiatan -->
						<!-- <form action="<?php //echo site_url('home/absentKegiatan'); ?>" method="post"> -->
						<button type="button" id="btnKegiatan" class="text-white p-2 rounded-md bg-[#a2c082] hover:bg-slate-400 transition-all" title="Konfirmasi Lokasi Terlebih Dahulu" data-bs-toggle="modal" data-bs-target="#inputKegiatan">Input Kegiatan</button>
						<!-- </form> -->
						<!-- input kegiatan  -->

						<!-- absen keluar -->
						<form action="
						<?php 
						if(!empty($data_absent->id_absent)){
							echo site_url('home/absentKeluar/'.$data_absent->id_absent.'');
							}else{
							echo "";
							} 
						?>" method="post">
						<input id="lokasi_user_keluar" name="lokasi_user_keluar" type="text" value="" hidden>
							<?php 
								date_default_timezone_set("Asia/Bangkok");
								$jam = date("H");
								$menit = date("i");
								//if ($jam >= 15 && $menit > 00) {
									echo '<button type="submit" id="btnKeluar" class="text-white p-2 rounded-md bg-slate-400 transition-all" title="Konfirmasi Lokasi Terlebih Dahulu" disabled>Absen Keluar</button>';
								//};
							?>
						</form>
						<!-- absen keluar -->
					</div>
				</div>
				<div class="profil-detail flex items-center justify-center flex-col w-96 md:w-[300px] p-3 shadow-lg rounded-lg bg-white">
					<div class="bg-[#c8dab6] p-2 rounded-md">
					<b>Keterangan :</b> <br>
					Absen masuk dapat dilakukan setelah jam <b>06:00</b>. <br>
					Absen pulang hanya dapat dilakukan pada jam berikut : <br><br>
					1. Senin s.d. Kamis pada pukul <b>15.00</b>, dan <br>
					2. Jumat pada pukul <b>15.30</b> <br>
					Unggah file kegiatan online hanya diperbolehkan <b>file gambar (jpg, jpeg, png)</b>. <br>
					</div>
				</div>
			</div>
			<!-- flex content -->
     	</div>
    </div>

	<!-- Modal -->
	<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
	id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog relative w-auto pointer-events-none">
			<div
			class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div
				class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Lokasi Anda Sekarang</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
					<div class="mapouter">
						<div class="gmap_canvas mx-auto">
							<iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
							</iframe>
						</div>
					</div>
			</div>
			<div
				class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
				<button type="button" class="px-6
				py-2.5
				bg-red-600
				text-white
				font-medium
				text-xs
				leading-tight
				uppercase
				rounded
				shadow-md
				hover:bg-red-700 hover:shadow-lg
				focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
				active:bg-red-800 active:shadow-lg
				transition
				duration-150
				ease-in-out" data-bs-dismiss="modal">Tutup</button>
				<button type="button" class="px-6
			py-2.5
			bg-sky-600
			text-white
			font-medium
			text-xs
			leading-tight
			uppercase
			rounded
			shadow-md
			hover:bg-sky-700 hover:shadow-lg
			focus:bg-sky-700 focus:shadow-lg focus:outline-none focus:ring-0
			active:bg-sky-800 active:shadow-lg
			transition
			duration-150
			ease-in-out
			ml-1" data-bs-dismiss="modal" onclick="disabledLoc()">Simpan Lokasi</button>
			</div>
			</div>
		</div>
	</div>

	<!-- modal input kegiatan -->
	<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
	id="inputKegiatan" tabindex="-1" aria-labelledby="inputKegiatan" aria-hidden="true">
		<div class="modal-dialog relative w-auto pointer-events-none">
			<div
			class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div
				class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Kegiatan Anda Hari Ini?</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<!-- input kegiatan -->
				<form action="<?php echo site_url('home/inputKegiatan'); ?>" method="post" enctype="multipart/form-data">
				<div class="grid grid-cols-1 gap-4">
					<div>
						<label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700">Deskripsi Kegiatan : </label>
						<textarea
						class="
							form-control
							block
							w-full
							px-3
							py-1.5
							text-base
							font-normal
							text-gray-700
							bg-white bg-clip-padding
							border border-solid border-gray-300
							rounded
							transition
							ease-in-out
							m-0
							focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
						"
						name="job_desc"
						rows="3"
						placeholder="Masukkan Kegiatan Hari ini"
						></textarea>
					</div>
					<div>
					<label for="formFileSm" class="form-label inline-block mb-2 text-gray-700">Small file input example</label>
					<input class="form-control
					block
					w-full
					px-2
					py-1
					text-sm
					font-normal
					text-gray-700
					bg-white bg-clip-padding
					border border-solid border-gray-300
					rounded
					transition
					ease-in-out
					m-0
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="doc_name" type="file" name='files[]' multiple="" multiple>
					<input type="text" name="id_absent" value="
					<?php 
						if(!empty($data_absent->id_absent)){
							echo $data_absent->id_absent;
							}else{
							echo "";
							} 
						?>
					" hidden>
					</div>
				</div>
			</div>
			<div
				class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
				<button type="button" class="px-6
				py-2.5
				bg-red-600
				text-white
				font-medium
				text-xs
				leading-tight
				uppercase
				rounded
				shadow-md
				hover:bg-red-700 hover:shadow-lg
				focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
				active:bg-red-800 active:shadow-lg
				transition
				duration-150
				ease-in-out" data-bs-dismiss="modal">Tutup</button>
				<button type="submit" class="px-6
			py-2.5
			bg-sky-600
			text-white
			font-medium
			text-xs
			leading-tight
			uppercase
			rounded
			shadow-md
			hover:bg-sky-700 hover:shadow-lg
			focus:bg-sky-700 focus:shadow-lg focus:outline-none focus:ring-0
			active:bg-sky-800 active:shadow-lg
			transition
			duration-150
			ease-in-out
			ml-1" data-bs-dismiss="modal">Simpan Data</button>
			</div>
			</form>
			</div>
		</div>
	</div>

	<?php $this->load->view('template/footer'); ?>
	</body>
</html>