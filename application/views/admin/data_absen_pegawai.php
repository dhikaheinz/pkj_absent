<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="flex items-center justify-center min-h-screen h-auto transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all my-24 md:my-0">
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[auto] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
							Administrator Data Absen Pegawai
						</div>
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
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Surat Keterangan
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Foto Kegiatan
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
									<?= $row->status_absent ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?php
									// foreach ($data_all_foto as $row2){
										$dataket = explode("#", $row->doc_file_ket);
										foreach($dataket as $rowket){
											if (!empty($rowket)) {
												echo '<a href="'.site_url($rowket).'" title="" target="_blank" class="hover:text-white hover:p-1 hover:bg-sky-600 rounded-md transition-all">Lihat File</a><br>';
											} else {
												echo '<div class="p-1 bg-red-500 rounded-lg text-white text-center">Tidak Ada</div>';
											}
										};
									// }
										?>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?php
										$data = explode("#",$row->doc_file);
										foreach($data as $row){
											if (!empty($row)) {
												echo '<a href="'.site_url($row).'" title="" target="_blank" class="hover:text-white hover:p-1 hover:bg-sky-600 rounded-md transition-all">Lihat Foto</a><br>';
											} else {
												echo '<div class="p-1 bg-red-500 rounded-lg text-white text-center">Tidak Ada</div>';
											}
											
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
					<div class="flex items-center justify-center flex-row mt-2 gap-1 transition-all">
						<a href="<?= base_url('admin/dataAbsen') ?>" class="bg-[#a2c082] text-white p-5 rounded-lg hover:bg-slate-400 transition-all">Data Absensi Pegawai</a>
						<a href="<?= base_url('admin/akunPegawai') ?>" class="bg-[#a2c082] text-white p-5 rounded-lg hover:bg-slate-400 transition-all">Data Akun Pegawai</a>
					</div>
				</div>
			</div>
			<!-- flex content -->
     	</div>
    </div>
	<?php $this->load->view('template/footer'); ?>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
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
			$(document).ready(function () {
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    scrollX: 200,
                });
            });
		</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
	</body>
</html>
