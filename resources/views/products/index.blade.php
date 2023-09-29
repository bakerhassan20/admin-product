@extends('layouts.base')

@section('content')

  @can('إدارة المخزن')
 <!-- Modal-Add -->
    <div
      class="modal fade"
      id="modal-add-product"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">أضف بضاعة جديد</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('products.store','test')}}" method="post">
                    {{csrf_field()}}
          <div class="modal-body">
            <div class="row row-gap-24">
              <div class="col-sm-4">
                <label class="small-label" for="">اسم المنتج </label>
                <input class="form-control" type="text" name="name" placeholder="" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for="">رقم المنتج </label>
                <input class="form-control" type="number" name="code"  placeholder="" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for="">الكمية</label>
                <input class="form-control" type="number" name="quantity"  placeholder="" />
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
      id="modal-edit-product"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('products.update','update')}}" method="post">
                    @method('PATCH')

                    {{csrf_field()}}

          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">تعديل بضاعه </h5>
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
                 <input type="hidden" name="product_id" id="product_id" value="">

                <label class="small-label" for="">اسم المنتج </label>
                <input class="form-control" type="text" id="productname" name="name" placeholder="" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for="">رقم المنتج </label>
                <input class="form-control" type="number" id="productcode" name="code"  placeholder="" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for="">الكمية</label>
                <input class="form-control" type="number" id="productquantity" name="quantity"  placeholder="" />
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
      id="modal-delete-product"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">حذف مستخدم</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form action="{{ route('products.destroy', 'test3') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
          <div class="modal-body">
            <h6 class="text-center">هل انت متأكد من اجراء عملية الحذف!</h6>
            <input type="hidden" name="product_id" id="product_id" value="">
            <input class="form-control" name="productname" id="productname" type="text" readonly>
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
        <h4 class="main-heading mt-5"> المخزن</h4>
        <form class="bg-white p-3 rounded-2 shadow">
          <div
            class="d-flex align-items-center flex-wrap justify-content-end mb-2"
          >
            <button
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#modal-add-product"
              class="btn-main-sm"
            >
              أضف بضاعه
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

                  <th class="text-center">التحكم</th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $products as $product)
                 <tr>

                  <td></td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->code }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>
                    <div
                      class="d-flex align-items-center justify-content-center gap-1"
                    >

                     <div
                        class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-product_id="{{ $product->id }}" data-productname="{{ $product->name }}"
                        data-productcode="{{ $product->code }}" data-productquantity="{{ $product->quantity }}"
                        data-bs-target="#modal-edit-product"
                      >
                        تعديل
                      </div>
                      <div
                        class="btn btn-sm btn-danger"
                        data-bs-toggle="modal"
                        data-product_id="{{ $product->id }}" data-productname="{{ $product->name }}"
                        data-bs-target="#modal-delete-product"
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
    @cannot('إدارة المخزن')
        <div class="col-md-offset-1 col-md-10 alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            ليس لديك صلاحية يرجي مراجعة المسؤول
        </div>
    @endcannot
@endsection


@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
  type="text/javascript"></script>

    <script>
    $('#modal-edit-product').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var product_id = button.data('product_id')
        var productname = button.data('productname')
        var productcode = button.data('productcode')
        var productquantity = button.data('productquantity')
        var modal = $(this)
        modal.find('.modal-body #product_id').val(product_id);
        modal.find('.modal-body #productname').val(productname);
        modal.find('.modal-body #productcode').val(productcode);
        modal.find('.modal-body #productquantity').val(productquantity);
    })

</script>
  <script>
    $('#modal-delete-product').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var product_id = button.data('product_id')
        var productname = button.data('productname')
        var modal = $(this)
        modal.find('.modal-body #product_id').val(product_id);
        modal.find('.modal-body #productname').val(productname);
    })

</script>
@endsection
