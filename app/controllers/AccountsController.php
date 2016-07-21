<?php

class AccountsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try {
			$model = Account::orderBy('created_at', 'DESC')->paginate(25);

			return View::make('accounts.index', compact('model'));
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
		return View::make('accounts.create');
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

			$model = Account::create(Input::all());

			DB::commit();

			return Redirect::route('accounts.index')->with('success_message', 'Create Success');
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
			$model = Account::find($id);

			return View::make('accounts.show', compact('model'));
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
			$model = Account::find($id);

			return View::make('accounts.edit', compact('model'));
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

			$model = Account::find($id);
			$model->fill(Input::all());
			$model->save();

			DB::commit();

			return Redirect::route('accounts.index')->with('success_message', 'Edit Success');
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

			Account::destroy($id);

			DB::commit();

			return Redirect::route('accounts.index')->with('success_message', 'Delete Success');
		}
		catch (Exception $e) {
			return Redirect::back()->with('error_message', $e->getMessage())->withInput();
		}
	}


}
