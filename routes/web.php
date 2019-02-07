<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('categorias', function () {
    $cats = DB::table('categorias')->get();
    foreach ($cats as $c) {
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "<br>";
    }
    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome');
    foreach ($nomes as $nome) {
        echo "$nome <-Ultilizando pluck<br>";
    }
    echo "<hr>";

    $cats = DB::table('categorias')->where('id', 1)->get();
    foreach ($cats as $c) {
        echo "id: " . $c->id . "; ";
        echo "Nome:" . $c->nome . " <-Ultilizando get<br>";
    }
    echo "<hr>";

    $c = DB::table('categorias')->where('id', 1)->first();
    echo "id: " . $c->id . "; ";
    echo "Nome:" . $c->nome . "  <-Ultilizando first<br>";

    echo "<hr>";
    echo "Retorna um array ultilizando like<br><br>";

    $var = DB::table('categorias')->where('nome', 'like', '%p%')->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Senteças Logicas ultilizando orWhere<br><br>";
    $var = DB::table('categorias')->where('id', 1)->orWhere('id', 3)->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Intervalos Ultilizando whereBetween<br><br>";
    $var = DB::table('categorias')->whereBetween('id', [2, 4])->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Intervalos Ultilizando whereNotBetween<br><br>";
    $var = DB::table('categorias')->whereNotBetween('id', [2, 4])->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Intervalos Ultilizando whereIn<br><br>";
    $var = DB::table('categorias')->whereIn('id', [2, 4])->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Intervalos Ultilizando whereNotIn<br><br>";
    $var = DB::table('categorias')->whereNotIn('id', [2, 4])->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Senteças Logicas ultilizando array dentro do Where<br><br>";
    $var = DB::table('categorias')->where([
        ['id', 1],
        ['nome', 'Roupas']
    ])->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Ordenando por Nome comando SQL orderBy<br><br>";
    $var = DB::table('categorias')->orderBy('nome')->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Ordenando por Nome (decrescente) comando SQL orderBy<br><br>";
    $var = DB::table('categorias')->orderBy('nome', 'desc')->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Ordenando por ID comando SQL orderBy<br><br>";
    $var = DB::table('categorias')->orderBy('id')->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
    echo "<hr>";

    echo "Ordenando por ID (decrescente) comando SQL orderBy<br><br>";
    $var = DB::table('categorias')->orderBy('id', 'desc')->get();
    foreach ($var as $item) {
        echo "id: " . $item->id . "; ";
        echo "Nome: " . $item->nome . ". <br>";
    }
});

Route::get('novascategorias', function () {
    DB::table('categorias')->insert([
        ['nome' => 'Infomatica'],
        ['nome' => 'Cozinha'],
        ['nome' => 'Cama Mesa e Banho']
    ]);
    echo "REGISTRO INSERIDO COM SUCESSO USANDO insert";
});

Route::get('categoriasid', function () {
    $id = DB::table('categorias')->insertGetId(
        ['nome' => 'Carros']
    );
    echo "INSERINDO COM SUCESSO USANDO insertGetId<br>";
    echo "Novo ID:$id<br>";
});


Route::get('atualizandocategorias', function () {
    echo "ANTES DA ATUALIZAÇÃO<br>";
    $cat = DB::table('categorias')->where('id', 1)->first();
    echo "id: " . $cat->id . "; ";
    echo "Nome: " . $cat->nome . " <br>";
    echo "<hr>";
    DB::table('categorias')->where('id', 1)
        ->update(['nome' => 'Roupas Infantis']);
    $cats = DB::table('categorias')->where('id', 1)->first();
    echo "DEPOIS DA ATUALIZAÇÃO<br>";
    echo "id: " . $cats->id . "; ";
    echo "Nome: " . $cats->nome . " <br>";
});


Route::get('/removendocategorias', function () {
    echo "ANTES DA ATUALIZAÇÃO<br>";
    $cat = DB::table('categorias')->get();
    foreach ($cat as $c) {
        echo "id: " . $c->id . "; ";
        echo "Nome: " . $c->nome . " <br>";
    }

    echo "<hr>";

    //DB::table('categorias')->where('id', 1)->delete();
    DB::table('categorias')->whereNotIn('id', [3,4,5,6])->delete();


    $cats = DB::table('categorias')->get();
    echo "DEPOIS DA ATUALIZAÇÃO<br>";
    foreach ($cats as $c) {
        echo "id: " . $c->id . "; ";
        echo "Nome: " . $c->nome . " <br>";
    }
});








