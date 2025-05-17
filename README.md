Teste para desenvolvedor 
==============================

1 - Importe o arquivo [db.sql](db.sql) no banco de dados mysql

2 - Altere os dados da conexão no arquivo [nota_fiscal.php](nota_fiscal.php)

3 - clone os dados deste repositório em sua pasta FTP

````
git clone https://gitlab.com/agenciaartilharia/teste-care.git
````
você pode ver o sistema rodando em:

````
http://agenciaartilharia.com.br/care/
````

Ambiente de desenvolvimento
==============================

Ambiente     |Versão | DOCUMENTACAO |
-------------|-------|----------------------
Versão HTML             | **HTML5** | [HTML](https://devdocs.io/html/)
Versão CSS              | **CSS 3.0** | [CSS3](https://developer.mozilla.org/pt-BR/docs/Web/CSS)
Versão BootStrap        | **BootStrap 4.4** |  [BootStrap](https://getbootstrap.com/docs/4.4/getting-started/introduction/)
Versão Jquery 		      | **jQuery v3.4.1** | [jQuery 3.4.1](https://api.jquery.com/)
Versão Jquery-ui 	      | **jQuery UI - v1.12.1** | [jQuery UI](https://api.jqueryui.com/)
Versão Jquery-redirect  | **jQuery Redirect v1.1.3** | [jQuery Redirect](https://api.jqueryui.com/)
Versão PHP		 					| **PHP 7.4.3** |[PHP](https://www.php.net/manual/en/)
Versão MYSQL		 			| **Database client version: libmysql - 5.5.62** |[MYSQL](https://dev.mysql.com/doc/refman/8.0/en/)
Versão Datatable				| **DataTables 1.10.20** |[Datatables](https://datatables.net/)
Versão SweetAlert				| **SweetAlert 2.0**|[SweetAlert](https://sweetalert2.github.io/)





O TESTE
==============================

Objetivo:

Gerenciar as notas fiscais do cliente.

Requisitos funcionais:

1.	O sistema deve ter uma tela para realizar upload de um arquivo na extensão ".xml"
2.	O sistema deve validar se o arquivo é uma extensão .xml
4.	O sistema deve permitir somente o upload do arquivo xml se o campo CNPJ do emitente(<emit>) for "09066241000884"
5.	O sistema deve validar se a nota possui protocolo de autorização preenchido (campo <nProt>) 6.
6.	O sistema deve exibir em uma tela os seguintes dados: Número da nota Fiscal, Data da nota Fiscal, dados completos do destinatário e valor total da nota fiscal;

Requisitos não funcionais:

1 - Os dados que serão exibidos na tela deverão ser armazenados em um banco de dados MySQL;
2 - Deverá ser desenvolvido em linguagem PHP 7;
