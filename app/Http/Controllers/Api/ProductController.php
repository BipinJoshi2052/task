<?php

namespace App\Http\Controllers\Api;

use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Product;
use App\Traits\ApiResponser;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = Product::get(); 
            if(Auth::user()->role == 'admin'){
                $result->toArray();
            }else{
                $result->where('created_by',Auth::user()->id)->toArray();
            }           
            return $this->successResponse(ProductResource::collection($result), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            $product = Product::create(
                [
                    'name' => $request->name,
                    'unit' => $request->unit,
                    'slug' => $slug,
                    'stock' => $request->stock,
                    'created_by' => Auth::user()->id
                ]
            );
            return $this->successResponse(new ProductResource($product), 'Product Created Successfully!');

            return $product;
            // return $this->successResponse(ProductResource::collection($product), 'Product Updated Successfully!');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return $this->errorResponse($bug);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        return 'asfd';
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
            return $this->successResponse(ProductResource::collection($product), 'Product Updated Successfully!');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return $this->errorResponse($bug);
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
        return response()->json([
            'data'=> $id,
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'kk'.$id;
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
        $validator = Validator::make($request->all(), [
            'id' => 'required',
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
            $product = Product::findOrFail($request->id);
            $product->update(
                [
                    'name' => $request->name,
                    'unit' => $request->unit,
                    'slug' => $slug,
                    'stock' => $request->stock,
                    'created_by' => Auth::user()->id
                ]
            );
            return $this->successResponse(new ProductResource($product), 'Product Updated Successfully!');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return $this->errorResponse($bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $form = Product::findOrFail($request->id);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return $this->errorResponse($bug);
        }
        if($form->delete() == true){
            return Response::json('Product Deleted Successfully!');
        }else{
            return Response::json('Could not Delete Product');
        }
    }

    public function updateStock(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'stock' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }

        try {
            $product = Product::findOrFail($request->id);
            $product->update(
                [
                    'stock' => $request->stock,
                ]
            );
            return $this->successResponse(new ProductResource($product), 'Stock Updated Successfully for'.$product->name);
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return $this->errorResponse($bug);
        }
    }
}
