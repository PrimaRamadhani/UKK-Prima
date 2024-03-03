<!doctype html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/output.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Inter:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<title>GalleryKu | Tambah Album</title>
</head>
<body>
  <nav class="text-white bg-gray-200 p-5 shadow-xl">
    <div class="flex items-center justify-between container mx-auto">
        <div class="flex lg:flex-row lg:mx-auto justify-between container flex-col">
            <div class="flex">
            <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
            <button class="px-4 text-lg text-black font-fontkedua">Home</button>
            </div>
          <div>
            <a href="/upload_foto"><button class="px-4 text-lg  bg-black rounded-full text-white-300 font-fontkedua">
              Upload Foto
            </button></a>
            <button class="px-4 text-lg text-black rounded-ful font-fontkedua">
              Profile
            </button>
          </div>
        </div>
        </div>
      </nav>
<!-- Section Gambar-->
<section class="mt-16">
    <div class="flex max-w-screen-md mx-auto flex-wrap flex-col lg:flex-row">
        <div class="w-1/2">
        <div class="w-[375px] h-[235px] bg-white shadow-2xl">
            <div class="flex flex-col">
                <div class="flex justify-center w-[375px] ">
                <div class="w-[363px] h-[192px] overflow-hidden rounded-sm">
                    <img class="" src="/assets/kucing2.png" alt="">
                </div>
            </div>
            <div>
            </div>
            </div>
        </div>
        </div>
        <div class="w-1/2 mt-5 lg:mt-0">
                <div class="flex flex-col">
                    <form action="/add_album" method="post">
                        @csrf
                    <div class="flex justify-center">
                    <div class="overflow-hidden rounded-sm">
                        <div class="w-full bg-gray-200 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                <h1 class="text-xl font-fontutama leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                                    Tambah Album
                                </h1>
                                <form class="space-y-4 md:space-y-6" action="#">
                                    <div>
                                        <label for="judul_album" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Album</label>
                                        <input type="judul_album" name="nama_album" id="judul_foto" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Judul Album" required="">
                                    </div>
                                    <button type="submit" class="px-4 text-lg bg-black rounded-full text-white">Tambah Album</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                </div>
                </div>

      </section>
</body>
</html>
