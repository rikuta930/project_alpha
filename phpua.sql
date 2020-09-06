create table phpua(
  uid serial primary key,
  uname text not null,
  gender text not null,
  email text not null,
  password text not null) without oids;

create table user_profile(
  id serial primary key,
  uid text not null,
  profile text not null) without oids;
)