<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Helpers\Handler;

use Artisan;

/**
 * php artisan db:create {name}
 * Artisan::call('db:create', [ 'name' => {dbname} ]);
 * php artisan migrate --path="common path for subdomains tables"
 */
class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySQL database based on the database config file or the provided name';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{
            
            $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");
            $charset = config("database.connections.mysql.charset",'utf8mb4');
            $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

            $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

            DB::statement($query);

            //config(["database.connections.mysql.database" => $schemaName]);
            //echo "Database $schemaName created successfully.";

            // Set the new 'mysql_temp' DB Connection.
            Handler::setDatabaseConnection($schemaName);

            // Migrate tables to the new DB. 
            $this->callSilent('migrate', [ '--database' => 'mysql_temp', '--path' => 'database/common-migrations' ]);

            return true;

        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
    }
}
