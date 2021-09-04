<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

  <!-- DataTables  & Plugins -->
        <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                var tabel_komoditas = $("#tabel_komoditas").DataTable({
                    bAutoWidth: true,
                    // processing: true,
                    serverSide: true,
                    ajax: "{{ route('json.komoditas') }}",
                    
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                        {data: 'kategori_komoditas_detail.keterangan', name: 'kategori_cabai'},
                        {data: 'harga_harapan', name: 'harga_harapan'},
                        {data: 'kuantitas', name: 'kuantitas'},
                        {data: 'harga_jual', name: 'harga_jual'},
                        {data: 'user_info.nama', name: 'petani'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
    
                // $('body').on('click', '.edit-cut-off-time', function(){
                //     var id = this.id;
                //     $('#form-add').attr('action', "#");
                //     $('#form-add').trigger('reset');
                //     $('#action_row').show();
    
                //     $.ajax({
                //         url: "{{ url('setup/get-cut-off-time-setting') }}/"+id,
                //         type: "GET",
                //         success: function(response){
                //             $("#transaction_id").val(response.id);
                //             $('#jenis_transaksi').val(response.jenis_transaksi);
                //             $('#jenis_transaksi').prop('disabled', true);
                //             $('#waktu_berakhir').val(checkTimeNull(response.cut_off_time_cms.start_time));
                //             $('#waktu_mulai').val(checkTimeNull(response.cut_off_time_cms.end_time));
                //             $('input[id="checkbox-primary-1"]').prop('checked', response.cut_off_time_cms.business_day_only);
                //             $('#checkbox-primary-1').change(function(){
                //                 if(this.checked){
                //                     $(this).val(true);
                //                 }else{
                //                     $(this).val(false);
                //                 }
                //             });
                //             $('#modalAdd').modal('show');
                //         },
                //         error: function(response){
                //             alert('Error'+response);
                //         }
                //     });
                // });
    
            });
        </script>