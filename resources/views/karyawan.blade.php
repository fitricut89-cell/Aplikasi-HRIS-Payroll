<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>HRIS Payroll - Modul Karyawan</title>
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

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Modul Data Karyawan</h1>
        <p>Aplikasi HRIS & Payroll</p>
    </div>

    <div class="card">

        <h2>Form Karyawan</h2>

        <form id="formKaryawan">

            <input type="hidden" id="id_karyawan">

            <div class="form-grid">

                <div>
                    <label>Nama Karyawan</label>
                    <input type="text" id="nama" required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" id="email" required>
                </div>

                <div>
                    <label>Jabatan</label>
                    <input type="text" id="jabatan" required>
                </div>

                <div>
                    <label>No HP</label>
                    <input type="text" id="no_hp">
                </div>

                <div class="full">
                    <label>Alamat</label>
                    <textarea id="alamat"></textarea>
                </div>

            </div>

            <div class="button-group">

                <button type="submit" class="btn-primary" id="btnSubmit">
                    Simpan Karyawan
                </button>

                <button type="button" class="btn-reset" id="btnReset">
                    Reset Form
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
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="dataKaryawan"></tbody>

            </table>

        </div>

    </div>

</div>

<script>

const apiUrl = "/api/karyawan";

function resetForm() {

    $("#formKaryawan")[0].reset();

    $("#id_karyawan").val("");

    $("#btnSubmit").text("Simpan Karyawan");
}

function loadKaryawan() {

    $.ajax({

        url: apiUrl,
        type: "GET",

        success: function(response) {

            let rows = "";

            if(response.length === 0) {

                rows = `
                    <tr>
                        <td colspan="7" class="empty">
                            Belum ada data karyawan
                        </td>
                    </tr>
                `;

            } else {

                $.each(response, function(index, item) {

                    rows += `
                        <tr>

                            <td>${item.id}</td>

                            <td>${item.nama}</td>

                            <td>${item.email}</td>

                            <td>${item.jabatan}</td>

                            <td>${item.no_hp ?? '-'}</td>

                            <td>${item.alamat ?? '-'}</td>

                            <td>

                                <button
                                    class="btn-edit"
                                    data-id="${item.id}"
                                    data-nama="${item.nama}"
                                    data-email="${item.email}"
                                    data-jabatan="${item.jabatan}"
                                    data-no_hp="${item.no_hp ?? ''}"
                                    data-alamat="${item.alamat ?? ''}"
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
        }
    });
}

loadKaryawan();

$("#formKaryawan").submit(function(e){

    e.preventDefault();

    let id = $("#id_karyawan").val();

    let method = id ? "PUT" : "POST";

    let url = id ? apiUrl + "/" + id : apiUrl;

    $.ajax({

        url: url,

        type: method,

        data: {

            nama: $("#nama").val(),
            email: $("#email").val(),
            jabatan: $("#jabatan").val(),
            no_hp: $("#no_hp").val(),
            alamat: $("#alamat").val()

        },

        success: function(response){

            alert("Data berhasil disimpan");

            resetForm();

            loadKaryawan();
        },

        error: function(){
            alert("Gagal menyimpan data");
        }

    });

});

$("#dataKaryawan").on("click", ".btn-edit", function(){

    $("#id_karyawan").val($(this).data("id"));

    $("#nama").val($(this).data("nama"));

    $("#email").val($(this).data("email"));

    $("#jabatan").val($(this).data("jabatan"));

    $("#no_hp").val($(this).data("no_hp"));

    $("#alamat").val($(this).data("alamat"));

    $("#btnSubmit").text("Update Karyawan");

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

});

$("#dataKaryawan").on("click", ".btn-delete", function(){

    let id = $(this).data("id");

    if(confirm("Yakin ingin menghapus data ini?")) {

        $.ajax({

            url: apiUrl + "/" + id,

            type: "DELETE",

            success: function(response){

                alert("Data berhasil dihapus");

                loadKaryawan();
            },

            error: function(){
                alert("Gagal menghapus data");
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