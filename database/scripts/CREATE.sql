create table jobs
(
  id         int unsigned auto_increment
    primary key,
  name       varchar(255) not null,
  direx      tinyint(1)   not null,
  created_at timestamp    null,
  updated_at timestamp    null,
  constraint cargo_nome_unique
  unique (name)
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

create table password_resets
(
  email      varchar(255) not null,
  token      varchar(255) not null,
  created_at timestamp    null
)
  collate = utf8mb4_unicode_ci;

create index password_resets_email_index
  on password_resets (email);

create table semesters
(
  id               int unsigned auto_increment
    primary key,
  begin            date       not null,
  end              date       not null,
  semesters_number tinyint(1) not null
);

create table users
(
  name           varchar(255) not null,
  id             int(10) auto_increment,
  job            int unsigned not null,
  email          varchar(255) not null,
  password       varchar(255) not null,
  remember_token varchar(100) null,
  created_at     timestamp    null,
  updated_at     timestamp    null,
  primary key (name),
  constraint users_id_unique
  unique (id),
  constraint users_email_unique
  unique (email),
  constraint users_cargo_foreign
  foreign key (job) references jobs (id)
    on delete cascade
)
  collate = utf8mb4_unicode_ci;

create index users_cargo_foreign
  on users (job);

create table warning_status
(
  id         int unsigned auto_increment
    primary key,
  name       varchar(255) not null,
  created_at timestamp    null,
  updated_at timestamp    null
)
  collate = utf8mb4_unicode_ci;

create table warning_types
(
  id         int unsigned auto_increment
    primary key,
  name       varchar(255)     not null,
  points     tinyint unsigned not null,
  created_at timestamp        null,
  updated_at timestamp        null
)
  collate = utf8mb4_unicode_ci;

create table warnings
(
  id          int unsigned auto_increment
    primary key,
  type        int unsigned not null,
  penalized   varchar(255) not null,
  responsible varchar(255) not null,
  date        date         not null,
  time        time         not null,
  description varchar(255) not null,
  status      int unsigned not null,
  created_at  timestamp    null,
  updated_at  timestamp    null,
  id_semester int unsigned not null,
  constraint advertencia_tipo_foreign
  foreign key (type) references warning_types (id)
    on delete cascade,
  constraint advertencia_penalizado_foreign
  foreign key (penalized) references users (name)
    on delete cascade,
  constraint advertencia_responsavel_foreign
  foreign key (responsible) references users (name)
    on delete cascade,
  constraint advertencia_status_foreign
  foreign key (status) references warning_status (id)
    on delete cascade,
  constraint warning_id_semester_foreign
  foreign key (id_semester) references semesters (id)
)
  collate = utf8mb4_unicode_ci;

create index advertencia_penalizado_foreign
  on warnings (penalized);

create index advertencia_responsavel_foreign
  on warnings (responsible);

create index advertencia_status_foreign
  on warnings (status);

create index advertencia_tipo_foreign
  on warnings (type);

create index warning_id_semester_foreign
  on warnings (id_semester);


