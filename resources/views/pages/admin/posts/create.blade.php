@extends('layouts.app', ['title' => __('post Management')])

@section('content')
    @include('pages.admin.users.partials.header', ['title' => __('Add post')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('post Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('post.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form method="post" action="{{ route('post.store') }}" autocomplete="off" enctype="multipart/form-data">

                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('post information') }}</h6>
                            
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-body">{{ __('Body') }}</label>

                                    <textarea name="body" id="editor1" cols="100" rows="20" class=" form-control @error('about') is-invalid @enderror">{{ old('about') }}</textarea>

                                  

                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <label for="categories">Categories</label><br>

                                <select name="categories[]" multiple id="categories" class="form-control"></select>

                                

                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('Image') }}</label>

                                    <input type="file" name="image" class="form-control">
                                   

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>

                               

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>

$('#categories').select2({
  ajax: {
    url: 'http://lara-project-cms3.test/admin/ajax/categories/search',
    processResults: function(data){
      return {
        results: data.map(function(item){
            return {id: item.id, text: item.name} 
        })
      }
    }
  }
});



</script>

<script>


    CKEDITOR.replace( 'editor1' );



</script>


    
@endpush