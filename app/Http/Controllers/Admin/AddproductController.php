<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addproduct;
use App\Http\Requests\AddProductRequest;
use Session;

class AddproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$product = addproduct::with(['admin'])->paginate(5);
    	return view('admin.products.index',compact(['product']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $AdModel = new addproduct($request->all());

			#image upload
	        $destinationPath = 'uploads/product_logo';
	        $file = $request->file('p_logo');
	        $file->getClientOriginalName();
	        // echo microtime();

	        $targetFileName = date('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
	        $file->move($destinationPath,$targetFileName);
	        $AdModel->p_logo=$targetFileName;
			#end of image upload

        $AdModel->admin_id = \Auth::user()->id;
     	$AdModel->save();

         return redirect('/admin/addproduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deactivate = addproduct::findOrFail($id);
        if ($deactivate->is_deleted == "no") {
            $deactivate->is_deleted = "yas";
            $deactivate->update();
        }
        else
        {
            $deactivate->is_deleted = "no";
            $deactivate->update();
        }
        return redirect('/admin/addproduct');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $add = addproduct::findOrFail($id);        
        return view('admin.products.edit', compact(['add']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, AddProductRequest $request)
    {
        
        $requestData = $request->all();
        var_dump($requestData);
        $add = addproduct::findOrFail($id);
        #image upload
            $destinationPath = 'uploads/product_logo';
            $file = $request->file('p_logo');
            $file->getClientOriginalName();
            // echo microtime();

            $targetFileName = date('YmdHis'.substr((string)microtime(), 1, 8)).'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$targetFileName);
            $requestData['p_logo']=$targetFileName;
            #end of image upload
        
        $add->update($requestData);

        Session::flash('success', 'product updated!');

        return redirect('/admin/addproduct');
    }
}
