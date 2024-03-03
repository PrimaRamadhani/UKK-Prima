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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>GalleryKu | Profile</title>
</head>
<body>
    <nav class="text-white bg-gray-200 p-5 shadow-xl">
        <div class="flex items-center justify-between container mx-auto">
            <div class="flex lg:flex-row lg:mx-auto justify-between container flex-col">
                <div class="flex">
                <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
                <a href="/home"><button class="px-4 text-lg bg-black rounded-full text-white-300 font-fontkedua">Home</button></a>
                </div>
              <div>
                <a href="/upload_foto"><button class="px-4 text-lg text-black rounded-ful font-fontkedua">
                 Upload Foto
                </button></a>
                <a href="/profile"><button class="px-4 text-lg text-black rounded-full font-fontkedua">
                  Profile
                </button></a>
              </div>
            </div>
            </div>
          </nav>
    <section>
        @csrf
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div>
                <img src="" alt="" class="rounded-full w-36 h-36" id="imageuser">
            </div>
            <h3 class="text-xl font-semibold" id="username">
            </h3>
            <h4 class="text-abuabu" id="bio">
            </h4>
            <div class="flex flex-row mt-3">
                <a href="">
                    <small class="mr-4 text-abuabu" id="follower"></small>
                </a>
                <a href="">
                    <small class="text-abuabu" id="follow"></small>
                </a>
            </div>
                <div id="tombolikuti">
                    <button class="px-4 mt-4 text-white bg-black rounded-full"></button>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-10">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container gap-2" id="postinganbaru">
                {{-- <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/kucing2.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
                            </div>
                        </a>
                        <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                            <div>
                                <div class="flex flex-col">
                                    <div>
                                      Lucu
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
                                <small>14</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/kucing2.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
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
                                <small>14</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/kucing2.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
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
                                <small>14</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mt-2 bg-white">
                    <div class="flex flex-col px-2">
                        <a href="explore-detail.html">
                            <div class="w-[363px] h-[192px] bg-bgcolor2 overflow-hidden">
                                <img src="/assets/kucing2.png" alt="" class="w-full transition duration-300 ease-in-out hover:scale-105">
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
                                <small>14</small>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="/javascript/otherpin.js"></script>
</body>

</html>
