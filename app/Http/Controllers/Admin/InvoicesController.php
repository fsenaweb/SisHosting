<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = ['name' => 'Faturas', 'link' => 'invoices'];
        $result = Invoice::where('pay', '=', '0')
            ->join('domains', 'invoices.domain_id', '=', 'domains.id')
            ->join('clients', 'clients.id', '=', 'domains.client_id')
            ->select('invoices.id', 'invoices.domain_id', 'invoices.amount', 'invoices.date_payment', 'domains.domain as domain_name', 'clients.name', 'clients.id as client_id')
            ->orderBy('invoices.date_payment', 'ASC')
            ->paginate(20);
        return view('admin.invoices.index', compact('page', 'result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $page = ['name' => 'Faturas', 'link' => 'invoices'];

        $result = Invoice::
            join('domains', 'invoices.domain_id', '=', 'domains.id')
            ->select('invoices.id as invoice_id', 'invoices.*', 'domains.*')
            ->where('invoices.id', '=', $invoice->id)
            ->get()
        ->first();

        return view('admin.invoices.edit', compact('page', 'result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        if($request->pay_input == '1') {

            $selected = Invoice::findOrFail($invoice->id);
            $selectedDate = Carbon::parse($selected->date_payment);

            $addMonths  = 0;
            $addYear    = 0;

            switch ($selected->frequency) {
                case '1':
                    $addMonths = 1;
                    break;
                case '2':
                    $addMonths = 3;
                    break;
                case '3':
                    $addMonths = 6;
                    break;
                case '4':
                    $addYear = 1;
                    break;
                case '5':
                    $addYear = 2;
                    break;
                case '6':
                    $addYear = 3;
                    break;
            }

            if (($selectedDate->day >= 30) && ($selectedDate->month == 1)) {
                if ($addYear) {
                    $newDate = Carbon::create($selectedDate->year, $selectedDate->month, $selectedDate->day);
                    $newDate->addYear($addYear);
                } elseif ($addMonths === 1) {
                    $newDate = Carbon::create($selectedDate->year, 2, 28);
                } else {
                    $newDate = Carbon::create($selectedDate->year, 3, 30);
                    $newDate->addMonths($addMonths-2);
                }
            } elseif (($selectedDate->day >= 28) && ($selectedDate->month == 2)) {
                if ($addYear) {
                    $newDate = Carbon::create($selectedDate->year, $selectedDate->month, $selectedDate->day);
                    $newDate->addYear($addYear);
                } elseif ($addMonths === 1) {
                    $newDate = Carbon::create($selectedDate->year, 3, 30);
                } else {
                    $newDate = Carbon::create($selectedDate->year, 3, 30);
                    $newDate->addMonths($addMonths-1);
                }
            } else {
                if ($addYear) {
                    $newDate = $selectedDate->addYear($addYear);
                } else {
                    $newDate = $selectedDate->addMonths($addMonths);
                }
            }

            $result = Invoice::Create([
                'domain_id'         => $selected->domain_id,
                'type_payment'      => $selected->type_payment,
                'date_payment'      => $newDate,
                'date_pay'          => null,
                'amount'            => $selected->amount,
                'frequency'         => $selected->frequency,
                'day_invoice'       => $selected->day_invoice,
                'first_data_invoice'=> $selected->first_data_invoice,
                'first_amount_invoice'=> $selected->first_amount_invoice,
                'amount_invoice'    => $selected->amount_invoice,
                'pay'               => '0',
            ]);

            if($result) {
                $pay = Invoice::findOrFail($invoice->id)->update([
                    'pay'       => '1',
                    'date_pay'  => date('Y-m-d')
                ]);
                if ($pay) {
                    return redirect()->route('invoices.index')
                        ->with('success', 'Pagamento da fatura registrado com sucesso.')
                        ->with('invoice', 'Uma nova fatura foi registrada.');
                } else {
                    return redirect()->route('invoices.index')
                        ->with('error', 'Não foi possível realizar o fechamento da fatura');
                }
            }
        } else {

            Invoice::findOrFail($invoice->id)->update([
                'date_payment'  => $request->date_payment,
                'amount'        => Helper::formatNumber($request->amount, 'US')
            ]);
            return redirect()->route('invoices.index')
                ->with('success', 'Fatura alterada comoi sucesso');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        Invoice::findOrFail($invoice->id)->delete();
        return redirect()->route('invoices.index')
            ->with('success','Fatura removida com sucesso');
    }

}
