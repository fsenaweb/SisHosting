<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $page = ['name' => 'Clientes', 'link' => 'clients'];
            $result = Client::orderBy('created_at','desc')->paginate(30);
            return view('admin.clients.index', compact('result', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = ['name' => 'Clientes', 'link' => 'clients'];
        return view('admin.clients.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->rules(null);
        $request['password'] = bcrypt('123456');
        Client::Create($request->all());
        return redirect()->route('clients.index')
            ->with("sucesso", "Dados cadastrados com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = ['name' => 'Clientes', 'link' => 'clients'];
        $result = Client::findOrFail($id);
        return view('admin.clients.show', compact('result', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = ['name' => 'Clientes', 'link' => 'clients'];
        $result = Client::findOrFail($id);
        return view('admin.clients.edit', compact('result', 'page'));
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
        Client::findOrFail($id)->update($request->all());
        return redirect()->route('clients.index')
            ->with('sucesso','Dados alterados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return redirect()->route('clients.index')
            ->with('sucesso','Cliente excluído com sucesso');
    }

    public function rules()
    {

        Request()->validate([
            'name' 		    => 'required|min:6|max:255',
            'email'         => 'required|email|unique:clients,email',
            'email_second'  => 'email|nullable',
            'phone'         => 'required',
            'type'          => 'required',
            'cpf_cnpj'      => 'required|unique:clients',
            'company_name'  => 'min:6|max:255|nullable',
            'address'       => 'required|min:6|max:255',
            'number'        => 'numeric',
            'complement'    => 'min:3|max:255',
            'district'      => 'min:3|max:255',
            'postal_code'   => 'required|min:6|max:255',
            'city'          => 'required|max:255',
            'state'         => 'required|alpha|max:2',
            'type_register' => 'required'
        ],
        [
            'required'  => 'O campo :attribute é obrigatório',
            'max'       => 'O campo :attribute deve conter no máximo :max caracteres.',
            'min'       => 'O campo :attribute deve conter no mímino :min caracteres.',
            'alpha'     => 'O campo :attribute deve conter apenas letras.',
            'numeric'   => 'O campo :attribute deve conter apenas números.'
        ],
            $names = array(
                'name' 		    => 'NOME',
                'email'         => 'E-MAIL PRINCIPAL',
                'email_second'  => 'E-MAIL SECUNDÁRIO',
                'phone'         => 'TELEFONE',
                'type'          => 'TIPO PESSOA',
                'cpf_cnpj'      => 'CPF/CNPJ',
                'company_name'  => 'RAZÃO SOCIAL',
                'address'       => 'ENDEREÇO',
                'number'        => 'NÚMERO',
                'complement'    => 'COMPLEMENTO',
                'district'      => 'BAIRRO',
                'postal_code'   => 'CEP',
                'city'          => 'CIDADE',
                'state'         => 'ESTADO',
                'type_register' => 'TIPO CADASTRO',
                'information'   => 'OBSERVAÇÃO'
            )
        );
    }

    public function rulesUpdate($id)
    {

        Request()->validate([
            'name' 		    => 'required|min:6|max:255',
            'email'         => 'required|email|unique:clients,email,'.$id,
            'email_second'  => 'email|nullable',
            'phone'         => 'required',
            'type'          => 'required',
            'cpf_cnpj'      => 'required|unique:clients,cpf_cnpj,'.$id,
            'company_name'  => 'min:6|max:255|nullable',
            'address'       => 'required|min:6|max:255',
            'number'        => 'numeric',
            'complement'    => 'min:3|max:255',
            'district'      => 'min:3|max:255',
            'postal_code'   => 'required|min:6|max:255',
            'city'          => 'required|max:255',
            'state'         => 'required|alpha|max:2',
            'type_register' => 'required'
        ],
        [
            'required'  => 'O campo :attribute é obrigatório',
            'max'       => 'O campo :attribute deve conter no máximo :max caracteres.',
            'min'       => 'O campo :attribute deve conter no mímino :min caracteres.',
            'alpha'     => 'O campo :attribute deve conter apenas letras.',
            'numeriv'   => 'O campo :attribute deve conter apenas números.'
        ],
            $names = array(
                'name' 		    => 'NOME',
                'email'         => 'E-MAIL PRINCIPAL',
                'email_second'  => 'E-MAIL SECUNDÁRIO',
                'phone'         => 'TELEFONE',
                'type'          => 'TIPO PESSOA',
                'cpf_cnpj'      => 'CPF/CNPJ',
                'company_name'  => 'RAZÃO SOCIAL',
                'address'       => 'ENDEREÇO',
                'number'        => 'NÚMERO',
                'complement'    => 'COMPLEMENTO',
                'district'      => 'BAIRRO',
                'postal_code'   => 'CEP',
                'city'          => 'CIDADE',
                'state'         => 'ESTADO',
                'type_register' => 'TIPO CADASTRO',
                'information'   => 'OBSERVAÇÃO'
            )
        );
    }
}
