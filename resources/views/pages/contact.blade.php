@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- Hero Section -->
    <!-- Hero Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);">
        <div class="container text-center text-white py-4">
            <h1 class="display-5 fw-bold mb-3">Contact Us</h1>
            <p class="lead mb-0 opacity-90">We'd love to hear from you</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row g-5">
            <!-- Contact Information -->
            <div class="col-lg-5">
                <h2 class="fw-bold mb-4">Get in Touch</h2>
                <p class="text-muted mb-4">
                    Have questions about our products or services? We're here to help! 
                    Reach out to us through any of the following channels.
                </p>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-geo-alt text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-semibold">Address</h5>
                        <p class="text-muted mb-0">
                            Jl. Telekomunikasi No. 1<br>
                            Bandung, Jawa Barat 40257<br>
                            Indonesia
                        </p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-telephone text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-semibold">Phone</h5>
                        <p class="text-muted mb-0">
                            +62 22 1234 5678<br>
                            +62 812 3456 7890 (WhatsApp)
                        </p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-envelope text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-semibold">Email</h5>
                        <p class="text-muted mb-0">
                            info@eshoptelu.com<br>
                            support@eshoptelu.com
                        </p>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi bi-clock text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-semibold">Business Hours</h5>
                        <p class="text-muted mb-0">
                            Monday - Friday: 08:00 - 17:00<br>
                            Saturday: 09:00 - 15:00<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-5">
                    <h5 class="fw-semibold mb-3">Follow Us</h5>
                    <div class="d-flex gap-3">
                        <a href="https://web.facebook.com/?locale=id_ID" target="_blank" title="Facebook" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                        <a href="https://www.instagram.com/helloridho/" target="_blank" title="Instagram" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-instagram fs-5"></i>
                        </a>
                        <a href="https://x.com/?lang=id" target="_blank" title="X (Twitter)" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-twitter-x fs-5"></i>
                        </a>
                        <a href="https://wa.me/6282268882235" target="_blank" title="WhatsApp" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-whatsapp fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <h3 class="fw-bold mb-4">Send us a Message</h3>
                        <form action="#" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="Your name">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="your@email.com">
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+62 xxx xxxx xxxx">
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                    <select class="form-select" id="subject" name="subject" required>
                                        <option value="">Select a topic</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="order">Order Status</option>
                                        <option value="product">Product Question</option>
                                        <option value="return">Returns & Refunds</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required placeholder="How can we help you?"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="bi bi-send me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
