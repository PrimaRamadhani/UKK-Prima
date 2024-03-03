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
                <a href="/home"><button class="px-4 text-lg rounded-full text-black font-fontkedua">Home</button></a>
                </div>
              <div>
                <a href="/upload_foto"><button class="px-4 text-lg text-black rounded-ful font-fontkedua">
                 Upload Foto
                </button></a>
                <a href="/profile"><button class="px-4 text-lg text-white-300  bg-black rounded-full  font-fontkedua">
                  Profile
                </button></a>
                <a href="/logout"><button class="px-4 text-lg text-black rounded-full font-fontkedua">
                    Sign Out
                  </button></a>
              </div>
            </div>
            </div>
          </nav>
    <section>
        @csrf
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div>
                <img src="/fotoprofile/{{ old('pictures', Auth::user()->pictures) }}"  alt="" class="rounded-full w-36 h-36" id="imageuser">
            </div>
            <h3 class="text-xl font-semibold" id="username">
                {{ old('username', Auth::User()->username) }}
            </h3>
            <h4 class="text-abuabu" id="bio">
                {{ old('bio', Auth::User()->bio) }}
            </h4>
            <div class="flex flex-row mt-3">
                    <small class="mr-4 text-abuabu">{{ $userFollowers }} Pengikut</small>
                </a>
                    <small class="text-abuabu">{{ $dataFollowCount }} Mengikuti</small>
                </a>
            </div>
            <div class="flex gap-2 mr-4">
                <div>
                    <a href="/editprofile"><button class="px-4 mt-4 text-black bg-gray-200 rounded-full">Edit Profile</button></a>
                </div>
                <div>
                    <a href="/album"><button class="px-4 mt-4 text-black bg-gray-200 rounded-full">Album</button></a>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class="mt-10">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container gap-2 " id="postingandata">
                {{-- <form action="/profile/{{ $foto->id }}" method="post">
                    @csrf
                    @method('DELETE') --}}
            </div>
        </div>
    </section>
    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="/javascript/profile.js"></script>
</body>

</html>
