@extends('layouts.blog-home')

@section('content')

<div id="colorlib-main">
    <section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container-fluid px-0">
        <div class="row d-flex">
            <div class="col-md-6 d-flex">
                <div class="img d-flex align-self-stretch align-items-center js-fullheight" style="background-image:url('{{ url('frontend/images/adit.jpg') }}');">
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="text px-4 pt-5 pt-md-0 px-md-4 pr-md-5 ftco-animate">
            <h2 class="mb-4">I'm <span>Aditiya Prayogo</span> a Back-end Developer   &amp; Explorer</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        </div>
        </div>
    </div>
    </div>
</section>
</div><!-- END COLORLIB-MAIN -->
    
@endsection