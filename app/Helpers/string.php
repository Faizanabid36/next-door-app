<?php

use App\Post;
use App\PostLike;
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


if (!function_exists('postsHTML')) {
    function postsHTML($posts)
    {
        $myLikes = PostLike::whereUserId(auth()->user()->id)->get();
        $myLikesID = $myLikes->pluck('post_id')->toArray();
        $data = '';
        foreach ($posts as $post) {
            $liked = '';
            $disliked = '';
            $res = '';
            $showDelete = '';
            if (isset(auth()->user()->id) && $post->user_id == auth()->user()->id) {
                $showDelete = '<div class="mt-0 p-2 uk-dropdown" uk-dropdown="pos: bottom-right;mode:hover ">' .
                    '<ul class="uk-nav uk-dropdown-nav">' .
                    '<li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>' .
                    'Delete </a></li></ul></div>';
            }
            if (!is_null($myLikes)) {
                if (in_array($post->id, $myLikesID))
                    $res = $myLikes->where('post_id', $post->id)->first();
                isset($res->like_dislike) && $res->like_dislike == 1 ? $liked = 'text-primary' : $disliked = 'text-danger';
            }
            $data .= '<div class="post uk-box-shadow-hover-large shadow-md">' .
                '<div class="post-heading">' .
                '<div class="post-avature">' .
                '<img src="' . $post->user->avatar . '" alt="">' .
                '</div>' .
                '<div class="post-title">' .
                '<h4>' . $post->user->name . '</h4>' .
                '<p>' . $post->created_at->diffForHumans() . '<i class="uil-users-alt"></i></p>' .
                '</div>' .
                '<div class="post-btn-action">' .
                '<span class="icon-more uil-ellipsis-h" aria-expanded="false"></span>' .
                $showDelete .
                '</div>' .
                '</div>' .
                '<div class="post-description">' .
                '<p><b><i>' . ucfirst($post->subject) . '.</i></b>' . $post->body . '</p>' .
                '</div>' .
                '<div class="post-state">' .
                '<div class="post-state-btns ' . $liked . '"><i class="uil-thumbs-up"></i>' . count($post->likes) .
                '<span> Likes </span>' .
                '</div>' .
                '<div class="post-state-btns ' . $disliked . '"><i class="uil-thumbs-down"></i> ' .
                count($post->dislikes) . '' .
                '<span> Dislikes </span>' .
                '</div>' .
                '<div class="post-state-btns"><i class="uil-comment"></i> 18 <span> Coments</span>' .
                '</div>' .
                '<div class="post-state-btns"><i class="uil-share-alt"></i>' .
                'Share' .
                '<span class="mt-0 p-2 uk-dropdown" uk-dropdown="pos: bottom-right;mode:hover "> ' .
                '<ul class="uk-nav uk-dropdown-nav">' .
                '<li><a href="#"> <i class="uil-facebook mr-1"></i> Share on Facebook</a></li>' .
                '</a></li>' .
                '<li><a href="#"> <i class="uil-linkedin mr-1"></i> Share on LinkedIn</a></li>' .
                '</a></li>' .
//                '<li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>' .
//                'Delete </a>' .
                '</li>' .
                '</ul>' .
                '</span > ' .
                '</div > ' .
                '</div > ' .
                '<div class="post-comments" > ' .
                '<a class="view-more-comment" > Veiw 8 more Comments </a > ' .
                '<div class="post-comments-single" > ' .
                '<div class="post-comment-avatar" > ' .
                '<img src = "' . asset("salika/assets/images/avatars/avatar-5.jpg") . '" > ' .
                '</div > ' .
                '<div class="post-comment-text" > ' .
                '<div class="post-comment-text-inner" > ' .
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
