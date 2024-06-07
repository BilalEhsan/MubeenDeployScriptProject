<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@include('dashboard.partials.header')

<body x-data="main" class="font-inter text-base antialiased font-medium relative vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '',$store.app.mode]">

    <!--..:: Start Layout ::..-->
    <div class="bg-white dark:bg-dark text-dark dark:text-white">

        <!--..:: Start Menu Sidebar Olverlay ::..-->
        <div x-cloak class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-40 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
        <!--..:: End Menu Sidebar Olverlay ::..-->

        <!--..:: Start Main Content ::..-->
        <div class="main-container flex mx-auto">
            <!--..:: Start Sidebar ::..-->
            @include('dashboard.partials.sidebar')
            <!--..:: End sidebar ::..-->

            <!--..:: Start Content Area ::..-->
            <div class="main-content flex-1">
                <!--..:: Start Topbar ::..-->
                @include('dashboard.partials.topbar')
                <!--..:: End Topbar ::..-->

                <!--..:: Start Content ::..-->
                <div class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-5 sm:p-7 space-y-5">

                    <!--..:: Start All Card ::..-->
                    @yield('content')
                    <!--..:: End All Card ::..-->

                    <!--..:: Start Footer ::..-->
                    @include('dashboard.partials.footer')
                    <!--..:: End Footer ::..-->

                </div>
                <!--..:: End Content ::..-->
            </div>
            <!--..:: End Content Area ::..-->
        </div>
    </div>
    <!--..:: End Layout ::..-->

    @yield('extrajs')

    <!--..:: All javascirpt ::..-->
    @include('dashboard.partials.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('4e74589b75961525aea2', {
            cluster: 'ap2',
        });
    </script>



    @if(auth()->user()->type == 1)
    <script>
        var channel1 = pusher.subscribe('activity-updates');
        channel1.bind('activity-updates', function(data) {
            // alert(JSON.stringify(data.message));
            $("#active-users-count").text(data.counts);
            $.toast({
                heading: 'Information',
                text: data.popupMessage,
                icon: data.popupType,
                loader: true, // Change it to false to disable loader
                loaderBg: '#9EC600', // To change the background
                position: 'top-right',
                hideAfter: 5000,
                allowToastClose: true
            })
            // console.log(data);
        });
    </script>
    @endif
    <script>
        var channelLogout = pusher.subscribe('logout-user');
        channelLogout.bind('logout-user', function(data) {
            // console.log(data);if
            if (data.user_id == "{{auth()->user()->id}}") {
                document.getElementById('logout-form').submit();
                console.log('this user should be logged out')
            }
        });
    </script>
</body>

</html>