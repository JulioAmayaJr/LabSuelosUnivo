CREATE TABLE `tbl_rol` (
  `id_rol` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50)
);

CREATE TABLE `tbl_user` (
  `id_user` integer PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(255),
  `date_register` date,
  `image` varchar(100),
  `status` integer
);

CREATE TABLE `tbl_type_customer` (
  `id_type_customer` integer PRIMARY KEY AUTO_INCREMENT,
  `type_customer` varchar(50)
);

CREATE TABLE `tbl_customer` (
  `id_customer` integer PRIMARY KEY,
  `name_customer` varchar(50),
  `email` varchar(50),
  `municipality` varchar(50),
  `deparment` varchar(50),
  `number_dui` integer,
  `address` varchar(50),
  `cell_phone` varchar(50),
  `number_nit` varchar(50),
  `spin` varchar(50),
  `social_reason` varchar(50),
  `no_register_nrc` varchar(50),
  `id_type_customer` integer
);

CREATE TABLE `tbl_group_sample` (
  `id_group_sample` integer PRIMARY KEY AUTO_INCREMENT,
  `group_name` varchar(50)
);

CREATE TABLE `tbl_sample` (
  `id_sample` integer PRIMARY KEY AUTO_INCREMENT,
  `sample` varchar(50),
  `id_group_sample` integer
);

CREATE TABLE `tbl_cylider` (
  `id_cylider` integer PRIMARY KEY AUTO_INCREMENT,
  `id_project` integer,
  `id_user` integer,
  `date_register` date,
  `age` int,
  `settlement` varchar(50),
  `diameter1` double,
  `diameter2` double,
  `diameter_avg` double,
  `diameter_aprox` double,
  `cross_sectional_transversal` double,
  `weight` double,
  `height` double,
  `charge` double,
  `resistance` double,
  `resistance_avg` double,
  `type_fail` varchar(10),
  `observation` text
);

CREATE TABLE `tbl_beam` (
  `id_beam` integer PRIMARY KEY AUTO_INCREMENT,
  `id_project` integer,
  `id_user` integer,
  `date_register` date,
  `age` int,
  `design_break_modul` double,
  `width1` double,
  `width2` double,
  `width3` double,
  `width_avg` double,
  `thickness1` double,
  `thickness2` double,
  `thickness3` double,
  `thickness_avg` double,
  `length1` double,
  `length2` double,
  `length3` double,
  `length_avg` double,
  `length_between_supports` double,
  `specimen_mass` double,
  `charge` double,
  `rupture_stress_mr` double,
  `avg_mr` double,
  `type_fail` varchar(50),
  `observation` text
);

CREATE TABLE `tbl_mortar` (
  `id_mortar_strength` integer PRIMARY KEY AUTO_INCREMENT,
  `id_project` integer,
  `id_user` integer,
  `date_register` date,
  `age` int,
  `day_meter` double,
  `height` double,
  `weight` double,
  `area` double,
  `charge` double,
  `resistance` double,
  `desing_resistance` double,
  `percent_resistance_gain` double,
  `resistance_avg` double,
  `observation` text
);

CREATE TABLE `tbl_prisms` (
  `id_prisms` integer PRIMARY KEY AUTO_INCREMENT,
  `id_project` integer,
  `id_user` integer,
  `date_register` date,
  `age` int,
  `width` double,
  `height` double,
  `lenght` double,
  `weight` double,
  `charge` double,
  `resistance` double,
  `resistance_avg` double,
  `desing_resistance` double,
  `percentage_resistance` double,
  `observation` text
);

CREATE TABLE `tbl_lodocreto` (
  `id_lodocreto` integer PRIMARY KEY AUTO_INCREMENT,
  `id_project` integer,
  `id_user` integer,
  `date_register` date,
  `age` int,
  `day_meter` double,
  `height` double,
  `weight` double,
  `area` double,
  `charge` double,
  `resistance` double,
  `percent_resistance_gain` double,
  `resistance_avg` double,
  `observation` text
);

CREATE TABLE `tbl_test` (
  `id_test` integer PRIMARY KEY AUTO_INCREMENT,
  `test` text
);

CREATE TABLE `tbl_project` (
  `id_project` integer PRIMARY KEY AUTO_INCREMENT,
  `name_project` varchar(100),
  `id_customer` integer,
  `date_register` date
);
