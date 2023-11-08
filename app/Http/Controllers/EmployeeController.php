<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepository, private CompanyRepository $companyRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeRepository->page($_GET['pages'] ?? 1);
        return view('employee.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companySelectInputs = $this->companyRepository->selectInput();
        return view('employee.new', ['companies' => $companySelectInputs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newEmployee = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['email', 'nullable'],
            'phone' => ['numeric', 'nullable'],
            'company_id' => ['numeric', 'nullable']
        ]);

        $newEmployeeId = $this->employeeRepository->create($newEmployee);

        if ($newEmployeeId) {
            return Redirect()->route('employee.show', [$newEmployeeId])->with('created', true);
        } else {
            return back()->withInput()->withError();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = $this->employeeRepository->read($id);
        return view('employee.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = $this->employeeRepository->read($id);

        $companySelectInputs = $this->companyRepository->selectInput();

        return view('employee.edit', ['employee' => $employee, 'companies' => $companySelectInputs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatedEmployee = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['email', 'nullable'],
            'phone' => ['numeric', 'nullable'],
            'company_id' => ['numeric', 'nullable']
        ]);

        $status = $this->employeeRepository->update($updatedEmployee, $id);

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
        $this->employeeRepository->delete($id);
        return Redirect()->route('employee.index')->with('deleted', true);
    }
}
