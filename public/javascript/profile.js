// var segmentTerakhir = window.location.href.split("/").pop();

// $.getJSON(window.location.origin +'/profile/getDataPin/'+segmentTerakhir, function(res){
//     console.log(res)
//     $('#username').html(res.dataUser.username)
//     $('#imageuser').prop('src', '/fotoprofile/'+res.dataUser.pictures)
//     $('#follower').html(res.jumlahFollower[0].jmlfollower+' Pengikut')
//     $('#follow').html(res.jumlahFollow[0].jmlfollow+' Mengikuti')
// })

// //Ikuti
// function ikuti(txt, id){
//     $.ajax({
//         url: window.location.origin +'/komentar/ikuti',
//         type: "POST",
//         dataType: "JSON",
//         data: {
//             idfollow: id,
//             _token: $('input[name="_token"]').val()
//         },
//         success: function(res){
//             location.reload()
//         },
//         error: function(jqXHR, textStatus, errorThrown){
//             alert('Gagal')
//         }
//     })
// }

// //Postingan Bawah
// var paginate = 1;
// var dataExplore = [];
// loadMoreData(paginate);
// $(window).scroll(function(){
//     if($(window).scrollTop() + $(window).height() >= $(document).height()){
//         paginate++;
//         loadMoreData(paginate);
//     }
// })
// function loadMoreData(paginate){
//     $.ajax({
//         url: window.location.origin +'/getDataExplore'+ '?page='+paginate,
//         type: "GET",
//         dataType: "JSON",
//         success: function(e){
//             console.log(e)
//             e.data.data.map((x)=>{
//             var hasilPencarian = x.likefoto.filter(function(hasil){
//                 return hasil.users_id === e.idUser
//             })
//             if(hasilPencarian.length <= 0){
//                 userlike = 0;
//             } else {
//                 userlike = hasilPencarian[0].users_id;
//             }
//                     let datanya = {
                        // id: x.id,
                        // judul_foto: x.judul_foto,
                        // deksripsi_foto: x.deksripsi_foto,
                        // foto: x.url,
                        // tanggal: x.created_at,
                        // jml_komen: x.komentar_count,
                        // jml_like: x.likefoto_count,
                        // idUserLike: userlike,
                        // useractive: e.idUser,
                        // users_id: x.users_id,
//                 }
//                 dataExplore.push(datanya)
//                 console.log(userlike)
//                 console.log(e.idUser)
//             })
//             getExplore()
//         },
//         error: function(jqXHR, textStatus, errorThrown){

//         }
//     })
// }

// //Pengulangan Data Foto
// const getExplore =()=>{
//     $('#postinganbaru').html('')
//     dataExplore.map((x, i)=>{
//         $('#postinganbaru').append(
//             `
        //     <div class="w-[375px] h-[235px] bg-white  shadow-xl">
        //     <div class="flex flex-col">
        //         <a href="/komentar/${x.id}">
        //         <div class="flex justify-center w-[375px] ">
        //         <div class="w-[363px] h-[192px] overflow-hidden rounded-sm">
        //             <img class="w-full transition duration-500 ease-in-out hover:scale-105" src="/gallery/${x.foto}" alt="">
        //         </div>
        //     </div></a>
        //     <div>
        //         <div class="flex items-center justify-between">
        //             <div>
        //                 <div class="flex flex-col ml-3">
        //                     <div class="font-medium ">
        //                        ${x.judul_foto}
        //                     </div>
        //                     <div>
        //                         <div class="text-xs text-gray-400">
        //                         ${new Date(x.tanggal).toLocaleDateString("id")}
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>
        //             <div>
        //                 <div class="flex gap-2 mr-4">
        //                     <div>
        //                         <span class="bi bi-chat-left-text"></span>
        //                         <small>${x.jml_komen}</small>
        //                     </div>
        //                     <div>
        //                         <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill': 'bi-heart'}" onclick="likes(this, ${x.id})"></span>
        //                         <small>${x.jml_like}</small>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
        //     </div>
        // </div>
        // </div>
//             `
//         )
//     })
// }

// //Like Foto
// function likes(txt, id){
//     $.ajax({
//         url: window.location.origin +'/likefoto',
//         dataType: "JSON",
//         type: "POST",
//         data: {
//             _token: $('input[name="_token"]').val(),
//             idfoto: id
//         },
//         success:function(res){
//             console.log(res)
//             location.reload()
//         },
//         error:function(jqXHR, textStatus, errorThrown){
//             alert('gagal')

//         }
//     })
// }

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
        url: window.location.origin +'/getDataPostingan'+ '?page='+paginate,
        type: "GET",
        dataType: "JSON",
        success: function(e){
            console.log(e)
            e.data.data.map((x)=>{
                //Format Tanggal
                var tanggal = x.created_at;
                var tanggalObj = new Date(tanggal);
                var tanggalFormatted = ('0' + tanggalObj.getDate()).slice(-2);
                var bulanFormatted = ('0' + (tanggalObj.getMonth() + 1)).slice(-2);
                var tahunFormatted = tanggalObj.getFullYear();
                var tanggalupload = tanggalFormatted + '-' + bulanFormatted + '-' + tahunFormatted;
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
//pengulangan data
const getExplore =()=>{
    $('#postingandata').html('')
    dataExplore.map((x, i)=>{
        $('#postingandata').append(
            `
            <div class="w-[375px] h-[235px] bg-white shadow-2xl">
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
                        <button type="button" data-id="${x.id}" class="btn-bi-trash">
                        <span class="bi bi-trash"></span>
                        </button>
                        </div>
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

//toggle
function toggleContent(index) {
    var dropdown = document.getElementById('dropdownDotsb' + index);
    if (dropdown.style.display === 'none' || dropdown.style.display === '') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
}

//likefoto
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

//Hapus Foto
$(document).on('click', '.btn-bi-trash', function() {
    console.log('Tombol Hapus Diklik');
    var id = $(this).data('id');

    // Show loading spinner or change appearance immediately
    $('#elemen-foto-' + id).addClass('deleting');

    if (confirm('Apakah Anda Yakin Ingin Menghapus Postingan Ini?')) {
        deletefoto(id);
    }

    function deletefoto(id) {
        $.ajax({
            url: '/deletefoto/' + id,
            dataType: "JSON",
            type: "DELETE",
            data: {
                _token: $('input[name="_token"]').val(),
                id: id
            },
            success: function(res) {
                if (res.success) {
                    // Hapus elemen postingan dari tampilan
                    $('#elemen-foto-' + id).remove();
                    // Refresh the page
                    location.reload();
                } else {
                    alert('Gagal Menghapus Postingan Ini');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal Menghapus Postingan Ini');
            },
            complete: function() {
                // Remove loading spinner or revert appearance
                $('#elemen-foto-' + id).removeClass('deleting');
            }
        });
    }
});
