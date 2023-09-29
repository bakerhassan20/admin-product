    <nav class="top-nav">
      <div class="container">
        <a href="#" class="tog-show" data-show=".top-nav .list-item"
          ><i class="fa-solid fa-bars"></i
        ></a>
        <ul class="list-item">
          <li>
            <a class="item" href="{{ route('home') }}">
              الرئيسية
              <i class="i-item fa-solid fa-house"></i>
            </a>
          </li>
          @can('إدارة المخزن')
        <li>
            <a class="item" href="{{ route('products.index') }}">
              المخزن
              <i class="fas fa-coins i-item"></i>
            </a>
          </li>
          @endcan
          @can('إدارة المسؤولين')
          <li>
            <a class="item" href="{{ route('users.index') }}">
              ادراة الموظفين
              <i class="fa-solid fa-users-gear i-item"></i>
            </a>
          </li>
            @endcan
          @can('الصلاحيات')
            <li>
            <a class="item" href="{{ route('roles.index') }}">
               الصلاحيات
              <i class="fa-solid fa-users-gear i-item"></i>
            </a>
          </li>
        @endcan
          @can('إدارة العملاء')
          <li>
            <a class="item" href="{{ route('employs.index') }}">
              العملاء
              <i class="fa-solid fa-users i-item"></i>
            </a>
          </li>
           @endcan
          @can('إدارة الصادر')
          <li>
            <a class="item" href="{{ route('imports.index') }}">
              الصادر
              <i class="fa-solid fa-box-open i-item"></i>
            </a>
          </li>
         @endcan
          @can('تنزيل التقارير')
          <li>
            <a class="item" href="{{ route('report.index') }}">
              التقارير
              <i class="fa-solid fa-file i-item"></i>
            </a>
          </li>
        @endcan
          @can('النسخ الاحتياطي')
          <li>
            <a class="item" href="#">
              النسخ الاحتياطي
              <i class="fa-solid fa-paste i-item"></i>
            </a>
          </li>
        @endcan
        </ul>
        <div class="dropdown-hover" data-show="dropdown-lang">
          <div class="icon-drop">
            <i class="fa-solid fa-user icon"></i>
          </div>
          <p class="text">{{ auth::user()->name }}</p>
          <div class="arrow-icon">
            <i class="fa-solid fa-angle-down"></i>
          </div>
          <ul class="listis-item" id="dropdown-lang">
              <li class="item-drop">
              <a href="{{ route('profile') }}">
                <p class="text">اعدادات الحساب</p>
              </a>
            </li>
            <li class="item-drop">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><p class="text">تسجيل خروج</p></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
            </li>

          </ul>
        </div>
      </div>
    </nav>
