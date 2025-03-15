<?php

namespace hdj\hdjimagem;

class HImagem
{
    public $imagemReal;
    public $caminho;

    public function __construct() {}

    public function receberImagem($imageInput): void
    {
        $this->imagemReal = $imageInput;
    }

    public function caminhoParaSalvar($texto): void
    {
        $this->caminho = $texto;
    }
    public  function extensaoImagem()
    {
        return $this->imagemReal->extension();
    }

    public  function nomeOriginal()
    {
        return $this->imagemReal->getClientOriginalName();
    }


    public function gerarImagemHash()
    {
        $imagemHash = hash('sha256', $this->nomeOriginal() . time()) . '.' . $this->extensaoImagem();
        $this->imagemReal->move(public_path($this->caminho), $imagemHash);
        return $imagemHash;
    }

    public function devolverCaminho($filename): void
    {
        $path = $this->caminho . $filename;
        return response()->file(public_path($path), [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
