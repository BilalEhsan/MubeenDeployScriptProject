@extends('dashboard.layouts.app')

@section('content')
<div class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-5 sm:p-7 space-y-5">

    <!--..:: Start All Card ::..-->
    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                    <div class="flex items-center gap-2.5">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6679 7C15.6679 6.58579 16.0037 6.25 16.4179 6.25H22C22.4142 6.25 22.75 6.58579 22.75 7V12.5458C22.75 12.96 22.4142 13.2958 22 13.2958C21.5858 13.2958 21.25 12.96 21.25 12.5458V7.75H16.4179C16.0037 7.75 15.6679 7.41421 15.6679 7Z" fill="#267DFF" />
                                <path opacity="0.3" d="M20.1873 7.75L14.0916 13.8027C13.5778 14.3134 13.2447 14.6423 12.9673 14.8527C12.7073 15.0499 12.5857 15.072 12.5052 15.072C12.4247 15.072 12.3031 15.0499 12.0431 14.8526C11.7658 14.6421 11.4327 14.3132 10.919 13.8024L10.6448 13.5296C10.1755 13.063 9.77105 12.6607 9.40375 12.382C9.01003 12.0832 8.57254 11.8572 8.03395 11.8574C7.49535 11.8576 7.05802 12.0839 6.66452 12.383C6.29742 12.662 5.89326 13.0645 5.42433 13.5315L1.47078 17.4686C1.17728 17.7608 1.17628 18.2357 1.46856 18.5292C1.76084 18.8227 2.23571 18.8237 2.52922 18.5314L6.44789 14.6292C6.96167 14.1175 7.29478 13.7881 7.57219 13.5772C7.83228 13.3795 7.95393 13.3574 8.03449 13.3574C8.11506 13.3573 8.23672 13.3794 8.49695 13.5769C8.77452 13.7875 9.10787 14.1167 9.62203 14.628L9.89627 14.9007C10.3651 15.367 10.7692 15.7688 11.1362 16.0474C11.5297 16.346 11.9668 16.5719 12.505 16.572C13.0432 16.572 13.4804 16.3462 13.8739 16.0477C14.241 15.7692 14.6452 15.3674 15.1142 14.9013L21.2501 8.80858V7.75H20.1873Z" fill="#267DFF" />
                            </svg>
                        </span>
                        <p class="font-semibold">Account Reach</p>
                    </div>
                    <div class="flex items-center gap-2.5 xl:gap-[30px] flex-wrap">
                        <span class="text-lg font-bold">
                            404K
                        </span>
                        <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                            <span class="bg-success/10 text-success flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                                3.47%
                                <span class="">
                                    <svg width="10" height="10" class="inline-block" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                    <div class="flex items-center gap-2.5">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.3" cx="15" cy="6" r="3" fill="#7B6AFE" />
                                <ellipse opacity="0.3" cx="16" cy="17" rx="5" ry="3" fill="#7B6AFE" />
                                <circle cx="9.00098" cy="6" r="4" fill="#7B6AFE" />
                                <ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="#7B6AFE" />
                            </svg>
                        </span>
                        <p class="font-semibold">Followers</p>
                    </div>
                    <div class="flex items-center gap-2.5 xl:gap-[30px] flex-wrap">
                        <span class="text-lg font-bold">
                            300K
                        </span>
                        <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                            <span class="bg-danger/10 text-danger flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                                2.14%
                                <span class="">
                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.23684 0.789474C6.23684 0.353459 5.88338 0 5.44737 0C5.01135 0 4.65789 0.353459 4.65789 0.789474L4.65789 7.30457L2.84772 5.49439C2.53941 5.18608 2.03954 5.18608 1.73123 5.49439C1.42292 5.8027 1.42292 6.30257 1.73123 6.61087L4.88913 9.76877C5.03718 9.91682 5.23799 10 5.44737 10C5.65675 10 5.85756 9.91682 6.00561 9.76877L9.16351 6.61087C9.47181 6.30257 9.47181 5.8027 9.16351 5.49439C8.8552 5.18608 8.35533 5.18608 8.04702 5.49439L6.23684 7.30457V0.789474Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                    <div class="flex items-center gap-2.5">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.2696 16.265L20.9751 12.1852C21.1514 11.1662 20.3677 10.2342 19.3348 10.2342H14.1537C13.6402 10.2342 13.2491 9.77328 13.3323 9.26598L13.9949 5.22142C14.1026 4.56435 14.0719 3.892 13.9047 3.24752C13.7662 2.71364 13.3543 2.28495 12.8126 2.11093L12.6676 2.06435C12.3402 1.95918 11.9829 1.98365 11.6742 2.13239C11.3344 2.29611 11.0859 2.59473 10.9938 2.94989L10.518 4.78374C10.3667 5.36723 10.1462 5.93045 9.86194 6.46262C9.44659 7.24017 8.8044 7.86246 8.13687 8.43769L6.69813 9.67749C6.29247 10.0271 6.07944 10.5506 6.1256 11.0844L6.93776 20.4771C7.01226 21.3386 7.73256 22 8.59634 22H13.245C16.7263 22 19.6973 19.5744 20.2696 16.265Z" fill="#FF51A4" />
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2.96767 9.48508C3.36893 9.46777 3.71261 9.76963 3.74721 10.1698L4.71881 21.4063C4.78122 22.1281 4.21268 22.7502 3.48671 22.7502C2.80289 22.7502 2.25 22.1954 2.25 21.5129V10.2344C2.25 9.83275 2.5664 9.5024 2.96767 9.48508Z" fill="#FF51A4" />
                            </svg>
                        </span>
                        <p class="font-semibold">Likes</p>
                    </div>
                    <div class="flex items-center gap-2.5 xl:gap-[30px] flex-wrap">
                        <span class="text-lg font-bold">
                            340K
                        </span>
                        <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                            <span class="bg-danger/10 text-danger flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                                1.42%
                                <span class="">
                                    <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.23684 0.789474C6.23684 0.353459 5.88338 0 5.44737 0C5.01135 0 4.65789 0.353459 4.65789 0.789474L4.65789 7.30457L2.84772 5.49439C2.53941 5.18608 2.03954 5.18608 1.73123 5.49439C1.42292 5.8027 1.42292 6.30257 1.73123 6.61087L4.88913 9.76877C5.03718 9.91682 5.23799 10 5.44737 10C5.65675 10 5.85756 9.91682 6.00561 9.76877L9.16351 6.61087C9.47181 6.30257 9.47181 5.8027 9.16351 5.49439C8.8552 5.18608 8.35533 5.18608 8.04702 5.49439L6.23684 7.30457V0.789474Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                    <div class="flex items-center gap-2.5">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M21 11.0975V16.0909C21 19.1875 21 20.7358 20.2659 21.4123C19.9158 21.735 19.4739 21.9377 19.0031 21.9915C18.016 22.1045 16.8633 21.0849 14.5578 19.0458C13.5388 18.1445 13.0292 17.6938 12.4397 17.5751C12.1494 17.5166 11.8506 17.5166 11.5603 17.5751C10.9708 17.6938 10.4612 18.1445 9.44216 19.0458C7.13673 21.0849 5.98402 22.1045 4.99692 21.9915C4.52615 21.9377 4.08421 21.735 3.73411 21.4123C3 20.7358 3 19.1875 3 16.0909V11.0975C3 6.80891 3 4.6646 4.31802 3.3323C5.63604 2 7.75736 2 12 2C16.2426 2 18.364 2 19.682 3.3323C21 4.6646 21 6.80891 21 11.0975Z" fill="#FF7C51" />
                                <path d="M9 5.25C8.58579 5.25 8.25 5.58579 8.25 6C8.25 6.41421 8.58579 6.75 9 6.75H15C15.4142 6.75 15.75 6.41421 15.75 6C15.75 5.58579 15.4142 5.25 15 5.25H9Z" fill="#FF7C51" />
                            </svg>
                        </span>
                        <p class="font-semibold">Saved</p>
                    </div>
                    <div class="flex items-center gap-2.5  xl:gap-[30px] flex-wrap">
                        <span class="text-lg font-bold">
                            140K
                        </span>
                        <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                            <span class="bg-success/10 text-success flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                                6.70%
                                <span class="">
                                    <svg width="10" height="10" class="inline-block" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-5">
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <h2 class="font-semibold">Visitors Overview</h2>
                    <p class="text-lightgray">Aug 25- Sep 25
                        <span>
                            <svg width="20" height="20" class="inline-block" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.91895 10.337L9.69134 13.1959C9.86896 13.3791 10.1311 13.3791 10.3087 13.1959L15.6668 7.67055C16.0011 7.32577 15.7984 6.66666 15.3581 6.66666H10.5893L6.91895 10.337Z" fill="currentColor" />
                                <path opacity="0.5" d="M9.41073 6.66666H4.64191C4.20156 6.66666 3.9989 7.32577 4.33324 7.67055L6.33873 9.73866L9.41073 6.66666Z" fill="currentColor" />
                            </svg>
                        </span>
                    </p>
                    <div class="grid grid-cols-2 gap-5 mt-[30px]">
                        <div class="text-center">
                            <div id="visitors"></div>
                            <p class="text-gray text-sm mt-4">Campaign</p>
                            <p class="font-semibold mt-2 text-lg">80%</p>
                        </div>
                        <div class="text-center">
                            <div id="direct"></div>
                            <p class="text-gray text-sm mt-4">Direct</p>
                            <p class="font-semibold mt-2 text-lg">20%</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <h2 class="font-semibold">Visitors Overview</h2>
                    <div class="grid grid-cols-2 items-center gap-5">
                        <div id="photoclick"></div>
                        <div>
                            <p class="text-gray text-sm mt-4">Photo Clicks</p>
                            <p class="font-semibold mt-2 text-lg">70%</p>
                            <div x-data="{ dropdown: false}" class="dropdown ml-auto mt-2">
                                <a href="javaScript:;" class="text-lightgray h-3 flex items-center z-0" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                        <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                        <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                    </svg>
                                </a>
                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                                    <li><a href="javascript:;">All</a></li>
                                    <li><a href="javascript:;">Read</a></li>
                                    <li><a href="javascript:;">Unread</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 items-center gap-5">
                        <div id="linkclick"></div>
                        <div>
                            <p class="text-gray text-sm mt-4">Link Clicks</p>
                            <p class="font-semibold mt-2 text-lg">30%</p>
                            <div x-data="{ dropdown: false}" class="dropdown ml-auto mt-2">
                                <a href="javaScript:;" class="text-lightgray h-3 flex items-center z-0" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                        <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                        <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                    </svg>
                                </a>
                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                                    <li><a href="javascript:;">All</a></li>
                                    <li><a href="javascript:;">Read</a></li>
                                    <li><a href="javascript:;">Unread</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
            <div class="grid grid-cols-1 gap-5">
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <h2 class="mb-[30px]">Product Analysis</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-5 items-center">
                        <div class="space-y-5 xl:col-span-2">
                            <div class="bg-primary/10 flex items-stretch py-4 px-2.5 gap-5 rounded-lg">
                                <div class="bg-primary w-1 shrink-0"></div>
                                <div class="flex items-center gap-3.5">
                                    <p class="text-2xl font-bold">325</p>
                                    <div class="text-sm space-y-3">
                                        <p class="text-gray">/14G525</p>
                                        <p class="text-lightgray">Products Input</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-purple/10 flex items-stretch py-4 px-2.5 gap-5 rounded-lg">
                                <div class="bg-purple w-1 shrink-0"></div>
                                <div class="flex items-center gap-3.5">
                                    <p class="text-2xl font-bold">325</p>
                                    <div class="text-sm space-y-3">
                                        <p class="text-gray">/14G525</p>
                                        <p class="text-lightgray">Products Input</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="linechart" class="xl:col-span-3"></div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <h2 class="mb-[30px]">Account Summary</h2>
                    <div class="grid sm:grid-cols-3 gap-5">
                        <div class="flex items-center gap-2 md:gap-3.5 flex-wrap">
                            <div class="relative w-12 h-12">
                                <svg viewbox="0 0 36 36" class="block my-0 mx-auto w-12 h-12">
                                    <path class="fill-none stroke-primary/20 stroke-[4]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="fill-none stroke-primary stroke-[4]" stroke-dasharray="80, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <svg class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.8 1.20001L1.20001 10.8M1.20001 10.8V1.20001M1.20001 10.8H10.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray">Video Lectures</p>
                                <p class="font-bold text-lg">12/15</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 md:gap-3.5 flex-wrap">
                            <div class="relative w-12 h-12">
                                <svg viewbox="0 0 36 36" class="block my-0 mx-auto w-12 h-12">
                                    <path class="fill-none stroke-purple/20 stroke-[4]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="fill-none stroke-purple stroke-[4]" stroke-dasharray="40, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <svg class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.20896 10.8L10.8 1.2M10.8 1.2V10.8M10.8 1.2H1.20896" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray">Youtube Subscribe</p>
                                <p class="font-bold text-lg">12/15</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 md:gap-3.5 flex-wrap">
                            <div class="relative w-12 h-12">
                                <svg viewbox="0 0 36 36" class="block my-0 mx-auto w-12 h-12">
                                    <path class="fill-none stroke-orange/20 stroke-[4]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="fill-none stroke-orange stroke-[4]" stroke-dasharray="30, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                </svg>
                                <svg class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.20896 10.8L10.8 1.2M10.8 1.2V10.8M10.8 1.2H1.20896" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray">Instagram Followers</p>
                                <p class="font-bold text-lg">12/15</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="mb-[30px]">World Sale</h2>
                <div class="space-y-5">
                    <img src="assets/images/map-light.png" class="dark:hidden mx-auto" alt="">
                    <img src="assets/images/map-dark.png" class="dark:block hidden mx-auto" alt="">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-9">
                        <div class="space-y-[30px]">
                            <div class="grid grid-cols-9 gap-5 items-center">
                                <div class="col-span-2">
                                    <p>India</p>
                                </div>
                                <div class="w-full h-2 bg-orange/10 rounded-md col-span-7">
                                    <div class="bg-orange h-2 rounded-md w-11/12 text-center flex justify-center items-center"></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-9 gap-5 items-center">
                                <div class="col-span-2">
                                    <p>Russia</p>
                                </div>
                                <div class="w-full h-2 bg-primary/10 rounded-md col-span-7">
                                    <div class="bg-primary h-2 rounded-md w-9/12 text-center flex justify-center items-center"></div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-[30px]">
                            <div class="grid grid-cols-9 gap-5 items-center">
                                <div class="col-span-2">
                                    <p>China</p>
                                </div>
                                <div class="w-full h-2 bg-purple/10 rounded-md col-span-7">
                                    <div class="bg-purple h-2 rounded-md w-9/12 text-center flex justify-center items-center"></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-9 gap-5 items-center">
                                <div class="col-span-2">
                                    <p>USA</p>
                                </div>
                                <div class="w-full h-2 bg-warning/10 rounded-md col-span-7">
                                    <div class="bg-warning h-2 rounded-md w-6/12 text-center flex justify-center items-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('extrajs')
<!-- ApexCharts js -->
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>
<script src="{{ asset('assets/js/apex-ecom.js') }}"></script>
@endsection