CREATE TABLE IF NOT EXISTS users
( -- important field
  id             int PRIMARY KEY AUTO_INCREMENT,
  mail           varchar(150)   NOT NULL UNIQUE,
  passwword      varchar(32)    NOT NULL,
  -- field function
  login_attempts int default 10 not null,
  -- auxiliary
  first_name     varchar(100),
  last_name      varchar(100),
  user_name      varchar(100),
  phone          varchar(12),
  address        varchar(225)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
