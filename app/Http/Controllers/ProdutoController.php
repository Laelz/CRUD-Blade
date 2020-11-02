<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Aluno;
use App\Turma;
use App\User;
use Cyberduck\LaravelExcel\Contract\ImporterInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $produtos = $user->aluno->turma->produtos;
        return view('produto/index')->with(['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto/create');
    }

    public function import()
    {
        return view('produto/import');
    }

    public function importProdutos(Request $request)
    {
        $file = $request->file;
        // $csv = file_get_contents($file);

        $handle = fopen($file, "r");
        $row = [];
        $header = 0;
        $produtos = [];
        while ($line = fgetcsv($handle, 1000, "\r", "\n")) {
            if ($header++ == 0) {
                continue;
            }


            $linha = explode(";", $line[0]);


            $row = [
                'nome' => $linha[0],
                'preco' => $linha[1],
                'estoque' => $linha[2],
                'ano1' => $linha[3],
                'ano2' => $linha[4],
                'ano3' => $linha[5],
                'ano4' => $linha[6],
            ];
            array_push($produtos, $row);
        }

        foreach ($produtos as $produto) {
            $novoProduto = Produto::create([
                'nome' => $produto['nome'],
                'preco' => floatval(str_replace(',', '.', $produto['preco'])),
                'estoque' => $produto['estoque'],
            ]);

            if ($produto['ano1'] == 'x') {
                $novoProduto->turma()->attach(1);
            }
            if ($produto['ano2'] == 'x') {
                $novoProduto->turma()->attach(2);
            }
            if ($produto['ano3'] == 'x') {
                $novoProduto->turma()->attach(3);
            }
            if ($produto['ano4'] == 'x') {
                $novoProduto->turma()->attach(4);
            }
        }

        $allProdutos = Produto::all();
        return view('produto/index')->with(['produtos' => $allProdutos]);
        // // $rows = array_map('str_getcsv', explode(' ', $csv));
        // // $Data = str_getcsv($CsvString, "\n");
        // $data = fgetcsv($csv, 1000, "\n");

        // dd($data);
        // $data = array_map('str_getcsv', $file);

        // return $data;
        // if (count($data) > 0) {
        //     $header = [];
        //     foreach ($data[0] as $key => $value) {
        //         $header = $key;
        //     }
        // }

        // return $rows;
        // foreach ($rows as $row) {
        //     $row = array_combine($header, $row);

        // }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = Produto::create([
            'nome' => $request->nome,
            'preco' => floatval($request->preco),
            'estoque' => $request->estoque
        ]);
        $produto->save();

        $produtos = Produto::all();
        return view('produto/index')->with(['produtos' => $produtos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('produto/update')->with(['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect('/produtos')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect('/produtos')->with('success');
    }
}
