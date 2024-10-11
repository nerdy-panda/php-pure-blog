create table if not exists `users` (
    `id` bigint unsigned not null unique primary key auto_increment ,
    `name` varchar(40) not null ,
    `username` varchar(30) not null unique ,
    `email` varchar(60) not null  unique ,
    `password` varchar(60) not null ,
    `thumbnail` varchar(60) default null ,
    `created_at` datetime not null default now() ,
    `updated_at` datetime default null ,
    index (`name`,`username`,`email`)
);

drop table if exists `users`;