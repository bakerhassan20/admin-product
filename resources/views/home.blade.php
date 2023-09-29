@extends('layouts.base')

@section('content')
    <!-- Start Section -->
    <section class="main-section home h-100vh">
      <div class="container">
        <h4 class="main-heading">الرئيسية</h4>


        <div class="row row-gap-24 mb-4 boxes-info mt-5">
        @can('إدارة المخزن')
          <div class="col-sm-6 col-md-3">
            <a href="{{ route('products.index') }}">
              <div class="box-info blue">
                <i class="fas fa-coins bg-icon"></i>
                <div class="text">المخزن</div>
                <div class="num">{{ App\Models\Product::count() }}</div>

              </div>
            </a>
          </div>
        @endcan
        @can('إدارة الصادر')
          <div class="col-sm-6 col-md-3">
            <a href="{{ route('imports.index') }}">
              <div class="box-info green">
                <i class="fa-solid fa-box-open bg-icon"></i>
                <div class="text">الصادر </div>
                <div class="num">{{ App\Models\Import::count() }}</div>

              </div>
            </a>
          </div>
        @endcan

        @can('إدارة المسؤولين')
           <div class="col-sm-6 col-md-3">
            <a href="{{ route('users.index') }}">
              <div class="box-info red">
                <i class="fa-solid fa-users-gear bg-icon"></i>
                <div class="text">المستخدمين</div>
                <div class="num">{{ App\Models\User::count() }}</div>

              </div>
            </a>
          </div>
        @endcan
        @can('إدارة العملاء')
           <div class="col-sm-6 col-md-3">
            <a href="{{ route('employs.index') }}">
              <div class="box-info ">
                <i  style="color:#f0790f" class="fa-solid fa-users bg-icon"></i>
                <div class="text">العملاء</div>
                <div class="num">{{ App\Models\Employ::count() }}</div>

              </div>
            </a>
          </div>
        @endcan
                @can('النسخ الاحتياطي')
          <div class="col-sm-6 col-md-3">
            <a href="">
              <div class="box-info pur">
                <i class="fa-solid fa-paste bg-icon"></i>
                <div class="text">النسخ الاحتياطي</div>
             <div class="num">00.00</div>

              </div>
            </a>
          </div>
        @endcan
        </div>
      </div>
    </section>
    <!-- End Section -->
@endsection
