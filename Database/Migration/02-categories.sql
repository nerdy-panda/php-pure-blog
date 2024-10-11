create table if not exists `categories` (
    `id` bigint unsigned not null unique auto_increment primary key ,
    `name` varchar(90) not null unique ,
    `slug` varchar(200) not null  unique ,
    `icon` varchar(50) default null ,
    `user_id` bigint unsigned ,
    `created_at` datetime not null  default now() ,
    `updated_at` datetime default null ,
    foreign key (`user_id`) references `users`(`id`) on delete SET NULL on update cascade
);
alter table if exists `categories` add column `articles_count` bigint unsigned not null default 0 after  `user_id`

