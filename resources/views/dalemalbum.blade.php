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
<title>GalleryKu | Home</title>
</head>
<body>
    <nav class="text-white bg-gray-200 p-5 shadow-xl">
        <div class="flex items-center justify-between container mx-auto">
            <div class="flex lg:flex-row lg:mx-auto justify-between container flex-col">
                <div class="flex">
                <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
                <a href="/home"><button class="px-4 text-lg text-black rounded-full font-fontkedua">Home</button></a>
                </div>
              <div>
                <a href="/album"><button class="px-4 text-lg bg-black rounded-full text-white-300 font-fontkedua">
                  Album
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
    <div class="flex max-w-screen-md mx-auto flex-wrap flex-col lg:flex-row gap-2">
@foreach ($album->foto as  $foto)
    <div class="w-[375px] h-[235px] bg-white shadow-2xl">
        <div class="flex flex-col">
            <div class="flex justify-center w-[375px] ">
            <div class="w-[363px] h-[192px] overflow-hidden rounded-sm">
                <img src="/gallery/{{ $foto->url }}" alt="">
            </div>
        </div>
        <div>
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex flex-col ml-3">
                        <div class="font-medium ">
                            {{ $foto->judul_foto }}
                        </div>
                        <div>
                            <div class="text-xs text-black">
                                {{ $foto->deskripsi_foto }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endforeach

</div>
</section>
</body>
</html>
