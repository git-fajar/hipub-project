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
</head>

<body class="bg-teal-50">
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
                                class="block py-2 pl-3 pr-4 text-white bg-cyan-400 rounded lg:bg-transparent lg:text-cyan-400 lg:p-0"
                                aria-current="page">Bantuan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <div class="h-screen px-20 bg-cover items-center justify-center bg-teal-50 pt-2 mt-20">
        <div class="pb-8">
            <div class="container bg-white rounded-xl mt-6 px-5 pb-5">
                <h1 class="py-8 font-bold text-center text-2xl">Pusat Bantuan</h1>
                <!-- user guide -->
                <section
                    class="relative flex w-full items-start justify-center overflow-y-hidden">
                    <!-- Sidenav -->
                    <div class="w-full" id="accordion">
                        <div class="border border-l-0 border-r-0 border-t-0 border-[#e5e7eb]">
                            <div class="mb-0" id="flush-heading1">
                                <a href="#" class="group relative flex w-full items-center rounded-none border-0 py-2 px-5 text-left text-dark text-[14px] transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-cyan-400 [&:not([data-te-collapse-collapsed])]"
                                type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#flush-collapse1" aria-expanded="true"
                                aria-controls="flush-collapse1">
                                    <div class="font-bold text-cyan-400 text-lg">User Guide Pengguna</div>
                                    <span class="ml-auto h-4 w-4 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none">
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </a>
                                <hr class="h-1 my-2">
                            </div>
                            <div
                            id="flush-collapse1"
                            class="!visible border-0"
                                data-te-collapse-item
                                aria-labelledby="flush-heading1"
                                data-te-parent="#accordion">
                                <div class="px-6 pb-6 pl-10">
                                    <div class="text-md pb-2">Untuk dapat melakukan publikasi dan konsultasi artikel pastikan sudah memiliki akun atau bisa melakukan <a href="{{ url('register') }}" class="text-cyan-400 font-bold hover:text-cyan-600"> registrasi</a> terlebih dahulu</div>
                                    <div class="text-md font-bold">Upload Artikel</div>
                                    <ol class="list-decimal pl-10 pb-2">
                                        <li>Masuk ke menu <i class='text-cyan-400 font-bold'>Riwayat Artikel</i></li>
                                        <li>klik tombol <i class='text-cyan-400 font-bold'>Upload</i></li>
                                        <li>akan diarahkan ke menu upload artikel</li>
                                        <li>isi data sesuai perintah isian form</li>
                                        <li>setelah itu klik <i class='text-sky-600 font-bold'>Upload Artikel</i></li>
                                    </ol>
                                    <div class="text-md font-bold">Pembayaran</div>
                                    <ol class="list-decimal pl-10 pb-2">
                                        <li>Masuk ke menu <i class='text-cyan-400 font-bold'>Riwayat Artikel</i></li>
                                        <li>cari artikel dengan status <i class='text-sky-600 font-bold'>Pembayaran</i></li>
                                        <li>lakukan proses pembayaran sesuai dengan nominal yang tertera dan upload bukti pembayaran</li>
                                        <li>isi data sesuai perintah isian form</li>
                                        <li>setelah itu klik <i class='text-sky-600 font-bold'>Kirim</i></li>
                                    </ol>
                                    <div class="text-md font-bold">Upload Revisi</div>
                                    <ol class="list-decimal pl-10 pb-2">
                                        <li>Masuk ke menu <i class='text-cyan-400 font-bold'>Riwayat Artikel</i></li>
                                        <li>cari artikel dengan status <i class='text-orange-500 font-bold'>Revisi</i></li>
                                        <li>lihat komentar revisi yang dikirim oleh editor</li>
                                        <li>lakukan revisi sesuai dengan komentar yang tertera</li>
                                        <li>klik tombol <i class='text-sky-600 font-bold'>Revisi</i> untuk upload file revisi</li>
                                        <li>isi form revisi dan jika sudah klik tombol <i class='text-sky-600 font-bold'>Revisi Artikel</i></li>
                                    </ol>
                                    <div class="text-md font-bold">Upload Vendor</div>
                                    <ol class="list-decimal pl-10 pb-2">
                                        <li>Masuk ke menu <i class='text-cyan-400 font-bold'>Riwayat Artikel</i></li>
                                        <li>cari artikel dengan status <i class='text-green-500 font-bold'>Proofreading</i></li>
                                        <li>lihat komentar dikirim oleh editor</li>
                                        <li>klik tombol <i class='text-sky-600 font-bold'>Proofreading</i> untuk upload file ke vendor</li>
                                        <li>isi form sesuai perintah dan jika sudah klik tombol <i class='text-sky-600 font-bold'>Upload Data</i></li>
                                    </ol>
                                    <div class="text-md font-bold">Ikuti Pelatihan</div>
                                    <ol class="list-decimal pl-10 pb-2">
                                        <li>Masuk ke menu <i class='text-cyan-400 font-bold'>Jadwal Aktivitas</i></li>
                                        <li>cari kegiatan yang tersedia pada kalender agenda</li>
                                        <li>klik nama kegiatan untuk melihat detail kegiatan</li>
                                        <li>klik tombol <i class='text-sky-600 font-bold'>Ikuti</i> untuk mengikuti kegiatan</li>
                                        <li>Agenda kegiatan yang diikuti akan muncul pada daftar <i class='text-cyan-400 font-bold'>Aktivitas Saya</i></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Status tombol -->
                <section
                    class="relative flex w-full items-start justify-center overflow-y-hidden">
                    <!-- Sidenav -->
                    <div class="w-full" id="accordion">
                        <div class="border border-l-0 border-r-0 border-t-0 border-[#e5e7eb]">
                            <div class="mb-0" id="flush-heading2">
                                <a href="#" class="group relative flex w-full items-center rounded-none border-0 py-2 px-5 text-left text-dark text-[14px] transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-cyan-400 [&:not([data-te-collapse-collapsed])]"
                                type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#flush-collapse2" aria-expanded="true"
                                aria-controls="flush-collapse2">
                                    <div class="font-bold text-cyan-400 text-lg">Jenis Status Tombol</div>
                                    <span class="ml-auto h-4 w-4 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none">
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </a>
                                <hr class="h-1 my-2">
                            </div>
                            <div
                            id="flush-collapse2"
                            class="!visible border-0"
                                data-te-collapse-item
                                aria-labelledby="flush-heading2"
                                data-te-parent="#accordion">
                                <div class="px-6 pb-6">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="py-9 border-b-2 border-gray-400">
                                                <th class="uppercase w-1/12 font-bold text-sm px-3 pt-4 pb-3"> no
                                                </th>
                                                <th class="uppercase w-3/12 font-bold text-sm pt-4 pb-3"> Status
                                                </th>
                                                <th class="uppercase w-8/12 font-bold text-sm pt-4 pb-3"> Detail
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">1</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-red-600">Pembayaran Ditolak</div>
                                                </td>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Pembayaran yang telah dilakukan tidak disetujui, atau terdapat kesalahan</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">2</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-sky-600">Pembayaran</div>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Silahkan melakukan pembayaran sesuai nominal beserta upload bukti</td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">3</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-sky-600">Menunggu Verifikasi</div>
                                                </td>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Tunggu verifikasi setelah melakukan pembayaran, atau bisa menghubungi kontak jika belum ada konfirmasi</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">4</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-sky-600">Dalam Proses</div>
                                                </td>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Masih dalam proses verifikasi dari editor</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">5</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-orange-500">Revisi</div>
                                                </td>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Silahkan melakukan revisi sesuai dengan instruksi yang telah diberikan</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">6</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-green-500">Proofreading</div>
                                                </td>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Artikel telah disetujui editor</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">7</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-sky-600">Proses</div>
                                                </td>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Artikel sedang proses pengajuan ke vendor</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">8</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-sky-600">Under Review</div>
                                                </td>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Artikel masih dalam tinjauan dari vendor</td>
                                            </tr>
                                            <tr>
                                                <td class="w-1/12 text-center border-b border-[#727272] border-opacity-50 py-3">9</td>
                                                <td class="w-2/12 capitalize text-white border-b border-[#727272] border-opacity-50 text-center">
                                                    <div class="capitalize w-[200px] px-4 rounded-2xl font-bold py-1 bg-green-500">Accepted</div>
                                                <td class="w-9/12 pl-6 capitalize border-b border-[#727272] border-opacity-50">Artikel sudah disetujui dan dipublikasi oleh vendor</td>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="max-w-screen-md pb-6 mx-auto text-center">
                    <p class="pt-6 pb-6 font-light text-secondary md:text-lg">Jika terdapat masalah lainnya bisa menghubungi admin melalui kontak Whatsapp yang sudah tersedia atau bisa kirimkan keluhan, kritik dan saran anda melalui email</p>
                    <a href="https://wa.me/+6281235265021" class="bg-green-500 text-white text-center capitalize hover:bg-green-700 text-md w-auto px-4 py-2.5 font-medium rounded-md"><i class='bx bxl-whatsapp'></i> Whatsapp</a> 
                    <a href="https://wa.me/+6281235265021" class="bg-red-600 text-white text-center capitalize hover:bg-red-800 text-md w-auto px-4 ml-4 py-2.5 font-medium rounded-md"><i class='bx bx-envelope'></i> Email</a> 
                </div>
            </div>
        </div>
    </div>
</body>

</html>