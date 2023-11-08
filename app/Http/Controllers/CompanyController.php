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
        $companies = $this->companyRepository->page($_GET['pages'] ?? 1);
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newCompany = $request->validate([
            'name' => ['required'],
            'email' => ['email', 'nullable'],
            'logo' => ['string', 'nullable'],
            'website' => ['string', 'nullable']
        ]);

        $newCompanyId = $this->companyRepository->create($newCompany);

        if ($newCompanyId) {
            return Redirect()->route('company.show', [$newCompanyId])->with('created', true);
        } else {
            return back()->withInput()->withError();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = $this->companyRepository->read($id);
        return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = $this->companyRepository->read($id);
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatedCompany = $request->validate([
            'name' => ['required'],
            'email' => ['email', 'nullable'],
            'logo' => ['string', 'nullable'],
            'website' => ['string', 'nullable']
        ]);

        $status = $this->companyRepository->update($updatedCompany, $id);

        if ($status) {
            return Redirect()->back()->with('status', 'true');
        } else {
            return Redirect()->back()->withError();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->companyRepository->delete($id);
        return Redirect()->route('company.index')->with('deleted', true);
    }
}
