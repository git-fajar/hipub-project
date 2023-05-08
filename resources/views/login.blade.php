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
        <div class="w-[573px] px-[89px] pt-[62px] rounded-[20px] bg-orange-500">
            <div class="h-[112px] flex">
                <div class="w-[110px] bg-black text-center align-middle">
                    Logo
                </div>
                <div class="pl-5 my-auto flex flex-col">
                    <span class=" font-bold text-5xl">HiPub</span>
                    <span class="capitalize">universitas negeri malang</span>
                </div>
            </div>
            <form action="#" method="post">
                @csrf
                <input class="w-full mt-[50px] border border-black bg-transparent placeholder-black pl-5 py-4 rounded-md drop-shadow-md" name="username" type="text" placeholder="Username/Email">
                <input class="w-full mt-[34px] border border-black bg-transparent placeholder-black pl-5 py-4 rounded-md drop-shadow-md" name="password" type="password" placeholder="Kata sandi">
                <div>
                    <input class=" mt-7 accent-black" type="checkbox" name="rememberMe" id="rememberMe">
                    <label for="rememberMe" class="ml-2"> Ingat saya</label>
                </div>
                <button class="w-full mt-[25px] uppercase py-4 rounded-md text-white font-bold bg-black" type="submit">masuk</button>
            </form>
            <div class="mt-4 mb-28 flex justify-between">
                <a href="/" class="no-underline text-black capitalize font-semibold">daftar</a>
                <a href="#" class="no-underline text-black font-semibold">Lupa kata sandi</a>
            </div>
        </div>
    </div>
</body>
</html>