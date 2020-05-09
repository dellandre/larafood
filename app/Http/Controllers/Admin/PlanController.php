<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Str;

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
    public function create()
    {
        return view('admin.pages.plans.create');
    }
    public function store( Request $request)
    {
        //dd($request->all());
        //return view('admin.pages.plans.store');
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);
        return redirect()->route('plans.index');

    }
    public function show($url)
    {
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan)
        return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }
}
