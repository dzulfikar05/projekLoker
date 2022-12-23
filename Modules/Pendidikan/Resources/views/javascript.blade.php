<script>
    var table = 'table_pendidikan';
    var form = 'form_pendidikan';
    var fields = [
        'pendidikan_id',
        'pendidikan_kode',
        'pendidikan_nama',
    ];

    $(() => {
        loadBlock()
        initTable();

    })

    initTable = () => {
        var table = $('#table_pendidikan').DataTable({
            processing: true,
            serverSide: true,
            searchAble: true,
            searching: true,
            paging: true,
            "bDestroy": true,
            ajax: "{{ route('pendidikan/table') }}",
            columns: [{
                    "data": null,
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {
                    data: 'pendidikan_kode',
                    name: 'pendidikan_kode',
                    render: function(data, type, full, meta) {
                        return `<span>${full.pendidikan_kode?full.pendidikan_kode:''}</span>`;
                    }
                },
                {
                    data: 'pendidikan_nama',
                    name: 'pendidikan_nama',
                    render: function(data, type, full, meta) {
                        return `<span>${full.pendidikan_nama?full.pendidikan_nama:''}</span>`;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        unblock()
    }

    onEdit = (el) => {
        loadBlock();
        var id = $(el).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : "{{ route('pendidikan/edit') }}",
            data:{
                pendidikan_id : id
            },
            method: 'post',
            success: function(data){
                unblock();
                $.each(fields, function(i,v){
                    $('#'+v).val(data[0][v]).change()
                })
            }
        })
    }

    onSave = () => {
        
        var formData = new FormData($(`[name="${form}"]`)[0]);
        
        var id_pendidikan = $('#pendidikan_id').val();
        var urlSave = "";

        if(id_pendidikan == '' || id_pendidikan == null){
            urlSave += "{{route('pendidikan/store')}}";
        }else{
            urlSave += "{{route('pendidikan/update')}}";
        }

        saConfirm({
            message: 'Apakah anda yakin untuk mengubah data?',
            callback:function(res){
                if(res){
                    loadBlock();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : urlSave,
                        method : 'post',
                        data : formData,
                        processData: false,
                        contentType: false,
                        success : function(res) {
                            unblock();
                            onReset();
                            saMessage({
                                success: res['success'],
                                title: res['title'],
                                message: res['message']
                            })
                            initTable();
                        } 
                    })
                }

            }
        })
    }

    onDelete = (el) => {
        var id = $(el).data('id');
        saConfirm({
            message: 'Apakah anda yakin untuk menghapus data?',
            callback:function(res){
                if(res){
                    loadBlock();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "{{ route('pendidikan/destroy') }}",
                        data:{
                            pendidikan_id : id
                        },
                        method: 'post',
                        
                        success: function(res){
                            unblock();
                            saMessage({
                                success: res['success'],
                                title: res['title'],
                                message: res['message']
                            })
                            initTable();

                        }
                    })
                }
            }
        }); 
        
    }

    onReset = () => {
        $.each(fields , function(i, v){
            $('#'+v).val('').change()
        })
    }

</script>
