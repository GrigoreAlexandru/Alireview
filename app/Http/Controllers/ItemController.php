<?php

namespace App\Http\Controllers;

use App\Item;

use App\Vote;



use Illuminate\Http\Request;

use Sunra\PhpSimple\HtmlDomParser;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('created_at','desc')->paginate(10);
        return view('pages.items')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.submit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url'=>'required|unique:items',
            'review'=>'required'


        ]);

        $html = HtmlDomParser::file_get_html($request->input('url'));

        $item = new Item;
        $item->url = $request->input('url');
        $item->review = $request->input('review');
        $item->itemTitle = $html->find('h1[class=product-name]', 0)->innertext;

        foreach ($html->find("img[title=$item->itemTitle]") as $itemPicture){

        }

        $item->itemPrice = $html->find('span[class=p-price]', 0)->innertext;
        $item->itemSpecifics = $html->find('div[class=ui-box-body]', 0);
        $item->itemPicture = $itemPicture->src;
        $item->itemSeller = $html->find('dl[class=store-intro]', 0);
        $item->itemRating = $html->find('span[class=ui-rating-star]', 0);
        // Post as anonymous if not logged in
        $item->user_id = auth()->user()->id ??  $item->user_id = 0 ;
        $item->save();

        return redirect('/items')->with('success', 'Item Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        return view('pages.show')->with(['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function like ($id)
    {
        $item = Item::find($id);
        if (@!auth()->user()->id){


            return 'You must log in in to vote';
        }

        if (Vote::whereRaw("user_id = ? and item_id = $item->id", auth()->user()->id  )->exists()){
            return 'You already voted';
        }
        $vote = new Vote();
        if (auth()->user()->id){
            $vote->user_id = auth()->user()->id;
        } else {
            return 'You must log in';
        }
        $item->likes += 1;
        $vote->item_id = $item->id;
        $vote->value = '2';
        $item->save();
        $vote->save();

        return $item->likes;
    }
    public function dislike ($id)
    {


        $item = Item::find($id);

        if (Vote::whereRaw("user_id = ? and item_id = $item->id", auth()->user()->id  )->exists()){
            $vote = Vote::whereRaw("user_id = ? and item_id = $item->id", auth()->user()->id  );
            $vote->delete();
            $item->likes -= 1;
            $item->save();
            return $item->likes;
        } else {
            return 'You already voted';
        }


    }
    public function search (Request $request)
    {
        $keyword = $request->input('search');
        $search = Item::where('itemTitle', 'LIKE', "%$keyword%")->paginate(15);
        return view('pages.search')->with('search', $search);
    }
}
