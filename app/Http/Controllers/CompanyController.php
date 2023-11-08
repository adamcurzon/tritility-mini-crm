<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyRepository $companyRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyRepository->page(1);
        return view('company.index', ['companies' => $companies]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = $this->companyRepository->read($id);
        $employees = $this->companyRepository->getEmployees($id);
        return view('company.show', ['company' => $company, 'employees' => $employees]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
