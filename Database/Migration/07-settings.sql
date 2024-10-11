create table if not exists `settings` (
    `id` bigint unsigned not null unique primary key auto_increment ,
    `title` varchar(60)  ,
    `favicon` varchar(60) ,
    `logo` varchar(60) ,
    `h1` varchar(60) ,
    `h2` varchar(60) ,
    `hero_image` varchar(60) ,
    `copyright` varchar(128)
);
alter table `settings` add column `created_at` datetime not null default current_timestamp ;
alter table `settings` add column `updated_at` datetime  ;


alter table `settings` add column `show_category_count` bigint unsigned after `copyright`;
alter table `settings` add column `show_article_count` bigint unsigned not null after `show_category_count`;
alter table `settings` add column `article_default_thumbnail` varchar(60) not null after `hero_image`;
alter table `settings` add column `user_default_thumbnail` varchar(60) not null after `article_default_thumbnail`;
