<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChirpRequest;
use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use illuminate\View\View;

class ChirpController extends Controller
{
	// 1ページ当たりのChirpsの個数
	const CHIRPS_NUM_PER_PAGE = 3;

	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		return view('chirps.index', [
			'chirps' => Chirp::with('user')->latest()->paginate(self::CHIRPS_NUM_PER_PAGE),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ChirpRequest $request): RedirectResponse
	{
		$validated = $request->validated();	

		$request->user()->chirps()->create($validated);

		return redirect(route('chirps.index'));
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Chirp $chirp)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Chirp $chirp): View
	{
		$this->authorize('update', $chirp);

		return view('chirps.edit', [
			'chirp' => $chirp,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(ChirpRequest $request, Chirp $chirp): RedirectResponse
	{
		$this->authorize('update', $chirp);

		$validated = $request->validated();

		$chirp->update($validated);

		return redirect(route('chirps.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Chirp $chirp): RedirectResponse
	{
		$this->authorize('delete', $chirp);

		$chirp->delete();

		return redirect(route('chirps.index'));
	}
}
