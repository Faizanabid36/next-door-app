<li class=" navigation-header"><span>admin pages</span>
</li>
<li class=" nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title"
                                                                             data-i18n="Account Settings">Account Settings</span></a>
</li>
<li class=" nav-item"><a href="{{ route('create_agent')}}"><i class="feather icon-user-plus"></i><span class="menu-title"
                                                                              data-i18n="Account Settings">Create User</span></a>
</li>
<li class=" nav-item"><a href="#"><i class="feather icon-credit-card"></i><span class="menu-title"
                                                                                data-i18n="Card">Category</span></a>
    <ul class="menu-content">
        <li><a href="{{ route('add_category')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">Add Category</span></a>
        </li>
        <li><a href="{{ route('view_category')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Basic">view Category</span></a>
        </li>
    </ul>
</li>
