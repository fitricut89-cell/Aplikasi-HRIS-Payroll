<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Karyawan - HRIS Payroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            margin: 0;
            background: #f5f1ec;
            color: #1f2937;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            background: linear-gradient(135deg, #dc2626, #f59e0b);
            color: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(220, 38, 38, 0.25);
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 32px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            margin-bottom: 25px;
            border-top: 6px solid #dc2626;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        .card h2 {
            margin-top: 0;
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

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            outline: none;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #dc2626;
            background: white;
            box-shadow: 0 0 0 4px rgba(220,38,38,0.15);
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .button-group {
            margin-top: 20px;
            display: flex;
            gap: 12px;
        }

        button {
            border: none;
            padding: 11px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-primary {
            background: #dc2626;
            color: white;
        }

        .btn-reset {
            background: #f59e0b;
            color: white;
        }

        .btn-edit {
            background: #facc15;
            color: #111827;
            padding: 8px 12px;
            margin-right: 6px;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
            padding: 8px 12px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
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

        .aktif {
            background: #fee2e2;
            color: #991b1b;
        }

        .nonaktif {
            background: #fef3c7;
            color: #92400e;
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
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Modul Karyawan</h1>
        <p>Aplikasi HRIS & Payroll</p>
    </div>

    <div class="card">
        <h2>Form Data Karyawan</h2>

        <form id="formKaryawan">
            <input type="hidden" id="id_karyawan">

            <div class="form-grid">
                <div>
                    <label>ID Jabatan</label>
                    <input type="number" id="jabatan_id" placeholder="Contoh: 1" required>
                </div>

                <div>
                    <label>Nama Karyawan</label>
                    <input type="text" id="nama" placeholder="Nama lengkap" required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" id="email" placeholder="email@gmail.com" required>
                </div>

                <div>
                    <label>No HP</label>
                    <input type="text" id="no_hp" placeholder="08xxxxxxxxxx" required>
                </div>

                <div>
                    <label>Tanggal Masuk</label>
                    <input type="date" id="tanggal_masuk" required>
                </div>

                <div>
                    <label>Status Karyawan</label>
                    <select id="status_karyawan" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="full">
                    <label>Alamat</label>
                    <textarea id="alamat" placeholder="Alamat lengkap" required></textarea>
                </div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn-primary" id="btnSubmit">Simpan Karyawan</button>
                <button type="button" class="btn-reset" id="btnReset">Reset</button>
            </div>
        </form>
    </div>

    <div class="card">
        <h2>Data Karyawan</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
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
                                <td>${item.id}</td>
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

        let id = $("#id_karyawan").val();
        let method = id ? "PUT" : "POST";
        let url = id ? apiUrl + "/" + id : apiUrl;

        $.ajax({
            url: url,
            type: method,
            data: {
                jabatan_id: $("#jabatan_id").val(),
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