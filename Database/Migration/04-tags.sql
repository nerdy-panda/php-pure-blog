create table `tags`(
    `id` bigint unsigned not null unique primary key auto_increment ,
    `name` varchar(60) not null unique ,
    `user_id` bigint unsigned ,
    `created_at` datetime not null  default current_timestamp ,
    `updated_at` datetime default null ,
    foreign key (`user_id`) references `users`(`id`) on delete set null on update cascade
);

alter table if exists `tags` modify column `slug`  varchar(128) not null after `name`;
update `tags` set `slug` = replace(`name`," ","-")