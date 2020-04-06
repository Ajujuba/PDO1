<?php

require_once 'classes/config.php';

spl_autoload_register('carregarClasse');

function carregarClasse($nomeClasse) // valor recebido = nome da classe que está sendo instanciada
{
    if (file_exists('classes/' . $nomeClasse . '.php')) {
        require_once 'classes/' .$nomeClasse . '.php';
    }
}