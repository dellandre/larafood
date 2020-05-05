<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }
    public function index()
    {
        // $plans = $this->repository->all();
        // $plans = $this->repository->paginate(1);
        $plans = $this->repository->latest()->paginate(1);
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }
}
