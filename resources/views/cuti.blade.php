<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Cuti - HRIS Payroll</title>
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

        /* NAVBAR */

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
            transition:0.3s;
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

        /* CONTAINER */

        .container{
            width:90%;
            max-width:1200px;
            margin:30px auto 40px;
        }

        /* HEADER */

        .header{
            background:
                linear-gradient(rgba(18,48,25,0.55), rgba(18,48,25,0.75)),
                url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1400&auto=format&fit=crop');

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

        /* CARD */

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

        /* FORM */

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
        select,
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
        select:focus,
        textarea:focus{
            border-color:#4f8b3d;
            background:white;
            box-shadow:0 0 0 4px rgba(79,139,61,0.15);
        }

        textarea{
            min-height:100px;
            resize:vertical;
        }

        /* BUTTON */

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
            padding:8px 12px;
            margin-right:6px;
        }

        .btn-delete{
            background:#dc2626;
            color:white;
            padding:8px 12px;
        }

        /* TABLE */

        .table-wrapper{
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            min-width:1000px;
        }

        th{
            background:#ecf7df;
            color:#365314;
            padding:14px;
            text-align:left;
        }

        td{
            padding:14px;
            border-bottom:1px solid #e5e7eb;
        }

        tr:hover{
            background:#f7fbea;
        }

        .badge{
            padding:6px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:700;
        }

        .menunggu{
            background:#fef3c7;
            color:#92400e;
        }

        .disetujui{
            background:#dcfce7;
            color:#166534;
        }

        .ditolak{
            background:#fee2e2;
            color:#991b1b;
        }

        .empty{
            text-align:center;
            padding:30px;
            color:#6b7280;
        }

        /* RESPONSIVE */

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

            .header h1{
                font-size:28px;
            }
        }

    </style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar">

    <div class="logo">
        HRIS Payroll
    </div>

    <div class="nav-menu">
        <a href="/">Home</a>
        <a href="/karyawan">Karyawan</a>
        <a href="/jabatan">Jabatan</a>
        <a href="/kehadiran">Kehadiran</a>
        <a href="/gaji">Gaji</a>
        <a href="/cuti">Cuti</a>

        <a href="/" class="btn-nav">
            Dashboard
        </a>
    </div>

</nav>

<!-- CONTAINER -->

<div class="container">

    <!-- HEADER -->

    <div class="header">
        <h1>Modul Pengajuan Cuti</h1>
        <p>Kelola pengajuan cuti karyawan perusahaan</p>
    </div>

    <!-- FORM -->

    <div class="card">

        <h2>Form Pengajuan Cuti</h2>

        <form id="formCuti">

            <input type="hidden" id="id_cuti">

            <div class="form-grid">

                <div>
                    <label>ID Karyawan <span class="required">*</span></label>
                    <input type="number" id="karyawan_id" min="1" required>
                </div>

                <div>
                    <label>Jenis Cuti <span class="required">*</span></label>

                    <select id="jenis_cuti" required>
                        <option value="">-- Pilih Jenis Cuti --</option>
                        <option value="Cuti Tahunan">Cuti Tahunan</option>
                        <option value="Cuti Sakit">Cuti Sakit</option>
                        <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                        <option value="Cuti Penting">Cuti Penting</option>
                    </select>
                </div>

                <div>
                    <label>Tanggal Mulai <span class="required">*</span></label>
                    <input type="date" id="tanggal_mulai" required>
                </div>

                <div>
                    <label>Tanggal Selesai <span class="required">*</span></label>
                    <input type="date" id="tanggal_selesai" required>
                </div>

                <div class="full">
                    <label>Alasan Cuti</label>
                    <textarea id="alasan" placeholder="Masukkan alasan cuti"></textarea>
                </div>

                <div class="full">
                    <label>Status <span class="required">*</span></label>

                    <select id="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

            </div>

            <div class="button-group">

                <button type="submit" class="btn-primary" id="btnSubmit">
                    Simpan Cuti
                </button>

                <button type="button" class="btn-reset" id="btnReset">
                    Reset
                </button>

            </div>

        </form>

    </div>

    <!-- TABLE -->

    <div class="card">

        <h2>Data Pengajuan Cuti</h2>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Karyawan</th>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="dataCuti"></tbody>

            </table>

        </div>

    </div>

</div>

<script>

    const apiUrl = "/api/cutis";

    function getBadge(status){

        if(status === "Disetujui"){
            return `<span class="badge disetujui">Disetujui</span>`;
        }

        if(status === "Ditolak"){
            return `<span class="badge ditolak">Ditolak</span>`;
        }

        return `<span class="badge menunggu">Menunggu</span>`;
    }

    function resetForm(){

        $("#formCuti")[0].reset();

        $("#id_cuti").val("");

        $("#btnSubmit").text("Simpan Cuti");
    }

    function loadCuti(){

        $.ajax({

            url: apiUrl,
            type: "GET",

            success:function(response){

                let rows = "";

                if(!response.data || response.data.length === 0){

                    rows = `
                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada data cuti
                            </td>
                        </tr>
                    `;

                }else{

                    $.each(response.data,function(index,item){

                        rows += `
                            <tr>

                                <td>${index + 1}</td>

                                <td>${item.karyawan_id}</td>

                                <td>${item.jenis_cuti}</td>

                                <td>${item.tanggal_mulai}</td>

                                <td>${item.tanggal_selesai}</td>

                                <td>${item.alasan ?? '-'}</td>

                                <td>${getBadge(item.status)}</td>

                                <td>

                                    <button
                                        class="btn-edit"

                                        data-id="${item.id}"
                                        data-karyawan_id="${item.karyawan_id}"
                                        data-jenis_cuti="${item.jenis_cuti}"
                                        data-tanggal_mulai="${item.tanggal_mulai}"
                                        data-tanggal_selesai="${item.tanggal_selesai}"
                                        data-alasan="${item.alasan ?? ''}"
                                        data-status="${item.status}"
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

                $("#dataCuti").html(rows);
            },

            error:function(){
                alert("Gagal mengambil data cuti");
            }

        });
    }

    loadCuti();

    $("#formCuti").submit(function(e){

        e.preventDefault();

        let id = $("#id_cuti").val();

        let url = apiUrl;
        let method = "POST";

        if(id !== ""){
            url = apiUrl + "/" + id;
            method = "PUT";
        }

        $.ajax({

            url: url,
            type: method,

            data:{

                karyawan_id: $("#karyawan_id").val(),
                jenis_cuti: $("#jenis_cuti").val(),
                tanggal_mulai: $("#tanggal_mulai").val(),
                tanggal_selesai: $("#tanggal_selesai").val(),
                alasan: $("#alasan").val(),
                status: $("#status").val()

            },

            success:function(response){

                alert(response.message);

                resetForm();

                loadCuti();
            },

            error:function(xhr){

                console.log(xhr.responseText);

                alert("Gagal menyimpan data cuti");
            }

        });
    });

    $("#dataCuti").on("click",".btn-edit",function(){

        $("#id_cuti").val($(this).attr("data-id"));

        $("#karyawan_id").val($(this).attr("data-karyawan_id"));

        $("#jenis_cuti").val($(this).attr("data-jenis_cuti"));

        $("#tanggal_mulai").val($(this).attr("data-tanggal_mulai"));

        $("#tanggal_selesai").val($(this).attr("data-tanggal_selesai"));

        $("#alasan").val($(this).attr("data-alasan"));

        $("#status").val($(this).attr("data-status"));

        $("#btnSubmit").text("Update Cuti");

        window.scrollTo({
            top:0,
            behavior:"smooth"
        });

    });

    $("#dataCuti").on("click",".btn-delete",function(){

        let id = $(this).attr("data-id");

        if(confirm("Yakin ingin menghapus data cuti?")){

            $.ajax({

                url: apiUrl + "/" + id,

                type: "DELETE",

                success:function(response){

                    alert(response.message);

                    loadCuti();
                },

                error:function(xhr){

                    console.log(xhr.responseText);

                    alert("Gagal menghapus data cuti");
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