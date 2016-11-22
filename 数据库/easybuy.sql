/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2016/11/22 8:33:08                           */
/*==============================================================*/


drop table if exists admin;

drop table if exists adress;

drop table if exists categories;

drop table if exists gc;

drop table if exists goods;

drop table if exists grand;

drop table if exists orderdate;

drop table if exists orders;

drop table if exists state;

drop table if exists user;

/*==============================================================*/
/* Table: admin                                                 */
/*==============================================================*/
create table admin
(
   adminid              int not null,
   adminname            char(20) not null,
   adminpswd            char(20) not null,
   permission           int,
   primary key (adminid)
);

/*==============================================================*/
/* Table: adress                                                */
/*==============================================================*/
create table adress
(
   adressid             int not null,
   userid               int,
   adress               char(255) not null,
   tel                  int,
   primary key (adressid)
);

/*==============================================================*/
/* Table: categories                                            */
/*==============================================================*/
create table categories
(
   categoriesid         int not null,
   categoriesname       char(255) not null,
   primary key (categoriesid)
);

/*==============================================================*/
/* Table: gc                                                    */
/*==============================================================*/
create table gc
(
   categoriesid         int not null,
   grandid              int not null,
   primary key (categoriesid, grandid)
);

/*==============================================================*/
/* Table: goods                                                 */
/*==============================================================*/
create table goods
(
   goodid               int not null,
   categoriesid         int,
   grandid              int,
   goodname             char(255) not null,
   count                int not null,
   goodprice            float not null,
   imageurl             char(255) not null,
   introduction         text not null,
   mark1                char(20),
   mark2                char(20),
   primary key (goodid)
);

/*==============================================================*/
/* Table: grand                                                 */
/*==============================================================*/
create table grand
(
   grandid              int not null,
   grandname            char(20) not null,
   primary key (grandid)
);

/*==============================================================*/
/* Table: orderdate                                             */
/*==============================================================*/
create table orderdate
(
   orderdateid          int not null,
   goodid               int,
   orderid              int,
   count                int,
   primary key (orderdateid)
);

/*==============================================================*/
/* Table: orders                                                */
/*==============================================================*/
create table orders
(
   orderid              int not null,
   userid               int,
   ordernumber          char(255) not null,
   ordertime            date not null,
   price                float not null,
   discount             float not null,
   orderaddress         char(255) not null,
   primary key (orderid)
);

/*==============================================================*/
/* Table: state                                                 */
/*==============================================================*/
create table state
(
   stateid              int not null,
   orderid              int,
   statename            char(20) not null,
   primary key (stateid)
);

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   userid               int not null,
   username             char(20) not null,
   userpswd             char(20),
   primary key (userid)
);

alter table adress add constraint FK_Reference_7 foreign key (userid)
      references user (userid) on delete restrict on update restrict;

alter table gc add constraint FK_Reference_8 foreign key (categoriesid)
      references categories (categoriesid) on delete restrict on update restrict;

alter table gc add constraint FK_Reference_9 foreign key (grandid)
      references grand (grandid) on delete restrict on update restrict;

alter table goods add constraint FK_Relationship_2 foreign key (categoriesid)
      references categories (categoriesid) on delete restrict on update restrict;

alter table goods add constraint FK_Relationship_3 foreign key (grandid)
      references grand (grandid) on delete restrict on update restrict;

alter table orderdate add constraint FK_Reference_4 foreign key (goodid)
      references goods (goodid) on delete restrict on update restrict;

alter table orderdate add constraint FK_Reference_6 foreign key (orderid)
      references orders (orderid) on delete restrict on update restrict;

alter table orders add constraint FK_Reference_5 foreign key (userid)
      references user (userid) on delete restrict on update restrict;

alter table state add constraint FK_Relationship_7 foreign key (orderid)
      references orders (orderid) on delete restrict on update restrict;

