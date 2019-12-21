@extends('layouts.blog-home')

@section('title')

    Home {{ $category->name }}
    
@endsection

@section('content')


<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        
        <div class="row d-flex">
            <div class="col-xl-8 py-5 px-md-5">
                <div class="row pt-md-4">

                    <div class="text-center mb-3 col-lg">
                        <h1>Posts {{ $category->name }}</h1>
                        <hr>

                    </div>
                    

                    

                    @forelse ($category->posts as $post)
                    <div class="col-md-12 mt-3">
                        <div class="blog-entry-2 ftco-animate">
                            <a href="single.html" class="img" style="background-image: url('{{ Storage::url($post->image) }}');"></a>
                            <div class="text pt-4">
                      <h3 class="mb-4"><a href="#">{{ $post->title }}</a></h3>
                      <p class="mb-4">{!! Str::limit($post->body, 60) !!}</p>
                      <div class="author mb-4 d-flex align-items-center">
                            <a href="#" class="img" style="background-image: url('{{ Storage::url($post->user->avatar) }}');"></a>
                            <div class="ml-3 info">
                                <span>Written by</span>
                                <h3><a href="#">{{ $post->user->name }}</a>, <span>{{ $post->created_at }}</span></h3>
                            </div>
                        </div>
                      <div class="meta-wrap d-md-flex align-items-center">
                          <div class="half order-md-last text-md-right">
                              <p class="meta">
                                  
                                  <span><i class="icon-eye"></i>{{ $post->views }}</span>
                                  
                              </p>
                          </div>
                          <div class="half">
                          <p><a href="{{ route('post.detail', [$post->slug]) }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Continue Reading</a></p>
                          </div>
                      </div>
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
                    {{-- <li>{{ $posts->links() }}</li> --}}
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