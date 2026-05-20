<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Modul Jabatan - HRIS Payroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
        }

        body{
            background:#f5f1ec;
            color:#1f2937;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:40px auto;
        }

        .header{
            background:linear-gradient(135deg,#dc2626,#f59e0b);
            padding:30px;
            border-radius:20px;
            color:white;
            margin-bottom:25px;
            box-shadow:0 10px 25px rgba(220,38,38,0.25);
        }

        .header h1{
            margin-bottom:10px;
            font-size:32px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:18px;
            margin-bottom:25px;
            border-top:6px solid #dc2626;
            box-shadow:0 6px 18px rgba(0,0,0,0.08);
        }

        .card h2{
            color:#991b1b;
            margin-bottom:20px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:18px;
        }

        .full{
            grid-column:span 2;
        }

        label{
            display:block;
            margin-bottom:6px;
            font-weight:600;
            color:#7f1d1d;
        }

        .required{
            color:red;
            font-weight:bold;
        }

        input,
        textarea{
            width:100%;
            padding:12px;
            border:1px solid #d1d5db;
            border-radius:10px;
            outline:none;
            background:#f9fafb;
        }

        input:focus,
        textarea:focus{
            border-color:#dc2626;
            background:white;
            box-shadow:0 0 0 4px rgba(220,38,38,0.15);
        }

        textarea{
            min-height:100px;
            resize:vertical;
        }

        .button-group{
            margin-top:20px;
            display:flex;
            gap:12px;
        }

        button{
            border:none;
            padding:12px 18px;
            border-radius:10px;
            cursor:pointer;
            font-weight:600;
            transition:0.2s;
        }

        button:hover{
            transform:translateY(-2px);
        }

        .btn-primary{
            background:#dc2626;
            color:white;
        }

        .btn-reset{
            background:#f59e0b;
            color:white;
        }

        .btn-edit{
            background:#facc15;
            color:#111827;
            padding:8px 12px;
            margin-right:6px;
        }

        .btn-delete{
            background:#dc2626;
            color:white;
            padding:8px 12px;
        }

        .table-wrapper{
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            min-width:900px;
        }

        th{
            background:#fef3c7;
            color:#991b1b;
            padding:14px;
            text-align:left;
        }

        td{
            padding:14px;
            border-bottom:1px solid #e5e7eb;
        }

        tr:hover{
            background:#fff7ed;
        }

        .nominal{
            font-weight:bold;
            color:#166534;
        }

        .empty{
            text-align:center;
            padding:30px;
            color:#6b7280;
        }

        @media(max-width:768px){

            .form-grid{
                grid-template-columns:1fr;
            }

            .full{
                grid-column:span 1;
            }

            .button-group{
                flex-direction:column;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">
        <h1>Modul Jabatan</h1>
        <p>Aplikasi HRIS & Payroll</p>
    </div>

    <div class="card">

        <h2>Form Data Jabatan</h2>

        <form id="formJabatan">

            <input type="hidden" id="id_jabatan">

            <div class="form-grid">

                <div>
                    <label>
                        Nama Jabatan
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_jabatan"
                        placeholder="Contoh: Manager"
                        required
                    >
                </div>

                <div>
                    <label>
                        Gaji Pokok
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="gaji_pokok"
                        placeholder="Contoh: 7000000"
                        required
                    >
                </div>

                <div class="full">
                    <label>
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        placeholder="Masukkan deskripsi jabatan"
                    ></textarea>
                </div>

            </div>

            <div class="button-group">

                <button
                    type="submit"
                    class="btn-primary"
                    id="btnSubmit"
                >
                    Simpan Jabatan
                </button>

                <button
                    type="button"
                    class="btn-reset"
                    id="btnReset"
                >
                    Reset
                </button>

            </div>

        </form>

    </div>

    <div class="card">

        <h2>Data Jabatan</h2>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="dataJabatan"></tbody>

            </table>

        </div>

    </div>

</div>

<script>

    const apiUrl = "/api/jabatans";

    function rupiah(angka){
        return "Rp " + Number(angka).toLocaleString("id-ID");
    }

    function resetForm(){

        $("#formJabatan")[0].reset();

        $("#id_jabatan").val("");

        $("#btnSubmit").text("Simpan Jabatan");
    }

    function loadJabatan(){

        $.ajax({

            url: apiUrl,

            type: "GET",

            success:function(response){

                let rows = "";

                if(!response.data || response.data.length === 0){

                    rows = `
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada data jabatan
                            </td>
                        </tr>
                    `;

                } else {

                    $.each(response.data,function(index,item){

                        rows += `
                            <tr>

                                <td>${item.id}</td>

                                <td>${item.nama_jabatan}</td>

                                <td class="nominal">
                                    ${rupiah(item.gaji_pokok)}
                                </td>

                                <td>
                                    ${item.deskripsi ?? '-'}
                                </td>

                                <td>

                                    <button
                                        class="btn-edit"

                                        data-id="${item.id}"

                                        data-nama_jabatan="${item.nama_jabatan}"

                                        data-gaji_pokok="${item.gaji_pokok}"

                                        data-deskripsi="${item.deskripsi ?? ''}"
                                    >
                                        Edit
                                    </button>

                                    <button
                                        class="btn-delete"
                                        data-id="${item.id}"
                                    >
                                        Hapus
                                    </button>

                                </td>

                            </tr>
                        `;
                    });

                }

                $("#dataJabatan").html(rows);

            },

            error:function(xhr){

                console.log(xhr.responseText);

                alert("Gagal mengambil data jabatan");
            }

        });

    }

    loadJabatan();

    $("#formJabatan").submit(function(e){

        e.preventDefault();

        let id = $("#id_jabatan").val();

        let url = id ? apiUrl + "/" + id : apiUrl;

        $.ajax({

            url: url,

            type: "POST",

            data:{

                _method: id ? "PUT" : "POST",

                nama_jabatan: $("#nama_jabatan").val(),

                gaji_pokok: $("#gaji_pokok").val(),

                deskripsi: $("#deskripsi").val()

            },

            success:function(response){

                alert(response.message);

                resetForm();

                loadJabatan();

            },

            error:function(xhr){

                console.log(xhr.responseText);

                alert("Gagal menyimpan data jabatan");
            }

        });

    });

    $("#dataJabatan").on("click",".btn-edit",function(){

        $("#id_jabatan").val($(this).data("id"));

        $("#nama_jabatan").val($(this).data("nama_jabatan"));

        $("#gaji_pokok").val($(this).data("gaji_pokok"));

        $("#deskripsi").val($(this).data("deskripsi"));

        $("#btnSubmit").text("Update Jabatan");

        window.scrollTo({
            top:0,
            behavior:"smooth"
        });

    });

    $("#dataJabatan").on("click",".btn-delete",function(){

        let id = $(this).data("id");

        if(confirm("Yakin ingin menghapus data jabatan?")){

            $.ajax({

                url: apiUrl + "/" + id,

                type: "POST",

                data:{
                    _method:"DELETE"
                },

                success:function(response){

                    alert(response.message);

                    loadJabatan();

                },

                error:function(xhr){

                    console.log(xhr.responseText);

                    alert("Gagal menghapus data jabatan");
                }

            });

        }

    });

    $("#btnReset").click(function(){
        resetForm();
    });

</script>

</body>
</html>