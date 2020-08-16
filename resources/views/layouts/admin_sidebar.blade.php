<li class=" navigation-header"><span>admin pages</span>
</li>
{{--<li class=" nav-item"><a href="{{route('account')}}"><i class="feather icon-settings"></i><span class="menu-title"--}}
{{--                                                                             data-i18n="Account Settings">Account Settings</span></a>--}}
{{--</li>--}}
<li class=" nav-item">
    <a href="{{ route('admin.create')}}">
        <i class="feather icon-user-plus"></i>
        <span class="menu-title" data-i18n="Account Settings">Create User</span>
    </a>
</li>
<li class=" nav-item">
    <a href="#">
        <i class="feather icon-user-check"></i>
        <span class="menu-title" data-i18n="Email">Manage Ads</span>
    </a>
</li>
<li class=" nav-item">
    <a href="#">
        <i class="feather icon-user-check"></i>
        <span class="menu-title" data-i18n="Email">Post New Ads</span>
    </a>
</li>
<li class=" nav-item">
    <a href="#">
        <i class="feather icon-user-check"></i>
        <span class="menu-title" data-i18n="Email">Customer Queries</span>
    </a>
</li>
<li class=" nav-item"><a href="#">
        <i class="feather icon-credit-card"></i>
        <span class="menu-title" data-i18n="Card">Sale & Free Categories</span></a>
    <ul class="menu-content">
        <li><a href="{{ route('admin.add_category')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">Add Category</span></a>
        </li>
        <li><a href="{{ route('admin.view_category')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">View Categories</span></a>
        </li>

    </ul>
</li>

<li class=" nav-item"><a href="#">
        <i class="feather icon-credit-card"></i>
        <span class="menu-title" data-i18n="Card">Business Categories</span></a>
    <ul class="menu-content">
        <li><a href="{{ route('admin.business_categories.create')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">Add Category</span></a>
        </li>
        <li><a href="{{ route('admin.business_sub_categories.create')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">Add Sub Category</span></a>
        </li>
        <li><a href="{{ route('admin.business_categories.index')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">View Categories</span></a>
        </li>
        <li><a href="{{ route('admin.business_sub_categories.index')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">View Sub Categories</span></a>
        </li>

    </ul>
</li>
