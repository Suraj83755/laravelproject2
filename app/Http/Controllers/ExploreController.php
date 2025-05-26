<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Explore;
use App\Models\Card;


class ExploreController extends Controller
{
    public function view()
    {
        return view('index');
    }

    public function store(Request $request)
{
    /*$mainImagePath = $request->file('image')->store('images', 'public');
    $pfpPath = $request->file('pfp')->store('profile_pics', 'public');^*/
    $path = $request->file('image')->store('images', 'public');
    $path2 = $request->file('secondary_image')->store('images', 'public');

    $data = new Explore;
    $data->image = $path;
    $data->type = $request['type'];
    $data->title = $request['title'];
    $data->rating = $request['rating'];
    $data->no_of_ratings = $request['no_of_ratings'];
    $data->price = $request['price'];
    $data->extra_text = $request['extra_text'];
    $data->profilepic = $path2;
    $data->content = $request['content'];
    $data->status = $request['status'];
    $data->save();

    return back()->with('success', 'Image and profile pic uploaded successfully.');
}

}

