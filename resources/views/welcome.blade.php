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
            background:#6f8764;
            min-height:100vh;
            padding:35px 0;
        }

        .container{
            width:90%;
            max-width:1250px;
            margin:auto;
            background:#f8fbf1;
            border-radius:30px;
            overflow:hidden;
            box-shadow:0 20px 50px rgba(0,0,0,0.2);
        }

        .navbar{
            height:85px;
            background:white;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 45px;
            border-radius:0 0 25px 25px;
        }

        .logo{
            font-size:32px;
            font-weight:800;
            color:#3d6b2f;
        }

        .nav-menu{
            display:flex;
            gap:28px;
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

        .hero{
            min-height:560px;
            padding:75px 70px;
            color:white;
            background:
            linear-gradient(rgba(18,48,25,0.45), rgba(18,48,25,0.65)),
            url('https://images.unsplash.com/photo-1497366811353-6870744d04b2?q=80&w=1600&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
        }

        .hero-badge{
            display:inline-block;
            background:#4f8b3d;
            padding:11px 22px;
            border-radius:25px;
            margin-bottom:25px;
            font-size:14px;
            font-weight:600;
        }

        .hero h1{
            max-width:600px;
            font-size:62px;
            line-height:1.1;
            margin-bottom:22px;
            font-weight:800;
        }

        .hero p{
            max-width:520px;
            font-size:18px;
            line-height:1.7;
            margin-bottom:35px;
            color:#f2f2f2;
        }

        .hero-buttons{
            display:flex;
            gap:18px;
            flex-wrap:wrap;
        }

        .btn{
            padding:15px 32px;
            border-radius:35px;
            text-decoration:none;
            font-weight:700;
            transition:0.3s;
            display:inline-block;
        }

        .btn-primary{
            background:#4f8b3d;
            color:white;
        }

        .btn-secondary{
            background:white;
            color:#4f8b3d;
        }

        .btn:hover{
            transform:translateY(-3px);
        }

        .welcome-section{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:45px;
            padding:70px;
            align-items:center;
            background:#f8fbf1;
        }

        .welcome-image{
            background:white;
            padding:15px;
            border-radius:25px;
            box-shadow:0 12px 28px rgba(0,0,0,0.1);
        }

        .welcome-image img{
            width:100%;
            height:330px;
            object-fit:cover;
            border-radius:18px;
            display:block;
        }

        .welcome-text h2{
            font-size:42px;
            color:#2f3d2a;
            margin-bottom:18px;
        }

        .welcome-text p{
            color:#6b7280;
            line-height:1.9;
            margin-bottom:28px;
            font-size:16px;
        }

        .menu-section{
            background:#eef7df;
            padding:65px 55px 75px;
        }

        .menu-title{
            text-align:center;
            font-size:38px;
            color:#3d6b2f;
            margin-bottom:45px;
            font-weight:800;
        }

        .menu-grid{
            display:grid;
            grid-template-columns:repeat(5, 1fr);
            gap:24px;
            align-items:stretch;
        }

        .menu-card{
            background:white;
            border-radius:22px;
            overflow:hidden;
            text-decoration:none;
            color:#1f2937;
            transition:0.3s;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
            min-height:310px;
            display:flex;
            flex-direction:column;
        }

        .menu-card:hover{
            transform:translateY(-7px);
            box-shadow:0 16px 35px rgba(0,0,0,0.12);
        }

        .menu-image{
            height:135px;
            overflow:hidden;
            flex-shrink:0;
        }

        .menu-image img{
            width:100%;
            height:100%;
            object-fit:cover;
            display:block;
        }

        .menu-content{
            padding:22px;
            display:flex;
            flex-direction:column;
            flex:1;
        }

        .menu-content h3{
            font-size:20px;
            margin-bottom:10px;
            color:#2f3d2a;
        }

        .menu-content p{
            font-size:13px;
            line-height:1.6;
            color:#6b7280;
            margin-bottom:18px;
            flex:1;
        }

        .menu-content span{
            display:inline-block;
            background:#4f8b3d;
            color:white;
            padding:10px 18px;
            border-radius:22px;
            font-size:12px;
            font-weight:700;
            width:max-content;
        }

        .footer{
            text-align:center;
            padding:28px;
            color:#6b7280;
            background:#f8fbf1;
            font-size:14px;
        }

        @media(max-width:1100px){
            .menu-grid{
                grid-template-columns:repeat(3, 1fr);
            }
        }

        @media(max-width:900px){
            .navbar{
                flex-direction:column;
                height:auto;
                gap:20px;
                padding:25px;
            }

            .nav-menu{
                flex-wrap:wrap;
                justify-content:center;
                gap:15px;
            }

            .hero{
                padding:55px 35px;
            }

            .hero h1{
                font-size:42px;
            }

            .welcome-section{
                grid-template-columns:1fr;
                padding:50px 30px;
            }

            .menu-section{
                padding:50px 30px;
            }
        }

        @media(max-width:768px){
            .menu-grid{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <nav class="navbar">
        <div class="logo">HRIS Payroll</div>

        <div class="nav-menu">
            <a href="/">Home</a>
            <a href="/karyawan">Karyawan</a>
            <a href="/jabatan">Jabatan</a>
            <a href="/kehadiran">Kehadiran</a>
            <a href="/gaji">Gaji</a>
            <a href="/cuti">Cuti</a>
            <a href="#menu" class="btn-nav">Semua Modul</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-badge">Sistem Informasi HRIS & Payroll</div>

        <h1>Kelola Perusahaan Lebih Terstruktur</h1>

        <p>
            Aplikasi HRIS & Payroll membantu perusahaan mengelola data karyawan,
            jabatan, kehadiran, gaji, dan cuti dalam satu sistem digital.
        </p>

        <div class="hero-buttons">
            <a href="/karyawan" class="btn btn-primary">Mulai Kelola</a>
            <a href="#menu" class="btn btn-secondary">Lihat Modul</a>
        </div>
    </section>

    <section class="welcome-section">
        <div class="welcome-image">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1200&auto=format&fit=crop" alt="Kantor Perusahaan">
        </div>

        <div class="welcome-text">
            <h2>Dashboard HRIS & Payroll</h2>

            <p>
                Sistem ini dirancang untuk mendukung aktivitas administrasi perusahaan,
                mulai dari pengelolaan data pegawai, jabatan, absensi, payroll,
                hingga pengajuan cuti secara lebih rapi dan efisien.
            </p>

            <a href="/kehadiran" class="btn btn-primary">Masuk Modul Kehadiran</a>
        </div>
    </section>

    <section class="menu-section" id="menu">
        <h2 class="menu-title">Modul HRIS & Payroll</h2>

        <div class="menu-grid">

            <a href="/karyawan" class="menu-card">
                <div class="menu-image">
                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=900&auto=format&fit=crop" alt="Data Karyawan">
                </div>
                <div class="menu-content">
                    <h3>Data Karyawan</h3>
                    <p>Mengelola data identitas dan informasi karyawan perusahaan.</p>
                    <span>Buka Modul</span>
                </div>
            </a>

            <a href="/jabatan" class="menu-card">
                <div class="menu-image">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=900&auto=format&fit=crop" alt="Jabatan">
                </div>
                <div class="menu-content">
                    <h3>Jabatan</h3>
                    <p>Mengelola struktur jabatan dan posisi kerja dalam perusahaan.</p>
                    <span>Buka Modul</span>
                </div>
            </a>

            <a href="/kehadiran" class="menu-card">
                <div class="menu-image">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=900&auto=format&fit=crop" alt="Kehadiran">
                </div>
                <div class="menu-content">
                    <h3>Kehadiran</h3>
                    <p>Mencatat absensi dan kehadiran karyawan secara digital.</p>
                    <span>Buka Modul</span>
                </div>
            </a>

            <a href="/gaji" class="menu-card">
                <div class="menu-image">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=900&auto=format&fit=crop" alt="Payroll Gaji">
                </div>
                <div class="menu-content">
                    <h3>Payroll Gaji</h3>
                    <p>Mengelola perhitungan gaji, tunjangan, dan potongan.</p>
                    <span>Buka Modul</span>
                </div>
            </a>

            <a href="/cuti" class="menu-card">
                <div class="menu-image">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=900&auto=format&fit=crop" alt="Cuti Karyawan">
                </div>
                <div class="menu-content">
                    <h3>Cuti Karyawan</h3>
                    <p>Mengelola pengajuan cuti dan status persetujuan karyawan.</p>
                    <span>Buka Modul</span>
                </div>
            </a>

        </div>
    </section>

    <div class="footer">
        © 2026 HRIS & Payroll System
    </div>

</div>

</body>
</html>