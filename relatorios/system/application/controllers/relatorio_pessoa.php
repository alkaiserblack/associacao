<?php

class relatorio_pessoa extends Controller {

    var $totalPessoas;

    function __construct() {
        parent::Controller();
        $this->load->model('dbpessoa');
        $this->totalPessoas = $this->dbpessoa->countAll();
        $this->totalFamilias = $this->dbpessoa->countAllFamilias();
        //$this->output->enable_profiler(TRUE);
    }

    function index() {
        $config['totalP'] = $this->totalPessoas;
        $config['totalF'] = $this->totalFamilias;
        $config['countFields'] = array(
            'Percentual de pessoas por sexo' => array('Sexo', 'genero', false, false),
            'Percentual de pessoas por Estado Civil' => array('Estado Civil', 'estadoCivil', false, false),
            'Percentual de pessoas que tem RG' => array('RG', 'tem_rg', false, false),
            'Percentual de pessoas que tem CLT' => array('CLT', 'tem_clt', false, false),
            'Percentual de pessoas por Nacionalidade' => array('Nacionalidade', 'nacionalidade', false, false),
            'Percentual de pessoas por Estado onde nasceu' => array('Estado', 'EstadoOndeNasceu', false, false),
            'Percentual de pessoas que estudam' => array('Estuda?', 'estuda', false, false),
            'Percentual de pessoas alfabetizadas' => array(' ', 'nivelDeEscolaridade', false, false),
            'Percentual de pessoas por  escolaridade' => array('Nível', 'nivelDeEscolaridade', 'getEscolaridade', false),
            'Percentual de pessoas que exercem função pública' => array('Exerce?', 'funcaoPublica', false, false),
            'Percentual de pessoas por situação funcional' => array('Situação', 'situacaoFuncional', false, "funcaoPublica = 'sim'"),
            'Percentual de pessoas que são comerciantes' => array('Comerciante?', 'comerciante', false, false),
            'Percentual de pessoas que possuem antecedentes criminais' => array('Antecedentes?', 'antecedentesCriminais', false, false),
            'Percentual de pessoas aposentadas por invalidez' => array('Aposentados', 'aposentadoPorInvalidez', false, false),
            'Percentual de pessoas Ex-PNRA' => array('Ex-PNRA', 'ex_pnra', false, false),
            'Percentual de pessoas com problemas de alcoolismo' => array('Alcoolismo', 'alcoolismo', false, false),
            'Percentual de pessoas fumantes' => array('Fumante?', 'fumante', false, false),
            'Percentual de pessoas que possuem algum outro vício' => array('Possue', 'temVicio', false, false),
            'Percentual de pessoas que participam das reuniões da comunidade' => array('Participa', 'participaReunioesComunidade', false, false),
            'Percentual de pessoas que participam das reuniões do STTR' => array('Participa', 'participaReunioesSTTR', false, false),
            'Percentual de pessoas que participam das reuniões da Acorjuve' => array('Participa', 'participaReunioesAcorjuve', false, false),
            'Percentual de pessoas que participam das ações do movimento' => array('Participa', 'participaAcoesDoMovimento', false, false),
            'Percentual de pessoas que são associadas a Acorjuve' => array('Associado', 'associadoAcorjuve', false, false),
        );
        $config['countFieldsFamilias'] = array(
            'Percentual de famílias que declararam ter se beneficiado com a ALCOA ' => array('Beneficiado?', false, 'getBeneficiosALCOA', false),
            'Percentual de famílias que declararam ter sofrido danos com a ALCOA ' => array('Danos?', false, 'getDanosALCOA', false),
            'Avaliação das famílias a respeito da ALCOA ' => array('Avaliaçao', false, 'getAvaliacaoALCOA', false),
        );
        $this->load->view('relatorio', $config);
    }

    function showList() {

        if (getenv("REQUEST_METHOD") == "POST") {
            $montante = str_replace(",", ".", str_replace(".", "", $_POST['montante']));
            $totalPerc = 0;
            $totalFamilias = $familias = $this->dbpessoa->getFamilias()->num_rows();
            //somando os percentuais
            foreach ($_POST['perc'] as $perc) {
                $totalPerc += $perc;
            }
            $totalExtra = $totalPerc / 100;
            $totalNC = $totalExtra + $totalFamilias;
            $base_calculo = $montante / $totalNC;
            foreach ($_POST['perc'] as $idFamilia => $perc) {
                $vr[$_POST['familias'][$idFamilia]] =
                        array(
                            number_format($base_calculo + $base_calculo * (($perc / 100)), 2, ".", ""),
                            $idFamilia,
                            $perc
                );
            }
            $dados['bc'] = $base_calculo;
            $dados['montante_declarado'] = $montante;
            $dados['valor_familias'] = $vr;
            $dados['total_valor_familias'] = array_sum($vr);
            $this->load->view('relatorio_pgto_beneficio', $dados);
            return true;
        } else {
            $this->load->view('relatorio_pgto');
            return true;
        }
    }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */