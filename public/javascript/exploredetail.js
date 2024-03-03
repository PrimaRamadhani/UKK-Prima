var segmentTerakhir = window.location.href.split('/').pop();
$.ajax({
    url: window.location.origin +'/komentar/'+ segmentTerakhir +'/getdatadetail',
    type: "GET",
    dataType: "JSON",
    success: function(res){
        console.log(res)
        $('#fotodetail').prop('src', '/gallery/'+res.dataDetailFoto.url)
        $('#fotoprofile').prop('src', '/fotoprofile/'+res.dataDetailFoto.user.pictures)
        $('#judulfoto').html(res.dataDetailFoto.judul_foto)
        $('#deskripsifoto').html(res.dataDetailFoto.deskripsi_foto)
        $('#jumlahpengikut').html(res.dataJumlahFollow.jmlfolow + ' Pengikut')
        $('#username').html(res.dataDetailFoto.user.username)
        $('#username').prop('href', '/lihatpublik/'+res.dataDetailFoto.user.id)
        ambilKomentar()
        var idUser ;
        if(res.dataFollow == null){
            idUser=""
        } else {
            idUser = res.dataFollow.users_id
        }
        if(res.dataDetailFoto.users_id === res.dataUser){
            $('#tombolfollow').html('')
        } else {
            if(idUser === res.dataUser){
                $('#tombolfollow').html('<button class="px-4 rounded-full bg-black text-white" onclick = "ikuti(this, '+res.dataDetailFoto.users_id+')">Mengikuti</button>')
            } else {
                $('#tombolfollow').html('<button class="px-4 rounded-full bg-gray-200" onclick = "ikuti(this, '+res.dataDetailFoto.users_id+')">Ikuti</button>')
            }
        }

    },
    error: function(jqXHR, textStatus, errorThrown){
        alert('gagal')
    }
})

//Ambil Komentar
function ambilKomentar(){
    $.getJSON(window.location.origin +'/komentar/getkomentar/'+segmentTerakhir, function(res){
        console.log(res)
        if(res.data.length === 0){
            $('#listkomentar').html('<div>Belum ada komentar</div>')
        } else {
            komen= []
            res.data.map((x)=>{
                let datakomentar = {
                    idUser: x.user.id,
                    pengirim: x.user.username,
                    waktu: x.created_at,
                    isi_komentar: x.isi_komentar,
                    potopengirim: x.user.pictures,
                }
                komen.push(datakomentar);
            })
            tampilkankomentar()
        }
    })
}

//Menampilkan Komentar
const tampilkankomentar = ()=>{
    $('#listkomentar').html('')
    komen.map((x, i)=>{
        $('#listkomentar').append(`

                        <div class="flex flex-row justify-start mt-4">
                            <div class="mr-2">
                                <img src="/fotoprofile/${x.potopengirim}" class="rounded-full w-8 h-8" alt="">
                            </div>
                            <div class="flex flex-col mr-2">
                            <a href="/lihatpublik/${x.idUser}"><h5 class="text-sm">${x.pengirim}</h5></a>
                                <small class="text-xs text-abuabu">${new Date(x.waktu).toLocaleDateString("id")}</small>
                                <h5 class="text-sm">${x.isi_komentar}</h5>
                            </div>
                        </div>

                        `)
})
}

//Kirim Komentar
function kirimkomentar(){
    $.ajax({
        url: window.location.origin +'/komentar/kirimkomentar',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: segmentTerakhir,
            isi_komentar: $('input[name="komentar"]').val()
        },
        success: function(res){
            $('input[name="komentar"]').val('')
            location.reload()
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal mengirim komentar')
        }
    })
}
//setInterval(ambilkomentar, 500);

//Follow UnFollow
function ikuti(txt, idfollow){
    $.ajax({
        url: window.location.origin +'/komentar/ikuti',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfollow: idfollow
        },
        success:function(res){
            location.reload()
        },
        error:function(jqXHR, textStatus, errorThrown){
            alert('gagal')

        }
    })
}

//Postingan Bawah
var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        paginate++;
        loadMoreData(paginate);
    }
})
function loadMoreData(paginate){
    $.ajax({
        url: window.location.origin +'/getDataExplore'+ '?page='+paginate,
        type: "GET",
        dataType: "JSON",
        success: function(e){
            console.log(e)
            e.data.data.map((x)=>{
            var hasilPencarian = x.likefoto.filter(function(hasil){
                return hasil.users_id === e.idUser
            })
            if(hasilPencarian.length <= 0){
                userlike = 0;
            } else {
                userlike = hasilPencarian[0].users_id;
            }
                    let datanya = {
                        id: x.id,
                        judul_foto: x.judul_foto,
                        deksripsi_foto: x.deksripsi_foto,
                        foto: x.url,
                        tanggal: x.created_at,
                        jml_komen: x.komentar_count,
                        jml_like: x.likefoto_count,
                        idUserLike: userlike,
                        useractive: e.idUser,
                        users_id: x.users_id,
                }
                dataExplore.push(datanya)
                console.log(userlike)
                console.log(e.idUser)
            })
            getExplore()
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    })
}

//Pengulangan Data Foto
const getExplore =()=>{
    $('#postinganbawah').html('')
    dataExplore.map((x, i)=>{
        $('#postinganbawah').append(
            `
            <div class="w-[375px] h-[235px] bg-white shadow-xl">
            <div class="flex flex-col">
                <a href="/komentar/${x.id}">
                <div class="flex justify-center w-[375px] ">
                <div class="w-[363px] h-[192px] overflow-hidden rounded-sm">
                    <img class="w-full transition duration-500 ease-in-out hover:scale-105" src="/gallery/${x.foto}" alt="">
                </div>
            </div></a>
            <div>
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex flex-col ml-3">
                            <div class="font-medium ">
                               ${x.judul_foto}
                            </div>
                            <div>
                                <div class="text-xs text-gray-400">
                                ${new Date(x.tanggal).toLocaleDateString("id")}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-2 mr-4">
                            <div>
                            <a href="/komentar/${x.id}"><span class="bi bi-chat-left-text"></span></a>
                                <small>${x.jml_komen}</small>
                            </div>
                            <div>
                                <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill': 'bi-heart'}" onclick="likes(this, ${x.id})"></span>
                                <small>${x.jml_like}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
            `
        )
    })
}

//Like Foto
function likes(txt, id){
    $.ajax({
        url: window.location.origin +'/likefoto',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: id
        },
        success:function(res){
            console.log(res)
            location.reload()
        },
        error:function(jqXHR, textStatus, errorThrown){
            alert('gagal')

        }
    })
}
