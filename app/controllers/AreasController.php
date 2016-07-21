<?php

class AreasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try {
			$model = Area::orderBy('created_at', 'DESC')->paginate(25);

			return View::make('areas.index', compact('model'));
		}
		catch (Exception $e) {
			return Redirect::back()->with('error_message', $e->getMessage());
		}
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('areas.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try {
			DB::beginTransaction();

			$model = Area::create(Input::all());

			DB::commit();

			return Redirect::route('areas.index')->with('success_message', 'Create Success');
		}
		catch (Exception $e) {
			return Redirect::back()->with('error_message', $e->getMessage())->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
			$model = Area::find($id);

			return View::make('areas.show', compact('model'));
		}
		catch (Exception $e) {
			return Redirect::back()->with('error_message', $e->getMessage());
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try {
			$model = Area::find($id);

			return View::make('areas.edit', compact('model'));
		}
		catch (Exception $e) {
			return Redirect::back()->with('error_message', $e->getMessage());
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try {
			DB::beginTransaction();

			$model = Area::find($id);
			$model->fill(Input::all());
			$model->save();

			DB::commit();

			return Redirect::route('areas.index')->with('success_message', 'Edit Success');
		}
		catch (Exception $e) {
			return Redirect::back()->with('error_message', $e->getMessage())->withInput();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try {
			DB::beginTransaction();

			Area::destroy($id);

			DB::commit();

			return Redirect::route('areas.index')->with('success_message', 'Delete Success');
		}
		catch (Exception $e) {
			return Redirect::back()->with('error_message', $e->getMessage())->withInput();
		}
	}


}
