<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center md:h-screen -mt-14 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all mt-48 mb-20 md:my-0">
				
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[1200px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Rekam Pegawai
						</div>
						<?php
							echo $this->session->flashdata('success'); 
						?>
						
					</div>
					<div class="konten-profil mt-2 shadow-md py-5 transition-all w-full">
						<div class="mb-3">
							<a href="#" onclick="history.back()" class="p-2 rounded-md bg-[#64b3f4] mb-3 hover:bg-slate-500 text-white">Kembali</a>
						</div>
						<div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
							<div class="overflow-x-auto">
								<table class="min-w-full">
								<thead class="border-b">
									<tr>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									File Document
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									File Foto
									</th>
									</tr>
								</thead>
								<tbody>
									<tr class="border-b">
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php
										foreach($data_doc as $doc){
											if (!empty($doc)) {
												echo '<div class="mb-3"><a href="/'.$doc['doc_file_ket'].'" title="" target="_blank" class="hover:text-white hover:p-1 hover:bg-sky-600 rounded-md transition-all h-10">Lihat File</a><a href="/home/deleteDoc/'.$doc['id_doc'].'" class=" ml-3 p-1 bg-[#a2c082] w-4 h-4 rounded-md hover:bg-slate-500 text-white"><ion-icon name="trash" class="m-auto"></ion-icon></a><br></div>';
												} else {
													echo 'Kosong';
												}
											};
										?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
										<?php
										foreach($data_foto as $foto){
											if (!empty($foto)) {
												echo '<div class="mb-3"><a href="/'.$foto['foto_file'].'" title="" target="_blank" class="hover:text-white hover:p-1 hover:bg-sky-600 rounded-md transition-all">Lihat Foto</a><a href="/home/deleteFoto/'.$foto['id_foto'].'" class=" ml-3 p-1 bg-[#a2c082] w-4 h-4 rounded-md hover:bg-slate-500 text-white"><ion-icon name="trash" class="m-auto"></ion-icon></a><br></div>';
												} else {
													echo 'Kosong';
												}
											};
										?>
									</td>
									</tr>
								</tbody>
								</table>
							</div>
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
				<form action="/home/inputKegiatan" method="post" enctype="multipart/form-data">
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