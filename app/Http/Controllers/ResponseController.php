<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = Response::all();
        if(request()->ajax())
        {
            return datatables()->of($responses)
            ->addColumn('action', function ($response) {
                return 
                '<a href="show/' . $response->id . '" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i> View</a>
                <a href="edit/' . $response->id . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                <a href="delete/' . $response->id . '" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>';
            })
            ->addColumn('image', function ($response) {
                $url= asset('uploads/'.$response->image);
                return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
            })
            ->rawColumns(['action','image'])
            ->editColumn('created_at', function($response) {
               return Carbon::parse($response->created_at)->format("d-m-Y");   
            })            
            ->addIndexColumn()
            ->make(true);
        }
        $responses = Response::all();
        return view('index', compact('responses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:responses,email',
            'mobile' => 'required',
            'talk_title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $response = new Response;
        $response->first_name = $request->first_name;
        $response->last_name = $request->last_name;
        $response->email = $request->email;
        $response->mobile = $request->mobile;
        $response->talk_title = $request->talk_title;
        $response->created_at = Carbon::now()->format('d-m-Y');
        
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $destinationPath = public_path('uploads'); // upload path
            $photo = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $photo);
            $response->image = $photo;
        }   
         
        $response->save();
    
        return redirect()->route('home');            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        return view('show', compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        return view('edit', compact('response')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('responses', 'email')->ignore($response->id),
            ],
            'mobile' => 'required',
            'talk_title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $response->first_name = $request->first_name;
        $response->last_name = $request->last_name;
        $response->email = $request->email;
        $response->mobile = $request->mobile;
        $response->talk_title = $request->talk_title;
        
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $destinationPath = public_path('uploads'); // upload path
            unlink($destinationPath . '/' . $response->image);
            $photo = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $photo);
            $response->image = $photo;
        }   
         
        $response->save();

        return redirect()->route('home');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        unlink(public_path('uploads/' . $response->image));
        $response->delete();
        return redirect()->route('home');  
    }
}
