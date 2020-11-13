<?php

use App\Post;
use App\PostAttachment;
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
            'user_id' => auth()->user()->id
        ]);
        if ($request->hasFile('post_attachments'))
            \request()->merge(['has_attachments' => 1]);
        $post[] = Post::create(\request()->except('_token', 'post_attachments'));
        if ($request->hasFile('post_attachments')) {
            foreach ($request->file('post_attachments') as $attachment) {

                if (explode('/', $attachment->getClientMimeType())[0] == 'image') {
                    $url = storeImage($attachment, 'posts/' . auth()->user()->id);
                    PostAttachment::create(['post_id' => $post[0]->id, 'attachment_path' => $url, 'type' => 'image']);
                }
                if (explode('/', $attachment->getClientMimeType())[0] == 'video') {
                    $folderName = 'posts/' . auth()->user()->id;
                    $video_name = Carbon::now()->toDateString() . '-' . uniqid() . '.' . $attachment->getClientOriginalExtension();
                    $url = $attachment->storeAs($folderName, $video_name, 'public');
                    $url = asset('storage/' . $url);
                    PostAttachment::create(['post_id' => $post[0]->id, 'attachment_path' => $url, 'type' => 'video']);
                }
            }
        }
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
