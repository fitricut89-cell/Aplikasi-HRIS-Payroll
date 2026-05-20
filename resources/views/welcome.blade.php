<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>HRIS Payroll - Modul Kehadiran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #fff7ed, #fef2f2);
            color: #1f2937;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, #dc2626, #f59e0b);
            padding: 30px;
            border-radius: 20px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 12px 30px rgba(220, 38, 38, 0.3);
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
        }

        .header p {
            margin-top: 8px;
            opacity: 0.95;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 25px;
            border-top: 6px solid #dc2626;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #991b1b;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .full {
            grid-column: span 2;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #7f1d1d;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #dc2626;
            background: white;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.15);
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        button {
            border: none;
            padding: 12px 18px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
        }

        button:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: #dc2626;
            color: white;
        }

        .btn-primary:hover {
            background: #b91c1c;
        }

        .btn-reset {
            background: #f59e0b;
            color: white;
        }

        .btn-reset:hover {
            background: #d97706;
        }

        .btn-edit {
            background: #facc15;
            color: #111827;
            padding: 8px 12px;
            margin-right: 6px;
        }

        .btn-edit:hover {
            background: #eab308;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
            padding: 8px 12px;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th {
            background: #fef3c7;
            color: #991b1b;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #fff7ed;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-hadir {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-izin {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-sakit {
            background: #fde68a;
            color: #78350f;
        }

        .badge-alpa {
            background: #fecaca;
            color: #7f1d1d;
        }

        .badge-terlambat {
            background: #fcd34d;
            color: #78350f;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        @media(max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: span 1;
            }

            .button-group {
                flex-direction: column;
            }

            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Modul Kehadiran Karyawan</h1>
        <p>Aplikasi HRIS & Payroll</p>
    </div>

    <div class="card">
        <h2>Form Kehadiran</h2>

        <form id="formKehadiran">

            <input type="hidden" id="id_kehadiran">

            <div class="form-grid">

                <div>
                    <label>ID Karyawan</label>
                    <input type="number" id="karyawan_id" required>
                </div>

                <div>
                    <label>Tanggal</label>
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
                    <label>Status Kehadiran</label>

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
                    <textarea id="keterangan"></textarea>
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

                if(response.data.length === 0) {

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