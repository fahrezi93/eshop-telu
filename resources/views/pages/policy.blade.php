@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 bg-dark">
        <div class="container text-center text-white py-4">
            <h1 class="display-5 fw-bold mb-3">Privacy Policy</h1>
            <p class="lead mb-0 opacity-75">Last updated: {{ date('F Y') }}</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <!-- Introduction -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">1. Introduction</h2>
                            <p class="text-muted">
                                Welcome to E-Shop Telu. We are committed to protecting your personal information and your 
                                right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard 
                                your information when you visit our website and use our services.
                            </p>
                            <p class="text-muted">
                                Please read this privacy policy carefully. If you do not agree with the terms of this 
                                privacy policy, please do not access the site.
                            </p>
                        </section>

                        <!-- Information We Collect -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">2. Information We Collect</h2>
                            <p class="text-muted">We collect information that you provide directly to us, including:</p>
                            <ul class="text-muted">
                                <li><strong>Personal Information:</strong> Name, email address, phone number, and shipping address when you create an account or place an order.</li>
                                <li><strong>Payment Information:</strong> Payment details are processed securely by our payment partner, Midtrans. We do not store your full credit card information.</li>
                                <li><strong>Order Information:</strong> Details about the products you purchase and your order history.</li>
                                <li><strong>Communication Data:</strong> Information you provide when contacting our customer support.</li>
                            </ul>
                        </section>

                        <!-- How We Use Your Information -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">3. How We Use Your Information</h2>
                            <p class="text-muted">We use the information we collect to:</p>
                            <ul class="text-muted">
                                <li>Process and fulfill your orders</li>
                                <li>Send order confirmations and shipping updates</li>
                                <li>Provide customer support</li>
                                <li>Improve our website and services</li>
                                <li>Send promotional emails (with your consent)</li>
                                <li>Prevent fraud and ensure security</li>
                                <li>Comply with legal obligations</li>
                            </ul>
                        </section>

                        <!-- Information Sharing -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">4. Information Sharing</h2>
                            <p class="text-muted">We may share your information with:</p>
                            <ul class="text-muted">
                                <li><strong>Service Providers:</strong> Third-party companies that help us operate our business (payment processors, shipping carriers, etc.)</li>
                                <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                                <li><strong>Business Transfers:</strong> In connection with any merger, sale of company assets, or acquisition</li>
                            </ul>
                            <p class="text-muted">
                                We do not sell your personal information to third parties.
                            </p>
                        </section>

                        <!-- Data Security -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">5. Data Security</h2>
                            <p class="text-muted">
                                We implement appropriate technical and organizational security measures to protect your 
                                personal information. However, please note that no method of transmission over the Internet 
                                or electronic storage is 100% secure. While we strive to protect your data, we cannot 
                                guarantee absolute security.
                            </p>
                        </section>

                        <!-- Your Rights -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">6. Your Rights</h2>
                            <p class="text-muted">You have the right to:</p>
                            <ul class="text-muted">
                                <li>Access and receive a copy of your personal data</li>
                                <li>Request correction of inaccurate data</li>
                                <li>Request deletion of your data</li>
                                <li>Opt-out of marketing communications</li>
                                <li>Lodge a complaint with a supervisory authority</li>
                            </ul>
                        </section>

                        <!-- Cookies -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">7. Cookies</h2>
                            <p class="text-muted">
                                We use cookies and similar tracking technologies to enhance your browsing experience, 
                                remember your preferences, and understand how you use our website. You can control cookies 
                                through your browser settings.
                            </p>
                        </section>

                        <!-- Changes to This Policy -->
                        <section class="mb-5">
                            <h2 class="fw-bold mb-3">8. Changes to This Policy</h2>
                            <p class="text-muted">
                                We may update this privacy policy from time to time. We will notify you of any changes by 
                                posting the new privacy policy on this page and updating the "Last updated" date.
                            </p>
                        </section>

                        <!-- Contact Us -->
                        <section class="mb-0">
                            <h2 class="fw-bold mb-3">9. Contact Us</h2>
                            <p class="text-muted">
                                If you have questions or concerns about this privacy policy, please contact us at:
                            </p>
                            <div class="bg-light rounded p-4">
                                <p class="mb-1"><strong>E-Shop Telu</strong></p>
                                <p class="mb-1 text-muted">Email: privacy@eshoptelu.com</p>
                                <p class="mb-1 text-muted">Phone: +62 22 1234 5678</p>
                                <p class="mb-0 text-muted">Address: Jl. Telekomunikasi No. 1, Bandung, Jawa Barat 40257</p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
