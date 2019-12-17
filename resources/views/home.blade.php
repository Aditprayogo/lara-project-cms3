@extends('layouts.blog-home')

@section('content')
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex">
            <div class="col-xl-8 py-5 px-md-5">
                <div class="row pt-md-4">

                    @forelse ($posts as $post)
                    <div class="col-md-12">
                        <div class="blog-entry ftco-animate d-md-flex">
                            <a href="single.html" class="img img-2" style="background-image: url({{ Storage::url($post->image) }});"></a>
                            <div class="text text-2 pl-md-4">
                                <h3 class="mb-2"><a href="single.html">{{$post->title}}</a></h3>
                                <div class="meta-wrap">
                                                    <p class="meta">
                                        <span><i class="icon-calendar mr-2"></i>{{$post->created_at}}</span>
                                        <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $post->categories->first()->name }}</a></span>
                                        <span><i class="far fa-eye"></i> {{ $post->views }} Views</span>
                                    </p>
                                </div>
                                <p class="mb-4">{{ Str::limit($post->body,40) }}</p>
                                <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                            </div>
                        </div>
                    </div>
                        
                    @empty
                        Kosong ga ada post
                    @endforelse
                   
                        
                        
                </div><!-- END-->
                <div class="row">
              <div class="col">
                <div class="block-27">
                  <ul>
                    <li>{{ $posts->links() }}</li>
                  </ul>
                </div>
              </div>
            </div>
            </div>
            <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">

       @include('includes.frontend.sidebar')
      </div><!-- END COL -->
        </div>
    </div>
</section>
</div><!-- END COLORLIB-MAIN -->
@endsection