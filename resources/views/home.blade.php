<!doctype html>
<html>
<head>
<script src="/js/jquery-3.7.0.js"></script>
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
<title>GalleryKu | Home</title>
</head>
<body>
  <nav class="text-white bg-gray-200 p-5 shadow-xl">
    <div class="flex items-center justify-between container mx-auto">
        <div class="flex lg:flex-row lg:mx-auto justify-between container flex-col">
            <div class="flex">
            <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
            <a href="/home"><button class="px-4 text-lg rounded-full text-black font-fontkedua">Home</button></a>
            </div>
            <form action="/home" method="get">
          <div>
            <input type="text" class="border border-gray-800 px-20 py-1 mr-4 rounded-full text-black" placeholder="Search..." name="cari">
          </div>
            </form>
          <div>
           <a href="/upload_foto"><button class="px-4 text-lg text-black rounded-full font-fontkedua">
              Upload Foto
            </button></a>
            <a href="/profile"><button class="px-4 text-lg text-black rounded-ful font-fontkedua">
              Profile
            </button></a>
          </div>
        </div>
        </div>
      </nav>
<!-- Section Gambar-->
<section class="mt-16">
    @csrf
    <div class="flex max-w-screen-md mx-auto flex-wrap flex-col lg:flex-row gap-4" id="exploredata">
        <div class="w-1/2">

    </div>
</section>
<script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="/javascript/explore.js"></script>
</body>
</html>
