<?php namespace App\Http\Controllers;

use App\Advertisement;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Auth;
use Input;
use Session;
use DB;
use App\Property;
use App\Image;
use App\Address;
use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model;

class AdvertisementsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
            $user = Auth::user();
            $ads = DB::table('advertisements')
                ->join('properties', 'advertisements.property_id', '=', 'properties.id')
                ->join('addresses', 'address_id', '=', 'properties.id')
                ->where('advertisements.user_id', '=', $user->id)
                ->get();

            foreach($ads as $ad){
                $propimg[$ad->id] = DB::table('prop_images')
                    ->where('property_id','=',$ad->id)
                    ->get();
            }

            return view('advertisements.index', compact('ads','user','propimg'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $user = Auth::user();
        return view('properties.create',compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $user = Auth::user();
        $input = Input::all();

        $validator = Validator::make($input,
            [
                'bedrooms'      =>  'required',
                'suiterooms'    =>  'required',
                'kitchens'      =>  'required',
                'bathrooms'     =>  'required',
                'pools'         =>  'required',
                'type'          =>  'required',
                'land_area'     =>  'required',
                'built_area'    =>  'required',
                'price'         =>  'required',
                'street'        =>  'required',
                'number'        =>  'required',
                'neighborhood'  =>  'required',
                'city'          =>  'required',
                'state'         =>  'required',
                'country'       =>  'required',
                'type_ad'       =>  'required',
            ],
            [
                'required'  => 'The :attribute is really important.'
            ]);

        if($validator->fails()){
            $error = $validator->messages();
            return Redirect::to('advertisements/new')->withErrors($validator)->withInput(Input::all());
        }else{
            DB::beginTransaction();
            try{
                //Inserting property
                $data =
                    [
                        'type'      => Input::get('type'),
                        'bedrooms'  => Input::get('bedrooms'),
                        'kitchens'  => Input::get('kitchens'),
                        'bathrooms' => Input::get('bathrooms'),
                        'suiterooms'=> Input::get('suiterooms'),
                        'pools'     => Input::get('pools'),
                        'land_area' => Input::get('land_area'),
                        'built_area' => Input::get('built_area'),
                        'remark'    => Input::get('remark'),
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                $prop_id = DB::table('properties')->insertGetId($data);
                //Inserting address of prioerty
                $data = null;
                $data = [
                    'address_id'    => $prop_id,
                    'street'  => Input::get('street'),
                    'adjunct' => Input::get('adjunct'),
                    'number'  => Input::get('number'),
                    'zipcode' => Input::get('zipcode'),
                    'neighborhood' => Input::get('neighborhood'),
                    'city'      => Input::get('city'),
                    'state'     => Input::get('state'),
                    'country'   => Input::get('country'),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                DB::table('addresses')->insert($data);

                //Inserting advertisement of property
                $data = null;

                $ad_code = Input::get('type')[0].Input::get('type')[1].$prop_id;
                $data = [
                    'property_id'   => $prop_id,
                    'user_id'       => $user->id,
                    'type_ad'       => Input::get('type_ad'),
                    'ad_code'       => strtoupper($ad_code),
                    'price'         => Input::get('price'),
                    'created_at'    => date('Y-m-d H:i:s'),
                ];
                DB::table('advertisements')->insert($data);

                $files = Input::file('images');
                $i = 0;
                foreach($files as $file){
                    $data = null;
                    $rules = ['file'=>'required'];
                    $fileValidator =  Validator::make(['file'=>$file],$rules);
                    if($fileValidator->passes()){
                        $destinationPath = 'img/properties_images/';
                        $fileName = $prop_id.'_'.$i.'.'.$file->getClientOriginalExtension();
                        $up_success = $file->move($destinationPath,$fileName);
                        $data = [
                            'property_id' => $prop_id,
                            'path'        => $destinationPath.$fileName,
                        ];
                        DB::table('prop_images')->insert($data);
                    }else{
                        $error = $fileValidator->messages();
                        DB::rollback();
                        return Redirect::to('advertisements/new')->withErrors($fileValidator)->withInput(Input::all());
                    }
                    $i++;
                }
                DB::commit();
                Session::flash('success','Advertisement '.$prop_id.' created!');
                return Redirect::to('advertisements/new');
            }catch(\Exception $ex){
                DB::rollback();
                Session::flash('error',$ex->getMessage());
                return Redirect::to('advertisements/new')->withInput(Input::all());
            }
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($ad_code)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
