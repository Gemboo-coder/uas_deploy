@extends('layout.layout')
@section('konten')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    /* --- CSS Hero/Banner --- */
    .hero-container {
        position: relative;
        height: 230px; 
        overflow: hidden;
    }

    .hero-img {
        height: 100%;
        object-fit: cover;
        filter: brightness(85%);
    }

    .carousel-caption {
        top: 50% !important;
        bottom: auto !important;
        transform: translateY(-50%);
        text-align: center;
    }

    .breadcrumb-style {
        font-size: 0.75rem;
        letter-spacing: 1px;
        margin-bottom: 0;
        font-family: 'Arial', sans-serif;
        font-weight: 300;
        opacity: 0.9;
    }

    .title-destinasi {
        font-family: 'Playfair Display', 'Times New Roman', serif;
        font-size: 3.5rem;
        font-weight: 400;
        margin-top: -5px;
    }

    .title-underline {
        width: 150px;
        height: 1px;
        background-color: rgba(255, 255, 255, 0.5);
        margin: 10px auto;
    }

    /* --- CSS Konten Tim --- */
    .team-section {
        padding: 60px 0;
        background-color: #fff;
    }

    .team-description {
        max-width: 850px;
        margin: 0 auto 50px auto;
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
        font-size: 1rem;
        color: #333;
        text-align: center;
    }

    /* Bingkai Foto */
    .team-photo-frame {
        width: 180px;
        height: 240px;
        background-color: #d9d9d9;
        margin: 0 auto 15px auto;
        overflow: hidden;
        border-radius: 4px;
    }

    .team-photo-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .member-name {
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 2px;
        color: #000;
    }

    .member-role {
        font-size: 0.85rem;
        color: #555;
        margin-bottom: 5px;
    }

    /* Style Ikon Instagram */
    .social-link {
        color: #ac2bac; /* Warna khas Instagram */
        font-size: 1.2rem;
        transition: transform 0.3s ease, color 0.3s ease;
        text-decoration: none;
    }

    .social-link:hover {
        color: #d6249f;
        transform: scale(1.2);
    }

    .member-card {
        margin-bottom: 40px;
    }
</style>

<div class="carousel-inner">
    <div class="carousel-item active">
        <div class="hero-container">
            <img src="{{ asset('images/3.jpg') }}" class="d-block w-100 hero-img" alt="Banner">
            <div class="carousel-caption">
                <p class="breadcrumb-style text-uppercase">NusaTrip > Tentang Kami</p>
                <h1 class="title-destinasi">Tentang Kami</h1>
                <div class="title-underline"></div>
            </div>
        </div>
    </div>
</div>

<div class="container team-section">
    <div class="row">
        <div class="col-12 text-center">
            <p class="lead quote-text">
            Kami adalah tim yang terdiri dari individu dengan latar belakang dan keahlian yang beragam, disatukan oleh visi yang sama untuk menciptakan solusi digital yang bermanfaat dan mudah digunakan. Setiap anggota tim berkontribusi sesuai dengan perannya masing-masing, mulai dari perencanaan, pengembangan, hingga pengelolaan sistem.

Dengan semangat kolaborasi dan komitmen terhadap kualitas, kami terus berupaya mengembangkan produk yang tidak hanya fungsional, tetapi juga memberikan pengalaman terbaik bagi pengguna. Kami percaya bahwa kerja sama tim, inovasi, dan tanggung jawab adalah kunci dalam menghadirkan layanan yang dapat dipercaya.
            </p>
        </div>
    </div>

    <div class="row justify-content-center text-center">
        <div class="col-md-4 col-6 member-card">
            <div class="team-photo-frame">
                <img src="{{ asset('images/star.jpg') }}" alt="Muhammad Anshori Hannan">
            </div>
            <p class="member-name">Muhammad Anshori Hannan</p>
            <p class="member-role">Master Of BackEnd</p>
            <a href="https://instagram.com/aanhannan._" target="_blank" class="social-link">
                <i class="fab fa-instagram"></i>
                <span class="instagram-username">@aanhannan._</span> 
            </a>
        </div>

        <div class="col-md-4 col-6 member-card">
            <div class="team-photo-frame">
                <img src="{{ asset('images/thanos.jpg') }}" alt="Muhammad Abin">
            </div>
            <p class="member-name">Muhammad Abin</p>
            <p class="member-role">Master Of BackEnd</p>
            <a href="https://instagram.com/mhbin_" target="_blank" class="social-link">
                <i class="fab fa-instagram"></i>
                <span class="instagram-username">@mhbin_</span> 
            </a>
        </div>

        <div class="col-md-4 col-6 member-card">
            <div class="team-photo-frame">
                <img src="{{ asset('images/wanda.jpg') }}" alt="Fitri Ramdhani">
            </div>
            <p class="member-name">Fitri Ramdhani</p>
            <p class="member-role">Master Of BackEnd</p>
            <a href="https://instagram.com/ftry021" target="_blank" class="social-link">
                <i class="fab fa-instagram"></i>
                <span class="instagram-username">@ftry021</span>
            </a>
        </div>
    </div>

    <div class="row justify-content-center text-center">
        <div class="col-md-4 col-6 member-card">
            <div class="team-photo-frame">
                <img src="{{ asset('images/tony.jpg') }}" alt="Khalif Fauzan Firdaus">
            </div>
            <p class="member-name">Khalif Fauzan Firdaus</p>
            <p class="member-role">Master Of FrontEnd</p>
            <a href="https://instagram.com/kalvin_deus" target="_blank" class="social-link">
                <i class="fab fa-instagram"></i>
                <span class="instagram-username">@kalvin_deus</span> 
            </a>
        </div>

        <div class="col-md-4 col-6 member-card">
            <div class="team-photo-frame">
                <img src="{{ asset('images/dead.jpg') }}" alt="Rizky Dewa Cahya Saputra">
            </div>
            <p class="member-name">Rizky Dewa Cahya Saputra</p>
            <p class="member-role">Junior Of FrontEnd</p>
            <a href="https://instagram.com/riz_zyxo" target="_blank" class="social-link">
                <i class="fab fa-instagram"></i>
                <span class="instagram-username">@riz_zyxo</span> 
            </a>
        </div>
    </div>
</div>

@endsection