{{--

<!-- Modal-permision -->
<div
      class="modal fade"
      id="modal-permision"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">الصلاحيات</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row row-gap-24">
              <div class="col-sm-6 col-md-4">
                <div class="form-check">
                  <label class="form-check-label" for="flexCheckDefault">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                    />
                    إدارة المخزن
                  </label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-check">
                  <label class="form-check-label" for="flexCheckDefault">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                    />
                    إدارة الصادر
                  </label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-check">
                  <label class="form-check-label" for="flexCheckDefault">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                    />
                    تنزيل التقارير
                  </label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-check">
                  <label class="form-check-label" for="flexCheckDefault">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                    />
                    النسخ الاحتياطي
                  </label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-check" dir="rtl">
                  <label class="form-check-label" for="flexCheckDefault">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                    />
                    إدارة العملاء
                  </label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-check" dir="rtl">
                  <label class="form-check-label" for="flexCheckDefault">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                    />
                    إدارة المسؤولين
                  </label>
                </div>
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
            <button type="button" class="btn-main-sm">حفظ</button>
          </div>
        </div>
      </div>
  </div> --}}







<?php
$roles =Spatie\Permission\Models\Role::pluck('name','name')->all();
?>

     <!-- Modal-add-admin -->
  <div
      class="modal fade"
      id="modal-add-admin"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('users.store','test')}}" method="post">
                    {{csrf_field()}}
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">أضف مسؤال جديد</h5>
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
                <label class="small-label" for="">اسم المستخدم </label>
                <input class="form-control" type="text" name="name" required="" placeholder="" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for="">الرقم السري </label>
                <input class="form-control" name="password" required="" type="password" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for="">تاكيد الرقم السري</label>
                <input class="form-control"   name="confirm-password" required="" type="password" />
              </div>
              <div class="col-sm-4">
                <label class="small-label" for="">رقم الهاتف </label>
                <input class="form-control" type="number"name="phone" required=""  placeholder="" />
              </div>
            <div class="col-sm-4">
                <label class="small-label" for=""> البريد الاكتروني</label>
                <input class="form-control" type="email" name="email" required="" />
              </div>
            <div class="col-sm-4">
                <label class="small-label" for=""> الصلاحيه</label>
                {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control')) !!}
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



    <!-- Modal-edit -->
<div
      class="modal fade"
      id="modal-edit"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              تعديل حساب العامل
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row row-gap-24">
              <div class="col-sm-6">
                <label class="small-label" for="">اسم الحساب </label>
                <input class="form-control" type="text" placeholder="" />
              </div>
              <div class="col-sm-6">
                <label class="small-label" for="">رقم السري </label>
                <input class="form-control" type="text" placeholder="" />
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
            <button type="button" class="btn-main-sm">حفظ</button>
          </div>
        </div>
      </div>
</div>




    <!-- Modal-delete -->
    <div
      class="modal fade"
      id="modal-delete"
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
          <form action="{{ route('users.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
          <div class="modal-body">
            <h6 class="text-center">هل انت متأكد من اجراء عملية الحذف!</h6>
            <input type="hidden" name="user_id" id="user_id" value="">
            <input class="form-control" name="username" id="username" type="text" readonly>
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






    <!-- Modal-add-employ -->
  <div
      class="modal fade"
      id="modal-add-employ"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('employs.store','test')}}" method="post">
                    {{csrf_field()}}
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">أضف عميل جديد</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

             <div class="modal-body">
            <div class="row row-gap-24">
              <div class="col-sm-12 col-md-6">
                <label class="small-label" for="">اسم الادارة </label>
                <input class="form-control" type="text" name="name" required="" placeholder="" />
              </div>
              <div class="col-sm-12 col-md-6">
                <label class="small-label" for="">رقم الادارة </label>
                <input class="form-control" type="number"name="phone" required="" placeholder="" />
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
      id="modal-edit-employ"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{route('employs.update','update')}}" method="post">
                    @method('PATCH')

                    {{csrf_field()}}

          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">تعديل عميل </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

             <div class="modal-body">
            <div class="row row-gap-24">
              <div class="col-sm-12 col-md-6">
                 <input type="hidden" name="employ_id" id="employ_id" value="">
                <label class="small-label" for="">اسم الادارة </label>
                <input class="form-control" type="text" id="employname" name="name" required="" placeholder="" />
              </div>
              <div class="col-sm-12 col-md-6">
                <label class="small-label" for="">رقم الادارة </label>
                <input class="form-control" type="number" id="employphone" name="phone" required="" placeholder="" />
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
      id="modal-delete-employ"
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
          <form action="{{ route('employs.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
          <div class="modal-body">
            <h6 class="text-center">هل انت متأكد من اجراء عملية الحذف!</h6>
            <input type="hidden" name="employ_id" id="employ_id" value="">
            <input class="form-control" name="employname" id="employname" type="text" readonly>
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







