<!doctype html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/output.css" rel="stylesheet">
  <link rel="stylesheet" href="css/upload.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Inter:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<title>GalleryKu | Upload Foto</title>
</head>
<body>
  <nav class="text-white bg-gray-200 p-5 shadow-xl">
    <div class="flex items-center justify-between container mx-auto">
        <div class="flex lg:flex-row lg:mx-auto justify-between container flex-col">
            <div class="flex">
            <h2 class="text-black text-3xl font-fontutama">GalleryKu</h2>
          <a href="/home"><button class="px-4 text-lg text-black font-fontkedua">Home</button></a>
            </div>
          <div>
            <button class="px-4 text-lg  bg-black rounded-full text-white-300 font-fontkedua">
              Upload Foto
            </button>
           <a href="/profile"><button class="px-4 text-lg text-black rounded-ful font-fontkedua">
              Profile
            </button></a>
            <a href="/tambah_album"><button class="text-lg text-black rounded-ful font-fontkedua">
                Tambah Album
              </button></a>
          </div>
        </div>
        </div>
      </nav>
<!-- Section Gambar-->
<form action="/unggah_foto" method="post" enctype="multipart/form-data">
    @csrf
<div class="container px-5 pt-32 sm:pl-[300px] pr-10 mb-24 lg:flex lg:flex-row ">
    <div class="w-1/2 max-[480px]:w-full">
        <div class="flex justify-center px-3">
            <div class="flex items-center justify-center w-full">
                <div class="container1">
                    <input type="file" id="file" accept="image/*" name="filefoto" hidden />
                    <div class="img-area select-image" data-img="">
                        <span class="bi-cloud-upload-fill icon"></span>
                        <h3>Upload Image</h3>
                        <p>Ukuran Gambar Harus Kurang Dari<span>2MB</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="lg:pl-10 lg:w-96 pr-20">
       <!-- judul -->
       <span class="text-sm mt-5 mb-1">Judul</span>
       <input type="text" id="judul" name="judul_foto"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-2"
            placeholder="Masukan Judul Foto" required />
       <!-- deskripsi -->
       <span class="text-sm mt-5 mb-1">Deskripsi</span>
       <textarea type="text" id="deskripsi" rows="4" name="deskripsi_foto"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 mb-2"
            placeholder="Masukan Deskripsi Foto"></textarea>
            <span class="text-sm mt-5 mb-1">Album</span>
     <div class="flex flex-row">
              <select id="album" name="album"
                class="block w-50 p-2.5 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                <option value="" class="text-black hidden">Pilih Album</option>
                @foreach ($album as $item)
                <option value="{{ $item->id }}">{{ $item->nama_album }}</option>
                @endforeach
              </select>
     </div>
       <button type="submit"
            class="bg-black text-white border border-gray-300 rounded-md text-sm px-5 h-8 ml-[190px] lg:ml-[10px]">
            <span class="">Post</span>
       </button>
  </div>
</div>
</form>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="/javascript/upload.js"></script>
</body>
</html>
