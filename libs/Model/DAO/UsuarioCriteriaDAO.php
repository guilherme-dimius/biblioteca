<?php
/** @package    Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * UsuarioCriteria allows custom querying for the Usuario object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Biblioteca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class UsuarioCriteriaDAO extends Criteria
{

	public $Idcpf_Equals;
	public $Idcpf_NotEquals;
	public $Idcpf_IsLike;
	public $Idcpf_IsNotLike;
	public $Idcpf_BeginsWith;
	public $Idcpf_EndsWith;
	public $Idcpf_GreaterThan;
	public $Idcpf_GreaterThanOrEqual;
	public $Idcpf_LessThan;
	public $Idcpf_LessThanOrEqual;
	public $Idcpf_In;
	public $Idcpf_IsNotEmpty;
	public $Idcpf_IsEmpty;
	public $Idcpf_BitwiseOr;
	public $Idcpf_BitwiseAnd;
	public $Logradouro_Equals;
	public $Logradouro_NotEquals;
	public $Logradouro_IsLike;
	public $Logradouro_IsNotLike;
	public $Logradouro_BeginsWith;
	public $Logradouro_EndsWith;
	public $Logradouro_GreaterThan;
	public $Logradouro_GreaterThanOrEqual;
	public $Logradouro_LessThan;
	public $Logradouro_LessThanOrEqual;
	public $Logradouro_In;
	public $Logradouro_IsNotEmpty;
	public $Logradouro_IsEmpty;
	public $Logradouro_BitwiseOr;
	public $Logradouro_BitwiseAnd;
	public $Bairro_Equals;
	public $Bairro_NotEquals;
	public $Bairro_IsLike;
	public $Bairro_IsNotLike;
	public $Bairro_BeginsWith;
	public $Bairro_EndsWith;
	public $Bairro_GreaterThan;
	public $Bairro_GreaterThanOrEqual;
	public $Bairro_LessThan;
	public $Bairro_LessThanOrEqual;
	public $Bairro_In;
	public $Bairro_IsNotEmpty;
	public $Bairro_IsEmpty;
	public $Bairro_BitwiseOr;
	public $Bairro_BitwiseAnd;
	public $Estado_Equals;
	public $Estado_NotEquals;
	public $Estado_IsLike;
	public $Estado_IsNotLike;
	public $Estado_BeginsWith;
	public $Estado_EndsWith;
	public $Estado_GreaterThan;
	public $Estado_GreaterThanOrEqual;
	public $Estado_LessThan;
	public $Estado_LessThanOrEqual;
	public $Estado_In;
	public $Estado_IsNotEmpty;
	public $Estado_IsEmpty;
	public $Estado_BitwiseOr;
	public $Estado_BitwiseAnd;
	public $Telefonefixo_Equals;
	public $Telefonefixo_NotEquals;
	public $Telefonefixo_IsLike;
	public $Telefonefixo_IsNotLike;
	public $Telefonefixo_BeginsWith;
	public $Telefonefixo_EndsWith;
	public $Telefonefixo_GreaterThan;
	public $Telefonefixo_GreaterThanOrEqual;
	public $Telefonefixo_LessThan;
	public $Telefonefixo_LessThanOrEqual;
	public $Telefonefixo_In;
	public $Telefonefixo_IsNotEmpty;
	public $Telefonefixo_IsEmpty;
	public $Telefonefixo_BitwiseOr;
	public $Telefonefixo_BitwiseAnd;
	public $Celular_Equals;
	public $Celular_NotEquals;
	public $Celular_IsLike;
	public $Celular_IsNotLike;
	public $Celular_BeginsWith;
	public $Celular_EndsWith;
	public $Celular_GreaterThan;
	public $Celular_GreaterThanOrEqual;
	public $Celular_LessThan;
	public $Celular_LessThanOrEqual;
	public $Celular_In;
	public $Celular_IsNotEmpty;
	public $Celular_IsEmpty;
	public $Celular_BitwiseOr;
	public $Celular_BitwiseAnd;
	public $Cep_Equals;
	public $Cep_NotEquals;
	public $Cep_IsLike;
	public $Cep_IsNotLike;
	public $Cep_BeginsWith;
	public $Cep_EndsWith;
	public $Cep_GreaterThan;
	public $Cep_GreaterThanOrEqual;
	public $Cep_LessThan;
	public $Cep_LessThanOrEqual;
	public $Cep_In;
	public $Cep_IsNotEmpty;
	public $Cep_IsEmpty;
	public $Cep_BitwiseOr;
	public $Cep_BitwiseAnd;
	public $Tipousuario_Equals;
	public $Tipousuario_NotEquals;
	public $Tipousuario_IsLike;
	public $Tipousuario_IsNotLike;
	public $Tipousuario_BeginsWith;
	public $Tipousuario_EndsWith;
	public $Tipousuario_GreaterThan;
	public $Tipousuario_GreaterThanOrEqual;
	public $Tipousuario_LessThan;
	public $Tipousuario_LessThanOrEqual;
	public $Tipousuario_In;
	public $Tipousuario_IsNotEmpty;
	public $Tipousuario_IsEmpty;
	public $Tipousuario_BitwiseOr;
	public $Tipousuario_BitwiseAnd;
	public $Senha_Equals;
	public $Senha_NotEquals;
	public $Senha_IsLike;
	public $Senha_IsNotLike;
	public $Senha_BeginsWith;
	public $Senha_EndsWith;
	public $Senha_GreaterThan;
	public $Senha_GreaterThanOrEqual;
	public $Senha_LessThan;
	public $Senha_LessThanOrEqual;
	public $Senha_In;
	public $Senha_IsNotEmpty;
	public $Senha_IsEmpty;
	public $Senha_BitwiseOr;
	public $Senha_BitwiseAnd;
	public $Email_Equals;
	public $Email_NotEquals;
	public $Email_IsLike;
	public $Email_IsNotLike;
	public $Email_BeginsWith;
	public $Email_EndsWith;
	public $Email_GreaterThan;
	public $Email_GreaterThanOrEqual;
	public $Email_LessThan;
	public $Email_LessThanOrEqual;
	public $Email_In;
	public $Email_IsNotEmpty;
	public $Email_IsEmpty;
	public $Email_BitwiseOr;
	public $Email_BitwiseAnd;
	public $Pais_Equals;
	public $Pais_NotEquals;
	public $Pais_IsLike;
	public $Pais_IsNotLike;
	public $Pais_BeginsWith;
	public $Pais_EndsWith;
	public $Pais_GreaterThan;
	public $Pais_GreaterThanOrEqual;
	public $Pais_LessThan;
	public $Pais_LessThanOrEqual;
	public $Pais_In;
	public $Pais_IsNotEmpty;
	public $Pais_IsEmpty;
	public $Pais_BitwiseOr;
	public $Pais_BitwiseAnd;
	public $Cidade_Equals;
	public $Cidade_NotEquals;
	public $Cidade_IsLike;
	public $Cidade_IsNotLike;
	public $Cidade_BeginsWith;
	public $Cidade_EndsWith;
	public $Cidade_GreaterThan;
	public $Cidade_GreaterThanOrEqual;
	public $Cidade_LessThan;
	public $Cidade_LessThanOrEqual;
	public $Cidade_In;
	public $Cidade_IsNotEmpty;
	public $Cidade_IsEmpty;
	public $Cidade_BitwiseOr;
	public $Cidade_BitwiseAnd;
	public $Numero_Equals;
	public $Numero_NotEquals;
	public $Numero_IsLike;
	public $Numero_IsNotLike;
	public $Numero_BeginsWith;
	public $Numero_EndsWith;
	public $Numero_GreaterThan;
	public $Numero_GreaterThanOrEqual;
	public $Numero_LessThan;
	public $Numero_LessThanOrEqual;
	public $Numero_In;
	public $Numero_IsNotEmpty;
	public $Numero_IsEmpty;
	public $Numero_BitwiseOr;
	public $Numero_BitwiseAnd;
	public $Nomeusuario_Equals;
	public $Nomeusuario_NotEquals;
	public $Nomeusuario_IsLike;
	public $Nomeusuario_IsNotLike;
	public $Nomeusuario_BeginsWith;
	public $Nomeusuario_EndsWith;
	public $Nomeusuario_GreaterThan;
	public $Nomeusuario_GreaterThanOrEqual;
	public $Nomeusuario_LessThan;
	public $Nomeusuario_LessThanOrEqual;
	public $Nomeusuario_In;
	public $Nomeusuario_IsNotEmpty;
	public $Nomeusuario_IsEmpty;
	public $Nomeusuario_BitwiseOr;
	public $Nomeusuario_BitwiseAnd;

}

?>