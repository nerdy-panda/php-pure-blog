truncate table `users`;
insert into `users` values
(null,'محمد رضا شمس' ,'dashboard','nerdpanda@gmail.com',sha1("admin"),"user-1.png",current_timestamp,null) ,
(null,'Ali Reza' ,'alireza','alireza@yahoo.com',sha1("alireza"),"user-2.png",current_timestamp,null) ,
(null,'عباس' ,'abas','abas@hotmail.com',sha1("abas"),"user-3.png",current_timestamp,current_timestamp)
