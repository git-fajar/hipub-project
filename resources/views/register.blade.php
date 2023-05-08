<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HiPub - Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full h-screen bg-cover flex items-center justify-center" style="background-image: url({{ url('/img/background-login.png') }})">
        <div class=" px-80 rounded-[7px] bg-black">
            <div class="w-full ">
                <h1 class="mt-14 font-bold text-4xl capitalize tracking-wide text-[#FD841F]">membuat akun baru</h1>
                <div class=" mt-20 mb-7 grid grid-flow-row space-y-5">
                    <input type="text" class="w-full border border-[#FD841F] pl-5 py-4 rounded-md bg-transparent text-white" name="nama" placeholder="Nama Lengkap">
                    <input type="text" class="w-full border border-[#FD841F] pl-5 py-4 rounded-md bg-transparent text-white" name="email" placeholder="Email">
                    <input type="password" class="w-full border border-[#FD841F] pl-5 py-4 rounded-md bg-transparent text-white" name="pass" placeholder="Kata sandi">
                    <input type="password" class="w-full border border-[#FD841F] pl-5 py-4 rounded-md bg-transparent text-white" name="passConf" placeholder="Konfirmasi Kata Sandi">
                    <button type="submit" class="w-full rounded-lg uppercase text-white bg-[#FD841F] py-4 font-bold">daftar</button>
                    <div class="flex justify-between">
                        <span class="text-white font-semibold">Sudah mendaftar?</span>
                        <button class="py-5 px-14 rounded-[7px] bg-white text-black uppercase font-bold">masuk</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>