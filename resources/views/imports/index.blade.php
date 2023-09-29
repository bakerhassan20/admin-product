@extends('layouts.base')

@section('content')

@can('إدارة الصادر')
 <!-- Modal-Add -->
    <div
      class="modal fade"
      id="modal-add-import"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">أضف صادر جديد</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('imports.store','test')}}" method="post">
                    {{csrf_field()}}
          <div class="modal-body">
            <div class="row row-gap-24">
              <div class="col-sm-4">
                <label class="small-label" for=""> المنتج</label>
                <select class="form-control" name="product_id">
                   <option>اختر منتج</option>
                   @foreach ($products as $product )
                  <option value="{{ $product->id }}"> {{ $product->name }}</option>
                   @endforeach
                </select>
              </div>
              <div class="col-sm-4">
                <label class="small-label" for=""> الكمية</label>
                <input class="form-control" type="number" name="quantity"  placeholder="" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for=""> 	الجهة الصادر اليها</label>
                <select class="form-control" name="employ_id">
                   <option>اختر الجهة</option>
                   @foreach ($employs as $employ )
                  <option value="{{ $employ->id }}"> {{ $employ->name }}</option>
                   @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              style="font-size: 12px"
              data-bs-dismiss="modal"
            >
              الغاء
            </button>
            <button type="submit" class="btn-main-sm">حفظ</button>
          </div>
         </form>
        </div>
      </div>
    </div>





    <!-- Modal-edit-employ -->
  <div
      class="modal fade"
      id="modal-edit-import"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('imports.update','update')}}" method="post">
                    @method('PATCH')

                    {{csrf_field()}}

          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">تعديل صادر </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
       <div class="modal-body">
            <div class="row row-gap-24">
              <div class="col-sm-4">
                <input type="hidden" name="id" id="id" value="">

                <label class="small-label" for=""> المنتج</label>
                <select class="form-control" name="product_id" id="product_id">
                   <option value="">اختر منتج</option>
                   @foreach ($products as $product )
                  <option value="{{ $product->id }}"> {{ $product->name }}</option>
                   @endforeach
                </select>
              </div>
              <div class="col-sm-4">
                <label class="small-label" for=""> الكمية</label>
                <input class="form-control" type="number" id="quantity" name="quantity"  placeholder="" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for=""> 	الجهة الصادر اليها</label>
                <select class="form-control" name="employ_id">
                   <option value="">اختر الجهة</option>
                   @foreach ($employs as $employ )
                  <option value="{{ $employ->id }}"> {{ $employ->name }}</option>
                   @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              style="font-size: 12px"
              data-bs-dismiss="modal"
            >
              الغاء
            </button>
            <button type="submit" class="btn-main-sm">حفظ</button>
          </div>
              </form>
        </div>
      </div>
  </div>





 <!-- Modal-delete -->
    <div
      class="modal fade"
      id="modal-delete-import"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">حذف صادر</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form action="{{ route('imports.destroy', 'test3') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
          <div class="modal-body">
            <h6 class="text-center">هل انت متأكد من اجراء عملية الحذف!</h6>
            <input type="hidden" name="id" id="id" value="">

               <div class="row row-gap-24">
              <div class="col-sm-6">
                 <input type="hidden" name="product_id" id="product_id" value="">

                <label class="small-label" for="">اسم المنتج </label>
            <input class="form-control" name="productname" id="productname" type="text" readonly>
              </div>
              <div class="col-sm-6">
                <label class="small-label" for=""> اسم العميل </label>
            <input class="form-control" name="employname" id="employname" type="text" readonly>
              </div>

            </div>



          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              style="font-size: 12px"
              data-bs-dismiss="modal"
            >
              الغاء
            </button>
            <button type="submit" class="btn-main-sm">نعم</button>
          </div>
        </form>
        </div>
      </div>
    </div>








    <section class="main-section users">
      <div class="container">
        <h4 class="main-heading mt-5"> الصادر</h4>
        <form class="bg-white p-3 rounded-2 shadow">
          <div
            class="d-flex align-items-center flex-wrap justify-content-end mb-2"
          >
            <button
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#modal-add-import"
              class="btn-main-sm"
            >
              أضف صادر
              <i class="icon fa-solid fa-plus"></i>
            </button>
          </div>

          <div class="table-responsive">
            <table class="table main-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>	اسم المنتج </th>
                  <th> رقم المنتج</th>
                  <th>الكمية</th>
                  <th> التاريخ</th>
                  <th>الجهة الصادر اليها</th>
                  <th class="text-center">التحكم</th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $imports as $import)
                 <tr>

                  <td></td>
                  <td>{{ $import->product->name }}</td>
                  <td>{{ $import->product->code }}</td>
                  <td>{{ $import->quantity }}</td>
                  <td>{{ $import->created_at->format('Y/m/d') }}</td>
                  <td>{{ $import->employ->name }}</td>
                  <td>
                    <div
                      class="d-flex align-items-center justify-content-center gap-1"
                    >

                     <div
                        class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-product_id="{{ $import->product->id }}" data-employ_id="{{ $import->employ->id }}"
                        data-quantity="{{ $import->quantity }}"  data-id="{{ $import->id }}"
                        data-bs-target="#modal-edit-import"
                      >
                        تعديل
                      </div>
                      <div
                        class="btn btn-sm btn-danger"
                        data-bs-toggle="modal"
                        data-id="{{ $import->id }}" data-productname="{{ $import->product->name }}"
                        data-employname="{{ $import->employ->name }}"
                        data-bs-target="#modal-delete-import"
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
    @cannot('إدارة الصادر')
        <div class="col-md-offset-1 col-md-10 alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            ليس لديك صلاحية يرجي مراجعة المسؤول
        </div>
    @endcannot
@endsection


@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
  type="text/javascript"></script>

    <script>
    $('#modal-edit-import').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var product_id = button.data('product_id')
        var employ_id = button.data('employ_id')
        var quantity = button.data('quantity')
         var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #product_id').val(product_id);
        modal.find('.modal-body #employ_id').val(employ_id);
        modal.find('.modal-body #quantity').val(quantity);
        modal.find('.modal-body #id').val(id);
    })

</script>
  <script>
    $('#modal-delete-import').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var productname = button.data('productname')
        var employname = button.data('employname')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #productname').val(productname);
        modal.find('.modal-body #employname').val(employname);

    })

</script>
@endsection
