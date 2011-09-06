<?php
class dbPessoa extends Model {
    function __construct(){
        parent::Model();
    }
    function countByField($field,$com=false){
        $this->db->select($field." as field");
        $this->db->select("COUNT(*)as num",false);        
        $this->db->group_by($field);
        return $this->db->get('cadastroComunitario');
    }
    function getEscolaridade(){
        $this->db->select('escolaridade AS field');
        $this->db->select("COUNT(*)as num",false);
        $this->db->join('escolaridade','escolaridade.codEscolaridade=cadastroComunitario.codEscolaridade');
        $this->db->group_by('escolaridade');
        return $this->db->get('cadastroComunitario');
    }
    function getBeneficiosALCOA(){
        $this->db->select('beneficiosALCOA AS field');
        $this->db->select("COUNT(*)as num",false);
        $this->db->join('questaoFundiaria','questaoFundiaria.codFamilia=familia.codFamilia');
        $this->db->group_by('beneficiosALCOA');
        return $this->db->get('familia');
    }
    function getDanosALCOA(){
        $this->db->select('danosALCOA AS field');
        $this->db->select("COUNT(*)as num",false);
        $this->db->join('questaoFundiaria','questaoFundiaria.codFamilia=familia.codFamilia');
        $this->db->group_by('danosALCOA');
        return $this->db->get('familia');
    }
    function getAvaliacaoALCOA(){
        $this->db->select('avaliacaoALCOA AS field');
        $this->db->select("COUNT(*)as num",false);
        $this->db->join('questaoFundiaria','questaoFundiaria.codFamilia=familia.codFamilia');
        $this->db->group_by('avaliacaoALCOA');
        return $this->db->get('familia');
    }
    function countAll($where=false){
        if($where){
            $this->db->where($where);
        }
        return $this->db->count_all_results('cadastroComunitario');
    }
    function countAllFamilias($where=false){
        if($where){
            $this->db->where($where);
        }
        return $this->db->count_all_results('familia');
    }
    function getPessoaCartao($idFamilia=false)
    {
        $sql = "SELECT
                c.codCadastroComunitario as codPessoa,
                  c.codFamilia as familia,
                  c.`nomeDaPessoa`,
	          (SELECT COUNT(*) FROM composicaoResidencial WHERE codFamilia = familia) as num_pessoas,
                  c.`participaReunioesComunidade`,
                  c.`participaReunioesSTTR`,
                  c.`participaReunioesAcorjuve`,
                  c.`participaAcoesDoMovimento`,
                  c.`associadoAcorjuve`,
                  c.`comerciante`,
                  GROUP_CONCAT((SELECT nomeFonteDeRenda FROM nomeFonteDeRenda nm WHERE f.codNomeFonteDeRenda=nm.codNomeFonteDeRenda) ) as economia_trad


                FROM cadastroComunitario c
                LEFT JOIN fonteDeRenda f ON f.codFamilia=c.codFamilia
                LEFT JOIN nomeFonteDeRenda n ON n.codNomeFonteDeRenda=f.codNomeFonteDeRenda";
        if($idFamilia){
            $sql .=" WHERE c.codFamilia = '$idFamilia'";
        }
        $sql .= "  GROUP BY c.codCadastroComunitario";
        return $this->db->query($sql);
    }
    function getFamilias(){
        return $this->db->get('familia');
    }
    function getPessoa($idPessoa = false){
        if($idPessoa){
            $this->db->where("codCadastroComunitario",$idPessoa);
        }
        $pessoa = $this->db->get("cadastroComunitario");
        return $pessoa->row();
    }
}
