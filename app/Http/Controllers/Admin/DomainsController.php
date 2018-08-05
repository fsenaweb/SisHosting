<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Domain;
use App\Models\Plan;
use App\Models\Invoice;
use Carbon\Carbon;
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

        if($request->checkpoint == '1') {
            $this->rulesCheck();
        }

        $this->rules();
        $request['first_amount_invoice'] = Helper::formatNumber($request['first_amount_invoice'], 'US');
        $request['amount_invoice'] = Helper::formatNumber($request['amount_invoice'], 'US');
        $domain = Domain::Create($request->all());
        if ($domain && $request->checkpoint == '1') {
            $first_invoice = Invoice::create([
                'domain_id'             => $domain->id,
                'type_payment'          => $request->type_payment,
                'date_payment'          => date('Y-m-d'),
                'date_pay'              => date('Y-m-d'),
                'amount'                => $request->first_amount_invoice,
                'frequency'             => $request->frequency,
                'day_invoice'           => $request->day_invoice,
                'first_data_invoice'    => $request->first_data_invoice,
                'first_amount_invoice'  => $request->first_amount_invoice,
                'amount_invoice'        => $request->amount_invoice,
                'pay'                   => '1'
            ]);
            $invoice = Invoice::create([
                'domain_id'             => $domain->id,
                'type_payment'          => $request->type_payment,
                'date_payment'          => $request->first_data_invoice,
                'amount'                => $request->amount_invoice,
                'frequency'             => $request->frequency,
                'day_invoice'           => $request->day_invoice,
                'first_data_invoice'    => $request->first_data_invoice,
                'first_amount_invoice'  => $request->first_amount_invoice,
                'amount_invoice'        => $request->amount_invoice,
                'pay'                   => '0'
            ]);

            if ($invoice && $first_invoice) {
                return redirect()->route('domains.index')
                    ->with("success", "Domínio e fatura cadastradas com sucesso");
            } else {
                return redirect()->route('domains.index')
                    ->with("error", "Erro ao realizar o cadastro 1");
            }
        } else {
            return redirect()->route('domains.index')
                ->with("success", "Domínio cadastrado com sucesso.");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        $page   = ['name' => 'Domínios', 'link' => 'domains'];
        $result = Domain::findOrFail($domain->id);
        $client = Client::orderBy('name', 'asc')->get();
        $plan   = Plan::orderBy('name', 'asc')->get();
        return view('admin.domains.edit', compact('page', 'result', 'client', 'plan'));
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
        $this->rulesUpdate($domain->id);
        Domain::findOrFail($domain->id)->update($request->all());
        return redirect()->route('domains.index')
            ->with('success','Dados alterados com sucesso!')
            ->with('invoice','Realize as alterações na fatura do domínio!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        Domain::findOrFail($domain->id)
            ->delete();
        return redirect()->route('domains.index')
            ->with('success','Dados excluídos com sucesso!');
    }

    public function rulesCheck()
    {
        Request()->validate([
            'type_payment'          => 'required',
            'frequency'             => 'required',
            'day_invoice'           => 'required',
            'first_data_invoice'    => 'required',
            'first_amount_invoice'  => 'required',
            'amount_invoice'        => 'required',
        ],
            [
                'required'  => 'O campo :attribute é obrigatório',
            ],
            $names = array(
                'type_payment'          => 'FORMA DE PAGAMENTO',
                'frequency'             => 'PERIODICIDADE',
                'day_invoice'           => 'DIA VENCIMENTO',
                'first_data_invoice'    => 'DATA DA PRIMEIRA FATURA',
                'first_amount_invoice'  => 'VALOR DA PRIMEIRA FATURA',
                'amount_invoice'        => 'VALOR DAS FATURAS',
            )
        );
    }

    public function rules()
    {

        Request()->validate([
            'client_id'             => 'required',
            'domain'                => 'required|min:6|max:255|unique:domains,domain',
            'plan_id'               => 'required',
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

    public function rulesUpdate($id)
    {

        Request()->validate([
            'client_id'             => 'required',
            'domain'                => 'required|min:6|max:255|unique:domains,domain,'.$id,
            'plan_id'               => 'required'
        ],
            [
                'required'  => 'O campo :attribute é obrigatório',
                'max'       => 'O campo :attribute deve conter no máximo :max caracteres.',
                'min'       => 'O campo :attribute deve conter no mímino :min caracteres.',
            ],
            $names = array(
                'client_id'             => 'CLIENTE',
                'domain'                => 'DOMÍNIO',
                'plan_id'               => 'PLANO'
            )
        );
    }
}
