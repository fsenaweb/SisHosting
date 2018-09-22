<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlansController extends Controller
{

    public function __construct()
    {
        $page = ['name' => 'Configurações', 'link' => 'configs'];
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = $this->page;
        $result = Plan::paginate(20);
        return view('admin.plans.index', compact('page', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = $this->page;
        return view('admin.plans.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->rules();
        $request['amount'] = Helper::formatNumber($request['amount'], 'US');
        $result = Plan::create($request->all());

        if ($result) {
            return redirect()->route('plans.index')
                ->with("success", "Plano cadastrado com sucesso");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->page;
        $result = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('page', 'result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->rulesUpdate($id);
        $request['amount'] = Helper::formatNumber($request['amount'], 'US');
        $result = Plan::findOrFail($id)->update($request->all());

        if ($result) {
            return redirect()->route('plans.index')
                ->with("success", "Plano alterado com sucesso");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Plan::findOrFail($id)->delete();

        if ($result) {
            return redirect()->route('plans.index')
                ->with("success", "Plano excluído com sucesso");
        }
    }

    public function rules()
    {

        Request()->validate([
            'name'             => 'required|min:6|max:255|unique:plans,name',
            'space'            => 'required',
            'transfer'         => 'required',
            'amount'           => 'required'
        ],
            [
                'required'  => 'O campo :attribute é obrigatório',
                'max'       => 'O campo :attribute deve conter no máximo :max caracteres.',
                'min'       => 'O campo :attribute deve conter no mímino :min caracteres.',
            ],
            $names = array(
                'name'             => 'NOME',
                'space'            => 'ESPAÇO',
                'transfer'         => 'TX. DE TRANSFERÊNCIA',
                'amount'           => 'VALOR',
            )
        );
    }

    public function rulesUpdate($id)
    {

        Request()->validate([
            'name'             => 'required|min:6|max:255|unique:plans,name,'.$id,
            'space'            => 'required',
            'transfer'         => 'required',
            'amount'           => 'required'
        ],
            [
                'required'  => 'O campo :attribute é obrigatório',
                'max'       => 'O campo :attribute deve conter no máximo :max caracteres.',
                'min'       => 'O campo :attribute deve conter no mímino :min caracteres.',
            ],
            $names = array(
                'name'             => 'NOME',
                'space'            => 'ESPAÇO',
                'transfer'         => 'TX. DE TRANSFERÊNCIA',
                'amount'           => 'VALOR',
            )
        );
    }
}
