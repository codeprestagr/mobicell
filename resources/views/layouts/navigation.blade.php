
<aside id="app-menu"
       class="hs-overlay fixed inset-y-0 start-0 z-[60] hidden w-64 -translate-x-full transform overflow-y-auto  bg-white transition-all duration-300 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">
    <div class="sticky top-0 flex h-16 items-center justify-center px-6">

        <a href="{{route('dashboard')}}" class="flex">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="flex h-10">
        </a>

    </div>


    <div class="hs-accordion-group h-[calc(100%-72px)] p-4 ps-0" data-simplebar>
        <ul class="admin-menu flex w-full flex-col gap-1.5">
            <li class="menu-item">
                <x-nav-link
                    :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Dashboard</i>
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            @if($user->isSuperAdmin() || $user->can('stores.index'))
                <li class="menu-item">
                    <x-nav-link
                        :href="route('stores.index')" :active="request()->routeIs('stores.index')">
                        <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Store</i>
                        {{ __('Stores') }}
                    </x-nav-link>
                </li>
            @endif


            @if($user->isSuperAdmin() || $user->can('roles.index') || $user->can('employees.index')
       || $user->can('roles.index') || $user->can('permissions.index'))
                <li class="hs-accordion menu-item">
                    <a href="javascript:void(0)"
                       class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium
                                text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100
                            @if(request()->routeIs('employees.index', 'employees.create', 'roles.index','roles.create','permissions.index',
'permissions.create'))
                            active @endif">
                        <i
                            class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">Groups</i>
                        <span class="menu-text"> {{ __('Team') }} </span>
                        <span
                            class="ti ti-chevron-right ms-auto text-sm transition-all hs-accordion-active:rotate-90"></span>
                    </a>

                    <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
                        <ul class="mt-2 space-y-2">
                            @if($user->isSuperAdmin() || $user->can('employees.index'))
                                <li class="menu-item">
                                    <x-dropdown-link :href="route('employees.index')"
                                                           :active="request()->routeIs('employees.index')">
                                        <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                        <span class="menu-text">{{ __('Employees') }}</span>
                                    </x-dropdown-link>
                                </li>
                            @endif

                                @if($user->isSuperAdmin() || $user->can('roles.index'))
                                    <li class="menu-item">
                                        <x-dropdown-link :href="route('roles.index')"
                                                         :active="request()->routeIs('roles.index')">
                                            <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                            <span class="menu-text">{{ __('Roles') }}</span>
                                        </x-dropdown-link>
                                    </li>
                                @endif

                                @if($user->isSuperAdmin() || $user->can('permissions.index'))
                                    <li class="menu-item">
                                        <x-dropdown-link :href="route('permissions.index')"
                                                         :active="request()->routeIs('permissions.index')">
                                            <i class="ti ti-circle-filled scale-[.25] text-lg"></i>
                                            <span class="menu-text">{{ __('Permissions') }}</span>
                                        </x-dropdown-link>
                                    </li>
                                @endif
                        </ul>
                    </div>
                </li>
            @endif

        </ul>
    </div>


</aside>
