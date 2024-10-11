create table if not exists `article_tags` (
    `id` bigint unsigned not null unique primary key auto_increment ,
    `tag_id` bigint unsigned not null ,
    `article_id` bigint unsigned not null ,
    `user_id` bigint unsigned ,
    foreign key (`tag_id`) references `tags`(`id`) on delete cascade on update cascade  ,
    foreign key (`article_id`) references articles(`id`) on delete cascade on update cascade ,
);
alter table `article_tags` add foreign key (`user_id`) references `users`(`id`) on delete set null on update cascade ;