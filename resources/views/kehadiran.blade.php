<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Kehadiran - HRIS Payroll</title>
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
                url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1400&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
            padding:40px;
            border-radius:25px;
            color:white;
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
            min-width:900px;
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

        .badge-hadir{
            background:#dcfce7;
            color:#166534;
        }

        .badge-izin{
            background:#fef3c7;
            color:#92400e;
        }

        .badge-sakit{
            background:#e0f2fe;
            color:#075985;
        }

        .badge-alpa{
            background:#fee2e2;
            color:#991b1b;
        }

        .badge-terlambat{
            background:#ffedd5;
            color:#9a3412;
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
        <h1>Modul Kehadiran Karyawan</h1>
        <p>Kelola data absensi dan kehadiran karyawan perusahaan</p>
    </div>

    <div class="card">
        <h2>Form Kehadiran</h2>

        <form id="formKehadiran">
            <input type="hidden" id="id_kehadiran">

            <div class="form-grid">
                <div>
                    <label>ID Karyawan <span class="required">*</span></label>
                    <input type="number" id="karyawan_id" required>
                </div>

                <div>
                    <label>Tanggal <span class="required">*</span></label>
                    <input type="date" id="tanggal" required>
                </div>

                <div>
                    <label>Jam Masuk</label>
                    <input type="time" id="jam_masuk">
                </div>

                <div>
                    <label>Jam Keluar</label>
                    <input type="time" id="jam_keluar">
                </div>

                <div class="full">
                    <label>Status Kehadiran <span class="required">*</span></label>
                    <select id="status_kehadiran" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Alpa">Alpa</option>
                        <option value="Terlambat">Terlambat</option>
                    </select>
                </div>

                <div class="full">
                    <label>Keterangan</label>
                    <textarea id="keterangan" placeholder="Masukkan keterangan tambahan"></textarea>
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-primary" id="btnSubmit">
                    Simpan Kehadiran
                </button>

                <button type="button" class="btn-reset" id="btnReset">
                    Reset Form
                </button>
            </div>
        </form>
    </div>

    <div class="card">
        <h2>Data Kehadiran</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="dataKehadiran"></tbody>
            </table>
        </div>
    </div>

</div>

<script>
    const apiUrl = "/api/kehadirans";

    function getBadge(status) {
        let className = "badge";

        if(status === "Hadir") {
            className += " badge-hadir";
        } else if(status === "Izin") {
            className += " badge-izin";
        } else if(status === "Sakit") {
            className += " badge-sakit";
        } else if(status === "Alpa") {
            className += " badge-alpa";
        } else if(status === "Terlambat") {
            className += " badge-terlambat";
        }

        return `<span class="${className}">${status}</span>`;
    }

    function resetForm() {
        $("#formKehadiran")[0].reset();
        $("#id_kehadiran").val("");
        $("#btnSubmit").text("Simpan Kehadiran");
    }

    function loadKehadiran() {
        $.ajax({
            url: apiUrl,
            type: "GET",
            success: function(response) {
                let rows = "";

                if(!response.data || response.data.length === 0) {
                    rows = `
                        <tr>
                            <td colspan="8" class="empty">
                                Belum ada data kehadiran
                            </td>
                        </tr>
                    `;
                } else {
                    $.each(response.data, function(index, item) {
                        rows += `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.karyawan_id}</td>
                                <td>${item.tanggal}</td>
                                <td>${item.jam_masuk ?? '-'}</td>
                                <td>${item.jam_keluar ?? '-'}</td>
                                <td>${getBadge(item.status_kehadiran)}</td>
                                <td>${item.keterangan ?? '-'}</td>
                                <td>
                                    <button
                                        class="btn-edit"
                                        data-id="${item.id}"
                                        data-karyawan_id="${item.karyawan_id}"
                                        data-tanggal="${item.tanggal}"
                                        data-jam_masuk="${item.jam_masuk ?? ''}"
                                        data-jam_keluar="${item.jam_keluar ?? ''}"
                                        data-status_kehadiran="${item.status_kehadiran}"
                                        data-keterangan="${item.keterangan ?? ''}"
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

                $("#dataKehadiran").html(rows);
            },
            error: function() {
                alert("Gagal mengambil data");
            }
        });
    }

    loadKehadiran();

    $("#formKehadiran").submit(function(e) {
        e.preventDefault();

        let id = $("#id_kehadiran").val();
        let method = id ? "PUT" : "POST";
        let url = id ? apiUrl + "/" + id : apiUrl;

        $.ajax({
            url: url,
            type: method,
            data: {
                karyawan_id: $("#karyawan_id").val(),
                tanggal: $("#tanggal").val(),
                jam_masuk: $("#jam_masuk").val(),
                jam_keluar: $("#jam_keluar").val(),
                status_kehadiran: $("#status_kehadiran").val(),
                keterangan: $("#keterangan").val()
            },
            success: function(response) {
                alert(response.message);
                resetForm();
                loadKehadiran();
            },
            error: function() {
                alert("Gagal menyimpan data");
            }
        });
    });

    $("#dataKehadiran").on("click", ".btn-edit", function() {
        $("#id_kehadiran").val($(this).data("id"));
        $("#karyawan_id").val($(this).data("karyawan_id"));
        $("#tanggal").val($(this).data("tanggal"));
        $("#jam_masuk").val($(this).data("jam_masuk"));
        $("#jam_keluar").val($(this).data("jam_keluar"));
        $("#status_kehadiran").val($(this).data("status_kehadiran"));
        $("#keterangan").val($(this).data("keterangan"));

        $("#btnSubmit").text("Update Kehadiran");

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    $("#dataKehadiran").on("click", ".btn-delete", function() {
        let id = $(this).data("id");

        if(confirm("Yakin ingin menghapus data ini?")) {
            $.ajax({
                url: apiUrl + "/" + id,
                type: "DELETE",
                success: function(response) {
                    alert(response.message);
                    loadKehadiran();
                },
                error: function() {
                    alert("Gagal menghapus data");
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