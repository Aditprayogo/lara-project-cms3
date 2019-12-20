@extends('layouts.blog-home')


@section('content')

<div id="colorlib-main">
    <section class="ftco-section contact-section px-md-4">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h3">Contact Information</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-lg-6 col-xl-3 d-flex mb-4">
                    <div class="info bg-light p-4">
                        <p><span>Address:</span> Jalan Komp DDN No 50 , karang tengah , karang mulya</p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 d-flex mb-4">
                    <div class="info bg-light p-4">
                        <p><span>Phone:</span> <a href="tel://1234567920">+62 81282432271</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 d-flex mb-4">
                    <div class="info bg-light p-4">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">adit.ihzar@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 d-flex mb-4">
                    <div class="info bg-light p-4">
                        <p><span>Website</span> <a href="#">https://github.com/Aditprayogo</a></p>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-lg-6 d-flex">
                    <form action="#" class="bg-light p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-lg-6 d-flex">
                    <div id="map" class="bg-light"></div>
                </div>
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
    
@endsection