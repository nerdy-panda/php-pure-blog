create table if not exists `articles` (
    `id` bigint unsigned not null unique  primary key  auto_increment ,
    `title` varchar(256) not null ,
    `slug` varchar(524) not null unique ,
    `summary` varchar(600) ,
    `body` longtext ,
    `thumbnail` varchar(256) default null ,
    `user_id` bigint unsigned ,
    `like_count` bigint unsigned not null default 0 ,
    `view_count` bigint unsigned not null  default 0 ,
    `comment_count` bigint unsigned not null  default 0 ,
    `created_at` datetime not null default current_timestamp() ,
    `updated_at` datetime default null ,
    foreign key (`user_id`) references `users`(`id`) on delete set null on update cascade
);
alter table articles add column `category_id` bigint unsigned after `user_id`;
alter table articles add foreign key (`category_id`) references `categories`(`id`) on delete set null on update cascade ;

