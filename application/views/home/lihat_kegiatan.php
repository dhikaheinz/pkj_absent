<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center md:h-screen -mt-14 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all mt-48 mb-20 md:my-0">
				
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[1200px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Absen Pegawai
						</div>
						<?php
							echo $this->session->flashdata('success'); 
						?>
						
					</div>
					<div class="konten-profil mt-2 shadow-md py-5 transition-all w-full">
						<div class="mb-3">
							<a href="<?= base_url() ?>" class="p-2 rounded-md bg-[#64b3f4] mb-3 hover:bg-slate-500 text-white">Kembali</a>
						</div>
						<div class="flex flex-col">
						<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
							<div class="overflow-x-auto">
								<table class="min-w-full display nowrap row-border" id="dataTable" style="width:100%">
								<thead class="border-b">
									<tr>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Tanggal
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									NIP
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Absen Masuk
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Absen Keluar
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Loc Keluar
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Loc Keluar
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Deskripsi Kegiatan
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Status
									</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($data_all as $row) { ?>
									<tr class="border-b">
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->updated_date ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->job_nip ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->attendance_entry ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->attendance_return ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php
										if (!empty($row->location_entry)) {
											echo '<a href="https://google.com/maps/place/'.$row->location_entry.'" target="_blank" class="p-1 m-2 bg-[#64b3f4] rounded-full text-white hover:bg-slate-400">&nbsp;Lokasi 📌</a>';
										} else {
											echo '';
										}
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?php
										if (!empty($row->location_return)) {
											echo '<a href="https://google.com/maps/place/'.$row->location_return.'" target="_blank" class="p-1 m-2 bg-[#64b3f4] rounded-full text-white hover:bg-slate-400">&nbsp;Lokasi 📌</a>';
										} else {
											echo '';
										}
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->job_desc ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php 
											if ($row->status_absent == "1") {
												echo 'Masuk';
											} else if ($row->status_absent == "2") {
												echo 'Dinas Luar';
											} else if ($row->status_absent == "3") {
												echo 'Izin';
											}else if ($row->status_absent == "4") {
												echo 'Sakit';
											}
										?>
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
					<label for="formFileSm" class="form-label inline-block mb-2 text-gray-700">Foto Kegiatan :</label>
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
	  $(document).ready(function () {
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    scrollX: 200,
                });
            });
    </script>
	<?php $this->load->view('template/footer'); ?>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
	</body>
</html>