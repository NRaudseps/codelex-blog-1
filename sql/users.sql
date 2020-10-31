create table users
(
    id         int(4) auto_increment
        primary key,
    name       varchar(255)                       not null,
    email      varchar(255)                       not null,
    password   varchar(255)                       null,
    created_at datetime default CURRENT_TIMESTAMP not null
);