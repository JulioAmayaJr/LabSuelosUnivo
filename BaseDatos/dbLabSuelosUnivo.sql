CREATE TABLE `rol` (
  `id_rol` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(40)
);

CREATE TABLE `users` (
  `id_user` integer PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(255),
  `date_register` date,
  `image` varchar(100),
  `status` integer,
  `id_rol` integer
);

CREATE TABLE `type_customer` (
  `id_type_customer` integer PRIMARY KEY AUTO_INCREMENT,
  `type_customer` varchar(50)
);

CREATE TABLE `customer` (
  `id_customer` integer PRIMARY KEY AUTO_INCREMENT,
  `name_customer` varchar(100),
  `email` varchar(50),
  `municipality` varchar(50),
  `department` varchar(50),
  `number_dui` varchar(12),
  `address` varchar(50),
  `cell_phone` varchar(20),
  `number_nit` varchar(50),
  `spin` varchar(50),
  `social_reason` varchar(50),
  `no_register_nrc` varchar(50),
  `id_type_customer` integer
);

CREATE TABLE `project` (
  `id_project` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `id_customer` integer,
  `date_register` date,
  `coordinates` varchar(200),
  `id_user` integer
);

CREATE TABLE `group_sample` (
  `id_group_sample` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50)
);

CREATE TABLE `sample` (
  `id_sample` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50),
  `rules` varchar(50),
  `id_group_sample` integer,
  `id_user` integer,
  `id_project` integer
);

CREATE TABLE `field` (
  `id_field` integer PRIMARY KEY AUTO_INCREMENT,
  `name_field` varchar(50),
  `value_field` varchar(100),
  `type_field` varchar(50)
);

CREATE TABLE `field_sample` (
  `id_field_sample` integer PRIMARY KEY AUTO_INCREMENT,
  `id_sample` integer,
  `id_field` integer,
  `status` bool
);

CREATE TABLE `method` (
  `id_method` integer PRIMARY KEY AUTO_INCREMENT,
  `id_field_sample` integer,
  `operation` varchar(50)
);

ALTER TABLE `users` ADD FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

ALTER TABLE `customer` ADD FOREIGN KEY (`id_type_customer`) REFERENCES `type_customer` (`id_type_customer`);

ALTER TABLE `project` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `sample` ADD FOREIGN KEY (`id_group_sample`) REFERENCES `group_sample` (`id_group_sample`);

ALTER TABLE `sample` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

ALTER TABLE `sample` ADD FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

ALTER TABLE `field_sample` ADD FOREIGN KEY (`id_sample`) REFERENCES `sample` (`id_sample`);

ALTER TABLE `field_sample` ADD FOREIGN KEY (`id_field`) REFERENCES `field` (`id_field`);

ALTER TABLE `method` ADD FOREIGN KEY (`id_field_sample`) REFERENCES `field_sample` (`id_field_sample`);
