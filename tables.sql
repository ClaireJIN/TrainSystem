CREATE TABLE IF NOT EXISTS train
(
  trainID CHAR(5) NOT NULL,
  trainType CHAR(10) NOT NULL,
  start_station CHAR(10) NOT NULL,
  destnation CHAR(10) NOT NULL,
  day DATE,
  start_leave_time TIME,
  destnation_arrive_time TIME,
  distance FLOAT NOT NULL,
  purchaseTime DATE,
  PRIMARY KEY(trainID)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS station
(
  stationName CHAR(10) NOT NULL,
  arrive_time TIME,
  leave_time TIME,
  trainID CHAR(5) NOT NULL,
  PRIMARY KEY(trainID, stationName),
  FOREIGN KEY(trainID) REFERENCES train(trainID)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS carriage
(
  carriageID CHAR(5) NOT NULL,
  trainID CHAR(5) NOT NULL,
  carriageType CHAR(10) NOT NULL,
  PRIMARY KEY(carriageID, trainID),
  FOREIGN KEY(trainID) REFERENCES train(trainID)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS user
(
  userID CHAR(18) NOT NULL,
  Email VARCHAR(30) NOT NULL,
  password CHAR(10) NOT NULL,
  name CHAR(10) NOT NULL,
  sex CHAR(5) NOT NULL,
  purchase DATE,
  PRIMARY KEY(userID)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE user ADD CONSTRAINT sex_range CHECK(sex in ('男', '女'));


CREATE TABLE IF NOT EXISTS seat
(
  seatID CHAR(5) NOT NULL,
  carriageID CHAR(5) NOT NULL,
  userID CHAR(18),
  status INT NOT NULL,
  from_station CHAR(10),
  to_station CHAR(10),
  PRIMARY KEY(seatID, carriageID),
  FOREIGN KEY(carriageID) REFERENCES carriage(carriageID),
  FOREIGN KEY(userID) REFERENCES user(userID)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS student
(
  studentID VARCHAR(10) NOT NULL,
  userID CHAR(18) NOT NULL,
  school VARCHAR(25) NOT NULL,
  grade CHAR(8),
  benefit_start CHAR(10),
  benefit_end CHAR(10),
  PRIMARY KEY(studentID),
  FOREIGN KEY(userID) REFERENCES user(userID)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS route
(
  from_station CHAR(10) NOT NULL,
  to_station CHAR(10) NOT NULL,
  distance FLOAT NOT NULL,
  PRIMARY KEY(from_station, to_station)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS adm
(
  Email VARCHAR(30) NOT NULL,
  password CHAR(10) NOT NULL,
  name CHAR(10) NOT NULL,
  PRIMARY KEY(Email)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS trainType
(
  trainType CHAR(10) NOT NULL,
  type_ratio FLOAT NOT NULL
  PRIMARY KEY(trainType);
)ENGINE = InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS carriageType
(
  carriageType CHAR(10) NOT NULL,
  type_ratio FLOAT NOT NULL
  PRIMARY KEY(trainType);
)ENGINE = InnoDB DEFAULT CHARSET=latin1;
