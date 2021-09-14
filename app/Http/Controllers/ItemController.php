<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    /**
     * Renders the information about one specific item listing.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = auth()->user();
        $item = $user !== null && $user->admin
            ? AuctionItem::with('bids.user')->find($id)
            : AuctionItem::find($id);

        if ($item === null) {
            abort(404);
        }

        return view('auction-item.show', ['item' => $item, 'user' => $user]);
    }

    /**
     * Renders the page to create a new listing.
     * @return \Illuminate\View\View
     */
    public function create() 
    {
        return view('auction-item.create');
    }

    /**
     * Callback for create listing form, creates a new listing in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) 
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['required', 'mimes:jpeg,png,jpg']
        ]);

        $file = $request->file('image');
        if ($file instanceof UploadedFile && $file->isValid()) {
            $item = AuctionItem::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $this->storeAuctionImage($file)
            ]);
            return redirect('/item/'.$item->id);
        } else {
            throw ValidationException::withMessages([
                'image' => 'Please provide a valid image.'
            ]);
        }
    }

    /**
     * Renders the page to update an existing listing.
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id) 
    {
        $item = AuctionItem::find($id);
        if ($item === null) {
            abort(404);
        }

        return view('auction-item.edit', ['item' => $item]);
    }

    /**
     * Callback for the edit listing form, updates existing database entry.
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id, Request $request) 
    {
        $item = AuctionItem::find($id);
        if ($item === null) {
            return back();
        }

        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['mimes:jpeg,png,jpg']
        ]);

        $item->name = $request->name;
        $item->description = $request->description;

        $file = $request->file('image');
        if ($file instanceof UploadedFile && $file->isValid()) {
            $item->image = $this->storeAuctionImage($file);
        }

        $item->save();
        return redirect('/item/'.$item->id);
    }

    /**
     * Resizes and stores the provided image file as an auction listing image.
     * Returns the filename.
     */
    private function storeAuctionImage(UploadedFile $file): string
    {
        $filename = Str::random(10).time().'.jpg';
        Image::make($file->path())->resize(640, 640, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path(AuctionItem::IMAGE_PATH.$filename));
        return $filename;
    }

    /**
     * Renders the information about one specific item listing.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        AuctionItem::find($id)?->delete(); 
        return back();
    }
}
