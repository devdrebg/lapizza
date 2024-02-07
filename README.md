# lapizza

Trabalho de Conclusão de Curso - LaPizza  
Sistema de pizzaria online desenvolvido em CodeIgniter

# como rodar

Baixar o repositório, fazer upload da base de dados do MySQL que está no caminho ```/misc/lapizza-24-11-2016.sql```  
Criar um virtualhost, por exemplo: ```http://lapizza.local/``` e configurar esse ambiente em ```$config['base_url'] = '';``` criando uma copia do arquivo config.sample reanomeando para ```config.php``` que está em em ```/site/application/config/config.sample.php```  
Definir o ambiente, se é ```production```, ```testing``` ou ```development```, para isso faça uma cópia do arquivo ```env.sample.php``` e renomeie para ```env.php```, dentro desse arquivo basta definir na variável ```$env``` qual será o ambiente da aplicação  
Se necessário ative o rewrite mod no server ubuntu através do comando ```sudo a2enmod rewrite```  
