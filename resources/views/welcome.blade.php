<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HRIS & Payroll</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
        }

        body{
            background:#f5f1ec;
            min-height:100vh;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:auto;
        }

        /* HEADER */
        .hero{
            margin-top:40px;
            background:linear-gradient(135deg,#ef2323,#ff9900);
            border-radius:25px;
            padding:50px;
            color:white;
            box-shadow:0 12px 30px rgba(239,35,35,0.25);
        }

        .hero h1{
            font-size:48px;
            margin-bottom:15px;
            font-weight:700;
        }

        .hero p{
            font-size:18px;
            opacity:0.95;
            margin-bottom:30px;
        }

        .hero-buttons{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn{
            padding:14px 28px;
            border:none;
            border-radius:12px;
            text-decoration:none;
            font-weight:600;
            transition:0.3s;
            display:inline-block;
        }

        .btn-primary{
            background:white;
            color:#dc2626;
        }

        .btn-primary:hover{
            background:#fef2f2;
            transform:translateY(-2px);
        }

        .btn-secondary{
            background:rgba(255,255,255,0.2);
            color:white;
            border:1px solid rgba(255,255,255,0.4);
        }

        .btn-secondary:hover{
            background:rgba(255,255,255,0.3);
            transform:translateY(-2px);
        }

        /* MENU */
        .menu-section{
            margin-top:35px;
            margin-bottom:50px;
        }

        .menu-title{
            font-size:30px;
            color:#991b1b;
            margin-bottom:25px;
            font-weight:700;
        }

        .menu-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
            gap:22px;
        }

        .menu-card{
            background:white;
            border-radius:20px;
            padding:30px 25px;
            text-align:center;
            text-decoration:none;
            color:#1f2937;
            transition:0.3s;
            border-top:6px solid #ef4444;
            box-shadow:0 8px 20px rgba(0,0,0,0.07);
        }

        .menu-card:hover{
            transform:translateY(-5px);
            box-shadow:0 12px 28px rgba(0,0,0,0.12);
        }

        .menu-icon{
            width:75px;
            height:75px;
            margin:auto;
            margin-bottom:20px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:35px;
            background:linear-gradient(135deg,#ef4444,#f59e0b);
            color:white;
        }

        .menu-card h3{
            margin-bottom:10px;
            color:#991b1b;
            font-size:22px;
        }

        .menu-card p{
            font-size:14px;
            color:#6b7280;
            line-height:1.6;
        }

        /* FOOTER */
        .footer{
            text-align:center;
            padding:25px;
            color:#6b7280;
            font-size:14px;
        }

        @media(max-width:768px){

            .hero{
                padding:35px 25px;
            }

            .hero h1{
                font-size:34px;
            }

            .hero p{
                font-size:16px;
            }

            .menu-title{
                font-size:25px;
            }

        }

    </style>
</head>
<body>

    <div class="container">

        <!-- HERO -->
        <div class="hero">

            <h1>HRIS & Payroll System</h1>

            <p>
                Sistem Informasi Human Resource dan Payroll untuk mengelola
                data karyawan, kehadiran, gaji, jabatan, dan cuti karyawan.
            </p>

            <div class="hero-buttons">

                <a href="/kehadiran" class="btn btn-primary">
                    Masuk Modul Kehadiran
                </a>

                <a href="#menu" class="btn btn-secondary">
                    Lihat Semua Modul
                </a>

            </div>

        </div>

        <!-- MENU -->
        <div class="menu-section" id="menu">

            <h2 class="menu-title">
                Modul HRIS & Payroll
            </h2>

            <div class="menu-grid">

                <!-- Karyawan -->
                <a href="/karyawan" class="menu-card">

                    <div class="menu-icon">
                        👨‍💼
                    </div>

                    <h3>Data Karyawan</h3>

                    <p>
                        Mengelola data seluruh karyawan perusahaan.
                    </p>

                </a>

                <!-- Jabatan -->
                <a href="/jabatan" class="menu-card">

                    <div class="menu-icon">
                        🏢
                    </div>

                    <h3>Jabatan</h3>

                    <p>
                        Mengatur jabatan dan posisi setiap karyawan.
                    </p>

                </a>

                <!-- Kehadiran -->
                <a href="/kehadiran" class="menu-card">

                    <div class="menu-icon">
                        📅
                    </div>

                    <h3>Kehadiran</h3>

                    <p>
                        Mencatat absensi dan kehadiran karyawan setiap hari.
                    </p>

                </a>

                <!-- Gaji -->
                <a href="/gaji" class="menu-card">

                    <div class="menu-icon">
                        💰
                    </div>

                    <h3>Payroll Gaji</h3>

                    <p>
                        Mengelola penggajian, tunjangan, dan potongan gaji.
                    </p>

                </a>

                <!-- Cuti -->
                <a href="/cuti" class="menu-card">

                    <div class="menu-icon">
                        🏖️
                    </div>

                    <h3>Cuti Karyawan</h3>

                    <p>
                        Pengajuan dan pengelolaan cuti karyawan perusahaan.
                    </p>

                </a>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="footer">
            © 2026 HRIS & Payroll System 
        </div>

    </div>

</body>
</html>