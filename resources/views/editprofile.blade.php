<!doctype html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/output.css" rel="stylesheet">
  <title>GalleryKu | Edit Profile</title>
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
                <a href="/profile"><button class="px-4 text-lg bg-black rounded-full text-white-300 font-fontkedua">
                  Profile
                </button></a>
              </div>
            </div>
            </div>
          </nav>

          <section class="max-w-screen-md mx-auto mt-16">
            <form action="/ubahpoto" method="post" enctype="multipart/form-data">
                @csrf
            <div class="flex flex-wrap justify-between flex-container">
                <div class="flex flex-col items-center bg-white rounded-md shadow-xl h-[266px] w-[250px]">
                    <img src="/fotoprofile/{{ old('pictures', Auth::user()->pictures) }}" alt="" class="rounded-full w-36 h-36">
                    <input type="file"  name="foto" class="items-center w-48 h-10 mt-4 border rounded-md">
                    <button type="submit" class="py-2 mt-4 text-black rounded-md bg-gray-200">Perbaharui</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                </div>
            </form>
            <div class="w-3/5 max-[480px]:w-full">
                <div class="bg-white rounded-md shadow-xl ">
            <form action="/updateprofile" method="post">
                @csrf
                        <div class="flex flex-col px-4 py-4 ">
                            <h5 class="text-3xl text-center font-fontutama">Edit Profile</h5>
                            <h5>Username</h5>
                            <input type="text" class="py-1 rounded-md border" name="username" value="{{ $dataprofile->username }}">
                            <h5>Nama Lengkap</h5>
                            <input type="text" class="py-1 rounded-md border" name="nama_lengkap" value="{{ $dataprofile->nama_lengkap }}">
                            <h5>No Telepon</h5>
                            <input type="number" class="py-1 rounded-md border" name="no_telepon" value="{{ $dataprofile->no_telepon }}">
                            <h5>Alamat</h5>
                            <input type="text" class="py-1 rounded-md border" name="alamat" value="{{ $dataprofile->alamat }}">
                            <h5>Bio</h5>
                            <input type="text" class="py-1 rounded-md border" name="bio" value="{{ $dataprofile->bio }}">
                            <button type="submit" class="py-2 mt-4 text-black rounded-md bg-gray-200">Perbaharui</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            <a href="/editpassword" class="underline text-sky-500">Perbarui Password Disini</a></span>
                          </p>
                        </div>
                    </form>
                    </div>
                </div>

            </div>

        </section>
</body>
</html>
