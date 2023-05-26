# Caps

1 Step - Change the file name of Index_main.html to index.php
2 Go To myPHPadmin and create 1 database name caps
3 Then create two tables called signin and blogs
4 In signin table create strute like this

	#	Name	              Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	id                  Primary	int(50)			No	None		AUTO_INCREMENT	Change Change	Drop Drop	
	2	username	          varchar(25)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	3	password	          varchar(25)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	4	email	              varchar(50)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	5	phoneno	            varchar(10)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	6	committee         	varchar(25)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	7	fullname	          varchar(25)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	

5 In blog table create structure like this

	#	Name	                                             Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	author	                                           varchar(50)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	2	title	                                             varchar(100)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	3	content	                                           longtext	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	4	date	                                             date			No	current_timestamp()			Change Change	Drop Drop	
	5	committee                                          varchar(25)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	6	id Primary	                                       int(50)	No	None		AUTO_INCREMENT	Change Change	Drop Drop
  
  I will make changes in this site, if you want updates you can follow me on Twitter and Notice !! Please Open index_main.html for preview and if you want to give contributions you are welcome.
