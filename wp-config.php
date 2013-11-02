<?php

/**
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */
// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //


if ($_SERVER['HTTP_HOST'] == 'localhost' || strpos($_SERVER['HTTP_HOST'], '192.168')!==false) {
  /** O nome do banco de dados do WordPress */
  define('DB_NAME', 'site13786496401');

  /** Usuário do banco de dados MySQL */
  define('DB_USER', 'site13786496401');

  /** Senha do banco de dados MySQL */
  define('DB_PASSWORD', 'b0rg35d3v');

  /** nome do host do MySQL */
  define('DB_HOST', 'mysql02.site1378649640.hospedagemdesites.ws');
} else {
  /** O nome do banco de dados do WordPress */
  define('DB_NAME', 'site1378649640');

  /** Usuário do banco de dados MySQL */
  define('DB_USER', 'site1378649640');

  /** Senha do banco de dados MySQL */
  define('DB_PASSWORD', 'b0rg35');

  /** nome do host do MySQL */
  define('DB_HOST', 'mysql01.site1378649640.hospedagemdesites.ws');
}
/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/* * #@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'V?EvElJCAA}lh@BDCFgeVnZ3UI/$}^WiN-{?+Y|hmq]Po-?6!=,(w/C g-~;UWne');
define('SECURE_AUTH_KEY', 'lB{ly.BallFFl^4{ErBkq01#Dj?LG+lmyJlpgoA8-L78[8TyVry>XX-s|MCK*0aH');
define('LOGGED_IN_KEY', 'mmkX|rL62#cPYo`RP*^G-AjUEdf*Vs:zb?t5)feh{1v^SqUa0e6CS6-oUT9w3>P#');
define('NONCE_KEY', '6dy:M,1*0G0a|t#eFtCH#Yf|+`yIrP)v5E^_2+,Tv6N1@4Z45d*ize kK>8SP/Vo');
define('AUTH_SALT', '5?KX-%SZVbqN{XRvzl@<Vd69Dx;0Bw{P|&R3s8H!+5a4Mg;kab/%++fBfaKLG8#Z');
define('SECURE_AUTH_SALT', 'Yg-:T*VE!=YitwsDtFkTNm1+pepyGs)~4k?+4-?dF+nQ 3zfrm MxDe1;3:}_j+f');
define('LOGGED_IN_SALT', '}tApy,iEp=#+i*mktymZIjYDz$Siv?=LMLNkqvru-+3+W#n_85@4B;]bye/U+;Cn');
define('NONCE_SALT', 'klx@$-!+uo+-lA`5*1C*Ar{RHxi }+/+9<PlEPp4u@<P$Ll&aPE~/ZuL0tcSdvqj');

/* * #@- */

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if (!defined('ABSPATH'))
  define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
