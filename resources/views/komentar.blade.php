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
<title>GalleryKu | Komentar</title>
</head>
<body>
    <nav class="text-white bg-gray-200 p-5 shadow-xl">
        <div class="flex items-center justify-between container mx-auto">
            <div class="flex lg:flex-row lg:mx-auto justify-between container flex-col">
                <div class="flex">
                <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
               <a href="/home"><button class="px-4 text-lg bg-black rounded-full text-white-300 font-fontkedua">Home</button></a>
                </div>
                <form action="/home" method="get">
                    <div>
                      <input type="text" class="border border-gray-800 px-20 py-1 mr-4 rounded-full  text-black" placeholder="Search . . ." name="cari">
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
      <section class="mt-16">
        <div class="max-w-screen-md mx-auto shadow-xl">
            <div class="flex flex-wrap px-2 flex-container">
                <div class="flex max-w-screen-md mx-auto flex-wrap flex-col lg:flex-row">
                    <div class="w-1/2">
                    <div class="w-[375px] h-[235px] bg-white shadow-2xl">
                        <div class="flex flex-col">
                            <div class="flex justify-center w-[375px] ">
                            <div class="w-[363px] h-[192px] overflow-hidden rounded-sm">
                                <img class="" src="" alt="" id="fotodetail">
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex flex-col ml-3">
                                        <div class="font-medium" id="judulfoto">

                                        </div>
                                        <div>
                                            <div class="text-xs text-black" id="deskripsifoto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
                <div class="w-2/5  max-[480px]:w-full">
                    @csrf
                    <div class="flex flex-wrap items-center justify-between ">
                        <div class="flex flex-row items-center gap-2">
                            <div>
                                <img src="" class="rounded-full w-10 h-10" alt="" id="fotoprofile">
                            </div>
                            <div class="flex flex-col">
                                <a href="" class="text-md" id="username"></a>
                                <small class="text-xs" id="jumlahpengikut"></small>
                            </div>
                        </div>
                        <div id="tombolfollow">
                            <button class="px-4 rounded-full bg-gray-200"></button>
                        </div>
                    </div>
                    <div class="mt-[33px]">
                        Komentar Foto
                    </div>
                     <div class="relative flex flex-col overflow-y-auto h-[200px] scrollbar-hidden" id="listkomentar">

                    </div>
                    <div class="flex gap-2 mt-2">
                        <div class="w-3/4">
                            <input type="text" name="komentar" id="" placeholder="Tuliskan Komentar" class="w-full px-2 py-1 rounded-full border border-black">
                        </div>
                        <button class="px-4 rounded-full bg-gray-400" onclick="kirimkomentar()"><span class="text-black bi bi-send"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-10">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap px-2 flex-container">
                <div class="w-2/5  max-[480px]:w-full">
                    <div class="flex flex-wrap items-center justify-between ">
                        <div class="flex flex-row items-center gap-2">
                            <div class="flex flex-col">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mt-10 flex-container gap-2" id="postinganbawah">
                {{-- <div class="flex mx-auto mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/bg_01.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        Kebahagiaan
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        8:12 AM
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-chat-left-text"></span>
                                <small>14</small>
                                <span class="bi bi-heart"></span>
                                <small>20</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mx-auto mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/bg_02.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        Kebahagiaan
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        8:12 AM
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-chat-left-text"></span>
                                <small>14</small>
                                <span class="bi bi-heart"></span>
                                <small>20</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mx-auto mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/bg_04.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        Kebahagiaan
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        8:12 AM
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-chat-left-text"></span>
                                <small>14</small>
                                <span class="bi bi-heart"></span>
                                <small>20</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mx-auto mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/bg_01.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                        Kebahagiaan
                                    </div>
                                    <div class="text-xs text-abuabu">
                                        8:12 AM
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="bi bi-chat-left-text"></span>
                                <small>14</small>
                                <span class="bi bi-heart"></span>
                                <small>20</small>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <script src="/javascript/exploredetail.js"></script>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>



