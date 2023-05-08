<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('img/logo1.png')); ?>">
    <title>HIPUB</title>
    <script src='https://cdn.tailwindcss.com'></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <style>
        #btn-back-to-top {
            position: fixed;
            display: none;
        }
        .fc-toolbar-title{
            /* font-weight: bold; */
        }
        .fc .fc-button {
            background-color: #00ccff;
            border: none;
            border-radius: 6px;
        }
        .fc .fc-button:hover {
            background-color: #00A6CF;
            border: none;
            border-radius: 6px;
        }
        .fc .fc-button-primary { 
            border-color: #E1F2F6;
        }
        .fc .fc-button-primary:disabled {
            background-color: #00A6CF;
        }
        .fc .fc-daygrid-day.fc-day-today {
            background-color: #E1F2F6;
        }
    </style>
</head>

<body class="font-body">
    <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block p-3 bg-cyan-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-cyan-600 hover:shadow-lg focus:bg-cyan-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-cyan-400 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5" id="btn-back-to-top">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-4 h-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg>
    </button>
    <!-- Header Start -->
    <header class="fixed top-0 left-0 px-10 z-10 flex w-full justify-center bg-white">
        <div class="container">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="/" class="block py-6 text-lg font-bold text-cyan-400">
                    <img src="<?php echo e(asset('img/logo3.png')); ?>" class="h-7 mr-2 sm:h-9"></a>
                <div class="flex items-center lg:order-2">
                    <a href="<?php echo e(url('register')); ?>"
                        class="text-cyan-400 border border-cyan-400 hover:bg-cyan-400 hover:text-white font-medium rounded-md text-sm px-3 mr-3 lg:px-5 py-1 lg:py-2.5 lg:mr-4">SIGN
                        UP</a>
                    <a href="<?php echo e(url('login')); ?>"
                        class="text-white border border-cyan-400 bg-cyan-400 hover:bg-cyan-600 hover:border-cyan-600 font-medium rounded-md text-sm px-4 lg:px-5 py-1 lg:py-2.5 sm:mr-2 lg:mr-0">LOGIN</a>
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-3 text-sm text-cyan-400 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none"
                        aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white bg-cyan-400 rounded lg:bg-transparent lg:text-cyan-400 lg:p-0"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#event"
                                class="block py-2 pl-3 pr-4 text-slate-900 border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Kegiatan</a>
                        </li>
                        <li>
                            <a href="#blog"
                                class="block py-2 pl-3 pr-4 text-slate-900 border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Artikel</a>
                        </li>
                        <li>
                            <a href="#join"
                                class="block py-2 pl-3 pr-4 text-slate-900 border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Kontak</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/help')); ?>"
                                class="block py-2 pl-3 pr-4 text-slate-900 border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Bantuan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Start -->
    <section id="home" class="pt-36 mb-10">
        <div class="container">
            <div class="flex flex-wrap px-10">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="font-extrabold text-cyan-400 text-4xl lg:text-5xl">HIPUB</h1>
                    <h2 class="block font-bold text-slate-900 mt-1 mb-5 lg:text-xl">Memudahkan Dalam Membuat
                        Artikel</h2>
                    <p class="font-medium text-slate-500 mb-10">platform penulisan artikel dan publikasi yang keren!</p>
                    <a href="#"
                        class="text-base font-semibold text-white bg-cyan-400 py-3 px-8 rounded hover:shadow-lg hover:bg-cyan-600 transition duration-200 ease-in-out">Hubungi
                        Kami</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="mt-10">
                        <img src="<?php echo e(asset('img/heroimg.png')); ?>" class="max-w-full mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- About Section Start -->
    <section id="about" class="bg-slate-100 pt-5 pb-5">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-12 lg:px-10">
                    <figure class="max-w-screen-md mx-auto">
                        <svg class="h-12 mx-auto mb-3 text-cyan-400" viewBox="0 0 24 27" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                                fill="currentColor" />
                        </svg>
                        <h2 class="block font-bold text-slate-900 mt-1 mb-5 lg:text-xl">HIPUB merupakan sebuah Mentoring dan Supervisi penulis artikel dalam melakukan publikasi pada jurnal dan prosiding yang ditarget sesuai dengan disiplin keilmuan.</h2>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
    <!-- Event Section Start -->
    <section id="event" class="pt-5 pb-5">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="my-2 text-3xl font-extrabold tracking-tight text-slate-900 md:text-3xl">
                        Jadwal Kegiatan Pelatihan</h2>
                    <p class="text-md font-medium text-slate-500 md:text-lg">Rencana pelatihan offline dan online dari HiPub</p>
                </div>
            </div>
            <div class="flex flex-warp mx-auto lg:w-[75%] my-6 gap-6">
                <div class="col lg:w-[69%] md:w-2/3 sm:w-full">
                    <div class="w-full bg-slate-100 p-6 rounded-xl" id='calendar'></div>
                </div>
                <div class="col lg:w-[31%] md:w-1/3 sm:w-full bg-slate-100 border border-slate-100 rounded-xl">
                    <div class="px-4 pt-4 pb-2 rounded-md">
                        <i class="bx bxs-calendar-plus text-[18px] text-slate-900"></i>
                        <span class="pl-1 font-semibold text-slate-900 text-[16px]">Jadwal Kegiatan</span>
                        <hr class="h-1 mt-2">
                    </div>
                    <?php $__currentLoopData = $data_calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section
                        class="relative flex w-full items-start justify-center overflow-y-hidden">
                        <!-- Sidenav -->
                        <div class="w-full" id="accordion">
                            <div class="border border-l-0 border-r-0 border-t-0 border-[#e5e7eb]">
                                <div class="mb-0 mt-2" id="flush-heading<?php echo e($c["id"]); ?>">
                                    <a href="<?php echo e($c["url"]); ?>" class="group relative flex w-full items-center rounded-none border-0 py-2 px-5 text-left text-slate-900 text-[14px] transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-cyan-400 [&:not([data-te-collapse-collapsed])]"
                                    type="button"
                                    data-te-collapse-init
                                    data-te-collapse-collapsed
                                    data-te-target="#flush-collapse<?php echo e($c["id"]); ?>"
                                    aria-expanded="true"
                                    aria-controls="flush-collapse<?php echo e($c["id"]); ?>">
                                        <div class='bg-cyan-600 hover:bg-cyan-400 rounded-full w-1 h-5 mr-2'></div>
                                        <div class="font-bold"><?php echo e($c["title"]); ?></div>
                                        <span class="ml-auto h-4 w-4 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none">
                                            <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-4 w-4">
                                                <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div
                                    id="flush-collapse<?php echo e($c["id"]); ?>"
                                    class="!visible border-0"
                                    data-te-collapse-item
                                    aria-labelledby="flush-heading<?php echo e($c["id"]); ?>"
                                    data-te-parent="#accordion">
                                    <div class="px-4 pt-1 text-slate-500 text-sm">
                                        <i class='bx bx-calendar'></i>
                                        <span class="pl-1"><?php echo e(date('Y-m-d', strtotime($c["start"]))); ?> - <?php echo e(date('Y-m-d', strtotime($c["end"]))); ?></span>
                                    </div>
                                    <div class="px-4 pb-2 text-sm pt-2">
                                        <?php echo e($c["desc"]); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Section End -->
    <!-- Blog Section Start -->
    <section id="blog" class="bg-slate-100 py-10">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="my-2 text-3xl font-extrabold tracking-tight text-slate-900 md:text-3xl">
                        Artikel</h2>
                    <p class="text-md font-medium text-slate-500 md:text-lg">Kumpulan berita terbaru dan kegiatan penulisan artikel</p>
                </div>
            </div>

            <div class="flex flex-wrap">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-full px-4 py-4 lg:w-1/2 xl:w-1/3">
                    <div class="overflow-hidden rounded-xl bg-white shadow-md">
                        <img src="<?php echo e(asset('img/')); ?><?php echo e($post["image"]); ?>" class="w-full">
                        <div class="py-8 px-6">
                            <h3>
                                <a href="/posts/<?php echo e($post["slug"]); ?>"
                                    class="block truncate text-xl font-semibold hover:text-cyan-400"><?php echo e($post["title"]); ?></a>
                            </h3>
                            <span class="text-sm font-regular text-gray-400 md:text-sm"><i class='bx bx-calendar'></i> <?php echo e($post["date"]); ?></span>
                            <span class="ml-5 text-sm font-regular text-gray-400 md:text-sm"><i class='bx bxs-user'></i> <?php echo e($post["author"]); ?></span>
                            <p class="my-6 text-base font-medium text-slate-500"><?php echo e($post["body"]); ?></p>
                            <a href="/posts/<?php echo e($post["slug"]); ?>"
                                class="block text-center rounded-lg bg-cyan-400 py-2 px-4 text-sm font-medium text-white hover:hover:bg-cyan-600">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <!-- Join Section Start -->
    <section id="join">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-screen-md mx-auto text-center">
                <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-slate-900">
                    Kontak</h2>
                <p class="mb-6 font-light text-slate-500 md:text-lg">Segera bergabung dengan kami, dapatkan berbagai
                    macam informasi tentang kepenulisan dan publikasi atau Bisa tanyakan ke kami melalui kontak yang tersedia</p>
                    <a href="<?php echo e(url('register')); ?>"
                    class="text-white bg-cyan-400 hover:bg-cyan-600 focus:ring-4 focus:ring-purple-300 font-medium rounded-md text-md px-4 py-2.5 mr-2 mb-2 focus:outline-none"><i class='bx bx-edit'></i> Daftar</a>
                    
                    <a href="https://wa.me/+6281235265021" class="bg-green-500 text-white text-center capitalize hover:bg-green-700 text-md w-auto px-4 py-2.5 font-medium rounded-md"><i class='bx bxl-whatsapp'></i> Whatsapp</a>  
            </div>
        </div>
    </section>
    <!-- Join Section End -->
    <!-- footer Section Start -->
    <footer class="bg-slate-900">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <div class="text-center">
                <a href="#"
                    class="flex items-center justify-center mb-5 text-2xl font-semibold text-gray-900">
                    <img src="<?php echo e(asset('img/logo3.png')); ?>" class="h-6 mr-3 sm:h-9">
                </a>
                <span class="block text-sm text-center text-gray-500">© 2023 HIPUB. Universitas
                    Negeri Malang. <br>Built with <a href="https://laravel.com"
                        class="text-cyan-400 hover:underline">Laravel Framework</a> and <a href="https://tailwindcss.com"
                        class="text-cyan-400 hover:underline">Tailwind CSS</a>.
                    </br>
                    <ul class="flex justify-center mt-5 space-x-5">
                        <li>
                            <a href="#" class="text-slate-500 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-500 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-500 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-500 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-900">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
    </footer>
    <!-- footer Section End -->
    <!-- Back to top Start -->
    <a href="#home"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-cyan-400 p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <script>
        
        // scroll back to top
        let mybutton = document.getElementById("btn-back-to-top");
        window.onscroll = function () {
            scrollFunction();
        };
        function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
        mybutton.addEventListener("click", backToTop);
        function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
        // calendar
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',    
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,basicWeek,basicDay'
          },
          defaultView: 'month',
          editable: false,
          events: [
            <?php $__currentLoopData = $data_calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              {
                  title: "<?php echo e($c['title']); ?>",
                  start: "<?php echo e($c['start']); ?>",
                  end: "<?php echo e($c['end']); ?>",
                  url: "<?php echo e('login'); ?>"
              },
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
          });
          calendar.render();
        });
        const tabs = document.querySelectorAll('.border-t > a');
      </script>
</body>

</html><?php /**PATH E:\Aplikasi\laravel\hipub\resources\views/landing-page.blade.php ENDPATH**/ ?>