<!doctype html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/output.css" rel="stylesheet">
  <title>GalleryKu | Edit Password</title>
</head>
<body>
    <nav class="text-white bg-gray-200 p-5 shadow-xl">
        <div class="flex items-center justify-between container mx-auto">
            <div class="flex lg:flex-row lg:mx-auto justify-between container flex-col">
                <div class="flex">
                <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
               <a href="/hoem"><button class="px-4 text-lg text-black rounded-full font-fontkedua">Home</button></a>
                </div>
              <div>
                <a href="/editprofile"><button class="px-4 text-lg bg-black rounded-full text-white-300 font-fontkedua">
                  Edit Profile
                </button></a>
              </div>
            </div>
            </div>
          </nav>
          <section class="max-w-[500px] mx-auto mt-16 ">
            <form action="/updatepassword" method="post">
                @csrf
            <div class="max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-xl border">
                    <div class="flex flex-col px-4 py-4 ">
                        <h5 class="text-3xl text-center font-fontutama">Edit Password</h5>
                        <h5>Masukan Password Lama</h5>
                        <input type="password" name="current_password" class="py-1 rounded-md border border-black">
                        @error('current_password')
                        <small class="italic text-red-500">{{ $message }}</small>
                        @enderror
                        <h5>Masukan Password Baru</h5>
                        <input type="password" name="new_password" class="py-1 rounded-md border border-black">
                        <h5>Konfirmasi Password</h5>
                        <input type="password" name="confirm_password" class="py-1 rounded-md border border-black">
                        <button type="submit" class="py-2 mt-4 text-black rounded-md bg-gray-200">Perbaharui</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
