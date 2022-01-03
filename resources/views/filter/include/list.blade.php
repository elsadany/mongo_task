<div class="content-body">
    <section id="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Barcodes</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                           
                            <br>
                            <hr>
                            <br>
                            <table class="users-table table table-striped">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Creation Date</th>
                                        <th>Gender</th>
                                        <th>Number of Messages</th>
                                        
                                    </tr>
                                </thead>
                                
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('script')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    @deletejs
    <script>
        $(document).ready(function(){
        

            $('.edit-row').click(function(){
                var id=$(this).data('id');
                $('#span-'+id).hide();
                $('#form-'+id).show();
                $(this).hide();
                $(this).next().show();
            });
            $('.edit-cancle').click(function(){
                var id=$(this).data('id');
                $('#span-'+id).show();
                $('#form-'+id).hide();
                $(this).hide();
                $(this).prev().show();
            });
        });
    </script>
@endpush

@push('script')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    {{-- <script src="//code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.users-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf','print'
                ],
                pageLength:30,
                processing: true,
                serverSide: true,
                ajax: "{{ route('search') }}",
                columns: [
                    {data: 'user_id', name: 'user_id'},
                    {data: 'first_name', name: 'first_name'},
                    {data:'last_name',name:'last_name'},
                    {data: 'creation_date', name: 'creation_date'},
                    {data: 'gender', name: 'gender'},
                    {data: 'number_of_messages', name: 'number_of_messages'},
                    {data: 'age', name: 'age'}
                   
                ]
            });


            // $('.barcodes-table').DataTable({
            //     dom: 'Bfrtip',
            //     buttons: [
            //         'excel', 'pdf','print'
            //     ]
            // });
        });

    </script>
@endpush