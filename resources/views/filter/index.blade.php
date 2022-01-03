@extends('layout.master')

@section('title','Users Search')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Users Search</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('backend/dashboard')}}">Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        Users Search
                    </li>

                </ol>
            </div>
        </div>
    </div>
  =
</div>

<div class="content-body" ><!-- Default styling start -->
@include('filter.include.search')
    <!-- Default styling end -->
    <!-- Table header styling start -->
    <div class="row" id="header-styling"  style="">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users Search</h4>


                </div>
                <div class="card-content container collapse show">

                    <div class="table-responsive">
                        <table class="table users_table  ">
                            <div class="dt-buttons">   <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span>Excel</span></button> 
                                </button>
                               </div>
                            <thead>
                                <tr>
                                       <th>User ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Creation Date</th>
                                        <th>Gender</th>
                                        <th>Number of Messages</th>
                                        <th>Age</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->creation_date}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->number_of_messages}}</td>
                            <td>{{$user->age}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                            
                        </table>
{{ $users->appends($_GET)->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
@push('script')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<!--    {{-- <script src="//code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.users_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf','print'
                ],
                pageLength:30,
                processing: true,
                serverSide: true,
                ajax: "{{ request()->getRequestUri() }}",
                columns: [
                  {data: 'id', name: 'users.id'},
                    {data: 'first_name', name: 'users.first_name'},
                    {data:'last_name',name:'users.last_name'},
                    {data: 'creation_date', name: 'users.creation_date'},
                    {data: 'gender', name: 'users.gender'},
                    {data: 'number_of_messages', name: 'users.number_of_messages'},
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

    </script>-->
@endpush