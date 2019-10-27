<?PHP	
	//connect to database
	/*
	$mysql = [
    'driver' => 'mysql',
	'default' => getenv('DB_CONNECTION', 'mysql'),
    'host' => getenv('DB_HOST', '140.121.197.197'),
    'port' => getenv('DB_PORT', '3307'),
    'database' => getenv('DB_DATABASE', 'pigether'),
    'username' => getenv('DB_USERNAME', 'root'),
    'password' => getenv('DB_PASSWORD', '2019db3'),
    'unix_socket' => getenv('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
	];
	*/
	include ("app\User.php");
	
	$user = new User([
		'name' => 'pepe',
		'email' => '123@gmail.com',
		'password' => '123'
	]);
	
	$user->save();
	
	$user1 = User::create([
		'name' => 'pepe1',
		'email' => '1231@gmail.com',
		'password' => '1231'
	]);
	
	
	//DB::insert('insert into users (id, password, name) values (?, ?, ?)', array('00657124', 'suara1201', '李珮'));
	
	/*
	Schema::create('users', function ($table) {
    
	$table->increments('id'); //if this can not work, using bigIncrements
	$table->string('password');
	$table->string('name', 100);
	$table->string('department', 100);
	$table->integer('grade');
	$table->integer('sex');
	$table->string('email', 100);
	$table->string('cellphone', 100);
	$table->string('lineID', 100);
	
	
	$table->string('department', 100);
});*/


?>