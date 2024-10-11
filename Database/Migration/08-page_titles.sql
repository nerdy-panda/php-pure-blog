create table if not exists `page_titles`(
    `id` bigint unsigned not null unique primary key auto_increment ,
    `script_name` varchar(128) not null unique  ,
    `title` varchar(60) not null
);