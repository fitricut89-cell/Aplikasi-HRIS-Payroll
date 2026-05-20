<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Karyawan - HRIS Payroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        *{
            box-sizing:border-box;
            font-family:"Segoe UI", sans-serif;
        }

        body{
            margin:0;
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
            url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1400&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
            color:white;
            padding:40px;
            border-radius:25px;
            margin-bottom:25px;
            box-shadow:0 12px 28px rgba(0,0,0,0.15);
        }

        .header h1{
            margin:0 0 10px;
            font-size:38px;
        }

        .header p{
            margin:0;
            color:#f2f2f2;
            font-size:16px;
        }

        .card{
            background:white;
            padding:28px;
            border-radius:22px;
            margin-bottom:25px;
            box-shadow:0 8px 22px rgba(0,0,0,0.08);
        }

        .card h2{
            margin-top:0;
            margin-bottom:22px;
            color:#2f3d2a;
            font-size:28px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:repeat(2, 1fr);
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
            border-radius:12px;
            border:1px solid #d1d5db;
            background:#f9fafb;
            outline:none;
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
            min-height:95px;
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
            min-width:1000px;
        }

        th{
            background:#ecf7df;
            color:#365314;
            padding:15px;
            text-align:left;
            font-size:14px;
        }

        td{
            padding:15px;
            border-bottom:1px solid #e5e7eb;
            font-size:14px;
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

        .aktif{
            background:#dcfce7;
            color:#166534;
        }

        .nonaktif{
            background:#fee2e2;
            color:#991b1b;
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

            .header{
                padding:30px;
            }

            .header h1{
                font-size:30px;
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
        <h1>Modul Karyawan</h1>
        <p>Kelola data karyawan perusahaan dengan sistem HRIS & Payroll</p>
    </div>

    <div class="card">
        <h2>Form Data Karyawan</h2>

        <form id="formKaryawan">
            <input type="hidden" id="id_karyawan">

            <div class="form-grid">
                <div>
                    <label>ID Jabatan <span class="required">*</span></label>
                    <input type="number" id="jabatan_id" min="1" placeholder="Contoh: 1" required>
                </div>

                <div>
                    <label>Nama Karyawan <span class="required">*</span></label>
                    <input type="text" id="nama" placeholder="Nama lengkap" required>
                </div>

                <div>
                    <label>Email <span class="required">*</span></label>
                    <input type="email" id="email" placeholder="email@gmail.com" required>
                </div>

                <div>
                    <label>No HP <span class="required">*</span></label>
                    <input type="text" id="no_hp" placeholder="08xxxxxxxxxx" required>
                </div>

                <div>
                    <label>Tanggal Masuk <span class="required">*</span></label>
                    <input type="date" id="tanggal_masuk" required>
                </div>

                <div>
                    <label>Status Karyawan <span class="required">*</span></label>
                    <select id="status_karyawan" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="full">
                    <label>Alamat <span class="required">*</span></label>
                    <textarea id="alamat" placeholder="Alamat lengkap" required></textarea>
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-primary" id="btnSubmit">
                    Simpan Karyawan
                </button>

                <button type="button" class="btn-reset" id="btnReset">
                    Reset
                </button>
            </div>
        </form>
    </div>

    <div class="card">
        <h2>Data Karyawan</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Jabatan</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="dataKaryawan"></tbody>
            </table>
        </div>
    </div>

</div>

<script>
    const apiUrl = "/api/karyawans";

    $("#jabatan_id").on("input", function() {
        if ($(this).val() < 1) {
            $(this).val(1);
        }
    });

    function resetForm() {
        $("#formKaryawan")[0].reset();
        $("#id_karyawan").val("");
        $("#btnSubmit").text("Simpan Karyawan");
    }

    function badgeStatus(status) {
        if (status === "Aktif") {
            return `<span class="badge aktif">Aktif</span>`;
        }

        return `<span class="badge nonaktif">Nonaktif</span>`;
    }

    function loadKaryawan() {
        $.ajax({
            url: apiUrl,
            type: "GET",

            success: function(response) {
                let rows = "";

                if (!response.data || response.data.length === 0) {
                    rows = `
                        <tr>
                            <td colspan="9" class="empty">
                                Belum ada data karyawan
                            </td>
                        </tr>
                    `;
                } else {
                    $.each(response.data, function(index, item) {
                        rows += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.jabatan_id}</td>
                                <td>${item.nama}</td>
                                <td>${item.email}</td>
                                <td>${item.no_hp}</td>
                                <td>${item.alamat}</td>
                                <td>${item.tanggal_masuk}</td>
                                <td>${badgeStatus(item.status_karyawan)}</td>
                                <td>
                                    <button
                                        class="btn-edit"
                                        data-id="${item.id}"
                                        data-jabatan_id="${item.jabatan_id}"
                                        data-nama="${item.nama}"
                                        data-email="${item.email}"
                                        data-no_hp="${item.no_hp}"
                                        data-alamat="${item.alamat}"
                                        data-tanggal_masuk="${item.tanggal_masuk}"
                                        data-status_karyawan="${item.status_karyawan}"
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

                $("#dataKaryawan").html(rows);
            },

            error: function() {
                alert("Gagal mengambil data karyawan");
            }
        });
    }

    loadKaryawan();

    $("#formKaryawan").submit(function(e) {
        e.preventDefault();

        let jabatanId = Number($("#jabatan_id").val());

        if (jabatanId < 1) {
            alert("ID Jabatan harus dimulai dari angka 1");
            $("#jabatan_id").val(1);
            return;
        }

        let id = $("#id_karyawan").val();
        let method = id ? "PUT" : "POST";
        let url = id ? apiUrl + "/" + id : apiUrl;

        $.ajax({
            url: url,
            type: method,

            data: {
                jabatan_id: jabatanId,
                nama: $("#nama").val(),
                email: $("#email").val(),
                no_hp: $("#no_hp").val(),
                alamat: $("#alamat").val(),
                tanggal_masuk: $("#tanggal_masuk").val(),
                status_karyawan: $("#status_karyawan").val()
            },

            success: function(response) {
                alert(response.message);
                resetForm();
                loadKaryawan();
            },

            error: function() {
                alert("Gagal menyimpan data karyawan");
            }
        });
    });

    $("#dataKaryawan").on("click", ".btn-edit", function() {
        $("#id_karyawan").val($(this).data("id"));
        $("#jabatan_id").val($(this).data("jabatan_id"));
        $("#nama").val($(this).data("nama"));
        $("#email").val($(this).data("email"));
        $("#no_hp").val($(this).data("no_hp"));
        $("#alamat").val($(this).data("alamat"));
        $("#tanggal_masuk").val($(this).data("tanggal_masuk"));
        $("#status_karyawan").val($(this).data("status_karyawan"));

        $("#btnSubmit").text("Update Karyawan");

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    $("#dataKaryawan").on("click", ".btn-delete", function() {
        let id = $(this).data("id");

        if (confirm("Yakin ingin menghapus data karyawan ini?")) {
            $.ajax({
                url: apiUrl + "/" + id,
                type: "DELETE",

                success: function(response) {
                    alert(response.message);
                    loadKaryawan();
                },

                error: function() {
                    alert("Gagal menghapus data karyawan");
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