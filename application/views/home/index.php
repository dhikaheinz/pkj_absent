<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center md:h-screen -mt-14 md:mt-5 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all mt-48 mb-20 md:my-0">
				<div class="profil-detail flex items-center justify-center flex-col w-96 md:w-96 px-6 pb-6 shadow-lg rounded-lg bg-white">
					<!-- <div class="nama-profil mt-2 self-end">
						  <a href="" class="text-white px-1 pb-1 pt-3 bg-[#3BACB6] rounded-md hover:bg-slate-400 transition-all"><ion-icon name="create-outline" class="text-2xl"></ion-icon></a>
					</div> -->
					<div class="nama-profil mt-2 self-end">
						  <a href="<?= base_url('home/detail_profil') ?>" class="text-white px-1 pb-1 pt-3 bg-[#3BACB6] rounded-md hover:bg-slate-400 transition-all">Edit Profil <ion-icon name="create-outline" class="text-lg"></ion-icon></a>
					</div>
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
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 md:w-[384px] lg:w-[500px] xl:w-[800px] : p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Absen Pegawai
						</div>
						<?php
							echo $this->session->flashdata('success'); 
						?>
						<div class="mt-5 text-lg text-white p-3 bg-[#64b3f4] rounded-md w-full">
							Tanggal Saat Ini : <?php date_default_timezone_set("Asia/Bangkok"); echo date("d-m-Y"); ?><br>
							Waktu Saat Ini : <text id="timestamp"></text>
						</div>
						<div id="notifKeluar" class="flex justify-between">
							<?php 
								date_default_timezone_set("Asia/Bangkok");
								$jam = date("H");
								$menit = date("i");
								if ($jam >= 15 || $jam <= 6) {
									echo '<div class="mt-2 text-lg text-white p-3 bg-red-500 w-full rounded-md">Tidak Bisa Absen Pulang Jika Belum Melakukan Input Kegiatan Harian</div>
									<div>
									<button type="button" onclick="closeSidePulang()" class="-ml-7 mt-3 overflow-auto text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
									<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
									<span class="sr-only">Close modal</span>
									</button>
									</div>';
								};
							?>
						</div>
						<div class="konten-profil flex items-start justify-center md:items-start md:justify-start flex-col md:flex-row mt-5 shadow-md py-5 transition-all">
							<div class="nomor-antrian ml-3">
								Absen Masuk &nbsp;:<span class="p-1 m-2 bg-red-500 rounded-md text-white">
									<?php 
									if(!empty($data_absent->attendance_entry)){
										echo $data_absent->attendance_entry;
										}else{
										echo "Belum Absen Masuk";
										}
										 ?>
										 </span>&nbsp;|&nbsp;
										 <?php 
									if(!empty($data_absent->location_entry)){
										echo '<a href="https://google.com/maps/place/'.$data_absent->location_entry.'" target="_blank" class="p-1 m-2 bg-[#64b3f4] rounded-full text-white hover:bg-slate-400">&nbsp;Loc 📌</a>';
										}else{
										echo "";
										}
										 ?>
							</div>
							<div class="tgl-antrian mt-5 md:mt-0 ml-3">
								Absen Pulang :<span class="p-1 m-2 bg-red-500 rounded-md text-white">
								<?php 
									if(!empty($data_absent->attendance_return)){
										echo $data_absent->attendance_return;
										}else{
										echo "Belum Absen Pulang";
										}
										 ?>	
										</span>&nbsp;|&nbsp;
										 <?php 
									if(!empty($data_absent->location_return)){
										echo '<a href="https://google.com/maps/place/'.$data_absent->location_return.'" target="_blank" class="p-1 m-2 bg-[#a2c082] rounded-md text-white hover:bg-slate-400">📌</a>';
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
					<div class="flex items-center justify-center flex-row mt-5 gap-1 transition-all">
							<button id="getLocBtn" type="button" onclick="getLocation()" class="bg-[#64b3f4] text-white p-2 rounded-md hover:bg-slate-400 transition-all" data-bs-toggle="modal" data-bs-target="#exampleModal">Konfirmasi Lokasi</button>
								<?php 
									date_default_timezone_set("Asia/Bangkok");
									$jam = date("H");
									$menit = date("i");
									if ($jam >= 6 && $jam <= 15) {
										echo '<button type="submit" id="btnMasuk" class="text-white p-2 rounded-md bg-slate-400 cursor-not-allowed transition-all" title="Konfirmasi Lokasi Terlebih Dahulu" disabled>Absen Masuk</button>';
									};
								?>
						</form>
						<!-- absen masuk  -->
							
						<!-- input kegiatan -->
						<!-- <form action="<?php //echo site_url('home/absentKegiatan'); ?>" method="post"> -->
						<button type="button" id="btnKegiatan" class="text-white p-2 rounded-md bg-slate-400 cursor-not-allowed transition-all" title="Konfirmasi Lokasi Terlebih Dahulu" data-bs-toggle="modal" data-bs-target="#inputKegiatan" disabled>Input Kegiatan</button>
						<button type="button" id="btnKegiatanFile" class="text-white p-2 rounded-md bg-slate-400 cursor-not-allowed transition-all" title="Buat Data Kegiatan Harian Terlebih Hahulu" data-bs-toggle="modal" data-bs-target="#inputKegiatanFile" disabled>Upload File Kegiatan</button>
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
								if ($jam >= 15 || $jam <= 6) {
									echo '<button type="submit" id="btnKeluar" class="text-white p-2 rounded-md bg-slate-400 cursor-not-allowed transition-all" title="Konfirmasi Lokasi Terlebih Dahulu" disabled>Absen Keluar</button>';
								};
							?>
						</form>
						<!-- absen keluar -->
					</div>
					<div class="konten-profil mt-2 shadow-md py-5 transition-all w-full">
					<div class="flex flex-col">
						<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
							<div class="overflow-x-auto">
								<table class="min-w-full">
								<thead class="border-b">
									<tr>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Tanggal
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Deskripsi Kegiatan
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Surat Keterangan
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Foto Kegiatan
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Opsi
									</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($data_today as $row) { ?>
									<tr class="border-b">
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row['updated_date'] ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row['job_desc'] ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php
										foreach($get_data_doc as $doc){
											if (!empty($doc)) {
												echo '<div class="mb-3"><a href="'.site_url($doc['doc_file_ket']).'" title="" target="_blank" class="hover:text-white hover:p-1 hover:bg-sky-600 rounded-md transition-all h-10">Lihat File</a><a href="'.site_url('home/deleteDoc/'.$doc['id_doc'].'').'" class=" ml-3 p-1 bg-red-500 w-4 h-4 rounded-md hover:bg-slate-500 text-white"><ion-icon name="trash" class="m-auto"></ion-icon></a><br></div>';
												} else {
													echo 'Kosong';
												}
											};
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php
										foreach($get_data_foto as $foto){
											if (!empty($foto)) {
												echo '<div class="mb-3"><a href="'.site_url($foto['foto_file']).'" title="" target="_blank" class="hover:text-white hover:p-1 hover:bg-sky-600 rounded-md transition-all">Lihat Foto</a><a href="'.site_url('home/deleteFoto/'.$foto['id_foto'].'').'" class=" ml-3 p-1 bg-red-500 w-4 h-4 rounded-md hover:bg-slate-500 text-white"><ion-icon name="trash" class="m-auto"></ion-icon></a><br></div>';
												} else {
													echo 'Kosong';
												}
											};
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<button  title="" data-bs-toggle="modal" data-bs-target="#editKegiatan" class="text-white p-1 bg-red-600 rounded-md transition-all">Edit</a><br>
									</td>
									</tr>
									<?php } ?>
								</tbody>
								</table>
							</div>
							</div>
						</div>
						</div>
					</div>
					<!-- lihat semua kegiatan  -->
					<a href="<?= site_url('home/lihatKegiatan') ?>" class="mt-3 bg-[#64b3f4] text-white p-2 rounded-md hover:bg-slate-400 transition-all">Lihat Kegiatan</a>
					<!-- lihat semua kegiatan  -->
				</div>
				<div id="closeModal" class="profil-detail flex flex-col w-96 md:w-[300px] p-3 shadow-lg rounded-lg bg-white transition-all">
				<div class="flex justify-between">
					<div><h3>Keterangan :</h3></div>
					<div>
					<button type="button" onclick="closeSide()" class="overflow-auto text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
						<span class="sr-only">Close modal</span>
					</button>
				</div>
				</div>
					<div class="bg-[#c8dab6] p-2 rounded-md">
						Absen masuk dapat dilakukan setelah jam <b>06:00</b>. <br>
						Absen pulang hanya dapat dilakukan pada jam berikut : <br><br>
						1. Senin s.d. Kamis pada pukul <b>15.00</b>, dan <br>
						2. Jumat pada pukul <b>15.30</b> <br>
						Unggah file kegiatan online hanya diperbolehkan <b>file gambar (jpg, jpeg, png)</b>. <br>
						Unggah surat keterangan online hanya diperbolehkan <b>file pdf (pdf)</b>. <br>
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
	<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="inputKegiatan" tabindex="-1" aria-labelledby="inputKegiatan" aria-hidden="true">
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
						<textarea id="summernote" name="job_desc"></textarea>
						<!-- <textarea
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
						></textarea> -->
					</div>
					<div>
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
					<div>
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

	<!-- modal input kegiatan -->
	<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="inputKegiatanFile" tabindex="-1" aria-labelledby="inputKegiatanFile" aria-hidden="true">
		<div class="modal-dialog relative w-auto pointer-events-none">
			<div
			class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div
				class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Input File Dokumen?</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<!-- input kegiatan -->
				<form action="<?php echo site_url('home/inputKegiatanFile'); ?>" method="post" enctype="multipart/form-data">
				<div class="grid grid-cols-1 gap-4">
					<div>
					<label for="formFileSm" class="form-label inline-block mb-2 text-gray-700">File Kegiatan (foto):</label>
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
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="doc_name" type="file" name='files[]' accept="image/*" multiple>
					<label for="formFileSm" class="form-label inline-block mb-2 text-xs text-red-600 italic">*Isi dengan foto kegiatan hari ini</label>
					<input type="text" name="id_job" value="
					<?php 
						if(!empty($data_today_row->id_job)){
							echo $data_today_row->id_job;
							}else{
							echo "";
							}
						?>
					" hidden>

					</div>
					<div>
					<label for="formFileSm" class="form-label inline-block mb-2 text-gray-700">Surat Keterangan (pdf):</label>
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
					focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="doc_name" type="file" name='filesdoc[]' accept=".pdf" multiple>
					<label for="formFileSm" class="form-label inline-block mb-2 text-xs text-red-600 italic">*Kosongkan bila tidak ada surat keterangan</label>
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

	<!-- modal input kegiatan -->
	<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="editKegiatan" tabindex="-1" aria-labelledby="editKegiatan" aria-hidden="true">
		<div class="modal-dialog relative w-auto pointer-events-none">
			<div
			class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
			<div
				class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
				<h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Edit Kegiatan Hari ini</h5>
				<button type="button"
				class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
				data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body relative p-4">
				<!-- input kegiatan -->
				<form action="<?php echo site_url('home/editKegiatan/'.$data_today_row->id_job.''); ?>" method="post" enctype="multipart/form-data">
				<div class="grid grid-cols-1 gap-4">
					<div>
						<label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700">Deskripsi Kegiatan : </label>
						<textarea id="summernote-edit" name="job_desc"></textarea>
						<!-- <textarea
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
						></textarea> -->
					</div>
					<div>
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
					<div>
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
			ml-1" data-bs-dismiss="modal">Edit Data</button>
			</div>
			</form>
			</div>
		</div>
	</div>
	<script>
		$('#summernote').summernote({
		disableDragAndDrop: true,
		placeholder: 'Masukkan Kegiatan Harian',
		tabsize: 2,
		height: 120,
		toolbar: [
			['font', ['bold', 'underline', 'clear']],
		]
		});
		$('#summernote-edit').summernote({
		disableDragAndDrop: true,
		placeholder: 'Masukkan Kegiatan Harian',
		tabsize: 2,
		height: 120,
		toolbar: [
			['font', ['bold', 'underline', 'clear']],
		]
		});

		var HTMLstring = '<?php 
		if(!empty($data_today_row->job_desc)){
			echo $data_today_row->job_desc;
			}else{
			echo "";
			}
		?>';
		$('#summernote-edit').summernote('pasteHTML', HTMLstring);
    </script>
	<?php $this->load->view('template/footer'); ?>
	</body>
</html>