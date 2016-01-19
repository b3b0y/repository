<?php date_default_timezone_set("Asia/Hong_kong");
        session_start();
include_once("../php/config.php");

if($_SESSION['UserLvl'] < 4)
{
        header("Location: ../index.php");
} 
   

    /**
     * This file contains the Backup_Database class wich performs
     * a partial or complete backup of any given MySQL database
     * @author Daniel López Azaña <http://www.azanweb.com-->
     * @version 1.0
     */

    // Report all errors
    error_reporting(E_ALL);

    /**
     * Define database parameters here
     */
    define("DB_USER", $dbuser);
    define("DB_PASSWORD", $dbpass);
    define("DB_NAME", $dbname);
    define("DB_HOST", $dbhost);
    define("OUTPUT_DIR", '../Data/Database_backup/');
    define("TABLES", '*');

    if(!file_exists('../Data/Database_backup'))
    {
        mkdir('../Data/Database_backup/');
    }


    /**
     * Instantiate Backup_Database and perform backup
     */
    $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $status = $backupDatabase->backupTables(TABLES, OUTPUT_DIR) ? 'OK' : 'KO';

    /**
     * The Backup_Database class
     */
    class Backup_Database {
        /**
         * Host where database is located
         */
        var $host = '';

        /**
         * Username used to connect to database
         */
        var $username = '';

        /**
         * Password used to connect to database
         */
        var $passwd = '';

        /**
         * Database to backup
         */
        var $dbName = '';

        /**
         * Database charset
         */
        var $charset = '';

        /**
         * Constructor initializes database
         */
        function Backup_Database($host, $username, $passwd, $dbName, $charset = 'utf8')
        {
            $this->host     = $host;
            $this->username = $username;
            $this->passwd   = $passwd;
            $this->dbName   = $dbName;
            $this->charset  = $charset;

            $this->initializeDatabase();
        }

        protected function initializeDatabase()
        {
            $conn = mysql_connect($this->host, $this->username, $this->passwd);
            mysql_select_db($this->dbName, $conn);
            if (! mysql_set_charset ($this->charset, $conn))
            {
                mysql_query('SET NAMES '.$this->charset);
            }
        }

        /**
         * Backup the whole database or just some tables
         * Use '*' for whole database or 'table1 table2 table3...'
         * @param string $tables
         */
        public function backupTables($tables = '*', $outputDir = '.')
        {
            try
            {
                /**
                * Tables to export
                */
                if($tables == '*')
                {
                    $tables = array();
                    $result = mysql_query('SHOW TABLES');
                    while($row = mysql_fetch_row($result))
                    {
                        $tables[] = $row[0];
                    }
                }
                else
                {
                    $tables = is_array($tables) ? $tables : explode(',',$tables);
                }

                $sql = 'CREATE DATABASE IF NOT EXISTS '.$this->dbName.";\n\n";
                $sql .= 'USE '.$this->dbName.";\n\n";

                /**
                * Iterate tables
                */
                foreach($tables as $table)
                {

                    $result = mysql_query('SELECT * FROM '.$table);
                    $numFields = mysql_num_fields($result);

                    $sql .= 'DROP TABLE IF EXISTS '.$table.';';
                    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
                    $sql.= "\n\n".$row2[1].";\n\n";

                    for ($i = 0; $i < $numFields; $i++) 
                    {
                        while($row = mysql_fetch_row($result))
                        {
                            $sql .= 'INSERT INTO '.$table.' VALUES(';
                            for($j=0; $j<$numFields; $j++) 
                            {
                                $row[$j] = addslashes($row[$j]);
                                $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                                if (isset($row[$j]))
                                {
                                    $sql .= '"'.$row[$j].'"' ;
                                }
                                else
                                {
                                    $sql.= '""';
                                }

                                if ($j < ($numFields-1))
                                {
                                    $sql .= ',';
                                }
                            }

                            $sql.= ");\n";
                        }
                    }

                    $sql.="\n\n\n";

                }
            }
            catch (Exception $e)
            {
                var_dump($e->getMessage());
                return false;
            }

            return $this->saveFile($sql, $outputDir);
        }

        /**
         * Save SQL to file
         * @param string $sql
         */
        protected function saveFile(&$sql, $outputDir = '.')
        {
            if (!$sql) return false;

            try
            {
                $handle = fopen($outputDir.'database-cicte-backup-'.date("Ymd-His", time()).'.sql','w+');
                fwrite($handle, $sql);
                fclose($handle);
            }
            catch (Exception $e)
            {
                var_dump($e->getMessage());
                return false;
            }

            return true;
        }
    }

    echo "<script> alert('Database is successfully backup'); window.location.href='../index.php?folder='; </script>";
?>