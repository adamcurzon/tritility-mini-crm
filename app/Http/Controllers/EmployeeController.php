<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeRepository->page(1);
        return view('employee.index', ['employees' => $employees]);
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
        $employee = $this->employeeRepository->read($id);
        return view('employee.show', ['employee' => $employee]);
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
