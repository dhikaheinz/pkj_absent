<?php $this->load->view('template/header'); ?>

    <div id="content" class="">
		<div class="lg:my-10 flex items-center justify-center md:h-screen -mt-14 -mb-14 transition-all">
			<!-- flex content -->
			<div class="dashboard flex items-center justify-center rounded-lg flex-col md:flex-row gap-3 transition-all mt-48 mb-20 md:my-0">
				
				<div class="profil-detail flex md:items-start md:justify-start flex-col w-96 lg:w-[1200px] md:w-[384px] p-6 shadow-lg rounded-lg bg-white transition-all">
					<div class="flex md:justify-start flex-col w-full transition-all">
	  					<div class="uppercase title border-b-2 border-sky-300 font-bold shadow-md text-slate-700 transition-all">
						  Daftar Work Unit
						</div>
						<?php
							echo $this->session->flashdata('success'); 
						?>
					</div>
					<div class="konten-profil mb-3 -mt-3 shadow-md py-5 transition-all w-full">
						<!-- <hr class="border-[1px] border-black mt-2"> -->
						<div class="my-5">
							<a href="/" class="p-2 rounded-md bg-[#64b3f4] mb-3 hover:bg-slate-500 text-white">Kembali</a>
						</div>
						<div class="flex flex-col">
						<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
							<div class="overflow-x-auto">
								<table class="min-w-full display nowrap row-border" id="dataTable" style="width:100%">
								<thead class="border-b">
									<tr>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									NIP
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Nama
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Email
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Work Unit
									</th>
									<th scope="col" class="text-sm font-bold text-gray-900 px-6 py-2 text-left">
									Lihat Kegiatan
									</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($data_all as $row) { ?>
									<tr class="border-b">
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->profile_nip ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->profile_name ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
									<?= $row->profile_email ?>
									</td>
									<td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <?php
                                        if ($row->work_unit == "1") {
                                            echo "Direktorat";
                                        } else if ($row->work_unit == "2") {
                                            echo "Jurusan Keperawatan";
                                        } else if ($row->work_unit == "3") {
                                            echo "Jurusan Kebidanan";
                                        } else if ($row->work_unit == "4") {
                                            echo "Jurusan Kesehatan Gigi";
                                        } else if ($row->work_unit == "5") {
                                            echo "Jurusan Ortotik Prostetik";
                                        }
                                    ?>
									</td>
									<td>
										<a href="/workunit/detailWorkUnit/<?= $row->profile_nip ?>"><ion-icon class="text-xl hover:text-green-600" name="briefcase"></ion-icon></i></a>
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
					order: [[0, 'desc']],
                    scrollX: 200,
					buttons: [
						'excel', 'pdf'
					]
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