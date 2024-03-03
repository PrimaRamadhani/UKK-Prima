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
    var urlnya = window.location.href.split("?")[1];
    var parameter = new URLSearchParams(urlnya);
    var cariValue = parameter.get('cari')
    if(cariValue == 'null'){
        url = window.location.origin +'/getDataExplore/'+ '?page='+paginate;
    } else {
        url = window.location.origin +'/getDataExplore?cari='+ cariValue + '&page='+paginate;
    }
    $.ajax({
        url: url,
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
    $('#exploredata').html('')
    dataExplore.map((x, i)=>{
        $('#exploredata').append(
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
                            <a href="/komentar/${x.id}"><span class="bi bi-chat-left-text"></span></a>
                                <small>${x.jml_komen}</small>
                            </div>
                            <div>
                                <span class="bi ${x.idUserLike === x.useractive ? 'bi-heart-fill text-red-500' : 'bi-heart'}" onclick="likes(this, ${x.id})"></span>
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
