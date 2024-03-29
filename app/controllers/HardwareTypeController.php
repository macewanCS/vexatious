<?php

class HardwareTypeController extends \BaseController {
	protected $fields = ['name', 'description'];
	
    public function __construct()
    {
        $this->beforeFilter('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$types = HardwareType::all();
		$response = array(
			'status' => 0,
			'types' =>  $types
		);
		
		return Response::json($response['types']);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//if (!Auth::user()->isAdmin()) return Redirect::back();
		
		$input = Input::all();
		$type = new HardwareType;
		$type->fill($input);
		$type->save();
		
		return Redirect::back();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$type = HardwareType::find($id);
		return Response::json($type);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (!Auth::user()->isAdmin()) return Redirect::back();
		return Response::json(["msg" => "Make Hardware Type Edit page!"]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (!Auth::user()->isAdmin()) return Redirect::back();
		
		$type = HardwareType::find($id);
		$response = ["status" => "1"];
		
		if ($type) {
			$input = array_filter(Input::only('name', 'description'));
			$type->fill($input);
			$type->save();
		
			$response = [
				"status" => 0,
				"msg" => "Successfully Updated type ".$type->name
			];
		}
		
		return Response::json($type);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (!Auth::user()->isAdmin()) return Redirect::back();
		
		$type = HardwareType::find($id);
		if ($type) $type->delete();
	}


}
