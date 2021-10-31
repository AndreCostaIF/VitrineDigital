<?php

return [
	// Mensagens principais
	'noRuleSets'             => 'Nenhum conjunto de regras especificado na configuração de Validação.' ,
	'ruleNotFound'           => '{0} não é uma regra válida.' ,
	'groupNotFound'          => '{0} não é um grupo de regras de validação.' ,
	'groupNotArray'          => 'O grupo de regras {0} deve ser um array.' ,
	'invalidTemplate'        => '{0} não é um template de Validation válido.' ,

	// Mensagens de regra
	'alpha'                  => 'O campo {campo} pode conter apenas caracteres alfabéticos.' ,
	'alpha_dash'             => 'O campo {campo} pode conter apenas caracteres alfa-numéricos, médios, e traços.' ,
	'alpha_numeric'          => 'O campo {campo} pode conter apenas caracteres alfa-numéricos.' ,
	'alpha_numeric_space'    => 'O campo {campo} pode conter apenas caracteres alfa-numéricos e espaços.' ,
	'alpha_space'            => 'O campo {campo} pode conter apenas caracteres alfabéticos e espaços.' ,
	'decimal'                => 'O campo {campo} deve conter um número decimal.' ,
	'difere'                => 'O campo {campo} deve ser diferente do campo {param}.' ,
	'exact_length'           => 'O campo {campo} deve conter exatamente {param} caracteres no tamanho.' ,
	'maior_than'           => 'O campo {campo} deve conter um número maior que {param}.' ,
	'maior_than_equal_to' => 'O campo {campo} deve conter um número maior ou igual a {param}.' ,
	'in_list'                => 'O campo {campo} deve ser um desses: {param}.' ,
	'integer'                => 'O campo {campo} deve conter um número inteiro.' ,
	'is_natural'             => 'O campo {campo} deve conter apenas dígitos.' ,
	'is_natural_no_zero'     => 'O campo {campo} deve conter apenas dígitos e deve ser maior que zero.' ,
	'is_unique'              => 'O campo {campo} deve conter um valor único.' ,
	'less_than'              => 'O campo {campo} deve conter um número menor que {param}.' ,
	'less_than_equal_to'     => 'O campo {campo} deve conter um número menor ou igual a {param}.' ,
	'corresponde'                => 'O campo {campo} não é igual ao campo {param}.' ,
	'max_length'             => 'O campo {campo} não pode exceder {param} caracteres no tamanho.' ,
	'min_length'             => 'O campo deve conter pelo menos {param} caracteres no tamanho.' ,
	'numeric'                => 'O campo {campo} deve conter apenas números.' ,
	'regex_match'            => 'O campo {campo} não está no formato correto.' ,
	'obrigatório'               => 'O campo {campo} é requerido.' ,
	'required_with'          => 'Senhas não coincidem.' ,
	'required_without'       => 'O campo {campo} é requerido quando {param} não está presente.' ,
	'timezone'               => 'O campo {field} deve ser um timezone válido.' ,
	'valid_base64'           => 'O campo {field} deve ser uma string base64 válida.' ,
	'valid_email'            => 'O campo E-mail deve conter um endereço de e-mail válido.' ,
	'valid_emails'           => 'O campo {campo} deve conter todos os endereços de e-mails válidos.' ,
	'valid_ip'               => 'O campo {campo} deve conter um IP válido.' ,
	'valid_url'              => 'O campo {campo} deve conter uma URL válida.' ,
	'valid_date'             => 'O campo Data deve conter uma data válida.' ,
	'required'             => 'Este campo é obrigatório.' ,

	// Cartões de crédito
	'valid_cc_num'           => '{field} não parece ser um número de cartão de crédito válido.' ,

	// Arquivos
	'upload'               => '{campo} não é um arquivo de upload válido.' ,
	'max_size'               => '{campo} é um arquivo muito grande.' ,
	'is_image'               => '{field} não é um arquivo de imagem válido do upload.' ,
	'mime_in'                => '{campo} não tem um tipo mime válido.' ,
	'ext_in'                 => '{campo} não tem uma extensão de arquivo de validade.' ,
	'max_dims'               => '{campo} não é uma imagem, ou ela é muito larga ou muito grande.' ,
];