<?php

use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

if (!function_exists('storeImage')) {
    function storeImage($image,$folderName='images')
    {
        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName);
        }
        $currentDate = Carbon::now()->toDateString();
        $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $imagemedia = Image::make($image)->stream();
        Storage::disk('public')->put($folderName . '/' . $imagename, $imagemedia);
        return asset(Storage::url($folderName . '/' . $imagename));
    }
}

if (!function_exists('store_post')) {
    function store_post($request)
    {
        \request()->merge([
            'user_id'=>auth()->user()->id
        ]);
        $post[] = Post::create(\request()->except('_token'));
        return postsHTML($post);
    }
}


if (!function_exists('get_address')) {
    function get_address($postal_code)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $display = $client->request('GET', 'http://api.zippopotam.us/ph/' . $postal_code);
            $output = json_decode($display->getBody()->getContents());
            return $output->places[0]->{'place name'};
        } catch (\Exception $exception) {
            return ['error' => 'Postal Code Not Found'];
        }
    }
}


if (!function_exists('postsHTML')){
    function postsHTML($posts){
        $data = '';
        foreach ($posts as $post) {
            $data .= '<div class="post uk-box-shadow-hover-large shadow-md">' .
                '<div class="post-heading">' .
                '<div class="post-avature">' .
                '<img src="' . $post->user->avatar . '" alt="">' .
                '</div>' .
                '<div class="post-title">' .
                '<h4>'.$post->user->name.'</h4>' .
                '<p>' . $post->created_at->diffForHumans() . '<i class="uil-users-alt"></i></p>' .
                '</div>' .
                '<div class="post-btn-action">' .
                '<span class="icon-more uil-ellipsis-h" aria-expanded="false"></span>' .
                '<div class="mt-0 p-2 uk-dropdown" uk-dropdown="pos: bottom-right;mode:hover ">' .
                '<ul class="uk-nav uk-dropdown-nav">' .
                '<li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a></li>' .
                '</a></li>' .
                '<li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>' .
                'Delete </a>' .
                '</li>' .
                '</ul>' .
                '</div>' .
                '</div>' .
                '</div>' .
                '<div class="post-description">' .
                '<p><b><i>' . ucfirst($post->subject) . '.</i></b>' . $post->body . '</p>' .
                '</div>' .
                '<div class="post-state">' .
                '<div class="post-state-btns"><i class="uil-thumbs-up"></i> 126<span> Liked </span>' .
                '</div>' .
                '<div class="post-state-btns"><i class="uil-thumbs-down"></i> 126' .
                '<span> Dislikes </span>' .
                '</div>' .
                '<div class="post-state-btns"><i class="uil-comment"></i> 18 <span> Coments</span>' .
                '</div>' .
                '<div class="post-state-btns"><i class="uil-share-alt"></i> 193 <span> Shared </span>' .
                '</div>' .
                '</div>' .
                '<div class="post-comments" >' .
                '<a class="view-more-comment" > Veiw 8 more Comments </a >' .
                '<div class="post-comments-single" >' .
                '<div class="post-comment-avatar" >' .
                '<img src = "' . asset("salika/assets/images/avatars/avatar-5.jpg") . '">' .
                '</div >' .
                '<div class="post-comment-text" >' .
                '<div class="post-comment-text-inner" >' .
                '<h6 > Alex Dolgove </h6 >' .
                '<p > Ut wisi enim ad minim laoreet dolore magna aliquam erat </p >' .
                '</div >' .
                '<div class="uk-text-small" >' .
                '<a class="text-primary mr-1" > <i class="uil-thumbs-up" ></i > Like' .
                '</a >' .
                '<a class="text-secondary mr-1" > <i class="uil-thumbs-down" ></i > Dislike' .
                '</a >' .
                '<span > 1d </span >' .
                '</div >' .
                '</div >' .
                '<a class="post-comment-opt" ></a >' .
                '</div >' .
                '<div class="post-add-comment" >' .
                '<div class="post-add-comment-avature" >' .
                '<img src = "' . auth()->user()->avatar . '" alt = "' . auth()->user()->name . '" >' .
                '</div >' .
                '<div class="post-add-comment-text-area" >' .
                '<input type = "text" placeholder = "Write your comment..." >' .
                '</div >' .
                '</div >' .
                '</div >' .
                '</div >';
        }
        return $data;
    }
}
