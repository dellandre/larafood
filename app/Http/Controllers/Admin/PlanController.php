<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreU;
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
    public function create()
    {
        return view('admin.pages.plans.create');
    }
    public function store(StoreU $request)
    {
        //dd($request->all());
        //return view('admin.pages.plans.store');
        // $data['url'] = Str::kebab($request->name);
        $this->repository->create($request->all());
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
    public function destroy($url)
    {
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan)
        return redirect()->back();
        $plan->delete();
        return redirect()->route('plans.index');
    }
    public function search(Request $request)

    {
        //$filters = $request->all();
        $filters = $request->except('_token');
        $plans= $this->repository->search($request->filter);
        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);

        //dd($request->all());
    }
    public function edit($url)
    {
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan)
        return redirect()->back();
        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreU $request, $url)
    {
        $plan = $this->repository->where('url',$url)->first();

        if(!$plan)
        return redirect()->back();
        $plan->update($request->all());
        return redirect()->route('plans.index');

    }

}
