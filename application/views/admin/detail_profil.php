<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center md:h-screen h-screen -mt-14 md:mt-5 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all mt-48 mb-20 md:my-0">
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 md:w-[384px] lg:w-[400px] xl:w-[600px] : p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Profil Pegawai
						</div>
                        <div class="konten-profil flex items-start justify-start px-3 md:items-start md:justify-start flex-col md:flex-row shadow-md py-5 transition-all">
							<form action="/admin/update_profil/<?=$get_data_profil->user_nip?>" method="post" enctype="multipart/form-data">
                            <div class="flex flex-col gap-3 w-full my-3">
                                <div>User NIP</div>
                                <div><input type="text" name="user_nip2" value="<?= $get_data_profil->user_nip ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm" disabled></div>
                                <div>Password</div>
                                <div>
									<input id="pass" type="password" name="pass" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
									<input id="pass2" type="password" value="<?= $get_data_profil->pass ?>" name="pass2" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm" hidden>
                                <label for="pass" class="text-sm italic text-red-600">*Kosongkan jika tidak ingin mengganti password</label>
                                </div>
                                <div>Email</div>
                                <div><input type="email" name="email" value="<?= $get_data_profil_unit->profile_email ?>" class="w-full px-1 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 shadow-sm">
								</div>
                                <div>Foto Profil</div>
                                <div><input class="form-control
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
									focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="foto_profil" type="file" name='files' accept="image/*">
								</div>
								<div>Unit Divisi</div>
                                <div>
									<select name="work_unit" class="form-select form-select-sm
									appearance-none
									block
									w-full
									px-2
									py-1
									text-sm
									font-normal
									text-gray-700
									bg-white bg-clip-padding bg-no-repeat
									border border-solid border-gray-300
									rounded
									transition
									ease-in-out
									m-0
									focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-sm example">
									<option value="<?= $get_data_profil_unit->work_unit ?>" selected>Open this select menu</option>
									<option value="1">Direktorat</option>
									<option value="2">Jurusan Keperawatan</option>
									<option value="3">Jurusan Kebidanan</option>
									<option value="4">Jurusan Kesehatan Gigi</option>
									<option value="5">Jurusan Ortotik Prostetik</option>
									</select>
								</div>
								<div>Akses Lihat Divisi</div>
                                <div>
									<select name="priv_unit" class="form-select form-select-sm
									appearance-none
									block
									w-full
									px-2
									py-1
									text-sm
									font-normal
									text-gray-700
									bg-white bg-clip-padding bg-no-repeat
									border border-solid border-gray-300
									rounded
									transition
									ease-in-out
									m-0
									focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-sm example">
									<option value="<?= $get_data_profil->priv_unit ?>" selected>Open this select menu</option>
									<option value="1">Direktorat</option>
									<option value="2">Jurusan Keperawatan</option>
									<option value="3">Jurusan Kebidanan</option>
									<option value="4">Jurusan Kesehatan Gigi</option>
									<option value="5">Jurusan Ortotik Prostetik</option>
									</select>
								</div>
                            </div>
						</div>
					</div>
					<div class="flex items-start justify-start flex-row mt-5 gap-1 transition-all">
						<a href="/admin/akunPegawai" class="bg-sky-400 text-white p-2 rounded-md hover:bg-slate-400 transition-all">Kembali</a>
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