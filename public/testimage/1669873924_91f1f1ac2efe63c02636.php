{
    "title": "mysqli_sql_exception",
    "type": "mysqli_sql_exception",
    "code": 500,
    "message": "Unknown column 'Files' in 'where clause'",
    "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/system/Database/MySQLi/Connection.php",
    "line": 329,
    "trace": [
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/system/Database/MySQLi/Connection.php",
            "line": 329,
            "function": "query",
            "class": "mysqli",
            "type": "->",
            "args": [
                "SELECT ed.* FROM `control_assessment` as ed  where ed.status=1 AND ed.id = Files"
            ]
        },
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/system/Database/BaseConnection.php",
            "line": 732,
            "function": "execute",
            "class": "CodeIgniter\\Database\\MySQLi\\Connection",
            "type": "->",
            "args": [
                "SELECT ed.* FROM `control_assessment` as ed  where ed.status=1 AND ed.id = Files"
            ]
        },
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/system/Database/BaseConnection.php",
            "line": 647,
            "function": "simpleQuery",
            "class": "CodeIgniter\\Database\\BaseConnection",
            "type": "->",
            "args": [
                "SELECT ed.* FROM `control_assessment` as ed  where ed.status=1 AND ed.id = Files"
            ]
        },
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/app/Controllers/Controlwork.php",
            "line": 956,
            "function": "query",
            "class": "CodeIgniter\\Database\\BaseConnection",
            "type": "->",
            "args": [
                "SELECT ed.* FROM `control_assessment` as ed  where ed.status=1 AND ed.id = Files"
            ]
        },
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/system/CodeIgniter.php",
            "line": 928,
            "function": "assessment_report",
            "class": "App\\Controllers\\Controlwork",
            "type": "->",
            "args": [
                "6",
                "Files",
                "assessment-report.php"
            ]
        },
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/system/CodeIgniter.php",
            "line": 436,
            "function": "runController",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                {
                    "session": {}
                }
            ]
        },
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/system/CodeIgniter.php",
            "line": 336,
            "function": "handleRequest",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": [
                null,
                {
                    "handler": "file",
                    "backupHandler": "dummy",
                    "storePath": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/writable/cache/",
                    "cacheQueryString": false,
                    "prefix": "",
                    "ttl": 60,
                    "file": {
                        "storePath": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/writable/cache/",
                        "mode": 416
                    },
                    "memcached": {
                        "host": "127.0.0.1",
                        "port": 11211,
                        "weight": 1,
                        "raw": false
                    },
                    "redis": {
                        "host": "127.0.0.1",
                        "password": null,
                        "port": 6379,
                        "timeout": 0,
                        "database": 0
                    },
                    "validHandlers": {
                        "dummy": "CodeIgniter\\Cache\\Handlers\\DummyHandler",
                        "file": "CodeIgniter\\Cache\\Handlers\\FileHandler",
                        "memcached": "CodeIgniter\\Cache\\Handlers\\MemcachedHandler",
                        "predis": "CodeIgniter\\Cache\\Handlers\\PredisHandler",
                        "redis": "CodeIgniter\\Cache\\Handlers\\RedisHandler",
                        "wincache": "CodeIgniter\\Cache\\Handlers\\WincacheHandler"
                    }
                },
                false
            ]
        },
        {
            "file": "/home/m5ct7xvm3eq2/public_html/user.positiivplus.io/index.php",
            "line": 37,
            "function": "run",
            "class": "CodeIgniter\\CodeIgniter",
            "type": "->",
            "args": []
        }
    ]
}