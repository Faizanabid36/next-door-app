@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner">
        <div class="uk-grid-large" uk-grid>

            <div class="uk-width-1-2@m" style=" width:100%">
                <h1 class="text-dark">
                    Media Library
                </h1>
                <hr>
                <div
                    class="uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-collapse uk-overflow-hidden"
                    style="border-radius: 25px;  overflow: hidden;" uk-lightbox="animation: scale" uk-grid>
                    @foreach($gallery_images as $img)
                        <div>
                            <a href="{{asset($img->image_url)}}" data-caption="{{$img->business->title}}">
                                <div class="photo-card" data-src="{{asset($img->image_url)}}" uk-img>
                                    <div class="photo-card-content">
                                        <div>
                                            <h4> View Image</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>


        </div>


    </div>
@endsection
