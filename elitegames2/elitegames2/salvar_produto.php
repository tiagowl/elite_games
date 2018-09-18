<?php
include_once 'model/clsCategoria.php';
include_once 'model/clsProduto.php';
include_once 'model/clsPlataforma.php';

function salvarFoto() {
    if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {

        $nome_arquivo = date("YmdHis") . '_' . basename($_FILES['foto']['name']);

        $diretorio = "fotos/";

        $arquivo = $diretorio . $nome_arquivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $arquivo)) {

            return $nome_arquivo;
        } else {
            return "sem_foto.png";
        }
    } else {
        return "sem_foto.png";
    }
}

if (isset($_REQUEST['inserir'])) {
    $pro = new Produto();
    $pro->nome = $_POST['nome'];

    $preco = str_replace(",", ".", $_POST['preco']);
    $pro->preco = $preco;

    $qtd = str_replace(",", ".", $_POST['quantidade']);
    $pro->quantidade = $qtd;

    $pla = new Plataforma();
    $pla->id = $_POST['plataforma'];

    $pro->plataforma = $pla;

    $cat = new Categoria();
    $cat->id = $_POST['categoria'];

    $pro->categoria = $cat;

    $pro->foto = salvarFoto();

    $pro->inserir();
}

if (isset($_REQUEST['excluir'])) {

    $pro = new Produto();
    $pro->id = $_REQUEST['id'];

    $foto = $pro->getNomeFoto();

    if ($foto != "" && $foto != "sem_foto.png") {
        $arquivo = "fotos/" . $foto;

        if (unlink($arquivo))
            $pro->excluir();
    }else {
        $pro->excluir();
    }
}

if (isset($_REQUEST['editar'])) {
    $pro = new Produto();
    $pro->id = $_REQUEST['id'];
    $pro->nome = $_POST['nome'];
    $pro->preco = str_replace(",", ".", $_POST['preco']);
    $pro->quantidade = str_replace(",", ".", $_POST['quantidade']);

    $perecivel = 0;
    if (isset($_REQUEST['perecivel'])) {
        $perecivel = 1;
    }
    $pro->perecivel = $perecivel;
    
    $pla = new Plataforma();
    $pla->id = $_POST['plataforma'];
    $pro->plataforma = $pla;

    $cat = new Categoria();
    $cat->id = $_POST['categoria'];
    $pro->categoria = $cat;

    $foto = $pro->getNomeFoto();

    if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {

        if ($foto != "" && $foto != "sem_foto.png") {
            $arquivo = "fotos/" . $foto;

            unlink($arquivo);
        }

        $pro->foto = salvarFoto();
    } else {
        $pro->foto = $foto;
    }

    $pro->editar();
}

header("Location: produtos.php");
?>
<!--<a href="produtos.php">Listar Produtos</a>-->