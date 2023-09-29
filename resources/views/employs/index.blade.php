@extends('layouts.base')

@section('content')
    @can('إدارة العملاء')
    <section class="main-section users">
      <div class="container">
        <h4 class="main-heading mt-5"> العملاء</h4>
        <form class="bg-white p-3 rounded-2 shadow">
          <div
            class="d-flex align-items-center flex-wrap justify-content-end mb-2"
          >
            <button
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#modal-add-employ"
              class="btn-main-sm"
            >
              أضف عميل
              <i class="icon fa-solid fa-plus"></i>
            </button>
          </div>

          <div class="table-responsive">
            <table class="table main-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>	اسم الادارة</th>
                  <th> 	رقم الادارة</th>

                  <th class="text-center">التحكم</th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $employs as $employ)
                 <tr>

                  <td></td>
                  <td>{{ $employ->name }}</td>

                  <td>{{ $employ->phone }}</td>
                  <td>
                    <div
                      class="d-flex align-items-center justify-content-center gap-1"
                    >

                     <div
                        class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-employ_id="{{ $employ->id }}" data-employname="{{ $employ->name }}"
                        data-employphone="{{ $employ->phone }}"
                        data-bs-target="#modal-edit-employ"
                      >
                        تعديل
                      </div>
                      <div
                        class="btn btn-sm btn-danger"
                        data-bs-toggle="modal"
                        data-employ_id="{{ $employ->id }}" data-employname="{{ $employ->name }}"
                        data-bs-target="#modal-delete-employ"
                      >
                        حذف
                      </div>
                    </div>
                  </td>
                   </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </form>
      </div>
    </section>
     @endcan
    @cannot('إدارة العملاء')
        <div class="col-md-offset-1 col-md-10 alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            ليس لديك صلاحية يرجي مراجعة المسؤول
        </div>
    @endcannot
@endsection


@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
  type="text/javascript"></script>

    <script>
    $('#modal-edit-employ').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var employ_id = button.data('employ_id')
        var employname = button.data('employname')
        var employphone = button.data('employphone')
        var modal = $(this)
        modal.find('.modal-body #employ_id').val(employ_id);
        modal.find('.modal-body #employname').val(employname);
        modal.find('.modal-body #employphone').val(employphone);
    })

</script>
  <script>
    $('#modal-delete-employ').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var employ_id = button.data('employ_id')
        var employname = button.data('employname')
        var modal = $(this)
        modal.find('.modal-body #employ_id').val(employ_id);
        modal.find('.modal-body #employname').val(employname);
    })

</script>
@endsection
