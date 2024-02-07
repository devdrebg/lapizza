# lapizza

Trabalho de Conclusão de Curso - LaPizza

Sistema de pizzaria online desenvolvido em CodeIgniter

# como rodar

Baixar o repositório, criar um banco de dados no MySQL, fazer upload do backup da base de dados do MySQL que está no caminho ```/misc/lapizza-24-11-2016.sql```
Criar um virtualhost, por exemplo: ```http://lapizza.local/``` e configurar esse ambiente em ```$config['base_url'] = '';``` criando uma copia do arquivo config.sample reanomeando para ```config.php``` que está em em ```/site/application/config/config.sample.php```  
Fazer uma cópia do ```/site/application/config/database.sample.php``` e renomear para ```database.php```, fazer os apontamentos necessários para o banco de dados  
Se necessário ative o rewrite mod no server ubuntu através do comando ```sudo a2enmod rewrite```  
Basta então rodar a aplicação no virtualhost que foi criado para a aplicação  
