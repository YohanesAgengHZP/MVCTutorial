$(function() {

    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        //console.log("ok");
    })

    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/mvcphp/public/mahasiswa/ubah');
        //console.log("ok");

        const id = $(this).data('id');
        //console.log(id);

        //jalankan ajax
        $.ajax({

            //jalankan URL
            url: 'http://localhost/mvcphp/public/mahasiswa/getubah', //mengambi dataa dari url 
            data: {id : id }, //method dta dengan nama id, bagian kiri yang idikirmkan, bagian kanan yang ditangkap
            method: 'post', //menggunakan method post
            dataType: 'json',
            success: function(data) //parameter function
            {
                //console.log(data);
                $('#nama').val(data.nama); //mencari variabel nama
                $('#nim').val(data.nim);
                $('#kelas').val(data.kelas);
                $('#id').val(data.id);
            }

        });
    })


});