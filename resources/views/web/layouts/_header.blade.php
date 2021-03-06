<nav class="navbar navbar-expand-md navbar-light shadow-sm easyedu-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'EasyEdu') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="{{ active_class(if_route('topics.index')) }}">
          <a href="{{ route('topics.index') }}" class="nav-link"> 首页<span class="sr-only"></span></a>
        </li>
        <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 1))) }}">
          <a href="{{ route('categories.show', 1) }}" class="nav-link"> 分享<span class="sr-only"></span></a>
        </li>
        <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 2))) }}">
          <a href="{{ route('categories.show', 2) }}" class="nav-link"> 教程<span class="sr-only"></span></a>
        </li>
        <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 3))) }}">
          <a href="{{ route('categories.show', 3) }}" class="nav-link"> 对话<span class="sr-only"></span></a>
        </li>
        <li class="{{ active_class((if_route('categories.show') && if_route_param('category', 4))) }}">
          <a href="{{ route('categories.show', 4) }}" class="nav-link"> 公告<span class="sr-only"></span></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto easyedu-nav-right">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">登录</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">注册</a>
          </li>
        @else
          <li class="nav-item">
            <a href="{{ route('topics.create') }}" class="nav-link">
              <span><i class="fa fa-plus"></i></span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('notifications.index') }}" class="nav-link" title="消息提醒" style="margin-top: -2px;">
              @php
                $badge = Auth::user()->notification_count > 0 ? 'danger' : 'secondary';
              @endphp
              <span class="badge badge-pill badge-{{ $badge }}">{{ Auth::user()->notification_count }}</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
              <span>
                <img class="rounded-circle" src="{{ Auth::user()->avatar }}" width="30px" height="30px" alt="头像">
              </span>
              {{ Auth::user()->name }}
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a href="{{ route('users.show', Auth::id()) }}" class="dropdown-item">
                <i class="fa fa-user"></i> 个人中心
              </a>
              <a href="{{ route('users.edit', Auth::id()) }}" class="dropdown-item">
                <i class="fa fa-edit"></i> 编辑资料
              </a>
              <a href="{{ route('logout') }}" class="dropdown-item"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> 退出登录
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
