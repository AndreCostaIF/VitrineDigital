<?php

namespace App\Controllers;

class Partner extends BaseController
{
	public function index($id = null)
	{
		$categorias = new \App\Models\CategoriaNegocioModel();
		$arr['categoria'] = $categorias->findAll();

		$servicosModel = new \App\Models\ServicosModel();
		$arr['servicos'] = $servicosModel->findAll();
		#chama a view
		return view('partner', $arr);
	}

	public function salvar()
	{



		
		#regras de validacao
		$this->validation->setRules([
			
			'UserLojista' => ['label'=>'Usuario:','rules' =>"required|is_unique[lojista.UserLojista]"],
			'SenhaLojista' => ['label'=>'Senha:','rules' =>'required|senhaLetrasNumeros|min_length[6]']
			],
			#mensagens personalizadas
			['UserLojista'=> ['is_unique' => 'O Usuario digitado já existe, tente outro.'],
			'SenhaLojista'=>['senhaLetrasNumeros' => 'A senha deve conter letras e números']
			]);
			
		if ($this->validation->run($_POST)){
			$post = $this->request->getPost(null, FILTER_SANITIZE_STRING);


		
			$file = $this->request->getFile('Logo');
			$path = 'image/stores/';
			$file->move(ROOTPATH."public/".$path);
			$post['Logo'] = $path.$file->getName();
			
	
			#Salvando endereço
			$enderecoPost = [
				'Rua' 		=> $post['Rua'],
				'Numero'	=> $post['Numero'],
				'Bairro' 	=> $post['Bairro'],
				'Cidade' 	=> $post['Cidade'],
				'UF' 		=> $post['UF']
			];
	
	
			$endereco = new \App\Models\AddressUserModel();
			$endereco->save($enderecoPost);
			$idEndereco = $endereco->getInsertID();
	
			#Salvando lojista
			$lojistaPost = [
				'UserLojista' => $post['UserLojista'],
				'SenhaLojista' => $post['SenhaLojista'],
				'NomeLojista' => $post['NomeLojista'],
				
			];
	
			$lojista = new \App\Models\LojistaModel();
			$lojista->save($lojistaPost);
			$idLojista = $lojista->getInsertID();
	
	
			
			#Salvando loja
			$lojaPost = [
				'CNPJ' => $post['CNPJ'],
				'NomeFantasia' => $post['NomeFantasia'],
				'RazaoSocial' => $post['RazaoSocial'],
				'IdEndereco' => $idEndereco,
				'IdLojista' => $idLojista,
				'IdCategoriaNegocio' =>$post['IdCategoriaNegocio'],
				'Telefone' => $post['Telefone'],
				'Logo' => $post['Logo'],
				'IdServico' =>	$post['IdServico']
	
			];
			
			$loja = new \App\Models\LojaModel();
			$loja->save($lojaPost);
			$idLoja = $loja->getInsertID();
	
			return redirect()->to(site_url("Portal/index"));
		}else{
			#a validacao deu errado
			#devolve para a pagina anterior com o $_POST para a funcao old (fica na sessão)
			#e as mensagens de validacao vão através da sessão
			return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
		}
		
	}

	public function verificar_user(){
		#busca o usuario com esse e-mail
		$lojistaModel = new \App\Models\LojistaModel();
		$usr = $lojistaModel->findUser($this->request->getGet("UserLojista"));
		$resposta = ["usuario"=>$usr];
		#verifica se o e-mail é válido
		
		$this->validation->setRules(['UserLojista'=>['label'=>'Usuario','rules' =>"min_length[6]"]]);
		if ($this->validation->run($_GET)){
			$resposta["valido"] = true;
		} else {
			$resposta["valido"] = false;
		}
		print json_encode($resposta);
	}
}
