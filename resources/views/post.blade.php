<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo1.png') }}">
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
        .fc{
            font-size: 9px;
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
        .fc .fc-button-cyan-400 { 
            border-color: #E1F2F6;
        }
        .fc .fc-button-cyan-400:disabled {
            background-color: #00A6CF;
        }
        .fc .fc-daygrid-day.fc-day-today {
            background-color: #E1F2F6;
        }
    </style>
</head>

<body class="font-body bg-teal-50">
    <!-- Header Start -->
    <header class="fixed top-0 left-0 px-10 z-10 flex w-full items-center bg-white">
        <div class="container">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="/" class="block py-6 text-lg font-bold text-cyan-400">
                    <img src="{{ asset('img/logo3.png') }}" class="h-7 mr-2 sm:h-9"></a>
                <div class="flex items-center lg:order-2">
                    <a href="{{ url('register') }}"
                        class="text-cyan-400 border border-cyan-400 hover:bg-cyan-400 hover:text-white font-medium rounded-md text-sm px-3 mr-3 lg:px-5 py-1 lg:py-2.5 lg:mr-4">SIGN
                        UP</a>
                    <a href="{{ url('login') }}"
                        class="text-white border border-cyan-400 bg-cyan-400 hover:bg-cyan-600 font-medium rounded-md text-sm px-4 lg:px-5 py-1 lg:py-2.5 sm:mr-2 lg:mr-0">LOGIN</a>
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
                            <a href="{{ url('/') }}"
                                class="block py-2 pl-3 pr-4 text-dark border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/#event') }}"
                                class="block py-2 pl-3 pr-4 text-dark border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Kegiatan</a>
                        </li>
                        <li>
                            <a href="{{ url('/#blog') }}"
                                class="block py-2 pl-3 pr-4 text-dark border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Artikel</a>
                        </li>
                        <li>
                            <a href="{{ url('/#join') }}"
                                class="block py-2 pl-3 pr-4 text-dark border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Kontak</a>
                        </li>
                        <li>
                            <a href="{{ url('/help') }}"
                                class="block py-2 pl-3 pr-4 text-dark border-b border-gray-100 hover:bg-cyan-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-cyan-400 lg:p-0">Bantuan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Title Blog Start -->
    <div class="container mt-[120px]">
        <div class="w-full px-4">
            <div class="mx-auto mb-10 max-w-xl text-center">
                <h4 class="mb-2 text-lg font-semibold text-cyan-400">Blog</h4>
                <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-slate-900 md:text-3xl">
                    Artikel</h2>
                <p class="text-md font-medium text-slate-600 md:text-lg">Kumpulan berita terbaru dan kegiatan penulisan artikel</p>
            </div>
        </div>
    </div>
    <!-- Title Blog End -->
    <!-- Content Section Start -->
    <section id="home" class="my-10">
        <div class="container px-16">
            <div class="flex flex-wrap">

                <div class="w-full px-4 lg:w-2/3">
                    <!-- Post Section Start -->
                    <article class="mb-8 px-8 py-8 bg-white rounded-[10px]">
                        <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 md:text-2xl">{{ $post["title"] }}</h2>
                        <span class="text-sm font-regular text-gray-400 md:text-sm"><i class='bx bx-calendar'></i> {{ $post["date"] }}</span>
                        <span class="ml-5 text-sm font-regular text-gray-400 md:text-sm"><i class='bx bxs-user'></i> {{ $post["author"] }}</span>
                        <div class="flex justify-center items-center"><img src="{{ asset('img/') }}{{ $post["image"] }}" class="mt-5 w-[600px]"></div>
                        <p class="mt-5 text-md font-regular text-justify text-slate-900 whitespace-pre-line md:text-md">{{ $post["body"] }}</p>
                    </article>
                    <!-- Post Section End --> 
                    <!-- Comment Section Start -->
                    <div class="mb-5 px-8 py-6 bg-white rounded-[10px]">
                        <h2 class="text-lg font-bold tracking-tight text-slate-900 md:text-lg">Kolom Komentar</h2>
                        <hr class="my-2">
                        <form class="flex flex-warp gap-3 py-2">
                            <div class="row-span-2 col-span-1">
                                <div class="text-5xl font-regular text-gray-300"><i class='bx bxs-user-circle'></i></div>
                            </div>
                            <div class="w-full grid grid-cols-3 gap-3">
                                <div class="col-span-3 mb-[-4px]">
                                    <textarea class="w-full p-2 h-[100px] bg-gray-200 text-sm focus:bg-white focus:outline focus:outline-1 focus:outline-cyan-400 placeholder-slate-600 rounded-md" name="commant" type="text" placeholder="Ketikkan Komentar"></textarea>
                                </div>
                                <div class="">
                                    <input class="w-full p-2 h-10 bg-gray-200 text-sm focus:bg-white  focus:outline focus:outline-1 focus:outline-cyan-400 placeholder-slate-600 rounded-md" name="name" type="text" placeholder="Masukkan Nama" required>
                                </div>
                                <div class="">
                                    <input class="w-full p-2 h-10 bg-gray-200 text-sm focus:bg-white  focus:outline focus:outline-1 focus:outline-cyan-400 placeholder-slate-600 rounded-md" name="email" type="text" placeholder="Masukkan Email" required>
                                </div>
                                <div class="text-right">
                                    <button class="px-3 py-2 rounded-full self-center font-medium text-white bg-cyan-400 hover:bg-cyan-600" type="submit">Kirim Komentar</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-2">
                        <div class="flex flex-warp gap-3">
                            <div class="row-span-2 col-span-1">
                                <div class="text-5xl font-regular text-gray-300"><i class='bx bxs-user-circle'></i></div>
                            </div>
                            <div class="w-full grid grid-cols-1 gap-2">
                                <div class="w-full pt-2 h-10 text-md font-bold text-slate-900">Angga</div>
                                <div class="w-full pt-2 h-10 text-sm font-regular text-slate-600 text-right">10 Desember 2022</div>
                                <div class="col-span-2">
                                    <div class="w-full h-10 text-md font-regular text-slate-900">Wahh keren sekali, mudah dimengerti, saya jadi paham</div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-2">
                        <div class="flex flex-warp gap-3">
                            <div class="row-span-2 col-span-1">
                                <div class="text-5xl font-regular text-gray-300"><i class='bx bxs-user-circle'></i></div>
                            </div>
                            <div class="w-full grid grid-cols-1 gap-2">
                                <div class="w-full pt-2 h-10 text-md font-bold text-slate-900">Russo</div>
                                <div class="w-full pt-2 h-10 text-sm font-regular text-slate-600 text-right">2 Oktober 2022</div>
                                <div class="col-span-2">
                                    <div class="w-full h-10 text-md font-regular text-slate-900">Terima kasih :)</div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-2">
                    </div>
                    <!-- Comment Section End --> 
                </div>
                <div class="w-full px-4 lg:w-1/3">
                    <!-- Calendar Section Start -->
                    <div class="px-8 py-6 bg-white rounded-[10px]">
                        <h2 class="text-lg font-bold tracking-tight text-slate-900 md:text-lg">Jadwal Kegiatan Pelatihan</h2>
                        <hr class="mt-1">
                        <div class="col lg:w-[100%] md:w-2/3 sm:w-full mt-4">
                            <div class="w-full bg-slate-100 p-3 rounded-xl text-sm" id='calendar'></div>
                        </div>
                    </div>
                    <!-- Calendar Section End -->
                    <!-- Blog Section Start -->
                    <div class="mt-8 px-8 pt-6 pb-2 bg-white rounded-[10px]">
                        <h2 class="text-lg font-bold tracking-tight text-slate-900 md:text-lg">Artikel Lainnya</h2>
                        <hr class="mt-1 pt-4">
                        @foreach ($posts2 as $post2)
                            <div class="mb-6 overflow-hidden rounded-xl bg-white shadow-md">
                                <img src="{{ asset('img/') }}{{ $post2["image2"] }}" class="w-full">
                                <div class="py-8 px-6">
                                    <h3>
                                        <a href="/posts/{{ $post2["slug2"] }}"
                                            class="block truncate text-xl font-semibold hover:text-cyan-400">{{ $post2["title2"] }}</a>
                                    </h3>
                                    <div class="text-sm font-regular text-gray-400 md:text-sm"><i class='bx bx-calendar'></i> {{ $post2["date2"] }}</div>
                                    <p class="my-6 text-base font-medium text-slate-600">{{ $post2["body2"] }}</p>
                                    <a href="/posts/{{ $post2["slug2"] }}"
                                        class="block text-center rounded-lg bg-cyan-400 py-2 px-4 text-sm font-medium text-white hover:bg-cyan-600">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Blog Section End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Content Section End -->       
    <!-- footer Section Start -->
    <footer class="bg-slate-900">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <div class="text-center">
                <a href="#"
                    class="flex items-center justify-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img src="{{ asset('img/logo3.png') }}" class="h-6 mr-3 sm:h-9">
                </a>
                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2023 HIPUB. Universitas
                    Negeri Malang. <br>Built with <a href="https://laravel.com"
                        class="text-cyan-400 hover:underline">Laravel Framework</a> and <a href="https://tailwindcss.com"
                        class="text-cyan-400 hover:underline">Tailwind CSS</a>.
                    </br>
                    <ul class="flex justify-center mt-5 space-x-5">
                        <li>
                            <a href="#" class="text-slate-600 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-600 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-600 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-600 hover:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
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

    <script src="dist/js/script.js"></script>
    <script>
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
            @foreach($data_calendar as $c)
              {
                  title: "{{$c['title']}}",
                  start: "{{$c['start']}}",
                  end: "{{$c['end']}}",
                  url: "{{'login'}}"
              },
              @endforeach
          ]
          });
          calendar.render();
        });
        const tabs = document.querySelectorAll('.border-t > a');    
      </script>
</body>

</html>