<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logo1.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>HiPub - Login</title>
    <script src='https://cdn.tailwindcss.com'></script>
</head>
<body>
    <div class="w-full h-screen bg-cover flex items-center justify-center bg-teal-50">
        <div class="w-[570px] rounded-[20px] bg-white shadow-lg">
            <div class="container pt-6 pl-7 ">
                <a href="{{ url('/') }}" class="fa fa-arrow-left fa-lg text-cyan-400" title="Kembali ke Halaman Utama"></a>
            </div>
            <div class="container px-[89px] pt-10">
                <div class="container">
                    <img src="img/logo3.png" class="w-[250px] mx-auto">
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <input class="w-full mt-[50px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-4 rounded-md" name="email" type="text" placeholder="Username/Email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    <input class="w-full mt-[20px] border border-cyan-400 focus:outline-cyan-400 bg-white placeholder-slate-600 pl-5 py-4 rounded-md" name="password" type="password" placeholder="Kata Sandi" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p class="font-regular text-red-600">{{ $message }}</p>
                        </span>
                    @enderror
                    <div>
                        <input class=" mt-4 accent-black" type="checkbox" name="rememberMe" id="rememberMe">
                        <label for="rememberMe" class="ml-2"> Ingat saya</label>
                    </div>
                    <button class="w-full mt-4 uppercase py-4 rounded-md text-white font-bold bg-cyan-400 hover:bg-cyan-600" type="submit">masuk</button>
                </form>
                <div class="mt-4 mb-28 flex justify-between">
                    <a href="{{ url('register') }}" class="no-underline text-black capitalize font-semibold hover:text-cyan-400" title="Sign-Up">daftar</a>
                    <a href="{{ url('register') }}" class="no-underline text-black capitalize font-semibold hover:text-cyan-400" title="Reset Password">Lupa Kata Sandi</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>