<div class="sidebar" data-color="purple" data-image="{{ asset('assets/admin_assets/img/sidebar-1.jpg') }}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    My Projects 
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                    <x-nav-link :href="route('dashboard')">
                            <i class="material-icons">dashboard</i>
                            <p>{{ __('Dashboard') }}</p>
                    </x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :href="route('profile.edit')">
                            <i class="material-icons">person</i>
                            <p> Profile</p>
                    </x-nav-link>
                    </li>
                    @can('role-list')
                    <li>
                        <x-nav-link :href="route('roles.index')">
                            <i class="material-icons">person</i>
                            <p> Roles</p>
                    </x-nav-link>
                    </li>
                    @endcan

                    <li>
                        <x-nav-link :href="route('users.index')">
                            <i class="material-icons">dashboard</i>
                            <p> Manage Permission</p>
                    </x-nav-link>
                    </li>

                    @can('product-list')
                    <li>
                        <x-nav-link :href="route('products.index')">
                            <i class="material-icons">dashboard</i>
                            <p> Products</p>
                    </x-nav-link>
                    </li>
                    @endcan
                    
                    <li>
                        <a href="./table.html">
                            <i class="material-icons">content_paste</i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a href="./typography.html">
                            <i class="material-icons">library_books</i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li>
                        <a href="./icons.html">
                            <i class="material-icons">bubble_chart</i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a href="./maps.html">
                            <i class="material-icons">location_on</i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a href="./notifications.html">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Notifications</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>