<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <div class="c-sidebar-brand-full">
            <img src="{{ asset('assets/images/logo.jpeg') }}" width="70" height="70" class="img-fluid" alt="Arti Keys"/>
        </div>
        <div class="c-sidebar-brand-minimized">
            <img src="{{ asset('assets/images/logo.jpeg') }}" width="70" height="70" class="img-fluid" alt="Arti Keys"/>
        </div>
    </div><!--c-sidebar-brand-->


    <ul class="c-sidebar-nav">
        @if (
           $logged_in_user->hasAllAccess() ||
           (
               $logged_in_user->can('admin.access.user.list') ||
               $logged_in_user->can('admin.access.user.deactivate') ||
               $logged_in_user->can('admin.access.user.reactivate') ||
               $logged_in_user->can('admin.access.user.clear-session') ||
               $logged_in_user->can('admin.access.user.impersonate') ||
               $logged_in_user->can('admin.access.user.change-password')
           )
       )
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>
        @endif
        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">@lang('System')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{--     start   --}}

        <li class="c-sidebar-nav-title">@lang('Report')</li>

        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-newspaper"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Report')" />
            <ul class="c-sidebar-nav-dropdown-items">
                @if (
                    $logged_in_user->hasAllAccess() ||
                    (
                         $logged_in_user->can('admin.subscription.subscription.list') ||
                        $logged_in_user->can('admin.subscription.subscription.list') ||
                        $logged_in_user->can('admin.subscription.subscription.update') ||
                        $logged_in_user->can('admin.subscription.subscription.delete')
                    )
                )
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.subscription.subscription.index')"
                            icon="c-sidebar-nav-icon cil-briefcase"
                            class="c-sidebar-nav-link"
                            :text="__('Subscriptions Management')"
                            :active="activeClass(Route::is('admin.subscription.subscription.*'), 'c-active')" />
                    </li>
                @endif
            </ul>
            @if (
                   $logged_in_user->hasAllAccess() ||
                   (
                       $logged_in_user->can('admin.slider.list') ||
                       $logged_in_user->can('admin.slider.store')
                   )
               )
        <li class="c-sidebar-nav-title">@lang('Sliders')</li>
        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.slider.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-image-plus"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Sliders')"/>

            <ul class="c-sidebar-nav-dropdown-items">

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.slider.index')"
                            class="c-sidebar-nav-link"
                            :text="__('Sliders Management')"
                            :active="activeClass(Route::is('admin.slider.*'), 'c-active')"/>
                    </li>

            </ul>
        </li>
            @endif
            @if (
                 $logged_in_user->hasAllAccess() ||
                 (
                     $logged_in_user->can('admin.page.list') ||
                     $logged_in_user->can('admin.page.store')
                 )
             )
        <li class="c-sidebar-nav-title">@lang('Pages')</li>
        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.page.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-file"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Pages')"/>

            <ul class="c-sidebar-nav-dropdown-items">

                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.page.index')"
                            class="c-sidebar-nav-link"
                            :text="__('Pages Management')"
                            :active="activeClass(Route::is('admin.page.*'), 'c-active')"/>
                    </li>

            </ul>
        </li>


            @endif

        @if(
          $logged_in_user->hasAllAccess() ||
              (
                  $logged_in_user->can('admin.lookups.country.list') ||
                  $logged_in_user->can('admin.lookups.country.store') ||
                  $logged_in_user->can('admin.lookups.country.update') ||
                  $logged_in_user->can('admin.lookups.country.delete')
              )
              ||
              (
                  $logged_in_user->can('admin.lookups.city.list') ||
                  $logged_in_user->can('admin.lookups.city.store') ||
                  $logged_in_user->can('admin.lookups.city.update') ||
                  $logged_in_user->can('admin.lookups.city.delete')
              )

          )

            <li class="c-sidebar-nav-title">@lang('Lookups')</li>


                        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.lookups.country.*'), 'c-open c-show') }}">
                            <x-utils.link
                                href="#"
                                icon="c-sidebar-nav-icon cil-flag-alt"
                                class="c-sidebar-nav-dropdown-toggle"
                                :text="__('Countries')"/>

                            <ul class="c-sidebar-nav-dropdown-items">
                                @if (
                                    $logged_in_user->hasAllAccess() ||
                                    (
                                        $logged_in_user->can('admin.lookups.country.list') ||
                                        $logged_in_user->can('admin.lookups.country.store') ||
                                        $logged_in_user->can('admin.lookups.country.update') ||
                                        $logged_in_user->can('admin.lookups.country.delete')
                                    )
                                )
                                    <li class="c-sidebar-nav-item">
                                        <x-utils.link
                                            :href="route('admin.lookups.country.index')"
                                            class="c-sidebar-nav-link"
                                            :text="__('Country List')"
                                            :active="activeClass(Route::is('admin.lookups.country.*'), 'c-active')"/>
                                    </li>
                                @endif

                            </ul>
                        </li>
                <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.lookups.tests.*'), 'c-open c-show') }}">
                    <x-utils.link
                        href="#"
                        icon="c-sidebar-nav-icon cil-file"
                        class="c-sidebar-nav-dropdown-toggle"
                        :text="__('Tests')"/>

                    <ul class="c-sidebar-nav-dropdown-items">
                        @if (
                            $logged_in_user->hasAllAccess() ||
                            (
                                $logged_in_user->can('admin.lookups.tests.list') ||
                                $logged_in_user->can('admin.lookups.tests.store') ||
                                $logged_in_user->can('admin.lookups.tests.update') ||
                                $logged_in_user->can('admin.lookups.tests.delete')
                            )
                        )
                            <li class="c-sidebar-nav-item">
                                <x-utils.link
                                    :href="route('admin.lookups.tests.index')"
                                    class="c-sidebar-nav-link"
                                    :text="__('Tests List')"
                                    :active="activeClass(Route::is('admin.lookups.tests.*'), 'c-active')"/>
                            </li>
                        @endif

                    </ul>
                </li>

{{--            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.lookups.city.*'), 'c-open c-show') }}">--}}
{{--                <x-utils.link--}}
{{--                    href="#"--}}
{{--                    icon="c-sidebar-nav-icon cil-location-pin"--}}
{{--                    class="c-sidebar-nav-dropdown-toggle"--}}
{{--                    :text="__('City')"/>--}}

{{--                <ul class="c-sidebar-nav-dropdown-items">--}}
{{--                    @if (--}}
{{--                        $logged_in_user->hasAllAccess() ||--}}
{{--                        (--}}
{{--                            $logged_in_user->can('admin.lookups.city.list') ||--}}
{{--                            $logged_in_user->can('admin.lookups.city.store') ||--}}
{{--                            $logged_in_user->can('admin.lookups.city.update') ||--}}
{{--                            $logged_in_user->can('admin.lookups.city.delete')--}}
{{--                        )--}}
{{--                    )--}}
{{--                        <li class="c-sidebar-nav-item">--}}
{{--                            <x-utils.link--}}
{{--                                :href="route('admin.lookups.city.index')"--}}
{{--                                class="c-sidebar-nav-link"--}}
{{--                                :text="__('Cities Management')"--}}
{{--                                :active="activeClass(Route::is('admin.lookups.city.*'), 'c-active')"/>--}}
{{--                        </li>--}}
{{--                    @endif--}}



{{--                </ul>--}}
{{--            </li>--}}

        @endif

            @if (
                               $logged_in_user->hasAllAccess() ||
                               (
                                   $logged_in_user->can('admin.websiteSetting')

                               )
                           )

        <li class="c-sidebar-nav-title">@lang('Information')</li>
        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.websiteSetting.edit'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon cil-info"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Main Information')"/>

            <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.websiteSetting.edit',1)"
                            class="c-sidebar-nav-link"
                            :text="__('Edit Main Settings')"
                            :active="activeClass(Route::is('admin.websiteSetting.*'), 'c-active')"/>
                    </li>
            </ul>
        </li>
            @endif
        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
