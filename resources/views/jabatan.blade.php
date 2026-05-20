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
            background:#6f8764;
            color:#1f2937;
        }

        .navbar{
            width:90%;
            max-width:1200px;
            margin:30px auto 0;
            height:85px;
            background:white;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 45px;
            border-radius:25px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
        }

        .logo{
            font-size:30px;
            font-weight:800;
            color:#3d6b2f;
        }

        .nav-menu{
            display:flex;
            gap:26px;
            align-items:center;
        }

        .nav-menu a{
            text-decoration:none;
            color:#2f3d2a;
            font-weight:600;
            font-size:15px;
        }

        .nav-menu a:hover{
            color:#4f8b3d;
        }

        .btn-nav{
            background:#4f8b3d;
            color:white !important;
            padding:12px 24px;
            border-radius:30px;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:30px auto 40px;
        }

        .header{
            background:
                linear-gradient(rgba(18,48,25,0.55), rgba(18,48,25,0.75)),
                url('https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1400&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
            padding:40px;
            border-radius:25px;
            color:white;
            margin-bottom:25px;
            box-shadow:0 12px 28px rgba(0,0,0,0.15);
        }

        .header h1{
            margin-bottom:10px;
            font-size:38px;
        }

        .header p{
            color:#f2f2f2;
        }

        .card{
            background:white;
            padding:28px;
            border-radius:22px;
            margin-bottom:25px;
            box-shadow:0 8px 22px rgba(0,0,0,0.08);
        }

        .card h2{
            color:#2f3d2a;
            margin-bottom:22px;
            font-size:28px;
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
            margin-bottom:7px;
            font-weight:600;
            color:#374151;
        }

        .required{
            color:red;
            font-weight:bold;
        }

        input,
        textarea{
            width:100%;
            padding:13px 15px;
            border:1px solid #d1d5db;
            border-radius:12px;
            outline:none;
            background:#f9fafb;
            transition:0.3s;
        }

        input:focus,
        textarea:focus{
            border-color:#4f8b3d;
            background:white;
            box-shadow:0 0 0 4px rgba(79,139,61,0.15);
        }

        textarea{
            min-height:100px;
            resize:vertical;
        }

        .button-group{
            margin-top:22px;
            display:flex;
            gap:12px;
        }

        button{
            border:none;
            padding:12px 18px;
            border-radius:12px;
            cursor:pointer;
            font-weight:600;
            transition:0.3s;
        }

        button:hover{
            transform:translateY(-2px);
        }

        .btn-primary{
            background:#4f8b3d;
            color:white;
        }

        .btn-reset{
            background:#f59e0b;
            color:white;
        }

        .btn-edit{
            background:#d9f99d;
            color:#365314;
            padding:9px 14px;
            margin-right:6px;
        }

        .btn-delete{
            background:#dc2626;
            color:white;
            padding:9px 14px;
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
            background:#ecf7df;
            color:#365314;
            padding:15px;
            text-align:left;
        }

        td{
            padding:15px;
            border-bottom:1px solid #e5e7eb;
        }

        tr:hover{
            background:#f7fbea;
        }

        .nominal{
            font-weight:bold;
            color:#166534;
        }

        .empty{
            text-align:center;
            padding:35px;
            color:#6b7280;
        }

        @media(max-width:768px){
            .navbar{
                flex-direction:column;
                height:auto;
                gap:18px;
                padding:25px;
            }

            .nav-menu{
                flex-wrap:wrap;
                justify-content:center;
                gap:15px;
            }

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

<nav class="navbar">
    <div class="logo">HRIS Payroll</div>

    <div class="nav-menu">
        <a href="/">Home</a>
        <a href="/karyawan">Karyawan</a>
        <a href="/jabatan">Jabatan</a>
        <a href="/kehadiran">Kehadiran</a>
        <a href="/gaji">Gaji</a>
        <a href="/cuti">Cuti</a>
        <a href="/" class="btn-nav">Dashboard</a>
    </div>
</nav>

<div class="container">

    <div class="header">
        <h1>Modul Jabatan</h1>
        <p>Kelola data jabatan dan gaji pokok karyawan perusahaan</p>
    </div>

    <div class="card">
        <h2>Form Data Jabatan</h2>

        <form id="formJabatan">
            <input type="hidden" id="id_jabatan">

            <div class="form-grid">
                <div>
                    <label>Nama Jabatan <span class="required">*</span></label>
                    <input type="text" id="nama_jabatan" placeholder="Contoh: Manager" required>
                </div>

                <div>
                    <label>Gaji Pokok <span class="required">*</span></label>
                    <input type="number" id="gaji_pokok" placeholder="Contoh: 7000000" required>
                </div>

                <div class="full">
                    <label>Deskripsi</label>
                    <textarea id="deskripsi" placeholder="Masukkan deskripsi jabatan"></textarea>
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-primary" id="btnSubmit">Simpan Jabatan</button>
                <button type="button" class="btn-reset" id="btnReset">Reset</button>
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
                            <td colspan="5" class="empty">Belum ada data jabatan</td>
                        </tr>
                    `;
                } else {
                    $.each(response.data,function(index,item){
                        rows += `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.nama_jabatan}</td>
                                <td class="nominal">${rupiah(item.gaji_pokok)}</td>
                                <td>${item.deskripsi ?? '-'}</td>
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

                                    <button class="btn-delete" data-id="${item.id}">
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