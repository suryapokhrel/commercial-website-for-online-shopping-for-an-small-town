-- FOR CUSTOMER
CREATE TABLE CUSTOMER(
    CUSTOMER_ID VARCHAR2(10) PRIMARY KEY,
    FIRSTNAME VARCHAR2(30) NOT NULL,
    MIDDLENAME VARCHAR2(30),
    LASTNAME VARCHAR2(30) NOT NULL,
    EMAIL VARCHAR2(50) NOT NULL UNIQUE,
    PHONE_NUMBER NUMBER NOT NULL UNIQUE,
    IMAGES VARCHAR2(30),
    CUST_ADDRESS VARCHAR2(50) NOT NULL
);

CREATE TABLE CUSTOMER_CREDENTIAL(
    CUSTOMER_USERNAME VARCHAR2(30) NOT NULL UNIQUE,
    CUSTOMER_PASSWORD VARCHAR2(40) NOT NULL,
    CUSTOMER_ID_FK VARCHAR2(10) REFERENCES CUSTOMER(CUSTOMER_ID) ON DELETE CASCADE
);



-- FOR ADMIN
CREATE TABLE ADMIN(
    ADMIN_ID VARCHAR2(10) PRIMARY KEY,
    FIRSTNAME VARCHAR2(30) NOT NULL,
    MIDDLENAME VARCHAR2(30),
    LASTNAME VARCHAR2(30) NOT NULL,
    EMAIL VARCHAR2(30) NOT NULL UNIQUE,
    PHONE_NUMBER NUMBER NOT NULL UNIQUE
);

CREATE TABLE ADMIN_CREDENTIAL(
    ADMIN_USERNAME VARCHAR2(30) NOT NULL UNIQUE,
    ADMIN_PASSWORD VARCHAR2(40) NOT NULL,
    ADMIN_ID_FK VARCHAR2(10) REFERENCES ADMIN(ADMIN_ID) ON DELETE CASCADE
);



-- FOR TRADER
CREATE TABLE TRADER(
    TRADER_ID VARCHAR2(10) PRIMARY KEY,
    FIRSTNAME VARCHAR2(30) NOT NULL,
    MIDDLENAME VARCHAR2(30),
    LASTNAME VARCHAR2(30) NOT NULL,
    EMAIL VARCHAR2(30) NOT NULL UNIQUE,
    PHONE_NUMBER NUMBER NOT NULL UNIQUE,
    TRADER_ADDRESS VARCHAR2(50) NOT NULL,
    SHOP1 VARCHAR2(30) NOT NULL UNIQUE,
    SHOP2 VARCHAR2(30) UNIQUE,
    IMAGES VARCHAR2(30),
    TRADER_TYPE VARCHAR2(20) NOT NULL,
    ADMIN_ID_FK VARCHAR2(10) REFERENCES ADMIN(ADMIN_ID)
);

CREATE TABLE TRADER_CREDENTIAL(
    TRADER_USERNAME VARCHAR2(30) NOT NULL UNIQUE,
    TRADER_PASSWORD VARCHAR2(40) NOT NULL,
    TRADER_ID_FK VARCHAR2(10) REFERENCES TRADER(TRADER_ID) ON DELETE CASCADE
);



-- FOR DASHBOARD
CREATE TABLE DASHBOARD(
    DASHBOARD_ID VARCHAR2(10) PRIMARY KEY,
    DASHBOARD_NAME VARCHAR2(30) NOT NULL UNIQUE,
    TRADER_ID_FK VARCHAR2(10) REFERENCES TRADER(TRADER_ID) ON DELETE CASCADE
);



-- FOR REPORT
CREATE TABLE REPORT(
    REPORT_ID VARCHAR2(10) PRIMARY KEY,
    REPORT_TYPE VARCHAR2(30) NOT NULL,
    ADMIN_ID VARCHAR2(8) REFERENCES ADMIN(ADMIN_ID) ON DELETE CASCADE,
    DASHBOARD_ID_FK VARCHAR2(10) REFERENCES DASHBOARD(DASHBOARD_ID) ON DELETE CASCADE

);



-- FOR SHOP
CREATE TABLE SHOP(
    SHOP_ID VARCHAR2(10) PRIMARY KEY,
    SHOP_NAME VARCHAR2(30) NOT NULL,
    SHOP_TYPE VARCHAR2(30) NOT NULL,
    TRADER_ID_FK VARCHAR2(10) REFERENCES TRADER(TRADER_ID) ON DELETE CASCADE
);



-- FOR OFFER
CREATE TABLE OFFER(
    OFFER_ID VARCHAR2(10) PRIMARY KEY,
    OFFER_DISCOUNT NUMBER(8,2) NOT NULL,
    OFFER_START_DATE DATE NOT NULL,
    OFFER_END_DATE DATE NOT NULL

);



-- FOR PRODUCT
CREATE TABLE PRODUCT(
    PRODUCT_ID VARCHAR2(10) PRIMARY KEY,
    PRODUCT_NAME VARCHAR2(30) NOT NULL UNIQUE,
    PRODUCT_DESCRIPTION VARCHAR2(80) NOT NULL,
    PRODUCT_CATEGORY VARCHAR2(20) NOT NULL,
    PRODUCT_PRICE NUMBER(8,2) NOT NULL,
    PRODUCT_QUANTITY NUMBER NOT NULL,
    PRODUCT_AVAILABILITY NUMBER(1) NOT NULL,
    ALLERGIC_INFORMATION VARCHAR2(80),
    MAX_ORDER NUMBER NOT NULL,
    MIN_ORDER NUMBER NOT NULL,
    IMAGES VARCHAR2(30),
    SHOP_ID_FK VARCHAR2(10) REFERENCES SHOP(SHOP_ID) ON DELETE CASCADE,
    OFFER_ID_FK VARCHAR2(10) REFERENCES OFFER(OFFER_ID)
);



-- FOR CART
CREATE TABLE CART(
    CART_ID VARCHAR2(10) PRIMARY KEY,
    ORDER_DATE VARCHAR2(10) NOT NULL,
    ORDER_TIME VARCHAR2(15) NOT NULL,
    COLLECTION_DATE VARCHAR2(10),
    COLLECTION_TIME VARCHAR2(15),
    COLLECTION_POINT VARCHAR2(30),
    CUSTOMER_ID_FK VARCHAR2(10) REFERENCES CUSTOMER(CUSTOMER_ID) ON DELETE CASCADE,
    PRODUCT_ID_FK VARCHAR2(10) REFERENCES PRODUCT(PRODUCT_ID) ON DELETE CASCADE
);



-- FOR ORDER_PRODUCT
CREATE TABLE ORDER_PRODUCT(
    ORDER_ID VARCHAR2(10) PRIMARY KEY,
    ORDER_QUANTITY NUMBER NOT NULL,
    TOTAL_PRICE NUMBER(10,2) NOT NULL,
    PRODUCT_ID_FK VARCHAR2(10) REFERENCES PRODUCT(PRODUCT_ID) ON DELETE CASCADE,
    CART_ID_FK VARCHAR2(10) REFERENCES CART(CART_ID) ON DELETE CASCADE
);



-- FOR BILL
CREATE TABLE BILL(
    BILL_ID VARCHAR2(10) PRIMARY KEY,
    PAYMENT_METHOD VARCHAR2(30) NOT NULL,
    PAYMENT_DATE VARCHAR2(10),
    COLLECTION_DATE VARCHAR2(10),
    COLLECTION_TIME VARCHAR2(15),
    PRICE NUMBER,
    PRODUCT_ID_FK VARCHAR2(10) REFERENCES PRODUCT(PRODUCT_ID),
    CUSTOMER_ID_FK VARCHAR2(10) REFERENCES CUSTOMER(CUSTOMER_ID)
);



-- FOR CUSTOMER_REVIEW
CREATE TABLE CUSTOMER_REVIEW(
    REVIEW_ID VARCHAR2(10) PRIMARY KEY,
    COMMENTS VARCHAR2(100),
    RATING_NO NUMBER,
    CUSTOMER_ID_FK VARCHAR2(10) REFERENCES CUSTOMER(CUSTOMER_ID) ON DELETE CASCADE,
    PRODUCT_ID_FK VARCHAR2(10) REFERENCES PRODUCT(PRODUCT_ID) ON DELETE CASCADE
);



-- FOR WISHLIST
CREATE TABLE WISHLIST(
    WISHLIST_ID VARCHAR2(10) PRIMARY KEY,
    CUSTOMER_ID_FK VARCHAR2(10) REFERENCES CUSTOMER(CUSTOMER_ID) ON DELETE CASCADE
);



-- FOR WISHLIST_PRODUCT
CREATE TABLE WISHLIST_PRODUCT(
    PRODUCT_ID_FK VARCHAR2(10) REFERENCES PRODUCT(PRODUCT_ID) ON DELETE CASCADE,
    WISHLIST_ID_FK VARCHAR2(10) REFERENCES WISHLIST(WISHLIST_ID) ON DELETE CASCADE
);