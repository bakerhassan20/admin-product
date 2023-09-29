@extends('layouts.base')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">




    @endsection
@section('content')
 @can('تنزيل التقارير')
<section class="main-section users">
    <div class="container">
    <h4 class="main-heading">التقارير</h4>
      <form class="bg-white p-3 rounded-2 shadow">
        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                            <div class="table-responsive ls-table">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                        <tr>
                                            <td>
                                    <label for="" class="small-label"> التقرير الشهري</label>
                                    <input type="month" class="form-control" name="month_h"id="month_h">

                                            </td>
                                            <td>
                                            <label for="" class="small-label"> التقرير السنوي</label>
                                            <input type="year" class="form-control" name="year_h"id="year_h">
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        <br><br>
 	<div class="row">
                			<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">

							</div>
							<div class="card-body">
								<div class="table-responsive ls-table">
									<table id="users-table" class="table table-bordered table-striped table-hover">

										<thead>
                                        <tr>
                                           <th>#</th>
                                            <th>اسم المنتج </th>
                                            <th>رقم المنتج</th>
                                            <th>الكمية</th>
                                            <th> التاريخ</th>
                                            <th>الجهة الصادر اليها</th>

                                        </tr>
										</thead>

									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
            </div>


        </form>
      </div>
    </section>
         @endcan
    @cannot('تنزيل التقارير')
        <div class="col-md-offset-1 col-md-10 alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            ليس لديك صلاحية يرجي مراجعة المسؤول
        </div>
    @endcannot
@endsection


@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
  type="text/javascript"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" defer="defer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" defer="defer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" defer="defer"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" defer="defer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer="defer"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js" defer="defer"></script>

    <script>
        $(function() {


            var abTable = $('#users-table').DataTable({
                dom: 'Bfrtip',
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                buttons: [
                    {'extend':'excel','text':'أكسيل'},
               {{--   {'extend':'pdf','text':'pdf'}, --}}
                     {'extend':'print','text':'طباعة'},
                    {'extend':'pageLength','text':'حجم العرض'},

                   ],
                    columnDefs: [{
                        targets: '_all',
                        render: function(data, type, row) {
                            if (type === 'PDF') {
                                return String(data).split(' ').reverse().join(' ');
                            }  return data;} }
                   ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json',
                },
                ajax: {
                    url: '/report/datatables',
                    data: function (d) {
                        d.searchImport= $('#users-table_filter input[type=search]').val();
                        d.monthId = $('input[name=month_h]').val();
                        d.yearId = $('input[name=year_h]').val();

                    }
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'product', name: 'product'},
                    { data: 'code', name: 'code'},
                    { data: 'quantity', name: 'quantity'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'employ', name: 'employs'},

                ]
            });
            //filtering
            $('#month_h').change(function() {
                abTable.draw();
            });
            $('#year_h').change(function() {
                abTable.draw();
            });



        });

    </script>
@endsection
