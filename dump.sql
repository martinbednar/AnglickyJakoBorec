CREATE TABLE Customer (
	id INT AUTO_INCREMENT NOT NULL,
	email VARCHAR(127) NOT NULL,
	agreement BIT(1),
	registered DATETIME,
	
	CONSTRAINT pk_Customer PRIMARY KEY (id)
);

CREATE TABLE Email (
	customerid INT NOT NULL,
	number NUMERIC(3) NOT NULL,
	datesent DATETIME,

	CONSTRAINT pk_Email PRIMARY KEY (customerid, number),
	CONSTRAINT fk_EmailCustomer FOREIGN KEY (customerid) REFERENCES Customer(id)
);