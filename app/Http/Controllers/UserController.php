<?php

namespace App\Http\Controllers;

use App\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Order;

class UserController extends Controller
{

    public function login()     // LOGIN VIEW
    {
        $user = User::get_user();
        $count = Order::get_count();

        if (Auth::check()) {
            return redirect('/')->with('count', $count)->with('user', $user);
        } else {
            return view('users.login');
        }
    }

    public function register()  // CADASTRO VIEW
    {
        $user = User::get_user();
        $count = Order::get_count();

        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('users.register')->with('count', $count)->with('user', $user);
        }
    }


    public function validation_register(Request $request)   // VALIDAÇÃO DE CADASTRO
    {
        $validation = $this->validation($request->all());

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput($request->all());
        }

        $query = DB::table('users')->select('*')->where('user', '=', $request->input('user'))->count();
        if ($query == 0) {
            $data = [
                'name' => $request->input('name'),
                'user' => $request->input('user'),
                'email' => $request->input('email'),
                'telefone' => $request->input('cellphone'),
                'cpf' => $request->input('cpf'),
                'nivel' => '2',
                'password' => hash::make($request->input('password')),
            ];

            User::create($data);


            session::flash('success', 'Cadastrado com sucesso');
            return redirect()->back();
        } else {
            session::flash('error', 'Esse usuário já está cadastrado');
            return redirect()->back();
        }
    }

    public function validation_login(Request $request)  // VALIDAÇÃO DE LOGIN
    {
        $credentials = array(
            'user' => $request->input('user'),
            'password' => $request->input('password'),
        );

        if (Auth::attempt($credentials)) {
            $data_login = date('H:i:s');
            session()->put('name', 'matheus');
            session()->put('data_login', $data_login);


            return redirect('/');
        } else {
            Session::flash('error', 'Usuário ou senha incorretos');
            return redirect()->back();
        }
    }

    public function get_orders()    // FUNÇÃO ONDE O USUÁRIO VÊ OS SEUS PEDIDOS
    {
        $user = User::get_user();
        $count = Order::get_count();
        $query = User::get_orders();

        return view('users.orders')->with('query', $query)->with('count', $count)->with('user', $user);
    }

    public function account()   // FUNÇÃO QUE MOSTRA AS INFOS DA CONTA DO USUÁRIO LOGADO E AS OPÇÕES PARA EDITAR
    {
        $user = User::get_user();
        $count = Order::get_count();

        return view('users.account')->with('count', $count)->with('user', $user);
    }

    public function edit_name_val(Request $request)    // VALIDAÇÃO EDIT NAME
    {
        $validation1 = $this->validation1($request->all());

        if ($validation1->fails()) {
            return redirect()->back()->withErrors($validation1->errors())->withInput($request->all());
        }

        if (!Hash::check($request->inputPass, Auth::user()->password)) {
            session::flash('error', 'Senha atual incorreta');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update(['name' => $request->inputName]);

            session::flash('success', 'nome editado com sucesso');
            return redirect()->back();
        }
    }

    public function edit_email_val(Request $request)    // VALIDAÇÃO EDIT EMAIL
    {
        $validation2 = $this->validation2($request->all());

        if ($validation2->fails()) {
            return redirect()->back()->withErrors($validation2->errors())->withInput($request->all());
        }

        if (!Hash::check($request->inputPass, Auth::user()->password)) {
            session::flash('error', 'Senha atual incorreta');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update(['email' => $request->inputEmail]);

            session::flash('success', 'Email editado com sucesso');
            return redirect()->back();
        }
    }

    public function edit_phone_val(Request $request)    // VALIDAÇÃO EDIT PHONE
    {
        $validation3 = $this->validation3($request->all());

        if ($validation3->fails()) {
            return redirect()->back()->withErrors($validation3->errors())->withInput($request->all());
        }

        if (!Hash::check($request->inputPass, Auth::user()->password)) {
            session::flash('error', 'Senha atual incorreta');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update(['telefone' => $request->inputPhone]);

            session::flash('success', 'Telefone editado com sucesso');
            return redirect()->back();
        }
    }

    public function edit_pass_val(Request $request) // VALIDAÇÃO EDIT SENHA
    {
        $validation4 = $this->validation4($request->all());

        if ($validation4->fails()) {
            return redirect()->back()->withErrors($validation4->errors())->withInput($request->all());
        }

        if (!Hash::check($request->inputPass, Auth::user()->password)) {
            session::flash('error', 'Senha atual incorreta');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update(['password' => hash::make($request->inputNewPass)]);


            session::flash('success', 'Senha editada com sucesso');
            return redirect()->back();
        }
    }

    public function edit_user_val(Request $request)    // VALIDAÇÃO EDIT USUÁRIO
    {
        $validation5 = $this->validation5($request->all());

        if ($validation5->fails()) {
            return redirect()->back()->withErrors($validation5->errors())->withInput($request->all());
        }

        if (!Hash::check($request->inputPass, Auth::user()->password)) {
            session::flash('error', 'Senha atual incorreta');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update(['user' => $request->inputUser]);

            session::flash('success', 'Usuário editado com sucesso');
            return redirect()->back();
        }
    }

    /* ÁREA DO ADMIN */

    public function get_users()     // RETORNA OS USUÁRIOS CADASTRADOS
    {
        if (Auth::user()->nivel == 1) {
            $count = User::count_orders();
            $query = User::get_users();

            return view('users.users')->with('query', $query)->with('count', $count);
        } else {
            return redirect('/');
        }
    }

    public function get_admins()    // RETORNA OS ADMINS CADASTRADOS
    {
        if (Auth::user()->nivel == 1) {
            $count = User::count_orders();
            $query = User::get_admins();

            return view('users.admins')->with('query', $query)->with('count', $count);
        } else {
            return redirect('/');
        }
    }

    public function delete_user($id)        // DELETA UM USUÁRIO
    {
        if (Auth::user()->nivel == 1) {
            User::delete_user($id);

            return redirect()->back();
        } else {
            return redirect('/');
        }
    }

    public function admin_edit_nivel(Request $request)      // EDITA O "NÍVEL" DE UM USUÁRIO PARA ADMIN
    {
        if (!Hash::check($request->inputPass, Auth::user()->password)) {
            session::flash('error', 'Senha atual incorreta');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', '=', $request->id)
                ->update(['nivel' => $request->nivelUser]);

            session::flash('success', 'Usuário editado com sucesso');
            return redirect()->back();
        }
    }

    public function admin_edit_nivel_admin(Request $request)    // EDITAR O "NÍVEL" DO ADMIN PARA USUÁRIO COMUM
    {
        if (!Hash::check($request->inputPass, Auth::user()->password)) {
            session::flash('error', 'Senha atual incorreta');
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', '=', $request->id)
                ->update(['nivel' => $request->nivelUser]);

            session::flash('success', 'Usuário editado com sucesso');
            return redirect()->back();
        }
    }


    //LOGOUT
    public function logout()    // FUNÇÃO PARA DESLOGAR
    {
        $count = Order::get_count();

        Auth::logout();
        return redirect('/login');
    }


    private function validation($data)
    {
        $regras = [
            'name' => 'required',
            'user' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'cellphone' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];

        $mensagens = [
            'name.required' => 'Preencha o campo nome',
            'user.required' => 'Preencha o campo usuário',
            'cpf.required' => 'Preencha o campo CPF',
            'cellphone.required' => 'Preencha o campo contato',
            'email.required' => 'Preencha o campo email',
            'password.required' => 'Preencha o campo senha',
            'password.min' => 'A senha precisa ter no mínimo 6 caracteres',
            'confirm_password.required' => 'Preencha o campo confirmar senha',
            'confirm_password.same' => 'Senhas não coincidem'

        ];

        return Validator::make($data, $regras, $mensagens);
    }

    private function validation1($data)
    {
        $regras = [
            'inputName' => 'required',
            'inputPass' => 'required',
        ];

        $mensagens = [
            'inputName.required' => 'Digite um nome',
            'inputPass.required' => 'Digite a senha atual',
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    private function validation2($data)
    {
        $regras = [
            'inputEmail' => 'required',
            'inputPass' => 'required',
        ];

        $mensagens = [
            'inputEmail.required' => 'Digite um email',
            'inputPass.required' => 'Digite a senha atual',
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    private function validation3($data)
    {
        $regras = [
            'inputPass' => 'required',
            'inputPhone' => 'required',
        ];

        $mensagens = [
            'inputPhone.required' => 'Digite um telefone para contato',
            'inputPass.required' => 'Digite a senha atual',
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    private function validation4($data)
    {
        $regras = [
            'inputPass' => 'required',
            'inputNewPass' => 'required',
            'inputConPass' => 'required|same:inputNewPass',
        ];

        $mensagens = [
            'inputPass.required' => 'Digite a senha atual',
            'inputNewPass.required' => 'Digite uma nova senha',
            'inputConPass.required' => 'Confirme a nova senha',
            'inputConPass.same' => 'Novas senhas não coincidem',
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    private function validation5($data)
    {
        $regras = [
            'inputPass' => 'required',
            'inputUser' => 'required',
        ];

        $mensagens = [
            'inputUser.required' => 'Digite um usuário',
            'inputPass.required' => 'Digite a senha atual',
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
