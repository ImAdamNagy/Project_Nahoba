create table carTypes
(
    id   bigint unsigned auto_increment
        primary key,
    name varchar(255) not null,
    year int          null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO carTypes (id, name, year) VALUES (1, 'Audi 100', 1994);
INSERT INTO carTypes (id, name, year) VALUES (2, 'Audi 100', 1993);
INSERT INTO carTypes (id, name, year) VALUES (3, 'Audi 100', 1992);
INSERT INTO carTypes (id, name, year) VALUES (4, 'Audi 80', 1992);
INSERT INTO carTypes (id, name, year) VALUES (5, 'Audi 90', 1994);
INSERT INTO carTypes (id, name, year) VALUES (6, 'Audi 90', 1993);
INSERT INTO carTypes (id, name, year) VALUES (7, 'Audi A3', 2018);
INSERT INTO carTypes (id, name, year) VALUES (8, 'Audi A3', 2017);
INSERT INTO carTypes (id, name, year) VALUES (9, 'Audi A3', 2016);
INSERT INTO carTypes (id, name, year) VALUES (10, 'Daewoo Kalos', 2003);
INSERT INTO carTypes (id, name, year) VALUES (11, 'Daewoo Lanos', 2000);
INSERT INTO carTypes (id, name, year) VALUES (12, 'Daewoo Lanos', 2002);
INSERT INTO carTypes (id, name, year) VALUES (13, 'Ford Focus', 2001);
INSERT INTO carTypes (id, name, year) VALUES (14, 'Ford Focus', 2002);
INSERT INTO carTypes (id, name, year) VALUES (15, 'Ford Focus', 2003);
INSERT INTO carTypes (id, name, year) VALUES (16, 'FIAT 500', 2016);
INSERT INTO carTypes (id, name, year) VALUES (17, 'FIAT 500', 2014);
INSERT INTO carTypes (id, name, year) VALUES (18, 'FIAT 500', 2017);
INSERT INTO carTypes (id, name, year) VALUES (19, 'FIAT 500', 2019);
INSERT INTO carTypes (id, name, year) VALUES (20, 'MAZDA 323', 1994);
INSERT INTO carTypes (id, name, year) VALUES (21, 'MAZDA 626', 2002);
INSERT INTO carTypes (id, name, year) VALUES (22, 'MAZDA 626', 2000);
INSERT INTO carTypes (id, name, year) VALUES (23, 'Volkswagen Arteon', 2019);
INSERT INTO carTypes (id, name, year) VALUES (24, 'Volkswagen Atlas', 2019);
INSERT INTO carTypes (id, name, year) VALUES (25, 'Volkswagen Atlas', 2018);
INSERT INTO carTypes (id, name, year) VALUES (26, 'Volkswagen CC', 2017);
INSERT INTO carTypes (id, name, year) VALUES (27, 'Volkswagen CC', 2014);
INSERT INTO carTypes (id, name, year) VALUES (28, 'Volvo 240', 1993);
INSERT INTO carTypes (id, name, year) VALUES (29, 'Volvo 240', 1992);
INSERT INTO carTypes (id, name, year) VALUES (30, 'Volvo 740', 1992);
INSERT INTO carTypes (id, name, year) VALUES (31, 'Volvo 850', 1997);
INSERT INTO carTypes (id, name, year) VALUES (32, 'Toyota 4Runner', 2018);
INSERT INTO carTypes (id, name, year) VALUES (33, 'Toyota 4Runner', 2018);
INSERT INTO carTypes (id, name, year) VALUES (34, 'Toyota Avalon', 2020);
INSERT INTO carTypes (id, name, year) VALUES (35, 'Toyota Avalon', 2019);
INSERT INTO carTypes (id, name, year) VALUES (36, 'smart fortwo', 2015);
INSERT INTO carTypes (id, name, year) VALUES (37, 'smart fortwo', 2014);
INSERT INTO carTypes (id, name, year) VALUES (38, 'smart fortwo cabrio', 2017);
INSERT INTO carTypes (id, name, year) VALUES (39, 'Honda Accord', 2016);
INSERT INTO carTypes (id, name, year) VALUES (40, 'Honda Accord', 2015);
INSERT INTO carTypes (id, name, year) VALUES (41, 'Honda CR-V', 2018);
INSERT INTO carTypes (id, name, year) VALUES (42, 'Honda CR-V', 2014);
INSERT INTO carTypes (id, name, year) VALUES (43, 'Other', null);

create table chats
(
    id     bigint unsigned auto_increment
        primary key,
    `from` bigint unsigned not null,
    `to`   bigint unsigned not null,
    constraint chats_from_foreign
        foreign key (`from`) references users (id),
    constraint chats_to_foreign
        foreign key (`to`) references users (id)
)
    collate = utf8mb4_unicode_ci;


create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                        not null,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;


create table mechanic
(
    id           bigint unsigned auto_increment
        primary key,
    introduction text            not null,
    country      varchar(255)    not null,
    postal_code  int             not null,
    city         varchar(255)    not null,
    address      varchar(255)    not null,
    profile_pic  varchar(255)    not null,
    profession   varchar(255)    not null,
    user_id      bigint unsigned not null,
    constraint mechanic_user_id_foreign
        foreign key (user_id) references users (id)
)
    collate = utf8mb4_unicode_ci;

INSERT INTO mechanic (id, introduction, country, postal_code, city, address, profile_pic, profession, user_id) VALUES (1, 'Hey Im Adam and i have been working in the mechanic industry for eleven years now. If you have any problems with your car just leave me a message.', 'Magyarország', 1183, 'Budapest', 'Zsolt street 54.', 'adam.jpg', 'car mechanic', 4);
INSERT INTO mechanic (id, introduction, country, postal_code, city, address, profile_pic, profession, user_id) VALUES (2, 'Hello I am Krisztián aka Kiki. And I am a car body locksmith. You want to change one of the mirrors or got a scratch on the inside? Just call me.', 'Magyarország', 1185, 'Budapest', 'Nyiregyhaza street 54.', 'kiki.jpg', 'car locksmith', 2);
INSERT INTO mechanic (id, introduction, country, postal_code, city, address, profile_pic, profession, user_id) VALUES (3, 'It\'s me Bandi. I feel familiar not only with cars but with the motorbikes as well. If you have anything that needs a fix, you can find me here.', 'Magyarország', 1186, 'Budapest', 'Kis street 20.', 'bandi.jpg', 'engine professor', 7);
INSERT INTO mechanic (id, introduction, country, postal_code, city, address, profile_pic, profession, user_id) VALUES (4, 'It\'s Béla here. Im just working around cars and stuff. Im not professional yet, but I am doing a serious job. You won\'t regret if you call me.', 'Magyarország', 1187, 'Budapest', 'Nagy street 63.', 'mechanic2.jpg', 'mechanic', 3);
INSERT INTO mechanic (id, introduction, country, postal_code, city, address, profile_pic, profession, user_id) VALUES (5, 'Listen everybody it\'s Pista Kis here. One of the best mechanics in town. I can fix nearly anything that has wheels. Give me a call.', 'Magyarország', 1187, 'Budapest', 'Nagy street 63.', 'mechanic1.jpg', 'race engineer', 5);

create table messages
(
    id         bigint unsigned auto_increment
        primary key,
    message    varchar(255)    not null,
    sender_id  bigint unsigned not null,
    chat_id    bigint unsigned not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    constraint messages_chat_id_foreign
        foreign key (chat_id) references chats (id),
    constraint messages_sender_id_foreign
        foreign key (sender_id) references users (id)
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO migrations (id, migration, batch) VALUES (1, '2013_04_15_095610_create_roles_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (2, '2014_10_12_000000_create_users_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (4, '2018_08_08_100000_create_telescope_entries_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (5, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (6, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (7, '2020_04_26_085855_create_car_types_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (8, '2023_03_15_154638_create_types_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (9, '2023_03_16_070556_product__migration', 1);
INSERT INTO migrations (id, migration, batch) VALUES (10, '2023_04_21_075209_create_chats_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (11, '2023_04_21_163654_create_mechanic_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (12, '2023_04_24_054045_create_messages_table', 1);

create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    expires_at     timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table products
(
    id                  bigint unsigned auto_increment
        primary key,
    seller_id           bigint unsigned not null,
    product_name        varchar(255)    not null,
    product_price       int             not null,
    types_id            bigint unsigned not null,
    car_typeId          bigint unsigned not null,
    product_img         varchar(255)    not null,
    product_description varchar(150)    not null,
    product_location    varchar(120)    not null,
    product_enable      tinyint(1)      not null,
    constraint products_car_typeid_foreign
        foreign key (car_typeId) references carTypes (id),
    constraint products_seller_id_foreign
        foreign key (seller_id) references users (id),
    constraint products_types_id_foreign
        foreign key (types_id) references types (id)
)
    collate = utf8mb4_unicode_ci;

INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (1, 2, 'Steering wheel', 8000, 2, 1, 'steer.jpg', 'Used steering wheel for audi', 'Budapest 18.', 1);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (2, 2, 'Clutch', 4000, 11, 9, 'clutch.jpg', 'Clutch top', 'Budapest 10.', 1);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (3, 2, 'Front light', 11000, 8, 15, 'opellight.jpg', 'Front left light', 'Budapest 20.', 1);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (4, 4, 'Front bumper', 6000, 16, 1, 'opelcoolingfront.jpg', 'Brand new front bumper', 'Budapest 20.', 1);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (5, 4, 'Rear light', 7300, 8, 4, 'rearlight.jpg', 'Rear light for sedan models. It is used but functioning perfectly', 'Budapest 6.', 1);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (6, 4, 'Trunk lock', 500, 3, 2, 'backpack.jpg', 'Used lock for trunks. Still capable of locking', 'Budapest 19.', 1);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (7, 3, 'Steer switches', 16000, 2, 20, 'steerswitch.jpg', 'A pair of steer switches', 'Budapest 12.', 0);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (8, 3, 'Rear wing', 18000, 5, 17, 'wing.jpg', 'Medium sized rear wing', 'Budapest 15.', 0);
INSERT INTO products (id, seller_id, product_name, product_price, types_id, car_typeId, product_img, product_description, product_location, product_enable) VALUES (9, 3, 'Mirror', 9000, 16, 10, 'leftmirror.jpg', 'Factory new left mirror', 'Budapest 13.', 0);

create table roles
(
    id        bigint unsigned auto_increment
        primary key,
    role_name varchar(25) not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO roles (id, role_name) VALUES (1, 'admin');
INSERT INTO roles (id, role_name) VALUES (2, 'seller');
INSERT INTO roles (id, role_name) VALUES (3, 'mechanic');

create table types
(
    id   bigint unsigned auto_increment
        primary key,
    type varchar(20) not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO types (id, type) VALUES (1, 'Wheel');
INSERT INTO types (id, type) VALUES (2, 'Steer');
INSERT INTO types (id, type) VALUES (3, 'Engine');
INSERT INTO types (id, type) VALUES (4, 'Battery');
INSERT INTO types (id, type) VALUES (5, 'Turbo');
INSERT INTO types (id, type) VALUES (6, 'Brake Pads');
INSERT INTO types (id, type) VALUES (7, 'Brake Disc');
INSERT INTO types (id, type) VALUES (8, 'Bulb');
INSERT INTO types (id, type) VALUES (9, 'Air Filter');
INSERT INTO types (id, type) VALUES (10, 'Oil Filter');
INSERT INTO types (id, type) VALUES (11, 'Switch');
INSERT INTO types (id, type) VALUES (12, 'Exhaust');
INSERT INTO types (id, type) VALUES (13, 'Spark Plug');
INSERT INTO types (id, type) VALUES (14, 'Suspension');
INSERT INTO types (id, type) VALUES (15, 'Lubricants & Fluids');
INSERT INTO types (id, type) VALUES (16, 'Other');

create table users
(
    id             bigint unsigned auto_increment
        primary key,
    firstname      varchar(255)    not null,
    lastname       varchar(255)    not null,
    email          varchar(255)    not null,
    tel            varchar(255)    not null,
    username       varchar(255)    not null,
    password       varchar(255)    not null,
    remember_token varchar(100)    null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    role_id        bigint unsigned not null,
    last_used_at   timestamp       null,
    constraint users_email_unique
        unique (email),
    constraint users_username_unique
        unique (username),
    constraint users_role_id_foreign
        foreign key (role_id) references roles (id)
)
    collate = utf8mb4_unicode_ci;

INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (1, 'Pista', 'Kovács', 'admin@admin.com', '06304558183', 'admin', '$2y$10$hiefvjixF.rI2gmex8DF0eafx/qWnBtORGz7t3QSdy15PWHaAT5sC', null, null, null, 1, null);
INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (2, 'Krisztián', 'Holló', 'hollokg@gmail.com', '06706422096', 'KriszRaven', '$2y$10$WbbpuueRH8gFN0Koljis4OASx22JSUU681En2hmQNgArYmmX8z5ta', null, null, null, 2, null);
INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (3, 'Béla', 'Kis', 'kisbela@gmail.com', '06809871213', 'KisBela', '$2y$10$DWh1qYSdCzpjlmuadS5CbOWUQXX6.P177b5lAgLTH8r5gtiFO2SOS', null, null, null, 3, null);
INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (4, 'Adam', 'Nagy', 'adamattila@gmail.com', '06809871213', 'adamnagy', '$2y$10$YhTKmUSFt09o19WbLJzXKOMXTNOrC1aT0rCWAQuMyahZUCumUMqkK', null, null, null, 2, null);
INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (5, 'Pista', 'Kis', 'kispista@gmail.com', '06809871213', 'kispista', '$2y$10$EcS0eKDykBL5KSZl9BT6yO2XdlsuR53JwxlBMTAuJU5mqUhGLN9Qy', null, null, null, 3, null);
INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (6, 'Bela', 'Nagy', 'belanagy@gmail.com', '06809871213', 'belanagy', '$2y$10$WbbX.whL8ncpa.tWLBY6OuwVQy7Nhbmbb4CDjDDiiISFcJ39rIWfK', null, null, null, 3, null);
INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (7, 'András', 'Bátori', 'batori.andras@gmail.com', '06706422096', 'bandesz', '$2y$10$3rHhteSutOBi.s.rTgyNZOlq8P/0mmS39fLQctwvYmDdCJIgP8lVG', null, null, null, 2, null);
INSERT INTO users (id, firstname, lastname, email, tel, username, password, remember_token, created_at, updated_at, role_id, last_used_at) VALUES (8, 'Seller', 'Mihály', 'SellerMisi4@gmail.com', '06706892096', 'SellerMisi4', '$2y$10$u0zO1ZkHKNlkW7pNK9T64eR1cowXdwjtsCIbtVdDA0R1pfMnJiwL2', null, null, null, 2, null);
