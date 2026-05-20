<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Gaji - HRIS Payroll</title>
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
                url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1400&auto=format&fit=crop');

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

        input{
            width:100%;
            padding:13px 15px;
            border:1px solid #d1d5db;
            border-radius:12px;
            outline:none;
            background:#f9fafb;
            transition:0.3s;
        }

        input:focus{
            border-color:#4f8b3d;
            background:white;
            box-shadow:0 0 0 4px rgba(79,139,61,0.15);
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

        .nominal{
            font-weight:bold;
            color:#166534;
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
        <h1>Modul Payroll Gaji</h1>
        <p>Kelola data penggajian karyawan perusahaan</p>
    </div>

    <!-- FORM -->

    <div class="card">

        <h2>Form Data Gaji</h2>

        <form id="formGaji">

            <input type="hidden" id="id_gaji">

            <div class="form-grid">

                <div>
                    <label>ID Karyawan <span class="required">*</span></label>
                    <input type="number" id="karyawan_id" placeholder="Contoh: 1" required>
                </div>

                <div>
                    <label>Bulan <span class="required">*</span></label>
                    <input type="text" id="bulan" placeholder="Contoh: Mei" required>
                </div>

                <div>
                    <label>Tahun <span class="required">*</span></label>
                    <input type="number" id="tahun" placeholder="Contoh: 2026" required>
                </div>

                <div>
                    <label>Gaji Pokok <span class="required">*</span></label>
                    <input type="number" id="gaji_pokok" placeholder="Contoh: 3000000" required>
                </div>

                <div>
                    <label>Tunjangan <span class="required">*</span></label>
                    <input type="number" id="tunjangan" placeholder="Contoh: 500000" required>
                </div>

                <div>
                    <label>Potongan <span class="required">*</span></label>
                    <input type="number" id="potongan" placeholder="Contoh: 100000" required>
                </div>

            </div>

            <div class="button-group">

                <button type="submit" class="btn-primary" id="btnSubmit">
                    Simpan Gaji
                </button>

                <button type="button" class="btn-reset" id="btnReset">
                    Reset
                </button>

            </div>

        </form>

    </div>

    <!-- TABLE -->

    <div class="card">

        <h2>Data Gaji Karyawan</h2>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Karyawan</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Potongan</th>
                        <th>Total Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="dataGaji"></tbody>

            </table>

        </div>

    </div>

</div>

<script>

    const apiUrl = "/api/gajis";

    function rupiah(angka) {
        return "Rp " + Number(angka).toLocaleString("id-ID");
    }

    function resetForm() {
        $("#formGaji")[0].reset();
        $("#id_gaji").val("");
        $("#btnSubmit").text("Simpan Gaji");
    }

    function loadGaji() {

        $.ajax({

            url: apiUrl,
            type: "GET",

            success:function(response) {

                let rows = "";

                if (!response.data || response.data.length === 0) {

                    rows = `
                        <tr>
                            <td colspan="9" class="empty">
                                Belum ada data gaji
                            </td>
                        </tr>
                    `;

                } else {

                    $.each(response.data,function(index,item) {

                        rows += `
                            <tr>

                                <td>${item.id}</td>

                                <td>${item.karyawan_id}</td>

                                <td>${item.bulan}</td>

                                <td>${item.tahun}</td>

                                <td>${rupiah(item.gaji_pokok)}</td>

                                <td>${rupiah(item.tunjangan)}</td>

                                <td>${rupiah(item.potongan)}</td>

                                <td class="nominal">
                                    ${rupiah(item.total_gaji)}
                                </td>

                                <td>

                                    <button
                                        class="btn-edit"
                                        data-id="${item.id}"
                                        data-karyawan_id="${item.karyawan_id}"
                                        data-bulan="${item.bulan}"
                                        data-tahun="${item.tahun}"
                                        data-gaji_pokok="${item.gaji_pokok}"
                                        data-tunjangan="${item.tunjangan}"
                                        data-potongan="${item.potongan}"
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

                $("#dataGaji").html(rows);
            },

            error:function() {
                alert("Gagal mengambil data gaji");
            }

        });
    }

    loadGaji();

    $("#formGaji").submit(function(e) {

        e.preventDefault();

        let id = $("#id_gaji").val();

        let url = apiUrl;
        let method = "POST";

        if (id !== "") {
            url = apiUrl + "/" + id;
            method = "PUT";
        }

        $.ajax({

            url: url,
            type: method,

            data: {

                karyawan_id: $("#karyawan_id").val(),
                bulan: $("#bulan").val(),
                tahun: $("#tahun").val(),
                gaji_pokok: $("#gaji_pokok").val(),
                tunjangan: $("#tunjangan").val(),
                potongan: $("#potongan").val()

            },

            success:function(response) {

                alert(response.message);

                resetForm();

                loadGaji();
            },

            error:function(xhr) {

                console.log(xhr.responseText);

                alert("Gagal menyimpan data gaji");
            }

        });
    });

    $("#dataGaji").on("click",".btn-edit",function() {

        $("#id_gaji").val($(this).attr("data-id"));

        $("#karyawan_id").val($(this).attr("data-karyawan_id"));

        $("#bulan").val($(this).attr("data-bulan"));

        $("#tahun").val($(this).attr("data-tahun"));

        $("#gaji_pokok").val($(this).attr("data-gaji_pokok"));

        $("#tunjangan").val($(this).attr("data-tunjangan"));

        $("#potongan").val($(this).attr("data-potongan"));

        $("#btnSubmit").text("Update Gaji");

        window.scrollTo({
            top:0,
            behavior:"smooth"
        });

    });

    $("#dataGaji").on("click",".btn-delete",function() {

        let id = $(this).attr("data-id");

        if(confirm("Yakin ingin menghapus data gaji?")) {

            $.ajax({

                url: apiUrl + "/" + id,

                type: "DELETE",

                success:function(response) {

                    alert(response.message);

                    loadGaji();
                },

                error:function(xhr) {

                    console.log(xhr.responseText);

                    alert("Gagal menghapus data gaji");
                }

            });
        }
    });

    $("#btnReset").click(function() {
        resetForm();
    });

</script>

</body>
</html>