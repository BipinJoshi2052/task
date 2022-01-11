<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [];
        if(Auth::user()->role == 'admin'){
            $result = Product::get()->toArray();
        }else{
            $result = Product::get()->where('created_by',Auth::user()->id)->toArray();
        }
        return view('products.index',compact('result'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'unit' => 'required',
            'stock' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        try {
            $slug = '';
            if(!empty($request->name)){
                $slug = str_replace(' ','-',strtolower($request->name));
            }
            $product = Product::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'unit' => $request->unit,
                    'slug' => $slug,
                    'stock' => $request->stock,
                    'created_by' => Auth::user()->id
                ]
            );
            return redirect()->route('product.edit',['id' => $product->id])->with('success', 'Product Updated');
            // Notification::send($user, new FriendReuquestNotification(Auth::user()));
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->withInput()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first()->toArray();
        return view('products.form',compact('product'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $html = view('includes.product-edit');
        return Response::json($html);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $form = Product::findOrFail($id);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect(route('products.index'))->with('error', $bug);
        }
        if($form->delete() == true){
            return redirect(route('products.index'))->with('success', " Product Deleted Succesfully");
        }else{
            return redirect(route('products.index'))->with('error', $form);
        }
    }
}
