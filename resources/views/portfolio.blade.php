@extends('layouts.app')

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.projects')
    @include('sections.experience')
    @include('sections.contact')

    <!-- MODALS -->
    <div class="modal-overlay" id="modal-proj-01">
      <div class="modal-box">
        <div class="modal-header">
          <div><div class="modal-tag">Project 01</div><div class="modal-title">Smart Car Mini</div></div>
          <button class="modal-close" onclick="closeModal('proj-01')">&#x2715;</button>
        </div>
        <div class="modal-body">
          <div>
            <div class="modal-section-label">Foto &amp; Video Proyek</div>
            <div class="modal-gallery">
              <div class="gallery-item" data-type="img"><img src="{{ asset('car1.jpg') }}" alt="Foto 1"/><div class="media-label">Foto 1</div></div>
              <div class="gallery-item" data-type="vid"><video muted playsinline preload="metadata"><source src="{{ asset('vid2.mp4') }}" type="video/mp4"/></video><div class="play-badge">&#9654;</div><div class="media-label">Video Demo</div></div>
            </div>
          </div>
          <div>
            <div class="modal-section-label">Deskripsi Lengkap</div>
            <p class="modal-desc">Mobil mini cerdas berbasis Arduino Uno dengan sensor ultrasonik HC-SR04 untuk deteksi dan penghindaran rintangan otomatis. Dilengkapi fitur penyedot debu di bagian bawah sebagai prototipe smart cleaning robot.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-overlay" id="modal-proj-02">
      <div class="modal-box">
        <div class="modal-header">
          <div><div class="modal-tag">Project 02 · UI/UX Design</div><div class="modal-title">Aplikasi SI Wistek – TJKT</div></div>
          <button class="modal-close" onclick="closeModal('proj-02')">&#x2715;</button>
        </div>
        <div class="modal-body">
          <div>
            <div class="modal-section-label">Tampilan UI Aplikasi</div>
            <div class="modal-gallery gallery-portrait">
              <div class="gallery-item" data-type="img"><img src="{{ asset('ui-1-welcome.png') }}" alt="Welcome"/><div class="media-label">Welcome</div></div>
              <div class="gallery-item" data-type="img"><img src="{{ asset('ui-2-login.png') }}" alt="Login"/><div class="media-label">Login</div></div>
              <div class="gallery-item" data-type="img"><img src="{{ asset('ui-3-home.png') }}" alt="Dashboard"/><div class="media-label">Dashboard</div></div>
              <div class="gallery-item" data-type="img"><img src="{{ asset('ui-4-profile.png') }}" alt="Profil"/><div class="media-label">Profil Siswa</div></div>
              <div class="gallery-item" data-type="img"><img src="{{ asset('ui-5-info.png') }}" alt="Info"/><div class="media-label">Info Aplikasi</div></div>
              <div class="gallery-item" data-type="img"><img src="{{ asset('ui-6-kalender.png') }}" alt="Kalender"/><div class="media-label">Kalender Jurusan</div></div>
            </div>
          </div>
          <div>
            <div class="modal-section-label">Deskripsi Lengkap</div>
            <p class="modal-desc">Desain UI/UX aplikasi mobile Sistem Informasi Jurusan (SI Wistek) untuk SMK Wisata Indonesia jurusan TJKT. Dibuat menggunakan Figma dengan pendekatan mobile-first.</p>
            <a href="https://www.figma.com/design/jo2iNYlK98NIi0x6qfa5vJ/" target="_blank" class="detail-btn" style="margin-top:0.5rem; text-decoration:none;">Buka di Figma</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-overlay" id="modal-proj-03">
      <div class="modal-box">
        <div class="modal-header">
          <div><div class="modal-tag">Project 03</div><div class="modal-title">Server dan Jaringan Virtual</div></div>
          <button class="modal-close" onclick="closeModal('proj-03')">&#x2715;</button>
        </div>
        <div class="modal-body">
          <div>
            <div class="modal-section-label">Deskripsi Lengkap</div>
            <p class="modal-desc">Membangun server dan jaringan virtual menggunakan Proxmox VE. Mengkonfigurasi routing pada Mikrotik, server berbasis Ubuntu, serta melakukan deployment dan hosting web menggunakan aaPanel di lingkungan Linux secara mandiri.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-overlay" id="modal-proj-04">
      <div class="modal-box">
        <div class="modal-header">
          <div><div class="modal-tag">Project 04</div><div class="modal-title">Smart Door Lock Berbasis ESP32 & RFID</div></div>
          <button class="modal-close" onclick="closeModal('proj-04')">&#x2715;</button>
        </div>
        <div class="modal-body">
          <div>
            <div class="modal-section-label">Foto &amp; Video Proyek</div>
            <div class="modal-gallery">
              <div class="gallery-item" data-type="img"><img src="{{ asset('prj41.jpeg') }}" alt="Foto 1"/><div class="media-label">Foto 1</div></div>
              <div class="gallery-item" data-type="img"><img src="{{ asset('prj42.jpeg') }}" alt="Foto 2"/><div class="media-label">Foto 2</div></div>
            </div>
          </div>
          <div>
            <div class="modal-section-label">Deskripsi Lengkap</div>
            <p class="modal-desc">Sistem keamanan pintu pintar berbasis ESP32 dengan modul RFID RC522 dan Solenoid Door Lock. Hanya kartu RFID terdaftar yang dapat membuka pintu secara otomatis.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-overlay" id="modal-exp-01">
      <div class="modal-box">
        <div class="modal-header">
          <div><div class="modal-tag">Experience · 2024–2025</div><div class="modal-title">PT Solusi Intek Indonesia</div></div>
          <button class="modal-close" onclick="closeModal('exp-01')">&#x2715;</button>
        </div>
        <div class="modal-body">
          <div>
            <div class="modal-section-label">Sertifikat &amp; Dokumen</div>
            <div class="modal-gallery">
              <div class="gallery-item" data-type="img"><img src="{{ asset('cert.jpeg') }}" alt="Sertifikat PKL"/><div class="media-label">Sertifikat PKL</div></div>
            </div>
          </div>
          <div>
            <div class="modal-section-label">Detail Kegiatan</div>
            <p class="modal-desc">Melaksanakan program PKL selama 6 bulan di PT Solusi Intek Indonesia. Fokus pada pengumpulan dan analisis data untuk mendeteksi potensi kebocoran data perusahaan dan klien.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-overlay" id="modal-exp-02">
  <div class="modal-box">
    <div class="modal-header">
      <div><div class="modal-tag">Education · 2023–2026</div><div class="modal-title">SMK Wisata Indonesia</div></div>
      <button class="modal-close" onclick="closeModal('exp-02')">&#x2715;</button>
    </div>
    <div class="modal-body">
      
      <!-- Sertifikat -->
      <div>
        <div class="modal-section-label">Sertifikat &amp; Dokumen</div>
        <div class="modal-gallery">
          <div class="gallery-item" data-type="img">
            <img src="{{ asset('sertifikat-bnsp.JPEG') }}" alt="Sertifikat BNSP"/>
            <div class="media-label">Sertifikat BNSP</div>
          </div>
        </div>
      </div>

      <!-- Detail Pendidikan -->
      <div>
        <div class="modal-section-label">Detail Pendidikan</div>
        <p class="modal-desc">Jurusan Teknik Komputer dan Jaringan · Sertifikasi LSP BNSP · Sertifikasi Mikrokontroler · UKOM (Virtualisasi Linux, Web Server, WordPress & Mail Server Roundcube).</p>
      </div>

    </div>
  </div>
</div>

    <!-- LIGHTBOX -->
    <div class="lightbox" id="lightbox" onclick="if(event.target===this)closeLightbox()">
      <button class="lightbox-close" onclick="window.closeLightbox()">&#x2715;</button>
      <img id="lb-img" src="" alt="" style="display:none;" />
      <video id="lb-vid" controls style="display:none;max-width:90vw;max-height:88vh;border-radius:8px;"></video>
    </div>

@endsection