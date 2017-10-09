There are two directory named "queansfront" for Frontend and "quesans.dev" for backend.

Front end:
----------
It is made by simple html,bootstrap and jquery.
There is one APP_URL where by default is "http://quesans.dev/api/queans" which describe where api is created.

Backend for API:created a virtulhost as "http://quesans.dev"
-----------------------------------------------------------
It is created by Laravel 5.5.Moreover created a middle to handle "cors" and save whole json data into table.
Please apply Compsoer Update command to install it perfectly.
Please set up env file for database and user name and password.

afterwards,php apply "php artisan make:migrate" to apply migration file which creates questions table in you database.

http://quesans.dev/api/queans [GET] => will list out last inserted question and answer dependency.
http://quesans.dev/api/queans [POST] => will store data in json format with "questionanswer" data key.

Note:
----
There is only validation for backend to check wheather "questionanswer" post key is exists or not.

Frienly speaking dont have that much time to do all type of validation like Input question,answer have text and all others.Moreover a lot thing from server side of hasone,hasmore,belongsto,etc....


Built on System:
----------------
Ubuntu 16.04
Nginx

So while installing laravl 5.5 and "update composer",you may find error of permission so give it.
