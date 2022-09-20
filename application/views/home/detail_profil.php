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
						  <!-- <a href="" class="text-white px-1 pb-1 pt-1 bg-[#3BACB6] rounded-md hover:bg-slate-400 transition-all">Edit Profil <ion-icon name="create-outline" class="text-lg"></ion-icon></a> -->
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
							Profil Pegawai
						</div>
                        <div class="konten-profil flex items-start justify-center pl-3 md:items-start md:justify-start flex-col md:flex-row shadow-md py-5 transition-all">
							<form action="<?php echo site_url('home/update_profil/'.$get_data_profil->id_user.''); ?>" method="post">
                            <div class="grid grid-cols-2 gap-4 w-full my-3">
                                <div>User NIP</div>
                                <div><input type="text" name="user_nip" value="<?= $get_data_profil->user_nip ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm"></div>
                                <div>Password</div>
                                <div><input type="password" name="pass" value="<?= $get_data_profil->pass ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm"></div>
                                <div>Email</div>
                                <div><input type="email" name="email" value="<?= $get_data_profil->email ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm"></div>
                            </div>
						</div>
					</div>
					<div class="flex items-start justify-start flex-row mt-5 gap-1 transition-all">
						<a href="<?= base_url('home') ?>" class="bg-sky-400 text-white p-2 rounded-md hover:bg-slate-400 transition-all">Kembali</a>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-slate-400 transition-all">Update Data</a>
					</div>
					</form>
                        </div>
					</div>
				</div>
			</div>
			<!-- flex content -->
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