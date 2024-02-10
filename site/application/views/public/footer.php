		</main>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h2>Sobre a La Pizza</h2>
						<ul class="menu-footer">
							<li><a href="<?php echo base_url() . 'about'; ?>">Quem somos</a></li>
							<li><a href="#" data-toggle="modal" data-target="#terms-and-conditions">Termos e condições de uso</a></li>
							<li><a href="#" data-toggle="modal" data-target="#privacity">Privacidade</a></li>
							<li><a href="<?php echo base_url() . 'howworks'; ?>">Como pedir</a></li>
							<li><a href="<?php echo base_url() . 'contactus'; ?>">Fale conosco</a></li>
						</ul>
					</div>
					<div class="col-md-4">
						<h2>Siga-nos nas redes sociais</h2>
						<p class="social-footer">
							<a href="#" class="facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<a href="#" class="twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
							<a href="#" class="youtube"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
							<a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#" class="pinterest"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
						</p>
					</div>
					<div class="col-md-4">
						<h2>Contato</h2>

						<address><i class="fa fa-home"></i> Rua Barra de Santa Rosa, 160 - Vila Cisper<br>CEP: 03817-010 São Paulo - SP</address>
						<address><i class="fa fa-phone"></i> <a href="tel:(11) 2541-2673">(11) 2541-2673</a> | <a href="tel:(11) 98762-8302">(11) 98762-8302</a></address>
						<p><i class="fa fa-clock-o" aria-hidden="true"></i> Horário de Funcionamento: <br>Terça a Quinta e aos Domingos das 18:00 às 23:00 | Sexta, Sábados e Vésperas de Feriados: das 18:00 às 00:00</p>
						<p><i class="fa fa-envelope"></i> <a href="mailto:contato@lapizza.com.br" title="Enviar um e-mail para contato@lapizza.com.br">contato@lapizza.com.br</a></p>
					</div>
				</div>
			</div>
			<div class="bg-copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">© Copyright 2016 - La Pizza - Todos os direitos reservados pizzaria La Pizza</p>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<?php $cart_products = $this->session->userdata('cart_session');
			$totalitems = 0;
			foreach ($cart_products as $cart_product) {
				$totalitems += $cart_product['quantity'];
			}

			if ($totalitems > 0) :
		?>
			<a href="<?php echo base_url() . 'cart'; ?>" title="Meu Carrinho" class="go-to-cart">
				<span class="go-to-cart-badge"><?php echo $totalitems; ?></span>
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</a>
		<?php endif; ?>

		<div id="terms-and-conditions" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="text-center">Termos e condições de uso</h2>
					</div>
					<div class="modal-body">
						<h3>1. SERVIÇOS OFERECIDOS</h3>
						<p>1.1 Este TERMO se aplica para regular o uso do serviço oferecido pelo pizzarialapizza.com.br aos USUÁRIOS, qual seja, possibilitar a escolha, pelos USUÁRIOS cadastrados e, via on-line, efetivar solicitações para aquisição (e entrega em domicílio e retirada no local) de gêneros alimentícios fornecidos pela pizzaria LaPizza, de acordo com o cardápio disponibilizado, sendo possível, igualmente, aos USUÁRIOS, escolher a efetivação do pagamento do preço dos produtos via máquina ou dinheiro. </p>
						<p>1.2 O serviço do pizzarialapizza.com.br consiste, portanto, em aproximar, através do nosso site, os USUÁRIOS da pizzaria LaPizza, possibilitando que os USUÁRIOS encaminhem pedidos de entrega de gêneros alimentícios.</p>
						<p>1.3 Desde logo fica esclarecido ao USUÁRIO - o qual se declara ciente - que o serviço oferecido pelo pizzarialapizza.com.br se relaciona apenas à 'intermediação para comercialização de produtos alimentícios, abarcando preparo, embalagem, disponibilização e entrega física (via motoboy ou outros meios) dos produtos.</p>
						<br>
						<h3>2. CADASTRO</h3>
						<p>2.1 O USUÁRIO, para utilizar os serviços acima descritos, deverá ter capacidade jurídica para atos civis e deverá, necessariamente, prestar as informações exigidas no CADASTRO, assumindo integralmente a responsabilidade (inclusive cível e criminal) pela exatidão e veracidade das informações fornecidas no CADASTRO, que poderá ser verificado, a qualquer momento, pelo pizzarialapizza.com.br.</p> 
						<p>2.1.1 Em caso de informações incorretas, inverídicas ou não confirmadas, bem assim na hipótese da negativa em corrigi-las ou enviar documentação que comprove a correção, a pizzaria LaPizza se reserva o direito de não concluir o cadastramento em curso ou, ainda, de bloquear o cadastro já existente, impedindo o USUÁRIO de utilizar os serviços on-line até que, a critério do pizzarialapizza.com.br, a situação de anomalia esteja regularizada. O pizzarialapizza.com.br se reserva o direito de impedir, a seu critério, novos CADASTROS, ou cancelar os já efetuados, em caso de ser detectada anomalia que, em sua análise, seja revestida de gravidade ou demonstre tentativa deliberada de burlar as regras aqui descritas, obrigatórias para todos os USUÁRIOS. Também agirá o pizzarialapizza.com.br de tal forma caso verifique descumprimento, pelo USUÁRIO, de qualquer obrigação prevista no presente TERMO.</p> 
						<p>2.2 Efetuado, com sucesso, o CADASTRO, o USUÁRIO terá acesso aos serviços por meio de login e senha, dados esses que se compromete a não divulgar a terceiros, ficando sob sua exclusiva responsabilidade qualquer solicitação de serviço que seja feita com o uso de login e senha de sua titularidade. </p>
						<br>
						<h3>3. OBRIGAÇÕES DO USUÁRIO</h3>
						<p>3.1 Efetuado com sucesso o CADASTRO do USUÁRIO, este se obriga a não divulgar a terceiros login e senha de acesso, nem permitir o uso de tais informações por terceiros, responsabilizando-se pelas consequências do uso de login e senha de sua titularidade. </p>
						<p>3.2 É obrigação do USUÁRIO fornecer informações cadastrais totalmente verídicas e exatas, responsabilizando-se exclusiva e integralmente (em todas as searas jurídicas) por todo o conteúdo por si informado no item CADASTRO, mantendo atualizado e confirmado o endereço para entrega dos produtos encomendados. </p>
						<p>3.3 O USUÁRIO se obriga, também, a pagar integralmente o preço dos produtos por si solicitados ou encomendados a pizzaria LaPizza e efetivamente a si entregues, seja por qualquer outra forma, diretamente ao portador dos produtos encomendados por meio deste site (dinheiro, cheque, tickets, etc.). </p>
						<p>3.4 O USUÁRIO que seja menor de 18 anos de idade está ciente de que não poderá encomendar e adquirir, em qualquer hipótese, produtos alcoólicos, responsabilizando-se pela correta informação de sua idade no item CADASTRO. </p>
						<p>3.5 O USUÁRIO concorda com o uso das informações de avaliações e feedbacks do serviços dos RESTAURANTES e do iFood, conforme descrito nos TERMOS DE PRIVACIDADE do iFood.</p>
						<br>
						<h3>4. OBRIGAÇÕES DO PIZZARIALAPIZZA.COM.BR </h3>
						<p>4.1 Disponibilizar no site pizzarialapizza.com.br espaço virtual que permita ao USUÁRIO devidamente cadastrado efetivar pedidos de compra de gêneros alimentícios anunciados e comercializados.</p> 
						<p>4.2 Proteger, por meio de armazenamento em servidores ou quaisquer outros meios magnéticos de alta segurança, a confidencialidade de todas as informações e cadastros relativos aos USUÁRIOS, assim como valores atinentes às operações financeiras advindas da operacionalização dos serviços previstos no presente TERMO. Contudo, não responderá pela reparação de prejuízos que possam ser derivados de apreensão e cooptação de dados por parte de terceiros que, rompendo os sistemas de segurança, consigam acessar essas informações.</p> 
						<br>
						<h3>5. MODIFICAÇÕES DESTE TERMO</h3>
						<p>5.1 O presente TERMO DE USO poderá, a qualquer tempo, ter seu conteúdo, ou parte dele, modificados para adequações e inserções, tudo com vistas ao aprimoramento dos serviços disponibilizados.</p> 
						<p>5.2 As novas condições entrarão em vigência assim que sua veiculada no site, sendo possível ao USUÁRIO manifestar oposição a quaisquer dos termos modificados, desde que o faça por escrito, através do site pizzarialapizza.com.br, o que gerará o cancelamento de seu CADASTRO.</p>
						<br>
						<h3>6. CANAL DE COMUNICAÇÃO</h3>
						<p>6.1 Para estabelecer contato entre pizzarialapizza.com.br e o USUÁRIO fica disponibilizado o endereço eletrônico deste link, sendo certo que o USUÁRIO se obriga, igualmente, a manter em seu cadastro endereço eletrônico atual por intermédio do qual se farão as comunicações a ele dirigidas pelo pizzarialapizza.com.br, desde logo emprestando-se validade jurídica e efetividade a esse meio eletrônico de troca de informações recíprocas.</p>
						<br> 
						<h3>7. ACEITAÇÃO DO TERMO DE USO</h3>
						<p>7.1 O USUÁRIO declara ter lido, entendido e que aceita todas as regras, condições e obrigações estabelecidas no presente TERMO.</p> 
						<br>
						<h3>8. FORO DE ELEIÇÃO</h3>
						<p>8.1 As partes elegem como competente para dirimir eventuais controvérsias que venham a surgir da interpretação e do cumprimento do presente TERMO o foro da Comarca do São Paulo - SP.</p> 
						<p><i>Última atualização: 26 de novembro de 2016</i></p>
					</div>
				</div>
			</div>
		</div>

		<div id="privacity" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="text-center">Política de Privacidade</h2>
					</div>
					<div class="modal-body">
						<p>A Pizzaria LaPizza, informa nesta declaração de proteção de dados quais consentimentos foram dados para autorizar a utilização e os processamento dos dados pessoais do usuário para fins de publicidade(e-mail, newsletter, etc.).
						</p>
						<br>
						<h3>1. O Que  Obtemos. </h3>
						<p>Nós somos autorizados a levantar dados pessoais, assim considerados os dados de estoque (por exemplo: nome, endereço e e-mail do usuário).&nbsp;</p>
						<p>Utilizamos e processamos os dados pessoais do usuário para fins de constituição, realização e execução do contrato de utilização e dos contratos com sites de compra coletiva. Isto abrange a transmissão dos seus dados a terceiros e a utilização por estes, na medida em que este procedimento é necessário para a constituição, realização e execução do contrato e dos contratos de compra concluídos.</p>
						<br>
						<h3>2. O que são “cookies” e qual a sua utilidade.</h3>
						<p>Utilizamos Cookies em diferentes partes do site para tornar a visita do nosso site mais atraente e possibilitar o uso de certas funções. Cookies são pequenos arquivos de texto que são armazenados em seu computador. A maioria dos Cookies utilizados em nosso site serão apagados do disco rígido do usuário automaticamente ao encerrar a sessão do navegador (chamados Cookies de sessão). Outros tipos de Cookies permanecerão no computador do usuário e possibilitam a identificação daquele computador na próxima visita do nosso site (chamados Cookies permanentes).</p>
						<br>
						<h3>3. Como serão utilizadas estas informações.</h3>
						<p>A LaPizza utiliza diferentes sistemas de tracking de terceiros, como por exemplo Google Analytics, um serviço de análise de internet da Google Inc. O Google Analytics utiliza Cookies (arquivos de texto) que são armazenados no computador do usuário e possibilitam a análise de utilização do site. As informações geradas a partir dos Cookies a respeito da utilização do site (incluindo o seu endereço IP) serão transmitidos a um servidor nos Estados Unidos e lá armazenados.&nbsp;</p>
						<p>O Google utilizará essas informações para analisar a utilização do site para fornecer relatórios sobre a utilização aos operadores de sites bem como o fornecimento de outros serviços ligados à utilização do site e da internet. O Google transmitirá também essas informações a terceiros, caso seja imposto por lei ou no caso em que o terceiro processe esses dados por ordem do Google. O Google não ligará seu endereço IP a outros dados.&nbsp;</p>
						<p>Ao utilizar o site você concorda com o processamento dos dados levantados pelo Google na forma e na finalidade anteriormente descrita.</p>
						<br>
						<h3>4. Pedido de exclusão do banco de dados.</h3>
						<p>O usuário pode cancelar a sua inclusão nestes programas de publicidade a todo momento através do contato do site solicitando o cancelamento. Informamos ainda que não disponibilizaremos seus dados para fins de publicidade a terceiros.</p>
						<br>
						<h3>5.&nbsp;Envio de informações.</h3>
						<p>Somos autorizados a transmitir os dados do usuário a terceiros caso isto seja necessário para cumprir regulações legais (por exemplo, da legislação brasileira) como no caso da transmissão de dados a autoridades de perseguição penal e inspeção para fins de defesa de perigos para a segurança pública bem como a perseguição penal.</p>
					</div>
				</div>
			</div>
		</div>

		<script src="<?php echo base_url() . 'js/jquery-1.12.4.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/owl.carousel.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/public.js'; ?>"></script>
	</body>
</html>