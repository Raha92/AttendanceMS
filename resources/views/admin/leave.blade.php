session_start();
if($_SESSION['sid'] == session_id() && $_SESSION['user'] == "admin")


@extends('layouts.master')

@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title text-left">Leave</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Leave Type</a></li>


        </ol>
    </div>
@endsection
@section('button')
    <a href="check" class="btn btn-success btn-sm btn-flat"><i class="mdi mdi-plus mr-2"></i>Add New</a>
@endsection

@section('content')
@include('includes.flash')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        
                            <thead class="thead-dark">
							<!-- Log on to codeastro.com for more projects! -->
                            
                                <tr>
                                    <th style="color: red;">Sl No</th>
                                    <th style="color: red;" width="200">Employe Name</th>
                                    <th style="color: red;" width="120">Leave Type</th>

                                     <th style="color: red;" width="180">Posting Date</th>                 
                                    <th style="color: red;">Status</th>
                                    <th style="color: red;" align="center">Action</th>
                                </tr>
                           
                                </thead>
                                <tbody>

                                    

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                            </td>

                                            <td></td>
                                            <td></td>
                                        </tr>

                                  


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Log on to codeastro.com for more projects! -->
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection


@section('script')
    <!-- Responsive-table-->
	<!-- Log on to codeastro.com for more projects! -->
    <script src="{{ URL::asset('plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js') }}"></script>
 
@endsection

@section('script')
    <script>
        $(function() {
            $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
@endsection
