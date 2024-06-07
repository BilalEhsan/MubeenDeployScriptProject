@php
$isAdmin = Auth::user()->type;
@endphp

<nav class="sidebar fixed z-50 flex-none w-[226px] h-full border-2 border-lightgray/10 transition-all duration-300">
    <div class="bg-white dark:bg-dark h-full">

        <div class="p-3.5">
            <a href="{{ route('dashboard.index') }}" class="main-logo w-full">
                <img src="{{ asset('assets/images/logo-dark.svg') }}" class="mx-auto dark-logo h-8 logo dark:hidden" alt="logo" />
                <img src="{{ asset('assets/images/logo-light.svg') }}" class="mx-auto light-logo h-8 logo hidden dark:block" alt="logo" />
                <img src="{{ asset('assets/images/logo-icon.svg') }}" class="logo-icon h-8 mx-auto hidden" alt="">
            </a>
        </div>
        <div class="flex items-center gap-1 py-2">
            <div class="h-[2px] bg-lightgray/10 dark:bg-gray/50 block flex-1"></div>
            <button type="button" class="shrink-0 btn-toggle hover:text-primary duration-300" @click="$store.app.toggleSidebar()">
                <svg class="w-3" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M5.46133 6.00002L11.1623 12L12.4613 10.633L8.05922 6.00002L12.4613 1.36702L11.1623 0L5.46133 6.00002Z" fill="currentColor" />
                    <path d="M0 6.00002L5.70101 12L7 10.633L2.59782 6.00002L7 1.36702L5.70101 0L0 6.00002Z" fill="currentColor" />
                </svg>
            </button>
        </div>
        <div class="h-[calc(100vh-93px)] overflow-y-auto overflow-x-hidden space-y-16 px-4 pt-2 pb-4">
            <ul class="relative flex flex-col gap-3 text-sm">
                @if ($isAdmin)
                <li class="menu nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link group items-center justify-between {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M10.8939 22H13.1061C16.5526 22 18.2759 22 19.451 20.9882C20.626 19.9764 20.8697 18.2827 21.3572 14.8952L21.6359 12.9579C22.0154 10.3208 22.2051 9.00229 21.6646 7.87495C21.1242 6.7476 19.9738 6.06234 17.6731 4.69182L17.6731 4.69181L16.2882 3.86687C14.199 2.62229 13.1543 2 12 2C10.8457 2 9.80104 2.62229 7.71175 3.86687L6.32691 4.69181L6.32691 4.69181C4.02619 6.06234 2.87583 6.7476 2.33537 7.87495C1.79491 9.00229 1.98463 10.3208 2.36407 12.9579L2.64284 14.8952C3.13025 18.2827 3.37396 19.9764 4.54903 20.9882C5.72409 22 7.44737 22 10.8939 22Z" fill="currentColor" />
                                <path d="M9.44666 15.397C9.11389 15.1504 8.64418 15.2202 8.39752 15.5529C8.15086 15.8857 8.22067 16.3554 8.55343 16.6021C9.52585 17.3229 10.7151 17.7496 12 17.7496C13.285 17.7496 14.4742 17.3229 15.4467 16.6021C15.7794 16.3554 15.8492 15.8857 15.6026 15.5529C15.3559 15.2202 14.8862 15.1504 14.5534 15.397C13.8251 15.9369 12.9459 16.2496 12 16.2496C11.0541 16.2496 10.175 15.9369 9.44666 15.397Z" fill="currentColor" />
                            </svg>
                            <span class="pl-1.5">Dashboard</span>
                        </div>
                    </a>
                </li>
                @endif
                <!-- <h2 class="pt-3.5 pb-2.5 text-gray text-xs">Apps</h2> -->
                <li class="menu nav-item">
                    <a href="{{ route('dashboard.operation') }}" class="nav-link group items-center justify-between {{ $activeMenu == 'operation' ? 'active' : '' }}">
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 14C18 18.4183 14.4183 22 10 22C8.76449 22 7.5944 21.7199 6.54976 21.2198C6.19071 21.0479 5.78393 20.9876 5.39939 21.0904L4.17335 21.4185C3.20701 21.677 2.32295 20.793 2.58151 19.8267L2.90955 18.6006C3.01245 18.2161 2.95209 17.8093 2.7802 17.4502C2.28008 16.4056 2 15.2355 2 14C2 9.58172 5.58172 6 10 6C14.4183 6 18 9.58172 18 14ZM6.5 15C7.05228 15 7.5 14.5523 7.5 14C7.5 13.4477 7.05228 13 6.5 13C5.94772 13 5.5 13.4477 5.5 14C5.5 14.5523 5.94772 15 6.5 15ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15ZM13.5 15C14.0523 15 14.5 14.5523 14.5 14C14.5 13.4477 14.0523 13 13.5 13C12.9477 13 12.5 13.4477 12.5 14C12.5 14.5523 12.9477 15 13.5 15Z" fill="currentColor" />
                                <path opacity="0.3" d="M17.9841 14.5084C18.092 14.4638 18.1985 14.4163 18.3033 14.3661C18.5951 14.2264 18.9256 14.1774 19.238 14.261L20.2342 14.5275C21.0193 14.7376 21.7376 14.0193 21.5275 13.2342L21.261 12.238C21.1774 11.9256 21.2264 11.595 21.3661 11.3033C21.7725 10.4545 22 9.50385 22 8.5C22 4.91015 19.0899 2 15.5 2C12.79 2 10.4673 3.6585 9.49158 6.0159C9.6597 6.00535 9.82924 6 10 6C14.4183 6 18 9.58172 18 14C18 14.1708 17.9947 14.3403 17.9841 14.5084Z" fill="currentColor" />
                            </svg>
                            <span class="pl-1.5">Operation</span>
                        </div>
                    </a>
                </li>
                @if ($isAdmin)
                <li class="menu nav-item">
                    <a href="{{ route('dashboard.sources') }}" class="nav-link group items-center justify-between {{ $activeMenu == 'sources' ? 'active' : '' }}">
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M12.4277 2C11.3139 2 10.2995 2.6007 8.27081 3.80211L7.58466 4.20846C5.55594 5.40987 4.54158 6.01057 3.98466 7C3.42773 7.98943 3.42773 9.19084 3.42773 11.5937V12.4063C3.42773 14.8092 3.42773 16.0106 3.98466 17C4.54158 17.9894 5.55594 18.5901 7.58466 19.7915L8.27081 20.1979C10.2995 21.3993 11.3139 22 12.4277 22C13.5416 22 14.5559 21.3993 16.5847 20.1979L17.2708 19.7915C19.2995 18.5901 20.3139 17.9894 20.8708 17C21.4277 16.0106 21.4277 14.8092 21.4277 12.4063V11.5937C21.4277 9.19084 21.4277 7.98943 20.8708 7C20.3139 6.01057 19.2995 5.40987 17.2708 4.20846L16.5847 3.80211C14.5559 2.6007 13.5416 2 12.4277 2Z" fill="currentColor" />
                                <path d="M12.4277 8.25C10.3567 8.25 8.67773 9.92893 8.67773 12C8.67773 14.0711 10.3567 15.75 12.4277 15.75C14.4988 15.75 16.1777 14.0711 16.1777 12C16.1777 9.92893 14.4988 8.25 12.4277 8.25Z" fill="currentColor" />
                            </svg>
                            <span class="pl-1.5">Switch sources</span>
                        </div>
                    </a>
                </li>

                <li class="menu nav-item">
                    <a href="{{ route('admin-user.index') }}" class="nav-link group items-center justify-between {{ $activeMenu == 'users' ? 'active' : '' }}">
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M12.4277 2C11.3139 2 10.2995 2.6007 8.27081 3.80211L7.58466 4.20846C5.55594 5.40987 4.54158 6.01057 3.98466 7C3.42773 7.98943 3.42773 9.19084 3.42773 11.5937V12.4063C3.42773 14.8092 3.42773 16.0106 3.98466 17C4.54158 17.9894 5.55594 18.5901 7.58466 19.7915L8.27081 20.1979C10.2995 21.3993 11.3139 22 12.4277 22C13.5416 22 14.5559 21.3993 16.5847 20.1979L17.2708 19.7915C19.2995 18.5901 20.3139 17.9894 20.8708 17C21.4277 16.0106 21.4277 14.8092 21.4277 12.4063V11.5937C21.4277 9.19084 21.4277 7.98943 20.8708 7C20.3139 6.01057 19.2995 5.40987 17.2708 4.20846L16.5847 3.80211C14.5559 2.6007 13.5416 2 12.4277 2Z" fill="currentColor" />
                                <path d="M12.4277 8.25C10.3567 8.25 8.67773 9.92893 8.67773 12C8.67773 14.0711 10.3567 15.75 12.4277 15.75C14.4988 15.75 16.1777 14.0711 16.1777 12C16.1777 9.92893 14.4988 8.25 12.4277 8.25Z" fill="currentColor" />
                            </svg>
                            <span class="pl-1.5">Administrator Settings</span>
                        </div>
                    </a>
                </li>

                <li class="menu nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link group items-center justify-between {{ $activeMenu == 'profile' ? 'active' : '' }}">
                        <div class="flex items-center">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9.99996" cy="4.99984" r="3.33333" fill="currentColor" />
                                <ellipse opacity="0.33" cx="9.99996" cy="14.1668" rx="5.83333" ry="3.33333" fill="currentColor" />
                            </svg>
                            <span class="pl-1.5">Profile Settings</span>
                        </div>
                    </a>
                </li>
                <li class="menu nav-item">
                    <a href="{{route('short-links.list')}}" class="nav-link group items-center justify-between {{ $activeMenu == 'short-links' ? 'active' : '' }}">
                        <div class="flex items-center">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9.99996" cy="4.99984" r="3.33333" fill="currentColor" />
                                <ellipse opacity="0.33" cx="9.99996" cy="14.1668" rx="5.83333" ry="3.33333" fill="currentColor" />
                            </svg>
                            <span class="pl-1.5">Short Links</span>
                        </div>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>