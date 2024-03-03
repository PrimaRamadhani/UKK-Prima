<!doctype html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/output.css" rel="stylesheet">
  <title>GalleryKu | Registrasi</title>
</head>
<body>
  <nav class="text-white bg-gray-200 p-6 shadow-xl">
    <div class="flex items-center justify-between container mx-auto">
        <div>
            <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
    </div>
    <div>
        <a href="/login"><button class="px-4 text-lg text-black rounded-full font-fontkedua">Login</button></a>
        <a href="/registrasi"><button class="px-4 text-lg bg-black rounded-full text-white-300 font-fontkedua">Sing Up</button></a>
        </div>
        </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
  <br>
  <section class="bg-gray-50 dark:bg-gray-900">
    <form action="/registrasi" method="post">
        @csrf
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-gray-200 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-fontutama leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                    Create Your Account
                </h1>
                <form class="space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Username Anda" required="" value="{{ old('username') }}">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Email Anda" required="" value="{{ old('email') }}">
                        @error('email')
                        <small class="italic text-red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="Password Minimal 8 Karakter">
                        @error('password')
                        <small class="italic text-red-800">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>  
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Lengkap" required="" value="{{ old('nama_lengkap') }}">
                    </div>
                    <div>
                        <label for="no_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                        <input type="number" name="no_telepon" id="no_telepon" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="No Telepon" required="" value="{{ old('no_telepon') }}">
                        @error('no_telepon')
                        <small class="italic text-red-800">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="px-4 text-lg bg-black rounded-full text-white font-fontkedua">Sign Up</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Anda Sudah Punya Akun?  <a href="/login" class="underline text-sky-500">Login Disini</a></span>
                    </p>
                </form>
            </div>
        </div>
    </div>
    </form>
  </section>
</body>
</html>
