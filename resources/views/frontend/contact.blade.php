@extends('frontend.layouts.master')

@section('title', 'Contact Us — Siddharsh Systems & Solutions')

@section('content')

{{-- ── Page Banner ─────────────────────────────────────── --}}
<section class="page-banner">
    <div class="container text-center">
        <h1 class="display-4 fw-900 mb-3">Get in Touch</h1>
        <p class="lead opacity-75">Have a question or need a quote? Our team is here to help you.</p>
    </div>
</section>

{{-- ── Contact Content ─────────────────────────────────── --}}
<section class="section-py bg-white">
    <div class="container">
        <div class="row g-5">
            {{-- Left: Contact Info --}}
            <div class="col-lg-4">
                <div class="contact-info-wrap">
                    <div class="info-card mb-4">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info-content">
                            <h5>Our Location</h5>
                            <p>Plot No. 123, Industrial Area, Phase 1, New Delhi, India - 110001</p>
                        </div>
                    </div>
                    <div class="info-card mb-4">
                        <div class="info-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="info-content">
                            <h5>Call Us</h5>
                            <p>+91 8826363495<br>+91 11 2345 6789</p>
                        </div>
                    </div>
                    <div class="info-card mb-4">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-content">
                            <h5>Email Us</h5>
                            <p>info@siddharsh.com<br>sales@siddharsh.com</p>
                        </div>
                    </div>
                    
                    <div class="social-connect mt-5">
                        <h6 class="fw-700 mb-3">Connect with us:</h6>
                        <div class="d-flex gap-3">
                            <a href="#" class="social-circle"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-circle"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-circle"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-circle"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Contact Form --}}
            <div class="col-lg-8">
                <div class="contact-form-card shadow-lg p-4 p-lg-5 rounded-4">
                    <h3 class="fw-800 mb-4">Send us a Message</h3>
                    <form action="{{ route('enquiry.submit') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-700">Your Name</label>
                                <input type="text" name="name" class="form-control form-control-lg rounded-3" placeholder="Enter your full name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-700">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-lg rounded-3" placeholder="Enter your email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-700">Phone Number</label>
                                <input type="tel" name="phone" class="form-control form-control-lg rounded-3" placeholder="10-digit mobile number" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-700">Subject</label>
                                <input type="text" name="subject" class="form-control form-control-lg rounded-3" placeholder="What is this about?">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-700">Message</label>
                                <textarea name="message" class="form-control form-control-lg rounded-3" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-3 fw-800 rounded-3">
                                    Send Message <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── Map Section ──────────────────────────────────────── --}}
<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.123456789!2d77.1234567!3d28.1234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDA3JzM0LjUiTiA3N8KwMDcnMzQuNSJF!5e0!3m2!1sen!2sin!4v1234567890" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<style>
.contact-info-wrap {
    padding-right: 30px;
}
.info-card {
    display: flex;
    gap: 20px;
}
.info-icon {
    width: 50px;
    height: 50px;
    background: #f0f7f4;
    color: #007e5e;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 1.2rem;
    flex-shrink: 0;
}
.info-content h5 {
    font-weight: 800;
    margin-bottom: 5px;
    font-size: 1.1rem;
}
.info-content p {
    color: #666;
    margin-bottom: 0;
    line-height: 1.6;
}
.social-circle {
    width: 40px;
    height: 40px;
    background: #f8f9fa;
    color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.3s ease;
    text-decoration: none;
}
.social-circle:hover {
    background: #007e5e;
    color: #fff;
    transform: translateY(-3px);
}
.contact-form-card {
    background: #fff;
    border: 1px solid #eee;
}
.form-control:focus {
    border-color: #007e5e;
    box-shadow: 0 0 0 0.25rem rgba(0,126,94,0.1);
}
</style>

@endsection
