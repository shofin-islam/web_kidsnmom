<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admino/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="active"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i> <span>Product</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('products.create')}}"><i class="fa fa-cubes"></i> New Product</a></li>
                    <li><a href="{{route('products.index')}}"><i class="fa fa-eye"></i> Manage Product</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i> <span>Manage Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('users.index')}}"><i class="fa fa-cubes"></i> Users</a></li>
                    <li><a href="{{route('roles.index')}}"><i class="fa fa-eye"></i> Permission</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i> <span>Expense</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{route('expenseType.index')}}"><i class="fa fa-cubes"></i> Expense Type</a></li>
                    <li><a href="{{route('expense.index')}}"><i class="fa fa-eye"></i> Expense</a></li>
                </ul>
            </li>
            <li><a href="{{route('customers.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Customers</span></a></li>
            <li><a href="{{route('sales.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Sales</span></a></li>
            <li><a href="{{route('payment.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Payment</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Reporting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href=""><i class="fa fa-check"></i> Upcomming Recovery Clients</a></li>
                    <li class=""><a href="{{url('/customers/due')}}"><i class="fa fa-ban"></i> Due Customers List</a></li>
                    <li class=""><a href=""><i class="fa fa-circle-o"></i>Sales Reports</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> My Approval</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>