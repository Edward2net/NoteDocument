<?php
# MantisBT - A PHP based bugtracking system

# MantisBT is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 2 of the License, or
# (at your option) any later version.
#
# MantisBT is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

/**
 * 預設配置參數
 *
 * 不建議修改此文件，如果要修改，請在 config/config_inc.php 文件中配置新值。
 * config_inc.php 中的值會覆蓋原有值。
 *
 * 通常，值為 OFF 表示該功能被禁用，ON 表示功能已啟用。
 * 其他情況都會有說明。
 *
 * 詳情請參閱 https://www.mantisbt.org/docs/master/
 *
 * @package MantisBT
 * @copyright Copyright 2000 - 2002  Kenzaburo Ito - kenito@300baud.org
 * @copyright Copyright 2002  MantisBT Team - mantisbt-dev@lists.sourceforge.net
 * @link http://www.mantisbt.org
 */

##############################
# MantisBT 資料庫設置 #
##############################

/**
 * 配置數據庫服務器地址或連接字符串
 * 如，如果要連接本機的數據庫服務器，則應該設置為 localhost。
 * 如果需要提供連接的端口，則應設置為 localhost:3306。
 * @global string $g_hostname
 */
$g_hostname				= 'localhost';
/**
 * 配置連接到數據庫的用戶名
 * 用戶需要設置MantisBT 對數據庫有讀/寫權限。預設用戶為名 root。
 * @global string $g_db_username
 */
$g_db_username			= 'root';
/**
 * 指定數據庫連接密碼。
 * 預設密碼為空。
 * @global string $g_db_password
 */
$g_db_password			= '';
/**
 * 數據庫名稱
 * 預設數據庫名為 bugtracker。
 * @global string $g_database_name
 */
$g_database_name		= 'bugtracker';

/**
 * 定義數據庫類型
 * 前提是必須啟用相應PHP擴展！
 * 支持的類型有：
 *
 * 數據庫          類型          PHP 擴展   說明
 * -----           -------       -------   --------
 * MySQL           mysqli        mysqli    預設
 *                 mysql         mysql     PHP < 5.5.0
 * PostgreSQL      pgsql         pgsql
 * MS SQL Server   mssqlnative   sqlsrv    實驗
 * Oracle          oci8          oci8      實驗
 *
 * @global string $g_db_type
 */
$g_db_type				= 'mysqli';

/**
 * adodb 數據源名稱
 * 這是一個實驗字段。
 * 上面的數據庫配置如果不夠靈活，你可以指定一個 dsn，
 * 相關信息參見 adodb 手冊：http://phplens.com/adodb/code.initialization.html#dsnsupport。
 * 如果 db_type 為 odbc_mssql，則 dsn 為：
 * "Driver={SQL Server Native Client 10.0};SERVER=.\sqlexpress;DATABASE=bugtracker;UID=mantis;PWD=password;"
 * 註意：安裝程序尚未完全支持使用 dsn。
 */
$g_dsn = '';

/**
 * 表前綴
 * 設置表前綴，即前綴後加下劃線後面跟表名
 * 如 'bug' => 'mantis_bug'.
 * Oracle (< 12cR2)標識符長度不能超過 30 個字符
 * 應該設置前綴為空或盡可能短（如 前綴設置為 m）
 * @global string $g_db_table_prefix
 */
$g_db_table_prefix = 'mantis';

/**
 * 數據庫表後綴。
 * 在表名後加後綴
 * 如 'bug' => 'bug_table'.
 * @see $g_db_table_prefix 長度限制
 * @global string $g_db_table_suffix
 */
$g_db_table_suffix = '_table';

/**
 * 插件表前綴
 * 給插件表增加前綴，如插件表 'foo' => 'mantis_plugin_Example_foo_table'。
 *
 * Oracle (< 12cR2)標識符長度不能超過 30 個字符，盡可能短（如 前綴設置為 plg）
 * 強烈建議不要為空！
 * @see $g_db_table_prefix
 * @global string $g_db_table_prefix
 */
$g_db_table_plugin_prefix	= 'plugin';

####################
# 文件夾位置 #
####################

/**
 * MantisBT 根路徑，需要有 / 或 \
 * @global string $g_absolute_path
 */
$g_absolute_path = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/**
 * core 目錄位置，使用預設就行
 * 除非你將 core 目錄移出 網站目錄（推薦）。
 * @global string $g_core_path
 */
$g_core_path = $g_absolute_path . 'core' . DIRECTORY_SEPARATOR;

/**
 * 類文件夾路徑，需要有 / 或 \
 * @global string $g_class_path
 */
$g_class_path = $g_core_path . 'classes' . DIRECTORY_SEPARATOR;

/**
 * 第三方庫路徑，需要有 / 或 \
 * @global string $g_library_path
 */
$g_library_path = $g_absolute_path . 'library' . DIRECTORY_SEPARATOR;

/**
 * 語言文件路徑，需要有 / 或 \
 * @global string $g_language_path
 */
$g_language_path = $g_absolute_path . 'lang' . DIRECTORY_SEPARATOR;

/**
 * 自定義配置路徑，需要有 / 或 \
 * 如果設置了 MANTIS_CONFIG_FOLDER 環境變數，這個允許 Apache vhost 設置多個實例。
 * @global string $g_config_path
 */
$t_local_config = getenv( 'MANTIS_CONFIG_FOLDER' );
if( $t_local_config && is_dir( $t_local_config ) ) {
	$g_config_path = $t_local_config;
} else {
	$g_config_path = $g_absolute_path . 'config' . DIRECTORY_SEPARATOR;
}

unset( $t_local_config );

##########################
# MantisBT 路徑設置 #
##########################

$t_protocol = 'http';
$t_host = 'localhost';
if( isset ( $_SERVER['SCRIPT_NAME'] ) ) {
	if( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) ) {
		$t_protocol= $_SERVER['HTTP_X_FORWARDED_PROTO'];
	} else if( !empty( $_SERVER['HTTPS'] ) && ( strtolower( $_SERVER['HTTPS'] ) != 'off' ) ) {
		$t_protocol = 'https';
	}

	# $_SERVER['SERVER_PORT'] is not defined in case of php-cgi.exe
	if( isset( $_SERVER['SERVER_PORT'] ) ) {
		$t_port = ':' . $_SERVER['SERVER_PORT'];
		if( ( ':80' == $t_port && 'http' == $t_protocol )
		  || ( ':443' == $t_port && 'https' == $t_protocol )) {
			$t_port = '';
		}
	} else {
		$t_port = '';
	}

	if( isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) { # Support ProxyPass
		$t_hosts = explode( ',', $_SERVER['HTTP_X_FORWARDED_HOST'] );
		$t_host = $t_hosts[0];
	} else if( isset( $_SERVER['HTTP_HOST'] ) ) {
		$t_host = $_SERVER['HTTP_HOST'];
	} else if( isset( $_SERVER['SERVER_NAME'] ) ) {
		$t_host = $_SERVER['SERVER_NAME'] . $t_port;
	} else if( isset( $_SERVER['SERVER_ADDR'] ) ) {
		$t_host = $_SERVER['SERVER_ADDR'] . $t_port;
	}

	if( !isset( $_SERVER['SCRIPT_NAME'] )) {
		echo 'Invalid server configuration detected. Please set $g_path manually in ' . $g_config_path . 'config_inc.php.';
		if( isset( $_SERVER['SERVER_SOFTWARE'] ) && ( stripos($_SERVER['SERVER_SOFTWARE'], 'nginx') !== false ) )
			echo ' Please try to add "fastcgi_param SCRIPT_NAME $fastcgi_script_name;" to the nginx server configuration.';
		die;
	}
	$t_self = filter_var( $_SERVER['SCRIPT_NAME'], FILTER_SANITIZE_STRING );
	$t_path = str_replace( basename( $t_self ), '', $t_self );
	switch( basename( $t_path ) ) {
		case 'admin':
			$t_path = rtrim( dirname( $t_path ), '/\\' ) . '/';
			break;
		case 'check':		# admin checks dir
		case 'soap':
			$t_path = rtrim( dirname( dirname( $t_path ) ), '/\\' ) . '/';
			break;
		case '':
			$t_path = '/';
			break;
	}
	if( strpos( $t_path, '&#' ) ) {
		echo 'Can not safely determine $g_path. Please set $g_path manually in ' . $g_config_path . 'config_inc.php';
		die;
	}
} else {
	$t_path = 'mantisbt/';
}

/**
 * 從瀏覽器中看到的路徑
 * 必須有 /
 * @global string $g_path
 */
$g_path	= $t_protocol . '://' . $t_host . $t_path;

/**
 * 沒有域名的短路徑
 * 必須有 /
 * @global string $g_short_path
 */
$g_short_path = $t_path;

/**
 * 用於鏈接到用戶手冊
 * 可以是完整的 URL或 MantisBT 根目錄的相對路徑。
 * 如果相對路徑不存在，則會使用 http://www.mantisbt.org 的在線文檔。
 * 不對 URL 檢查。
 * @global string $g_manual_url
 */
$g_manual_url = 'doc/en-US/Admin_Guide/html-desktop/';

##############
# Web Server #
##############

/**
 * Session 處理程序，值有：
 *  'php' -> 預設PHP系統的 Session
 *  'adodb' -> 數據庫存儲 Session
 *  'memcached' -> Memcached 存儲 Session
 * @global string $g_session_handler
 */
$g_session_handler = 'php';

/**
 * Session 存儲路徑，如果為 false，則使用PHP程序預設值。
 * @global bool $g_session_save_path
 */
$g_session_save_path = false;

/**
 * Session 驗證
 * 警告：禁用可能造成潛在安全風險！
 * @global integer $g_session_validation
 */
$g_session_validation = ON;

/**
 * 表單安全驗證
 * 這可以防止CSRF（跨站請求偽造），但某些代理服務器可能無法正常使用，因為它們緩存的頁面不正確。
 * 警告：禁用將會造成安全風險！
 */
$g_form_security_validation = ON;

#############################
# Security and Cryptography #
#############################

/**
 * MantisBT 用於加密的鹽值，必須保密！
 * 你必須配置一個值，MantisBT 會生成一個隨機的唯一的鹽值。長度至少為 16 字符。
 *
 * 鹽值使用隨機數生成器生成長度字符串。Linux 系統下生成：
 *    cat /dev/urandom | head -c 64 | base64
 *
 * 註意，/dev/urandom 輸出的每字節熵的位數不是8。
 * 如果你不介意等待很長時間，你可以使用 /dev/random 得到更接近8每字節的熵位。
 * 通過 /dev/random 生成熵時，移動鼠標（如果可能）將大大提高 /dev/random 產生熵的速度。
 *
 * 警告：此配置選項對 MantisBT 安裝程序有深遠影響。未正確配置，將造成安裝異常。
 * 請確保此值保密，並與數據庫密碼覆雜度一致。
 *
 * 此設置預設為空，MantisBT 將不會在此狀態下運行。因此，您必須更改此選項的值。
 *
 * @global string $g_crypto_master_salt
 */
$g_crypto_master_salt = '';

############################
# Signup and Lost Password #
############################

/**
 * 允許用戶註冊帳戶，如果為 ON，則 $g_send_reset_password 也必須為 ON。
 * 並且必須正確設置郵件配置。
 * @see $g_send_reset_password
 * @global integer $g_allow_signup
 */
$g_allow_signup			= ON;

/**
 * 在鎖定帳戶之前使用錯誤密碼登錄次數。
 * 當鎖定時，需要重置密碼，每次成功登錄時此值會重置為0。OFF以禁用此限制。
 * @global integer $g_max_failed_login_count
 */
$g_max_failed_login_count = OFF;

/**
 * 當新用戶註冊時通知級別
 * @global integer $g_notify_new_user_created_threshold_min
 */
$g_notify_new_user_created_threshold_min = ADMINISTRATOR;

/**
 * 如果為 ON，將在用戶創建帳戶或重置密碼時發送郵件（這裏正確配置郵件設置）。
 * 如果為 OFF，則管理員在創建新帳戶時設置密碼。並且在重置密碼時將密碼設置為空。
 * @global integer $g_send_reset_password
 */
$g_send_reset_password	= ON;

/**
 * 使用驗證碼 需要 GD庫
 * @global integer $g_signup_use_captcha
 */
$g_signup_use_captcha	= ON;

/**
 * 系統字體路徑
 * 關系圖、工作流程圖、MantisGraph 插件、TrueType-Font 文件目錄
 * @global string $g_system_font_folder
 */
$g_system_font_folder	= '';

/**
 * 是否啟用 忘記密碼 功能
 * @global integer $g_lost_password_feature
 */
$g_lost_password_feature = ON;

/**
 * 忘記密碼次數，當達到此值時將無法請求重置密碼。
 * 每次登錄成功後，此值將重置為 0。
 * @global integer $g_max_lost_password_in_progress_count
 */
$g_max_lost_password_in_progress_count = 3;

#############
# 反垃圾郵件 #
#############

/**
 * 註冊時郵件通知最大次數，為 0 不限制。
 * @var integer
 * @see $g_default_new_account_access_level
 */
$g_antispam_max_event_count = 10;

/**
 * 時間內執行的最大通知數
 * @var integer
 */
$g_antispam_time_window_in_seconds = 3600;

###########################
# MantisBT Email Settings #
###########################

/**
 * 網站管理員電子郵件地址
 * 此地址被公開顯示在所有頁面底部，因此可能被抓取到被發送垃圾郵件。
 * @global string $g_webmaster_email
 */
$g_webmaster_email		= 'webmaster@example.com';

/**
 * 發件人地址
 * @global string $g_from_email
 */
$g_from_email			= 'noreply@example.com';

/**
 * 發件人姓名
 * @global string $g_from_name
 */
$g_from_name			= 'Mantis Bug Tracker';

/**
 * 回覆郵件地址
 * @global string $g_return_path_email
 */
$g_return_path_email	= 'admin@example.com';

/**
 * 允許郵件通知
 * 是否開啟郵件通知。ON 為啟用 OFF 為禁用。
 * 禁用此項不會影響註冊過程中發送的郵件通知。為 OFF 時密碼重置功能被禁用。
 * 此外，管理員更新帳戶的通知不會發送給用戶。
 * @global integer $g_enable_email_notification
 */
$g_enable_email_notification	= ON;

/**
 * 啟用後，將會發送完整通知，並在頂部顯示更改類型，而不是使用專用通知。
 * 此設置會被用戶自定義配置覆蓋。
 *
 * @global integer $g_email_notifications_verbose
 */
$g_email_notifications_verbose = OFF;

/**
 * 以下2個配置項，允許控制在不同操作/狀態下收到電子郵件通知。
 * default_notify_flags 為不同用戶類別設置預設值，用戶類別為：
 *
 *      'reporter': 報告員的 BUG
 *       'handler': 分配 BUG 時
 *       'monitor': 監視 BUG 的用戶
 *      'bugnotes': 添加註釋到 BUG 時
 *      'category': 類別所有者
 *      'explicit': 用戶可見操作（如添加用戶到監視列表）
 * 'threshold_max':所有用戶權限 <= 最大
 * 'threshold_min': .. 和 >= 最小
 *
 * notify_flags 設置特定的覆蓋動作/狀態。如果未列出，則使用預設值。值有：
 *
 *             'new': 新增 BUG
 *           'owner': BUG 被分配
 *        'reopened': BUG 被重新打開
 *         'deleted': BUG 被刪除
 *         'updated': BUG 被更新
 *         'bugnote': 註釋添加到 BUG中
 *         'sponsor': BUG 創建人修改 BUG
 *        'relation': BUG 關系改變
 *         'monitor': 被監視
 *        '<status>': 如 'resolved', 'closed', 'feedback', 'acknowledged'，等等
 *                     列表值對應於 $g_status_enum_string
 *
 * 如果你想讓所有開發人員在新增BUG時收到通知，你可以配置以下：
 *
 * $g_notify_flags['new']['threshold_min'] = DEVELOPER;
 * $g_notify_flags['new']['threshold_max'] = DEVELOPER;
 *
 * 經理在關閉 BUG時，不通知 BUG 報告者，你可以這樣：
 *
 * $g_notify_flags['closed']['reporter'] = OFF;
 *
 * @global array $g_default_notify_flags
 */

$g_default_notify_flags = array(
	'reporter'      => ON,
	'handler'       => ON,
	'monitor'       => ON,
	'bugnotes'      => ON,
	'category'      => ON,
	'explicit'      => ON,
	'threshold_min' => NOBODY,
	'threshold_max' => NOBODY
);

/**
 * 我們不需要發送新 BUG 通知
 * （參見上面關於此配置項）
 * @todo (though I'm not sure they need to be turned off anymore
 *      - there just won't be anyone in those categories)
 *      I guess it serves as an example and a placeholder for this
 *      config option
 * @see $g_default_notify_flags
 * @global array $g_notify_flags
 */
$g_notify_flags['new'] = array(
	'bugnotes' => OFF,
	'monitor'  => OFF
);

$g_notify_flags['monitor'] = array(
	'reporter'      => OFF,
	'handler'       => OFF,
	'monitor'       => OFF,
	'bugnotes'      => OFF,
	'explicit'      => ON,
	'threshold_min' => NOBODY,
	'threshold_max' => NOBODY
);

/**
 * 用戶是否收到自己操作的郵件
 * @global integer $g_email_receive_own
 */
$g_email_receive_own = OFF;

/**
 * 郵件地址驗證
 *
 * 確定是否驗證電子郵件地址
 * - 預設為 ON，則驗證規則由 HTML5 標簽驗證。
 *   {@link http://www.w3.org/TR/html5/forms.html#valid-e-mail-address}
 * - OFF 時，關閉驗證
 *
 * 註意，當使用 LDAP 電子郵件時（即 $g_use_ldap_email = ON），驗證不會執行。
 * @see $g_use_ldap_email
 *
 * @global integer $g_validate_email
 */
$g_validate_email = ON;

/**
 * 是否啟用電子郵件密碼登錄
 *
 * @global integer $g_email_login_enabled
 */
$g_email_login_enabled = OFF;

/**
 * 確保電子郵件地址是唯一的
 *
 * @global integer $g_email_ensure_unique
 */
$g_email_ensure_unique = ON;

/**
 * 設置為 OFF 來禁用電子郵件檢查
 * @global integer $g_check_mx_record
 */
$g_check_mx_record = OFF;

/**
 * 如果為 ON，則允許用戶忽略電子郵件字段
 * 如果您允許用戶註冊，則無論此值多少，都需要指定電子郵件，否則他們不會得到他們的密碼。
 * @global integer $g_allow_blank_email
 */
$g_allow_blank_email = ON;

/**
 * 只允許發送到指定域
 * 示例：
 * $g_limit_email_domains		= array( 'users.sourceforge.net', 'sourceforge.net' );
 * @global array $g_limit_email_domains
 */
$g_limit_email_domains = array();

/**
 * 指定獲取 mailto: 鏈接所需訪問級別
 * @global integer $g_show_user_email_threshold
 */
$g_show_user_email_threshold = NOBODY;

/**
 * 指定用戶視圖上查看實名所需訪問級別
 * @global integer $g_show_user_realname_threshold
 */
$g_show_user_realname_threshold = NOBODY;

/**
 * 選擇發送方式：
 * PHPMAILER_METHOD_MAIL - mail()
 * PHPMAILER_METHOD_SENDMAIL - sendmail
 * PHPMAILER_METHOD_SMTP - SMTP
 * @global integer $g_phpMailer_method
 */
$g_phpMailer_method = PHPMAILER_METHOD_MAIL;

/**
 * 遠程 SMTP 主機
 * 多個主機名間用;分隔
 * 你可以為每個主機指定端口，使用格式：
 * [主機地址:端口] (如 "smtp1.example.com:25;smtp2.example.com").
 * 將按指定順序連接主機
 * 註意：這僅適用於 PHPMAILER_METHOD_SMTP
 * @see $g_smtp_port
 * @global string $g_smtp_host
 */
$g_smtp_host = 'localhost';

/**
 * SMTP 服務器認證用戶
 * 如果主機不需要驗證，請設置為空
 * @see $g_smtp_password
 * @global string $g_smtp_username
 */
$g_smtp_username = '';

/**
 * SMTP 服務器認證密碼
 * Not used when $g_smtp_username = ''
 * @see $g_smtp_username
 * @global string $g_smtp_password
 */
$g_smtp_password = '';

/**
 * 允許與 SMTP 服務器的安全連接
 * 有效值為空，則為不加密，值 'ssl' 或 'tls'
 * @global string $g_smtp_connection_mode
 */
$g_smtp_connection_mode = '';

/**
 * 預設 SMTP 端口
 * 常用端口是 25 和 587.
 * 這可針對指定主機單獨覆蓋。
 * @see $g_smtp_host
 * @global integer $g_smtp_port
 */
$g_smtp_port = 25;

/**
 * 建議使用 cronjob 或調度程序來發送電子郵件。cronjob 通常每5分鐘運行一次。
 * 如果沒有 cronjob，則用戶不得不在執行觸發通知動作後發送電子郵件，這會降低用戶體驗。
 * @global integer $g_email_send_using_cronjob
 */
$g_email_send_using_cronjob = OFF;

/**
 * 電子郵件分隔符和填充
 * @global string $g_email_separator1
 */
$g_email_separator1 = str_pad('', 70, '=');
/**
 * 電子郵件分隔符和填充
 * @global string $g_email_separator2
 */
$g_email_separator2 = str_pad('', 70, '-');
/**
 * 電子郵件分隔符和填充
 * @global integer $g_email_padding_length
 */
$g_email_padding_length	= 28;

###########################
# MantisBT Version String #
###########################

/**
 * 預設為 OFF，不向用戶展示版本信息
 * @global integer $g_show_version
 */
$g_show_version = OFF;

/**
 * MantisBT 版本附加信息
 * @global string $g_version_suffix
 */
$g_version_suffix = '';

/**
 * 自定義版權和許可聲明，用於在頁面底部顯示。
 * 內容在<address> 元素中，你必須使用 &amp; 代替 &。
 * @global string $g_copyright_statement
 */
$g_copyright_statement = '';

##############################
# MantisBT 語言設置 #
##############################

/**
 * 如果設置為 auto，則，自動判斷語言（根據瀏覽器語言首選項）
 * @global string $g_default_language
 */
$g_default_language = 'auto';

/**
 * 列出允許用戶選擇的語言列表
 * @global array $g_language_choices_arr
 */
$g_language_choices_arr = array(
	'auto',
	'afrikaans',
	'amharic',
	'arabic',
	'arabicegyptianspoken',
	'asturian',
	'belarusian_tarask',
	'breton',
	'bulgarian',
	'catalan',
	'chinese_simplified',
	'chinese_traditional',
	'croatian',
	'czech',
	'danish',
	'dutch',
	'english',
	'estonian',
	'finnish',
	'french',
	'galician',
	'german',
	'greek',
	'hebrew',
	'hungarian',
	'icelandic',
	'interlingua',
	'italian',
	'japanese',
	'korean',
	'latvian',
	'lithuanian',
	'macedonian',
	'norwegian_bokmal',
	'norwegian_nynorsk',
	'occitan',
	'polish',
	'portuguese_brazil',
	'portuguese_standard',
	'ripoarisch',
	'romanian',
	'russian',
	'serbian',
	'slovak',
	'slovene',
	'spanish',
	'swissgerman',
	'swedish',
	'tagalog',
	'turkish',
	'ukrainian',
	'urdu',
	'vietnamese',
	'volapuk',
);

/**
 * 設置 auto 時，瀏覽器語言映射
 * @global array $g_language_auto_map
 */
$g_language_auto_map = array(
	'af' => 'afrikaans',
	'am' => 'amharic',
	'ar' => 'arabic',
	'arz' => 'arabicegyptianspoken',
	'ast' => 'asturian',
	'be-tarask' => 'belarusian_tarask',
	'bg' => 'bulgarian',
	'br' => 'breton',
	'ca' => 'catalan',
	'zh-cn, zh-sg, zh' => 'chinese_simplified',
	'zh-hk, zh-tw' => 'chinese_traditional',
	'cs' => 'czech',
	'da' => 'danish',
	'nl-be, nl' => 'dutch',
	'en-us, en-gb, en-au, en' => 'english',
	'et' => 'estonian',
	'fi' => 'finnish',
	'fr-ca, fr-be, fr-ch, fr' => 'french',
	'gl' => 'galician',
	'gsw' => 'swissgerman',
	'de-de, de-at, de-ch, de' => 'german',
	'he' => 'hebrew',
	'hu' => 'hungarian',
	'hr' => 'croatian',
	'is' => 'icelandic',
	'ia' => 'interlingua',
	'it-ch, it' => 'italian',
	'ja' => 'japanese',
	'ko' => 'korean',
	'ksh' => 'ripoarisch',
	'lt' => 'lithuanian',
	'lv' => 'latvian',
	'mk' => 'macedonian',
	'no' => 'norwegian_bokmal',
	'nn' => 'norwegian_nynorsk',
	'oc' => 'occitan',
	'pl' => 'polish',
	'pt-br' => 'portuguese_brazil',
	'pt' => 'portuguese_standard',
	'ro-mo, ro' => 'romanian',
	'ru-mo, ru-ru, ru-ua, ru' => 'russian',
	'sr' => 'serbian',
	'sk' => 'slovak',
	'sl' => 'slovene',
	'es-mx, es-co, es-ar, es-cl, es-pr, es' => 'spanish',
	'sv-fi, sv' => 'swedish',
	'tl' => 'tagalog',
	'tr' => 'turkish',
	'uk' => 'ukrainian',
	'vi' => 'vietnamese',
	'vo' => 'volapuk',
);

/**
 * 備用語言選擇
 * @global string $g_fallback_language
 */
$g_fallback_language = 'english';

#############################
# MantisBT 顯示設置 #
#############################

/**
 * 瀏覽器標題
 * @global string $g_window_title
 */
$g_window_title = 'MantisBT';

/**
 * OpenSearch 引擎標題前綴
 * 用於描述瀏覽器搜索條目，盡可能短，以便插入到 'opensearch_XXX_short' 語言字符串中，生成的文本為 16 字符或更少，
 * 以符合 OpenSearch 中定義的ShortName 元素限制規範。
 * @link http://www.opensearch.org/Specifications/OpenSearch/1.1
 * @see $g_window_title
 * @global string $g_search_title
 */
$g_search_title = '%window_title%';

/**
 * 檢查管理目錄、數據庫升級等
 * @global integer $g_admin_checks
 */
$g_admin_checks = ON;

/**
 * Favicon 圖像
 * 圖標為 image/x-icon MIME 類型，大小 16*16像素。
 * @global string $g_favicon_image
 */
$g_favicon_image = 'images/favicon.ico';

/**
 * Logo
 * @global string $g_logo_image
 */
$g_logo_image = 'images/mantis_logo.png';

/**
 * Logo URL 鏈接
 * @global string $g_logo_url
 */
$g_logo_url = '%default_home_page%';

/**
 * 是否啟用項目文檔支持
 * 此功能已棄用，預計將移到插件中。
 * @see $g_view_proj_doc_threshold
 * @see $g_upload_project_file_threshold
 * @global integer $g_enable_project_documentation
 */
$g_enable_project_documentation = OFF;

/**
 * 在底部顯示菜單，頂部菜單仍會保留。
 * @global integer $g_show_footer_menu
 */
$g_show_footer_menu = OFF;

/**
 * 顯示額外的菜單欄與所有可用的項目
 * @global integer $g_show_project_menu_bar
 */
$g_show_project_menu_bar = OFF;

/**
 * 顯示分配的名稱
 * 這是查看所有頁面
 * @global integer $g_show_assigned_names
 */
$g_show_assigned_names = ON;

/**
 * 將優先級顯示為圖標
 * OFF: 優先級顯示為圖標
 * ON:  優先級顯示為文本
 * @global integer $g_show_priority_text
 */
$g_show_priority_text = OFF;

/**
 * 定義錯誤顯示級別，-1 禁用錯誤顯示
 * @global integer $g_priority_significant_threshold
 */
$g_priority_significant_threshold = HIGH;

/**
 * 定義錯誤嚴重性級別，-1 禁用該功能
 * @global integer $g_severity_significant_threshold
 */
$g_severity_significant_threshold = MAJOR;

/**
 * 在“查看問題頁”中包含預設的列。

 * 它可以被重寫，可以使用管理 - >管理配置 - >管理列來覆蓋；用戶可以使用我的帳戶 - >管理列配置自己的列。
 * 如果這裏指定的某些列與其他配置沖突，可以自動刪除。
 * 或者，如果當前用戶沒有必要的訪問級別來查看它們。
 * 例如，如果讚助者已停用，則將移除sponsorship_total。 要包括自定義字段“xyz”，請將列名稱包含為“custom_xyz”。
 *
 * 標準列名稱（以下可供選擇）：
 * id, project_id, reporter_id, handler_id, duplicate_id, priority, severity,
 * reproducibility, status, resolution, category_id, date_submitted, last_updated,
 * os, os_build, platform, version, fixed_in_version, target_version, view_state,
 * summary, sponsorship_total, due_date, description, steps_to_reproduce,
 * additional_info, attachment_count, bugnotes_count, selection, edit,
 * overdue
 *
 * @global array $g_view_issues_page_columns
 */
$g_view_issues_page_columns = array (
	'selection', 'edit', 'priority', 'id', 'sponsorship_total',
	'bugnotes_count', 'attachment_count', 'category_id', 'severity', 'status',
	'last_updated', 'summary'
);

/**
 * 在打印問題頁中包含的預設列。
 * 它可以被重寫，使用管理-管理配置-管理列。用戶可以配置自己使用我的賬戶-> 管理列。
 * @global array $g_print_issues_page_columns
 */
$g_print_issues_page_columns = array (
	'selection', 'priority', 'id', 'sponsorship_total', 'bugnotes_count',
	'attachment_count', 'category_id', 'severity', 'status', 'last_updated',
	'summary'
);

/**
 * CSV導出時預設列。
 * 使用管理 ->管理配置 ->管理列覆蓋。此外，用戶都可以使用我的帳戶 -> 管理列配置自己的列。
 * @global array $g_csv_columns
 */
$g_csv_columns = array (
	'id', 'project_id', 'reporter_id', 'handler_id', 'priority',
	'severity', 'reproducibility', 'version', 'projection', 'category_id',
	'date_submitted', 'eta', 'os', 'os_build', 'platform', 'view_state',
	'last_updated', 'summary', 'status', 'resolution', 'fixed_in_version'
);

/**
 * Excel 導出預設列。
 * 使用管理 ->管理配置 ->管理列覆蓋。此外，用戶都可以使用我的帳戶 -> 管理列配置自己的列。
 * @global array $g_excel_columns
 */
$g_excel_columns = array (
	'id', 'project_id', 'reporter_id', 'handler_id', 'priority', 'severity',
	'reproducibility', 'version', 'projection', 'category_id',
	'date_submitted', 'eta', 'os', 'os_build', 'platform', 'view_state',
	'last_updated', 'summary', 'status', 'resolution', 'fixed_in_version'
);

/**
 * 在“所有項目”模式下顯示項目
 * @global integer $g_show_bug_project_links
 */
$g_show_bug_project_links = ON;

/**

 * 顯示BUG圖例。
 * 包含錯誤狀態 x% 新BUG，y% 分配的。如果設置為 ON，將在圖例下顯示。
 * @global integer $g_status_percentage_legend
 */
$g_status_percentage_legend = OFF;

/**
 * 過濾框顯示位置： POSITION_*
 * POSITION_TOP, POSITION_BOTTOM, 或 POSITION_NONE , 無
 * @global integer $g_filter_position
 */
$g_filter_position = FILTER_POSITION_TOP;

/**
 * 查看問題時操作按鈕的位置。
 * 值有：POSITION_TOP, POSITION_BOTTOM, 或 POSITION_BOTH
 * @global integer $g_action_button_position
 */
$g_action_button_position = POSITION_BOTTOM;

/**
 * 在創建、查看、更新界面顯示產品版本
 * ON 即使沒有定義也會顯示
 * OFF 不顯示
 * AUTO 如果沒有定義項目版本，則不顯示，否則顯示
 * @global integer $g_show_product_version
 */
$g_show_product_version = AUTO;

/**
 * 用戶看到產品版本發布日期的訪問級別閾值。
 * 日期將顯示在產品版本旁邊，目標版本並固定在版本字段中。 將此閾值設置為NOBODY以禁用該功能。
 * @global integer $g_show_version_dates_threshold
 */
$g_show_version_dates_threshold = NOBODY;

/**
 * 顯示用戶真實姓名
 * @global integer $g_show_realname
 */
$g_show_realname = OFF;

/**
 * 現在離開
 * @global integer $g_differentiate_duplicates
 */
$g_differentiate_duplicates = OFF;

/**
 * 下拉列表名稱排序，如果打開，將按名稱排序。
 * with the "D"s
 * @global integer $g_sort_by_last_name
 */
$g_sort_by_last_name = OFF;

/**
 * 顯示用戶頭像
 * @global integer $g_show_avatar
 * @see $g_show_avatar_threshold
 */
$g_show_avatar = OFF;

/**
 * 超出此值用戶才會顯示頭像
 * @global integer $g_show_avatar_threshold
 */
$g_show_avatar_threshold = DEVELOPER;

/**
 * 在修改日志上顯示發布日期
 * @global integer $g_show_changelog_dates
 */
$g_show_changelog_dates = ON;

/**
 * 在路線圖上顯示發布日期
 * @global integer $g_show_roadmap_dates
 */
$g_show_roadmap_dates = ON;

##########################
# MantisBT 時間設置 #
##########################

/**
 * Cookie 過期時間
 * @global integer $g_cookie_time_length
 */
$g_cookie_time_length = 30000000;

/**
 * 允許用戶選擇永久 cookie
 * 登錄時，選中“在該瀏覽器保存我的登錄狀態”時
 * @see $g_cookie_time_length
 * @global integer $g_allow_permanent_cookie
 */
$g_allow_permanent_cookie = ON;

/**
 * 頁面超時時間
 * 如果為 0，則不限制執行時間。（單位：秒）
 * @global integer $g_long_process_timeout
 */
$g_long_process_timeout = 0;

##########################
# MantisBT 日期設置 #
##########################

/**
 * 短日期格式 預設為ISO 8601格式。
 * 有關日期格式的詳細說明
 * @see https://secure.php.net/manual/zh/function.date.php
 * @global string $g_short_date_format
 */
$g_short_date_format = 'Y-m-d';

/**
 * 標準日期格式 預設為ISO 8601格式。
 * 有關日期格式的詳細說明
 * @see https://secure.php.net/manual/zh/function.date.php
 * @global string $g_normal_date_format
 */
$g_normal_date_format = 'Y-m-d H:i';

/**
 * 完成日期格式 預設為ISO 8601格式。
 * 有關日期格式的詳細說明
 * @see https://secure.php.net/manual/zh/function.date.php
 * @global string $g_complete_date_format
 */
$g_complete_date_format = 'Y-m-d H:i T';

/**
 * 日期時間選擇器
 * 有關日期格式的詳細說明
 * @see http://momentjs.com/docs/#/displaying/format/
 * @global string $g_datetime_picker_format
 */
$g_datetime_picker_format = 'Y-MM-DD HH:mm';


##############################
# MantisBT 時區設置 #
##############################

/**
 * 預設時區
 *
 * 此配置通常在安裝時，用於初始化。值有：
 * {@link http://php.net/timezones List of Supported Timezones}.
 * 如果此配置為空，時區將通過調用進行初始化
 * {@link http://php.net/date-default-timezone-get date_default_timezone_get()}
 *（註意這個函數的行為在PHP 5.4.0中修改），如果無法確定時區，它將使用“UTC”。
 * 可以通過運行管理檢查來確認此變數的正確配置。
 * 用戶可以在其首選項下覆蓋預設時區。
 *
 * @global string $g_default_timezone
 */
$g_default_timezone = '';

##########################
# MantisBT 新聞設置 #
##########################

/**
 * 是否啟用新聞功能
 * 此功能已棄用，預計會移入插件中.
 */
$g_news_enabled = OFF;

/**
 * 限制新聞數量
 * 限制條目數或日期
 * BY_LIMIT - 限制條目數
 * BY_DATE - 限制日期
 * @global integer $g_news_limit_method
 */
$g_news_limit_method = BY_LIMIT;

/**
 * 限制條目數
 * @global integer $g_news_view_limit
 */
$g_news_view_limit = 7;

/**
 * 限制天數
 * @global integer $g_news_view_limit_days
 */
$g_news_view_limit_days = 30;

/**
 * 用於查看私人消息權限
 * @global integer $g_private_news_threshold
 */
$g_private_news_threshold = DEVELOPER;

################################
# MantisBT 預設首選項 #
################################

/**
 * 註冊預設
 * 查看 constant_inc.php 中定義
 * @global integer $g_default_new_account_access_level
 */
$g_default_new_account_access_level = REPORTER;

/**
 * 預設項目視圖狀態 (VS_PUBLIC 或 VS_PRIVATE)
 * @global integer $g_default_project_view_status
 */
$g_default_project_view_status = VS_PUBLIC;

/**
 * 預設BUG 視圖狀態 (VS_PUBLIC 或 VS_PRIVATE)
 * @global integer $g_default_bug_view_status
 */
$g_default_bug_view_status = VS_PUBLIC;

/**
 * 重現步驟/註釋預設值。
 * @global string $g_default_bug_steps_to_reproduce
 */
$g_default_bug_steps_to_reproduce = '';

/**
 * 附加信息字段的預設值。
 * @global string $g_default_bug_additional_info
 */
$g_default_bug_additional_info = '';

/**
 * 預設註釋視圖狀態 (VS_PUBLIC 或 VS_PRIVATE)
 * @global integer $g_default_bugnote_view_status
 */
$g_default_bugnote_view_status = VS_PUBLIC;

/**
 * 報告新錯誤時的預設錯誤解決方式
 * @global integer $g_default_bug_resolution
 */
$g_default_bug_resolution = OPEN;

/**
 * 報告新錯誤時的預設錯誤嚴重性
 * @global integer $g_default_bug_severity
 */
$g_default_bug_severity = MINOR;

/**
 * 報告新錯誤時的預設錯誤優先級
 * @global integer $g_default_bug_priority
 */
$g_default_bug_priority = NORMAL;

/**
 * 報告新錯誤時的預設錯誤重現方式
 * @global integer $g_default_bug_reproducibility
 */
$g_default_bug_reproducibility = REPRODUCIBILITY_HAVENOTTRIED;

/**
 * 報告新錯誤時的預設處理方式
 * @global integer $g_default_bug_projection
 */
$g_default_bug_projection = PROJECTION_NONE;

/**
 * 報告新錯誤時的預設估計完成時間
 * @global integer $g_default_bug_eta
 */
$g_default_bug_eta = ETA_NONE;

/**
 * 克隆時，新bug與其父級之間的預設關系
 * @global integer $g_default_bug_relationship_clone
 */
$g_default_bug_relationship_clone = BUG_REL_NONE;

/**
 * 預設為新的bug關系
 * @global integer $g_default_bug_relationship
 */
$g_default_bug_relationship = BUG_RELATED;

/**
 * 將 BUG 從項目中移到無類別時，預設全局類型，預設為1，將在數據中創建常規類別。
 */
$g_default_category_for_moves = 1;

/**
 *
 * @global integer $g_default_limit_view
 */
$g_default_limit_view = 50;

/**
 *
 * @global integer $g_default_show_changed
 */
$g_default_show_changed = 6;

/**
 *
 * @global integer $g_hide_status_default
 */
$g_hide_status_default = CLOSED;

/**
 *
 * @global string $g_show_sticky_issues
 */
$g_show_sticky_issues = ON;

/**
 * 操作間隔（分鐘）
 * @global integer $g_min_refresh_delay
 */
$g_min_refresh_delay = 10;

/**
 * 分鐘
 * @global integer $g_default_refresh_delay
 */
$g_default_refresh_delay = 30;

/**
 * 秒
 * @global integer $g_default_redirect_delay
 */
$g_default_redirect_delay = 2;

/**
 *
 * @global string $g_default_bugnote_order
 */
$g_default_bugnote_order = 'ASC';

/**
 *
 * @global integer $g_default_email_on_new
 */
$g_default_email_on_new = ON;

/**
 *
 * @global integer $g_default_email_on_assigned
 */
$g_default_email_on_assigned = ON;

/**
 *
 * @global integer $g_default_email_on_feedback
 */
$g_default_email_on_feedback = ON;

/**
 *
 * @global integer $g_default_email_on_resolved
 */
$g_default_email_on_resolved = ON;

/**
 *
 * @global integer $g_default_email_on_closed
 */
$g_default_email_on_closed = ON;

/**
 *
 * @global integer $g_default_email_on_reopened
 */
$g_default_email_on_reopened = ON;

/**
 *
 * @global integer $g_default_email_on_bugnote
 */
$g_default_email_on_bugnote = ON;

/**
 * @todo Unused
 * @global integer $g_default_email_on_status
 */
$g_default_email_on_status = 0;

/**
 * @todo Unused
 * @global integer $g_default_email_on_priority
 */
$g_default_email_on_priority = 0;

/**
 * 任意
 * @global integer $g_default_email_on_new_minimum_severity
 */
$g_default_email_on_new_minimum_severity = OFF;

/**
 * 任意
 * @global integer $g_default_email_on_assigned_minimum_severity
 */
$g_default_email_on_assigned_minimum_severity = OFF;

/**
 * 任意
 * @global integer $g_default_email_on_feedback_minimum_severity
 */
$g_default_email_on_feedback_minimum_severity = OFF;

/**
 * 任意
 * @global integer $g_default_email_on_resolved_minimum_severity
 */
$g_default_email_on_resolved_minimum_severity = OFF;

/**
 * 任意
 * @global integer $g_default_email_on_closed_minimum_severity
 */
$g_default_email_on_closed_minimum_severity = OFF;

/**
 * 任意
 * @global integer $g_default_email_on_reopened_minimum_severity
 */
$g_default_email_on_reopened_minimum_severity = OFF;

/**
 * 任意
 * @global integer $g_default_email_on_bugnote_minimum_severity
 */
$g_default_email_on_bugnote_minimum_severity = OFF;

/**
 * 任意
 * @global integer $g_default_email_on_status_minimum_severity
 */
$g_default_email_on_status_minimum_severity = OFF;

/**
 * @todo 未使用
 * @global integer $g_default_email_on_priority_minimum_severity
 */
$g_default_email_on_priority_minimum_severity = OFF;

/**
 *
 * @global integer $g_default_email_bugnote_limit
 */
$g_default_email_bugnote_limit = 0;

#############################
# MantisBT 摘要設置 #
#############################

/**
 * 顯示多少個報告者
 * @global integer $g_reporter_summary_limit
 */
$g_reporter_summary_limit = 10;

/**
 * 摘要時期顯示長度
 * 以計算錯誤（單位：天）
 * @global array $g_date_partitions
 */
$g_date_partitions = array( 1, 2, 3, 7, 30, 60, 90, 180, 365);

/**
 * 當前選擇“所有項目”時顯示“[項目]類別”，否則只顯示“類別名稱”
 * @global integer $g_summary_category_include_project
 */
$g_summary_category_include_project = OFF;

/**
 * 查看摘要權限
 * @global integer $g_view_summary_threshold
 */
$g_view_summary_threshold = MANAGER;

/**
 * 定義根據BUG嚴重性確定報告者報告BUG有效性。
 * 更高的值將導致BUG有效性增加。
 * @global array $g_severity_multipliers
 */
$g_severity_multipliers = array(
	FEATURE => 1,
	TRIVIAL => 2,
	TEXT    => 3,
	TWEAK   => 2,
	MINOR   => 5,
	MAJOR   => 8,
	CRASH   => 8,
	BLOCK   => 10
);

/**
 * 定義根據錯誤解決者來確定報告BUG有效性。更高的值將造成BUG有效性降低。
 * $g_bug_resolution_not_fixed_threshold.
 * @global array $g_resolution_multipliers
 */
$g_resolution_multipliers = array(
	UNABLE_TO_DUPLICATE => 2,
	NOT_FIXABLE         => 1,
	DUPLICATE           => 3,
	NOT_A_BUG           => 5,
	SUSPENDED           => 1,
	WONT_FIX            => 1
);

#############################
# MantisBT 註釋設置 #
#############################

/**
 * 註釋排序
 * 值有：ASC 或 DESC
 * @global string $g_bugnote_order
 */
$g_bugnote_order = 'DESC';

#################################
# MantisBT BUG 歷史記錄設置 #
#################################

/**
 * 預設情況下，當查看BUG時，錯誤歷史可見
 * 值有：ON 或 OFF
 * @global integer $g_history_default_visible
 */
$g_history_default_visible = ON;

/**
 * BUG歷史排序
 * 值有：ASC 或 DESC
 * @global string $g_history_order
 */
$g_history_order = 'ASC';

##########################################
# MantisBT 提醒和提及設置 #
##########################################

/**
 * 註釋存儲時提醒
 * @global integer $g_store_reminders
 */
$g_store_reminders = ON;

/**
 * 自動添加收件人到監視列表
 * 如果他們不是該處理者或報告者（將會得到提醒），
 * 如果收件人低於通知級別，將不會添加。
 * @global integer $g_reminder_recipients_monitor_bug
 */
$g_reminder_recipients_monitor_bug = ON;

/**
 * 預設提醒查看狀態 (VS_PUBLIC 或 VS_PRIVATE)
 * @global integer $g_default_reminder_view_status
 */
$g_default_reminder_view_status = VS_PUBLIC;

/**
 * 接收提醒的用戶列表中最低級別。該級別是項目訪問級別。
 * @global integer $g_reminder_receive_threshold
 */
$g_reminder_receive_threshold = DEVELOPER;

/**
 * 啟用/禁用 @提到 功能
 *
 * @global integer $g_mentions_enabled
 */
$g_mentions_enabled = ON;

/**
 * 用於提到標記。
 * @var string $g_mentions_tag
 */
$g_mentions_tag = '@';

#################################
# MantisBT 讚助設置 #
#################################

/**
 * 是否啟用/禁用問題讚助功能
 * @global integer $g_enable_sponsorship
 */
$g_enable_sponsorship = OFF;

/**
 * 用於讚助所用貨幣
 * @global string $g_sponsorship_currency
 */
$g_sponsorship_currency = 'US$';

/**
 * 用戶查看總讚助，所需級別
 * @global integer $g_view_sponsorship_total_threshold
 */
$g_view_sponsorship_total_threshold = VIEWER;

/**
 * 查看讚助列表用戶所需級別及讚助金額。
 * @global integer $g_view_sponsorship_details_threshold
 */
$g_view_sponsorship_details_threshold = VIEWER;

/**
 * 達此此級別，才允許用戶讚助問題
 * @global integer $g_sponsor_threshold
 */
$g_sponsor_threshold = REPORTER;

/**
 * 處理讚助問題級別
 * @global integer $g_handle_sponsored_bugs_threshold
 */
$g_handle_sponsored_bugs_threshold = DEVELOPER;

/**
 * 訪問級別 >= 'handle_sponsored_bugs_threshold' 分配讚助問題
 * @global integer $g_assign_sponsored_bugs_threshold
 */
$g_assign_sponsored_bugs_threshold = MANAGER;

/**
 * 最低讚助金額。如果小於此值，將會提示錯誤
 * @global integer $g_minimum_sponsorship_amount
 */
$g_minimum_sponsorship_amount = 5;

#################################
# MantisBT 上傳文件配置 #
#################################

/**
 * --- 上傳文件配置 --------
 * 這是禁用文件上傳的總配置
 *
 * 如果您要允許文件上傳，您還必須確保它們 php.ini 中 file_uploads = TRUE
 *
 * 查看: $g_upload_project_file_threshold, $g_upload_bug_file_threshold,
 *   $g_allow_reporter_upload
 * @global integer $g_allow_file_upload
 */
$g_allow_file_upload = ON;

/**
 * 上傳文件到
 * DISK 或 DATABASE. FTP 已棄用，將直接上傳到 DISK
 * @global integer $g_file_upload_method
 */
$g_file_upload_method = DATABASE;

/**
 * 使用 dropzone：啟用拖放到文件上傳區域功能
 * @global integer $g_dropzone_enabled
 */
$g_dropzone_enabled = ON;

/**
 * 當使用DISK存儲上傳的文件時，此設置控制其在Web服務器上的訪問權限：
 * 預設值（0400）文件將是只讀的，
 * 並且只能由運行apache進程的用戶訪問（在Linux中可能是“apache”，在Windows中可能是“Administrator”）。

 * 有關unix權限的更多詳細信息：
 * http://www.perlfect.com/articles/chmod.shtml
 * @global integer $g_attachments_file_permissions
 */
$g_attachments_file_permissions = 0400;

/**
 * 可上傳文件大小上限
 * 也檢查你的PHP設置（預設通常是2MB）
 * @global integer $g_max_file_size
 */
$g_max_file_size = 5000000;

/**
 * 同時上傳文件數量上限
 * @global integer $g_file_upload_max_num
 */
$g_file_upload_max_num = 10;

/**
 * 允許或不允許的文件。 用逗號分隔項目。
 * 如 'php,html,java,exe,pl'
 * $g_allowed_files 有值，則其他類型不允許上傳
 * $g_disallowed_files takes precedence over $g_allowed_files
 * @global string $g_allowed_files
 */
$g_allowed_files = '';

/**
 * 禁止上傳的文件
 * @global string $g_disallowed_files
 */
$g_disallowed_files = '';

/**
 * 前綴用於上傳文件到項目的文件名稱。
 * 如: doc-001-myprojdoc.zip
 * @global string $g_document_files_prefix
 * @deprecated since 1.0, file names have been stored in a new format
 */
$g_document_files_prefix = 'doc';

/**
 * 預設上傳文件夾的絕對路徑。需要有 / 或 \
 * @global string $g_absolute_path_default_upload_folder
 */
$g_absolute_path_default_upload_folder = '';

/**
 * 啟用 X-Sendfile 方式下載文件
 * 支持這個方式的服務器軟件包括 Lighttpd、Cherokee及Apache 啟用 mod_xsendfile 和 nginx。
 * 你可能需要設置 file_download_xsendfile_header_name 選項在你的服務器。
 * @global integer $g_file_download_method
 */
$g_file_download_xsendfile_enabled = OFF;

/**
 * 需要使用 X-Sendfile 頭名稱。
 * 每個服務器使用不同的頭以實現此功能，因此命名約定不同。
 * Lighttpd從v1.5，Apache與mod_xsendfile和Cherokee Web服務器使用X-Sendfile。
 * nginx使用X-Accel-Redirect和Lighttpd v1.4使用X-LIGHTTPD-send-file。
 * @global string $g_file_download_xsendfile_header_name
 */
$g_file_download_xsendfile_header_name = 'X-Sendfile';

##########################
# MantisBT HTML 設置 #
##########################

/**
 * 將 URL 和電子郵件地址轉換為 HTML 鏈接。
 * 此標記控制是否將 URL 和電子郵件地址轉換為可以點擊的鏈接。
 *
 * 選項有：
 * - OFF               不轉換
 * - LINKS_SAME_WINDOW 轉換鏈接到當前窗口 (預設)
 * - LINKS_NEW_WINDOW  轉換鏈接到新窗口
 * @global integer $g_html_make_links
 */
$g_html_make_links = LINKS_SAME_WINDOW;

/**
 * 這些是多行字段的有效 HTML 標記（如在描述中使用）
 * 不要包含img 標簽
 * 不要包含屬性
 * @global string $g_html_valid_tags
 */
$g_html_valid_tags = 'p, li, ul, ol, br, pre, i, b, u, em, strong';

/**
 * 這些是單行字段有效的 html 標記（如，在問題摘要中）
 * 不要包含img 標簽
 * 不要包含屬性
 * @global string $g_html_valid_tags_single_line
 */
$g_html_valid_tags_single_line = 'i, b, u, em, strong';

/**
 * 下拉菜單中描述最大長度（用於搜索）
 * 設置為0將禁用截斷
 * @global integer $g_max_dropdown_length
 */
$g_max_dropdown_length = 40;

/**
 * 此標記控制是否預格式化文本（由HTML前標簽界定）strings_api預設為 100字符，如果關閉，查看文本時會顯示很寬。
 * @global integer $g_wrap_in_preformatted_text
 */
$g_wrap_in_preformatted_text = ON;

#############################################
# MantisBT 驗證和 LDAP 設置 #
#############################################

/**
 * 登錄認證方法。 必須是其中之一
 * MD5, LDAP, BASIC_AUTH 或 HTTP_AUTH.
 * 註意：不要輕易修改加密方法，在安裝時應該仔細選擇，如果可能，MantisBT 將“回退”到較舊的方法。
 * @global integer $g_login_method
 */
$g_login_method = MD5;

/**
 * 管理區域需要重新驗證
 * @global integer $g_reauthentication
 */
$g_reauthentication = ON;

/**
 * 重新認證超時時間（單位：秒）
 * @global integer $g_reauthentication_expiry
 */
$g_reauthentication_expiry = TOKEN_EXPIRY_AUTHENTICATED;


/**
 * 指定要連接到的LDAP或Active Directory服務器。
 * 並且必須作為URI提供的協議，可以是ldap或ldaps之一。
 * 預設為ldap端口號為可選，預設為389。
 * 如果不工作，請嘗試使用以下標準端口號之一：636（ldaps）;
 * 對於Active Directory全局目錄林範圍搜索，請使用3268（ldap）或3269（ldaps）。
 *
 * 有效URI的示例：
 *
 *   ldap.example.com
 *   ldap.example.com:3268
 *   ldap://ldap.example.com/
 *   ldaps://ldap.example.com:3269/
 *
 * @global string $g_ldap_server
 */
$g_ldap_server = 'ldaps://ldap.example.com/';

/**
 * LDAP搜索根名稱
 * @global string $g_ldap_root_dn
 */
$g_ldap_root_dn = 'dc=example,dc=com';

/**
 * LDAP搜索過濾器
 * 如 '(organizationname=*Traffic)'
 * @global string $g_ldap_organization
 */
$g_ldap_organization = '';

/**
 * LDAP協議版本，如果為0，則不設置協議版本。
 * 對於Active Directory使用版本3。
 *
 * @global integer $g_ldap_protocol_version
 */
$g_ldap_protocol_version = 0;

/**
 * TCP連接到LDAP服務器的超時時間（單位：秒）。
 * 當 $g_ldap_server 中定義的主機名解析為多個IP地址時，
 * 將此值設置為低值，允許快速切換到下一個可用的LDAP服務器。預設為0（不超時）
 *
 * @global int $g_ldap_network_timeout
 */
$g_ldap_network_timeout = 0;

/**
 * 確定LDAP庫是否自動遵循LDAP服務器返回的引用。
 * 這映射到LDAP_OPT_REFERRALS ldap庫選項。
 * 對於Active Directory，應將此設置為OFF。
 *
 * @global integer $g_ldap_follow_referrals
 */
$g_ldap_follow_referrals = ON;

/**
 * 用於綁定到LDAP服務器帳戶名稱。
 * 示例： 'CN=ldap,OU=Administrators,DC=example,DC=com'.
 *
 * @global string $g_ldap_bind_dn
 */
$g_ldap_bind_dn = '';

/**
 * 用於綁定到LDAP服務器帳戶密碼。
 *
 * @global string $g_ldap_bind_passwd
 */
$g_ldap_bind_passwd = '';

/**
 * 用戶名的LDAP字段
 * 對 Active Directory 使用 'sAMAccountName'
 * @global string $g_ldap_uid_field
 */
$g_ldap_uid_field = 'uid';

/**
 * 用戶實際名稱（即通用名稱）的LDAP字段。
 * @global string $g_ldap_realname_field
 */
$g_ldap_realname_field = 'cn';

/**
 * 使用LDAP（ON）中指定的真實名稱，而不是數據庫中存儲的名稱（OFF）。
 * @global integer $g_use_ldap_realname
 */
$g_use_ldap_realname = OFF;

/**
 * 使用LDAP（ON）中指定的電子郵件地址，而不是數據庫中存儲的電子郵件地址（OFF）。
 * @global integer $g_use_ldap_email
 */
$g_use_ldap_email = OFF;

/**
 * 此配置選項允許用逗號分隔的文本文件替換ldap服務器以用於開發或測試目的。
 * LDAP模擬文件格式如下：
 *   - 每個用戶一行
 *   - 每行有4個逗號分隔的字段
 *        - username,
 *        - realname,
 *        - e-mail,
 *        - password
 *   - 任何額外的字段都被忽略
 * 在生產系統上，此選項應設置為空。
 * @global integer $g_ldap_simulation_file_path
 */
$g_ldap_simulation_file_path = '';

###################
# 狀態設置 #
###################

/**
 * 提交時分配給錯誤的狀態。
 * @global integer $g_bug_submit_status
 */
$g_bug_submit_status = NEW_;

/**
 * 分配時分配給錯誤的狀態。
 * @global integer $g_bug_assigned_status
 */
$g_bug_assigned_status = ASSIGNED;

/**
 * 重新打開時分配給錯誤的狀態。
 * @global integer $g_bug_reopen_status
 */
$g_bug_reopen_status = FEEDBACK;

/**
 * 當報告者反饋時，分配的狀態。
 * 一旦報告者添加了註釋，狀態將返回到 $g_bug_assigned_status 或 $g_bug_submit_status。
 * @global integer $g_bug_feedback_status
 */
$g_bug_feedback_status = FEEDBACK;

/**
 * 如果將註釋添加到當前 $g_bug_feedback_status。
 * 如果該 BUG 被指派給開發人員，並且註釋人員也報告人員，則將自動將BUG狀態設置為 $g_bug_submit_status 或 $g_bug_assigned_status。
 * 預設為啟用。
 * @global boolean $g_reassign_on_feedback
 */
$g_reassign_on_feedback = ON;

/**
 * 重新打開時指派給 bug 的解決方案。
 * @global integer $g_bug_reopen_resolution
 */
$g_bug_reopen_resolution = REOPENED;

/**
 * bug被創建副本時，預設錯誤解決方案。
 * @global integer $g_bug_duplicate_resolution
 */
$g_bug_duplicate_resolution = DUPLICATE;

/**
 * 如果其狀態為> =此狀態，則Bug變為只讀。
 如果重新打開並且狀態小於此值，則BUG允許被讀/寫。
 * @global integer $g_bug_readonly_status_threshold
 */
$g_bug_readonly_status_threshold = RESOLVED;

/**
 * Bug已解決，準備關閉或重新打開。
 * 在某些自定義安裝中，當將其移動到自定義（FIXED或TESTED）狀態時，
 * 會將該BUG視為已解決。
 * @global integer $g_bug_resolved_status_threshold
 */
$g_bug_resolved_status_threshold = RESOLVED;

/**
 * 解決方案，表示開發人員已經解決並成功修覆了一個 BUG，
 * 高於和 低於 $g_bug_resolution_not_fixed_threshold 被視為已解決。
 * @global integer $g_bug_resolution_fixed_threshold
 */
$g_bug_resolution_fixed_threshold = FIXED;

/**
 * 解決方案值表示 BUG已解決，而不由開發人員成功修覆。
 * 高於該值，表示無法解決或解決失敗。
 * @global integer $g_bug_resolution_not_fixed_threshold
 */
$g_bug_resolution_not_fixed_threshold = UNABLE_TO_DUPLICATE;

/**
 * BUG 已關閉。
 * 在某些自定義安裝中，當將錯誤移動到自定義（已完成或已修正）狀態時，將其視為已關閉。
 * @global integer $g_bug_closed_status_threshold
 */
$g_bug_closed_status_threshold = CLOSED;

/**
 * 每當向某人分配BUG時，自動將狀態設置為ASSIGNED。
 * 這對於在錯誤進行時使用分配狀態的安裝非常有用，而不僅僅是放在一個人的隊列中。
 * @global integer $g_auto_set_status_to_assigned
 */
$g_auto_set_status_to_assigned	= ON;

/**
 * 'status_enum_workflow'定義了工作流，並且反映了一個簡單的2維矩陣。
 * 對於每個現有狀態，您定義哪個狀態，您可以從該狀態進入。
 * 從 NEW_ 可以列出狀態 '10:new,20:feedback,30:acknowledged'。
 *
 * 以下示例可以直接在 config/config_inc.php 中使用：
 * $g_status_enum_workflow[NEW_]='20:feedback,30:acknowledged,40:confirmed,50:assigned,80:resolved';
 * $g_status_enum_workflow[FEEDBACK] ='10:new,30:acknowledged,40:confirmed,50:assigned,80:resolved';
 * $g_status_enum_workflow[ACKNOWLEDGED] ='20:feedback,40:confirmed,50:assigned,80:resolved';
 * $g_status_enum_workflow[CONFIRMED] ='20:feedback,50:assigned,80:resolved';
 * $g_status_enum_workflow[ASSIGNED] ='20:feedback,80:resolved,90:closed';
 * $g_status_enum_workflow[RESOLVED] ='50:assigned,90:closed';
 * $g_status_enum_workflow[CLOSED] ='50:assigned';
 * @global array $g_status_enum_workflow
 */
$g_status_enum_workflow = array();

############################
# Bug 附件設置 #
############################

/**
 * 指定魔術數據庫文件的文件名。
 * 這用於猜測文件的MIME類型。通常，將此設置保留為預設值（空白）是安全的，
 * 因為PHP通常能夠單獨找到此文件。
 * @global string $g_fileinfo_magic_db_file
 */
$g_fileinfo_magic_db_file = '';

/**
 * 指定在 bug 視圖頁面中預覽附件的最大大小 (以字節為單位)。
 * 要禁用預覽附件, 請將最大大小設置為0來。
 * @global integer $g_preview_attachments_inline_max_size
 */
$g_preview_attachments_inline_max_size = 256 * 1024;

/**
 * 可以直接查看的文本文件擴展名。
 * @global array $g_preview_text_extensions
 */
$g_preview_text_extensions = array(
	'', 'txt', 'diff', 'patch'
);

/**
 * 可以直接查看的圖片擴展名。
 * @global array $g_preview_image_extensions
 */
$g_preview_image_extensions = array(
	'bmp', 'png', 'gif', 'jpg', 'jpeg'
);

/**
 * 指定 自動預覽最大寬度。如果不應限制最大寬度, 則應將其設置為0。
 * @global integer $g_preview_max_width
 */
$g_preview_max_width = 0;

/**
 * 指定自動預覽功能的最大高度。如果不限制高度，應該將其設置為 0。
 * @global integer $g_preview_max_height
 */
$g_preview_max_height = 250;

/**
 * 查看 bug 附件所需的訪問級別。
 * 意味著查看附件的文件名、大小和時間戳。
 * @global integer $g_view_attachments_threshold
 */
$g_view_attachments_threshold = VIEWER;

/**
 * 可以直接查看的文件類型列表，使用,號分隔。並不是下載，而是在瀏覽器中查看。
 * @global string $g_inline_file_exts
 */
$g_inline_file_exts = 'gif,png,jpg,jpeg,bmp';

/**
 * 下載附件級別
 * @global integer $g_download_attachments_threshold
 */
$g_download_attachments_threshold = VIEWER;

/**
 * 刪除附件級別
 * @global integer $g_delete_attachments_threshold
 */
$g_delete_attachments_threshold = DEVELOPER;

/**
 * 允許用戶查看自己上傳的附件，即使他們的訪問級別低於 view_attachments_threshold
 * @global integer $g_allow_view_own_attachments
 */
$g_allow_view_own_attachments = ON;

/**
* 允許用戶下載自己上傳的附件，即使他們的訪問級別低於 download_attachments_threshold
 * @global integer $g_allow_download_own_attachments
 */
$g_allow_download_own_attachments = ON;

/**
 * 允許用戶刪除自己上傳的附件，即使他們的訪問級別低於 delete_attachments_threshold
 * @global integer $g_allow_delete_own_attachments
 */
$g_allow_delete_own_attachments = OFF;

####################
# 字段可見 #
####################

/**
 * 啟用 估計完成時間
 * @global integer $g_enable_eta
 */
$g_enable_eta = OFF;

/**
 * 啟用處理方式
 * @global integer $g_enable_projection
 */
$g_enable_projection = OFF;

/**
 * 啟用 產品Build
 * @global integer $g_enable_product_build
 */
$g_enable_product_build = OFF;

/**
 * 在錯誤報告頁面上顯示的可選字段數組。
 *
 * 允許以下可選字段：
 *   - additional_info
 *   - attachments
 *   - category_id
 *   - due_date
 *   - handler
 *   - os
 *   - os_version
 *   - platform
 *   - priority
 *   - product_build
 *   - product_version
 *   - reproducibility
 *   - resolution
 *   - severity
 *   - status
 *   - steps_to_reproduce
 *   - target_version
 *   - view_state
 *
 * 摘要和描述字段始終顯示，不需要在此選項中列出。
 * 上面未列出的字段不能顯示在錯誤報告頁面上。
 * 可以通過使用 "管理 = > 配置管理 => 管理列" 頁來設置每個項目。
 *
 * 此設置可以在每個項目的基礎上，通過使用管理 => 管理配置。
 *
 * @global array $g_bug_report_page_fields
 */
$g_bug_report_page_fields = array(
	'additional_info',
	'attachments',
	'category_id',
	'due_date',
	'handler',
	'os',
	'os_version',
	'platform',
	'priority',
	'product_build',
	'product_version',
	'reproducibility',
	'severity',
	'steps_to_reproduce',
	'tags',
	'target_version',
	'view_state',
);

/**
 * 要在 bug 視圖頁上顯示的可選字段的數組。
 *
 * 允許以下可選字段：
 *   - additional_info
 *   - attachments
 *   - category_id
 *   - date_submitted
 *   - description
 *   - due_date
 *   - eta
 *   - fixed_in_version
 *   - handler
 *   - id
 *   - last_updated
 *   - os
 *   - os_version
 *   - platform
 *   - priority
 *   - product_build
 *   - product_version
 *   - project
 *   - projection
 *   - reporter
 *   - reproducibility
 *   - resolution
 *   - severity
 *   - status
 *   - steps_to_reproduce
 *   - summary
 *   - tags
 *   - target_version
 *   - view_state
 *
 * 自定義字段，通過管理=>管理自定義字段進行處理。
 * administrator page.
 *
 * 可以通過使用 "管理 = > 配置管理 => 管理列" 頁來設置每個項目。
 *
 * @global array $g_bug_view_page_fields
 */
$g_bug_view_page_fields = array (
	'additional_info',
	'attachments',
	'category_id',
	'date_submitted',
	'description',
	'due_date',
	'eta',
	'fixed_in_version',
	'handler',
	'id',
	'last_updated',
	'os',
	'os_version',
	'platform',
	'priority',
	'product_build',
	'product_version',
	'project',
	'projection',
	'reporter',
	'reproducibility',
	'resolution',
	'severity',
	'status',
	'steps_to_reproduce',
	'summary',
	'tags',
	'target_version',
	'view_state',
);

/**
 * 在錯誤更新頁面上顯示的可選字段數組。
 *
 * 允許以下可選字段：
 *   - additional_info
 *   - category_id
 *   - date_submitted
 *   - description
 *   - due_date
 *   - eta
 *   - fixed_in_version
 *   - handler
 *   - id
 *   - last_updated
 *   - os
 *   - os_version
 *   - platform
 *   - priority
 *   - product_build
 *   - product_version
 *   - project
 *   - projection
 *   - reporter
 *   - reproducibility
 *   - resolution
 *   - severity
 *   - status
 *   - steps_to_reproduce
 *   - summary
 *   - target_version
 *   - view_state
 *
 * 可以通過使用 "管理 = > 配置管理 => 管理列" 頁來設置每個項目。
 *
 * @global array $g_bug_update_page_fields
 */
$g_bug_update_page_fields = array (
	'additional_info',
	'category_id',
	'date_submitted',
	'description',
	'due_date',
	'eta',
	'fixed_in_version',
	'handler',
	'id',
	'last_updated',
	'os',
	'os_version',
	'platform',
	'priority',
	'product_build',
	'product_version',
	'project',
	'projection',
	'reporter',
	'reproducibility',
	'resolution',
	'severity',
	'status',
	'steps_to_reproduce',
	'summary',
	'target_version',
	'view_state',
);

/**
 * An array of optional fields to show on the bug change status page. This
 * only changes the visibility of fields shown below the form used for
 * updating the status of an issue.
 *
 * 允許以下可選字段：
 *   - additional_info
 *   - attachments
 *   - category_id
 *   - date_submitted
 *   - description
 *   - due_date
 *   - eta
 *   - fixed_in_version
 *   - handler
 *   - id
 *   - last_updated
 *   - os
 *   - os_version
 *   - platform
 *   - priority
 *   - product_build
 *   - product_version
 *   - project
 *   - projection
 *   - reporter
 *   - reproducibility
 *   - resolution
 *   - severity
 *   - status
 *   - steps_to_reproduce
 *   - summary
 *   - tags
 *   - target_version
 *   - view_state
 *
 *
 * 可以通過使用 "管理 = > 配置管理 => 管理列" 頁來設置每個項目。
 *
 * @global array $g_bug_change_status_page_fields
 */
$g_bug_change_status_page_fields = array (
	'additional_info',
	'attachments',
	'category_id',
	'date_submitted',
	'description',
	'due_date',
	'eta',
	'fixed_in_version',
	'handler',
	'id',
	'last_updated',
	'os',
	'os_version',
	'platform',
	'priority',
	'product_build',
	'product_version',
	'project',
	'projection',
	'reporter',
	'reproducibility',
	'resolution',
	'severity',
	'status',
	'steps_to_reproduce',
	'summary',
	'tags',
	'target_version',
	'view_state',
);

##########################
# MantisBT 其他設置 #
##########################

/**
 * 報告BUG級別
 * @global integer $g_report_bug_threshold
 */
$g_report_bug_threshold = REPORTER;

/**
 * 更新BUG所需級別，即“更新 BUG”按鈕是否可用。
 * @global integer $g_update_bug_threshold
 */
$g_update_bug_threshold = UPDATER;

/**
 * 查看 bug 所需級別
 * @global integer $g_view_bug_threshold
 */
$g_view_bug_threshold = VIEWER;

/**
 * 監視 bug 所需級別
 * 需要需要配置不同的值，請查看 constant_inc.php 文件。
 * @global integer $g_monitor_bug_threshold
 */
$g_monitor_bug_threshold = REPORTER;

/**
 * 將其他用戶添加到 BUG 監測列表所需級別
 * 需要需要配置不同的值，請查看 constant_inc.php 文件。
 * @global integer $g_monitor_add_others_bug_threshold
 */
$g_monitor_add_others_bug_threshold = DEVELOPER;

/**
 * 從 BUG 監視列表中刪除其他用戶所需級別
 * 需要需要配置不同的值，請查看 constant_inc.php 文件。
 * @global integer $g_monitor_delete_others_bug_threshold
 */
$g_monitor_delete_others_bug_threshold = DEVELOPER;

/**
 * 查看私人 bug 所需的訪問級別
 * 需要需要配置不同的值，請查看 constant_inc.php 文件。
 * @global integer $g_private_bug_threshold
 */
$g_private_bug_threshold = DEVELOPER;

/**
 * BUG 分配人員列表級別
 * 即哪些人在分配列表中顯示，以供選擇
 * @global integer $g_handle_bug_threshold
 */
$g_handle_bug_threshold = DEVELOPER;

/**
 * 顯示分配給： bug_view*_page 按鈕或 bug_update*_page 分配列表
 * 這允許控制誰可以路由 bug
 * 預設為 $g_handle_bug_threshold
 * @global integer $g_update_bug_assign_threshold
 */
$g_update_bug_assign_threshold = '%handle_bug_threshold%';

/**
 * 查看私有註釋級別
 * 需要需要配置不同的值，請查看 constant_inc.php 文件。
 * @global integer $g_private_bugnote_threshold
 */
$g_private_bugnote_threshold = DEVELOPER;

/**
 * 查看處理程序中的 bug 報告和通知電子郵件所需級別
 * @todo yarick123: 實現電子郵件通知
 * @global integer $g_view_handler_threshold
 */
$g_view_handler_threshold = VIEWER;

/**
 * 查看歷史記錄在 bug 報告和電子郵件通知所需級別
 * @todo yarick123: 實現電子郵件通知
 * @global integer $g_view_history_threshold
 */
$g_view_history_threshold = VIEWER;

/**
 * 發送提醒從 bug 查看頁面所需級別
 * 設置為為 NOBODY 將禁止此功能
 * @global integer $g_bug_reminder_threshold
 */
$g_bug_reminder_threshold = DEVELOPER;

/**
 * 刪除 BUG 歷史記錄 修訂版所需級別
 * @global integer $g_bug_revision_drop_threshold
 */
$g_bug_revision_drop_threshold = MANAGER;

/**
 * 將文件上傳到項目文檔所需級別
 * 您可以將此設置為NOBODY，以禁止上傳到項目
 * @see $g_enable_project_documentation
 * @see $g_view_proj_doc_threshold
 * @see $g_allow_file_upload
 * @see $g_upload_bug_file_threshold
 * @global integer $g_upload_project_file_threshold
 */
$g_upload_project_file_threshold = MANAGER;

/**
 * 上傳文件到 BUG中所需級別。
 * 設置為 NOBODY 可以禁止任何人上傳.
 * 但，除非你設置，否則BUG報告者仍能上傳。
 *  $g_allow_reporter_upload 或 $g_allow_file_upload 為 OFF
 * 查看： $g_upload_project_file_threshold, $g_allow_file_upload,
 *			$g_allow_reporter_upload
 * @global integer $g_upload_bug_file_threshold
 */
$g_upload_bug_file_threshold = REPORTER;

/**
 * 添加 BUG 註釋級別
 * @global integer $g_add_bugnote_threshold
 */
$g_add_bugnote_threshold = REPORTER;

/**
 * 編輯其他用戶BUG註釋級別
 * @global integer $g_update_bugnote_threshold
 */
$g_update_bugnote_threshold = DEVELOPER;

/**
 * 查看項目文件級別
 * 註意: 將此設置為 ANYBODY ，可以讓任何用戶從私有項目中下載附件
 * 不管是否是項目成員。
 * @see $g_enable_project_documentation
 * @see $g_upload_project_file_threshold
 * @global integer $g_view_proj_doc_threshold
 */
$g_view_proj_doc_threshold = VIEWER;

/**
 * 站點管理者
 * @global integer $g_manage_site_threshold
 */
$g_manage_site_threshold = MANAGER;

/**
 * 此級別被認為是網站管理員。可以管理各方面功能。
 * 警告！ 不要改變這個值, 除非你絕對知道你在做什麽!
 * 此訪問級別的用戶能夠損壞您的 MantisBT 安裝和數據庫中的數據。
 * 強烈建議您單獨保留此選項。
 * @global integer $g_admin_site_threshold
 */
$g_admin_site_threshold = ADMINISTRATOR;

/**
 * 管理項目（編輯項目信息）所需級別：（不包含添加/刪除）
 * @global integer $g_manage_project_threshold
 */
$g_manage_project_threshold = MANAGER;

/**
 * 添加/刪除/修改新聞所需級別
 * @global integer $g_manage_news_threshold
 */
$g_manage_news_threshold = MANAGER;

/**
 * 刪除項目所需級別
 * @global integer $g_delete_project_threshold
 */
$g_delete_project_threshold = ADMINISTRATOR;

/**
 * 創建新項目所需級別
 * @global integer $g_create_project_threshold
 */
$g_create_project_threshold = ADMINISTRATOR;

/**
 * 需要自動包含在私有項目級別
 * @global integer $g_private_project_threshold
 */
$g_private_project_threshold = ADMINISTRATOR;

/**
 * 管理用戶對項目的訪問所需級別
 * @global integer $g_project_user_threshold
 */
$g_project_user_threshold = MANAGER;

/**
 * 管理用戶帳戶所需級別
 * @global integer $g_manage_user_threshold
 */
$g_manage_user_threshold = ADMINISTRATOR;

/**
 * 模仿用戶或NOBODY 以禁用，所需級別
 * @global integer $g_impersonate_user_threshold
 */
$g_impersonate_user_threshold = ADMINISTRATOR;

/**
 * 刪除BUG級別
 * @global integer $g_delete_bug_threshold
 */
$g_delete_bug_threshold = DEVELOPER;

/**
 * 可以刪除其他用戶 BUG，預設值為 $g_delete_bug_threshold.
 * @global string $g_delete_bugnote_threshold
 */
$g_delete_bugnote_threshold = '%delete_bug_threshold%';

/**
 * 移動 BUG 所需級別
 * @global integer $g_move_bug_threshold
 */
$g_move_bug_threshold = DEVELOPER;

/**
 * 在報告 BUG 或 註釋 BUG時設置狀態所需級別
 * @global integer $g_set_view_status_threshold
 */
$g_set_view_status_threshold = REPORTER;

/**
 * 更新 bug 或 註釋bug 時所需級別
 * 值應該大於或等於 $g_set_view_status_threshold.
 * @global integer $g_change_view_status_threshold
 */
$g_change_view_status_threshold = UPDATER;

/**
 * 顯示 bug 視圖頁上監視 bug 的用戶列表所需級別
 * @global integer $g_show_monitor_list_threshold
 */
$g_show_monitor_list_threshold = DEVELOPER;

/**
 * 可以使用存儲查詢所需級別
 * @global integer $g_stored_query_use_threshold
 */
$g_stored_query_use_threshold = REPORTER;

/**
 * 能夠創建存儲查詢所需級別
 * @global integer $g_stored_query_create_threshold
 */
$g_stored_query_create_threshold = DEVELOPER;

/**
 * 能夠創建共享存儲查詢所需級別
 * @global integer $g_stored_query_create_shared_threshold
 */
$g_stored_query_create_shared_threshold = MANAGER;

/**
 * 更新只讀 bug 所需級別。
 * 通過確定 $g_bug_readonly_status_threshold
 * @global integer $g_update_readonly_bug_threshold
 */
$g_update_readonly_bug_threshold = MANAGER;

/**
 * 查看更改日志級別
 * @global integer $g_view_changelog_threshold
 */
$g_view_changelog_threshold = VIEWER;

/**
* 查看時間線級別
* @global integer $g_timeline_view_threshold
*/
$g_timeline_view_threshold = VIEWER;

/**
 * 查看路線圖級別
 * @global integer $g_roadmap_view_threshold
 */
$g_roadmap_view_threshold = VIEWER;

/**
 * 更新路線圖、標簽版本等級別
 * @global integer $g_roadmap_update_threshold
 */
$g_roadmap_update_threshold = DEVELOPER;

/**
 * 狀態更改級別
 * @global integer $g_update_bug_status_threshold
 */
$g_update_bug_status_threshold = DEVELOPER;

/**
 * 重新打開的 bug 所需級別
 * @global integer $g_reopen_bug_threshold
 */
$g_reopen_bug_threshold = DEVELOPER;

/**
 * 將 bug 分配給未發行產品版本所需級別
 * @global integer $g_report_issues_for_unreleased_versions_threshold
 */
$g_report_issues_for_unreleased_versions_threshold = DEVELOPER;

/**
 * 設置相關 BUG 級別
 * @global integer $g_set_bug_sticky_threshold
 */
$g_set_bug_sticky_threshold = MANAGER;

/**
 * 團隊開發人員最低級別。
 * 用於在項目信息上顯示。
 * @global integer $g_development_team_threshold
 */
$g_development_team_threshold = DEVELOPER;

/**
* 此數組設置進入每個列出的狀態所需的訪問級別。
 * 如果狀態未列出，
 * 會回到 $g_update_bug_status_threshold
 * 如 ：
 * $g_set_status_threshold = array(
 *     ACKNOWLEDGED => MANAGER,
 *     CONFIRMED => DEVELOPER,
 *     CLOSED => MANAGER
 * );
 * @global array $g_set_status_threshold
 */
$g_set_status_threshold = array( NEW_ => REPORTER );

/**
 * 用戶編輯自己的註釋級別
 * 預設值為 $g_update_bugnote_threshold
 * @global integer $g_bugnote_user_edit_threshold
 */
$g_bugnote_user_edit_threshold = '%update_bugnote_threshold%';

/**
 * 用戶刪除自己的BUG
 * 預設值為 $g_delete_bugnote_threshold.
 * @global integer $g_bugnote_user_delete_threshold
 */
$g_bugnote_user_delete_threshold = '%delete_bugnote_threshold%';

/**
 * 用戶可以自己的註釋狀態
 * 預設值為 $g_change_view_status_threshold.
 * @global integer $g_bugnote_user_change_view_state_threshold
 */
$g_bugnote_user_change_view_state_threshold = '%change_view_status_threshold%';

/**
 * 允許 BUG 沒有類別
 * @global integer $g_allow_no_category
 */
$g_allow_no_category = OFF;

/**
 * 限制報告者。如果僅能查看自己報告的BUG，請設置為 ON。
 * @global integer $g_limit_reporters
 */
$g_limit_reporters = OFF;

/**
 * 報告者可以關閉BUG，允許記錄在標記已解決後，關閉他們的BUG。
 * @global integer $g_allow_reporter_close
 */
$g_allow_reporter_close	 = OFF;

/**
 * 報告者可以重新打開BUG
 * @global integer $g_allow_reporter_reopen
 */
$g_allow_reporter_reopen = ON;

/**
 * 報告者可以上傳
 * 允許報告者上傳附件到 BUG 中
 * @global integer $g_allow_reporter_upload
 */
$g_allow_reporter_upload = ON;

/**
 * 帳戶刪除
 * 允許用戶刪除自己的帳戶
 * @global integer $g_allow_account_delete
 */
$g_allow_account_delete = OFF;

/**
 * 啟用對 MantisBT的匿名訪問。 您必須指定 $g_anonymous_account 匿名帳戶。
 * 設置為 OFF。
 * @global integer $g_allow_anonymous_login
 */
$g_allow_anonymous_login = OFF;

/**
 * 定義哪些匿名用戶做為匿名帳戶。
 * 當 $g_allow_anonymous_login 設置為 ON。你需要定義此設置，
 * 此帳戶將始終被視為一個受保護的帳戶，因此匿名用戶將不能更新的首選項或設置此帳戶。
 * 建議此帳戶的訪問級別 只有 VIEWER。
 * 請在MantisBT 安裝的文檔中閱讀關於這一主題“設置匿名訪問”。
 * @global string $g_anonymous_account
 */
$g_anonymous_account = '';

/**
 * bug 鏈接
 * if a number follows this tag it will create a link to a bug.
 * eg. for # a link would be #45
 * eg. for bug: a link would be bug:98
 * @global string $g_bug_link_tag
 */
$g_bug_link_tag = '#';

/**
 * 註釋鏈接
 * if a number follows this tag it will create a link to a bugnote.
 * eg. for ~ a link would be ~45
 * eg. for bugnote: a link would be bugnote:98
 * @global string $g_bugnote_link_tag
 */
$g_bugnote_link_tag = '~';

/**
 * BUG 統計鏈接
 * 將當前 BUG 統計創建當前視頻使用的前綴
 *（例如在主頁面和摘要頁面上）。
 * 預設是一個臨時過濾器
 * 此時只更改過濾器 - 'view_all_set.php?type=1&amp;temporary=y'
 * 永久更改過濾器 - 'view_all_set.php?type=1';
 * @global string $g_bug_count_hyperlink_prefix
 */
$g_bug_count_hyperlink_prefix = 'view_all_set.php?type=1&amp;temporary=y';

/**
 * 驗證用戶名正則
 * 預設的正則表達式允許 a-z, A-Z, 0-9, +, -, ., 空格 和 下劃線
 * 如果您更改此了設置，則可能需要更新語言文件中的ERROR_USER_NAME_INVALID字符串，以解釋您在網站上使用的規則。
 * 了解更多 http://en.wikipedia.org/wiki/Regular_Expression for more details about
 * 測試正式 http://rubular.com/
 * @global string $g_user_login_valid_regex
 */
$g_user_login_valid_regex = '/^([a-z\d\-.+_ ]+(@[a-z\d\-.]+\.[a-z]{2,4})?)$/i';

/**
 * 用於篩選用戶列表預設用戶名前綴
 * 如果系統中有很多用戶，加載時，會很慢，請將此改為“A”或其他字段。
 * @global string $g_default_manage_user_prefix
 */
$g_default_manage_user_prefix = 'ALL';

/**
 * 預設標記前綴前於篩選標簽列表。
 * 如果系統有很多標簽，加載時會很慢，請改為“A”或其他字母。
 * @global string $g_default_manage_tag_prefix
 */
$g_default_manage_tag_prefix = 'ALL';

/**
 * CSV 導出
 * 設置 csv 分隔符
 * @global string $g_csv_separator
 */
$g_csv_separator = ',';

/**
 * 用戶管理項目所需級別。
 * 包含工作流程、電子郵件通知等。
 */
$g_manage_configuration_threshold = MANAGER;

/**
 * 查看系統配置級別
 * @global integer $g_view_configuration_threshold
 */
$g_view_configuration_threshold = ADMINISTRATOR;

/**
 * 用戶通過MantisBT Web界面設置系統配置級別
 * 警告：通過接口設置配置的用戶必須信任。
 *
 * 因為用戶可以將配置設置為PHP代碼，因此如果這些用戶不被信任，則可能存在安全風險。
 * @global integer $g_set_configuration_threshold
 */
$g_set_configuration_threshold = ADMINISTRATOR;

####################################
# MantisBT 顏色配置 #
####################################

/**
 * 狀態顏色代碼，使用 Tango 顏色調色板
 * @global array $g_status_colors
 */
$g_status_colors = array(
	'new'          => '#fcbdbd', # red    (scarlet red #ef2929)
	'feedback'     => '#e3b7eb', # purple (plum        #75507b)
	'acknowledged' => '#ffcd85', # orange (orango      #f57900)
	'confirmed'    => '#fff494', # yellow (butter      #fce94f)
	'assigned'     => '#c2dfff', # blue   (sky blue    #729fcf)
	'resolved'     => '#d2f5b0', # green  (chameleon   #8ae234)
	'closed'       => '#c9ccc4'  # grey   (aluminum    #babdb6)
);

/**
 * 顯示項目標識時的填充級別
 * 項目ID將用0填充到指定大小
 * @global integer $g_display_project_padding
 */
$g_display_project_padding = 3;

/**
 * 顯示bug ID時的填充級別
 * bug ID將用0填充到指定大小
 * @global integer $g_display_bug_padding
 */
$g_display_bug_padding = 7;

/**
 * 顯示BUG註釋 ID時的填充級別
 * BUG註釋 ID將用0填充到指定大小
 * @global integer $g_display_bugnote_padding
 */
$g_display_bugnote_padding = 7;

#############################
# MantisBT Cookie 變數 #
#############################

/**
 * 指定Cookie 路徑
 * 建議將其設置為實際的MantisBT路徑。
 * @link http://php.net/function.setcookie
 * @global string $g_cookie_path
 */
$g_cookie_path = '/';

/**
 * MantisBT Cookie作用域
 * @global string $g_cookie_domain
 */
$g_cookie_domain = '';

/**
 * Cookie 前綴
 * @see $g_cookie_path
 * @global string $g_cookie_prefix
 */
$g_cookie_prefix = 'MANTIS';

/**
 *
 * @global string $g_string_cookie
 */
$g_string_cookie = '%cookie_prefix%_STRING_COOKIE';

/**
 *
 * @global string $g_project_cookie
 */
$g_project_cookie = '%cookie_prefix%_PROJECT_COOKIE';

/**
 *
 * @global string $g_view_all_cookie
 */
$g_view_all_cookie = '%cookie_prefix%_VIEW_ALL_COOKIE';

/**
 * 存儲 "管理用戶" 頁的篩選條件
 * @global string $g_manage_users_cookie
 */
$g_manage_users_cookie		= '%cookie_prefix%_MANAGE_USERS_COOKIE';

/**
 * 存儲 "管理配置報告" 頁的篩選條件
 * @global string $g_manage_config_cookie
 */
$g_manage_config_cookie		= '%cookie_prefix%_MANAGE_CONFIG_COOKIE';

/**
 *
 * @global string $g_logout_cookie
 */
$g_logout_cookie = '%cookie_prefix%_LOGOUT_COOKIE';

/**
 *
 * @global string $g_bug_list_cookie
 */
$g_bug_list_cookie = '%cookie_prefix%_BUG_LIST_COOKIE';

#############################
# MantisBT 過濾器變數 #
#############################

/**
 * 在篩選器對話框中顯示自定義字段
 * @global integer $g_filter_by_custom_fields
 */
$g_filter_by_custom_fields = ON;

/**
 * 每行顯示的篩選字段數。
 * 預設為 8
 * @global integer $g_filter_custom_fields_per_row
 */
$g_filter_custom_fields_per_row = 8;

/**
 * 控制篩選器頁的顯示。
 * 值有︰
 * - SIMPLE_ONLY - 僅簡單視圖
 * - ADVANCED_ONLY - 僅高級視圖 (允許多選)
 * - SIMPLE_DEFAULT - 預設為簡單視圖, 但顯示高級鏈接
 * - ADVANCED_DEFAULT - 預設為 "高級" 視圖, 但顯示一個簡單的鏈接
 * @global integer $g_view_filters
 */
$g_view_filters = SIMPLE_DEFAULT;

/**
 * 此開關允許使用 ajax 動態加載並根據請求創建篩選器窗體控件。
 * 此方法將減少每頁負載處理篩選器時需要傳輸的數據量, 從而加速度顯示和減少帶寬使用。
 * @global integer $g_use_dynamic_filters
 */
$g_use_dynamic_filters = ON;

/**
 * 用戶能夠創建的固定鏈接所需級別
 * NOBODY 禁止任何人創建
 * @global integer $g_create_permalink_threshold
 */
$g_create_permalink_threshold = DEVELOPER;

/**
 * 用於創建簡短 url 的服務。
 * %s 將被長 url 替換。要禁用該功能設置為 空。
 * @global string $g_create_short_url
 */
$g_create_short_url = 'http://tinyurl.com/create.php?url=%s';

#########################
# MantisBT 枚舉字符串 #
#########################

/**
 * status from $g_status_index-1 to 79 are used for the onboard customization
 * (if enabled) directly use MantisBT to edit them.
 * @global string $g_access_levels_enum_string
 */
$g_access_levels_enum_string = '10:viewer,25:reporter,40:updater,55:developer,70:manager,90:administrator';

/**
 *
 * @global string $g_project_status_enum_string
 */
$g_project_status_enum_string = '10:development,30:release,50:stable,70:obsolete';

/**
 *
 * @global string $g_project_view_state_enum_string
 */
$g_project_view_state_enum_string = '10:public,50:private';

/**
 *
 * @global string $g_view_state_enum_string
 */
$g_view_state_enum_string = '10:public,50:private';

/**
 *
 * @global string $g_priority_enum_string
 */
$g_priority_enum_string = '10:none,20:low,30:normal,40:high,50:urgent,60:immediate';
/**
 *
 * @global string $g_severity_enum_string
 */
$g_severity_enum_string = '10:feature,20:trivial,30:text,40:tweak,50:minor,60:major,70:crash,80:block';

/**
 *
 * @global string $g_reproducibility_enum_string
 */
$g_reproducibility_enum_string = '10:always,30:sometimes,50:random,70:have not tried,90:unable to duplicate,100:N/A';

/**
 *
 * @global string $g_status_enum_string
 */
$g_status_enum_string = '10:new,20:feedback,30:acknowledged,40:confirmed,50:assigned,80:resolved,90:closed';

/**
 * @@@ 對於文檔，此列表中的值也用於定義語言文件中的變數（如 $s_new_bug_title 在 bug_change_status_page.php)
 * 嵌入空格將轉換為下劃線
 * (如 "working on" 轉換為 $s_working_on_bug_title).
 * 他們也希望是國家的英文名稱
 * @global string $g_resolution_enum_string
 */
$g_resolution_enum_string = '10:open,20:fixed,30:reopened,40:unable to duplicate,50:not fixable,60:duplicate,70:not a bug,80:suspended,90:wont fix';

/**
 *
 * @global string $g_projection_enum_string
 */
$g_projection_enum_string = '10:none,30:tweak,50:minor fix,70:major rework,90:redesign';

/**
 *
 * @global string $g_eta_enum_string
 */
$g_eta_enum_string = '10:none,20:< 1 day,30:2-3 days,40:< 1 week,50:< 1 month,60:> 1 month';

/**
 *
 * @global string $g_sponsorship_enum_string
 */
$g_sponsorship_enum_string = '0:Unpaid,1:Requested,2:Paid';

/**
 *
 * @global string $g_custom_field_type_enum_string
 */
$g_custom_field_type_enum_string = '0:string,1:numeric,2:float,3:enum,4:email,5:checkbox,6:list,7:multiselection list,8:date,9:radio,10:textarea';

###############################
# MantisBT 速度優化 #
###############################

/**
 * 壓縮輸出
 * 如果你在 php.ini 文件中啟用壓縮（zlib.output_compression或output_handler = ob_gzhandler）
 * 這個選項將會忽略。
 *
 * 如果未啟用zlib，這個選項也會被忽略。
 * PHP 4.3.0及更高版本預設包含zlib。 Windows 用戶應該取消註釋zlib.dll，以啟用壓縮輸出。
 * 您可以通過運行“php -m”來檢查加載的擴展名 在命令行（查找'zlib'）。
 * @global integer $g_compress_html
 */
$g_compress_html = ON;

/**
 * 使用持久性數據庫連接
 * @global integer $g_use_persistent_connections
 */
$g_use_persistent_connections = OFF;

#################
# 文件引入 #
#################

/**
 * 指定您的頭部/底部包含文件（如LOGO，Banner等）
 * @global string $g_bottom_include_page
 */
$g_bottom_include_page = '%absolute_path%';

/**
 * 指定您的頭部/底部包含文件（如LOGO，Banner等）
 * 如果提供了頭部文件，則頭部的預設MantisBT LOGO 將被隱藏。
 *
 * 例如，您可以在頁面頭部包含一個居中的標題：
 *
 * <div class="center"><span class="pagetitle">TITLE</span></div>
 *
 * 如果使用include文件，則會刪除的預設Banner。
 * 你可以在 html_api.php 中的html_top_banner函數中找到。
 *
 * @global string $g_top_include_page
 */
$g_top_include_page = '%absolute_path%';

/**
 * CSS 文件
 * @global string $g_css_include_file
 */
$g_css_include_file = 'default.css';

/**
 * RTL CSS 文件
 * @global string $g_css_rtl_include_file
 */
$g_css_rtl_include_file = 'rtl.css';

/**
 * meta 標簽
 * @global string $g_meta_include_file
 */
$g_meta_include_file = '';

/**
 * 設置是否使用 cdn (內容傳遞網絡) 加載 javascript 庫及其關聯的 css 的文件。
 * 這提高了加載 MantisBT 頁的速度。
 * 如果希望 MantisBT 不在外網使用, 則可以禁用此功能。
 * @global integer $g_cdn_enabled
 */
$g_cdn_enabled = OFF;

################
# 重定向 #
################

/**
 * 登錄或設置項目後的預設頁面
 * @global string $g_default_home_page
 */
$g_default_home_page = 'my_view_page.php';

/**
 * 用戶註銷後跳轉換頁面
 * @global string $g_logout_redirect_page
 */
$g_logout_redirect_page = 'login_page.php';

###########
# 標題 #
###########

/**
 * 要與每個網頁一起發送的自定義標頭數組。
 *
 * 如，為了允許在IE6中的框架中查看MantisBT安裝，
 * 當框架集與MantisBT安裝不在同一主機名時，您需要添加一個P3P頭。
 * 你可以嘗試類似的 'P3P: CP="CUR ADM"' 配置, 但請務必檢查您的政策是否符合要求。
 * 查看 http://msdn.microsoft.com/en-us/library/ms537343.aspx for 了解更多信息。
 *
 * 盡管不建議這樣做，您可以使用此設置來禁用先前發送標頭。
 * 例如，假設你不想從內容安全政策中受益，您可以添加 'Content-Security-Policy:' 到的數組。
 *
 * @global array $g_custom_headers
 */
$g_custom_headers = array();

/**
 * 瀏覽器緩存控制
 * 預設情況下, 我們試圖阻止瀏覽器緩存任何內容。
 * 這兩種設置將會在某些情況下失敗。
 *
 * 瀏覽器頁面緩存 - 這將允許瀏覽器緩存所有頁面。
 * 會有更好的性能，但有可能會顯示過時的信息。
 * 註意，這將被繞過（並且允許緩存）BUG 報告頁面。
 *
 * @global integer $g_allow_browser_cache
 */
# $g_allow_browser_cache = ON;
/**
 * 文件緩存 - 這將允許瀏覽器緩存下載的文件。
 * 沒有此設置，可能存在IE接收文件和啟動下載程序的問題。
 * @global integer $g_allow_file_cache
 */
# $g_allow_file_cache = ON;

#################
# 自定義字段 #
#################

/**
 * 管理自定義字段所需級別
 * @global integer $g_manage_custom_fields_threshold
 */
$g_manage_custom_fields_threshold = ADMINISTRATOR;

/**
 * 將自定義字段鏈接到/取消鏈接到項目所需級別
 * @global integer $g_custom_field_link_threshold
 */
$g_custom_field_link_threshold = MANAGER;

/**
 * 是否在創建自定義字段後開始編輯
 * @global integer $g_custom_field_edit_after_create
 */
$g_custom_field_edit_after_create = ON;

################
# 自定義菜單 #
################

/**
 * 自定義菜單。例如：
 *
 * $g_main_menu_custom_options = array(
 *     array(
 *         'title'        => 'My Link',
 *         'access_level' => MANAGER,
 *         'url'          => 'my_link.php',
 *         'icon'         => 'fa-plug'
 *     ),
 *     array(
 *         'title'        => 'My Link2',
 *         'access_level' => ADMINISTRATOR,
 *         'url'          => 'my_link2.php',
 *         'icon'         => 'fa-plug'
 *     )
 * );
 *
 * 請註意，如果標題是本地化的字符串名稱（在strings_english.txt或custom_strings_inc.php中），那麽它將被翻譯的字符串替換。
 * 如果當前登錄的用戶有訪問權限，則菜單項會顯示。
 *
 * 訪問級別是可選字段，如果未設置，則不會進行檢查。
 * 圖標是可選字段，如果未設置，則使用“fa-plug”。
 *
 * 使用圖標在 http://fontawesome.io/icons/ - 添加 "fa-" 前綴到圖標名稱。
 *
 * @global array $g_main_menu_custom_options
 */
$g_main_menu_custom_options = array();

#########
# 圖標 #
#########

/**
 * 將文件擴展名映射到文件類型圖標。 這些圖標將顯示在項目文檔和附件旁邊。
 * 註意：
 * - 擴展名必須為小寫
 * - 所有圖標大小在16x16px
 * @global array $g_file_type_icons
 */
$g_file_type_icons = array(
	''		=> 'fa-file-text-o',
	'7z'	=> 'fa-file-archive-o',
	'ace'	=> 'fa-file-archive-o',
	'arj'	=> 'fa-file-archive-o',
	'bz2'	=> 'fa-file-archive-o',
	'c'		=> 'fa-file-code-o',
	'chm'	=> 'fa-file-o',
	'cpp'	=> 'fa-file-code-o',
	'css'	=> 'fa-file-code-o',
	'csv'	=> 'fa-file-text-o',
	'cxx'	=> 'fa-file-code-o',
	'diff'	=> 'fa-file-text-o',
	'doc'	=> 'fa-file-word-o',
	'docx'	=> 'fa-file-word-o',
	'dot'	=> 'fa-file-word-o',
	'eml'	=> 'fa-envelope-o',
	'htm'	=> 'fa-file-code-o',
	'html'	=> 'fa-file-code-o',
	'gif'	=> 'fa-file-image-o',
	'gz'	=> 'fa-file-archive-o',
	'jpe'	=> 'fa-file-image-o',
	'jpg'	=> 'fa-file-image-o',
	'jpeg'	=> 'fa-file-image-o',
	'log'	=> 'fa-file-text-o',
	'lzh'	=> 'fa-file-archive-o',
	'mhtml'	=> 'fa-file-code-o',
	'mid'	=> 'fa-file-audio-o',
	'midi'	=> 'fa-file-audio-o',
	'mov'	=> 'fa-file-movie-o',
	'msg'	=> 'fa-envelope-o',
	'one'	=> 'fa-file-o',
	'patch'	=> 'fa-file-text-o',
	'pcx'	=> 'fa-file-image-o',
	'pdf'	=> 'fa-file-pdf-o',
	'png'	=> 'fa-file-image-o',
	'pot'	=> 'fa-file-word-o',
	'pps'	=> 'fa-file-powerpoint-o',
	'ppt'	=> 'fa-file-powerpoint-o',
	'pptx'	=> 'fa-file-powerpoint-o',
	'pub'	=> 'fa-file-o',
	'rar'	=> 'fa-file-archive-o',
	'reg'	=> 'fa-file',
	'rtf'	=> 'fa-file-word-o',
	'tar'	=> 'fa-file-archive-o',
	'tgz'	=> 'fa-file-archive-o',
	'txt'	=> 'fa-file-text-o',
	'uc2'	=> 'fa-file-archive-o',
	'vsd'	=> 'fa-file-o',
	'vsl'	=> 'fa-file-o',
	'vss'	=> 'fa-file-o',
	'vst'	=> 'fa-file-o',
	'vsu'	=> 'fa-file-o',
	'vsw'	=> 'fa-file-o',
	'vsx'	=> 'fa-file-o',
	'vtx'	=> 'fa-file-o',
	'wav'	=> 'fa-file-audio-o',
	'wbk'	=> 'fa-file-word-o',
	'wma'	=> 'fa-file-audio-o',
	'wmv'	=> 'fa-file-movie-o',
	'wri'	=> 'fa-file-word-o',
	'xlk'	=> 'fa-file-excel-o',
	'xls'	=> 'fa-file-excel-o',
	'xlsx'	=> 'fa-file-excel-o',
	'xlt'	=> 'fa-file-excel-o',
	'xml'	=> 'fa-file-code-o',
	'zip'	=> 'fa-file-archive-o',
	'?'	=> 'fa-file-o' );

/**
 *
 * 下載文件時將被覆蓋內容類型
 *
 * @global array $g_file_download_content_type_overrides
 */
$g_file_download_content_type_overrides = array (
	'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	'dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
	'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
	'ppsx' => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
	'potx' => 'application/vnd.openxmlformats-officedocument.presentationml.template',
	'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
	'xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.template'
);

/**
 * 狀態圖標
 * @global array $g_status_icon_arr
 */
$g_status_icon_arr = array (
	NONE      => '',
	LOW       => 'fa-chevron-down fa-lg green',
	NORMAL    => 'fa-minus fa-lg orange2',
	HIGH      => 'fa-chevron-up fa-lg red',
	URGENT    => 'fa-arrow-up fa-lg red',
	IMMEDIATE => 'fa-exclamation-triangle fa-lg red'
);

/**
 * 排序圖標
 * @global array $g_sort_icon_arr
 */
$g_sort_icon_arr = array (
	ASCENDING  => 'fa-caret-up',
	DESCENDING => 'fa-caret-down'
);

/**
 * 讀狀態圖標
 * @global array $g_unread_icon_arr
 */
$g_unread_icon_arr = array (
	READ   => '',
	UNREAD => 'fa-circle'
);

####################
# 個人首頁設置 #
####################

/**
 * BUG 面板 顯示數量
 * @global integer $g_my_view_bug_count
 */
$g_my_view_bug_count = 10;

/**
 * 不同 BUG 面板 顯示順序
 * 為顯示請設置 為 0
 * @global array $g_my_view_boxes
 */
$g_my_view_boxes = array (
	'assigned'      => '1',
	'unassigned'    => '2',
	'reported'      => '3',
	'resolved'      => '4',
	'recent_mod'    => '5',
	'monitored'     => '6',
	'feedback'      => '0',
	'verify'        => '0',
	'my_comments'   => '0'
);

/**
 * 切換“我的視圖”框是否顯示在固定位置
 *（即相鄰的框從相同的垂直位置開始）
 * @global integer $g_my_view_boxes_fixed_position
 */
$g_my_view_boxes_fixed_position = ON;


#############
# RSS 訂閱 #
#############

/**
 * 是否啟用 RSS 訂閱
 * 不使用請設置為 OFF。
 * @global integer $g_rss_enabled
 */
$g_rss_enabled = ON;


#####################
# Bug 關系 #
#####################

/**
 * 啟用關系圖支持。
 * 使用圖形顯示問題關系。
 *
 * 為了使用此功能，您必須安裝GraphViz。
 *
 * Graphviz 首頁：    http://www.research.att.com/sw/tools/graphviz/
 *
 * 詳細信息請參閱 core/graphviz_api.php 和 core/relationship_graph_api.php 頭部註釋。
 * @global integer $g_relationship_graph_enable
 */
$g_relationship_graph_enable = OFF;

/**
 * 設置 dot 工具路徑
 * 並且 WEB 服務器需要有執行權限才能生成關系圖。
 * 註意：在 Windows 上 IIS 用戶需要執行權限，才能使用PHP的 proc_open函數。
 * @global string $g_dot_tool
 */
$g_dot_tool = '/usr/bin/dot';
/**
 * 設置 neato 工具路徑
 * 並且 WEB 服務器需要有執行權限才能生成關系圖。
 * 註意：在 Windows 上 IIS 用戶需要執行權限，才能使用PHP的 proc_open函數
 * @global string $g_neato_tool
 */
$g_neato_tool = '/usr/bin/neato';

/**
 * Graphviz 字體大小和名稱
 * 如果Graphviz無法運行，你需要啟用 GD 擴展或確定字體位置。
 * 在Linux上，嘗試使用不帶擴展名的字段文件。
 * @global string $g_relationship_graph_fontname
 */
$g_relationship_graph_fontname = 'Arial';

/**
 *
 * @global integer $g_relationship_graph_fontsize
 */
$g_relationship_graph_fontsize = 8;

/**
 * 關系圖方向
 * 預設水平方向。如果有很多依賴，請使用修改 為 'vertical'（垂直）。
 * @global string $g_relationship_graph_orientation
 */
$g_relationship_graph_orientation = 'horizontal';

/**
 * 關系圖的最大深度。
 * 這只影響關系圖，影響繪圖深度。
 * 值為3，已經足以顯示與您當前正在查看相關的問題。
 * @global integer $g_relationship_graph_max_depth
 */
$g_relationship_graph_max_depth = 2;

/**
 * 如果設置為ON，
 * 單擊關系圖上的問題將打開該問題的錯誤視圖頁面，否則將鏈接到該問題的關系圖。
 *
 * @global integer $g_relationship_graph_view_on_click
 */
$g_relationship_graph_view_on_click = OFF;

/**
 * 在下拉框中顯示過去年份數。
 * @global integer $g_backward_year_count
 */
$g_backward_year_count = 4;

/**
 * 在下拉框中顯示未來年份數。
 * @global integer $g_forward_year_count
 */
$g_forward_year_count = 4;

/**
 * 自定義組操作
 *
 * 此可擴展性模型允許開發新的自定義操作。
 * 這可以通過完全自定義的形式和動作頁面或者預先實現的形式和動作頁面以及對一些功能的調出來實現。
 * 這些功能將在預定義文件中實現，其名稱基於操作名稱。
 * 例如，
 * 對於添加註釋的操作，操作為EXT_ADD_NOTE，實現它的文件是bug_actiongroup_add_note_inc.php。
 * 有關詳細信息，請參閱此文件的實現。
 *
 * 示例：
 *
 * array(
 *	array(
 *		'action' => 'my_custom_action',
 *		'label' => 'my_label',   # 傳遞給 lang_get_defaulted() 函數
 *		'form_page' => 'my_custom_action_page.php',
 *		'action_page' => 'my_custom_action.php'
 *	)
 *	array(
 *		'action' => 'my_custom_action2',
 *		'form_page' => 'my_custom_action2_page.php',
 *		'action_page' => 'my_custom_action2.php'
 *	)
 *	array(
 *		'action' => 'EXT_ADD_NOTE',  # 你需要實現 bug_actiongroup_<action_without_'EXT_')_inc.php
 *		'label' => 'actiongroup_menu_add_note' # 參見 strings_english.txt 中此標簽
 *	)
 * );
 *
 * @global array $g_custom_group_actions
 */
$g_custom_group_actions = array();

####################
# Wiki 集成 #
####################

/**
 * 啟用 WIKI ？
 * @global integer $g_wiki_enable
 */
$g_wiki_enable = OFF;

/**
 * Wiki 引擎
 * 支持引擎： 'dokuwiki', 'mediawiki', 'twiki', 'wikka', 'xwiki'
 * @global string $g_wiki_engine
 */
$g_wiki_engine = '';

/**
 * Wiki命名空間
 * 用作與此 MantisBT 安裝相關所有頁面的根目錄。
 *
 * @global string $g_wiki_root_namespace
 */
$g_wiki_root_namespace = 'mantis';

/**
 * 用於托管Wiki引擎的URL。
 * 必須與MantisBT在同一服務器上，需要尾隨“/”。
 * 預設情況下，這是從全局MantisBT路徑（$ g_path）派生的，
 * 用wiki引擎字符串替換URL的路徑。
 *（即$g_path ='http://example.com/mantis/'和 $g_wiki_engine ='dokuwiki'，則wiki網址為“http://example.com/dokuwiki/”）
 * @global string $g_wiki_engine_url
 */
$g_wiki_engine_url = '';

####################
# 最近訪問 #
####################

/**
 * 近期訪問 BUG 顯示數量。
 * 如果設置為0，則禁用此功能。
 * 否則，它在最近訪問的列表中顯示問題的最大數量。
 * @global integer $g_recently_visited_count
 */
$g_recently_visited_count = 5;

###############
# BUG標簽 #
###############

/**
 * 字符串分隔標記
 * @global integer $g_tag_separator
 */
$g_tag_separator = ',';

/**
 * 查看標簽添加到 bug 所需級別
 * @global integer $g_tag_view_threshold
 */
$g_tag_view_threshold = VIEWER;

/**
 * 將標簽添加到 bug 所需級別
 * @global integer $g_tag_attach_threshold
 */
$g_tag_attach_threshold = REPORTER;

/**
 * 移除標簽所需級別
 * @global integer $g_tag_detach_threshold
 */
$g_tag_detach_threshold = DEVELOPER;

/**
 * 移除同一用戶添加的標簽所需級別
 * @global integer $g_tag_detach_own_threshold
 */
$g_tag_detach_own_threshold = REPORTER;

/**
 * 創建新標簽所需級別
 * @global integer $g_tag_create_threshold
 */
$g_tag_create_threshold = REPORTER;

/**
 * 編輯標簽名稱和說明所需級別
 * @global integer $g_tag_edit_threshold
 */
$g_tag_edit_threshold = DEVELOPER;

/**
 * 創建用戶描述所需級別
 * @global integer $g_tag_edit_own_threshold
 */
$g_tag_edit_own_threshold = REPORTER;

#################
# 時間跟蹤 #
#################

/**
 * 打開時間跟蹤統計
 * @global integer $g_time_tracking_enabled
 */
$g_time_tracking_enabled = OFF;

/**
 * 計費匯總
 * @global integer $g_time_tracking_with_billing
 */
$g_time_tracking_with_billing = OFF;

/**
 * 停止構建時間跟蹤字段
 * @global integer $g_time_tracking_stopwatch
 */
$g_time_tracking_stopwatch = OFF;

/**
 * 查看時間跟蹤信息所需級別
 * @global integer $g_time_tracking_view_threshold
 */
$g_time_tracking_view_threshold = DEVELOPER;

/**
 * 添加/編輯時間跟蹤信息所需級別
 * @global integer $g_time_tracking_edit_threshold
 */
$g_time_tracking_edit_threshold = DEVELOPER;

/**
 * 運行報表所需級別
 * @global integer $g_time_tracking_reporting_threshold
 */
$g_time_tracking_reporting_threshold = MANAGER;

/**
 * 允許記錄時間跟蹤而沒有BUG註釋
 * @global integer $g_time_tracking_without_note
 */
$g_time_tracking_without_note = ON;

############################
# 配置文件相關設置 #
############################

/**
 * 啟用配置文件
 * @global integer $g_enable_profiles
 */
$g_enable_profiles = ON;

/**
 * 添加配置級別
 * @global integer $g_add_profile_threshold
 */
$g_add_profile_threshold = REPORTER;

/**
 * 創建修改全局配置文件級別
 * @global integer $g_manage_global_profile_threshold
 */
$g_manage_global_profile_threshold = MANAGER;

/**
 * 允許用戶在針對配置相關字段（即平台，os，os構建）更新問題時自由輸入內容
 * @global integer $g_allow_freetext_in_profile_fields
 */
$g_allow_freetext_in_profile_fields = ON;

#################
# 插件系統 #
#################

/**
 * 啟用/禁用插件
 * @global integer $g_plugins_enabled
 */
$g_plugins_enabled = ON;

/**
 * 插件文件（絕對路徑）。
 * @global string $g_plugin_path
 */
$g_plugin_path = $g_absolute_path . 'plugins' . DIRECTORY_SEPARATOR;

/**
 * 管理插件級別。
 * @global integer $g_manage_plugin_threshold
 */
$g_manage_plugin_threshold = ADMINISTRATOR;

/**
* 文件擴展名與MIME類型的映射，用於從插件獲取資源時。
*
* @global array $g_plugin_mime_types
*/
$g_plugin_mime_types = array(
	    'css' => 'text/css',
	    'js'  => 'text/javascript',
	    'gif' => 'image/gif',
	    'png' => 'image/png',
	    'jpg' => 'image/jpeg',
	    'jpeg' => 'image/jpeg'
);

/**
 * 強制安裝和保護某些插件。
 * 請註意，這不是安裝插件的首選方法， 這通常應通過插件管理界面直接完成。
 * 但是，此方法將阻止具有管理訪問權限的用戶通過插件管理界面卸載插件。
 * 數組中的條目必須是由插件基本名稱和優先級組成的鍵/值對，
 *
 * 因此：
 *
 * = array(
 *     'PluginA' => 5,
 *     'PluginB' => 5,
 *     ...
 *
 * @global $g_plugins_force_installed
 */
$g_plugins_force_installed = array();

############
# 截止日期 #
############

/**
 * 更新到期提交日期級別
 * @global integer $g_due_date_update_threshold
 */
$g_due_date_update_threshold = NOBODY;

/**
 * 查看截止日期級別
 * @global integer $g_due_date_view_threshold
 */
$g_due_date_view_threshold = NOBODY;

/**
 * 預設截止日期值為新提交的問題︰
 * 設置為空，無截止日期。
 * strtotime 所接受的日期 (https://secure.php.net/manual/zh/function.strtotime.php), 如 'today' 或 '+2 days'.
 * @global string $g_due_date_default
 */
$g_due_date_default = '';

################
# 子項目 #
################

/**
 * 是否應啟用子項目功能。 在這之前標記關閉，
 * 確保所有子項目都被移動到頂級計劃中, 否則將無法訪問它們。
 */
$g_subprojects_enabled = ON;

/**
 * 子項目從父項目繼承類別。
 */
$g_subprojects_inherit_categories = ON;

/**
 * 子項目從從父項目繼承版本。
 */
$g_subprojects_inherit_versions = ON;

##################################
# 調試/開發人員設置 #
##################################

/**
 * 頁面顯示加載時間。
 * 執行時間顯示在所有頁面底部。
 *
 * @global integer $g_show_timer
 */
$g_show_timer = OFF;

/**
 * 頁面底部顯示內存使用情況。
 *
 * @global integer $g_show_memory_usage
 */
$g_show_memory_usage = OFF;

/**
 * 這用於調試mantis中電子郵件功能。 預設情況下為空。
 * 在診斷電子郵件問題時，可以將其設置為有效的電子郵件地址。
 * 所有電子郵件都將發送到此地址，並且郵件正文中包含原始To，Cc和Bcc。
 * 註意：電子郵件不發送到收件人，只發送到調試電子郵件地址。
 * @global string $g_debug_email
 */
$g_debug_email = '';

/**
 * 頁面上顯示查詢的總數。
 *
 * @global integer $g_show_queries_count
 */
$g_show_queries_count = OFF;

/**
 * 錯誤顯示方式
 * 錯誤定義自 {@link https://secure.php.net/manual/zh/errorfunc.constants.php 預定義常量}
 * 顯示方式。可用選項為:
 * - DISPLAY_ERROR_HALT    停止並顯示錯誤消息 （包括變數和回溯，{@link $g_show_detailed_errors} 如果為 ON）
 * - DISPLAY_ERROR_INLINE  顯示一行錯誤並繼續執行。
 * - DISPLAY_ERROR_NONE    抑制錯誤（無顯示）。這是未指定錯誤常量的預設行為。
 *
 * 建議在生產中使用預設設置，並且只顯示MantisBT致命錯誤，抑制所有其他錯誤類型的輸出。
 *
 * 推薦的config_inc.php設置為開發人員模式（這些是自動設置，如果服務器是localhost）：
 * $g_display_errors = array(
 *     E_USER_ERROR        => DISPLAY_ERROR_HALT,
 *     E_RECOVERABLE_ERROR => DISPLAY_ERROR_HALT,
 *     E_WARNING           => DISPLAY_ERROR_HALT,
 *     E_ALL               => DISPLAY_ERROR_INLINE,
 * );
 *
 * 警告：E_USER_ERROR應始終設置為DISPLAY_ERROR_HALT。
 * 使用另一個值將導致程序繼續執行，這可能導致數據完整性問題或導致MantisBT不能正確地運行。
 *
 * @global array $g_display_errors
 */
$g_display_errors = array(
	E_USER_ERROR        => DISPLAY_ERROR_HALT,
	E_RECOVERABLE_ERROR => DISPLAY_ERROR_HALT,
);

# 當服務器為localhost時，添加開發人員預設值
# 註意：故意不使用SERVER_ADDR，因為它不一定都有值
if( isset( $_SERVER['SERVER_NAME'] ) && ( strcasecmp( $_SERVER['SERVER_NAME'], 'localhost' ) == 0
 || $_SERVER['SERVER_NAME'] == '127.0.0.1'
) ) {
	$g_display_errors[E_WARNING] = DISPLAY_ERROR_HALT;
	$g_display_errors[E_ALL]     = DISPLAY_ERROR_INLINE;
}

/**
 * 詳細的錯誤信息
 * 觸發錯誤時顯示變數及其值的列表。
 * 僅適用於配置為DISPLAY_ERROR_HALT的錯誤類型
 * {@link $g_display_errors}
 *
 * 警告：潛在的安全隱患。
 * 只有當你真的需要它進行調試時才打開它。
 *
 * @global integer $g_show_detailed_errors
 */
$g_show_detailed_errors = OFF;

/**
 * 調試信息
 * 如果此選項被關閉（預設），頁面重定向將繼續工作，即使發生非致命錯誤。
 * 出於調試目的，您可以將其設置為ON，以便任何非致命錯誤將阻止頁面重定向，從而允許您查看錯誤。
 * 只有在調試時打開此選項。
 *
 * @global integer $g_stop_on_errors
 */
$g_stop_on_errors = OFF;

/**
 * 系統日志
 * 這控制記錄信息的類型。
 * 可用日志類型：
 *
 * LOG_NONE, LOG_EMAIL, LOG_EMAIL_RECIPIENT, LOG_EMAIL_VERBOSE, LOG_FILTERING,
 * LOG_AJAX, LOG_LDAP, LOG_DATABASE, LOG_WEBSERVICE, LOG_ALL
 *
 * 並可以組合使用
 * {@link https://secure.php.net/manual/zh/language.operators.bitwise.php PHP 位運算符}
 * 有關保存日志的位置的詳細信息，請參閱{@link $g_log_destination}。
 *
 * @global integer $g_log_level
 */
$g_log_level = LOG_NONE;

/**
 * 指定數據日志去向
 *
 * 以下五個選項可用：
 * - '':        空意味著 {@link https://secure.php.net/manual/zh/errorfunc.configuration.php#ini.error-log
 *              預設，PHP 日志設置}
 * - 'none':    不輸出日志，但仍然會觸發EVENT_LOG插件事件。
 * - 'file':    記錄到指定文件（絕對路徑），例如
 *              'file:/var/log/mantis.log' (Unix) 或
 *              'file:c:/temp/mantisbt.log' (Windows)
 * - 'firebug': 使用Firefox {@link http://getfirebug.com/ Firebug 插件}。
 *              如果用戶沒有運行firefox，這個選項會使用預設的php錯誤日志設置。
 * - 'page':    在頁面底部顯示日志輸出。
 *              另請參見{@link $g_show_log_threshold}以限制誰可以查看日志數據。
 *
 * @global string $g_log_destination
 */
$g_log_destination = '';

/**
 * 表示用戶查看日志輸出所需級別
 *（如果{@link $g_log_destination}是“page”）。
 * 請註意，此級別與用戶的全局訪問級別進行比較，而不是與當前活動項目級別進行比較。
 *
 * @global integer $g_show_log_threshold
 */
$g_show_log_threshold = ADMINISTRATOR;

##########################
# 配置設置 #
##########################

/**
 * 以下變數列表不應該在數據庫中。
 * 用於繞過數據庫查找，並在這裏查找適當的全局設置。
 * @global array $g_global_settings
 */
$g_global_settings = array(
	'global_settings', 'admin_checks', 'allow_signup', 'allow_anonymous_login',
	'anonymous_account', 'compress_html', 'allow_permanent_cookie',
	'cookie_time_length', 'cookie_path', 'cookie_domain',
	'cookie_prefix', 'string_cookie', 'project_cookie', 'view_all_cookie',
	'manage_config_cookie', 'manage_user_cookie', 'logout_cookie',
	'bug_list_cookie', 'crypto_master_salt', 'custom_headers',
	'database_name', 'db_username', 'db_password', 'db_type',
	'db_table_prefix','db_table_suffix', 'display_errors', 'form_security_validation',
	'hostname','html_valid_tags', 'html_valid_tags_single_line', 'default_language',
	'language_auto_map', 'fallback_language', 'login_method', 'plugins_enabled', 'session_handler',
	'session_save_path', 'session_validation', 'show_detailed_errors', 'show_queries_count',
	'stop_on_errors', 'version_suffix', 'debug_email',
	'fileinfo_magic_db_file', 'css_include_file', 'css_rtl_include_file', 'meta_include_file',
	'file_type_icons', 'path', 'short_path', 'absolute_path', 'core_path',
	'class_path','library_path', 'language_path', 'absolute_path_default_upload_folder',
	'ldap_simulation_file_path', 'plugin_path', 'bottom_include_page', 'top_include_page',
	'default_home_page', 'logout_redirect_page', 'manual_url', 'logo_url', 'wiki_engine_url',
	'cdn_enabled', 'public_config_names', 'email_login_enabled', 'email_ensure_unique'
);

/**
 * 通過SOAP API可用的配置選項列表。
 * 以下配置選項列表用於檢查是否允許通過SOAP API查詢特定配置選項。
 * @global array $g_public_config_names
 */
$g_public_config_names = array(
	'access_levels_enum_string',
	'action_button_position',
	'add_bugnote_threshold',
	'add_profile_threshold',
	'admin_site_threshold',
	'allow_account_delete',
	'allow_anonymous_login',
	'allow_blank_email',
	'allow_delete_own_attachments',
	'allow_download_own_attachments',
	'allow_file_upload',
	'allow_freetext_in_profile_fields',
	'allow_no_category',
	'allow_permanent_cookie',
	'allow_reporter_close',
	'allow_reporter_reopen',
	'allow_reporter_upload',
	'allow_signup',
	'allowed_files',
	'anonymous_account',
	'antispam_max_event_count',
	'antispam_time_window_in_seconds',
	'assign_sponsored_bugs_threshold',
	'auto_set_status_to_assigned',
	'backward_year_count',
	'bottom_include_page',
	'bug_assigned_status',
	'bug_closed_status_threshold',
	'bug_count_hyperlink_prefix',
	'bug_duplicate_resolution',
	'bug_feedback_status',
	'bug_link_tag',
	'bug_list_cookie',
	'bug_readonly_status_threshold',
	'bug_reminder_threshold',
	'bug_reopen_resolution',
	'bug_reopen_status',
	'bug_resolution_fixed_threshold',
	'bug_resolution_not_fixed_threshold',
	'bug_resolved_status_threshold',
	'bug_revision_drop_threshold',
	'bug_submit_status',
	'bugnote_link_tag',
	'bugnote_order',
	'bugnote_user_change_view_state_threshold',
	'bugnote_user_delete_threshold',
	'bugnote_user_edit_threshold',
	'datetime_picker_format',
	'cdn_enabled',
	'change_view_status_threshold',
	'check_mx_record',
	'complete_date_format',
	'compress_html',
	'cookie_prefix',
	'cookie_time_length',
	'copyright_statement',
	'create_permalink_threshold',
	'create_project_threshold',
	'create_short_url',
	'css_include_file',
	'css_rtl_include_file',
	'csv_separator',
	'custom_field_edit_after_create',
	'custom_field_link_threshold',
	'custom_field_type_enum_string',
	'default_bug_additional_info',
	'default_bug_eta',
	'default_bug_priority',
	'default_bug_projection',
	'default_bug_relationship_clone',
	'default_bug_relationship',
	'default_bug_reproducibility',
	'default_bug_resolution',
	'default_bug_severity',
	'default_bug_steps_to_reproduce',
	'default_bug_view_status',
	'default_bugnote_order',
	'default_bugnote_view_status',
	'default_category_for_moves',
	'default_email_bugnote_limit',
	'default_email_on_assigned_minimum_severity',
	'default_email_on_assigned',
	'default_email_on_bugnote_minimum_severity',
	'default_email_on_bugnote',
	'default_email_on_closed_minimum_severity',
	'default_email_on_closed',
	'default_email_on_feedback_minimum_severity',
	'default_email_on_feedback',
	'default_email_on_new_minimum_severity',
	'default_email_on_new',
	'default_email_on_priority_minimum_severity',
	'default_email_on_priority',
	'default_email_on_reopened_minimum_severity',
	'default_email_on_reopened',
	'default_email_on_resolved_minimum_severity',
	'default_email_on_resolved',
	'default_email_on_status_minimum_severity',
	'default_email_on_status',
	'default_home_page',
	'default_language',
	'default_limit_view',
	'default_manage_tag_prefix',
	'default_manage_user_prefix',
	'default_new_account_access_level',
	'default_project_view_status',
	'default_redirect_delay',
	'default_refresh_delay',
	'default_reminder_view_status',
	'default_show_changed',
	'default_timezone',
	'delete_bug_threshold',
	'delete_bugnote_threshold',
	'delete_project_threshold',
	'development_team_threshold',
	'differentiate_duplicates',
	'disallowed_files',
	'display_bug_padding',
	'display_bugnote_padding',
	'display_project_padding',
	'download_attachments_threshold',
	'due_date_default',
	'due_date_update_threshold',
	'due_date_view_threshold',
	'email_ensure_unique',
	'email_login_enabled',
	'email_notifications_verbose',
	'email_padding_length',
	'email_receive_own',
	'email_separator1',
	'email_separator2',
	'enable_email_notification',
	'enable_eta',
	'enable_product_build',
	'enable_profiles',
	'enable_project_documentation',
	'enable_projection',
	'enable_sponsorship',
	'eta_enum_string',
	'fallback_language',
	'favicon_image',
	'file_upload_max_num',
	'filter_by_custom_fields',
	'filter_custom_fields_per_row',
	'filter_position',
	'forward_year_count',
	'from_email',
	'from_name',
	'handle_bug_threshold',
	'handle_sponsored_bugs_threshold',
	'hide_status_default',
	'history_default_visible',
	'history_order',
	'html_make_links',
	'html_valid_tags_single_line',
	'html_valid_tags',
	'impersonate_user_threshold',
	'inline_file_exts',
	'issue_activity_note_attachments_seconds_threshold',
	'limit_reporters',
	'logo_image',
	'logo_url',
	'logout_cookie',
	'logout_redirect_page',
	'long_process_timeout',
	'lost_password_feature',
	'manage_config_cookie',
	'manage_configuration_threshold',
	'manage_custom_fields_threshold',
	'manage_global_profile_threshold',
	'manage_news_threshold',
	'manage_plugin_threshold',
	'manage_project_threshold',
	'manage_site_threshold',
	'manage_user_threshold',
	'manage_users_cookie',
	'max_dropdown_length',
	'max_failed_login_count',
	'max_file_size',
	'max_lost_password_in_progress_count',
	'mentions_enabled',
	'mentions_tag',
	'meta_include_file',
	'min_refresh_delay',
	'minimum_sponsorship_amount',
	'monitor_add_others_bug_threshold',
	'monitor_bug_threshold',
	'monitor_delete_others_bug_threshold',
	'move_bug_threshold',
	'my_view_boxes_fixed_position',
	'my_view_bug_count',
	'news_enabled',
	'news_limit_method',
	'news_view_limit_days',
	'news_view_limit',
	'normal_date_format',
	'notify_flags',
	'notify_new_user_created_threshold_min',
	'plugins_enabled',
	'preview_attachments_inline_max_size',
	'preview_max_height',
	'preview_max_width',
	'priority_enum_string',
	'priority_significant_threshold',
	'private_bug_threshold',
	'private_bugnote_threshold',
	'private_news_threshold',
	'private_project_threshold',
	'project_cookie',
	'project_status_enum_string',
	'project_user_threshold',
	'project_view_state_enum_string',
	'projection_enum_string',
	'reassign_on_feedback',
	'reauthentication_expiry',
	'reauthentication',
	'recently_visited_count',
	'relationship_graph_enable',
	'relationship_graph_fontname',
	'relationship_graph_fontsize',
	'relationship_graph_max_depth',
	'relationship_graph_orientation',
	'relationship_graph_view_on_click',
	'reminder_receive_threshold',
	'reminder_recipients_monitor_bug',
	'reopen_bug_threshold',
	'report_bug_threshold',
	'report_issues_for_unreleased_versions_threshold',
	'reporter_summary_limit',
	'reproducibility_enum_string',
	'resolution_enum_string',
	'return_path_email',
	'roadmap_update_threshold',
	'roadmap_view_threshold',
	'rss_enabled',
	'search_title',
	'set_bug_sticky_threshold',
	'set_configuration_threshold',
	'set_view_status_threshold',
	'severity_enum_string',
	'severity_significant_threshold',
	'short_date_format',
	'show_assigned_names',
	'show_avatar_threshold',
	'show_avatar',
	'show_bug_project_links',
	'show_changelog_dates',
	'show_detailed_errors',
	'show_footer_menu',
	'show_log_threshold',
	'show_memory_usage',
	'show_monitor_list_threshold',
	'show_priority_text',
	'show_product_version',
	'show_project_menu_bar',
	'show_queries_count',
	'show_realname',
	'show_roadmap_dates',
	'show_sticky_issues',
	'show_timer',
	'show_user_email_threshold',
	'show_user_realname_threshold',
	'show_version_dates_threshold',
	'show_version',
	'signup_use_captcha',
	'sort_by_last_name',
	'sponsor_threshold',
	'sponsorship_currency',
	'sponsorship_enum_string',
	'status_enum_string',
	'status_legend_position',
	'status_percentage_legend',
	'stop_on_errors',
	'store_reminders',
	'stored_query_create_shared_threshold',
	'stored_query_create_threshold',
	'stored_query_use_threshold',
	'string_cookie',
	'subprojects_enabled',
	'subprojects_inherit_categories',
	'subprojects_inherit_versions',
	'summary_category_include_project',
	'tag_attach_threshold',
	'tag_create_threshold',
	'tag_detach_own_threshold',
	'tag_detach_threshold',
	'tag_edit_own_threshold',
	'tag_edit_threshold',
	'tag_separator',
	'tag_view_threshold',
	'time_tracking_edit_threshold',
	'time_tracking_enabled',
	'time_tracking_reporting_threshold',
	'time_tracking_stopwatch',
	'time_tracking_view_threshold',
	'time_tracking_with_billing',
	'time_tracking_without_note',
	'timeline_view_threshold',
	'top_include_page',
	'update_bug_assign_threshold',
	'update_bug_status_threshold',
	'update_bug_threshold',
	'update_bugnote_threshold',
	'update_readonly_bug_threshold',
	'upload_bug_file_threshold',
	'upload_project_file_threshold',
	'use_dynamic_filters',
	'user_login_valid_regex',
	'validate_email',
	'version_suffix',
	'view_all_cookie',
	'view_attachments_threshold',
	'view_bug_threshold',
	'view_changelog_threshold',
	'view_configuration_threshold',
	'view_filters',
	'view_handler_threshold',
	'view_history_threshold',
	'view_proj_doc_threshold',
	'view_sponsorship_details_threshold',
	'view_sponsorship_total_threshold',
	'view_state_enum_string',
	'view_summary_threshold',
	'webmaster_email',
	'webservice_admin_access_level_threshold',
	'webservice_error_when_version_not_found',
	'webservice_eta_enum_default_when_not_found',
	'webservice_priority_enum_default_when_not_found',
	'webservice_projection_enum_default_when_not_found',
	'webservice_readonly_access_level_threshold',
	'webservice_readwrite_access_level_threshold',
	'webservice_resolution_enum_default_when_not_found',
	'webservice_severity_enum_default_when_not_found',
	'webservice_specify_reporter_on_add_access_level_threshold',
	'webservice_status_enum_default_when_not_found',
	'webservice_version_when_not_found',
	'wiki_enable',
	'wiki_engine_url',
	'wiki_engine',
	'wiki_root_namespace',
	'window_title',
	'wrap_in_preformatted_text'
);

# 臨時變數不應在全局範圍內保持定義
unset( $t_protocol, $t_host, $t_hosts, $t_port, $t_self, $t_path );


############################
# Webservice 配置 #
############################

/**
 * 只讀操作訪問Web服務所需最低級別。
 *
 * @global integer $g_webservice_readonly_access_level_threshold
 */
$g_webservice_readonly_access_level_threshold = VIEWER;

/**
 * 訪問Web服務以進行讀/寫操作所需最低級別。
 *
 * @global integer $g_webservice_readwrite_access_level_threshold
 */
$g_webservice_readwrite_access_level_threshold = REPORTER;

/**
 * 訪問管理員Web服務所需最低級別
 *
 * @global integer $g_webservice_admin_access_level_threshold
 */
$g_webservice_admin_access_level_threshold = MANAGER;

/**
 * 在添加BUG時能夠指定記錄名稱所需最低項目訪問級別。
 * 除此以外，當前用戶為報告者。
 * 沒有此訪問級別的用戶可以隨時執行其他步驟來修改問題並指定其他名稱，
 * 但在這種情況下，它將被記錄在原始報告問題的歷史記錄中。
 *
 * @global integer $g_webservice_specify_reporter_on_add_access_level_threshold
 */
$g_webservice_specify_reporter_on_add_access_level_threshold = DEVELOPER;

/**
 * 當Web服務獲取未在關聯的MantisBT安裝中定義的枚舉標簽時，將使用以下枚舉標識。
 * 在這種情況下，將枚舉標識設置為由相應配置選項指定的值。
 *
 * @global integer $g_webservice_priority_enum_default_when_not_found
 */
$g_webservice_priority_enum_default_when_not_found = 0;

/**
 * 當Web服務獲取未在關聯的MantisBT安裝中定義的枚舉標簽時，將使用以下枚舉標識。
 * 在這種情況下，將枚舉標識設置為由相應配置選項指定的值。
 *
 * @global integer $g_webservice_severity_enum_default_when_not_found
 */
$g_webservice_severity_enum_default_when_not_found = 0;

/**
 * 當Web服務獲取未在關聯的MantisBT安裝中定義的枚舉標簽時，將使用以下枚舉標識。
 * 在這種情況下，將枚舉標識設置為由相應配置選項指定的值。
 *
 * @global integer $g_webservice_status_enum_default_when_not_found
 */
$g_webservice_status_enum_default_when_not_found = 0;

/**
 * 當Web服務獲取未在關聯的MantisBT安裝中定義的枚舉標簽時，將使用以下枚舉標識。
 * 在這種情況下，將枚舉標識設置為由相應配置選項指定的值。
 *
 * @global integer $g_webservice_resolution_enum_default_when_not_found
 */
$g_webservice_resolution_enum_default_when_not_found = 0;

/**
 * 當Web服務獲取未在關聯的MantisBT安裝中定義的枚舉標簽時，將使用以下枚舉標識。
 * 在這種情況下，將枚舉標識設置為由相應配置選項指定的值。
 *
 * @global integer $g_webservice_projection_enum_default_when_not_found
 */
$g_webservice_projection_enum_default_when_not_found = 0;

/**
 * 當Web服務獲取未在關聯的MantisBT安裝中定義的枚舉標簽時，將使用以下枚舉標識。
 * 在這種情況下，將枚舉標識設置為由相應配置選項指定的值。
 *
 * @global integer $g_webservice_eta_enum_default_when_not_found
 */
$g_webservice_eta_enum_default_when_not_found = 0;

/**
 * 如果為 ON，且沒有找到提供的版本，則會觸發 SoapException 異常。
 *
 * @global integer $g_webservice_error_when_version_not_found
 */
$g_webservice_error_when_version_not_found = ON;

/**
 * 如果找不到指定的版本，則使用預設版本
 * $g_webservice_error_when_version_not_found == OFF.
 * （目前這個值不依賴於項目）。
 *
 * @global string $g_webservice_version_when_not_found
 */
$g_webservice_version_when_not_found = '';

####################
# 發布活動 #
####################

/**
 * 如果用戶提交了一個說明(#以秒指定)，附件會被鏈接到備註中。0禁用此功能。
 */
$g_issue_activity_note_attachments_seconds_threshold = 3;
