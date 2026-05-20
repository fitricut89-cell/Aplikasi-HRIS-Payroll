<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Gaji</title>

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

        input{
            width:100%;
            padding:12px;
            border:1px solid #d1d5db;
            border-radius:10px;
            outline:none;
            background:#f9fafb;
        }

        input:focus{
            border-color:#dc2626;
            background:white;
            box-shadow:0 0 0 4px rgba(220,38,38,0.15);
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

        table{
            width:100%;
            border-collapse:collapse;
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

        @media(max-width:768px){

            .form-grid{
                grid-template-columns:1fr;
            }

            .full{
                grid-column:span 1;
            }

        }

    </style>

</head>
<body>

<div class="container">

    <div class="header">
        <h1>Modul Payroll Gaji</h1>
        <p>Aplikasi HRIS & Payroll</p>
    </div>

    <div class="card">

        <h2>Form Data Gaji</h2>

        <form id="formGaji">

            <input type="hidden" id="id_gaji">

            <div class="form-grid">

                <div>
                    <label>ID Karyawan</label>
                    <input type="number" id="karyawan_id" required>
                </div>

                <div>
                    <label>Bulan</label>
                    <input type="text" id="bulan" required>
                </div>

                <div>
                    <label>Tahun</label>
                    <input type="number" id="tahun" required>
                </div>

                <div>
                    <label>Gaji Pokok</label>
                    <input type="number" id="gaji_pokok" required>
                </div>

                <div>
                    <label>Tunjangan</label>
                    <input type="number" id="tunjangan" required>
                </div>

                <div>
                    <label>Potongan</label>
                    <input type="number" id="potongan" required>
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

    <div class="card">

        <h2>Data Gaji Karyawan</h2>

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

<script>

    const apiUrl = "/api/gajis";

    function rupiah(angka){
        return "Rp " + Number(angka).toLocaleString("id-ID");
    }

    function resetForm(){
        $("#formGaji")[0].reset();
        $("#id_gaji").val("");
        $("#btnSubmit").text("Simpan Gaji");
    }

    function loadGaji(){

        $.ajax({

            url: apiUrl,
            type: "GET",

            success:function(response){

                let rows = "";

                $.each(response.data,function(index,item){

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

                $("#dataGaji").html(rows);
            }

        });

    }

    loadGaji();

    $("#formGaji").submit(function(e){

        e.preventDefault();

        let id = $("#id_gaji").val();

        let method = id ? "PUT" : "POST";

        let url = id ? apiUrl + "/" + id : apiUrl;

        $.ajax({

            url: url,

            type: method,

            data:{

                karyawan_id: $("#karyawan_id").val(),

                bulan: $("#bulan").val(),

                tahun: $("#tahun").val(),

                gaji_pokok: $("#gaji_pokok").val(),

                tunjangan: $("#tunjangan").val(),

                potongan: $("#potongan").val()

            },

            success:function(response){

                alert(response.message);

                resetForm();

                loadGaji();
            }

        });

    });

    $("#dataGaji").on("click",".btn-edit",function(){

        $("#id_gaji").val($(this).data("id"));

        $("#karyawan_id").val($(this).data("karyawan_id"));

        $("#bulan").val($(this).data("bulan"));

        $("#tahun").val($(this).data("tahun"));

        $("#gaji_pokok").val($(this).data("gaji_pokok"));

        $("#tunjangan").val($(this).data("tunjangan"));

        $("#potongan").val($(this).data("potongan"));

        $("#btnSubmit").text("Update Gaji");

        window.scrollTo({
            top:0,
            behavior:"smooth"
        });

    });

    $("#dataGaji").on("click",".btn-delete",function(){

        let id = $(this).data("id");

        if(confirm("Yakin ingin menghapus data gaji?")){

            $.ajax({

                url: apiUrl + "/" + id,

                type: "DELETE",

                success:function(response){

                    alert(response.message);

                    loadGaji();
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