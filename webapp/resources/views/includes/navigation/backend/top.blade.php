<ul class="navigation">
  <li><a href="{{ asset('backoffice/dashboard') }}">Dashboard</a></li>
  <li><a href="{{ asset('backoffice/product') }}">Product</a></li>
  <li><a href="{{ asset('backoffice/user') }}">User</a></li>
  <li><a href="{{ asset('backoffice/setting') }}">Setting</a></li>
  <li>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <a href="{{ url('/logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a>
  </li>
</ul>
