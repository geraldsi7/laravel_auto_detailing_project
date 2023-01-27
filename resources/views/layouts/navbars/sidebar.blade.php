<div class="sidebar" data-color="black">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
  <div class="logo">
    <a href="{{ url('/') }}" class="font-weight-bold h5 text-white logo-normal">
      <img src="{{ asset('assets') }}/img/favicon.png" width="50">
      Admin
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li>
        <a href="{{ route('welcome') }}">
          <i class="fa-solid fa-house"></i>
          <p>home</p>
        </a>
      </li>
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>dashboard</p>
        </a>
      </li>
      <li class="@if ($activePage == 'orders') active @endif">
        <a href="{{ route('tasks.index') }}">
          <i class="now-ui-icons shopping_cart-simple"></i>
          <p>Orders</p>
        </a>
      </li>
      <li class="@if ($activePage == 'gallery') active @endif">
        <a href="{{ route('manage.gallery.index') }}">
          <i class="now-ui-icons design_image"></i>
          <p>Gallery</p>
        </a>
      </li>
      {{--
    <li class="@if ($activePage == 'invoice') active @endif">
      <a href="{{ route('invoice.index') }}">
      <i class="now-ui-icons education_paper"></i>
      <p>Invoices</p>
      </a>
      </li>
     
      <li>
        <a data-toggle="collapse" href="#menu">
          <i class="fa-solid fa-database"></i>
          <p>
            Catalogs
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if ($activePage == 'manage-category' || $activePage == 'manage-subcategory' || $activePage == 'manage-item') show @endif" id="menu">
          <ul class="nav">

            <li class="@if ($activePage == 'manage-category') active @endif">
              <a href="{{ route('category.manage.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Categories list</p>
              </a>
            </li>

            <li class="@if ($activePage == 'manage-item') active @endif">
              <a href="{{ route('item.manage.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Items list</p>
              </a>
            </li>

          </ul>
        </div> 
        

      <li>
        <a data-toggle="collapse" href="#allPersons">
          <i class="now-ui-icons users_single-02"></i>
          <p>
            All Persons
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if ($activePage == 'add-customer' || $activePage == 'manage-customer' || $activePage == 'add-user' || $activePage == 'manage-user') show @endif" id="allPersons">
          <ul class="nav">

            <li class="@if ($activePage == 'manage-customer') active @endif">
              <a href="{{ route('customers.index') }}">
        <i class="now-ui-icons design_bullet-list-67"></i>
        <p>Customers List</p>
        </a>
      </li>

      <li class="@if ($activePage == 'add-user') active @endif">
        <a href="{{ route('users.create') }}">
          <i class="now-ui-icons ui-1_simple-add"></i>
          <p>Add Staff</p>
        </a>
      </li>

      <li class="@if ($activePage == 'manage-user') active @endif">
        <a href="{{ route('users.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>Manage Staff</p>
        </a>
      </li>
      --}}
    </ul>
  </div>
  </ul>
</div>