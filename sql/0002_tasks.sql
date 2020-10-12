-- auto-generated definition
create table tasks
(
    id          int auto_increment
        primary key,
    user_id     int         null,
    description int         null,
    created_at  date        null,
    status      varchar(10) null
);
