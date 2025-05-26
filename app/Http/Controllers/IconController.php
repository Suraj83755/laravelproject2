<?php

namespace App\Http\Controllers;

use App\Models\Icons;
use App\Models\Footer;
use App\Models\News;
use App\Models\Explore;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IconController extends Controller
{
    public function store(Request $request)
    {
        $path = $request->file('image')->store('images', 'public');

        $data = new Icons;
        $data->image = $path;
        $data->type = $request['category'];
        $data->no_of_listing = $request['no_of_listing'];
        $data->save();
        
        return back()->with('success', 'Image Successfully Uploaded');
    }

    public function showcard(){
    $var = Card::all(); 
    return view('card', compact('var'));
    }

    public function showicons(){
        // $var= Icons::all();
        $var = Icons::where('is_active', true)->get();
        return view('icon', compact('var'));
    }


    

    public function showfooter(){
        $foot= Footer::all();
        return view('footer', compact('foot'));
    }

    public function shownews(){
        $news= News::all();
        return view('News', compact('news'));
    }

    public function showexplore(){
        $exp= Explore::all();
        return view('explore', compact('exp'));
    }

    
    public function deletecard($id){
        Card::find($id)->delete();
        return redirect()->back()->with('success', 'Card Deleted successfully!');
    }

    public function deleteicon($id){
        Icons::find($id)->delete();
        return redirect()->back()->with('success', 'Icon Deleted successfully!');
    }

    public function deletefooter($id){
        Footer::find($id)->delete();
        return redirect()->back()->with('success', 'Footer Deleted successfully!');
    }

    public function deletenews($id){
        News::find($id)->delete();
        return redirect()->back()->with('success', 'News Deleted successfully!');
    }

    public function deleteexplore($id){
        Explore::find($id)->delete();
        return redirect()->back()->with('success', 'Explore Deleted successfully!');
    }

//     public function iconupdate(Request $request, $id)
// {
//     // Validate request
//     // $validated = $request->validate([
//     //     'type' => 'required|string',
//     //     'no_of_listing' => 'required|integer',
//     //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
//     // ]);

//     $item = Icons::findOrFail($id);

//     // Handle image upload
//     if ($request->hasFile('image')) {
//         // Delete old image if exists
//         if ($item->image && Storage::exists('public/'.$item->image)) {
//             Storage::delete('public/'.$item->image);
//         }
//         // Store new image
//         $item->image = $request->file('image')->store('icons', 'public');
//     }

//     // Update other fields
//     $item->type = $request->type;
//     $item->no_of_listing = $request->no_of_listing;
//     $item->save();

//     return redirect('/showicon')->with('success', 'Icon updated successfully');
// }
public function update(Request $request, $id)
{
    $item = Icons::findOrFail($id);

    if ($request->hasFile('image')) {
        // Delete old image
        if ($item->image && Storage::exists('public/'.$item->image)) {
            Storage::delete('public/'.$item->image);
        }
        $item->image = $request->file('image')->store('icons', 'public');
    }

    $item->type = $request->category;
    $item->no_of_listing = $request->no_of_listing;
    $item->save();

    return redirect()->route('icon.index')->with('success', 'Icon updated successfully');
}

    // public function iconedit($id){
    //     $items=Icons::findorfail($id);
    //     return view('editicon',compact('items'));     
    //     }
    
    public function edit($id)
{
    $editData = Icons::findOrFail($id);
    $var = Icons::all();
    return view('icon', compact('var', 'editData'));
}

public function editFooter($id)
{
    $editData = Footer::findOrFail($id);
    $foot = Footer::all();
    return view('footer', compact('foot', 'editData'));
}

public function updateFooter(Request $request, $id)
{
    $item = Footer::findOrFail($id);
    $item->Content = $request->content;
    $item->Mobile_No = $request->mobileno;
    $item->save();

    return redirect()->route('footer.index')->with('success', 'Footer updated successfully');
}

// Remove the old footeredit and footerupdate methods

public function editCard($id)
{
    $editData = Card::findOrFail($id);
    $var = Card::all();
    return view('card', compact('var', 'editData'));
}

public function updateCard(Request $request, $id)
{
    $item = Card::findOrFail($id);

    if ($request->hasFile('cardimage')) {
        if ($item->image && Storage::exists('public/'.$item->image)) {
            Storage::delete('public/'.$item->image);
        }
        $item->image = $request->file('cardimage')->store('icons', 'public');
    }

    $item->title = $request->cardtitle;
    $item->content = $request->cardtext;
    $item->save();

    return redirect()->route('card.index')->with('success', 'Card updated successfully');
}

        public function editNews($id)
        {
            $editData = News::findOrFail($id);
            $news = News::all();
            return view('News', compact('news', 'editData'));
        }
        
        public function updateNews(Request $request, $id)
        {
            $item = News::findOrFail($id);
        
            if ($request->hasFile('image')) {
                if ($item->img && Storage::exists('public/'.$item->img)) {
                    Storage::delete('public/'.$item->img);
                }
                $item->img = $request->file('image')->store('icons', 'public');
            }
        
            $item->title = $request->title;
            $item->Role = $request->role;
            $item->Date = $request->date;
            $item->Content = $request->content;
            $item->save();
        
            return redirect()->route('news.index')->with('success', 'News updated successfully');
        }

    
            public function editExplore($id)
            {
                $editData = Explore::findOrFail($id);
                $exp = Explore::all();
                return view('explore', compact('exp', 'editData'));
            }
            
            public function updateExplore(Request $request, $id)
            {
                $item = Explore::findOrFail($id);
                
                if ($request->hasFile('image')) {
                    if ($item->image && Storage::exists('public/'.$item->image)) {
                        Storage::delete('public/'.$item->image);
                    }
                    $item->image = $request->file('image')->store('icons', 'public');
                }
                
                if ($request->hasFile('secondary_image')) {
                    if ($item->profilepic && Storage::exists('public/'.$item->profilepic)) {
                        Storage::delete('public/'.$item->profilepic);
                    }
                    $item->profilepic = $request->file('secondary_image')->store('icons', 'public');
                }
                
                $item->type = $request->type;
                $item->title = $request->title;
                $item->rating = $request->rating;
                $item->no_of_ratings = $request->no_of_ratings;
                $item->price = $request->price;
                $item->extra_text = $request->extra_text;
                $item->content = $request->content;
                $item->status = $request->status;
                $item->save();
            
                return redirect()->route('explore.index')->with('success', 'Explore card updated successfully');
            }
        
            public function status(Request $request)
            {
                $icon = Icons::find($request->id);
                if ($icon) {
                    $icon->is_active = $request->is_active;
                    $icon->save();
                    return response()->json(['success' => true, 'message' => 'Status updated.']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Icon not found.'], 404);
                }
            }
            
    }




