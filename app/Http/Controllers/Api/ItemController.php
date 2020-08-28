<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{

    public function __construct($value='')
    {
        $this->middleware('auth:api')->except('index','filter');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $items=Item::all();
       return response()->json([
        "status"=>"ok",
        "totalResults"=>count($items),
        "items"=>ItemResource::collection($items)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_no' => 'required',
            'name' => 'required|min:5',
            'photo' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'subcategory' => 'required',
            ]);
        //file upload
        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/itemimg'),$imageName);
            $myfile='backend/itemimg/'.$imageName;



        //store data
        $item = new item;//obj 
        $item ->codeno = $request->code_no;// table attri
        $item ->name = $request->name;
        $item ->photo =$myfile;
        $item ->price =$request->price ;
        $item ->discount = $request->discount;
        $item ->description =$request->description ;
        $item->brand_id = $request->brand;
        $item ->subcategory_id =$request->subcategory ; 

        $item->save();

        //Redirect
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter($sid,$bid)
{
    $items =array();
    if ($sid && $bid) {
        $items = Item::where('subcategory_id',$sid)
        ->where('brand_id',$bid)->get();

    }else{
        $items = Item::where('subcategory_id',$sid)
        ->or_where('brand_id',$bid)->get();
    }
    return $items;
}
}
