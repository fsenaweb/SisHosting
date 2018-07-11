<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Domain;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;

class DomainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = ['name' => 'Domínios', 'link' => 'domains'];
        $result = Domain::orderBy('domain','asc')->paginate(30);
        return view('admin.domains.index', compact('result', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page   = ['name' => 'Domínios', 'link' => 'domains'];
        $client = Client::orderBy('name', 'asc')->get();
        $plan   = Plan::orderBy('name', 'asc')->get();
        return view('admin.domains.create', compact('page', 'plan', 'client'));
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
        $request['first_amount_invoice'] = Helper::formatNumber($request['first_amount_invoice'], 'US');
        $request['amount_invoice'] = Helper::formatNumber($request['amount_invoice'], 'US');
        Domain::Create($request->all());
        return redirect()->route('domains.index')
            ->with("sucesso", "Dados cadastrados com sucesso");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }

    public function rules()
    {

        Request()->validate([
            'client_id'             => 'required',
            'domain'                => 'required|min:6|max:255',
            'plan_id'               => 'required',
            'payment'               => 'required',
            'frequency'             => 'required',
            'day_invoice'           => 'required',
            'first_data_invoice'    => 'required',
            'first_amount_invoice'  => 'required',
            'amount_invoice'        => 'required',
            'information'           => 'nullable'
        ],
            [
                'required'  => 'O campo :attribute é obrigatório',
                'max'       => 'O campo :attribute deve conter no máximo :max caracteres.',
                'min'       => 'O campo :attribute deve conter no mímino :min caracteres.',
                'alpha'     => 'O campo :attribute deve conter apenas letras.',
                'numeric'   => 'O campo :attribute deve conter apenas números.'
            ],
            $names = array(
                'client_id'             => 'CLIENTE',
                'domain'                => 'DOMÍNIO',
                'plan_id'               => 'PLANO',
                'payment'               => 'FORMA DE PAGAMENTO',
                'frequency'             => 'PERIODICIDADE',
                'day_invoice'           => 'DIA VENCIMENTO',
                'first_data_invoice'    => 'DATA DA PRIMEIRA FATURA',
                'first_amount_invoice'  => 'VALOR DA PRIMEIRA FATURA',
                'amount_invoice'        => 'VALOR DAS FATURAS',
                'information'           => 'OBSERVAÇÃO'
            )
        );
    }
}
