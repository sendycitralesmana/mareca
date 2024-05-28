<div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Kontak Kami</h5>
                <h1 class="mb-3">Hubungi Untuk Pertanyaan Apa Pun</h1>
            </div>
            <div class="contact-detail position-relative p-5">
                <div class="row g-5 mb-5 justify-content-center">
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Alamat</h4>
                                <a href="https://www.google.com/maps/place/CV.+Mareca+Yasa+Media/@-6.9557014,107.7093234,15z/data=!4m6!3m5!1s0x2e68c2fb4e9454a3:0x4aad21ef35bcfc1d!8m2!3d-6.9557014!4d107.7093234!16s%2Fg%2F11sk0p0_wg?entry=ttu" 
                                    target="_blank" class="h5">Perumahan Cempaka Arum B5 No. 14, Kota Bandung
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Hubungi Kami</h4>
                                <a class="h5" href="tel:+62 813-2032-4274" target="_blank"> +62 813-2032-4274</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle" style="width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Email Kami</h4>
                                <a class="h5" href="mailto:mail@marecayasa.com" target="_blank">mail@marecayasa.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-md-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="p-5 h-100 rounded contact-map">
                            <iframe class="rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15841.814291444462!2d107.7093234!3d-6.9557014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c2fb4e9454a3%3A0x4aad21ef35bcfc1d!2sCV.%20Mareca%20Yasa%20Media!5e0!3m2!1sid!2sid!4v1715852042888!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="p-5 rounded contact-form">
                            <form role="form" action="/message/store" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <input type="text" name="name" class="form-control border-0 py-3" placeholder="Nama Anda" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Masukkan Nama Anda')">
                                </div>
                                <div class="mb-4">
                                    <input type="email" name="email" class="form-control border-0 py-3" placeholder="Email Anda" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Masukkan Email Anda')">
                                </div>
                                <div class="mb-4">
                                    <textarea name="message" class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Kirimkan Pesan Anda" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Masukkan Pesan Anda')"></textarea>
                                </div>
                                <div class="text-start">
                                    <button class="btn bg-primary text-white py-3 px-5" type="submit">Kirim Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>