create table if not exists `comments`(
    `id` bigint unsigned not null primary key unique auto_increment ,
    `body` longtext not null ,
    `name` varchar(60) default null ,
    `email` varchar(60) default null ,
    `approved` bool not null default false ,
    `like_count` bigint unsigned not null default 0 ,
    `dislike_count` bigint unsigned not null default 0 ,
    `article_id` bigint unsigned not null ,
    `user_id` bigint unsigned default null,
    `parent_id` bigint unsigned default null,
    `created_at` datetime not null default current_timestamp() ,
    `updated_at` datetime default null ,
    foreign key (`article_id`) references articles(`id`) on delete cascade on update cascade ,
    foreign key (`user_id`) references `users`(`id`) on delete set null on update cascade ,
    foreign key (`parent_id`) references `comments`(`id`) on delete cascade on update cascade
)